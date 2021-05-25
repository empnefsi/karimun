<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.index');
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
