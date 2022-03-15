<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecordingIncomingReports;
use App\Models\ReportsEntities;
use DataTables;
use DB;
use Carbon\Carbon;
use League\CommonMark\Util\HtmlElement;
use PDF;

class SpecificInquyCommunicationsController extends Controller
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
            return view('dashboard.InquiryCommunications.listSpecificInquiryIncomming');
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

                $from_date = $_POST['from_date'];
                $to_date = $_POST['to_date'];
                $from_time = $_POST['from_time'];
                $to_time = $_POST['to_time'];


                $reports = RecordingIncomingReports::select('*');

                if((isset($from_date) && !empty($from_date)) && (isset($to_date) && !empty($to_date))){
                    $reports->whereBetween('date',[ $from_date, $to_date]);
                }

                if((isset($from_time) && !empty($from_time)) && (isset($to_time) && !empty($to_time))){
                    $reports->whereBetween('time',[ $from_time, $to_time]);
                }

                $dateS = Carbon::now()->subMonth(1);
                $dateE = Carbon::now();

                $results = $reports->whereBetween('created_at',[$dateS,$dateE])
                            ->orderBy('created_at', 'ASC')->get();
                $query = DB::getQueryLog();
                // dd($query);

               return  response()->json(['status'=> 'success', 'result' => $results]);
            }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function print(Request $request)
    {
        $all_data = json_decode($request->input('data'));
        return view('dashboard.InquiryCommunications.showSpecificInquiryCommunications', compact('all_data'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generatePDF(Request $request) {

        $data = ['data' => json_decode( $request->input('data'))];
        $pdf = PDF::loadView( 'dashboard.InquiryCommunications.pdfSpecificInquiryCommunications', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'InquiryCommunicationsPDF-'.time().'_'.date('Y-m-d').'.pdf';
        return $pdf->download($name);
    }
}
