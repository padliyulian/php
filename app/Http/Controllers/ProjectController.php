<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $projects = Project::all();
        foreach ($projects as $project) {
            echo $project->project.'<br>';
            echo $project->description.'<br>';

            $employees = $project->employees;
            foreach ($employees as $employee) {
                echo $employee->name. ', ';
            }
            echo '<br><br>';
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project;
        $project->project = 'avocado-tech.com';
        $project->description = 'company profile website';
        $project->save();

        $employee = Employee::find([1,2,3,4,5]);
        $project->employees()->attach($employee);

        return 'Success';
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
    }

    /**
     * Detach the specified employee from project.
     * 
     * @param  int  $project
     */
    public function detach(Project $project)
    {
        $employee = Employee::find(5);
        $project->employees()->detach($employee);
        return 'Success';
    }
}
