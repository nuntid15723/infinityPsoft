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
    <style>
        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: 250px;
            font-size: 17px;
        }
    </style>
@endsection
@section('head')
    <title>ประวัติการลา</title>
@endsection
@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="container-fluid ">
                    <div class="row ">
                        <div class="col-sm-6 ">
                            <div style="margin-left: 5px;">
                                <h1 class="m-0"
                                    style="font-family: 'Kanit', sans-serif; font-weight:500; color: #555555; ">
                                    <img src="{{ asset('images/note.png') }}" alt="" class="mr-1"
                                        style="height: 53px;
                                    width: 54px;">
                                    ประวัติการลา
                                </h1>
                            </div>
                            <br>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div>
                        <!-- Button trigger modal -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>
            <section id="nav-filled">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                            <section id="modal-themes">
                                <div class="row">
                                    <div class="col-12"style="margin-top: -45px;">
                                        <div class="card">
                                            <div class="modal-danger mr-1 mb-1 d-inline-block">
                                                <!-- Modal -->
                                                <div class="modal fade text-left" id="danger" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel18"
                                                                    style="font-family: 'Kanit', sans-serif; font-weight:400; color: #164176;">
                                                                    รายละเอียด</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('updateuse.absent') }}"method="POST"
                                                                    class="form form-vertical" enctype="multipart/form-data"
                                                                    novalidate>
                                                                    @csrf
                                                                    <div class="col-lg-12 "
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:400;color: #878181;">
                                                                        <div class="row">
                                                                            <div class="form-group">
                                                                                <input type="text" name="Id"
                                                                                    value="" id="leave-id"
                                                                                    class="form-control" hidden>
                                                                            </div>
                                                                            <div class="row col-lg-6 col-sm-12">
                                                                                <div class="col-sm-4 col-lg-4">
                                                                                    <p
                                                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                                        ชื่อ - นามสกุล : </p>

                                                                                </div>
                                                                                <div class=" col-sm-8 col-lg-8 mt-1">
                                                                                    <div class="form-group">
                                                                                        {{-- @php
                                                                                            dd($leaveListAll)
                                                                                        @endphp --}}

                                                                                        <input type="text"
                                                                                            style="border:0px;background-color: #fff; "
                                                                                            id="leave-fullname"
                                                                                            value="{{ Auth::user()->fullname }}"
                                                                                            {{-- value="{{ $leaveListAll[0]->fullname }}" --}}
                                                                                            class="form-control">
                                                                                        {{-- <select class="form-control"
                                                                                            disabled name="fullname"
                                                                                            id="leave-fullname"
                                                                                            style="border: 0px; background-color:#fff">
                                                                                            @foreach ($leaveListAll as $val)
                                                                                                <option
                                                                                                    value="{{ $val->user_id }}">
                                                                                                    {{ $val->fullname }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row col-lg-6 col-sm-12">
                                                                                <div class="col-sm-4 col-lg-4">
                                                                                    <p class=""
                                                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                                        เเผนก:</p>
                                                                                </div>
                                                                                <div class=" col-sm-8 col-lg-8 mt-1">
                                                                                    <select class="form-control" disabled
                                                                                        name="department"
                                                                                        id="leave-ladepartment"
                                                                                        style="border: 0px; background-color:#fff">
                                                                                        @foreach ($departList as $val)
                                                                                            <option
                                                                                                value="{{ $val->id }}">
                                                                                                {{ $val->dpname }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    {{-- <div class="form-group">
                                                                                        <input type="text" value="" style="border:0px;"
                                                                                            name="ladepartment" id="leave-ladepartment"
                                                                                            class="form-control">
                                                                                    </div> --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="row col-lg-6 col-sm-12">
                                                                                <div class="col-sm-4 col-lg-4">
                                                                                    <p class=""
                                                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                                        ประเภทการลา</p>
                                                                                </div>
                                                                                <div class="col-sm-8 col-lg-8 mt-1">
                                                                                    <div class="form-group">
                                                                                        {{-- <input type="text" value="" name="typeleave"
                                                                                            id="leave-typeleave" class="form-control"> --}}
                                                                                        <select class="form-control"
                                                                                            disabled name="typeleave"
                                                                                            id="leave-typeleave"
                                                                                            style="border: 0px; background-color:#fff">
                                                                                            <option value="1">ลากิจ
                                                                                            </option>
                                                                                            <option value="2">
                                                                                                ลาพักร้อน</option>
                                                                                            <option value="3">ลาป่วย
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row col-lg-6 col-sm-12">
                                                                                <div class="col-sm-4 col-lg-4">
                                                                                    <p class=""
                                                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                                        ระยะเวลาการลา</p>
                                                                                </div>
                                                                                <div class="col-sm-8 col-lg-8 mt-1">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                {{-- <input type="text" value=""
                                                                                                    name="timestart" id="leave-timestart"
                                                                                                    class="form-control"> --}}
                                                                                                <select
                                                                                                    class="form-control"
                                                                                                    disabled
                                                                                                    name="timestart"
                                                                                                    id="leave-timestart"
                                                                                                    style="border: 0px; background-color:#fff">
                                                                                                    <option value="1">
                                                                                                        ทั้งวัน</option>
                                                                                                    <option value="2">
                                                                                                        ครึ่งเช้า</option>
                                                                                                    <option value="3">
                                                                                                        ครึ่งบ่าย</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                {{-- <input type="text" value=""
                                                                                                    name="timeend" id="leave-timeend"
                                                                                                    class="form-control"> --}}
                                                                                                <select
                                                                                                    class="form-control"
                                                                                                    disabled name="timeend"
                                                                                                    id="leave-timeend"
                                                                                                    style="border: 0px; background-color:#fff;">
                                                                                                    <option value="0">
                                                                                                        ลาเต็ม</option>
                                                                                                    <option value="1">
                                                                                                        1 ชั่วโมง</option>
                                                                                                    <option value="2">
                                                                                                        2 ชั่วโมง</option>
                                                                                                    <option value="3">
                                                                                                        3 ชั่วโมง</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="row col-lg-6 col-sm-12">
                                                                                <div class="col-sm-4 col-lg-4">
                                                                                    <p class=""
                                                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                                        วันที่เริ่มลา</p>
                                                                                </div>
                                                                                <div class="col-sm-8 col-lg-8 mt-1">
                                                                                    <div class="form-group">
                                                                                        {{-- <input type="text" value=""
                                                                                            name="daystartla" id="leave-daystartla"
                                                                                            class="form-control"> --}}
                                                                                        <input class="form-control"
                                                                                            id="leave-daystartla"
                                                                                            type="text"
                                                                                            name="daystartla"
                                                                                            style="border: 0px; background-color:#fff;" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row col-lg-6 col-sm-12">
                                                                                <div class="col-sm-4 col-lg-4">
                                                                                    <p class=""
                                                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                                        วันที่สิ้นสุด</p>

                                                                                </div>
                                                                                <div class="col-sm-8 col-lg-8 mt-1">
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            value="" name="dayendla"
                                                                                            id="leave-dayendla"
                                                                                            class="form-control"
                                                                                            style="border: 0px; background-color:#fff;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-4 col-lg-2"
                                                                                style="margin-left: -10px;">
                                                                                <p class=""
                                                                                    style="margin-top: 20px; margin-left: 10px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                                    หมายเหตุ</p>
                                                                            </div>
                                                                            <div class="col-sm-8 col-lg-8 mt-1">
                                                                                <div class="form-group">
                                                                                    <textarea class="form-control" name="reasonla" value="leave-timeend" id="leave-reasonla" maxlength="100"
                                                                                        rows="3" style="border: 0px; ;"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer text-center">
                                                                        @include('sweetalert::alert')
                                                                        <div class="col-12">
                                                                            <button type="button" onclick="cls(3)"
                                                                                class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light"
                                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600;">ยกเลิกการลา</button>
                                                                            <button type="button"
                                                                                class="btn btn btn-outline-dark round mr-1 mb-1 waves-effect waves-light"
                                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600;"data-dismiss="modal"
                                                                                aria-label="Close">ปิด</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist"
                                            style="font-family: 'Kanit', sans-serif; font-weight:900;">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab-fill" data-toggle="tab"
                                                    href="#home-fill" role="tab" aria-controls="home-fill"
                                                    aria-selected="true" style="font-size: 20px;">
                                                    รออนุมัติ
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="messages-tab-fill" data-toggle="tab"
                                                    href="#messages-fill" role="tab" aria-controls="messages-fill"
                                                    aria-selected="false" style="font-size: 20px;">
                                                    อนุมัติ
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="settings-tab-fill" data-toggle="tab"
                                                    href="#settings-fill" role="tab" aria-controls="settings-fill"
                                                    aria-selected="false" style="font-size: 20px;">
                                                    ไม่อนุมัติ
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        {{-- ทั้งหมด --}}
                                        <div class="tab-content "
                                            style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                            <div class="tab-pane active" id="home-fill" role="tabpanel"
                                                aria-labelledby="home-tab-fill">
                                                <div class="card-content">
                                                    <div class="table-responsive mt-1  dataTables_scroll"
                                                        style="overflow-x: hidden;">
                                                        <section id="basic-datatable">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <div class="card-content">
                                                                            <div class="card-body card-dashboard">
                                                                                <div class="table-responsive  ">
                                                                                    <table class="table zero-configuration"
                                                                                        style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                        <thead class="thead-secondary ">

                                                                                            <tr class="dataTables_scroll">
                                                                                                <th
                                                                                                    style="border-radius: 15px 0px 0px 0px;">
                                                                                                    ลำดับ</th>
                                                                                                <th>รหัสพนักงาน</th>
                                                                                                <th>ชื่อ - นามสกุล</th>
                                                                                                <th>แผนก</th>
                                                                                                <th>เบอร์โทรศัพท์</th>
                                                                                                <th>
                                                                                                    วันที่เริ่มลา</th>
                                                                                                <th>
                                                                                                    วันที่สิ้นสุด</th>
                                                                                                <th>
                                                                                                    ระยะเวลาการลา</th>
                                                                                                <th>
                                                                                                    ประเภทการลา</th>
                                                                                                <th>
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
                                                                                                    <td>{{ $leaveDetall->emid }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <div>
                                                                                                            {{ $leaveDetall->fullname }}
                                                                                                    </td>
                                                                                                    <td class="p-1">
                                                                                                        {{ $leaveDetall->dpname }}
                                                                                                    </td>
                                                                                                    <td>{{ $leaveDetall->phonenumber }}
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
                                                                                                            @endif
                                                                                                            )
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
                                                                                                                <div class="chip-text"
                                                                                                                    style="color: #2E8B57">
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
                                                                                                                <div class="chip chip-warning"
                                                                                                                    type="button"
                                                                                                                    onclick="getData('{{ $leaveDetall->id }}')"
                                                                                                                    aria-hidden="true">
                                                                                                                    <div
                                                                                                                        class="chip-body">
                                                                                                                        <div
                                                                                                                            class="chip-text">
                                                                                                                            รออนุมัติ
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                {{-- <button
                                                                                                                    type="button"
                                                                                                                    class="btn"
                                                                                                                    data-toggle="modal"
                                                                                                                    data-target="#danger"
                                                                                                                    onclick="getData({{ $leaveDetall->id }});"
                                                                                                                    style="background-color: #95DDFC;height: 25px;width: 90px;padding: 0; margin-left: 5px;">
                                                                                                                    <i class="bi bi-eye-fill"
                                                                                                                        style="color: #faf74c;"></i>
                                                                                                                    <div class="chip-text "
                                                                                                                        style="color: ">
                                                                                                                        <b>
                                                                                                                            รออนุมัติ</b>
                                                                                                                    </div>
                                                                                                                </button> --}}
                                                                                                            @endif
                                                                                                        @endif
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- อนุมัติ --}}
                                            <div class="tab-pane" id="messages-fill" role="tabpanel"
                                                aria-labelledby="messages-tab-fill">

                                                <div class="tab-pane active" id="home-fill" role="tabpanel"
                                                    aria-labelledby="home-tab-fill">
                                                    <div class="card-content">
                                                        <div class="table-responsive mt-1  dataTables_scroll"
                                                            style="overflow-x: hidden;">
                                                            <section id="basic-datatable">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-content">
                                                                                <div class="card-body card-dashboard">
                                                                                    <div class="table-responsive  ">
                                                                                        <table
                                                                                            class="table zero-configuration"
                                                                                            style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                            <thead
                                                                                                class="thead-secondary ">
                                                                                                <tr
                                                                                                    class="dataTables_scroll">
                                                                                                    <th
                                                                                                        style="border-radius: 15px 0px 0px 0px;">
                                                                                                        ลำดับ</th>
                                                                                                    <th>
                                                                                                        รหัสพนักงาน</th>
                                                                                                    <th>
                                                                                                        ชื่อ - นามสกุล
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        แผนก
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        เบอร์โทรศัพท์
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        วันที่เริ่มลา
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        วันที่สิ้นสุด
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        ระยะเวลาการลา
                                                                                                    </th>
                                                                                                    <th>
                                                                                                        ประเภทการลา</th>
                                                                                                    <th
                                                                                                        style="border-top-right-radius: 15px;">
                                                                                                        สถานะการลา</th>


                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @php
                                                                                                    $i = 0;
                                                                                                @endphp
                                                                                                @foreach ($leaveListAllow as $Allow)
                                                                                                    <tr>
                                                                                                        <td>{{ ++$i }}
                                                                                                        </td>
                                                                                                        <td>{{ $Allow->emid }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{ $Allow->fullname }}
                                                                                                        </td>
                                                                                                        <td class="p-1">
                                                                                                            {{ $Allow->dpname }}
                                                                                                        </td>
                                                                                                        <td>{{ $Allow->phonenumber }}
                                                                                                        </td>
                                                                                                        <td>{{ Carbon::parse($Allow->daystartla)->thaidate('j M Y') }}
                                                                                                        </td>
                                                                                                        <td>{{ Carbon::parse($Allow->daystartla)->thaidate('j M Y') }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <span>
                                                                                                                @if ($Allow->timestart == 1)
                                                                                                                    ทั้งวัน
                                                                                                                @elseif($Allow->timestart == 2)
                                                                                                                    ครึ่งเช้า
                                                                                                                @else
                                                                                                                    ครึ่งบ่าย
                                                                                                                @endif

                                                                                                                {{-- {{$leaveDetall->timestart}} --}}
                                                                                                                (
                                                                                                                @if ($Allow->timeend == 0)
                                                                                                                    ลาเต็ม
                                                                                                                @elseif($Allow->timeend == 1)
                                                                                                                    1
                                                                                                                    ชั่วโมง
                                                                                                                @elseif($Allow->timeend == 2)
                                                                                                                    2
                                                                                                                    ชั่วโมง
                                                                                                                @else
                                                                                                                    3
                                                                                                                    ชั่วโมง
                                                                                                                @endif
                                                                                                                )
                                                                                                            </span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            @if ($Allow->typeleave == 1)
                                                                                                                ลากิจ
                                                                                                            @elseif($Allow->typeleave == 2)
                                                                                                                ลาพักร้อน
                                                                                                            @else
                                                                                                                ลาป่วย
                                                                                                            @endif
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="chip-text"
                                                                                                                style="color: #2E8B57">
                                                                                                                <b>
                                                                                                                    อนุมัติสำเร็จ</b>
                                                                                                            </div>
                                                                                                        </td>


                                                                                                    </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
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

                                            {{-- ไม่อนุมัติ --}}
                                            <div class="tab-pane" id="settings-fill" role="tabpanel"
                                                aria-labelledby="settings-tab-fill">
                                                <div class="tab-pane active" id="home-fill" role="tabpanel"
                                                    aria-labelledby="home-tab-fill">
                                                    <div class="card-content">
                                                        <div class="table-responsive mt-1  dataTables_scroll"
                                                            style="overflow-x: hidden;">
                                                            <section id="basic-datatable">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-content">
                                                                                <div class="card-body card-dashboard">
                                                                                    <div class="table-responsive  ">
                                                                                        <table
                                                                                            class="table zero-configuration "
                                                                                            style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                            <thead
                                                                                                class="thead-secondary ">
                                                                                                <tr
                                                                                                    class="dataTables_scroll">
                                                                                                    <th
                                                                                                        style="border-radius: 15px 0px 0px 0px;">
                                                                                                        ลำดับ</th>
                                                                                                    <th>รหัสพนักงาน</th>
                                                                                                    <th>ชื่อ - นามสกุล
                                                                                                    </th>
                                                                                                    <th>แผนก</th>
                                                                                                    <th>เบอร์โทรศัพท์
                                                                                                    </th>
                                                                                                    <th>วันที่เริ่มลา
                                                                                                    </th>
                                                                                                    <th>วันที่สิ้นสุด
                                                                                                    </th>
                                                                                                    <th>ระยะเวลาการลา
                                                                                                    </th>
                                                                                                    <th>ประเภทการลา</th>
                                                                                                    <th
                                                                                                        style="border-top-right-radius: 15px;">
                                                                                                        สถานะการลา</th>

                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @php
                                                                                                    $i = 0;
                                                                                                @endphp
                                                                                                @foreach ($leaveListNot as $Not)
                                                                                                    <tr>
                                                                                                        <td>{{ ++$i }}
                                                                                                        </td>
                                                                                                        <td>{{ $Not->emid }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{ $Not->fullname }}
                                                                                                        </td>
                                                                                                        <td class="p-1">
                                                                                                            {{ $Not->dpname }}
                                                                                                        </td>
                                                                                                        <td>{{ $Not->phonenumber }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{ Carbon::parse($Not->daystartla)->thaidate('j M Y') }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{ Carbon::parse($Not->dayendla)->thaidate('j M Y') }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <span>
                                                                                                                @if ($Not->timestart == 1)
                                                                                                                    ทั้งวัน
                                                                                                                @elseif($Not->timestart == 2)
                                                                                                                    ครึ่งเช้า
                                                                                                                @else
                                                                                                                    ครึ่งบ่าย
                                                                                                                @endif

                                                                                                                {{-- {{$leaveDetall->timestart}} --}}
                                                                                                                (
                                                                                                                @if ($Not->timeend == 0)
                                                                                                                    ลาเต็ม
                                                                                                                @elseif($Not->timeend == 1)
                                                                                                                    1
                                                                                                                    ชั่วโมง
                                                                                                                @elseif($Not->timeend == 2)
                                                                                                                    2
                                                                                                                    ชั่วโมง
                                                                                                                @else
                                                                                                                    3
                                                                                                                    ชั่วโมง
                                                                                                                @endif
                                                                                                                )
                                                                                                            </span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            @if ($Not->typeleave == 1)
                                                                                                                ลากิจ
                                                                                                            @elseif($Not->typeleave == 2)
                                                                                                                ลาพักร้อน
                                                                                                            @else
                                                                                                                ลาป่วย
                                                                                                            @endif
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="chip-text"
                                                                                                                style="color: #DE0808">
                                                                                                                <b>
                                                                                                                    ไม่อนุมัติ</b>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
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
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </section>

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

    <script type="text/javascript">
        function getData(id) {
            var url = "{{ route('absent.show', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data) {
                // console.log(data.data);
                $('#danger').modal('show');
                $('#leave-id').val(data.data.id);
                $('#leave-roleid').val(data.roleid).change();
                $('#leave-emimg').attr("src", "{{ asset('imguse') }}" + "/" + data.emimg);
                $('#leave-emid').val(data.emid);
                $('#leave-pnid').val(data.data.pnid);
                $('#leave-fullname').val(data.data.full_name);
                $('#leave-ladepartment').val(data.data.ladepartment).change();
                $("#leave-typeleave").val(data.data.typeleave).change();
                $('#leave-email').val(data.data.email);
                $('#leave-timestart').val(data.data.timestart);
                $('#leave-laimg').attr("src", "{{ asset('imgbank') }}" + "/" + data.data.laimg);
                $('#leave-timeend').val(data.data.timeend);
                $("#leave-daystartla").val(data.data.daystartla);
                $("#leave-dayendla").val(data.data.dayendla);
                $('#leave-reasonla').val(data.data.reasonla);
                console.log(data);
            })


        }

        // ('#close_modal').click(function(){
        //     $('#exampleModalCenter').modal('hide');
        // })
    </script>
    <script>
        function cls(params) {
            var id = $('#leave-id').val();
            console.log(id);
            $.ajax({
                type: "post",
                url: "{{ route('updateuse.absent') }}",
                data: {
                    _token: '{!! csrf_token() !!}',
                    id: id,
                    pnid: params,
                },
                dataType: "json",
                success: function(response) {
                    location.reload();
                }
            });
        }
    </script>
@endsection
