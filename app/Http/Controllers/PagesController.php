<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use App\Models\Employee;
use App;
use Excel;
use PDF;

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

    public function printEmployee()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convertToPdf());
        return $pdf->stream();
    }

    public function convertToPdf()
    {
        $employees = Employee::paginate(200);
        $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>App | Employee Print</title>
                <style>
                    table, th, td {
                        border: 1px solid black;
                        border-collapse: collapse;
                    }
                    th, td {
                        padding: 8px;
                    }
                    table tr th {
                        background-color: #4CAF50;
                        color: white;
                        text-transform: uppercase;
                    }
                    table tr:nth-child(odd) {
                        background-color: lightgray;
                    }
                </style>
            </head>
            <body>
                <div>
                    <h3>List Of Employee</h3>
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Position</th>
                            <th>Email</th>
                        </tr>
        ';

        $no = 1;
        foreach($employees as $employee) {
            $html .= '
                <tr>
                    <td style="text-align:center;">'.$no++.'</td>
                    <td>'.$employee->name.'</td>
                    <td>'.$employee->sex.'</td>
                    <td>'.$employee->position->position.'</td>
                    <td>'.$employee->email.'</td>
                </tr>
            ';
        }

        $html .= '
                    </table>   
                </div>   
            </body>
        </html>
        ';

        return $html;
    }
}
