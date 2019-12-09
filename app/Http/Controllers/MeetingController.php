<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use Yajra\DataTables\Datatables;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meeting = Meeting::query();
        return DataTables::of($meeting)
            ->addColumn('action', function ($meeting) {
                return view('meeting.action', [
                    'meeting' => $meeting,
                    'url_show' => route('meeting.show', $meeting->id),
                    'url_edit' => route('meeting.edit', $meeting->id),
                    'url_destroy' => route('meeting.destroy', $meeting->id)
                ]);
            })
            ->addColumn('team', function($meeting){
                $teams = '';
                foreach ($meeting->employees as $employee) {
                    $teams .= $employee->name .', ';
                }
                return $teams;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meeting = new Meeting;
        return view('meeting/form', compact('meeting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'time' => 'required',
            'location' => 'required',
            'meeting_teams_id' => 'required',
        ]);

        $date = $request->time;
        $date = str_replace('T',' ',$date);
        $date .= ':00';

        $meeting = new Meeting;
        $meeting->name = $request->name;
        $meeting->description = $request->description;
        $meeting->time = $date;
        $meeting->location = $request->location;

        if ($meeting->save()) {
            $employee = array_map('intval', explode(',', $request->meeting_teams_id));
            $meeting->employees()->attach($employee);

            $meeting->view_meeting = [
                'href' => 'api/v1/meeting/'.$meeting->id,
                'method' => 'GET'
            ];

            $response = [
                'msg' => 'Add Meeting Success',
                'meeting' => $meeting
            ];
    
            return response()->json($response);
        }

        $response = ['msg' => 'Add Meeting Failed',];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        return view('meeting/show', compact('meeting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        return view('meeting/form', compact('meeting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Meeting $meeting, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'time' => 'required',
            'location' => 'required',
            'meeting_teams_id' => 'required',
        ]);

        $date = $request->time;
        $date = str_replace('T',' ',$date);
        $date .= ':00';

        $meeting->name = $request->name;
        $meeting->description = $request->description;
        $meeting->time = $date;
        $meeting->location = $request->location;

        if ($meeting->update()) {
            $employee = array_map('intval', explode(',', $request->meeting_teams_id));
            $meeting->employees()->sync($employee);

            $meeting->view_meeting = [
                'href' => 'api/v1/meeting/'.$meeting->id,
                'method' => 'GET'
            ];

            $response = [
                'msg' => 'Update Meeting Success',
                'meeting' => $meeting
            ];
    
            return response()->json($response);
        }

        $response = [
            'msg' => 'Update Meeting Failed',
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        Meeting::destroy($meeting->id);
        $meeting->employees()->detach();
        $response = [
            'msg' => 'Delete Meeting Success',
            'create' => [
                'href' => 'api/v1/meeting',
                'method' => 'POST',
                'params' => 'name, description, time, location'
            ]
        ];
        return response()->json($response);
    }
}
