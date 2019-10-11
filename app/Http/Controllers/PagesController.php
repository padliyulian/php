<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use Excel;

class PagesController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about', ['name' => 'Julian']);
    }

    public function exim()
    {
        return view('exim');
    }

    public function exportEmployee()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function importEmployee(Request $request) 
    {
        $request->validate(['import' => 'required']);
        Excel::import(new EmployeesImport, $request->file('import'));
        return redirect('/employee')->with('status', 'Import employee success');
    }
}
