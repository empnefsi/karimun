@extends('layouts.app')

@section('title', 'Destination Management')

@section('css')

@endsection
    <script src="assets/vendor/dropzone/dist/min/dropzone.min.css"></script>
@section('content')
    @include('layouts.headers.main')
    
    <div class="container-fluid">
        <a class="back" href="/destinationmanagement"><i class="fas fa-chevron-left mt-4"></i> Back</a>
        <h1 class="c-grey-900 mt-4 text-center">Add Destination</h1>
        <form class="form-create" id="needs-validation" role="form" method="POST" action="destinationForms" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';" novalidate>
            @csrf
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputName">Destination Name</label>
                                <input type="text" name="inputName" id="inputName" class="form-control rounded" placeholder="Destination Name" required>
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
                                <input type="text" name="inputLocation" id="inputLocation" class="form-control rounded" placeholder="Destination Location URL" required>
                                <div class="invalid-feedback">*Please provide a valid destination location URL.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea name="inputDescription" id="inputDescription" class="form-control rounded" rows="10" placeholder="Description" required></textarea>
                                <div class="invalid-feedback">*Please provide a valid description.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputGallery">Gallery</label>
                                <input type="file" name="file2" id="inputGallery" class="form-control rounded" multiple required>
                                <div class="invalid-feedback">*Please choose at least 1 file (max. 10).</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="submit" id="submit">Submit</button>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-header mt-1">
                    <h5 class="ml-2">Warrant</h5>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputProject">Attachments</label>
                        <input type="file" id="warrant" value="{{ old('file') }}" name="file" class="form-control mb-2 p-5 rounded">
                    </div>
                    <div class="form-group">
                        <label for="inputProject">Transaction Report</label>
                        <input type="file" id="warrant" value="{{ old('file2') }}" name="file2" class="form-control mb-2 p-5 rounded">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary float-right" type="submit" id="submit">Submit</button>
                </div>
            </div> -->
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
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/datatables.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script src="assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#inputDescription' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush