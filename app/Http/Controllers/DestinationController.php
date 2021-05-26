<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\Attachable;

class DestinationController extends Controller
{
    use Attachable;

    /**
     * return must be either news, packages, or destinations
     * 
     * @return string
     */
    public function setAttachmentType() {
        return 'destinations';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destination = DB::table('destinations')
        ->get();
        return view ('destinations.index', ['destination' => $destination]);
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
        
        return redirect()->route('destinations.index')->with('status', 'Data has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('destinations.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        return view('destinations.edit', ['destination' => $destination]);
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
        $name = DB::table('destinations')
        ->where([
            ['destination_id', '<>', $request->inputId],
            ['name', '=', $request->inputName],
        ])
        ->first();

        if($name) {
            return redirect()->back()->with('status', 'Destination already exist!');
        }
        
        $destination = DB::table('destinations')
        ->where('destination_id', '=', $request->inputId)
        ->update(
            ['name' => $request->inputName,
            'slug' => Str::slug($request->inputName, '-'),
            'description' => $request->inputDescription,
            'coordinate' => $request->inputLocation,
            ]
        );

        $file = $request->file('file');
        if($file){
            $name = $file->getClientOriginalName();
            $path = $file->storeAs('public/destinations/',$name);
        }
        else{
            $name = NULL;
        }

        if($file){
            $old = Image::where([
                ['role', 'destinations'],
                ['foreign_id', $request->inputId]
            ])
            ->pluck('path');

            foreach($old as $old){
                Storage::delete('public/destinations/'.$old);
            }

            $image = DB::table('images')
            ->where('foreign_id', $request->inputId)
            ->where('role', 'destinations')
            ->delete();

            $imageadd = new Image;
            $imageadd->foreign_id = $request->inputId;
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
                    $imageadd2->foreign_id = $request->inputId;
                    $imageadd2->role = 'destinations';
                    $imageadd2->path = $name2;
                    $imageadd2->save();
                }
            }
        }
        
        return redirect()->route('destinations.index')->with('status', 'Data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        Destination::destroy($destination->destination_id);
        
        $old = Image::where([
            ['role', 'destinations'],
            ['foreign_id', $destination->destination_id]
        ])
        ->pluck('path');

        foreach($old as $old){
            Storage::delete('public/destinations/'.$old);
        }

        $image = DB::table('images')
        ->where('foreign_id', '=', $destination->destination_id);
        $image->delete();

        return redirect()->route('destinations.index')->with('status','Data has been removed successfully!');
    }
}
