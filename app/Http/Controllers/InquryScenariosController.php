<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecordingScenarios;
use App\Models\EventTypes;
use DB;
use Carbon\Carbon;
use PDF;


class InquryScenariosController extends Controller
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
        $event_types = EventTypes::all();

        return view('dashboard.InquiryScenarios.listInquiryScenarios', compact('event_types'));
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

                $event_type = $_POST['event_type'];

                $reports = RecordingScenarios::select('*');

                if(isset($event_type) && !empty($event_type)){
                    $reports->where('event_type', $event_type);
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
        return view('dashboard.InquiryScenarios.showInquiryScenarios', compact('all_data'));
    }

    public function generatePDF(Request $request) {

        $data = ['data' => json_decode( $request->input('data'))];
        $pdf = PDF::loadView( 'dashboard.InquiryScenarios.pdf', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'ScenarioPDF-'.time().'_'.date('Y-m-d').'.pdf';
         return $pdf->download($name);
    }


}
