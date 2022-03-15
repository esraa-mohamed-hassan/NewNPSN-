<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventTypes;
use DataTables;

class EventTypesController extends Controller
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
            $events = EventTypes::all();

            return DataTables::of($events)
            ->addIndexColumn()
            ->addColumn('action', function($event){

                $actionBtn = '
                <div class="row">
                <div class="col-xl-6">
                <a href="'.url("/event_type/edit/" . $event->id).'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                </div>
                <div class="col-xl-6">
                <form action="'.url("/event_type/delete/" . $event->id ).'" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button class="btn btn-block btn-danger">'. __("lang.delete_event").'</button>
                </form>
                </div>
                </div>
                ';

                return $actionBtn;
            })->rawColumns(['action'])
        ->make(true);
        }
        return view('dashboard.admin.eventTypes.eventList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.eventTypes.addEvent');
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
            'name' => 'required|min:1|max:64'
        ]);
        $event = new EventTypes();
        $event->name = $request->input('name');
        $event->save();
        $request->session()->flash('message', 'Successfully created Event Type');
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = EventTypes::find($id);
        return view('dashboard.admin.eventTypes.eventShow', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = EventTypes::find($id);
        return view('dashboard.admin.eventTypes.eventEditForm', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:1|max:64'
        ]);
        $id = $request->input('id');
        $event = EventTypes::find($id);
        $event->name = $request->input('name');
        $event->save();
        $request->session()->flash('message', 'Successfully updated Event Type');
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $event = EventTypes::find($id);
        if($event){
            $event->delete();
        }
        $request->session()->flash('message', 'Successfully deleted Event Type');
        return redirect()->route('event.index');
    }
}
