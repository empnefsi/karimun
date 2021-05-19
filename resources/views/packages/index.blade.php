@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @foreach ($packages as $package)
        <div class="mt-7 d-inline">
            <a href="{{ Route('packages.edit', ['package' => $package->slug]) }}">EDIT</a>

            <form action="{{ Route('packages.destroy', ['package' => $package->slug]) }}" method="POST">
                @csrf
                @method('delete')
                <button>delete {{ $package->slug }}</button>
            </form>
        </div>
    @endforeach
    
    <a href="{{ Route('packages.create') }}">ADD MEW</a>

@endsection