<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $users = User::all();
        // return $users;
        $loadedUsers = [];
        $usersForAdmin = DB::table('users')->get();
        // $usersForLawyer = DB::table('users')->where('role_id')->get();

        // if (auth()->user()->role_id == 1) {
        //     $loadedUsers = $adminProjects;
        // }
        // else if (auth()->user()->role_id == 2) {
        //     $loadedUsers = $lawyerProjects;
        // }
        // else if (auth()->user()->role_id == 3) {
        //     $loadedUsers = $clientProjects;
        // }

        return view('admin.users.index', ['users' => $usersForAdmin]);
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
        //
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
        $user = User::where('id', $id)->first();
        // return $user;
        return view('admin.users.edit', ['user' => $user]);
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
        $this->validate($request, [
            'phone'       => 'nullable',
            'address'     => 'nullable',
            'role_id'     => 'nullable',
        ]);

        $user = User::where('id', $id)->first();
        $user->update([
            'phone'       => $request->input('phone'),
            'address'     => $request->input('address'),
            'role_id'     => $request->input('role_id'),
        ]);

        return redirect()->route('users.index')->with('status','User info updated');

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
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect()->route('users.index')->with('status','User account deleted');
    }
}
