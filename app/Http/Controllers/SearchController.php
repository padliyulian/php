<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class SearchController extends Controller
{
    public function employee(Request $request)
    {
        $request->validate(['keyword' => 'required']);
        
        $employees = Employee::when($request->keyword, function ($query) use ($request)
        {
            $query->where('name', 'LIKE', "%{$request->keyword}%")
                ->orWhere('email', 'LIKE', "%{$request->keyword}%");
        })->paginate(10);

        $employees->appends($request->only('keyword'));

        return view('employee/index', compact('employees'));
    }

    // search data with 2 table
    /*
    public function employee(Request $request)
    {
        $employees = Employee::join('positions', 'positions.id', '=', 'employees.position_id')
        ->select('employees.*','positions.position')
        ->when($request->keyword, function ($query) use ($request) {
        $query->where('name', 'LIKE', "%{$request->keyword}%")
            ->orWhere('position', 'LIKE', "%{$request->keyword}%");
        })->paginate(10);

        $employees->appends($request->only('keyword'));

        return view('employee/index', compact('employees'));
    }
    */
}
