<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportsEntities;
use App\Models\RecordingIncomingReports;
use DataTables;
use PDF;


class RecordingIncomingReportsController extends Controller
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

    public function index(Request $request){
        if ($request->ajax()) {
            $you = auth()->user();
            $incoming_reports = RecordingIncomingReports::all();

            return DataTables::of($incoming_reports)
            ->addIndexColumn()

            ->editColumn('date', function ($incoming_report) {
                return \Carbon\Carbon::createFromFormat('Y-m-d', $incoming_report->date)->translatedFormat('d M Y');
            })
            ->editColumn('subject', function ($incoming_report) {
                    return strip_tags(html_entity_decode($incoming_report->subject));
            })
            ->editColumn('procedures_npsn', function ($incoming_report) {
                    return strip_tags(html_entity_decode($incoming_report->procedures_npsn));
            })
            ->editColumn('procedures_authorities', function ($incoming_report) {
                    return strip_tags(html_entity_decode($incoming_report->procedures_authorities));
            })
            ->editColumn('result', function ($incoming_report) {
                    return strip_tags(html_entity_decode($incoming_report->result));
            })
            ->addColumn('action', function($incoming_report){

                $actionBtn = '
                <div class="row">
                <div class="col-xl-12 mb-2">
                <a href="'.url("/recording_incoming_reports/view/" . $incoming_report->id).'" class="btn btn-block btn-warning">'. __("lang.view").'</a>
                </div>
                <div class="col-xl-12 mb-2">
                <a href="'.url("/recording_incoming_reports/edit/" . $incoming_report->id).'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                </div>
                </div>
                ';

                return $actionBtn;
            })->rawColumns(['action'])
        ->make(true);
        }
        return view('dashboard.recordingIncomingReports.listIncomingReport');
    }

    public function create(){
        $entities = ReportsEntities::all();
        return view('dashboard.recordingIncomingReports.addIncomingReport', compact('entities'));
    }

    public function show($id)
    {
        $incoming_report = RecordingIncomingReports::find($id);
        return view('dashboard.recordingIncomingReports.showIncomingReport', compact('incoming_report'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'report_entity' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'subject' => 'required|min:2',
            'procedures_npsn' => 'required|min:2',
            'procedures_authorities' => 'required|min:2',
            'result' => 'required|min:2',
        ]);

        $incoming_report = new RecordingIncomingReports();
        $incoming_report->entity = $request->input('report_entity');
        $incoming_report->date = date("Y-m-d", strtotime($request->input('date')));
        $incoming_report->time = $request->input('time');
        $incoming_report->subject = $request->input('subject');
        $incoming_report->procedures_npsn = $request->input('procedures_npsn');
        $incoming_report->procedures_authorities = $request->input('procedures_authorities');
        $incoming_report->result = $request->input('result');
        $incoming_report->save();

        $request->session()->flash('message', 'Successfully created Incoming Report');
        return redirect()->route('incomingreport.index');
    }

    public function edit($id)
    {
        $entities = ReportsEntities::all();
        $incoming_report = RecordingIncomingReports::find($id);
        return view('dashboard.recordingIncomingReports.editIncomingReport', compact('incoming_report', 'entities'));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'report_entity' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'subject' => 'required|min:2',
            'procedures_npsn' => 'required|min:2',
            'procedures_authorities' => 'required|min:2',
            'result' => 'required|min:2',
        ]);
        $id = $request->input('id');
        $incoming_report = RecordingIncomingReports::find($id);
        $incoming_report->entity = $request->input('report_entity');
        $incoming_report->date = date("Y-m-d", strtotime($request->input('date')));
        $incoming_report->time = $request->input('time');
        $incoming_report->subject = $request->input('subject');
        $incoming_report->procedures_npsn = $request->input('procedures_npsn');
        $incoming_report->procedures_authorities = $request->input('procedures_authorities');
        $incoming_report->result = $request->input('result');
        $incoming_report->save();
        $request->session()->flash('message', 'Successfully updated Incoming Report');
        return redirect()->route('incomingreport.index');
    }


    public function delete($id, Request $request)
    {
        $incoming_report = RecordingIncomingReports::find($id);
        if($incoming_report){
            $incoming_report->delete();
        }
        $request->session()->flash('message', 'Successfully deleted Incoming Report');
        return redirect()->route('incomingreport.index');
    }

    public function generatePDF(Request $request) {
        $data = ['data' => json_decode( $request->input('data') )];
        $pdf = PDF::loadView( 'dashboard.recordingIncomingReports.pdf', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'InquiryCommunicationsPDF-'.time().'_'.date('Y-m-d').'.pdf';
        return $pdf->download($name);
    }

}
