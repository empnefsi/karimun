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
        $carousel_sum = 3;
        $destination_cover = Destination::take($carousel_sum)->orderBy('created_at', 'desc')->get();
        $cover = array();
        for($i = 0; $i < $carousel_sum; $i++){
            array_push($cover, $destination_cover[$i]->images[0]->path);
        }

        $destinations = Destination::take(5)->orderBy('created_at', 'desc')->get();
        $packages = Package::take(8)->orderBy('created_at', 'desc')->get();
        $news = News::take(4)->orderBy('created_at', 'desc')->get();

        return view('guest.index', compact('cover', 'destinations', 'packages', 'news'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destination()
    {
        // $cover = Destination::take(3)->get();
        $carousel_sum = 3;
        $destination_cover = Destination::take($carousel_sum)->orderBy('created_at', 'desc')->get();
        $cover = array();
        for($i = 0; $i < $carousel_sum; $i++){
            array_push($cover, $destination_cover[$i]->images[0]->path);
        }

        $destinations = Destination::paginate(6);

        // dd($destination);
        
        return view('guest.layouts.destination', compact('cover', 'destinations'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function package()
    {
        $carousel_sum = 3;
        $package_cover = Package::take($carousel_sum)->orderBy('created_at', 'desc')->get();
        $cover = array();
        for($i = 0; $i < $carousel_sum; $i++){
            array_push($cover, $package_cover[$i]->images[0]->path);
        }

        $packages = Package::paginate(6);

        return view('guest.layouts.package', compact('cover', 'packages'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        $carousel_sum = 3;
        $news_cover = News::take($carousel_sum)->orderBy('created_at', 'desc')->get();
        $cover = array();
        for($i = 0; $i < $carousel_sum; $i++){
            array_push($cover, $news_cover[$i]->images[0]->path);
        }

        $news = News::paginate(8);

        // dd($news);
        return view('guest.layouts.news', compact('cover', 'news'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destinationDetail($slug)
    {
        $detail = Destination::where('destinations.slug', '=', $slug)->first();

        // dd($detail);
        return view('guest.layouts.destination-detail', compact('detail'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function packageDetail($slug)
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
