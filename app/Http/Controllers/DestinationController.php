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
        // dd($destination);
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

        // dd($request);

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
            'path' => $name,
        ]);

        if($request->hasFile('file2')){
            $file2 = $request->file('file2');
            foreach($file2 as $file2){
                $name2 = $file2->getClientOriginalName();
                $path2 = $file2->storeAs('public/destinations/',$name2);
                
                $image = $destination->images()->create([
                    'role' => 'destinations',
                    'path' => $name2,
                ]);
            }
        }
        
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

    public function showEdit($slug)
    {
        $id = DB::table('destinations')
        ->leftjoin('images', 'foreign_id', '=', 'destination_id')
        ->where('destinations.slug', '=', $slug)
        ->pluck('destination_id');
        
        $destination = DB::table('destinations')
        ->join('images', 'foreign_id', '=', 'destination_id')
        ->where([
                ['destinations.slug', '=', $slug],
                ['images.foreign_id', '=', $id],
            ])
        ->first();

        return view('destinationFormsEdit', ['destination' => $destination]);
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
        // $name = DB::table('destinations')->where('name', $request->inputName)->first();

        // if($name) {
        //     return redirect()->back()->withInput()->with('status', 'Destination already exist!');
        // }

        $file = $request->file('file');
        if($file){
            $name = $file->getClientOriginalName();
            $path = $file->storeAs('public/destinations/',$name);
        }
        else{
            $name = NULL;
        }

        $destination = DB::table('destinations')
        ->where('slug', '=', Str::slug($request->inputName, '-'))
        // ->get();
        ->update(
            ['name' => $request->inputName,
            'slug' => Str::slug($request->inputName, '-'),
            'description' => $request->inputDescription,
            'coordinate' => $request->inputLocation,
            ]
        );

        $id = DB::table('destinations')
        ->leftjoin('images', 'foreign_id', '=', 'destination_id')
        ->where('destinations.slug', '=', Str::slug($request->inputName, '-'))
        ->pluck('destination_id');

        $image = DB::table('images')
        ->where('foreign_id', '=', $id)
        ->update(
            ['role' => 'destinations',
            'path' => $name,
            ]
        );

        if($request->hasFile('file2')){
            $file2 = $request->file('file2');
            foreach($file2 as $file2){
                $name2 = $file2->getClientOriginalName();
                $path2 = $file2->storeAs('public/destinations/',$name2);
                
                $image2 = DB::table('images')
                ->where('foreign_id', '=', $id)
                ->update(
                    ['role' => 'destinations',
                    'path' => $name2,
                    ]
                );
            }
        }
        
        return redirect('destinationmanagement')->with('status', 'Data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $id = DB::table('destinations')
        ->leftjoin('images', 'foreign_id', '=', 'destination_id')
        ->where('destinations.slug', '=', $slug)
        ->pluck('destination_id');

        // dd($id);
        $destination = DB::table('destinations')
        ->where('slug', '=', $slug);
        $destination->delete();

        $image = DB::table('images')
        ->where('foreign_id', '=', $id);
        $image->delete();

        return redirect('destinationmanagement')->with('status','Data has been removed successfully!');
    }
}
