<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    {{-- <link href="{{ asset('css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <link href="{{ asset('css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
    

</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            {{-- <img height="128px" width="128px" alt="image" class="img-circle" src="@if(Auth::user()->gender == 'male') {{ asset('img/male.png') }} @else {{ asset('img/female.png') }} @endif" /> --}}
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            {{-- <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong> --}}
                             {{-- </span> <span class="text-muted text-xs block"> {{ Auth::user()->roles['0']->label }} <b class="caret"></b></span> </span> </a> --}}
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            {{-- <li><a href="{{ url('/admin/users/' . Auth::Id()) }}">Profile</a></li> --}}
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        JBS
                    </div>
                </li>
                <li class="active">
                    <a href="{{ url('admin') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>

                </li>

{{-- @if(Auth::user()->hasRole(['maintenance-admin'])) --}}
                {{-- <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Manage Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('/admin/permissions') }}">Permission</a></li>
                        <li><a href="{{ url('admin/roles') }}">Roles</a></li>
                        <li><a href="{{ url('admin/users') }}">Users</a></li>
                    </ul>
                </li> --}}
{{-- @endif --}}
{{-- @if (Auth::user()->hasRole(['admin'])) --}}
<li>
                        <a href="{{ url('admin/users') }}"><i class="fa fa-users"></i> <span class="nav-label">Manage Users</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('manager') }}">manage Managers</a></li>
                            <li><a href="{{ url('salesPerson') }}">Manage Workers</a></li>
                            <li><a href="{{ url('admin/users') }}">Users</a></li>
                        </ul>
                </li>
{{-- @endif --}}
                <li>
                        <a href="{{ url('customer') }}"><i class="fa fa-user"></i> <span class="nav-label">Customers</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/sales') }}"><i class="fa fa-calendar-check-o"></i> <span class="nav-label">Sales</span></a>
                </li>
{{-- @if(Auth::user()->hasRole(['sales'])) --}}
<li>
                    <a href="{{ url('/admin/stocks') }}"><i class="fa fa-mobile"></i> <span class="nav-label">Products Available</span></a>
                </li>
{{-- @endif --}}
{{-- @if(Auth::user()->hasRole(['admin', 'manager', 'maintenance-admin'])) --}}

                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Setup Inventory</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('store') }}">Stores</a></li>
                        <li><a href="{{ url('category') }}">Categories</a></li>
                        <li><a href="{{ url('admin/brands') }}">Models</a></li> 

                        <li><a href="{{ url('manageProducts') }}">Products</a></li>
                        {{-- <li><a href="{{ url('admin/suppliers') }}">Suppiers</a></li> --}}
                        {{-- <li><a href="{{ url('admin/unit-of-measurements') }}">Unit of Measurement</a></li> --}}

                    </ul>
                </li>

                <li>
                        <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Manage Stocks</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('/admin/products') }}">Add New Product</a></li>
            <li><a href="{{ url('/admin/purchase-order-headers') }}">Re-Stock Product</a></li>

                        </ul>
                    </li>

                    {{-- <li>
                        <a href="{{ url('admin/services') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Services</span></a>
                    </li> --}}


                    <li>
                        <a href="{{ url('admin/reports/sales') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Sales Report</span></a>
                    </li>

                <li>
                    <a href="{{ url('/admin/settings') }}"><i class="fa fa-laptop"></i> <span class="nav-label">Settings</span></a>
                </li>
                {{-- @endif --}}
                {{-- <li>
                        <a href="{{ url('admin/service-reports') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Service Reports</span></a>
                    </li> --}}
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search for product..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>

        </div>

            <ul class="nav navbar-top-links navbar-right">
                {{-- @if (isset(Auth::user()->store_id)) --}}
                <li style="margin-right: 150px;">
                    {{-- <span class="badge badge-success" style="font-size: 20px"><strong> <em>{{ Auth::user()->store->name }}</em></strong></span> --}}
                </li>
                {{-- @endif --}}
<li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Jay Bawa Systems Inventory Management Application.</span>
                </li>
{{-- @if(Auth::user()->hasRole(['admin', 'manager', 'maintenance-admin'])) --}}

                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        {{-- <i class="fa fa-bell"></i>  <span class="label label-danger">{{(count($low_products) > 0) ? count($low_products) : '0'}}</span> --}}
                    </a>
                    {{-- @if (count($low_products) > 0) --}}
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="{{ url('admin/products/low-product') }}">
                                <div>
                                    {{-- <i class="fa fa-envelope fa-fw"></i> You have  {{ count($low_products) }} low product(s)
                                    <span class="pull-right text-muted small"> {{ $low_products[0]->updated_at->diffForHumans()}}</span> --}}
                                </div>
                            </a>
                        </li>
                        {{-- <li class="divider"></li> --}}
                        {{-- <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li> --}}
                    </ul>
                    {{-- @endif --}}
                </li>
{{-- @endif --}}
                <li>
                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>
        @if (Session::has('error_message'))
        <br>
    <div class="alert alert-danger">
        <strong>Error! </strong> {{ Session::get('error_message') }}
    </div>
        @endif
           @if (Session::has('flash_message'))
           <br>
           <div class="alert alert-success">
               <strong>Completed! </strong> {{ Session::get('flash_message') }}
           </div>
           @endif

            @yield('content')
            
            @if (request()->is('admin/sales/invoice-print/*'))
            <div></div>
            @else
            <div class="footer">
            <div class="pull-right">
                This Applicatiion took <strong>{{ (microtime(true) - LARAVEL_START) }}</strong> seconds to render this page.
.
            </div>
            <div>
                <strong>&copy; {{date('Y', time())}} {{ config('app.name') }}</strong> | <em>Powered by AllSafe & <a target="_blank" href="http://appnatureng.com/">Appnature</a></em>
            </div>
        </div>
            @endif

        </div>
</div>


    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
      <!-- Chosen -->
    <script src="{{ asset('js/plugins/chosen/chosen.jquery.js') }}"></script>

    <script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>
<script>
                $('.chosen-select').chosen();
                 $(".select2_demo_3").select2({
                placeholder: "Select Store(s)"
            });
                 $(".select2_demo_4").select2({
                placeholder: "Select product"
            });
                 $(".select2_demo").select2();


    </script>
        <!-- Sweet alert -->
        {{-- <script src="{{ asset('js/plugins/sweetalert/sweetalert.min.js') }}"></script> --}}
        <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script>
$('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

</script>


    <!-- jQuery UI -->
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>
    @yield('scripts')

    {{-- @if (Session::has('error_message'))
    <script type="text/javascript">
               swal('WHOOP!', "{{ Session::get('error_message') }}", 'error');
           </script>
   @endif
           @if (Session::has('flash_message'))
           <script type="text/javascript">
               swal('Good Job!', "{{ Session::get('flash_message') }}", 'success');
           </script>
           @endif --}}

    <script>

        $(document).ready(function() {

            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>
</body>

</html>
