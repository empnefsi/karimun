<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Package;
use App\Models\News;
use App\Models\Image;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::take(5)->orderBy('created_at', 'desc')->get();
        $packages = Package::take(8)->orderBy('created_at', 'desc')->get();
        $news = News::take(4)->orderBy('created_at', 'desc')->get();

        return view('guest.index', compact('destinations', 'packages', 'news'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destination()
    {
        $carousel_sum = 3;

        $destination_cover = Destination::take($carousel_sum)->orderBy('created_at', 'desc')->get();

        $cover = array();

        for($i = 0; $i < $carousel_sum; $i++){
            array_push($cover, $destination_cover[$i]->images[0]->path);
        }

        $destinations = Destination::paginate(6);

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

        return view('guest.layouts.news', compact('cover', 'news'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destinationDetail($slug)
    {
        $destination_detail = Destination::where('destinations.slug', $slug)->first();

        return view('guest.layouts.destination-detail', compact('destination_detail'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function packageDetail($slug)
    {
        $package_detail = Package::where('packages.slug', $slug)->first();

        return view('guest.layouts.package-detail', compact('package_detail'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newsDetail($slug)
    {
        $news_detail = News::where('news.slug', $slug)->first();

        return view('guest.layouts.news-detail', compact('news_detail'));
    }
}
