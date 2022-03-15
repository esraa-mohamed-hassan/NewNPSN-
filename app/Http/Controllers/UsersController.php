<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DataTables;

class UsersController extends Controller
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
        $you = auth()->user();

        if ($request->ajax()) {

            $users = User::all();
            if( $you->menuroles == 'admin'){
                return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function($user){

                    $actionBtn = '
                    <div class="row">
                    <div class="col-xl-6">
                    <a href="'.url("/users/" . $user->id . "/edit") .'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                    </div>
                    <div class="col-xl-6">
                    <form action="'.route("users.destroy", $user->id ).'" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                        <button class="btn btn-block btn-danger">'. __("lang.delete_user").'</button>
                    </form>
                    </div>
                    </div>
                    ';

                    return $actionBtn;
                })->rawColumns(['action'])
                ->make(true);
            }else{
                return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function($user){

                    $actionBtn = '
                    <div class="row">
                    <div class="col-xl-4">
                    <a href="'.url("/users/" . $user->id).'" class="btn btn-block btn-warning">'. __("lang.view").'</a>
                    </div>
                    <div class="col-xl-4">
                    <a href="'.url("/users/" . $user->id . "/edit") .'" class="btn btn-block btn-info">'. __("lang.edit").'</a>
                    </div>
                    </div>
                    ';

                    return $actionBtn;
                })->rawColumns(['action'])
                ->make(true);
            }

    }
        return view('dashboard.admin.usersList');
    }


    public function create()
    {
        return view('dashboard.admin.userAddForm');
    }

    public function store(Request $request)
    {

            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);
            $user =  User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            $user->assignRole('user');

            $request->session()->flash('message', 'Successfully added user');
            return redirect()->route('users.index');
          }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.userShow', compact( 'user' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.userEditForm', compact('user'));
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
        $validatedData = $request->validate([
            'name'       => 'required|min:1|max:256',
            'email'      => 'required|email|max:256'
        ]);
        $user = User::find($id);
        $user->name       = $request->input('name');
        $user->email      = $request->input('email');
        $user->save();
        $request->session()->flash('message', 'Successfully updated user');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        $request->session()->flash('message', 'Successfully deleted user');
        return redirect()->route('users.index');
    }
}
