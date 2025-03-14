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
                $percentage = 7;
            }
            return $price * $percentage / 100;
        }
    }