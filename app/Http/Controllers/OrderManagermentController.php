<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TasksHistory;

class OrderManagermentController extends Controller
{
    public function automaticOrder()
    {
        $userData = User::find(Auth::guard('customer')->user()->id);
        $userTasks = TasksHistory::where('user_id', $userData->id)->get();
    
        $tasksCompleted = $userTasks->count();
        $revenueEarned = $userTasks->sum('earned_amount');

        // Get IDs of already assigned tasks to avoid repetition
        $completedTaskIds = $userTasks->pluck('product_id')->toArray();

        // Determine if the next task is a lucky draw task
        $isLuckyDraw = ($tasksCompleted == 26); // Adjust if needed

        // Get the next task price dynamically
        $taskPrice = getNextTaskPrice($revenueEarned, $tasksCompleted, $isLuckyDraw);

        // Fetch a task that hasn't been assigned yet
        $task = Products::whereBetween('price', [$taskPrice - 2, $taskPrice])
            ->whereNotIn('id', $completedTaskIds) // Exclude already assigned tasks
            ->whereNotNull('id')
            ->orderByRaw('RAND()')
            ->first();

        // Fallback: If no task found in the price range, fetch any unused product
        if (!$task) {
            $task = Products::whereNotIn('id', $completedTaskIds)
                ->orderByRaw('RAND()')
                ->first();
        }

        // Get task count and today's earnings
        $taskCount = TasksHistory::where('user_id', $userData->id)
            ->where('badge', $userData->badge)
            ->count();

        $todayEarned = TasksHistory::where('user_id', $userData->id)
            ->where('created_at', '>=', now()->startOfDay())
            ->sum('earned_amount');

        return view('customer.automaticOrder', compact('userData', 'task', 'taskCount', 'todayEarned'));
    }

    public function automaticOrderSubmit($TaskID){
        $task = Products::find($TaskID);
        $user = User::find(Auth::guard('customer')->user()->id);
        $taskHistory = new TasksHistory();
        $taskHistory->user_id = $user->id;
        $taskHistory->product_id = $task->id;
        $taskHistory->earned_amount = getCPSCalculation($task->price, $user->badge);
        $taskHistory->product_amount = $task->price;
        $taskHistory->created_at = now();
        $taskHistory->badge = $user->badge;
        if($taskHistory->save()){
            $user->revenue_generated += $taskHistory->earned_amount;
            $user->total_amount += $taskHistory->earned_amount;
            $user->update();
        };
        return redirect()->route('customer.automaticOrder');
    }
}
