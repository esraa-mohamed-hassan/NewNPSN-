<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecordingIncomingReports;
use App\Models\ReportsEntities;
use DB;
use Carbon\Carbon;
use PDF;

class InquiryCommunicationsController extends Controller
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
        $entities = ReportsEntities::all();
        return view('dashboard.InquiryCommunications.listInquiryIncomming', compact('entities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entities = ReportsEntities::all();

            if ($request->ajax()) {

                DB::enableQueryLog();

                $entity = $_POST['entity'];
                $from_date = $_POST['from_date'];
                $to_date = $_POST['to_date'];


                $reports = RecordingIncomingReports::select('*');

                if(isset($entity) && !empty($entity)){
                    $reports->where('entity', 'like', '%' . $entity . '%');
                }

                if((isset($from_date) && !empty($from_date)) && (isset($to_date) && !empty($to_date))){
                    $reports->whereBetween('date',[ $from_date, $to_date]);
                }

                $dateS = Carbon::now()->subMonth(1);
                $dateE = Carbon::now();

                $results = $reports->whereBetween('created_at',[$dateS,$dateE])
                            ->orderBy('created_at', 'ASC')->get();
                $query = DB::getQueryLog();

               return  response()->json(['status'=> 'success', 'result' => $results]);
            }
    }


    public function print(Request $request)
    {
        $all_data = json_decode($request->input('data'));
        return view('dashboard.InquiryCommunications.showInquiryCommunications', compact('all_data'));
    }


    public function generatePDF(Request $request) {
        $data = ['data' => json_decode( $request->input('data') )];
        $pdf = PDF::loadView( 'dashboard.InquiryCommunications.pdf', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'InquiryCommunicationsPDF-'.time().'_'.date('Y-m-d').'.pdf';
        return $pdf->download($name);
    }

}
