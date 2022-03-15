<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventTypes;
use App\Models\RecordingScenarios;
use DataTables;
use PDF;

class RecordingScenariosController extends Controller
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
            $recording_scenarios = RecordingScenarios::all();

            return DataTables::of($recording_scenarios)
            ->addIndexColumn()

            ->editColumn('goal_achieved', function ($recording_scenario) {
                    return strip_tags(html_entity_decode($recording_scenario->goal_achieved));
            })
            ->editColumn('urgent_actions', function ($recording_scenario) {
                    return strip_tags(html_entity_decode($recording_scenario->urgent_actions));
            })
            ->editColumn('creating_management_team', function ($recording_scenario) {
                    return strip_tags(html_entity_decode($recording_scenario->creating_management_team));
            })
            ->editColumn('information_required', function ($recording_scenario) {
                    return strip_tags(html_entity_decode($recording_scenario->information_required));
            })
            ->editColumn('decision', function ($recording_scenario) {
                    return strip_tags(html_entity_decode($recording_scenario->decision));
            })
            ->addColumn('action', function($recording_scenario){

                $actionBtn = '
                <div class="row">
                <div class="col-xl-12 mb-2">
                <a href="'.url("/recording_scenarios/view/" . $recording_scenario->id).'" class="btn btn-block btn-warning">'. __("lang.view").'</a>
                </div>
                <div class="col-xl-12 mb-2">
                <a href="'.url("/recording_scenarios/edit/" . $recording_scenario->id).'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                </div>
                </div>
                ';

                return $actionBtn;
            })->rawColumns(['action'])
        ->make(true);
        }
        return view('dashboard.recordingScenarios.listScenario');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event_types = EventTypes::all();
        return view('dashboard.RecordingScenarios.addScenario', compact('event_types'));
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
            'event_type' => 'required',
            'goal_achieved' => 'required|min:2',
            'urgent_actions' => 'required|min:2',
            'creating_management_team' => 'required|min:2',
            'information_required' => 'required|min:2',
            'decision' => 'required|min:2',
        ]);

        $recording_scenario = new RecordingScenarios();
        $recording_scenario->event_type = $request->input('event_type');
        $recording_scenario->goal_achieved = $request->input('goal_achieved');
        $recording_scenario->urgent_actions = $request->input('urgent_actions');
        $recording_scenario->creating_management_team = $request->input('creating_management_team');
        $recording_scenario->information_required = $request->input('information_required');
        $recording_scenario->decision = $request->input('decision');
        $recording_scenario->save();

        $request->session()->flash('message', 'Successfully created Recording Scenario');
        return redirect()->route('recordingScenario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recording_scenario = RecordingScenarios::find($id);
        return view('dashboard.RecordingScenarios.showScenario', compact('recording_scenario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event_types = EventTypes::all();
        $recording_scenario = RecordingScenarios::find($id);
        return view('dashboard.RecordingScenarios.editScenario', compact('recording_scenario', 'event_types'));
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
            'event_type' => 'required',
            'goal_achieved' => 'required|min:2',
            'urgent_actions' => 'required|min:2',
            'creating_management_team' => 'required|min:2',
            'information_required' => 'required|min:2',
            'decision' => 'required|min:2',
        ]);
        $id = $request->input('id');
        $recording_scenario = RecordingScenarios::find($id);
        $recording_scenario->event_type = $request->input('event_type');
        $recording_scenario->goal_achieved = $request->input('goal_achieved');
        $recording_scenario->urgent_actions = $request->input('urgent_actions');
        $recording_scenario->creating_management_team = $request->input('creating_management_team');
        $recording_scenario->information_required = $request->input('information_required');
        $recording_scenario->decision = $request->input('decision');
        $recording_scenario->save();
        $request->session()->flash('message', 'Successfully updated Recording Scenario');
        return redirect()->route('recordingScenario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $recording_scenario = RecordingScenarios::find($id);
        if($recording_scenario){
            $recording_scenario->delete();
        }
        $request->session()->flash('message', 'Successfully deleted Recording Scenario');
        return redirect()->route('recordingScenario.index');
    }

    public function generatePDF(Request $request) {
        $data = ['data' => json_decode( $request->input('data') )];
        $pdf = PDF::loadView( 'dashboard.RecordingScenarios.pdf', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'ScenarioPDF-'.time().'_'.date('Y-m-d').'.pdf';
        return $pdf->download($name);
    }
}
