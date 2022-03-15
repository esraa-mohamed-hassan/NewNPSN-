<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DalilDestinationsEntities;
use App\Models\SubDestinationsEntities;
use DataTables;


class DalilDestinationsEntitiesController extends Controller
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
            $you = auth()->user();
            $all_dalil_entities = DalilDestinationsEntities::all();

            return DataTables::of($all_dalil_entities)
            ->addIndexColumn()
            ->addColumn('action', function($dalil_entity){

                $actionBtn = '
                <div class="row">
                <div class="col-xl-3">
                <a href="'.url("/dalil_entity/view/" . $dalil_entity->id).'" class="btn btn-block btn-warning">'. __("lang.view").'</a>
                </div>
                <div class="col-xl-3">
                <a href="'.url("/dalil_entity/edit/" . $dalil_entity->id).'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                </div>
                <div class="col-xl-3">
                <form action="'.url("/dalil_entity/delete/" . $dalil_entity->id ).'" method="POST">
                <input type="hidden" name="_method" value="DELETE">'. csrf_field() .'
                <button class="btn btn-block btn-danger">'. __("lang.delete_dalil_entity").'</button>
                </form>
                </div>
                <div class="col-xl-4">
                <a href="'.url("/dalil_entity/add_Dentity/" . $dalil_entity->id).'" class="btn btn-block btn-info">'. __("lang.add_Dentity").'</a>
                </div>
                </div>
                ';

                return $actionBtn;
            })->rawColumns(['action'])
        ->make(true);
        }
        return view('dashboard.admin.dalilEntities.dalilEntityList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.dalilEntities.addDalilEntity');
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
            'entity' => 'required|min:2|max:150',
        ]);
        $dalil_entity = new DalilDestinationsEntities();
        $dalil_entity->entity = $request->input('entity');
        $dalil_entity->save();
        $request->session()->flash('message', 'Successfully created Entity');
        return redirect()->route('dalilEntity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dalil_entity = DalilDestinationsEntities::with('subEntities')->find($id);
        return view('dashboard.admin.dalilEntities.dalilEntityShow', compact('dalil_entity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dalil_entity = DalilDestinationsEntities::find($id);
        return view('dashboard.admin.dalilEntities.dalilEntityEditForm', compact('dalil_entity'));
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
            'entity' => 'required|min:2|max:150',
        ]);
        $id = $request->input('id');
        $dalil_entity = DalilDestinationsEntities::find($id);
        $dalil_entity->entity = $request->input('entity');
        $dalil_entity->save();
        $request->session()->flash('message', 'Successfully updated Entity');
        return redirect()->route('dalilEntity.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $dalil_entity = DalilDestinationsEntities::find($id);

        if($dalil_entity){
            $dalil_entity->subEntities()->detach();

            $dalil_entity->delete();
        }
        $request->session()->flash('message', 'Successfully deleted Entity');
        return redirect()->route('dalilEntity.index');
    }


    public function showAddEntity($id)
    {
        return view('dashboard.admin.dalilEntities.addSubDalilEntity', compact('id'));
    }

    public function storeAddEntity(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:150',
        ]);


        $sub_dalil_entity = new SubDestinationsEntities();
        $sub_dalil_entity->name = $request->input('name');
        $sub_dalil_entity->save();
        $sub_entity_id = $sub_dalil_entity->id;

        $entity_id = $request->input('entity_id');

        $dalil_entity = DalilDestinationsEntities::find([$entity_id]);
        $sub_dalil_entity->entities()->attach($dalil_entity);

        $request->session()->flash('message', 'Successfully created Entity');
        return redirect()->route('dalilEntity.index');
    }
}
