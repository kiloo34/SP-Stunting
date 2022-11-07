<?php

namespace App\Traits;

use App\Models\Criteria;

trait Maut {
    
    protected function minVal($array)
    {
        return min($array);
    }

    protected function maxVal($array)
    {
        return max($array);
    }

    protected function range($max, $min)
    {
        return $max - $min;
    }

    // =(U15-$AB$15)/($AB$16-$AB$15)
    // ($conversion - $min) / ($max - $min)
    protected function countA($conversion, $min, $max)
    {
        return $max - $min != 0 ? ($conversion - $min) / ($max - $min) : 0;
    }

    // (AB19*$M$12)+(AC19*$N$12)+(AD19*$O$12)+(AE19*$P$12)+(AF19+$Q$12)
    public function rank($aCalArray, $criteriaArray)
    {
        $res = 0;
        if (count($aCalArray) == count($criteriaArray)) {
            $total = Criteria::sum('value');
            for ($i=0; $i < count($criteriaArray); $i++) { 
                $weight[$i] = $criteriaArray[$i]->value / $total;
                $res += ($aCalArray[$i] * $weight[$i]);
            }
        }
        return $res;
    }

}