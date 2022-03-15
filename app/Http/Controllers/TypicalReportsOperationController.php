<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportsOperationData;
use DataTables;
use PDF;

class TypicalReportsOperationController extends Controller
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
            $you = auth()->user();
            $all_operation_data = ReportsOperationData::all();

            return DataTables::of($all_operation_data)
            ->addIndexColumn()
            ->make(true);
        }
        return view('dashboard.reportsOperation.reportsoperationList');
    }


    public function generatePDF(Request $request) {

        $data = ['data' => json_decode( $request->input('data'))];
        $pdf = PDF::loadView( 'dashboard.reportsOperation.pdf', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'ReportOperationPDF-'.time().'_'.date('Y-m-d').'.pdf';
        return $pdf->download($name);
    }
}
