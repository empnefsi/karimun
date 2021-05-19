@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @foreach ($news as $news)
        <div class="mt-7 d-inline">
            <a href="{{ Route('news.edit', ['news' => $news->slug]) }}">Edit</a>

            <form action="{{ Route('news.destroy', ['news' => $news->slug]) }}" method="POST">
                @csrf
                @method('delete')
                <button>delete {{ $news->slug }}</button>
            </form>
        </div>
    @endforeach

    <a href="{{ Route('news.create') }}">Add New</a>

@endsection
