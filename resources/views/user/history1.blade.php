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
            font-size: 17px;
        }
    </style>
@endsection
@section('head')
    <title> Dashboard</title>
@endsection
@section('content')
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
                                    style="font-family: 'Kanit', sans-serif; font-weight:800; color: #164176; ">
                                    สรุปผลการลา
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
                                    <div class="col-12">
                                        <div class="card">

                                            <div class="modal-danger mr-1 mb-1 d-inline-block">
                                                <!-- Modal -->
                                                <div class="modal fade text-left" id="danger" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger white"
                                                                style="
                                                            background-color: #164176 !important;
                                                        ">
                                                                <h5 class="modal-title" id="myModalLabel120"
                                                                    style="margin-top: 10px;font-family: 'Kanit', sans-serif; font-weight:600; margin-left: 33px;">
                                                                    ข้อมูลการลา
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="margin-left: 33px;">
                                                                <p
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #878181;">
                                                                    ชื่อ - นามสกุล</p>
                                                                <p
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #878181;">
                                                                    เเผนก</p>
                                                                <p
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #878181;">
                                                                    ประเภทการลา</p>
                                                                <p
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #878181;">
                                                                    วันที่เริ่มลา</p>
                                                                <p
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #878181;">
                                                                    วันที่สิ้นสุด</p>
                                                                <p
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #878181;">
                                                                    ระยะเวลาการลา</p>
                                                                <p
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #878181;">
                                                                    หมายเหตุ</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light"
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600;">ยกเลิกการลา</button>
                                                                <button type="button"
                                                                    class="btn btn btn-outline-dark round mr-1 mb-1 waves-effect waves-light"
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600;"data-dismiss="modal"
                                                                    aria-label="Close">ปิด</button>
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
                                <div class="card-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist"
                                        style="font-family: 'Kanit', sans-serif; font-weight:900;">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab-fill" data-toggle="tab"
                                                href="#home-fill" role="tab" aria-controls="home-fill"
                                                aria-selected="true" style="font-size: 20px;">
                                                แสดงทั้งหมด
                                            </a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="profile-tab-fill" data-toggle="tab" href="#profile-fill"
                                                role="tab" aria-controls="profile-fill" aria-selected="false"
                                                style="font-size: 20px;">
                                                รออนุมัติ
                                            </a>
                                        </li> --}}
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
                                    <div class="tab-content " style="font-family: 'Kanit', sans-serif; font-weight:600;">
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
                                                                                    style="white-space: nowrap;">
                                                                                    <thead class="thead-dark ">
                                                                                        <tr class="dataTables_scroll">
                                                                                            <th
                                                                                                style="background-color: #164176;border-radius: 15px 0px 0px 0px;">
                                                                                                รหัสพนักงาน</th>
                                                                                            <th
                                                                                                style="background-color: #164176;">
                                                                                                ชื่อ - นามสกุล
                                                                                            </th>
                                                                                            <th
                                                                                                style="background-color: #164176;">
                                                                                                แผนก
                                                                                            </th>
                                                                                            <th
                                                                                                style="background-color: #164176;">
                                                                                                เบอรโทรศัพท์
                                                                                            </th>
                                                                                            <th
                                                                                                style="background-color: #164176;">
                                                                                                วันที่เริ่มลา</th>
                                                                                            <th
                                                                                                style="background-color: #164176;">
                                                                                                วันที่สิ้นสุด</th>
                                                                                            <th
                                                                                                style="background-color: #164176;">
                                                                                                ระยะเวลาการลา</th>
                                                                                            <th
                                                                                                style="background-color: #164176;">
                                                                                                ประเภทการลา</th>
                                                                                            <th
                                                                                                style="background-color: #164176;">
                                                                                                สถานะการลา</th>
                                                                                            <th
                                                                                                style="background-color: #164176;border-radius: 0px 14px 0px 0px;">
                                                                                                อื่นๆ</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>IP001</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    สวรรยา กุญชรกิตติคุณ
                                                                                            </td>
                                                                                            <td class="p-1">
                                                                                                นักพัฒนาระบบ
                                                                                            </td>
                                                                                            <td>0987654321</td>
                                                                                            <td>12/07/65</td>
                                                                                            <td>12/07/65</td>
                                                                                            <td>
                                                                                                <span>ครึ่งเช้า (2
                                                                                                    ชั่วโมง)</span>

                                                                                            </td>
                                                                                            <td>
                                                                                                ลากิจ
                                                                                            </td>
                                                                                            <td> <i
                                                                                                    class="fa fa-circle font-small-3 text-success mr-50"></i>อนุมัติ
                                                                                            </td>

                                                                                            <td class="row"
                                                                                                style="margin-top: 10px;">

                                                                                                <br>
                                                                                                <button type="button"
                                                                                                    class="btn "
                                                                                                    data-toggle="modal"
                                                                                                    data-target="#danger"
                                                                                                    style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                        class="bi bi-eye-fill"
                                                                                                        style="
                                                                                                        color: #164176;
                                                                                                    "></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>IP001</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    สวรรยา กุญชรกิตติคุณ
                                                                                            </td>
                                                                                            <td class="p-1">
                                                                                                นักพัฒนาระบบ
                                                                                            </td>
                                                                                            <td>0987654321</td>
                                                                                            <td>12/07/65</td>
                                                                                            <td>12/07/65</td>
                                                                                            <td>
                                                                                                <span>ครึ่งบ่าย (1
                                                                                                    ชั่วโมง)</span>

                                                                                            </td>
                                                                                            <td>
                                                                                                ลากิจ
                                                                                            </td>
                                                                                            <td> <i
                                                                                                    class="fa fa-circle font-small-3 text-success mr-50"></i>อนุมัติ
                                                                                            </td>
                                                                                            <td class="row"
                                                                                                style="margin-top: 10px;">

                                                                                                <br>
                                                                                                <button type="button"
                                                                                                    class="btn "
                                                                                                    data-toggle="modal"
                                                                                                    data-target="#exampleModalCenter"
                                                                                                    style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                        class="bi bi-eye-fill"
                                                                                                        style="
                                                                                                        color: #164176;
                                                                                                    "></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>IP001</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    สวรรยา กุญชรกิตติคุณ
                                                                                            </td>
                                                                                            <td class="p-1">
                                                                                                นักพัฒนาระบบ
                                                                                            </td>
                                                                                            <td>0987654321</td>
                                                                                            <td>12/07/65</td>
                                                                                            <td>12/07/65</td>
                                                                                            <td>
                                                                                                <span>ครึ่งเช้า (1
                                                                                                    ชั่วโมง)</span>

                                                                                            </td>
                                                                                            <td>
                                                                                                ลากิจ
                                                                                            </td>
                                                                                            <td> <i
                                                                                                    class="fa fa-circle font-small-3 text-danger mr-50"></i>ไม่อนุมัติ
                                                                                            </td>
                                                                                            <td class="row"
                                                                                                style="margin-top: 10px;">

                                                                                                <br>
                                                                                                <button type="button"
                                                                                                    class="btn "
                                                                                                    data-toggle="modal"
                                                                                                    data-target="#exampleModalCenter"
                                                                                                    style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                        class="bi bi-eye-fill"
                                                                                                        style="
                                                                                                        color: #164176;
                                                                                                    "></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>IP001</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    สวรรยา กุญชรกิตติคุณ
                                                                                            </td>
                                                                                            <td class="p-1">
                                                                                                นักพัฒนาระบบ
                                                                                            </td>
                                                                                            <td>0987654321</td>
                                                                                            <td>12/07/65</td>
                                                                                            <td>12/07/65</td>
                                                                                            <td>
                                                                                                <span>ครึ่งบ่าย (3
                                                                                                    ชั่วโมง)</span>

                                                                                            </td>
                                                                                            <td>
                                                                                                ลากิจ
                                                                                            </td>
                                                                                            <td> <i
                                                                                                    class="fa fa-circle font-small-3 text-danger mr-50"></i>ไม่อนุมัติ
                                                                                            </td>
                                                                                            <td class="row"
                                                                                                style="margin-top: 10px;">
                                                                                                <br>
                                                                                                <button type="button"
                                                                                                    class="btn "
                                                                                                    data-toggle="modal"
                                                                                                    data-target="#exampleModalCenter"
                                                                                                    style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                        class="bi bi-eye-fill"
                                                                                                        style="
                                                                                                        color: #164176;
                                                                                                    "></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>
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


                                        {{-- รออนุมัติ --}}
                                        {{-- <div class="tab-pane" id="profile-fill" role="tabpanel"
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
                                                                                    <table class="table zero-configuration"
                                                                                        style="white-space: nowrap;">
                                                                                        <thead class="thead-dark ">
                                                                                            <tr class="dataTables_scroll">
                                                                                                <th
                                                                                                    style="background-color: #164176;border-radius: 15px 0px 0px 0px;">
                                                                                                    รหัสพนักงาน</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    ชื่อ - นามสกุล
                                                                                                </th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    แผนก
                                                                                                </th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    เบอรโทรศัพท์
                                                                                                </th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    วันที่เริ่มลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    วันที่สิ้นสุด</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    ระยะเวลาการลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    ประเภทการลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    สถานะการลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;border-radius: 0px 14px 0px 0px;">
                                                                                                    อื่นๆ</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งเช้า (2
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-warning mr-50"></i>รออนุมัติ
                                                                                                </td>

                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>

                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งบ่าย (1
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-warning mr-50"></i>รออนุมัติ
                                                                                                </td>
                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งเช้า (1
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-warning mr-50"></i>รออนุมัติ
                                                                                                </td>
                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งบ่าย (3
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-warning mr-50"></i>รออนุมัติ
                                                                                                </td>
                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>
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
                                        </div> --}}

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
                                                                                        class="table zero-configuration "
                                                                                        style="white-space: nowrap;">
                                                                                        <thead class="thead-dark ">
                                                                                            <tr class="dataTables_scroll">

                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    รหัสพนักงาน</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    ชื่อ - นามสกุล
                                                                                                </th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    แผนก
                                                                                                </th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    เบอรโทรศัพท์
                                                                                                </th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    วันที่เริ่มลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    วันที่สิ้นสุด</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    ระยะเวลาการลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    ประเภทการลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    สถานะการลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    อื่นๆ</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งเช้า (2
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-success mr-50"></i>อนุมัติ
                                                                                                </td>

                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งบ่าย (1
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-success mr-50"></i>อนุมัติ
                                                                                                </td>
                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งเช้า (1
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-success mr-50"></i>อนุมัติ
                                                                                                </td>
                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งบ่าย (3
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-success mr-50"></i>อนุมัติ
                                                                                                </td>
                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>
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
                                                                                        style="white-space: nowrap;">
                                                                                        <thead class="thead-dark ">
                                                                                            <tr class="dataTables_scroll">
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    รหัสพนักงาน</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    ชื่อ - นามสกุล
                                                                                                </th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    แผนก
                                                                                                </th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    เบอรโทรศัพท์
                                                                                                </th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    วันที่เริ่มลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    วันที่สิ้นสุด</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    ระยะเวลาการลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    ประเภทการลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    สถานะการลา</th>
                                                                                                <th
                                                                                                    style="background-color: #164176;">
                                                                                                    อื่นๆ</th>

                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งเช้า (2
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-danger mr-50"></i>ไม่อนุมัติ
                                                                                                </td>

                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งบ่าย (1
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-danger mr-50"></i>ไม่อนุมัติ
                                                                                                </td>
                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งเช้า (1
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-danger mr-50"></i>ไม่อนุมัติ
                                                                                                </td>
                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td>IP001</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        สวรรยา กุญชรกิตติคุณ
                                                                                                </td>
                                                                                                <td class="p-1">
                                                                                                    นักพัฒนาระบบ
                                                                                                </td>
                                                                                                <td>0987654321</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>12/07/65</td>
                                                                                                <td>
                                                                                                    <span>ครึ่งบ่าย (3
                                                                                                        ชั่วโมง)</span>

                                                                                                </td>
                                                                                                <td>
                                                                                                    ลากิจ
                                                                                                </td>
                                                                                                <td> <i
                                                                                                        class="fa fa-circle font-small-3 text-danger mr-50"></i>ไม่อนุมัติ
                                                                                                </td>
                                                                                                <td class="row"
                                                                                                    style="margin-top: 10px;">
                                                                                                    <br>
                                                                                                    <button type="button"
                                                                                                        class="btn "
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#exampleModalCenter"
                                                                                                        style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                            class="bi bi-eye-fill"
                                                                                                            style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>
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

    {{-- <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS--> --}}
@endsection
