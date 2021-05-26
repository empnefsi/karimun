@extends('layouts.app')

@section('title', 'Edit Destination')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/dist/quill.core.css') }}" type="text/css">
@endsection

@section('content')
    @include('layouts.headers.main')
    
    <div class="container-fluid">
        <a class="back" href="{{ Route('destinations.index') }}"><i class="fas fa-chevron-left mt-4"></i> Back</a>
        <form class="form-create" id="needs-validation" role="form" method="POST" action="{{ route('destinations.update', ['destination' => $destination->slug]) }}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';" novalidate>
            @csrf
            @method('put')
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputName">Destination Name</label>
                                <input type="text" value="{{ old('inputName') ?? $destination->name }}" name="inputName" id="inputName" class="form-control rounded" placeholder="Destination Name" required>
                                <div class="invalid-feedback">*Please provide a valid destination name.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group files">
                                <label for="inputCover">Cover Photo</label>
                                <input type="file" name="file" id="inputCover" class="form-control rounded" accept="image/*">
                            </div>
                            <div class="mb-4">
                                <p>Current Cover Photo</p>
                                <img src="{{asset('/storage/destinations/'.$destination->images[0]->path)}}" alt="images" class="img-fluid" width="320px" height="100%">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputLocation">Destination Location URL</label>
                                <input type="text" value="{{ old('inputLocation') ?? $destination->coordinate }}" name="inputLocation" id="inputLocation" class="form-control rounded" placeholder="Destination Location URL" required>
                                <div class="invalid-feedback">*Please provide a valid destination location URL.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <div data-toggle="quill" data-quill-placeholder="Description" data-image-url="{{ Route('destinations.attachment.store') }}">
                                    {!! old('description') ?? $destination->description !!}
                                </div>
                                <input type="hidden" name="description" data-toggle="quill-value" required>
                                <div class="invalid-feedback">*Please provide a valid description.</div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group files">
                                <label for="inputGallery">Gallery</label>
                                <input type="file" name="file2[]" id="inputGallery" class="form-control rounded" accept="image/*" multiple>
                            </div>
                            <div class="mb-4">
                                <p>Current Gallery</p>
                            </div>
                        </div>
                    </div> -->
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
    @if (session('status'))
        <script>
            window.onload = () => {
            showNotification('bottom', 'right', 'warning', '<?php echo session('status') ?>');
            };
        </script>
    @endif
@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-notify/notification.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('argon') }}/js/quill-script.js"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('argon') }}/js/dropzone-script.js"></script>
@endpush