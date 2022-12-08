<?php

namespace App\Http\Controllers\Penyuluh;

use App\Http\Controllers\Controller;
use App\Traits\Helpers;
use App\Traits\Maut;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    use Helpers, Maut;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { // menampilkan halman
        $catin = $this->activeCatin();
        $count = $this->countCatinCriteria($catin->toArray());

        return view('penyuluh.spk.index', [
            'title' => 'spk',
            'subtitle' => '',
            'active' => 'spk',
            'count' => $count,
        ]);
    }

    public function calculate(Request $request)
    {
        // if ($request->ajax()) {
            // $catin = $this->activeCatinWithRange(11);
            $catin = $this->activeCatin(); // status active
            $catinData = $this->getCatinidCriteria($catin->toArray()); // get data yang ada 
            $criteriaData = $this->getCatinCriteria($catin->toArray());
            $criteria = $this->getCriteria(); // kriteria
            $count = $this->countCatinCriteria($catin->toArray());

            // dump($catin);
            // dump($catinData);
            // dump($criteriaData); 
            // dump($criteria);
            // dump($count);
            // dump(count($criteriaData) / count($criteria) == $count);
            // dd();
            if (count($criteriaData) / count($criteria) == $count) {
                
                $a = [];
                $min = [];
                $max = [];
                $range = [];
                $aCalculate = [];
                $res = [];

                $data = [];

                // dump($catinData);
                for ($i=0; $i < count($catinData); $i++) { 
                    $data[$i]['catin']['id'] = $catinData[$i]->catin_id ;
                    $data[$i]['catin']['name'] = $catinData[$i]->catin->name ;
                    $data[$i]['catin']['desa'] = $catinData[$i]->catin->desa->name ;
                    for ($j=0; $j < count($criteria); $j++) { 
                        $res = $criteriaData->where('criteria_id', $criteria[$j]->id)->where('catin_id', $catinData[$i]->catin_id)->first();
                        $a[$i][$j] = $res->conversion;
                        $val = $criteriaData->where('criteria_id', $criteria[$j]->id)->pluck('conversion');
                        $min[$i] = $this->minVal($val->toArray());
                        $max[$i] = $this->maxVal($val->toArray());
                        $aCalculate[$i][$j] = $this->countA($a[$i][$j], $min[$i], $max[$i]);
                        
                        $data[$i]['a'][$j] = $a[$i][$j];
                        $data[$i]['aCalculate'][$j] = $aCalculate[$i][$j];
                        $data[$i]['min'] = $min[$i];
                        $data[$i]['max'] = $max[$i];
                    }
                    $range[$i] = $this->range($max[$i], $min[$i]);
                    $data[$i]['range'] = $range[$i];
                    $data[$i]['value'] = $this->rank($data[$i]['aCalculate'], $criteria);
                }

                // dump($data);
                $columns = array_column($data, 'value');
                array_multisort($columns, SORT_DESC, $data);
                // dump($data);
                // dd();
            } 
            
            return response()->json(
                [
                    'code' => '200',
                    'data' => $data 
                ]
            );

            // dd();
        // } else {
        //     return response()->json(['text'=>'only ajax request']);
        // }
    }

    // function cmp($a, $b) {
    //     if ($a["value"] == $b["value"]) {
    //         return 0;
    //     }
    //     return ($a["value"] < $b["value"]) ? -1 : 1;
    // }
}
