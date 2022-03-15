<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportsEntities;
use DataTables;


class ReportsEntitiesController extends Controller
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

    public function index(Request $request){
        if ($request->ajax()) {
            $you = auth()->user();
            $entities = ReportsEntities::all();

            return DataTables::of($entities)
            ->addIndexColumn()
            ->addColumn('action', function($entity){

                $actionBtn = '
                <div class="row">
                <div class="col-xl-6">
                <a href="'.url("/report_destinations/edit/" . $entity->id).'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                </div>
                <div class="col-xl-6">
                <form action="'.route("entity.delete", $entity->id ).'" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button class="btn btn-block btn-danger">'. __("lang.delete_entity").'</button>
                </form>
                </div>
                </div>
                ';

                return $actionBtn;
            })->rawColumns(['action'])
        ->make(true);
        }
        return view('dashboard.admin.recordingIncomingReports.reportListEntity');
    }

    public function create(){
        return view('dashboard.admin.recordingIncomingReports.reportAddEntity');
    }

    public function show($id)
    {
        $entity = ReportsEntities::find($id);
        return view('dashboard.admin.recordingIncomingReports.reportEntityShow', compact('entity'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'entity_name' => 'required|min:1|max:64'
        ]);
        $reports_entities = new ReportsEntities();
        $reports_entities->entity_name = $request->input('entity_name');
        $reports_entities->save();
        $request->session()->flash('message', 'Successfully created ReportsEntities');
        return redirect()->route('entity.index');
    }

    public function edit($id)
    {
        $entity = ReportsEntities::find($id);
        return view('dashboard.admin.recordingIncomingReports.reportEntityEditForm', compact('entity'));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'entity_name' => 'required|min:1|max:64'
        ]);
        $id = $request->input('id');
        $entity = ReportsEntities::find($id);
        $entity->entity_name = $request->input('entity_name');
        $entity->save();
        $request->session()->flash('message', 'Successfully updated entity');
        return redirect()->route('entity.index');
    }


    public function delete($id, Request $request)
    {
        $entity = ReportsEntities::find($id);
        if($entity){
            $entity->delete();
        }
        $request->session()->flash('message', 'Successfully deleted entity');
        return redirect()->route('entity.index');
    }

}
