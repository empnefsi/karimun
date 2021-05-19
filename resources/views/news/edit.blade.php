@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    <div class="container-fluid mt-7">
        <div class="row">
            <form action="{{ route('news.update', ['news' => $news->slug]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{ $news->title }}">
                <textarea name="description" cols="30" rows="10">{{ $news->description }}</textarea>
                <button type="submit">submit</button>
            </form>
        
        @include('layouts.footers.auth')
    </div>
@endsection
