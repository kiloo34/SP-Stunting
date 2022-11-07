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
    {
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
            $catin = $this->activeCatin();
            $catinData = $this->getCatinidCriteria($catin->toArray());
            $criteriaData = $this->getCatinCriteria($catin->toArray());
            $criteria = $this->getCriteria();
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
                // $res = [];

                $data = [];

                for ($i=0; $i < count($catinData); $i++) { 
                    $data[$i]['catin'] = $catinData[$i]->catin_id ;
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
                    // dump($data[$i]);
                    // $data[$k]['calculateA'][$i] = $this->countA($data[$k]['a'][$i][$j], $data[$k]['min'][$i], $data[$k]['max'][$i]);
                    // dump($data[$i]['aCalculate'], $criteria);
                    $res[$i] = $this->rank($data[$i]['aCalculate'], $criteria);
                    // $data[$i]['res'] = $this->rank($data[$i]['aCalculate'], $criteria);
                    dump($res[$i]);
                }
                // dump($min);
                // dump($max);
                // dump($range);
                // dump($criteria);
                // dump($res);
                // dump($data);
                
                dd();
                // for ($j=0; $j < count($criteria); $j++) { 
                //     $data[$i]['min'] = $this->minVal($data[$i]['a']);
                //     $data[$i]['max'] = $this->maxVal($data[$i]['a']);
                // }
                // dump(count($data));
                
                // $dataMin = [];
                // for ($i=0; $i < count($data); $i++) { 
                //     for ($j=0; $j < count($criteria); $j++) { 
                //         // dump($data[$i]['a'][$j]);
                //         $dataMin[$i] = $data[$i]['a'][$j];
                //     }
                //     // dump($data[$i]['a']);
                //     // dump(count($data[$i]['a']));
                // }
                // dump($dataMin);
                // for ($i=0; $i < count($criteria); $i++) {
                //     $data[$i]['criteria'] = $criteriaData->where('criteria_id', $criteria[$i]->id)->pluck('conversion');
                // }
                // dump($data);
                // dump($criteriaData);

            //     for ($k=0; $k < count($catinData); $k++) { 
            //         $data[$k]['catin'] = $catinData[$k];
                    
            //         for ($i=0; $i < count($criteria); $i++) { 

            //             // $a[$i] = $criteriaData->where('criteria_id', $criteria[$i]->id)->pluck('conversion');
            //             // $dataCatin = $criteriaData->where('criteria_id', $criteria[$i]->id)->pluck('catin_id');
            //             $data[$k]['a'] = $criteriaData
            //                 ->where('criteria_id', $criteria[$i]->id)
            //                 // ->where('catin_id', $catinData[$k]->id)
            //                 ->pluck('conversion');

            //             // dump($criteria[$i]->id);
            //             // dump($data[$k]['a']);
            //             // dd();
            //             // dump($criteria[$i]);
            //             // dump($criteriaData->where('criteria_id', $criteria[$i]->id)->pluck('conversion'));
            //             // $a[$i] = $criteriaData->where('criteria_id', $criteria[$i]->id);
            //             // dd($a[$i]);
            //             // $min[$i] = $this->minVal($a[$i]->toArray());
            //             // $max[$i] = $this->maxVal($a[$i]->toArray());
            //             // $range[$i] = $this->range($max[$i], $min[$i]);

            //             $data[$k]['min'] = $this->minVal($data[$k]['a']->toArray());
            //             $data[$k]['max'] = $this->maxVal($data[$k]['a']->toArray());
            //             $data[$k]['range'] = $this->range($data[$k]['max'], $data[$k]['min']);

            //             // for ($j=0; $j < count($data[$k]['a'][$i]); $j++) { 
            //                 // $aCalculate[$i][$j] = $this->countA($a[$i][$j], $min[$i], $max[$i]);
            //                 // $data[$k]['calculateA'][$i] = $this->countA($data[$k]['a'][$i][$j], $data[$k]['min'][$i], $data[$k]['max'][$i]);
            //             // }
                        
            //             // dump($a[$i]);
            //             // dump($min[$i]);
            //             // dump($max[$i]);
            //             // dump($range[$i]);
            //             // dump($aCalculate[$i]);

            //             // dump($data[$k]['a'][$i]);
            //             // dump($data[$k]['min']);
            //             // dump($data[$k]['max']);
            //             // dump($data[$k]['range']);
            //             // dump($data[$k]['calculateA'][$i]);
            //             // dump('            ');
            //             // dump($data[$k]);
                        
            //         }

            //         // dump($data[$k]);

            //         // dump($criteriaData->where('criteria_id', $criteria[$i]->id));
            //     }
            //     dump($data);
            }

            // dd();
        // } else {
        //     return response()->json(['text'=>'only ajax request']);
        // }
    }
}
