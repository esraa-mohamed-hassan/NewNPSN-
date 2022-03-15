<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecordingEventData;
use DataTables;
use DB;
use PDF;


class StatisticalEventsReceivedController extends Controller
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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $events = RecordingEventData::select(DB::raw('event_type as event, count(event_type) as count'))->groupBy('event_type')->get();

            return DataTables::of($events)
            ->addIndexColumn()
            ->make(true);
        }
        return view('dashboard.statistical.reportStatisticalEvents');
    }


    public function generatePDF(Request $request) {

        $data = ['data' => json_decode( $request->input('data'))];
        $pdf = PDF::loadView( 'dashboard.statistical.eventsPDF', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'statistical_eventsPDF-'.time().'_'.date('Y-m-d').'.pdf';
         return $pdf->download($name);
    }
}
