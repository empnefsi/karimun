@extends('layouts.app')

@section('title', 'Destination Management')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/datatables.min.css"/>
@endsection

@section('content')
    @include('layouts.headers.main')
    
    <div class="container-fluid">
        <h1 class="c-grey-900 mt-5 text-center">DESTINATION LIST</h1>
        <div class="card mt-5 pl-5 pr-5 pt-4 pb-4">
            <div class="row">
                <div class="col-md-12">
                    <a href="/adddestination" type="button" class="btn btn-primary btn-sm animation-on-hover float-right mb-2">+ Add Data</a>
                </div>
            </div>
            <table id="dataTable" class="table table-striped table-bordered display">
                <thead class="text-center align-middle">
                    <tr>
                        <th width="10">No</th>
                        <th width="200">Name</th>
                        <th>Description</th>
                        <th width="15">Location</th>
                        <th width="15">Action</th>
                    </tr>
                </thead>
                <tfoot class="text-center align-middle">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach($destination as $destination)
                    <tr>
                        <td class="text-center align-middle">{{$loop->iteration}}.</td>
                        <td class="text-center align-middle">{{$destination->name}}</td>
                        <td class="text-center align-middle">{!! \Illuminate\Support\Str::limit($destination->description,120)!!}</td>
                        <td class="text-center align-middle">{{ \Illuminate\Support\Str::limit($destination->coordinate,20)}}</td>
                        <td class="text-center align-middle">
                            <a href="" class="btn btn-primary btn-sm"><i class="fas fa-info pl-1 pr-1"></i></a>
                            <a href="" class="btn btn-warning btn-sm "><i class="fas fa-pencil-alt"></i></a>
                            <a href="" class="btn btn-danger btn-sm text-white " onclick="return confirm('Are you sure to delete this record?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script>
@endpush