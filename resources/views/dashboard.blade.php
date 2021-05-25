@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Total Visit</h2>
                            </div>
                            <div class="col">
                                <!-- <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data": window.data}]}}'>
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Daily</span>
                                            <span class="d-md-none">D</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data": window.dataM}]}}'>
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Monthly</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total Visitor</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Page visits</h3>
                            </div>
                            <!-- <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="width: 35%;">URL</th>
                                    <th scope="col" style="width: 50%;">Page Title</th>
                                    <th scope="col" style="width: 15%;">Visit</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($page as $page)
                                <tr>
                                    <th scope="row">
                                        {{ $page['url'] }}
                                    </th>
                                    <td>
                                        {{ $page['pageTitle'] }}
                                    </td>
                                    <td>
                                        {{ $page['pageViews'] }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Visitor type</h3>
                            </div>
                            <!-- <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div> -->
                    </div>
                    <div class="chart">
                        <canvas id="chart-users" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
    <script>
        window.date = ["{{ $analytics[0]['date']->format('M j') }}", "{{ $analytics[1]['date']->format('M j') }}", "{{ $analytics[2]['date']->format('M j') }}", "{{ $analytics[3]['date']->format('M j') }}", "{{ $analytics[4]['date']->format('M j') }}", "{{ $analytics[5]['date']->format('M j') }}", "{{ $analytics[6]['date']->format('M j') }}"];
        window.data = [{{ $analytics[0]['pageViews'] }}, {{ $analytics[1]['pageViews'] }}, {{ $analytics[2]['pageViews'] }}, {{ $analytics[3]['pageViews'] }}, {{ $analytics[4]['pageViews'] }}, {{ $analytics[5]['pageViews'] }}, {{ $analytics[6]['pageViews'] }}];  
        window.data2 = [{{ $analytics[0]['visitors'] }}, {{ $analytics[1]['visitors'] }}, {{ $analytics[2]['visitors'] }}, {{ $analytics[3]['visitors'] }}, {{ $analytics[4]['visitors'] }}, {{ $analytics[5]['visitors'] }}, {{ $analytics[6]['visitors'] }}];  
        window.user = [{{ $user['New Visitor'] }}, {{ $user['Returning Visitor'] }}];  
    </script>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush