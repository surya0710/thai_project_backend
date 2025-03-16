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
        $revenueEarned = $userTasks->sum('earned_amount');
        $tasksCompleted = count($userTasks);
        $taskPrice = getNextTaskPrice(count($userTasks), $revenueEarned);
        $isLuckyDraw = ($tasksCompleted == 26); // Adjust based on your logic

        // Get the next task price dynamically
        $taskPrice = getNextTaskPrice($revenueEarned, $tasksCompleted, $isLuckyDraw);
        // Fetch a suitable product in a small price range
        $task = Products::whereBetween('price', [$taskPrice - 2, $taskPrice])
            ->orderByRaw('RAND()') // Random selection to ensure variation
            ->first();
        $taskCount = TasksHistory::where('user_id', $userData->id)->where('badge', $userData->badge)->count();
        $todayEarned = TasksHistory::where('user_id', $userData->id)->where('created_at', '>=', now()->startOfDay())->sum('earned_amount');
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
            $user->total_amount += $taskHistory->product_amount;
            $user->update();
        };
        return redirect()->route('customer.automaticOrder');
    }
}
