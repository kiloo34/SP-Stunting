<?php

namespace App\Http\Controllers\Penyuluh;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use App\Models\UserTeam;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penyuluh.tim.index', [
            'title' => 'team',
            'subtitle' => '',
            'active' => 'team',
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
    public function show(Team $team)
    {
        // dd($team);
        return view('penyuluh.tim.show', [
            'title' => 'team',
            'subtitle' => 'detail',
            'active' => 'team',
            'team' => $team,
        ]);
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

    public function getDataTim(Request $request)
    {
        if($request->ajax()) {
            $data = Team::all();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    $name = '';
                    $name = $row->name;
                    return $name;
                })
                ->addColumn('count_tim', function($row){
                    // $nik = $row->nik != null ? $row->nik : '-';
                    $count = '0';
                    $count = UserTeam::where('team_id', $row->id)->get()->count();
                    return $count;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <div class="btn-group btn-group-sm">
                            <a href="'.route("penyuluh.team.show", $row->id).'" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="'.route("penyuluh.team.edit", $row->id).'" class="btn btn-primary">
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

    public function getDetailTimPendamping(Request $request, Team $team)
    {
        if($request->ajax()) {
            $data = UserTeam::where('team_id', $team->id)
                            ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    $name = '-';
                    $name = $row->user->name;
                    return $name;
                })
                ->addColumn('role', function($row){
                    $role = '-';
                    $role = $row->user->role->name;
                    return $role;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <div class="btn-group btn-group-sm">
                            <a href="#" class="btn btn-danger" onclick="removeFromTeam('.$row->user_id.')">
                                <i class="fas fa-minus"></i>
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

    public function getDetailAnggotaPendamping(Request $request)
    {
        if($request->ajax()) {
            $notin = UserTeam::pluck('user_id');
            $data = User::with('role')
                        ->whereNotIn('id', $notin->toArray())
                        ->whereIn('role_id', [2,3,4])
                        ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    $name = '-';
                    $name = $row->name;
                    return $name;
                })
                ->addColumn('role', function($row){
                    $role = '-';
                    $role = $row->role->name;
                    return $role;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <div class="btn-group btn-group-sm">
                            <a href="#" class="btn btn-primary" onclick="addToTeam('.$row->id.')">
                                <i class="fas fa-plus"></i>
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

    public function updateToTeam(Request $request, Team $team, User $user)
    {
        $message = '';
        $code = '';
        if ($request->ajax()) {
            $userTeam = new UserTeam;

            $userTeam->user_id = $user->id;
            $userTeam->team_id = $team->id;
            
            $userTeam->save();
            $message = 'Pendamping '.$user->name.' Berhasil Ditambahkan ke Tim';

            return response()->json([
                // 'obat' => $medicine,
                // 'transaksi' => $transaction,
                'message'   => $message,
                'code'      => $code
            ]);
        } else {
            $message = 'only ajax request';
            return response()->json([
                'message' => $message,
            ]);
        }
    }

    public function removeFromTeam(Request $request, Team $team, User $user)
    {
        $message = '';
        $code = '';
        if ($request->ajax()) {
            $target = UserTeam::where('user_id', $user->id)
                            ->where('team_id', $team->id);
            $target->delete();    
            return response()->json([
                'message' => 'Pendamping '.$user->name.' berhasil di hapus dari '.$team->name.'!'
            ]);
        } else {
            $message = 'only ajax request';
            return response()->json([
                'message' => $message,
            ]);
        }
    }
}