<?php

namespace App\Http\Controllers\Penyuluh;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamVillage;
use App\Models\User;
use App\Models\UserTeam;
use App\Models\Village;
use Illuminate\Database\Eloquent\Builder;
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
        // return view('penyuluh.tim.show', [
        //     'title' => 'team',
        //     'subtitle' => 'detail',
        //     'active' => 'team',
        //     'team' => $team,
        // ]);
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

    public function showTeamVillage(Team $team, Village $village)
    {
        return view('penyuluh.tim.show', [
            'title' => 'team',
            'subtitle' => 'detail',
            'active' => 'team',
            'team' => $team,
            'village' => $village,
        ]);
    }

    public function getDataTim(Request $request)
    {
        if($request->ajax()) {
            // $data = Team::all();
            $data = TeamVillage::all();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    $name = '';
                    $name = $row->team->name;
                    return $name;
                })
                ->addColumn('village', function($row){
                    $village = '';
                    $village = $row->village->name;
                    return $village;
                })
                ->addColumn('count_tim', function($row){
                    $count = '0';
                    // $count = UserTeam::where('team_id', $row->id)->where('village_id', $row->village->id)->count();
                    $count = UserTeam::where('team_id', $row->team->id)->where('village_id', $row->village->id)->count();
                    // $count = UserTeam::where('team_id', $row->team->id)->where('village_id', $row->village->id)->toSql();
                    // $count = $row->village->id;
                    // echo $count;
                    return $count;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <div class="btn-group btn-group-sm">
                            <a href="'.route("penyuluh.showTeamVillage", [$row->team_id, $row->village_id]).'" class="btn btn-info">
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

    public function getDetailTimPendamping(Request $request, Team $team, Village $village)
    {
        if($request->ajax()) {

            $data = UserTeam::with('user')
                ->where('team_id', $team->id)
                ->where('village_id', $village->id)
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
                    // $role = $row->user->role->name;
                    $role = $row->as_user == '' ? '-' : $row->as_user;
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

    public function getDetailAnggotaPendamping(Request $request, Team $team)
    {
        if($request->ajax()) {
            $notin = UserTeam::where('team_id', array($team->id))->pluck('user_id');
            $data = User::with(['role', 'userteam'])
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
            
            $check = UserTeam::where('team_id', $team->id)
                    ->get();

            // if (isset($check)) {
            //     $count = 0;
            //     foreach ($check as $c) {
            //         if ($user->role_id == $c->user->role_id) {
            //             $count += 1;  
            //         } 
            //     }
            //     if ($count != 0) {
            //         $code = 500;
            //         $message = 'Peran Pendamping '.$user->name.' Sudah ada di '.$team->name;
            //     } else {
            //         $this->storeToTeam($team, $user);
            //         $message = 'Pendamping '.$user->name.' Berhasil Ditambahkan ke Tim';
            //     }
            //     // dd($message);
            // } else {
            //     $this->storeToTeam($team, $user);
            //     $message = 'Pendamping '.$user->name.' Berhasil Ditambahkan ke Tim';
            // }

            if (count($check) >= 3) {
                $message = 'Tim Sudah Penuh';
                $code = 500;
            } else {
                $this->storeToTeam($team, $user);
                $message = 'Pendamping '.$user->name.' Berhasil Ditambahkan ke Tim';
            }

            return response()->json([
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

    private function storeToTeam($team, $user)
    {
        $userTeam = new UserTeam;

        $userTeam->user_id = $user->id;
        $userTeam->team_id = $team->id;
        
        $userTeam->save();
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