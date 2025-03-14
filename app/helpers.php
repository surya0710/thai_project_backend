<?php

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

    if(!function_exists('calculateAverageProductPrice')){
        function calculateAverageProductPrice($badge){
            $tasksWith3Percent = 29;
            $tasksWith8Percent = 1;

            if($badge == 'VIP0'){
                $totalEarnings = 30;
                $percentage = 3;
            }
            elseif($badge == 'VIP1'){
                $totalEarnings = 201;
                $percentage = 3;
            }
            elseif($badge == 'VIP2'){
                $totalEarnings = 501;
                $percentage = 4;
            }
            elseif($badge == 'VIP3'){
                $totalEarnings = 1000;
                $percentage = 5;
            }
            elseif($badge == 'VIP4'){
                $totalEarnings = 2000;
                $percentage = 7;
            }
            else{
                $totalEarnings = 5000;
                $percentage = 10;
            }

            $luckyDrawPercentage = 8;

            // Total commission percentage calculation
            $totalCommissionPercentage = ($percentage * 0.03) + ($luckyDrawPercentage * 0.08);

            // Calculate the required average product amount
            $averageProductAmount = $totalEarnings / $totalCommissionPercentage;

            // Display the result
            return number_format($averageProductAmount, 2, '.', '');
        }
    }