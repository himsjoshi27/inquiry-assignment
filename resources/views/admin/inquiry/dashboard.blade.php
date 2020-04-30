@extends('layouts.dashboard')


@section('content')
    @include('inc.top-nav')
    <div id="layoutSidenav">
        @include('inc.side-bar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">{{ __('dashboard.dashboard') }}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">{{ __('dashboard.dashboard') }}</li>
                    </ol>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-chart-area mr-1"></i>{{ __('dashboard.chart') }}</div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>

                    </div>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>{{ __('dashboard.table') }}</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>{{ __('dashboard.name') }}</th>
                                        <th>{{ __('dashboard.company') }}</th>
                                        <th>{{ __('dashboard.state') }}</th>
                                        <th>{{ __('dashboard.city') }}</th>
                                        <th>{{ __('dashboard.email') }}</th>
                                        <th>{{ __('dashboard.ph_no') }}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('inc.footer')
        </div>
    </div>
@endsection

@section('after-script')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/assets/demo/chart-area-demo.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/assets/demo/datatables-demo.js')}}"></script>
@endsection
