<?php

class Availability{
    
    public static function display($availablity){
        if ($availablity == 0){
            echo "Out of stock"; 
        } elseif($availablity == 1){
            echo "In stock";
        }
    }
    public static function displayClass($availablity){
        if ($availablity == 0){
            echo "outofstock"; 
        } elseif($availablity == 1){
            echo "instock";
        }
    }
}