<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportsOperationData;
use DataTables;

class ReportsOperationDataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $you = auth()->user();
            $all_operation_data = ReportsOperationData::all();

            return DataTables::of($all_operation_data)
            ->addIndexColumn()
            ->addColumn('action', function($operation_data){

                $actionBtn = '
                <div class="row">
                <div class="col-xl-6">
                <a href="'.url("/operation_data/edit/" . $operation_data->id).'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                </div>
                <div class="col-xl-6">
                <form action="'.url("/operation_data/delete/" . $operation_data->id ).'" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button class="btn btn-block btn-danger">'. __("lang.delete_operation_data").'</button>
                </form>
                </div>
                </div>
                ';

                return $actionBtn;
            })->rawColumns(['action'])
        ->make(true);
        }
        return view('dashboard.admin.reportsOperationData.operationDataList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.reportsOperationData.addOperationData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:64',
            'job' => 'required|min:2|max:64',
            'address' => 'required|min:2|max:64',
            'work_phone' => 'required|min:2',
            'phone' => 'required|min:11',
        ]);
        $operation_data = new ReportsOperationData();
        $operation_data->name = $request->input('name');
        $operation_data->job = $request->input('job');
        $operation_data->address = $request->input('address');
        $operation_data->work_phone = $request->input('work_phone');
        $operation_data->phone = $request->input('phone');
        $operation_data->save();
        $request->session()->flash('message', 'Successfully created Operation Data');
        return redirect()->route('operationData.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operation_data = ReportsOperationData::find($id);
        return view('dashboard.admin.reportsOperationData.operationDataShow', compact('operation_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation_data = ReportsOperationData::find($id);
        return view('dashboard.admin.reportsOperationData.operationDataEditForm', compact('operation_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:64',
            'job' => 'required|min:2|max:64',
            'address' => 'required|min:2|max:64',
            'work_phone' => 'required|min:2',
            'phone' => 'required|min:11',
        ]);
        $id = $request->input('id');
        $operation_data = ReportsOperationData::find($id);
        $operation_data->name = $request->input('name');
        $operation_data->job = $request->input('job');
        $operation_data->address = $request->input('address');
        $operation_data->work_phone = $request->input('work_phone');
        $operation_data->phone = $request->input('phone');
        $operation_data->save();
        $request->session()->flash('message', 'Successfully updated Operation Data');
        return redirect()->route('operationData.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $operation_data = ReportsOperationData::find($id);
        if($operation_data){
            $operation_data->delete();
        }
        $request->session()->flash('message', 'Successfully deleted Operation Data');
        return redirect()->route('operationData.index');
    }
}
