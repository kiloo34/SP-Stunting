<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catin;
use Yajra\DataTables\DataTables;

class CatinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kader.catin.index', [
            'title' => 'catin',
            'subtitle' => '',
            'active' => 'catin',
        ]);
    }

    public function getDataCatin(Request $request)
    {
        if($request->ajax()) {
            $data = Catin::with('desa', 'status')->get();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    $name = '';
                    $name = $row->name;
                    return $name;
                })
                ->addColumn('nik', function($row){
                    $nik = '';
                    $nik = $row->nik;
                    return $nik;
                })
                ->addColumn('village', function($row){
                    $village = '';
                    $village = $row->desa->name;
                    return $village;
                })
                ->addColumn('address', function($row){
                    $address = '';
                    $address = $row->address;
                    return $address;
                })
                ->addColumn('no_hp', function($row){
                    $no_hp = '';
                    $no_hp = $row->no_hp;
                    return $no_hp;
                })
                ->addColumn('status', function($row){
                    $status = '';
                    $status = $row->status->name;
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
            return response()->json(['text'=>'only ajax request']);
        }
    }
}
