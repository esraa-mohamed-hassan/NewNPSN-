<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypicalReportsMedicalServices;
use DataTables;

class ReportsMedicalServicesController extends Controller
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
            $all_medical_services = TypicalReportsMedicalServices::all();

            return DataTables::of($all_medical_services)
            ->addIndexColumn()
            ->addColumn('action', function($medical_service){

                $actionBtn = '
                <div class="row">
                <div class="col-xl-6" style="max-width: 35%;margin-left: -4%;">
                <a href="'.url("/medical_services/edit/" . $medical_service->id).'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                </div>
                <div class="col-xl-6" style="max-width: 35%;margin-left: -4%;">
                <form action="'.url("/medical_services/delete/" . $medical_service->id ).'" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button class="btn btn-block btn-danger">'. __("lang.delete").'</button>
                </form>
                </div>
                </div>
                ';

                return $actionBtn;
            })->rawColumns(['action'])
        ->make(true);
        }
        return view('dashboard.admin.reportsMedicalServices.medicalServicesList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.reportsMedicalServices.addMedicalServices');
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
            'hospital' => 'required|min:2|max:64',
            'address' => 'required|min:2|max:64',
            'phone' => 'required|numeric|min:11',
            'no_doctors' => 'required|numeric',
            'no_beds' => 'required|numeric',
            'no_operating_rooms' => 'required|numeric',
        ]);
        $medical_service = new TypicalReportsMedicalServices();
        $medical_service->hospital = $request->input('hospital');
        $medical_service->address = $request->input('address');
        $medical_service->phone = $request->input('phone');
        $medical_service->no_doctors = $request->input('no_doctors');
        $medical_service->no_beds = $request->input('no_beds');
        $medical_service->no_operating_rooms = $request->input('no_operating_rooms');
        $medical_service->save();
        $request->session()->flash('message', 'Successfully created Medical Services');
        return redirect()->route('medicalServices.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medical_service = TypicalReportsMedicalServices::find($id);
        return view('dashboard.admin.reportsMedicalServices.medicalServicesShow', compact('medical_service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medical_service = TypicalReportsMedicalServices::find($id);
        return view('dashboard.admin.reportsMedicalServices.medicalServicesEditForm', compact('medical_service'));
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
        $validatedData = $request->validate([
            'hospital' => 'required|min:2|max:64',
            'address' => 'required|min:2|max:64',
            'phone' => 'required|numeric|min:11',
            'no_doctors' => 'required|numeric',
            'no_beds' => 'required|numeric',
            'no_operating_rooms' => 'required|numeric',
        ]);
        $id = $request->input('id');
        $medical_service = TypicalReportsMedicalServices::find($id);
        $medical_service->hospital = $request->input('hospital');
        $medical_service->address = $request->input('address');
        $medical_service->phone = $request->input('phone');
        $medical_service->no_doctors = $request->input('no_doctors');
        $medical_service->no_beds = $request->input('no_beds');
        $medical_service->no_operating_rooms = $request->input('no_operating_rooms');
        $medical_service->save();
        $request->session()->flash('message', 'Successfully updated Medical Services');
        return redirect()->route('medicalServices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $medical_service = TypicalReportsMedicalServices::find($id);
        if($medical_service){
            $medical_service->delete();
        }
        $request->session()->flash('message', 'Successfully deleted Medical Services');
        return redirect()->route('medicalServices.index');
    }
}
