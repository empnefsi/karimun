@extends('layouts.app')

@section('title', 'Destination Management')

@section('css')
    <link rel="stylesheet" href="assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.css"/>
@endsection

@section('content')
    @include('layouts.headers.main')
    
    <div class="container-fluid">
        <div class="card mt-7 pl-5 pr-5 pt-4 pb-4">
            <div class="row">
                <div class="col-md-12">
                    <a href="/adddestination" type="button" class="btn btn-primary btn-sm animation-on-hover float-right mb-2">+ Add Data</a>
                </div>
            </div>
            <table id="dataTable" class="table table-striped table-bordered display" style="width: 100%">
                <thead class="text-center align-middle">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 25%">Name</th>
                        <th style="width: 40%">Description</th>
                        <th style="width: 10%">Location</th>
                        <th style="width: 20%">Action</th>
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
                    <?php $destinations = []; $i=0; $count=count($destination); $j=1; ?>
                    @foreach($destination as $destination)
                        <?php 
                            $destinations[$i][0] = $destination->name;
                            $destinations[$i][1] = $destination->slug;
                            $destinations[$i][2] = $destination->description;
                            $destinations[$i][3] = $destination->coordinate;
                            $i++;
                        ?>
                    @endforeach
                    @for($i=0;$i<$count;$i++)
                        <tr>
                            <td class="text-center align-middle">{{$j}}.</td>
                            <td class="text-center align-middle">{{$destinations[$i][0]}}</td>
                            <td class="text-center align-middle">{{ strip_tags(\Illuminate\Support\Str::limit($destinations[$i][2],75))}}</td>
                            <!-- <td><?php echo $destinations[$i][3];?></td> -->
                            <td class="text-center align-middle"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal{{$i}}"><i class="fas fa-map-marker-alt"></i></button>
                                <div id="modal{{$i}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <?php echo $destinations[$i][3];?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center align-middle">
                                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-info pl-1 pr-1"></i></a>
                                <a href="editdestination/{{$destinations[$i][1]}}" class="btn btn-warning btn-sm "><i class="fas fa-pencil-alt"></i></a>
                                <a href="deletedestination/{{$destinations[$i][1]}}" class="btn btn-danger btn-sm text-white " onclick="return confirm('Are you sure to delete this record?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $j++; ?>
                    @endfor
                </tbody>
            </table>
        </div>
        @include('layouts.footers.auth')
    </div>
    
    @if (session('status'))
        <script>
            window.onload = () => {
            showNotification('top', 'right', 'success', '<?php echo session('status') ?>');
            };
        </script>
    @endif
@endsection

@push('scripts')
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js"></script>
    <script src="assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="assets/vendor/bootstrap-notify/notification.js"></script>
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable( {
                responsive: true
            } );
        } );
    </script>
@endpush