<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destination = DB::table('destinations')
        ->get();
        return view ('destination', ['destination' => $destination]);
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
        $name = DB::table('destinations')->where('name', $request->inputName)->first();
        if($name) {
            return redirect()->back()->with('status', 'Destination already exist!');
        }

        $file = $request->file('file');
        if($file){
            $name = $file->getClientOriginalName();
            $path = $file->storeAs('public/destinations/',$name);
        }
        else{
            $name = NULL;
        }

        $destination = Destination::create([
            'name' => $request->inputName,
            'slug' => Str::slug($request->inputName, '-'),
            'description' => $request->inputDescription,
            'coordinate' => $request->inputLocation,
        ]);

        $image = $destination->images()->create([
            'role' => 'destinations',
            'path' => 'public/destinations/'.$name,
        ]);

        return redirect('destinationmanagement')->with('status', 'Data has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        return view('destinationForms');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
