@extends('layouts.app')

@section('title', 'Edit Package')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/dist/quill.core.css') }}" type="text/css">
@endsection

@section('content')
    @include('layouts.headers.main')
    
    <div class="container-fluid">
        <a class="back" href="{{ Route('packages.index') }}"><i class="fas fa-chevron-left mt-4"></i> Back</a>
        <h1 class="c-grey-900 mt-4 text-center">Edit Package</h1>
        <form class="form-create" id="needs-validation" role="form" method="POST" action="{{ Route('packages.update', ['package' => $package->slug]) }}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';" novalidate>
            @csrf
            @method('put')
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Package Name</label>
                                <input type="text" name="name" id="name" class="form-control rounded" placeholder="Package Name" required value="{{ old('name') ?? $package->name }}">
                                <div class="invalid-feedback">*Please provide a valid package name.</div>
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
                                <label>Current Cover Photo</label><br>
                                <img src="{{ asset('/storage/packages/'.$package->images[0]->path) }}" alt="cover" class="img-fluid" width="320px" height="100%">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <div data-toggle="quill" data-quill-placeholder="Description" data-image-url="{{ Route('packages.attachment.store') }}">
                                    {!! old('description') ?? $package->description !!}
                                </div>
                                <input type="hidden" name="description" data-toggle="quill-value" required>
                                <div class="invalid-feedback">*Please provide a valid description.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control rounded" placeholder="Price" required value="{{ old('price') ?? $package->price}}">
                                <div class="invalid-feedback">*Please provide a valid price.</div>
                            </div>
                        </div>
                    </div>
                    <label>Gallery</label><br>
                    <div class="dropzone dropzone-multiple" data-toggle="dropzone" data-dropzone-multiple data-dropzone-url="{{ Route('packages.gallery.store') }}">
                        <div class="fallback">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="dropzoneMultipleUpload" multiple>
                                <label class="custom-file-label" for="dropzoneMultipleUpload">Choose file</label>
                            </div>
                        </div>
                        <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar">
                                            <img class="avatar-img rounded" src="#" alt="..." data-dz-thumbnail>
                                        </div>
                                    </div>
                                    <div class="col ml--3">
                                        <h4 class="mb-1" data-dz-name>...</h4>
                                        <p class="small text-muted mb-0" data-dz-size>...</p>
                                    </div>
                                    <div class="col-auto">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item" data-dz-remove>
                                                    Remove
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <br>
                    @php
                        $i=0
                    @endphp
                    @foreach($package->images as $images)
                        @php
                            $i++
                        @endphp
                    @endforeach
                    @if($i>1)
                        <label id="current">Current Gallery</label><br>
                    @endif
                    @for($j=1; $j<$i; $j++)
                    <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush" id="current{{$package->images[$j]->image_id}}">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar">
                                        <img class="avatar-img rounded" src="{{ asset('/storage/packages/gallery/'.$package->images[$j]->path) }}" alt="...">
                                    </div>
                                </div>
                                <div class="col ml--3">
                                    <h4 class="mb-1">{{ $package->images[$j]->path }}</h4>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0)" id="{{$package->images[$j]->image_id}}" class="dropdown-item">
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $('#{{$package->images[$j]->image_id}}').on('click',function(){
                                        var id = "{{$package->images[$j]->image_id}}";
                                        var val = "{{$package->images[$j]->path}}";
                                        var count = {{ $i }};
                                        $.ajax({
                                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                            url: "{{ route('packages.gallery.delete') }}",
                                            type: 'POST',
                                            data: {id: id, val: val, _token: '{{csrf_token()}}'},
                                            success: function (data){
                                                if(data == "Success"){
                                                    $('#current{{$package->images[$j]->image_id}}').html('');
                                                    count--;
                                                    if(count==1){
                                                        $('#current').html('');
                                                    }
                                                }
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </li>
                    </ul>
                    @endfor
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
    <script src="{{ asset('assets/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-notify/notification.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('argon') }}/js/quill-script.js"></script>
    <script src="{{ asset('argon') }}/js/dropzone-script.js"></script>
@endpush