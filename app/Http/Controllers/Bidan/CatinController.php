<?php

namespace App\Http\Controllers\Bidan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catin;
use App\Models\CatinCriteria;
use App\Models\Criteria;
use App\Models\HistoryCatinCriteria;
use App\Models\UserTeam;
use App\Traits\Helpers;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class CatinController extends Controller
{
    use Helpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bidan.catin.index', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
            $user = Auth::user();
            $in = UserTeam::where('user_id', $user->id)->pluck('team_id');
            $data = Catin::with('desa', 'status')
                        // ->whereIn('team_id', $in->toArray())
                        ->get();
            
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
                        <a href="'.route("bidan.formValue", $row->id).'" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>
                            Tambah Nilai
                        </a>
                        <a href="'.route("bidan.historycriteria.index", $row->id).'" class="btn btn-sm btn-info">
                            <i class="fas fa-search"></i>
                            History
                        </a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
            return response()->json(['text'=>'only ajax request']);
        }
    }

    public function formValue(Catin $catin)
    {
        $criterias = Criteria::all();
        return view('bidan.catin.formvalue', [
            'title' => 'catin',
            'subtitle' => 'edit',
            'catin' => $catin,
            'criterias' => $criterias,
            'active' => 'catin',
        ]);
    }
    
    public function countAge(Request $request)
    {   
        if($request->ajax()) {
            $dateOfBirth = $request->date;
            $today = date("d-m-Y");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
            return response()->json([
                'data' => $diff->format('%y')
            ]);
        } else {
            return response()->json(['text'=>'only ajax request']);
        } 
    }

    public function storeValue(Request $request, Catin $catin)
    {
        $criterias = Criteria::all();

        $name = $request->name;
        $id = $request->id;

        $msg = '';

        if (count($name) == count($id)) {
            for ($i=1; $i <= count($id); $i++) { 
                $conversion = '';
                if ($name[$i]) {
                    switch ($criterias[$i-1]) {
                        case $criterias[$i-1]->name == 'umur':
                            $conversion = $this->ageCheck($name[$i]);
                            break;
                        
                        case $criterias[$i-1]->name == 'hb':
                            $conversion = $this->hbCheck($name[$i]);
                            break;
                        
                        case $criterias[$i-1]->name == 'imt':
                            $conversion = $this->imtCheck($name[$i]);
                            break;
                        
                        case $criterias[$i-1]->name == 'lila':
                            $conversion = $this->lilaCheck($name[$i]);
                            break;
                        
                        default:
                            $conversion = $this->smokeCheck($name[$i]);
                            break;
                    }
                    $this->storeDataCatinCriteria($catin->id, $id[$i], $name[$i], $conversion);
                    $msg = 'Data Kriteria Calon Pengantin ' . $catin->name .' berhasil ditambah';
                } 
                else {
                    $msg = "Form Harus Diisi";
                    return redirect()->back()->with('error', $msg);            
                }
            }
        } else {
            $msg = 'Internal server error';
        }
        return redirect()->route('penyuluh.catin.index')->with('success', $msg);   
    }

    protected function storeDataCatinCriteria($catin, $criteria, $value, $conversion)
    {
        CatinCriteria::updateOrCreate(
            [
                'catin_id' => $catin,
                'criteria_id' => $criteria,
            ],
            [
                'value' => $value,
                'conversion' => $conversion,
            ]
        );
        HistoryCatinCriteria::create([
            'catin_id' => $catin,
            'criteria_id' => $criteria,
            'value' => $value,
            'conversion' => $conversion,
        ]);
    }
}
