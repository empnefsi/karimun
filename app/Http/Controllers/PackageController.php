<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\PackageRequest;
use App\Http\Traits\Attachable;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    use Attachable;

    /**
     * return must be either news, packages, or destinations
     * 
     * @return string
     */
    public function setAttachmentType() {
        return 'packages';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();

        return view('packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PackageRequest
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        // dd($request);
        if($request->document){
            $packages = Package::create($request->validated());
            $cover = $request->validated()['cover'];
            if($cover){
                $ext = $cover->getClientOriginalExtension();
                $name = Str::random(40).'.'.$ext;
                $path = $cover->storeAs('public/packages/',$name);
    
                $image = $packages->images()->create([
                    'role' => 'package',
                    'path' => $name,
                ]);
            }
            foreach($request->document as $document){
                $packages->images()->create([
                    'role' => 'package',
                    'path' => $document,
                ]);
            }
        }
        else {
            return back()->with('status', 'Gallery must not be empty');
        }


        return redirect('admin/packages')->with('status','Package was successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        // dd($package->images);
        return view('packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PackageRequest  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, Package $package)
    {
        Package::find($package->package_id)->update($request->validated());
        if($request->cover){
            $cover = $request->validated()['cover'];
            if($cover){
                $name = $cover->getClientOriginalName();
                $path = $cover->storeAs('public/packages/',$name);

                $old = Image::where('foreign_id', $package->package_id)->first();
                Storage::delete('public/packages/'.$old->path);

                Image::where('foreign_id', $package->package_id)->limit(1)->update([
                    'role' => 'package',
                    'path' => $name,
                ]);
            }
        }

        if($request->document){
            foreach($request->document as $document){
                $package->images()->create([
                    'role' => 'package',
                    'path' => $document,
                ]);
            }
        }

        return redirect('admin/packages')->with('status','Package was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        Package::destroy($package->package_id);

        return redirect('admin/packages')->with('status','Package was successfully deleted');
    }
}
