@extends('layouts.main_admin')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/extensions/shepherd-theme-default.css') }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <a href="https://www.chartjs.org/docs/latest/getting-started/" target="_blank"></a>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}"> --}}
    <!-- END: Custom CSS-->
@endsection
@section('head')
    <title>หน้าหลัก</title>
@endsection
@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            {{-- <div class="content-header row">
                <div class="container-fluid mt-2">
                    <div class="row mb-2">
                        <div class="col-sm-6 ">
                            <div style="margin-left: 5px;">
                                <h1 class="m-0"
                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176; ">Dashboard
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <!-- Button trigger modal -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div> --}}
            <div class="content-body">
                <section id="statistics-card">
                    <div class="col-sm-6 ">
                        <div class="font-weight-bold">
                            <h1 class="m-0" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555;">
                                <img src="{{ asset('images/bar-chart.png') }}" alt="" class="mr-1"
                                    style="height: 50px;
                                width: 53px;margin-bottom: 17px;">
                                {{-- <i class="bi bi-house-door-fill"></i> --}}
                                หน้าหลัก
                            </h1>
                        </div>
                    </div>
                    <br>
                    <div class="alert alert-warning" role="alert">
                        <a href="{{ route('sumleavework') }}" style="color: #ff9f43">
                            <i class="bi bi-exclamation-triangle-fill mr-1 align-middle"></i>
                            <span onclick="readAll()" style="font-family: 'Kanit', sans-serif; font-weight:500;font-size: 1.2rem;">
                                มีคำร้องขอจากสมาชิก <strong class="bellcount"></strong> คำร้อง</span></a>
                    </div>
                    <br>
                    <!-- Dashboard Analytics Start -->
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card text-center">
                                <div class="card-content rounded-right"
                                    style="border-right: solid;border-color:#3cc873;border-width: 6px;">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1"
                                            style="background: #ddfde6 !important;">
                                            <div class="avatar-content">
                                                <i class="bi bi-cash-stack text-success font-medium-5"
                                                    style="font-size: 1.8rem !important;"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700"
                                            style="font-family: 'Kanit', sans-serif; font-weight:500;color:#14803f">
                                            {{ number_format($count_salary) }} บาท

                                        </h2>
                                        <p class="mb-0 line-ellipsis"
                                            style="font-family: 'Kanit', sans-serif; font-weight:500;font-size: 1.2rem;">
                                            ค่าค้างชำระเงินเดือน
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card text-center">
                                <div class="card-content rounded-right"
                                    style="border-right: solid;border-color:#ba7ffa;border-width: 6px;">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1"
                                            style="background: #e8c4ff !important;">
                                            <div class="avatar-content">
                                                <i class="feather icon-users text-primary font-medium-5"
                                                    style="font-size: 1.8rem !important;"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700"
                                            style="font-family: 'Kanit', sans-serif; font-weight:500;color:#7200eb">
                                            {{ number_format($count_users) }} คน
                                        </h2>
                                        <p class="mb-0 line-ellipsis"
                                            style="font-family: 'Kanit', sans-serif; font-weight:500;font-size: 1.2rem;">
                                            สมาชิก
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card text-center">
                                <div class="card-content rounded-right"
                                    style="border-right: solid;border-color:#6c75f6;border-width: 6px; ">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1"
                                            style="background: #6c75f6 !important;">
                                            <div class="avatar-content">
                                                <i class="bi bi-graph-up text-primary font-medium-5"
                                                    style="font-size: 1.8rem !important;"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700"
                                            style="font-family: 'Kanit', sans-serif; font-weight:500;color: #006aea;">
                                            {{ number_format($count_leavesum) }} วัน
                                        </h2>
                                        <p class="mb-0 line-ellipsis"
                                            style="font-family: 'Kanit', sans-serif; font-weight:500;font-size: 1.2rem;">
                                            ยอดรวมการลา
                                        </p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card text-center">
                                <div class="card-content rounded-right"
                                    style="border-right: solid;border-color:#00bff4;border-width: 6px;">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-primary p-50 m-0 mb-1"
                                            style="background: #a2d4ff !important;">
                                            <div class="avatar-content">
                                                <i class="bi bi-boxes text-primary font-medium-5"
                                                    style="font-size: 2rem !important;"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700"
                                            style="font-family: 'Kanit', sans-serif; font-weight:500;color:#00b1e2">
                                            {{ number_format($resultt) }} บาท
                                        </h2>
                                        <p class="mb-0 line-ellipsis"
                                            style="font-family: 'Kanit', sans-serif; font-weight:500;font-size: 1.2rem;">
                                            ทรัพย์สินสุทธิ
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="row">
                <div class="col-12" style="padding-right: 0px;padding-left: 0px;">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title"
                                style="font-family: 'Kanit', sans-serif; font-weight:500;font-size: 1.8rem;">
                                กราฟประวัติการลา</h1>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-1 col-sm-"><label
                                                for="first-year-id-icon"style="font-size: 1.5rem;font-family: 'Kanit', sans-serif; font-weight:200;">
                                                เลือกปี </label></div>
                                        <div class="col-lg-3 col-sm-4">
                                            <form name="frmMain" action="" class="form form-vertical"
                                                id="myform" method="GET">
                                                <input type="text" class="form-control year_pic" name="year"
                                                    style="text-align: center;font-family: 'Kanit', sans-serif; font-weight:400;" {{-- value='{{ (date('Y')) }}' --}} placeholder="เลือกปี"
                                                    id="datepicker" autocomplete="off"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                    onchange="year_chagne();">
                                                <br>
                                                <div class="form-control-position">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="column-chart3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script>
        $('#datepicker').datepicker({
            language: 'th-th',
            minViewMode: 2,
            format: 'yyyy'
        })

        $(document).ready(function() {
            // let year2 = $('.year_pic').val();
            let year2 = "{{ Carbon::parse(date('Y'))->thaidate('Y') }}";
            let yearr = year2 - 543
            console.log(yearr);
            let url2 = '{{ route('chartt', ':year') }}';
            url = url2.replace(':year', year2);
            $.get(url2, function(data) {
                let month = data.months;
                let round_l1 = data.round_l1;
                let round_l2 = data.round_l2;
                let round_l3 = data.round_l3;
                let yearr = data.year;
                var $primary = '#6c75f6',
                    $success = '#ba7ffa',
                    $danger = '#56ce78',
                    $warning = '#a8e7d2',
                    $info = '#00cfe8',
                    $label_color_light = '#dae1e7';

                var themeColors = [$primary, $success, $danger, $warning, $info];
                // RTL Support
                var yaxis_opposite = false;
                if ($('html').data('textdirection') == 'rtl') {
                    yaxis_opposite = true;
                }
                // Column Chart
                // ----------------------------------
                var columnChartOptions = {
                    chart: {
                        height: 350,
                        type: 'bar',
                        id: 'chart'
                    },
                    colors: themeColors,
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            endingShape: 'rounded',
                            columnWidth: '55%',
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    series: [{
                        name: 'ลากิจ',
                        data: round_l1
                    }, {
                        name: 'ลาป่วย',
                        data: round_l2
                    }, {
                        name: 'ลาพักร้อน',
                        data: round_l3
                    }],
                    legend: {
                        offsetY: -1
                    },
                    xaxis: {
                        categories: month,
                    },
                    yaxis: {
                        title: {
                            // text: '$ (thousands)'
                        },
                        opposite: yaxis_opposite
                    },
                    fill: {
                        opacity: 1

                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return " " + val + " ครั้ง"
                            }
                        }
                    }
                }
                var columnChart = new ApexCharts(
                    document.querySelector("#column-chart3"),
                    columnChartOptions
                );
                columnChart.render();
            });
        });

        function year_chagne() {
            let year = $('.year_pic').val();
            let yearr = year - 543;
            console.log(yearr);
            let url = '{{ route('chartt', ':year') }}';
            url = url.replace(':year', yearr);
            $.get(url, function(data) {
                console.log(data);
                let month = data.months;
                let round_l1 = data.round_l1;
                let round_l2 = data.round_l2;
                let round_l3 = data.round_l3;
                let yearr = data.year;

                var $primary = '#6c75f6',
                    $success = '#ba7ffa',
                    $danger = '#56ce78',
                    $warning = '#a8e7d2',
                    $info = '#00cfe8',
                    $label_color_light = '#dae1e7';

                var themeColors = [$primary, $success, $danger, $warning, $info];

                // RTL Support
                var yaxis_opposite = false;
                if ($('html').data('textdirection') == 'rtl') {
                    yaxis_opposite = true;
                }
                // Column Chart
                // ----------------------------------
                var columnChartOptions = {
                    chart: {
                        height: 350,
                        type: 'bar',
                    },
                    colors: themeColors,
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            endingShape: 'rounded',
                            columnWidth: '55%',
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    series: [{
                        name: 'ลากิจ',
                        data: round_l1
                    }, {
                        name: 'ลาป่วย',
                        data: round_l2
                    }, {
                        name: 'ลาพักร้อน',
                        data: round_l3
                    }],
                    legend: {
                        offsetY: -1
                    },
                    xaxis: {
                        categories: month,
                    },
                    yaxis: {
                        title: {
                            // text: '$ (thousands)'
                        },
                        opposite: yaxis_opposite
                    },
                    fill: {
                        opacity: 1

                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return " " + val + " ครั้ง"
                            }
                        }
                    }
                }
                var columnChart = new ApexCharts(
                    document.querySelector("#column-chart3"),
                    columnChartOptions
                );
                // columnChart.render();
                // columnChart.render();
                ApexCharts.exec('chart', 'updateOptions', columnChartOptions);
                // ApexCharts.exec('chart1', 'updateOptions', columnChartOptions)

            });
        }
    </script>
    {{-- <script>
        $(document).readonly(function() {
            $('#datepicker').datepicker({
                language: 'th-th',
                minViewMode: 2,
                format: 'yyyy'
            })

            function year_chagne() {
                let year = $('.year_pic').val();
                console.log(year);
                let url = '{{ route('chartt', ':year') }}';
                url = url.replace(':year', year);
                $.get(url, function(data) {
                    console.log(data);
                    let month = data.months;
                    let round_l1 = data.round_l1;
                    let round_l2 = data.round_l2;
                    let round_l3 = data.round_l3;

                    var $primary = '#6c75f6',
                        $success = '#ba7ffa',
                        $danger = '#56ce78',
                        $warning = '#a8e7d2',
                        $info = '#00cfe8',
                        $label_color_light = '#dae1e7';

                    var themeColors = [$primary, $success, $danger, $warning, $info];

                    // RTL Support
                    var yaxis_opposite = false;
                    if ($('html').data('textdirection') == 'rtl') {
                        yaxis_opposite = true;
                    }
                    // Column Chart
                    // ----------------------------------
                    var columnChartOptions = {
                        chart: {
                            height: 350,
                            type: 'bar',
                        },
                        colors: themeColors,
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                endingShape: 'rounded',
                                columnWidth: '55%',
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        series: [{
                            name: 'ลากิจ',
                            data: round_l1
                        }, {
                            name: 'ลาป่วย',
                            data: round_l2
                        }, {
                            name: 'ลาพักร้อน',
                            data: round_l3
                        }],
                        legend: {
                            offsetY: -1
                        },
                        xaxis: {
                            categories: month,
                        },
                        yaxis: {
                            title: {
                                // text: '$ (thousands)'
                            },
                            opposite: yaxis_opposite
                        },
                        fill: {
                            opacity: 1

                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return " " + val + " ครั้ง"
                                }
                            }
                        }
                    }
                    var columnChart = new ApexCharts(
                        document.querySelector("#column-chart3"),
                        columnChartOptions
                    );
                    columnChart.render();
                });
            }
        });
    </script> --}}
@endsection
