<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
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
        $analytics = Analytics::fetchTotalVisitorsAndPageViews(Period::days(6));
        $page = Analytics::fetchMostVisitedPages(Period::days(6), 5);
        $user = Analytics::fetchUserTypes(Period::days(0))->countBy('type');

        $startDate = Carbon::parse('2021-01-01');
        $endDate = Carbon::now();
        $endDateBefore = Carbon::now()->subMonth();
        $total = Analytics::fetchTotalVisitorsAndPageViews(Period::create($startDate, $endDate))->sum('pageViews');
        $totalBefore = Analytics::fetchTotalVisitorsAndPageViews(Period::create($startDate, $endDateBefore))->sum('pageViews');
        if($totalBefore > 0){
            $update = ($total - $totalBefore)/$totalBefore;
        }
        else{
            $update = ($total - $totalBefore);
        }
        
        $news = News::count();
        return view('dashboard', compact(['analytics', 'page', 'user', 'total', 'update', 'news']));
    }
}
