<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypicalReportsPlaces;
use DataTables;
use PDF;


class TypicalReportsPlacesController extends Controller
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
            $all_gathering_places = TypicalReportsPlaces::all();

            return DataTables::of($all_gathering_places)
            ->addIndexColumn()
            ->make(true);
        }
        return view('dashboard.reportsPlaces.reportsPlacesList');
    }


    public function generatePDF(Request $request) {

        $data = ['data' => json_decode( $request->input('data'))];
        $pdf = PDF::loadView( 'dashboard.reportsPlaces.pdf', $data,  [],  [
            'format' => 'A4-L',
            'orientation' => 'L',
            'margin_top' => '1',
          ]);

         /** Creating the unique name for pdf */
        $name = 'ReportPlacesPDF-'.time().'_'.date('Y-m-d').'.pdf';
         return $pdf->download($name);
    }
}
