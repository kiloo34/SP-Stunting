<?php

namespace App\Http\Controllers\Penyuluh;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Role;
use App\Models\Village;

use App\Http\Requests\Penyuluh\UserRequest;

use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penyuluh.user.index', [
            'title' => 'user',
            'subtitle' => '',
            'active' => 'user',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penyuluh.user.create', [
            'title' => 'user',
            'subtitle' => 'create',
            'active' => 'user',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        
        $user->name = $request->name;
        $user->username = $request->name.rand(pow(10, 3-1), pow(10, 3)-1);
        $user->password = bcrypt('12345678');
        $user->nik = $request->nik;
        $user->no_hp = $request->no_hp;
        $user->address = $request->alamat;
        $user->village_id = $request->village;
        $user->role_id = $request->role;
        $user->save();

        // Catin::create($request->all());
        return redirect()->route('penyuluh.user.index')->with('success', 'Data User ' . $request->name .' berhasil ditambah');
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

    public function getDataUser(Request $request)
    {
        if($request->ajax()) {
            $data = User::with('desa', 'role')
                        ->whereIn('role_id', [2,3,4])
                        ->get();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    $name = '';
                    $name = $row->name;
                    return $name;
                })
                ->addColumn('nik', function($row){
                    $nik = $row->nik != null ? $row->nik : '-';
                    return $nik;
                })
                ->addColumn('village', function($row){
                    $village = $row->desa->name != null ? $row->desa->name : '-' ;
                    return $village;
                })
                ->addColumn('address', function($row){
                    $address = $row->address != null ? $row->address : '-';
                    return $address;
                })
                ->addColumn('no_hp', function($row){
                    $no_hp = $row->no_hp != null ? $row->no_hp : '-';
                    return $no_hp;
                })
                ->addColumn('username', function($row){
                    $username = $row->username != null ? $row->username : '-';
                    return $username;
                })
                ->addColumn('role', function($row){
                    $username = $row->role->name != null ? $row->role->name : '-';
                    return $username;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <div class="btn-group btn-group-sm">
                            <a href="'.route("penyuluh.user.show", $row->id).'" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="'.route("penyuluh.user.edit", $row->id).'" class="btn btn-primary">
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

    public function getDataUserDesa(Request $request)
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

    public function getDataUserRole(Request $request)
    {
        if($request->ajax()) {
            $data = Role::whereIn('id', [2,3,4])->get();
            return response()->json([
                'data' => $data
            ]);
        } else {
            return response()->json(['text'=>'only ajax request']);
        }
    }
}
