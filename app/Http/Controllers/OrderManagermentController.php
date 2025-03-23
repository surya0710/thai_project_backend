<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TasksHistory;
use App\Models\LuckyDraw;
use Illuminate\Support\Facades\DB;

class OrderManagermentController extends Controller
{
    public function automaticOrder()
    {
        $userData = User::find(Auth::guard('customer')->user()->id);
        $userTasks = TasksHistory::where('user_id', $userData->id)->where('badge', $userData->badge)->where('is_deleted', 0)->get();

        $tasksCompleted = $userTasks->count();
        $luckyDrawTask = LuckyDraw::where('user_id', $userData->id)
        ->where('status', 0)
        ->where('show_at', $tasksCompleted + 1)
        ->where('for_badge', $userData->badge)
        ->first();

        $revenueEarned = $userTasks->sum('earned_amount');

        if($luckyDrawTask !== null){
            $task= Products::find($luckyDrawTask->product_id);
        }
        else{
            if($userData->badge == 'VIP0' && $tasksCompleted >= 30){
                // Get IDs of already assigned tasks to avoid repetition
                $completedTaskIds = $userTasks->pluck('product_id')->toArray();

                // Get the next task price dynamically
                $taskPrice = getNextTaskPrice($revenueEarned, $tasksCompleted, $userData->badge);

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
            }
            else{
                $task = [];
            }
        }

        // Get task count and today's earnings
        $taskCount = TasksHistory::where('user_id', $userData->id)
            ->where('badge', $userData->badge)
            ->where('is_deleted', 0)
            ->count();

        $todayEarned = TasksHistory::where('user_id', $userData->id)
            ->where('created_at', '>=', now()->startOfDay())
            ->where('is_deleted', 0)
            ->sum('earned_amount');

        return view('customer.automaticOrder', compact('userData', 'task', 'taskCount', 'todayEarned', 'luckyDrawTask'));
    }

    public function automaticOrderSubmit($TaskID, $task_type){
        $task = Products::find($TaskID);
        $user = User::find(Auth::guard('customer')->user()->id);
        $userTasks = TasksHistory::where('user_id', $user->id)->where('badge', $user->badge)->where('is_deleted', 0)->orderBy('created_at', 'DESC')->get();
        $tasksCompleted = $userTasks->count();
        if($task_type === 'luckyDraw'){
            $luckyDrawTask = LuckyDraw::where('user_id', $user->id)
            ->where('status', 0)
            ->where('show_at', $tasksCompleted + 1)
            ->where('for_badge', $user->badge)
            ->first();
            if($luckyDrawTask === null){
                return redirect()->route('customer.automaticOrder');
            }

        }
        else{
            $taskHistory = new TasksHistory();
            $taskHistory->user_id = $user->id;
            $taskHistory->product_id = $task->id;
            $taskHistory->earned_amount = getCPSCalculation($task->price, $user->badge, $task_type);
            $taskHistory->product_amount = $task->price;
            $taskHistory->created_at = now();
            $taskHistory->badge = $user->badge;
            $taskHistory->save();
        }
        
        $user->revenue_generated += getCPSCalculation($task->price, $user->badge, $task_type);
        $user->total_amount += getCPSCalculation($task->price, $user->badge, $task_type);
        $user->update();
        if($task_type == 'luckyDraw'){
            DB::table('set_lucky_draw')
            ->where('id', $luckyDrawTask->id)
            ->update(['status' => 1]);
        }

        return redirect()->route('customer.automaticOrder');
    }
}
