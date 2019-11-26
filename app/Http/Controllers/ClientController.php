<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client:: all();
        return Datatables::of($client)
            ->addColumn('show_photo', function($client){
                if ($client->photo == null){
                    return 'No Image';
                } else {
                    return '<img class="img-fluid img-thumbnail" width="50" height="50" src="/images/client/'. $client->photo.'" alt="">';
                }
            })
            ->addColumn('action', function($client) {
                return '<a href="#" onClick="showClient('.$client->id.')"><i class="fas fa-eye"></i></a> '.
                '<a href="#" onClick="editClient('.$client->id.')" class="text-warning"><i class="fas fa-edit"></i></a> '.
                '<a href="#" onClick="deleteClient('.$client->id.')" class="text-danger"><i class="fas fa-trash"></i></a>';
            })->rawColumns(['show_photo', 'action'])->make(true);
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
        if ($request->hasFile('photo-client')){
            $filenameWithExt = $request->file('photo-client')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileExt = $request->file('photo-client')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            $path = $request->file('photo-client')->move(public_path('/images/client/'), $fileNameToStore);
        } else {
            $fileNameToStore = null;
        }
        
        $client = new Client;
        $client->name =  $request->name;
        $client->address =  $request->address;
        $client->email =  $request->email;
        $client->photo =  $fileNameToStore;
        $client->save();

        return response()->json([
            'success' => true,
            'message' => 'Client Created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client, Request $request)
    {
        if ($request->hasFile('photo-client')){
            if ($client->photo != null) {
                unlink(public_path('/images/client/'.$client->photo));
            }
            $filenameWithExt = $request->file('photo-client')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileExt = $request->file('photo-client')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$fileExt;
            $path = $request->file('photo-client')->move(public_path('/images/client/'), $fileNameToStore);
        }
        
        $client->name =  $request->name;
        $client->address =  $request->address;
        $client->email =  $request->email;
        if ($request->hasFile('photo-client')){
            $client->photo = $fileNameToStore;
        }
        $client->update();

        return response()->json([
            'success' => true,
            'message' => 'Client Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if ($client->photo != null) {
            unlink(public_path('/images/client/'.$client->photo));
        }

        return Client::destroy($client->id);
    }

}
