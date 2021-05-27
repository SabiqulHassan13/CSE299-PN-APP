<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Notice;
use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $projects = Project::all();

        $projects =  DB::table('projects')
            ->leftjoin('users AS lawyers', 'projects.lawyer_id', '=', 'lawyers.id')
            ->leftjoin('users AS clients', 'projects.client_id', '=', 'clients.id')
            ->select('projects.*', 'lawyers.name as lawyerName', 'clients.name as clientName')
            ->get();

        return view('admin.projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $laywers = User::where('role_id', 2)->get();
        $clients = User::where('role_id', 3)->get();

        return view('admin.projects.create', ['lawyers' => $laywers, 'clients' => $clients]);

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
        $this->validate($request, [
            'category'    => 'required',
            'name'        => 'required',
            'details'     => 'required',
            'lawyer_id'   => 'required',
            'client_id'   => 'required',
            // 'is_completed' => 'nullable',
        ]);

        Project::create([
            'category'    => $request->input('category'),
            'name'        => $request->input('name'),
            'details'     => $request->input('details'),
            'lawyer_id'   => $request->input('lawyer_id'),
            'client_id'   => $request->input('client_id'),
        ]);

        return redirect()->route('projects.index')->with('status','Project created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $project = Project::where('id', $id)->first();
        $notices = Notice::where('project_id', $project->id)
                    ->leftjoin('users', 'notices.user_id', '=', 'users.id')
                    ->select('notices.*', 'users.name as noticerName', 'users.role_id as noticerRole')
                    ->get();

        return view('admin.projects.show', ['project' => $project, 'notices' => $notices]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $project = Project::where('id', $id)->first();
        $laywers = User::where('role_id', 2)->get();
        $clients = User::where('role_id', 3)->get();

        return view('admin.projects.edit', ['lawyers' => $laywers, 'clients' => $clients, 'project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'category'    => 'required',
            'name'        => 'required',
            'details'     => 'required',
            'lawyer_id'   => 'required',
            'client_id'   => 'required',
            'is_completed' => 'nullable',
        ]);

        $project = Project::where('id', $id)->first();
        $project->update([
            'category'    => $request->input('category'),
            'name'        => $request->input('name'),
            'details'     => $request->input('details'),
            'lawyer_id'   => $request->input('lawyer_id'),
            'client_id'   => $request->input('client_id'),
            'is_completed' => $request->input('is_completed'),
        ]);

        return redirect()->route('projects.index')->with('status','Project updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $project = Project::where('id', $id)->first();
        $project->delete();

        return redirect()->route('projects.index')->with('status','Project deleted');
    }
}
