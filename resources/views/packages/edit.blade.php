@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    <div class="container-fluid mt-7">
        <div class="row">
            <form action="{{ route('packages.update', ['package' => $package->slug]) }}" method="POST">
                @csrf
                @method('put')
                <input type="text" name="name" value="{{ $package->name }}">
                <textarea name="description" cols="30" rows="10">{{ $package->description }}</textarea>
                <input type="number" name="price" value="{{ $package->price }}">
                <button type="submit">submit</button>
            </form>
            
        @include('layouts.footers.auth')
    </div>
@endsection