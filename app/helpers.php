<?php

use App\Models\Products;

    if(!function_exists('getCPSCalculation')) {
        function getCPSCalculation($price, $badge, $taskType = 'normal'){
            if($badge == 'VIP0'){
                if($taskType == 'luckyDraw'){
                    $percentage = 5;
                }
                else{
                    $percentage = 3;
                }
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

    if(!function_exists('generateTaskPrices')) {
        function generateTaskPrices($badge){
            if($badge == 'VIP0'){
                $totalReward = 15;
                $regularTasks = 29;
                $luckyTask = 1;
                $luckyTaskPrice = rand(15, 25); // Adjust range as needed
                $remainingReward = $totalReward - (0.05 * $luckyTaskPrice);
                $regularTaskPrices = [];
                $remainingPercentage = 0.03 * $regularTasks;
                $averageRegularTaskPrice = $remainingReward / $remainingPercentage;
                for ($i = 0; $i < $regularTasks; $i++) {
                    // Slightly randomize each regular task price around the average
                    $variation = rand(-100, 100) / 100; // Small variation
                    $price = max(10, $averageRegularTaskPrice + $variation); // Ensure positive value
                    $regularTaskPrices[] = round($price, 2);
                }
                
                // Adjust last task price to perfectly balance the total
                $adjustedTotalReward = array_sum($regularTaskPrices) * 0.03 + ($luckyTaskPrice * 0.05);
                $difference = $totalReward - $adjustedTotalReward;
                $regularTaskPrices[array_rand($regularTaskPrices)] += round($difference / 0.03, 2);
            }

            return [
                'regular_tasks' => $regularTaskPrices,
                'lucky_task' => round($luckyTaskPrice, 2)
            ];
        }
    }

    if(!function_exists('getNextTaskPrice')){
        function getNextTaskPrice($userRevenue, $tasksCompleted) {
            $totalReward = 15;
            $totalTasks = 30;
            
            // Remaining reward to reach $15
            $remainingReward = $totalReward - $userRevenue;
            
            // Remaining tasks
            $remainingTasks = $totalTasks - $tasksCompleted;

            if ($remainingTasks <= 0) {
                return null; // All tasks completed
            }

            // If it's a lucky draw task, use 5% reward calculation
            $price = $remainingReward / (0.03 * $remainingTasks);

            // Randomize within a small range
            $priceVariation = rand(-50, 50) / 100;
            $nextTaskPrice = max(10, $price + $priceVariation);

            return number_format($nextTaskPrice, 2);
        }
    }
    
    