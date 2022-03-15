<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\DalilDestinationsEntities;
use App\Models\SubDestinationsEntities;
use App\Models\DalilPhonesList;
use PDF;

class InquryPhonesController extends Controller
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
        return view('dashboard.InquryPhones.listInquryPhones');
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
                $job = $_POST['job'];
                $Dentity = $_POST['Dentity'];

                $reports = DB::table('dalil_phones_lists as phones')
                ->leftjoin('dalil_destinations_entities as entities','entities.id','=','phones.entity_id')
                ->leftjoin('sub_destinations_entities as sub_entities','sub_entities.id','=','phones.sub_entity_id')
                ->select('phones.*', 'entities.entity', 'sub_entities.name as sub_entity');
                if(isset($name) && !empty($name)){
                    $reports->where('phones.name',  'like', '%' . $name . '%');
                }

                if(isset($job) && !empty($job)){
                    $reports->where('phones.job',  'like', '%' . $job . '%');
                }


                if(isset($Dentity) && !empty($Dentity)){
                    $reports->where('entities.entity',  'like', '%' . $Dentity . '%');
                    $reports->orWhere('sub_entities.name',  'like', '%' . $Dentity . '%');
                }

                $results = $reports->orderBy('phones.created_at', 'ASC')->get();
                $query = DB::getQueryLog();
                // dd(DB::getQueryLog());

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
        return view('dashboard.InquryPhones.showInquryPhones', compact('all_data'));
    }

    public function generatePDF(Request $request) {

        $data = ['data' => json_decode( $request->input('data'))];
        $pdf = PDF::loadView( 'dashboard.InquryPhones.pdf', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'PhonesPDF-'.time().'_'.date('Y-m-d').'.pdf';
         return $pdf->download($name);
    }
}
