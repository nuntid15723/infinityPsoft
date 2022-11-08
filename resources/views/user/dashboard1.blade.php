@extends('layouts.main_user')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/extensions/shepherd-theme-default.css') }}">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <a href="https://www.chartjs.org/docs/latest/getting-started/" target="_blank"></a>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}"> --}}
    <!-- END: Custom CSS-->
@endsection
@section('head')
    <title> Dashboard</title>
@endsection
@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card text-center">
                            <div class="card-content rounded-right"
                                style="border-right: solid;border-color:#6c75f6;border-width: 5px; ">
                                <div class="card-body">
                                    <div class="avatar bg-rgba-warning p-50 m-0 mb-1"
                                        style="background: #6c75f6 !important;">
                                        <div class="avatar-content">
                                            <i class="fa fa-briefcase text-primary font-medium-5"
                                                style="font-size: 1.8rem !important;"></i>
                                        </div>
                                    </div>
                                    {{-- @foreach (Auth::user()->user as $notify) --}}
                                        {{-- <div class="bg-300">
                                            <b>{{Auth::user()->fullname}}</b>
                                        </div> --}}
                                    {{-- @endforeach --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <!-- BEGIN: Page Vendor JS-->
        <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/tether.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/shepherd.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Page JS-->
        <script src="{{ asset('app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/charts/chart-chartjs.js') }}"></script>
        <!-- END: Page JS-->
        <script>
            var $dark_green = '#4ea397';
            var $green = '#22c3aa';
            var $light_green = '#7bd9a5';
            var $lighten_green = '#a8e7d2';


            var barChart = echarts.init(document.getElementById('bar-chart2'));


            // var i;
            function randomize() {
                return Math.round(300 + Math.random() * 700) / 10
            };

            var barChartoption = {
                legend: {},
                tooltip: {},
                dataset: {
                    source: [
                        ['product', 'ลากิจ', 'ลาป่วย', 'ลาพักร้อน', 'ลาเกิน'],
                        ['Month', randomize(), randomize(), randomize(), randomize()],
                        // ['Milk Tea', randomize(), randomize(), randomize()],
                        // ['Cheese Cocoa', randomize(), randomize(), randomize()],
                        // ['Walnut Brownie', randomize(), randomize(), randomize()],
                    ],

                },


                xAxis: {
                    type: 'category',
                    splitLine: {
                        show: true
                    },
                },
                yAxis: {},
                // Declare several bar series, each will be mapped
                // to a column of dataset.source by default.
                series: [{
                        type: 'bar',
                        itemStyle: {
                            color: $dark_green
                        },
                    },
                    {
                        type: 'bar',
                        itemStyle: {
                            color: $green
                        },
                    },
                    {
                        type: 'bar',
                        itemStyle: {
                            color: $light_green
                        },
                    },
                    {
                        type: 'bar',
                        itemStyle: {
                            color: $lighten_green
                        },
                    }
                ]
            };
            barChart.setOption(barChartoption);
        </script>
    @endsection
