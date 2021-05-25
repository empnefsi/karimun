<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Package;
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
        $cover = Destination::take(3)->get();
        $destination = Destination::paginate(6);

        // dd($destination);
        
        return view('guest.layouts.destination', compact('cover', 'destination'));
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
        $cover = News::take(3)->get();
        $news = News::paginate(8);

        // dd($news);
        return view('guest.layouts.news', compact('cover', 'news'));
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
    public function destinationDetail($slug)
    {
        $detail = Destination::where('destinations.slug', '=', $slug)->first();

        dd($detail);
        return view('guest.layouts.destination-detail', compact('detail'));
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
    public function newsDetail($slug)
    {
        $news = News::where('news.slug', '=', $slug)->first();

        dd($news);
        
        return view('guest.layouts.news-detail', compact('news'));
    }
}
