@extends('layouts.app', ['active' => 'News'])

@section('title', 'Add News')

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/vendor/quill/dist/quill.core.css") }}" type="text/css">
@endsection

@section('content')
    @include('layouts.headers.main')
    
    <div class="container-fluid">
        <a class="back" href="{{ Route('news.index') }}"><i class="fas fa-chevron-left mt-4"></i> Back</a>
        <h1 class="c-grey-900 mt-4 text-center">Add News</h1>
        <form class="form-create" id="needs-validation" role="form" method="POST" action="{{ Route('news.store') }}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';" novalidate>
            @csrf
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">News Title</label>
                                <input type="text" name="title" id="title" class="form-control rounded" placeholder="News Title" required value="{{ old('title') }}">
                                <div class="invalid-feedback">*Please provide a valid news title.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group files">
                                <label for="cover">Cover Photo</label>
                                <input type="file" name="cover" id="cover" class="form-control rounded" accept="image/*" required>
                                <div class="invalid-feedback">*Please choose 1 file.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <div data-toggle="quill" data-quill-placeholder="Description" data-image-url="{{ Route('news.attachment.store') }}">
                                    {!! old('description') !!}
                                </div>
                                <input type="hidden" name="description" data-toggle="quill-value" required value="{!! old('description') !!}">
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
        @include('layouts.footers.auth')
    </div>
    @error('title')
        <script>
            window.onload = () => {
                showNotification('bottom', 'right', 'warning', 'News already exist!');
            };
        </script>
    @enderror
@endsection

@push('scripts')
    <script src="{{ asset("assets/vendor/bootstrap-notify/bootstrap-notify.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/bootstrap-notify/notification.js") }}"></script>
    <script src="{{ asset("assets/vendor/quill/dist/quill.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/dropzone/dist/min/dropzone.min.js") }}"></script>
    <script src="{{ asset('argon') }}/js/quill-script.js"></script>
    <script src="{{ asset('argon') }}/js/dropzone-script.js"></script>

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

    @error('title')
        <script>
            window.onload = () => {
                showNotification('bottom', 'right', 'warning', 'News already exist!');
            };
        </script>
    @enderror

    @if(session('status'))
        <script>
            window.onload = () => {
                showNotification('bottom', 'right', 'warning', '<?php echo session('status') ?>');
            };
        </script>
    @endif
@endpush