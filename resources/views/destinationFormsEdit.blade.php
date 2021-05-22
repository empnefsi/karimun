@extends('layouts.app')

@section('title', 'Edit Destination')

@section('css')

@endsection

@section('content')
    @include('layouts.headers.main')
    
    <div class="container-fluid">
        <a class="back" href="/destinationmanagement"><i class="fas fa-chevron-left mt-4"></i> Back</a>
        <h1 class="c-grey-900 mt-4 text-center">Edit Destination</h1>
        <form class="form-create" id="needs-validation" role="form" method="POST" action="{{ route('destinationFormsEdit') }}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';" novalidate>
        @csrf
            @foreach($destination as $destination)
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputName">Destination Name</label>
                                <input type="text" value="{{$destination->name}}" name="inputName" id="inputName" class="form-control rounded" placeholder="Destination Name" required>
                                <div class="invalid-feedback">*Please provide a valid destination name.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputCover">Cover Photo</label>
                                <input type="file" name="file" id="inputCover" class="form-control rounded" required>
                                <div class="invalid-feedback">*Please choose 1 file.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputLocation">Destination Location URL</label>
                                <input type="text" value="{{$destination->coordinate}}" name="inputLocation" id="inputLocation" class="form-control rounded" placeholder="Destination Location URL" required>
                                <div class="invalid-feedback">*Please provide a valid destination location URL.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea name="inputDescription" id="inputDescription" class="form-control rounded" rows="10" placeholder="Description" required><?php echo $destination->description?></textarea>
                                <div class="invalid-feedback">*Please provide a valid description.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputGallery">Gallery</label>
                                <input type="file" name="file2[]" id="inputGallery" class="form-control rounded" multiple required>
                                <div class="invalid-feedback">*Please choose at least 1 file (max. 10).</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="submit" id="submit">Submit</button>
                </div>
            </div>
            @endforeach
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
                showNotification('top', 'right', 'warning', '<?php echo session('status') ?>');
            };
        </script>
    @endif
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script src="assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="assets/vendor/bootstrap-notify/notification.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#inputDescription' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush