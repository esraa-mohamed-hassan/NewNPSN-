<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportsOperationData;
use DB;
use Carbon\Carbon;
use PDF;


class InqurySpecificResponsibleController extends Controller
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
        return view('dashboard.InquirySpecificResponsible.listInquirySpecificResponsible');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if ($request->ajax()) {

                DB::enableQueryLog();

                $name = $_POST['name'];

                $reports = ReportsOperationData::select('*');

                if(isset($name) && !empty($name)){
                    $reports->where('name',  'like', '%' . $name . '%');
                }

                $dateS = Carbon::now()->subMonth(1);
                $dateE = Carbon::now();

                $results = $reports->whereBetween('created_at',[$dateS,$dateE])
                            ->orderBy('created_at', 'ASC')->get();
                $query = DB::getQueryLog();

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
        return view('dashboard.InquirySpecificResponsible.showInquirySpecificResponsible', compact('all_data'));
    }

    public function generatePDF(Request $request) {
        $data = ['data' => json_decode( $request->input('data'))];
        $pdf = PDF::loadView( 'dashboard.InquirySpecificResponsible.pdf', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'SpecificResponsiblePDF-'.time().'_'.date('Y-m-d').'.pdf';
         return $pdf->download($name);
    }



}
