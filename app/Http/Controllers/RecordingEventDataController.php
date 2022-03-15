<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportsEntities;
use App\Models\EventTypes;
use App\Models\RecordingEventData;
use DataTables;
use PDF;

class RecordingEventDataController extends Controller
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
            $recording_events = RecordingEventData::all();

            return DataTables::of($recording_events)
            ->addIndexColumn()

            ->editColumn('special_entity', function ($recording_event) {
                    return strip_tags(html_entity_decode($recording_event->special_entity));
            })
            ->editColumn('event', function ($recording_event) {
                    return strip_tags(html_entity_decode($recording_event->event));
            })
            ->editColumn('procedures', function ($recording_event) {
                    return strip_tags(html_entity_decode($recording_event->procedures));
            })
            ->editColumn('result', function ($recording_event) {
                    return strip_tags(html_entity_decode($recording_event->result));
            })
            ->addColumn('action', function($recording_event){

                $actionBtn = '
                <div class="row">
                <div class="col-xl-12 mb-2">
                <a href="'.url("/recording_event_data/view/" . $recording_event->id).'" class="btn btn-block btn-warning">'. __("lang.view").'</a>
                </div>
                <div class="col-xl-12 mb-2">
                <a href="'.url("/recording_event_data/edit/" . $recording_event->id).'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                </div>
                </div>
                ';

                return $actionBtn;
            })->rawColumns(['action'])
        ->make(true);
        }
        return view('dashboard.recordingEventData.listRecordingEvent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entities = ReportsEntities::all();
        $event_types = EventTypes::all();
        return view('dashboard.recordingEventData.addRecordingEvent', compact('entities', 'event_types'));
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
            'entity_type' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'special_entity' => 'required|min:2',
            'event' => 'required|min:2',
            'procedures' => 'required|min:2',
            'result' => 'required|min:2',
        ]);

        $recording_event = new RecordingEventData();
        $recording_event->event_type = $request->input('event_type');
        $recording_event->entity_type = $request->input('entity_type');
        $recording_event->date = date("Y-m-d", strtotime($request->input('date')));
        $recording_event->time = $request->input('time');
        $recording_event->special_entity = $request->input('special_entity');
        $recording_event->event = $request->input('event');
        $recording_event->procedures = $request->input('procedures');
        $recording_event->result = $request->input('result');
        $recording_event->save();

        $request->session()->flash('message', 'Successfully created Recording Event Data');
        return redirect()->route('recordingEvent.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recording_event = RecordingEventData::find($id);
        return view('dashboard.recordingEventData.showRecordingEvent', compact('recording_event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entities = ReportsEntities::all();
        $event_types = EventTypes::all();
        $recording_event = RecordingEventData::find($id);
        return view('dashboard.recordingEventData.editRecordingEvent', compact('recording_event', 'entities', 'event_types'));
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
            'entity_type' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'special_entity' => 'required|min:2',
            'event' => 'required|min:2',
            'procedures' => 'required|min:2',
            'result' => 'required|min:2',
        ]);
        $id = $request->input('id');
        $recording_event = RecordingEventData::find($id);
        $recording_event->event_type = $request->input('event_type');
        $recording_event->entity_type = $request->input('entity_type');
        $recording_event->date = date("Y-m-d", strtotime($request->input('date')));
        $recording_event->time = $request->input('time');
        $recording_event->special_entity = $request->input('special_entity');
        $recording_event->event = $request->input('event');
        $recording_event->procedures = $request->input('procedures');
        $recording_event->result = $request->input('result');
        $recording_event->save();
        $request->session()->flash('message', 'Successfully updated Recording Event Data');
        return redirect()->route('recordingEvent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $recording_event = RecordingEventData::find($id);
        if($recording_event){
            $recording_event->delete();
        }
        $request->session()->flash('message', 'Successfully deleted Recording Event Data');
        return redirect()->route('recordingEvent.index');
    }

    public function generatePDF(Request $request) {
        $data = ['data' => json_decode( $request->input('data') )];
        $pdf = PDF::loadView( 'dashboard.recordingEventData.pdf', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'EventDataPDF-'.time().'_'.date('Y-m-d').'.pdf';
        return $pdf->download($name);
    }
}
