<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use App\Models\Catin;
use App\Models\CatinCriteria;
use App\Models\HistoryCatinCriteria;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HistoryCriteriaCatinController extends Controller
{
    public function index(Catin $catin)
    {
        return view('bidan.catin.historycriteriacatin', [
            'title' => 'catin',
            'subtitle' => 'history',
            'catin' => $catin,
            'active' => 'catin',
        ]);
    }

    public function geAlltHistory(Request $request, Catin $catin)
    {
        if($request->ajax()) {
            
            $data = HistoryCatinCriteria::with('criteria')
            // $data = CatinCriteria::with('criteria')
                        ->where('catin_id', $catin->id)
                        ->get();
            // dump($catin);
            // dump($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('criteria_name', function($row){
                    $name = '';
                    $name = $row->criteria->name;
                    return $name;
                })
                ->addColumn('value', function($row){
                    $value = '';
                    $value = $row->value;
                    return $value;
                })
                ->addColumn('created_at', function($row){
                    $created = '';
                    $created = $row->created_at != '' ? $row->created_at->isoFormat('dddd, D MMMM Y') : '-';
                    return $created;
                })
                ->make(true);
        } else {
            return response()->json(['text'=>'only ajax request']);
        }
    }
}
