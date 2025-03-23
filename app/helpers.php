<?php

use App\Models\Products;
use App\Models\TasksHistory;
use App\Models\LuckyDraw;

    if(!function_exists('getCPSCalculation')) {
        function getCPSCalculation($price, $badge, $taskType = 'normal'){
            if($taskType == 'luckyDraw'){
                if($badge == 'VIP0'){
                    $percentage = 5;
                }
                elseif($badge == 'VIP1'){
                    $percentage = 5;
                }
                elseif($badge == 'VIP2'){
                    $percentage = 7;
                }
                elseif($badge == 'VIP3'){
                    $percentage = 7;
                }
                elseif($badge == 'VIP4'){
                    $percentage = 8;
                }
                else{
                    $percentage = 10;
                }
            }
            else{
                $percentage = 3;
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
            $regularRewardPercentage = 0.03;
            if($badge == 'VIP0'){
                $totalReward = 16;
                $luckyDrawRewardPercentage = 0.05;
            }
            else if($badge == 'VIP1'){
                $totalReward = 40;
                $luckyDrawRewardPercentage = 0.05;
            }
            else if($badge == 'VIP2'){
                $totalReward = 90;
                $luckyDrawRewardPercentage = 0.07;
            }
            else if($badge == 'VIP3'){
                $totalReward = 150;
                $luckyDrawRewardPercentage = 0.07;
            }
            else if($badge == 'VIP4'){
                $totalReward = 200;
                $luckyDrawRewardPercentage = 0.08;
            }
            else{
                $totalReward = 1000;
                $luckyDrawRewardPercentage = 0.10;
            }

            $regularTasks = 29;
            $luckyTask = 1;
            $luckyTaskPrice = rand(15, 25); // Adjust range as needed
            $remainingReward = $totalReward - ($luckyDrawRewardPercentage * $luckyTaskPrice);
            $regularTaskPrices = [];
            $remainingPercentage = $regularRewardPercentage * $regularTasks;
            $averageRegularTaskPrice = $remainingReward / $remainingPercentage;
            for ($i = 0; $i < $regularTasks; $i++) {
                // Slightly randomize each regular task price around the average
                $variation = rand(-100, 100) / 100; // Small variation
                $price = max(10, $averageRegularTaskPrice + $variation); // Ensure positive value
                $regularTaskPrices[] = round($price, 2);
            }
            
            // Adjust last task price to perfectly balance the total
            $adjustedTotalReward = array_sum($regularTaskPrices) * $regularRewardPercentage + ($luckyTaskPrice * $luckyDrawRewardPercentage);
            $difference = $totalReward - $adjustedTotalReward;
            $regularTaskPrices[array_rand($regularTaskPrices)] += round($difference / $regularRewardPercentage, 2);

            return [
                'regular_tasks' => $regularTaskPrices,
                'lucky_task' => round($luckyTaskPrice, 2)
            ];
        }
    }

    if(!function_exists('getNextTaskPrice')){
        function getNextTaskPrice($userRevenue, $tasksCompleted, $badge) {
            $regularRewardPercentage = 0.03;
            if($badge == 'VIP0'){
                $totalReward = 16;
                $luckyDrawRewardPercentage = 0.05;
            }
            else if($badge == 'VIP1'){
                $totalReward = 40;
                $luckyDrawRewardPercentage = 0.05;
            }
            else if($badge == 'VIP2'){
                $totalReward = 90;
                $luckyDrawRewardPercentage = 0.07;
            }
            else if($badge == 'VIP3'){
                $totalReward = 150;
                $luckyDrawRewardPercentage = 0.07;
            }
            else if($badge == 'VIP4'){
                $totalReward = 200;
                $luckyDrawRewardPercentage = 0.08;
            }
            else{
                $totalReward = 1000;
                $luckyDrawRewardPercentage = 0.10;
            }
            $totalTasks = 30;
            
            // Remaining reward to reach $15
            $remainingReward = $totalReward - $userRevenue;
            
            // Remaining tasks
            $remainingTasks = $totalTasks - $tasksCompleted;

            if ($remainingTasks <= 0) {
                return null; // All tasks completed
            }

            // If it's a lucky draw task, use 5% reward calculation
            $price = $remainingReward / ($regularRewardPercentage * $remainingTasks);

            // Randomize within a small range
            $priceVariation = rand(-50, 50) / 100;
            $nextTaskPrice = max(10, $price + $priceVariation);

            return number_format($nextTaskPrice, 2, '.', '');
        }
    }

    if(!function_exists('taskCountForUser')) {
        function taskCountForUser($userID, $badge){
            $count = TasksHistory::where('user_id', $userID)
            ->where('badge', $badge)
            ->where('is_deleted', 0)
            ->count();
            return $count;
        }
    }

    if(!function_exists('checkTaskType')) {
        function checkTaskType($taskCount, $userID){
            $LuckyDrawTask = LuckyDraw::where('user_id', $userID)->where('show_at', $taskCount)->first();
            if(!$LuckyDrawTask){
                return 'Regular';
            }
            else{
                return 'Lucky Draw';
            }
        }
    }

    if(!function_exists('calculateLevel')) {
        function calculateLevel($totalAmount) {
            if ($totalAmount >= 5000) {
                return 'VIP5';
            } elseif ($totalAmount >= 2000) {
                return 'VIP4';
            } elseif ($totalAmount >= 1000) {
                return 'VIP3';
            } elseif ($totalAmount >= 501) {
                return 'VIP2';
            } elseif ($totalAmount >= 201) {
                return 'VIP1';
            } elseif ($totalAmount >= 30) {
                return 'VIP0';
            } else {
                return 0;
            }
        }
    }

    if(!function_exists('checkUserAmountByLevel')) {
        function checkUserAmountByLevel($badge){
            if($badge == 0){
                return 30;
            }
            elseif($badge == 'VIP1'){
                return 201;
            }
            elseif($badge == 'VIP2'){
                return 501;
            }
            elseif($badge == 'VIP3'){
                return 1000;
            }
            elseif($badge == 'VIP4'){
                return 2000;
            }
            elseif($badge == 'VIP5'){
                return 5000;
            }
        }
    }

    if(!function_exists('checkNextLevelAmount')) {
        function checkNextLevelAmount($badge){
            if($badge == 'VIP0'){
                return 201;
            }
            elseif($badge == 'VIP1'){
                return 501;
            }
            elseif($badge == 'VIP2'){
                return 1000;
            }
            elseif($badge == 'VIP3'){
                return 2000;
            }
            elseif($badge == 'VIP4'){
                return 5000;
            }
        }
    }
    
    