<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypicalReportsPlaces;
use DataTables;

class ReportsPlacesController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $all_gathering_places = TypicalReportsPlaces::all();

            return DataTables::of($all_gathering_places)
            ->addIndexColumn()
            ->addColumn('action', function($gathering_place){

                $actionBtn = '
                <div class="row">
                <div class="col-xl-6" style="max-width: 35%;margin-left: -4%;">
                <a href="'.url("/gathering_places/edit/" . $gathering_place->id).'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                </div>
                <div class="col-xl-6" style="max-width: 35%;margin-left: -4%;">
                <form action="'.url("/gathering_places/delete/" . $gathering_place->id ).'" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button class="btn btn-block btn-danger">'. __("lang.delete").'</button>
                </form>
                </div>
                </div>
                ';

                return $actionBtn;
            })->rawColumns(['action'])
        ->make(true);
        }
        return view('dashboard.admin.reportsPlaces.placesList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.reportsPlaces.addPlaces');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gathering_type' => 'required|min:2|max:64',
            'address' => 'required|min:2|max:64',
            'phone' => 'required|numeric|min:11',
            'carry_capacity' => 'required|max:64',
            'no_roles' => 'required|numeric',
            'building_area' => 'required|numeric',
        ]);
        $gathering_place = new TypicalReportsPlaces();
        $gathering_place->gathering_type = $request->input('gathering_type');
        $gathering_place->address = $request->input('address');
        $gathering_place->phone = $request->input('phone');
        $gathering_place->carry_capacity = $request->input('carry_capacity');
        $gathering_place->no_roles = $request->input('no_roles');
        $gathering_place->building_area = $request->input('building_area');
        $gathering_place->save();
        $request->session()->flash('message', 'Successfully created Gathering Places');
        return redirect()->route('gatheringPlaces.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gathering_place = TypicalReportsPlaces::find($id);
        return view('dashboard.admin.reportsPlaces.placesShow', compact('gathering_place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gathering_place = TypicalReportsPlaces::find($id);
        return view('dashboard.admin.reportsPlaces.placesEditForm', compact('gathering_place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'gathering_type' => 'required|min:2|max:64',
            'address' => 'required|min:2|max:64',
            'phone' => 'required|numeric|min:11',
            'carry_capacity' => 'required|max:64',
            'no_roles' => 'required|numeric',
            'building_area' => 'required|numeric',
        ]);
        $id = $request->input('id');
        $gathering_place = TypicalReportsPlaces::find($id);
        $gathering_place->gathering_type = $request->input('gathering_type');
        $gathering_place->address = $request->input('address');
        $gathering_place->phone = $request->input('phone');
        $gathering_place->carry_capacity = $request->input('carry_capacity');
        $gathering_place->no_roles = $request->input('no_roles');
        $gathering_place->building_area = $request->input('building_area');
        $gathering_place->save();
        $request->session()->flash('message', 'Successfully updated Gathering Places');
        return redirect()->route('gatheringPlaces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $gathering_place = TypicalReportsPlaces::find($id);
        if($gathering_place){
            $gathering_place->delete();
        }
        $request->session()->flash('message', 'Successfully deleted Gathering Places');
        return redirect()->route('gatheringPlaces.index');
    }
}
