@extends('admin.layouts.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->






        <div class="row" >
            <div class="tile_count">
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                    <div class="count">{{ $nousers }}</div>
                </div>
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top">Total Orders</span>
                    <div class="count">{{ $noorders }}</div>
                    <span class="count_bottom"><i class="green"></i> </span>
                </div>
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top"> Last Week orders</span>
                    <div class="count green">{{ $noorderslastweek }}</div>
                    <span class="count_bottom"><i class="green"></i> </span>
                </div>
                <div class="col-md-3 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-clock-o"></i> Waited Orders</span>
                    <div class="count">{{ $nowaitedorders }}</div>
                    <span class="count_bottom"><i class="red"></i> </span>
                </div>
                {{-- <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"> last Week products </span>
                    <div class="count">2,315</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last
                        Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                    <div class="count">7,325</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last
                        Week</span>
                </div> --}}
            </div>
        </div>
        <!-- /top tiles -->

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="dashboard_graph">

                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>No. Orders Per Month</h3>
                        </div>

                    </div>

                    <div class="col-md-12 col-sm-12 ">
                        <canvas id="myChart" height="100px"></canvas>

                        <script type="text/javascript">
                            var labels = {{ Js::from($months) }};
                            var users = {{ Js::from($orderData) }};

                            const data = {
                                labels: labels,
                                datasets: [{
                                    label: 'Number of orders',
                                    borderColor: 'rgb(75, 192, 192)',
                                    data: users,
                                    fill: false,
                                    tension: 0.1

                                }]
                            };

                            const config = {
                                type: 'line',
                                data: data,
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            };

                            const myChart = new Chart(
                                document.getElementById('myChart'),
                                config
                            );
                        </script>
                    </div>
                    {{-- <div class="col-md-3 col-sm-3  bg-white">
                        <div class="x_title">
                            <h2>Top Campaign Performance</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-12 col-sm-12 ">
                            <div>
                                <p>Facebook Campaign</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Twitter Campaign</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 ">
                            <div>
                                <p>Conventional Media</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Bill boards</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <br />
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="dashboard_graph">

                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Done and Cancelled Orders  </h3>
                        </div>

                    </div>

                    <div class="col-md-12 col-sm-12">
                        <canvas id="orderstatepermonth" ></canvas>

                        <script type="text/javascript">
                            // Extracting data from the PHP variable
                            const orderStatusCountsPerMonth = @json($orderStatusCountsPerMonth);
                            console.log(orderStatusCountsPerMonth);
                            // Extracting month names and counts from the data
                            const labels1 = orderStatusCountsPerMonth.map(item => item.month);
                            const cancelledCounts = orderStatusCountsPerMonth.map(item => item.cancelled_count);
                            const doneCounts = orderStatusCountsPerMonth.map(item => item.done_count);

                            const data1 = {
                                labels: labels1,
                                datasets: [{
                                    label: 'Cancelled Orders',
                                    data: cancelledCounts,
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgb(255, 99, 132)',
                                    borderWidth: 1
                                }, {
                                    label: 'Done Orders',
                                    data: doneCounts,
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgb(54, 162, 235)',
                                    borderWidth: 1
                                }]
                            };

                            const config1 = {
                                type: 'bar',
                                data: data1,
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            };

                            const orderstatepermonth = new Chart(
                                document.getElementById('orderstatepermonth'),
                                config1
                            );
                        </script>

                    </div>
                    {{-- <div class="col-md-3 col-sm-3  bg-white">
                        <div class="x_title">
                            <h2>Top Campaign Performance</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-12 col-sm-12 ">
                            <div>
                                <p>Facebook Campaign</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Twitter Campaign</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 ">
                            <div>
                                <p>Conventional Media</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Bill boards</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <br />

        {{-- <div class="row">


            <div class="col-md-4 col-sm-4 ">
                <div class="x_panel tile fixed_height_320">
                    <div class="x_title">
                        <h2>App Versions</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h4>App Usage across versions</h4>
                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>0.1.5.2</span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>123k</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>0.1.5.3</span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>53k</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>0.1.5.4</span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>23k</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>0.1.5.5</span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>3k</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>0.1.5.6</span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>1k</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-8 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Best Seller</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">

                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <!-- Your HTML content -->


                    </div>
                </div>

            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Best Seller</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content"><iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                        <canvas id="bestSellerChart" height="276" width="552"
                            style="width: 442px; height: 221px;"></canvas>

                        <script>
                            // Extract data for chart labels and values
                            var productNames = @json($BestSellerProducts->pluck('productname'));
                            var totalQuantities = @json($BestSellerProducts->pluck('total_quantity'));

                            // Create the chart
                            var ctx = document.getElementById('bestSellerChart').getContext('2d');
                            var bestSellerChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    labels: productNames,
                                    datasets: [{
                                        label: 'Best Sellers',
                                        data: totalQuantities,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.5)',
                                            'rgba(54, 162, 235, 0.5)',
                                            'rgba(255, 205, 86, 0.5)',
                                            'rgba(75, 192, 192, 0.5)',
                                            'rgba(153, 102, 255, 0.5)',
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 205, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    // Add your chart options here
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Users Governerats <small>Sessions</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content"><iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                        <canvas id="pieChart" height="276" width="552" style="width: 442px; height: 221px;"></canvas>
                        <script type="text/javascript">
                            var governorates = {{ Js::from($governorates) }};
                            var userCounts = {{ Js::from($userCounts) }};
                            const piedata = {
                                labels: governorates,
                                datasets: [{
                                    label: 'My First Dataset',
                                    data: userCounts,

                                    hoverOffset: 4
                                }]
                            };
                            const pieconfig = {
                                type: 'pie',
                                data: piedata,
                            };
                            const pieChart = new Chart(
                                document.getElementById('pieChart'),
                                pieconfig
                            );
                        </script>
                    </div>

                </div>
            </div>

        </div>
    </div>




    <!-- /page content -->
@endsection
