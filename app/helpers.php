<?php

use App\Models\Products;

    if(!function_exists('getCPSCalculation')) {
        function getCPSCalculation($price, $badge){
            if($badge == 'VIP0'){
                $percentage = 3;
            }
            elseif($badge == 'VIP1'){
                $percentage = 3;
            }
            elseif($badge == 'VIP2'){
                $percentage = 4;
            }
            elseif($badge == 'VIP3'){
                $percentage = 5;
            }
            elseif($badge == 'VIP4'){
                $percentage = 7;
            }
            else{
                $percentage = 10;
            }
            return number_format($price * $percentage / 100, 2, '.', '');
        }
    }

    if(!function_exists('ordersCount')) {
        function ordersCount($badge){
            $orderCount = \App\Models\TasksHistory::where('user_id', auth()->user()->id)->count();
            if($badge == 'VIP0'){
                $orderCount = $orderCount;
            }
            elseif($badge == 'VIP1'){
                $orderCount = $orderCount - 30;
            }
            elseif($badge == 'VIP2'){
                $orderCount = $orderCount - 60;
            }
            elseif($badge == 'VIP3'){
                $orderCount = $orderCount - 90;
            }
            elseif($badge == 'VIP4'){
                $orderCount = $orderCount - 120;
            }
            else{
                $orderCount = $orderCount - 150;
            }

            return $orderCount;
        }
    }

    if(!function_exists('calculateRequiredTaskAmount')){
        function calculateRequiredTaskAmount($minEarnings, $maxEarnings) {
            // Select an S (special task amount) dynamically
            $possibleSValues = Products::orderByDesc('price')->take(10)->pluck('price')->toArray();
        
            foreach ($possibleSValues as $S) {
                // Calculate X for min and max earnings
                $minX = ($minEarnings - (0.05 * $S)) / 0.03 + $S;
                $maxX = ($maxEarnings - (0.05 * $S)) / 0.03 + $S;
        
                // Find a valid X range
                $tasksTotalAmount = Products::whereBetween('price', [$minX, $maxX])->sum('price');
        
                if ($tasksTotalAmount >= $minX && $tasksTotalAmount <= $maxX) {
                    return [$S, $tasksTotalAmount];
                }
            }
            return [null, null]; // If no valid range found
        }        
    }

    if(!function_exists('getTasksForUser')){
        function getTasksForUser($userId, $minEarnings = 13, $maxEarnings = 15) {
            [$specialTaskAmount, $totalAmount] = calculateRequiredTaskAmount($minEarnings, $maxEarnings);
        
            if (is_null($specialTaskAmount)) {
                return response()->json(['message' => 'No suitable task combination found.'], 400);
            }
        
            // Fetch tasks that sum up to the calculated total amount
            $tasks = Products::where('user_id', $userId)
                        ->orderByDesc('price')
                        ->take(30)
                        ->get();
            
                        print_r($tasks);
                        exit;
        
            $totalEarnings = 0;
            $selectedTasks = [];
        
            // Assign 5% to the special task
            $specialTask = $tasks->where('price', $specialTaskAmount)->first();
            $specialTask->reward = 5;
            $specialTask->earned = ($specialTask->price * 5) / 100;
            $totalEarnings += $specialTask->earned;
            $selectedTasks[] = $specialTask;
        
            // Assign 3% to remaining tasks until reaching the total amount
            foreach ($tasks as $task) {
                if ($task->id !== $specialTask->id) {
                    $task->reward = 3;
                    $task->earned = ($task->price * 3) / 100;
                    $totalEarnings += $task->earned;
                    $selectedTasks[] = $task;
                }
        
                // Stop when we reach the total amount
                if ($totalEarnings >= $minEarnings && $totalEarnings <= $maxEarnings) {
                    break;
                }
            }
        
            return $selectedTasks;
        }        
    }