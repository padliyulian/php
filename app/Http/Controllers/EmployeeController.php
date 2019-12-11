<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee/index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        if ($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileExt = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            $path = $request->file('photo')->storeAs('public/img/employee', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        
        $employee = new Employee;
        $employee->nik =  $request->nik;
        $employee->name =  $request->name;
        $employee->sex =  $request->sex;
        $employee->position_id =  $request->position_id;
        $employee->email =  $request->email;
        $employee->photo =  $fileNameToStore;
        $employee->save();

        // $request->photo = $fileNameToStore;
        // Employee::create($request->all());
        return redirect('/employee')->with('status', 'adding employee success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee/show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee/edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Employee $employee, EmployeeRequest $request)
    {
        if ($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileExt = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            $path = $request->file('photo')->storeAs('public/img/employee', $fileNameToStore);
        }
        
        // $employee = Employee::find();
        $employee->nik =  $request->nik;
        $employee->name =  $request->name;
        $employee->sex =  $request->sex;
        $employee->position_id =  $request->position_id;
        $employee->email =  $request->email;
        if ($request->hasFile('photo')){
            $employee->photo = $fileNameToStore;
        }
        $employee->save();

        // $employee->update($request->all());
        return redirect('/employee')->with('status', 'update employee success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if ($employee->photo != 'noimage.png') {
            storage::delete('public/img/employee/'.$employee->photo);
        }

        Employee::destroy($employee->id);
        return redirect('/employee')->with('status', 'delete employee success');
    }
}
