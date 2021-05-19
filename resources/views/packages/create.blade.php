@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    <div class="container-fluid mt-7">
        <div class="row">
            <form action="{{ route('packages.store') }}" method="POST">
                @csrf
                <input type="text" name="name">
                <textarea name="description" cols="30" rows="10"></textarea>
                <input type="number" name="price">
                <button type="submit">submit</button>
            </form>
        
        @include('layouts.footers.auth')
    </div>
@endsection