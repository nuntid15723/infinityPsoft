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
    <title> หน้าหลัก</title>
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
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card text-center">
                            <div class="card-content rounded-right"
                                style="border-right: solid;border-color:#3cc873;border-width: 5px;">
                                <div class="card-body">
                                    <div class="avatar bg-rgba-warning p-50 m-0 mb-1"
                                        style="background: #ddfde6 !important;">
                                        <div class="avatar-content">
                                            {{-- <i class="bi bi-exclamation-diamond-fill text-danger font-medium-5"
                                                style="font-size: 1.8rem !important;"></i> --}}
                                            <i class="bi bi-cash-stack text-success font-medium-5"
                                                style="font-size: 1.8rem !important;"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700"
                                        style="font-family: 'Kanit', sans-serif; font-weight:500;color:#14803f">
                                        @foreach ($leaves4 as $leaves4)
                                            {{ number_format($leaves4->salary) }} บาท
                                        @endforeach
                                    </h2>
                                    <p class="mb-0 line-ellipsis"
                                        style="font-family: 'Kanit', sans-serif; font-weight:500;font-size: 1.2rem;">
                                        เงินเดือน
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <h2 class="text-bold-700"
                                        style="font-family: 'Kanit', sans-serif; font-weight:500;color: #164176;">
                                        {{ $count_leavesum1 }} วัน
                                    </h2>
                                    <p class="mb-0 line-ellipsis"
                                        style="font-family: 'Kanit', sans-serif; font-weight:500;font-size: 1.2rem;">
                                        ลากิจ
                                    </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card text-center">
                            <div class="card-content rounded-right"
                                style="border-right: solid;border-color:#ba7ffa;border-width: 5px;">
                                <div class="card-body">
                                    <div class="avatar bg-rgba-warning p-50 m-0 mb-1"
                                        style="background: #e8c4ff !important;">
                                        <div class="avatar-content">
                                            <i class="bi bi-activity  text-primary font-medium-5"
                                                style="font-size: 1.8rem !important;"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700"
                                        style="font-family: 'Kanit', sans-serif; font-weight:500;color:#7200eb">
                                        {{ $count_leavesum3 }} วัน
                                    </h2>
                                    <p class="mb-0 line-ellipsis"
                                        style="font-family: 'Kanit', sans-serif; font-weight:500;font-size: 1.2rem;">
                                        ลาป่วย
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card text-center">
                            <div class="card-content rounded-right"
                                style="border-right: solid;border-color:#ff9f43;border-width: 5px;">
                                <div class="card-body">
                                    <div class="avatar bg-rgba-warning p-50 m-0 mb-1"
                                        style="background:#ffcc2e !important;">
                                        <div class="avatar-content">
                                            <div class="avatar-content"style="justify-content: normal;">
                                                <img src="{{ asset('images/coconut-tree.png') }}" class="mr-2">
                                            </div>
                                            {{-- <i class="feather icon-users text-primary font-medium-5"
                                                style="font-size: 1.8rem !important;"></i> --}}
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700"
                                        style="font-family: 'Kanit', sans-serif; font-weight:500;color: #ff9f43">
                                        {{ $count_leavesum2 }} วัน
                                    </h2>
                                    <p class="mb-0 line-ellipsis"
                                        style="font-family: 'Kanit', sans-serif; font-weight:500;font-size: 1.2rem;">
                                        ลาพักร้อน
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <section id="chartjs-charts">
                    <!-- Line Chart -->
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-lg-6 col-sm- mb-1">
                                        <h4 class="card-title">กราฟการลา</h4>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 mb-1">
                                        <h5 class="text-bold-500">ช่วงวันที่ </h5>
                                        <form class="position-relative has-icon-right">

                                            <input type='text' class="form-control pickadate" />
                                            <div class="form-control-position" style="top: 0px;">
                                                <i class="ficon feather icon-calendar"></i>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 mb-1">
                                        <h5 class="text-bold-500">ถึงวันที่</h5>
                                        <form class="position-relative has-icon-right">
                                            <input type='text' class="form-control pickadate" />
                                            <div class="form-control-position" style="top: 0px;">
                                                <i class="ficon feather icon-calendar"></i>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pl-0">
                                        <div class="height-450">
                                            <div id="bar-chart2" class="height-400"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-12" style="padding-right: 0px;
                     padding-left: 0px;">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                    กราฟประวัติการลา</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-1 col-sm-"><label
                                                for="first-year-id-icon"style="font-size: 1.5rem;font-family: 'Kanit', sans-serif; font-weight:200;">
                                                เลือกปี </label></div>
                                        <div class="col-lg-3 col-sm-4">
                                            <form name="frmMain" action="" class="form form-vertical"
                                                id="myform" method="GET">
                                                <input type="text" class="form-control year_pic" name="year"
                                                    style="text-align: center" {{-- value='{{ (date('Y')) }}' --}} placeholder="เลือกปี"
                                                    id="datepicker" autocomplete="off"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                    onchange="year_chagne();">
                                                <br>
                                                <div class="form-control-position">
                                            </form>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                {{-- <div id="column-chart1" id="hiddenfile1"></div> --}}
                                <div id="column-chart2" id="hiddenfile2"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="table-responsive "style="border-radius: 15px;">
                                    {{-- <table class="table table-hover-animation mb-0 "
                                            style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                            <thead class="thead-secondary mt-5">

                                                <tr class="dataTables_scroll">
                                                    <th style=" background-color:#ededed">
                                                        ลำดับ</th>
                                                    <th style="background-color:#ededed">ชื่อ - นามสกุล</th>
                                                    <th style="background-color:#ededed">
                                                        วันที่เริ่มลา</th>
                                                    <th style="background-color:#ededed">
                                                        วันที่สิ้นสุด</th>
                                                    <th style="background-color:#ededed">
                                                        ระยะเวลาการลา</th>
                                                    <th style="background-color:#ededed">
                                                        ประเภทการลา</th>
                                                    <th style="background-color:#ededed">
                                                        สถานะการลา</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @foreach ($leaveListAll as $leaveDetall)
                                                    <tr>
                                                        <td>{{ ++$i }}
                                                        </td>
                                                        <td>
                                                            <div>
                                                                {{ $leaveDetall->fullname }}
                                                        </td>
                                                        </td>
                                                        <td>{{ Carbon::parse($leaveDetall->daystartla)->thaidate('j M Y') }}
                                                        </td>
                                                        <td>{{ Carbon::parse($leaveDetall->dayendla)->thaidate('j M Y') }}
                                                        </td>
                                                        <td>
                                                            <span>
                                                                @if ($leaveDetall->timestart == 1)
                                                                    ทั้งวัน
                                                                @elseif($leaveDetall->timestart == 2)
                                                                    ครึ่งเช้า
                                                                @else
                                                                    ครึ่งบ่าย
                                                                @endif
                                                                (@if ($leaveDetall->timeend == 0)
                                                                    ลาเต็ม
                                                                @elseif($leaveDetall->timeend == 1)
                                                                    1
                                                                    ชั่วโมง
                                                                @elseif($leaveDetall->timeend == 2)
                                                                    2
                                                                    ชั่วโมง
                                                                @else
                                                                    3
                                                                    ชั่วโมง
                                                                @endif)
                                                            </span>
                                                        </td>
                                                        <td>
                                                            @if ($leaveDetall->typeleave == 1)
                                                                ลากิจ
                                                            @elseif($leaveDetall->typeleave == 2)
                                                                ลาพักร้อน
                                                            @else
                                                                ลาป่วย
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (!empty($leaveDetall))
                                                                @if ($leaveDetall->pnid == 1)
                                                                    <div class="chip-text" style="color: #2E8B57">
                                                                        <b>
                                                                            อนุมัติ</b>
                                                                    </div>
                                                                @elseif($leaveDetall->pnid == 0)
                                                                    <div class="chip-text"
                                                                        style="color: rgb(187, 14, 14)">
                                                                        <b>
                                                                            ไม่อนุมัติ</b>
                                                                    </div>
                                                                @elseif($leaveDetall->pnid == 3)
                                                                    <div class="chip-text"
                                                                        style="color: rgb(255, 91, 143)">
                                                                        <b>
                                                                            ยกเลิก</b>
                                                                    </div>
                                                                @elseif($leaveDetall->pnid == 2)
                                                                    <button type="button" class="btn"
                                                                        data-toggle="modal" data-target="#danger"
                                                                        onclick="getData({{ $leaveDetall->id }});"
                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;">
                                                                        <i class="bi bi-eye-fill"
                                                                            style="color: #164176;"></i>
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
            let url2 = '{{ route('chart', ':year') }}';
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
                        id: 'chart1'
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
                    document.querySelector("#column-chart2"),
                    columnChartOptions
                );
                columnChart.render();

            });

        });

        function year_chagne() {
            let year = $('.year_pic').val();
            let yearr = year - 543;
            console.log(year);
            let url = '{{ route('chart', ':year') }}';
            url = url.replace(':year', yearr);
            $.get(url, function(data) {
                console.log(data);
                let month = data.months;
                let round_l1 = data.round_l1;
                let round_l2 = data.round_l2;
                let round_l3 = data.round_l3;
                let yearr = data.year;
                console.log(yearr);
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
                columnChart = new ApexCharts(
                    document.querySelector("#column-chart2"),
                    columnChartOptions

                );
                // columnChart.render();
                ApexCharts.exec('chart1', 'updateOptions', columnChartOptions)
            });
        }
    </script>

    {{-- <script>
        $(document)(function() {
            $('#datepicker').datepicker({
                language: 'th-th',
                minViewMode: 2,
                format: 'yyyy'
                window.location.reload();
            })

            function year_chagne() {
                let year = $('.year_pic').val();
                console.log(year);
                let url = '{{ route('chart', ':year') }}';
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
                        document.querySelector("#column-chart2"),
                        columnChartOptions
                    );
                    columnChart.render();
                    window.location.reload();
                });
            }
        });
    </script> --}}
@endsection
