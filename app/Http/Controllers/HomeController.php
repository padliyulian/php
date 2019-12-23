<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $project_managers = Employee::where('position_id', '1')->get();
        $project_manager = $project_managers->count();
        $front_ends = Employee::where('position_id', '2')->get();
        $front_end = $front_ends->count();
        $back_ends = Employee::where('position_id', '3')->get();
        $back_end = $back_ends->count();
        $uiuxs = Employee::where('position_id', '4')->get();
        $uiux = $uiuxs->count();
        $sqas = Employee::where('position_id', '5')->get();
        $sqa = $sqas->count();
        $sas = Employee::where('position_id', '6')->get();
        $sa = $sas->count();

        $total = $project_manager + $front_end + $back_end + $uiux + $sqa + $sa;

        $data = [
            'project_manager' => ($project_manager * 100) / $total,
            'front_end' => ($front_end * 100) / $total,
            'back_end' => ($back_end * 100) / $total,
            'uiux' => ($uiux * 100) / $total,
            'sqa' => ($sqa * 100) / $total,
            'sa' => ($sa * 100) / $total
        ];
          
        return view('dashboard', compact('data'));
    }
}
