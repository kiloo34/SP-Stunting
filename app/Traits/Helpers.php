<?php

namespace App\Traits;

trait Helpers {
    
    protected function ageCheck($value)
    {
        $res = '';
        switch ($value) {
            case $value <= 20:
                $res = 5;
                break;
            
            case $value >= 34:
                $res = 3;
                break;
            
            default:
                $res = 1;
                break;
        }
        return $res;
    }

    protected function hbCheck($value) {
        $res = '';
        switch ($value) {
            case $value <= 6:
                $res = 5;
                break;
            
            case $value >= 7 && $value <= 8.99:
                $res = 3;
                break;
            
            case $value >= 9 && $value <= 10.99:
                $res = 3;
                break;
            
            default:
                $res = 1;
                break;
        }
        return $res;
    }

    protected function imtCheck($value) {
        $res = '';
        switch ($value) {
            case $value <= 16:
                $res = 5;
                break;
            
            case $value >= 17 && $value <= 18.4:
                $res = 4;
                break;
            
            case $value >= 25.1 && $value <= 26:
                $res = 2;
                break;
            
            case $value >= 18.5 && $value <= 25:
                $res = 1;
                break;
            
            default:
                $res = 3;
                break;
        }
        return $res;
    }

    protected function lilaCheck($value) {
        $res = '';
        switch ($value) {
            case $value <= 18.4:
                $res = 5;
                break;
            
            case $value >= 18.5 && $value <= 23.4:
                $res = 3;
                break;
            
            default:
                $res = 1;
                break;
        }
        return $res;
    }

    protected function smokeCheck($value) {
        $res = '';
        switch ($value) {
            case $value == 1:
                $res = 5;
                break;
            
            default:
                $res = 1;
                break;
        }
        return $res;
    }
}