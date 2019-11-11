<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectValidation;
use App\Models\Employee;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('project/index', compact('projects'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectValidation $request)
    {
        
        $project = new Project;
        $project->project = $request->project;
        $project->description = $request->description;
        $project->save();

        $employee = array_map('intval', explode(',', $request->teams_id));
        $project->employees()->attach($employee);

        return redirect('/project')->with('status', 'adding project success');
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
    public function edit(Project $project)
    {
        return view('project/edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, ProjectValidation $request)
    {
        $project->project = $request->project;
        $project->description = $request->description;
        $project->save();

        // $project->employees()->detach();
        $employee = array_map('intval', explode(',', $request->teams_id));
        $project->employees()->sync($employee);

        return redirect('/project')->with('status', 'update project success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Project::destroy($project->id);
        $project->employees()->detach();
        return redirect('/project')->with('status', 'delete project success');
    }

}
