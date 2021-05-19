@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @foreach ($news as $news)
        <form action="{{ Route('news.destroy', ['news' => $news->slug]) }}" method="POST">
            @csrf
            @method('delete')
            <button>delete {{ $news->slug }}</button>
        </form>
    @endforeach

@endsection
