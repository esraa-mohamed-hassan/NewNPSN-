<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecordingIncomingReports;
use DataTables;
use DB;
use PDF;


class StatisticalCommunicationsController extends Controller
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
            $all_incoming_reports = RecordingIncomingReports::select(DB::raw('entity, count(entity) as count'))->groupBy('entity')->get();

            return DataTables::of($all_incoming_reports)
            ->addIndexColumn()
            ->make(true);
        }
        return view('dashboard.statistical.reportStatisticalCommunications');
    }


    public function generatePDF(Request $request) {

        $data = ['data' => json_decode( $request->input('data'))];
        $pdf = PDF::loadView( 'dashboard.statistical.communicationPDF', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'statistical_communicationPDF-'.time().'_'.date('Y-m-d').'.pdf';
         return $pdf->download($name);
    }
}
