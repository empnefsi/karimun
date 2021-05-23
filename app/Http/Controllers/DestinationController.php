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

        if($name) {
            return redirect()->back()->with('status', 'Destination already exist!');
        }

        $destination = Destination::create([
            'name' => $request->inputName,
            'slug' => Str::slug($request->inputName, '-'),
            'description' => $request->inputDescription,
            'coordinate' => $request->inputLocation,
        ]);

        $file = $request->file('file');
        if($file){
            $name = $file->getClientOriginalName();
            $path = $file->storeAs('public/destinations/',$name);
        }
        else{
            $name = NULL;
        }

        if($file){
            $image = $destination->images()->create([
                'role' => 'destinations',
                'path' => $name,
            ]);
        }

        $file2 = $request->file('file2');
        if($file2){
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

        $image = DB::table('images')
        ->where('foreign_id', '=', $id)
        ->first();

        $imageall = DB::table('images')
        ->where('foreign_id', '=', $id)
        ->get();
        
        $eximg = DB::table('images')
        ->where([
            ['image_id', '<>', $image->image_id],
            ['foreign_id', '=', $id],
        ])
        ->get();
        

        return view('destinationFormsEdit', ['destination' => $destination, 'image' => $image, 'eximg' => $eximg]);
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
        
        
        // $destination = DB::table('destinations')
        // ->where('slug', '=', Str::slug($request->inputName, '-'))
        // ->update(
        //     ['name' => $request->inputName,
        //     'slug' => Str::slug($request->inputName, '-'),
        //     'description' => $request->inputDescription,
        //     'coordinate' => $request->inputLocation,
        //     ]
        // );
        
        dd($destination->slug);
        
        $id = DB::table('destinations')
        ->leftjoin('images', 'foreign_id', '=', 'destination_id')
        ->where('destinations.slug', '=', Str::slug($request->inputName, '-'))
        ->pluck('destination_id');

        $file = $request->file('file');
        if($file){
            $name = $file->getClientOriginalName();
            $path = $file->storeAs('public/destinations/',$name);
        }
        else{
            $name = NULL;
        }

        // dd($id);
        if($file){
            $image = DB::table('images')
            ->where('foreign_id', '=', $id)
            ->delete();

            $imageadd = new Image;
            $imageadd->foreign_id = $id[0];
            $imageadd->role = 'destinations';
            $imageadd->path = $name;
            $imageadd->save();       
        }

        $file2 = $request->file('file2');
        if($file2){
            foreach($file2 as $file2){
                if($file2){
                    $name2 = $file2->getClientOriginalName();
                    $path2 = $file2->storeAs('public/destinations/',$name2);
                }
                else{
                    $name2 = NULL;
                }
                
                if($file2){
                    $imageadd2 = new Image;
                    $imageadd2->foreign_id = $id[0];
                    $imageadd2->role = 'destinations';
                    $imageadd2->path = $name2;
                    $imageadd2->save();
                }
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
