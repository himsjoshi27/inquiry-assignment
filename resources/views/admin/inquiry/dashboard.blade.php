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
                                <table class="table table-bordered" id="inquiry-table" width="100%" cellspacing="0">
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
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('#inquiry-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatable.data') !!}',
                columns: [
                    { data: 'full_name', name: 'full_name' },
                    { data: 'company_name', name: 'company_name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'city', name: 'city' },
                    { data: 'state', name: 'state' },
                    // { data: 'created_at', name: 'created_at' },
                    // { data: 'updated_at', name: 'updated_at' }
                ]
            });
        });

        // Area Chart
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($data as $date=>$value)
                    "{{$date}}",
                    @endforeach
                ],
                datasets: [{
                    label: "Total Inquiries",
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    data: [
                        @foreach($data as $date=>$value)
                            "{{$value}}",
                        @endforeach
                    ],
                }],
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>
@endsection
