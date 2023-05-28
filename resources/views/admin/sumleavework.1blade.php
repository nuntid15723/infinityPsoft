@extends('layouts.main_admin')

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

    {{-- <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css"> --}}

    <style>
        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: 250px;
            font-size: 18px;
            border-radius: 23px;
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
                    </div>
                    <!-- Button trigger modal -->
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-sm-6" style="margin-top: -55px;">
                            <div style="text-align: end;">
                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-success mr-1 mb-1 waves-effect waves-light"
                                    style="color: #ffffff;font-size: 1.3rem;background-color: #1d6f42 !important;font-family: 'Kanit', sans-serif;font-weight:400; border-radius: 23px;"><i
                                        class="bi bi-file-earmark-x"> </i>Export</button> --}}
                                <button type="button" class="btn btn-primary text-white px-5"
                                    style="font-size: 18px; border-radius: 23px; padding-left: 2rem !important;
                                        padding-right: 2rem !important;background-color: #2E8B57 !important;">
                                    <a href="{{ route('leave.export') }}" style="color: #ffffff"><i
                                            class="bi bi-file-earmark-excel mr-1 "></i>Export</a>
                                    </a>
                                </button>
                            </div>
                        </div>
                        {{-- Modal1 --}}
                        <div class="col-lg-6">
                            {{-- <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel18" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                    role="document"> --}}
                            <div class="modal fade" id="defaultSize" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel18"
                                                style="font-family: 'Kanit', sans-serif; font-weight:400; color: #164176;">
                                                รออนุมัติ</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table mb-0" style="white-space: nowrap;">
                                                        <h5
                                                            style="font-family: 'Kanit', sans-serif;
                                                        font-weight: 400;color: #878181;margin-left: 12px;">
                                                            ประวัติการลา</h5>
                                                        <tbody id="getDataleave"
                                                            style="font-family: 'Kanit', sans-serif;
                                                        font-weight: 400; color: #878181">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            {{-- <hr size="5" color="ff0088"> --}}
                                            <div class="card"
                                                style="border: solid 1px;border-color:#8c8888; background-color: #8c8888;margin-top: 15px;">
                                            </div>
                                            <form action="{{ route('update.absent') }}"method="POST"
                                                class="form form-vertical" enctype="multipart/form-data" novalidate>
                                                @csrf
                                                {{ csrf_field() }}
                                                <div class="col-lg-12 "
                                                    style="font-family: 'Kanit', sans-serif; font-weight:400;color: #878181;margin-top: -25px;">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <input type="text" name="Id" value=""
                                                                id="leave-id" placeholder="รหัสประเภทแผนก"
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
                                                                    <input type="text" value=""
                                                                        style="border:0px;background-color: #fff; " disabled
                                                                        name="user_id" id="leave-fullname"
                                                                        class="form-control">
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
                                                                <select class="form-control" disabled name="department"
                                                                    id="leave-ladepartment"
                                                                    style="border: 0px; background-color:#fff">
                                                                    @foreach ($departmentList as $val)
                                                                        <option value="{{ $val->id }}">
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
                                                                    <select class="form-control" disabled name="typeleave"
                                                                        id="leave-typeleave"
                                                                        style="border: 0px; background-color:#fff">
                                                                        <option value="1">ลากิจ</option>
                                                                        <option value="2">ลาพักร้อน</option>
                                                                        <option value="3">ลาป่วย</option>
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
                                                                            <select class="form-control" disabled
                                                                                name="timestart" id="leave-timestart"
                                                                                style="border: 0px; background-color:#fff">
                                                                                <option value="1">ทั้งวัน</option>
                                                                                <option value="2">ครึ่งเช้า</option>
                                                                                <option value="3">ครึ่งบ่าย</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            {{-- <input type="text" value=""
                                                                                name="timeend" id="leave-timeend"
                                                                                class="form-control"> --}}
                                                                            <select class="form-control" disabled
                                                                                name="timeend" id="leave-timeend"
                                                                                style="border: 0px; background-color:#fff;">
                                                                                <option value="0">ลาเต็ม</option>
                                                                                <option value="1">1 ชั่วโมง</option>
                                                                                <option value="2">2 ชั่วโมง</option>
                                                                                <option value="3">3 ชั่วโมง</option>
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
                                                                    <input class="form-control" id="leave-daystartla"
                                                                        type="text" name="daystartla"
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
                                                                {{-- <p class=""
                                                                style="font-family: 'Kanit', sans-serif; font-weight:400;font-size:1.2rem;">
                                                                12/08/2565</p> --}}
                                                                <div class="form-group">
                                                                    <input type="text" value="" name="dayendla"
                                                                        id="leave-dayendla" class="form-control"
                                                                        style="border: 0px; background-color:#fff;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 col-lg-2" style="margin-left: -10px;">
                                                            <p class=""
                                                                style="margin-top: 20px; margin-left: 10px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                หมายเหตุ</p>
                                                        </div>
                                                        <div class="col-sm-8 col-lg-8 mt-1">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="reasonla" value="leave-timeend" id="leave-reasonla" maxlength="100"
                                                                    rows="2" style="border: 0px; ;"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer text-center">
                                                    <div class="col-12">
                                                        <button type="button" onclick="approve(1)"
                                                            class="btn btn-outline-success round mr-1 mb-1 waves-effect waves-light"
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400;">
                                                            <b>อนุมัติ</b></button>
                                                        <button type="button" onclick="disapproved(0)"
                                                            class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light"
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400;">
                                                            <b>ไม่อนุมัติ</b></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end Modal1 --}}

                        {{-- Modal2 --}}
                        <div class="col-lg-6">
                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle"
                                                style="font-family: 'Kanit', sans-serif; font-weight:500;color:#164176;font-size:1.2rem;">
                                                รออนุมัติ</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0"style="white-space: nowrap;">
                                                    <h5
                                                        style="font-family: 'Kanit', sans-serif;
                                                font-weight: 400;color: #878181;margin-left: 12px;">
                                                        ประวัติการลา</h5>
                                                    <tbody id="getDataleave1"
                                                        style=" font-weight: bold;
                                                    font-family: 'Kanit', sans-serif;
                                                    font-weight: 400;">
                                                </table>
                                            </div>
                                            <div class="card"
                                                style="border: solid 1px;border-color:#8c8888; background-color: #8c8888;margin-top: 15px;">
                                            </div>
                                            <form action="{{ route('update.absent') }}"method="POST"
                                                class="form form-vertical" enctype="multipart/form-data" novalidate>
                                                @csrf
                                                <div class="col-lg-12" style="margin-top: -20px;">
                                                    <div class="" style="text-align: center">
                                                        <img id="leave-laimg1" class="img-fluid"
                                                            style="max-width: 150px;height: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                    </div>
                                                    <div class="" style="text-align: center">
                                                        <label for="Image" class="form-label"
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500;color:#8c8888"></span>
                                                            ใบรับรองเเพทย์</label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <input type="text" name="Id" value=""
                                                                id="leave-id1" placeholder="" class="form-control"
                                                                hidden>
                                                            {{-- <input type="text" name="typeleave" value=""
                                                                id="leave-ladepartment1" placeholder=""
                                                                class="form-control" hidden> --}}
                                                            {{-- <input type="text" name="user_id" value=""
                                                                id="leave-fullname1" placeholder="" class="form-control"
                                                                hidden> --}}
                                                        </div>
                                                        <div class="row col-lg-6 col-sm-12">
                                                            <div class="col-sm-4 col-lg-4">
                                                                <p class=""
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                    ชื่อ - นามสกุล</p>

                                                            </div>

                                                            <div class=" col-sm-8 col-lg-8 mt-1">
                                                                <div class="form-group">
                                                                    <input type="text" value=""
                                                                        style="border:0px;background-color: #fff; font-family: 'Kanit', sans-serif; font-weight:400;"
                                                                        disabled name="user_id" id="leave-fullname1"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" row col-lg-6 col-sm-12">
                                                            <div class="col-sm-4 col-lg-4">
                                                                <p class=""
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                    เเผนก</p>
                                                            </div>
                                                            <div class=" col-sm-8 col-lg-8 mt-1">
                                                                <select class="form-control" disabled name="department"
                                                                    id="leave-ladepartment1"
                                                                    style="border: 0px; background-color:#fff;font-family: 'Kanit', sans-serif; font-weight:400;">
                                                                    @foreach ($departmentList as $val)
                                                                        <option value="{{ $val->id }}">
                                                                            {{ $val->dpname }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class=" row col-lg-6 col-sm-12">
                                                            <div class="col-sm-4 col-lg-4">
                                                                <p class=""
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                    ประเภทการลา</p>
                                                            </div>
                                                            <div class=" col-sm-8 col-lg-8 mt-1">
                                                                <select class="form-control" disabled name="typeleave"
                                                                    id="leave-typeleave1"
                                                                    style="border: 0px; background-color:#fff;font-family: 'Kanit', sans-serif; font-weight:400;">
                                                                    <option value="1">ลากิจ</option>
                                                                    <option value="2">ลาพักร้อน</option>
                                                                    <option value="3">ลาป่วย</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class=" row col-lg-6 col-sm-12">
                                                            <div class="col-sm-4 col-lg-5">
                                                                <p class=""
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                    ระยะเวลาการลา</p>
                                                            </div>
                                                            <div class=" col-sm-8 col-lg-7 mt-1">
                                                                <select class="form-control" disabled name="timestart"
                                                                    id="leave-timestart1"
                                                                    style="border: 0px; background-color:#fff;font-family: 'Kanit', sans-serif; font-weight:400;">
                                                                    <option value="1">ทั้งวัน</option>
                                                                    <option value="2">ครึ่งเช้า</option>
                                                                    <option value="3">ครึ่งบ่าย</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class=" row col-lg-6 col-sm-12">
                                                            <div class="col-sm-4 col-lg-4">
                                                                <p class=""
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                    วันที่เริ่มลา</p>
                                                            </div>
                                                            <div class=" col-sm-8 col-lg-8 mt-1">
                                                                <div class="form-group">
                                                                    <input class="form-control" id="leave-daystartla1"
                                                                        type="text" name="daystartla"
                                                                        style="border: 0px; background-color:#fff;font-family: 'Kanit', sans-serif; font-weight:400;" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" row col-lg-6 col-sm-12">
                                                            <div class="col-sm-4 col-lg-4">
                                                                <p class=""
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                    วันที่สิ้นสุด</p>
                                                            </div>

                                                            <div class=" col-sm-8 col-lg-8 mt-1">
                                                                <div class="form-group">
                                                                    <input type="text" value="" name="dayendla"
                                                                        id="leave-dayendla1" class="form-control"
                                                                        style="border: 0px; background-color:#fff;font-family: 'Kanit', sans-serif; font-weight:400;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class=" row col-lg-12 col-sm-12">
                                                            <div class="col-sm-4 col-lg-2"style="margin-right: -8px;">
                                                                <p class=""
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;     margin-left: 8px;">
                                                                    หมายเหตุ</p>
                                                            </div>
                                                            <div class=" col-sm-8 col-lg-10 mt-1">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="reasonla" value="leave-timeend1" id="leave-reasonla1" maxlength="100"
                                                                        rows="3" style="border: 0px; background-color:#fff;font-family: 'Kanit', sans-serif; font-weight:400;"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer text-center">
                                                        @include('sweetalert::alert')
                                                        <div class="col-12">
                                                            <button type="button" onclick="approve1(1)"
                                                                class="btn btn-outline-success round mr-1 mb-1 waves-effect waves-light"
                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400;"><b>อนุมัติ</b></button>
                                                            <button type="button" onclick="disapproved1(0)"
                                                                class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light"
                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400;"><b>ไม่อนุมัติ</b></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- end Modal2 --}}
                                <!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <section id="nav-filled">
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <div class="card overflow-hidden">
                                    <section id="modal-themes">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">

                                                    <div class="modal-danger mr-1 mb-1 d-inline-block">
                                                        <!-- Modal -->
                                                        <div class="modal fade text-left" id="danger" tabindex="-1"
                                                            role="dialog" aria-labelledby="myModalLabel120"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger white"
                                                                        style="background-color: #164176 !important;">
                                                                        <h5 class="modal-title" id="myModalLabel120"
                                                                            style="margin-top: 10px;font-family: 'Kanit', sans-serif; font-weight:400; margin-left: 33px;">
                                                                            ข้อมูลการลา
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" style="margin-left: 33px;">
                                                                        <p
                                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                            ชื่อ - นามสกุล</p>
                                                                        <p
                                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                            เเผนก</p>
                                                                        <p
                                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                            ประเภทการลา</p>
                                                                        <p
                                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                            วันที่เริ่มลา</p>
                                                                        <p
                                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                            วันที่สิ้นสุด</p>
                                                                        <p
                                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                            ระยะเวลาการลา</p>
                                                                        <p
                                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #878181;">
                                                                            หมายเหตุ</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-outline-success round mr-1 mb-1 waves-effect waves-light"
                                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600;"><b>อนุมัติ</b></button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light"
                                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600;"><b>ไม่อนุมัติ</b></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    {{-- <div class="card-header">

                                <h4 class="card-title">Filled</h4>
                            </div> --}}
                                    <div class="card-content">
                                        <div class="card-body" style="margin-top: -44px;">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist"
                                                style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab-fill" data-toggle="tab"
                                                        href="#home-fill" role="tab" aria-controls="home-fill"
                                                        aria-selected="true" style="font-size: 20px;">
                                                        รออนุมัติ
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab-fill" data-toggle="tab"
                                                        href="#profile-fill" role="tab" aria-controls="profile-fill"
                                                        aria-selected="false" style="font-size: 20px;">
                                                        อนุมัติ
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="messages-tab-fill" data-toggle="tab"
                                                        href="#messages-fill" role="tab"
                                                        aria-controls="messages-fill" aria-selected="false"
                                                        style="font-size: 20px;">
                                                        ไม่อนุมัติ
                                                    </a>
                                                </li>
                                                {{-- <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-fill" data-toggle="tab"
                                                href="#settings-fill" role="tab" aria-controls="settings-fill"
                                                aria-selected="false" style="font-size: 20px;">

                                            </a>
                                        </li> --}}
                                            </ul>

                                            <!-- Tab panes -->
                                            {{-- รออนุมัติ --}}
                                            <div class="tab-content "
                                                style="font-family: 'Kanit', sans-serif; font-weight:400;">
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
                                                                                            <thead class="thead-secondary ">

                                                                                                <tr
                                                                                                    class="dataTables_scroll">
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
                                                                                                @foreach ($leaveList as $leaveDetall)
                                                                                                    <tr>
                                                                                                        <td>{{ ++$i }}
                                                                                                        </td>
                                                                                                        <td>{{ $leaveDetall->emid }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div>
                                                                                                                {{ Str::limit($leaveDetall->fullname, '20', '..') }}
                                                                                                                {{-- {{ $leaveDetall->fullname }} --}}
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

                                                                                                                {{-- {{$leaveDetall->timestart}} --}}
                                                                                                                (
                                                                                                                @if ($leaveDetall->timeend == 0)
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

                                                                                                            @if ($leaveDetall->typeleave == 3)
                                                                                                                <div class="chip chip-warning"
                                                                                                                    type="button"
                                                                                                                    data-toggle="modal"
                                                                                                                    aria-labelledby="exampleModalScrollableTitle"
                                                                                                                    data-target="#exampleModalScrollable"
                                                                                                                    onclick="getData1('{{ $leaveDetall->id }}')"
                                                                                                                    aria-hidden="true">
                                                                                                                    <div
                                                                                                                        class="chip-body">
                                                                                                                        <div
                                                                                                                            class="chip-text">
                                                                                                                            รออนุมัติ
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            @else
                                                                                                                <div class="chip chip-warning"
                                                                                                                    type="button"
                                                                                                                    {{-- data-toggle="modal"
                                                                                                            aria-labelledby="exampleModalScrollableTitle"
                                                                                                            data-target="#defaultSize" --}}
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
                                                                                                                {{-- @php
                                                                                                            dd($leaveDetall->id);
                                                                                                        @endphp --}}
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
                                                <div class="tab-pane" id="profile-fill" role="tabpanel"
                                                    aria-labelledby="profile-tab-fill">

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
                                                                                                    @foreach ($leaveList1 as $List1)
                                                                                                        <tr>
                                                                                                            <td>{{ ++$i }}
                                                                                                            </td>
                                                                                                            <td>{{ $List1->emid }}
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                {{-- {{ $List1->fullname }} --}}
                                                                                                                {{ Str::limit($List1->fullname, '20', '..') }}

                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="p-1">
                                                                                                                {{ $List1->dpname }}
                                                                                                            </td>
                                                                                                            <td>{{ $List1->phonenumber }}
                                                                                                            </td>
                                                                                                            <td>{{ Carbon::parse($List1->daystartla)->thaidate('j M Y') }}
                                                                                                            </td>
                                                                                                            <td>{{ Carbon::parse($List1->dayendla)->thaidate('j M Y') }}
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <span>
                                                                                                                    @if ($List1->timestart == 1)
                                                                                                                        ทั้งวัน
                                                                                                                    @elseif($List1->timestart == 2)
                                                                                                                        ครึ่งเช้า
                                                                                                                    @else
                                                                                                                        ครึ่งบ่าย
                                                                                                                    @endif

                                                                                                                    {{-- {{$leaveDetall->timestart}} --}}
                                                                                                                    (
                                                                                                                    @if ($List1->timeend == 0)
                                                                                                                        ลาเต็ม
                                                                                                                    @elseif($List1->timeend == 1)
                                                                                                                        1
                                                                                                                        ชั่วโมง
                                                                                                                    @elseif($List1->timeend == 2)
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
                                                                                                                @if ($List1->typeleave == 1)
                                                                                                                    ลากิจ
                                                                                                                @elseif($List1->typeleave == 2)
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
                                                                                                    @foreach ($leaveList2 as $List2)
                                                                                                        <tr>
                                                                                                            <td>{{ ++$i }}
                                                                                                            </td>
                                                                                                            <td>{{ $List2->emid }}
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                {{-- {{ $List2->fullname }} --}}
                                                                                                                {{ Str::limit($List2->fullname, '20', '..') }}

                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="p-1">
                                                                                                                {{ $List2->dpname }}
                                                                                                            </td>
                                                                                                            <td>{{ $List2->phonenumber }}
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                {{ Carbon::parse($List2->daystartla)->thaidate('j M Y') }}
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                {{ Carbon::parse($List2->dayendla)->thaidate('j M Y') }}
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <span>
                                                                                                                    @if ($List2->timestart == 1)
                                                                                                                        ทั้งวัน
                                                                                                                    @elseif($List2->timestart == 2)
                                                                                                                        ครึ่งเช้า
                                                                                                                    @else
                                                                                                                        ครึ่งบ่าย
                                                                                                                    @endif

                                                                                                                    {{-- {{$leaveDetall->timestart}} --}}
                                                                                                                    (
                                                                                                                    @if ($List2->timeend == 0)
                                                                                                                        ลาเต็ม
                                                                                                                    @elseif($List2->timeend == 1)
                                                                                                                        1
                                                                                                                        ชั่วโมง
                                                                                                                    @elseif($List2->timeend == 2)
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
                                                                                                                @if ($List2->typeleave == 1)
                                                                                                                    ลากิจ
                                                                                                                @elseif($List2->typeleave == 2)
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
    <script type="text/javascript">
        function getData(id) {
            console.log(id)
            var url = "{{ route('absent.show', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data) {
                console.log(data.data)
                $('#defaultSize').modal('show');
                $('#leave-id').val(data.data.id);
                // console.log(data);
                // $('#leave-roleid').val(data.roleid).change();
                // $('#leave-emimg').attr("src", "{{ asset('imguse') }}" + "/" + data.emimg);
                $('#leave-emid').val(data.data.emid);
                $('#leave-pnid').val(data.data.pnid);
                $('#leave-fullname').val(data.data.full_name);
                $('#leave-ladepartment').val(data.data.ladepartment).change();
                $("#leave-typeleave").val(data.data.typeleave).change();
                $('#leave-email').val(data.data.email);
                $('#leave-timestart').val(data.data.timestart);
                $('#leave-laimg').attr("src", "{{ asset('imgbank') }}" + "/" + data.data.laimg);
                $('#leave-timeend').val(data.data.timeend);
                // var dd = moment.locale('th')
                // this.date = moment().add(543, 'year').format('LLLL')
                $("#leave-daystartla").val(data.data.daystartla);

                // console.log(moment(data.daystartla, 'YYYY-MM-DD HH:mm:ss').format('DD.MM.YYYY'));
                $("#leave-dayendla").val(data.data.dayendla);

                // $("#leave-dayendla").val(Carbon::parse(data->dayendla)->thaidate('j M y'))

                // $('#leave-dayendla').val(data.dayendla);
                $('#leave-reasonla').val(data.data.reasonla);

                $('#getDataleave').html(data.leave)
            })


        }

        // ('#close_modal').click(function(){
        //     $('#exampleModalCenter').modal('hide');
        // })
    </script>
    <script>
        function approve(params) {
            var id = $('#leave-id').val();
            $.ajax({
                type: "post",
                url: "{{ route('update.absent') }}",
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

        function disapproved(params) {
            var id = $('#leave-id').val();
            $.ajax({
                type: "post",
                url: "{{ route('update.absent') }}",
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
    <script type="text/javascript">
        function getData1(id) {
            // console.log(id)
            var url = "{{ route('absent.show', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data) {
                // console.log(data)
                $('#exampleModalScrollable').modal('show');
                $('#leave-id1').val(data.data.id);
                console.log(data.data.full_name);
                // $('#leave-roleid').val(data.roleid).change();
                // $('#leave-emimg').attr("src", "{{ asset('imguse') }}" + "/" + data.emimg);
                $('#leave-emid1').val(data.data.emid);
                $('#leave-pnid1').val(data.data.pnid);
                $('#leave-fullname1').val(data.data.full_name);
                $('#leave-ladepartment1').val(data.data.ladepartment).change();
                $("#leave-typeleave1").val(data.data.typeleave).change();
                $('#leave-email1').val(data.data.email);
                $('#leave-timestart1').val(data.data.timestart);
                // $('#leave-laimg1').attr("src", "{{ asset('imgbank') }}" + "/" + data.data.laimg);
                if (data.data.laimg != null) {
                    $('#leave-laimg1').attr("src", "{{ asset('imgbank') }}" + "/" + data.data.laimg);
                } else {
                    $('#leave-laimg1').attr("src",
                        "https://cdn-icons-png.flaticon.com/512/159/159716.png?fbclid=IwAR2BYe371Xr30zSDMureKs29nE0v3IO9Ee04IJJ4CVSlK4FIZkse2cCr1ZY"
                    );

                }
                $('#leave-timeend1').val(data.data.timeend);
                // $("#leave-daystartla1").val(moment(data.daystartla, 'YYYY-MM-DD HH:mm:ss').add(543, 'year').format(
                //     'DD-MM-YYYY'));

                // console.log(moment(data.daystartla, 'YYYY-MM-DD HH:mm:ss').format('DD.MM.YYYY'));
                $('#leave-daystartla1').val(data.data.daystartla);
                $('#leave-dayendla1').val(data.data.dayendla);
                $('#leave-reasonla1').val(data.data.reasonla);
                $('#getDataleave1').html(data.leave)
                // $('#result2').val(data.leave)
            })

        }

        // ('#close_modal').click(function(){
        //     $('#exampleModalCenter').modal('hide');
        // })
    </script>
    <script>
        function approve1(params) {
            var id = $('#leave-id1').val();
            $.ajax({
                type: "post",
                url: "{{ route('update.absent') }}",
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

        function disapproved1(params) {
            var id = $('#leave-id1').val();
            $.ajax({
                type: "post",
                url: "{{ route('update.absent') }}",
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
