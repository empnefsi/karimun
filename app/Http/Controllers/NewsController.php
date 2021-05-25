<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\NewsRequest;
use App\Http\Traits\Attachable;

class NewsController extends Controller
{
    use Attachable;

    /**
     * return must be either news, packages, or destinations
     * 
     * @return string
     */
    public function setAttachmentType() {
        return 'news';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\NewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = News::create($request->validated());

        $cover = $request->validated()['cover'];
        if($cover){
            $name = $cover->getClientOriginalName();
            $path = $cover->storeAs('public/news/',$name);

            $image = $news->images()->create([
                'role' => 'news',
                'path' => $name,
            ]);
        }

        return redirect('news')->with('status','News was successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
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
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        News::find($news->news_id)->update($request->validated());
        
        return redirect('news')->with('status','News was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        News::destroy($news->news_id);

        return redirect('news')->with('status','News was successfully deleted');
    }
}
