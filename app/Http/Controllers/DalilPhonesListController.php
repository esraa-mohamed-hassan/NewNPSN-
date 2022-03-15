<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DalilPhonesList;
use App\Models\DalilDestinationsEntities;
use App\Models\SubDestinationsEntities;
use DataTables;

class DalilPhonesListController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        if ($request->ajax()) {
            $dalil_phones = DalilPhonesList::with('entities')->get();

            return DataTables::of($dalil_phones)
            ->addIndexColumn()
            ->editColumn('dalil_entity', function ($dalil_phone) {
                return $dalil_phone->entities->entity;
            })

            ->addColumn('action', function($dalil_phone){
                $actionBtn = '
                <div class="row">
                <div class="col-xl-4">
                <a href="'.url("/recording_dalil_phone/view/" . $dalil_phone->id).'" class="btn btn-block btn-warning">'. __("lang.view").'</a>
                </div>
                <div class="col-xl-34">
                <a href="'.url("/recording_dalil_phone/edit/" . $dalil_phone->id).'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                </div>
                <div class="col-xl-4">
                <form action="'.url("/recording_dalil_phone/delete/" . $dalil_phone->id ).'" method="POST">
                <input type="hidden" name="_method" value="DELETE">'. csrf_field() .'
                <button class="btn btn-block btn-danger">'. __("lang.delete_dalil_phone").'</button>
                </form>
                </div>
                </div>
                ';

                return $actionBtn;
            })->rawColumns(['action'])
        ->make(true);
        }
        return view('dashboard.recordingDalilPhones.listRecordingPhone');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dalil_entities = DalilDestinationsEntities::all();
        return view('dashboard.recordingDalilPhones.addRecordingPhone', compact('dalil_entities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sub_Dentity = $request->input('sub_Dentity');
        if(isset($sub_Dentity) && $sub_Dentity == null ){
            $validatedData = $request->validate([
                'Dentity' => 'required',
                'sub_Dentity' => 'required',
                'name' => 'required|min:2|max:100',
                'job' => 'required|min:2|max:100',
            ]);
        }else{
            $validatedData = $request->validate([
                'Dentity' => 'required',
                'name' => 'required|min:2|max:100',
                'job' => 'required|min:2|max:100',
            ]);
        }
// dd($request->input());

        $dalil_phone = new DalilPhonesList();
        $dalil_phone->entity_id = $request->input('Dentity');
        $dalil_phone->sub_entity_id = $sub_Dentity;
        $dalil_phone->name = $request->input('name');
        $dalil_phone->job = $request->input('job');
        $dalil_phone->phone = $request->input('phone');
        $dalil_phone->mobile = $request->input('mobile');
        $dalil_phone->fax = $request->input('fax');
        $dalil_phone->save();

        $request->session()->flash('message', 'Successfully created Recording Dalil Phone');
        return redirect()->route('dalilPhone.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dalil_phone = DalilPhonesList::with('entities', 'subEntities')->find($id);
        return view('dashboard.recordingDalilPhones.showRecordingPhone', compact('dalil_phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dalil_entities = DalilDestinationsEntities::all();
        $sub_entities = SubDestinationsEntities::all();
        $dalil_phone = DalilPhonesList::find($id);
        return view('dashboard.recordingDalilPhones.editRecordingPhone', compact('dalil_phone', 'dalil_entities', 'sub_entities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $sub_Dentity = $request->input('sub_Dentity');
        if(isset($sub_Dentity) && $sub_Dentity == null ){
            $validatedData = $request->validate([
                'Dentity' => 'required',
                'sub_Dentity' => 'required',
                'name' => 'required|min:2|max:100',
                'job' => 'required|min:2|max:100',
            ]);
        }else{
            $validatedData = $request->validate([
                'Dentity' => 'required',
                'name' => 'required|min:2|max:100',
                'job' => 'required|min:2|max:100',
            ]);
        }
        $id = $request->input('id');
        $dalil_phone = DalilPhonesList::find($id);
        $dalil_phone->entity_id = $request->input('Dentity');
        $dalil_phone->sub_entity_id = $sub_Dentity;
        $dalil_phone->name = $request->input('name');
        $dalil_phone->job = $request->input('job');
        $dalil_phone->phone = $request->input('phone');
        $dalil_phone->mobile = $request->input('mobile');
        $dalil_phone->fax = $request->input('fax');
        $dalil_phone->save();
        $request->session()->flash('message', 'Successfully updated Recording Dalil Phone');
        return redirect()->route('dalilPhone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $dalil_phone = DalilPhonesList::find($id);
        if($dalil_phone){
            $dalil_phone->delete();
        }
        $request->session()->flash('message', 'Successfully deleted Recording Dalil Phone');
        return redirect()->route('dalilPhone.index');
    }

    public function getEntities($id)
    {
        $dalil_entity = DalilDestinationsEntities::with('subEntities')->find($id);
        return response()->json(['message' => 'success', 'result' =>  $dalil_entity ]);
    }
}
