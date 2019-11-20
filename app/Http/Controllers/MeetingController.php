<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings = Meeting::all();

        foreach ($meetings as $meeting) {
            $meeting->view_meeting = [
                'href' => 'api/v1/meeting/'.$meeting->id,
                'method' => 'GET'
            ];
        }

        $response = [
            'msg' => 'List Of All Meeting',
            'meetings' => $meetings
        ];

        return response()->json($response);
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
        $this->validate = [
            'name' => 'required',
            'description' => 'required',
            'time' => 'required',
            'location' => 'required',
            'teams_id' => 'required',
        ];

        $meeting = new Meeting;
        $meeting->name = $request->name;
        $meeting->description = $request->description;
        $meeting->time = $request->time;
        $meeting->location = $request->location;

        if ($meeting->save()) {
            $employee = array_map('intval', explode(',', $request->teams_id));
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

        $response = [
            'msg' => 'Add Meeting Failed',
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meeting = Meeting::with('employees')->where('id', $id)->firstOrFail();
        $meeting->view_meeting = [
            'href' => 'api/v1/meeting',
            'method' => 'GET'
        ];

        $response = [
            'msg' => 'Meeting Detail',
            'meeting' => $meeting
        ];

        return response()->json($response);
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
    public function update(Meeting $meeting, Request $request)
    {
        $this->validate = [
            'name' => 'required',
            'description' => 'required',
            'time' => 'required',
            'location' => 'required',
            'teams_id' => 'required',
        ];

        $meeting->name = $request->name;
        $meeting->description = $request->description;
        $meeting->time = $request->time;
        $meeting->location = $request->location;

        if ($meeting->update()) {
            $employee = array_map('intval', explode(',', $request->teams_id));
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
