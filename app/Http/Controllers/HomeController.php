<?php

namespace App\Http\Controllers;

use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $analytics = Analytics::fetchVisitorsAndPageViews(Period::days(6));  
        dd($analytics);
        return view('dashboard');
    }
}
