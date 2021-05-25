<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Package;
use App\Models\Destination;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel_sum = 3;
        $destination_cover = Destination::take($carousel_sum)->orderBy('updated_at', 'desc')->get();
        $cover = array();
        for($i = 0; $i < $carousel_sum; $i++){
            array_push($cover, $destination_cover[$i]->images[0]->path);
        }

        $destinations = Destination::take(5)->get();

        $packages = Package::take(5)->get();

        return view('guest.index', compact('cover', 'destinations', 'packages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destination()
    {
        return view('guest.layouts.destination');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function package()
    {
        return view('guest.layouts.package');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        return view('guest.layouts.news');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('guest.layouts.contact');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destinationDetail()
    {
        return view('guest.layouts.destination-detail');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function packageDetail()
    {
        return view('guest.layouts.package-detail');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newsDetail()
    {
        return view('guest.layouts.news-detail');
    }
}
