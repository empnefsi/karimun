@extends('layouts.app', ['active' => 'Package'])

@section('title', 'Package Management')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    @include('layouts.headers.main')
    
    <div class="container-fluid">
        <div class="card mt-5 pl-5 pr-5 pt-4 pb-4">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ Route('packages.create') }}" type="button" class="btn btn-primary btn-sm animation-on-hover float-right mb-2">+ Add Data</a>
                </div>
            </div>
            <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered display" style="width: 100%">
                <thead class="text-center align-middle">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 25%">Name</th>
                        <th style="width: 40%">Description</th>
                        <th style="width: 10%">Price</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tfoot class="text-center align-middle">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($packages as $packages)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}.</td>
                            <td class="text-center align-middle">{{ $packages->name }}</td>
                            <td class="text-center align-middle">{{ strip_tags(\Illuminate\Support\Str::limit($packages->description ,75)) }}</td>
                            <td class="text-center align-middle">{{ number_format($packages->price, 0) }}</td>
                            <td class="text-center align-middle">
                                <a href="#" class="btn btn-primary btn-sm ">
                                    <i class="fas fa-info pl-1 pr-1"></i>
                                </a>
                                <a href="{{ route('packages.edit', ['package' => $packages->slug]) }}" class="btn btn-warning btn-sm ">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ Route('packages.destroy', ['package' => $packages->slug]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm text-white" onclick="return confirm('Are you sure to delete this record?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
    
    @if (session('status'))
        <script>
            window.onload = () => {
                showNotification('bottom', 'right', 'success', '<?php echo session('status') ?>');
            };
        </script>
    @endif
@endsection

@push('scripts')
    <script src="{{ asset("assets/vendor/datatables.net/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-buttons/js/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-buttons/js/buttons.flash.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-buttons/js/buttons.print.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/datatables.net-select/js/dataTables.select.min.js") }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js"></script>

    <script src="{{ asset("assets/vendor/bootstrap-notify/bootstrap-notify.min.js") }}"></script>
    <script src="{{ asset("assets/vendor/bootstrap-notify/notification.js") }}"></script>
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable( {
                "pagingType": "numbers",
                responsive: true,
                columnDefs: [
                    { responsivePriority: 2, targets: 2 },
                    { responsivePriority: 1, targets: [0,1,3] }
                ]
            } );
        } );
    </script>
@endpush