<?php

namespace App\Http\Controllers\Penyuluh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catin;
use App\Models\CatinStatus;
use App\Models\Village;

use App\Http\Requests\CatinRequest;

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
        return view('penyuluh.catin.index', [
            'title' => 'catin',
            'subtitle' => '',
            'active' => 'catin',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penyuluh.catin.create', [
            'title' => 'catin',
            'subtitle' => 'create',
            'active' => 'catin',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatinRequest $request)
    {
        $catin = new Catin;
        
        $catin->name = $request->name;
        $catin->nik = $request->nik;
        $catin->no_hp = $request->no_hp;
        $catin->age = $request->age;
        $catin->address = $request->alamat;
        $catin->village_id = $request->village;
        $catin->status_id = $request->status;
        $catin->save();

        // Catin::create($request->all());
        return redirect()->route('penyuluh.catin.index')->with('success', 'Data Calon Pengantin ' . $request->name .' berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Catin $catin)
    {
        // dd($id);
        // dd($catin);
        return view('penyuluh.catin.edit', [
            'title' => 'catin',
            'subtitle' => 'edit',
            'catin' => $catin,
            'active' => 'catin',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
                    $actionBtn = '
                        <div class="btn-group btn-group-sm">
                            <a href="#" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="'.route("penyuluh.catin.edit", $row->id).'" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
            return response()->json(['text'=>'only ajax request']);
        }
    }

    public function getDataCatinDesa(Request $request)
    {
        if($request->ajax()) {
            $data = Village::all();
            return response()->json([
                'data' => $data
            ]);
        } else {
            return response()->json(['text'=>'only ajax request']);
        }
    }

    public function getDataCatinStatus(Request $request)
    {
        if($request->ajax()) {
            $data = CatinStatus::all();
            return response()->json([
                'data' => $data
            ]);
        } else {
            return response()->json(['text'=>'only ajax request']);
        }
    }
}