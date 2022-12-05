<?php

namespace App\Http\Controllers\Penyuluh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Penyuluh\CriteriaRequest;
use App\Models\Criteria;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penyuluh.criteria.index', [
            'title' => 'criteria',
            'subtitle' => '',
            'active' => 'criteria',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penyuluh.criteria.create', [
            'title' => 'criteria',
            'subtitle' => '',
            'active' => 'criteria',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CriteriaRequest $request)
    {
        $criteria = new Criteria;
        
        $criteria->name = $request->name;
        $criteria->as = $request->as;
        $criteria->value = $request->value;

        $criteria->save();

        return redirect()->route('penyuluh.criteria.index')->with('success', 'Data Kriteria ' . $request->name .' berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Criteria $criterion)
    {
        return view('penyuluh.criteria.show', [
            'title' => 'criteria',
            'subtitle' => 'show',
            'criteria' => $criterion,
            'active' => 'criteria',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Criteria $criterion)
    {
        return view('penyuluh.criteria.edit', [
            'title' => 'criteria',
            'subtitle' => 'edit',
            'criteria' => $criterion,
            'active' => 'criteria',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CriteriaRequest $request, Criteria $criterion)
    {
        Criteria::where('id', $criterion->id)
            ->update([
                'name' => $request->name,
                'as' => $request->as,
                'value' => $request->value,
            ]);

        return redirect()->route('penyuluh.criteria.index')->with('success', 'Data Kriteria berhasil di update');
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

    public function getCriteria(Request $request)
    {
        if ($request->ajax()) {
            $data = Criteria::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    $name = '';
                    $name = $row->name != null ? $row->name : '-';
                    return $name;
                })
                ->addColumn('as', function($row){
                    $as = '';
                    $as = $row->as != null ? $row->as : '-';
                    return $as;
                })
                ->addColumn('value', function($row){
                    $value = '';
                    $value = $row->value != null ? $row->value : '-';
                    return $value;
                })
                ->addColumn('conversion', function($row){
                    $conversion = '';
                    
                    $total = Criteria::sum('value');

                    $conversion = $row->value != null ? ($row->value/$total) : '-';
                    return $conversion;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                        <div class="btn-group btn-group-sm">
                            <a href="'.route("penyuluh.criteria.show", $row->id).'" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="'.route("penyuluh.criteria.edit", $row->id).'" class="btn btn-primary">
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
}
