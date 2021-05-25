@extends('layouts.app')

@section('title', 'Edit News')

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/vendor/quill/dist/quill.core.css") }}" type="text/css">
@endsection

@section('content')
    @include('layouts.headers.main')
    
    <div class="container-fluid">
        <a class="back" href="{{ Route('news.index') }}"><i class="fas fa-chevron-left mt-4"></i> Back</a>
        <h1 class="c-grey-900 mt-4 text-center">Edit News</h1>
        <form class="form-create" id="needs-validation" role="form" method="POST" action="{{ Route('news.update', ['news' => $news->slug]) }}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';" novalidate>
            @csrf
            @method('put')
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">News Title</label>
                                <input type="text" name="title" id="title" class="form-control rounded" placeholder="News Title" required value="{{ old('title') ?? $news->title }}">
                                <div class="invalid-feedback">*Please provide a valid news title.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group files">
                                <label for="cover">Cover Photo</label>
                                <input type="file" name="cover" id="cover" class="form-control rounded" accept="image/*" >
                                <div class="invalid-feedback">*Please choose 1 file.</div>
                            </div>
                            <div class="mb-4">
                                <p>Current Cover Photo</p>
                                <img src="{{ asset('/storage/news/'.$news->images[0]->path) }}" alt="cover" class="img-fluid" width="320px" height="100%">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <div data-toggle="quill" data-quill-placeholder="Description" data-image-url="{{ Route('news.attachment.store') }}">
                                    {!! old('description') ?? $news->description !!}
                                </div>
                                <input type="hidden" name="description" data-toggle="quill-value" required>
                                <div class="invalid-feedback">*Please provide a valid description.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="submit" id="submit">Submit</button>
                </div>
            </div>
        </form>
        <script>
            ! function() {
                "use strict";
                window.addEventListener("load", function() {
                    var e = document.getElementById("needs-validation");
                    e.addEventListener("submit", function(t) {
                        !1 === e.checkValidity() && (t.preventDefault(), t.stopPropagation()), e.classList.add("was-validated")
                    }, !1)
                }, !1)
            }()
        </script>
        @include('layouts.footers.auth')
    </div>
    @error('title')
        <script>
            window.onload = () => {
                showNotification('top', 'right', 'warning', 'News already exist!');
            };
        </script>
    @enderror
@endsection

@push('scripts')
    <script src="{{ asset("assets/vendor/bootstrap-notify/bootstrap-notify.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/bootstrap-notify/notification.js") }}"></script>
    <script src="{{ asset("assets/vendor/quill/dist/quill.min.js") }}"></script>
    <script src="{{ asset('argon') }}/js/quill-script.js"></script>
@endpush