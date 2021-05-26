<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Requests\PackageRequest;
use App\Http\Traits\Attachable;

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
        $packages = Package::create($request->validated());

        $cover = $request->validated()['cover'];
        if($cover){
            $name = $cover->getClientOriginalName();
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
        $cover = $request->validated()['cover'];
        if($cover){
            $name = $cover->getClientOriginalName();
            $path = $cover->storeAs('public/packages/',$name);

            $image = $package->images()->create([
                'role' => 'package',
                'path' => $name,
            ]);
        }
        // dd($request->document);
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
