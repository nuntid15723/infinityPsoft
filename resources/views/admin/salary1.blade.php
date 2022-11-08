@extends('layouts.main_admin')
{{-- css --}}
{{-- js --}}
@section('head')
    <title> Salary</title>
    <style>
        .error {
            color: red !important;
            font-style: italic;
            border-color: red !important;
        }
    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            {{-- start form --}}
            <div class="content">
                <div class="col-sm-12" style="margin: auto">
                    <div class="row mb-2" style="margin-top: 100px; margin-left: 10px;">
                        <div class="col-sm-6 ">
                            <div style="margin-left: 5px;">
                                <h1 class="m-0"
                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                    {{-- <img src="{{ asset('images/absent.png') }}" alt=""
                                        class="mr-1"> --}}
                                        <i class="bi bi-cash-stack mr-1"></i>
                                    จัดการเงินเดือน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <!-- Modal show-->
                            <div class="modal fade text-left" id="inlineFormCorrect" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg "
                                    role="document">
                                    <div class="modal-content" style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33" style="color: #164176;"><i
                                                    class="feather icon-edit mr-1"
                                                    style="font-size: 1.3rem;"></i>แก้ไขการจัดการเงินเดือน</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="#" id="salary">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>ชื่อพนักงาน: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>ช่องทางการรับชำระ: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>เงินเดือน: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>ประกันสังคม: </label>
                                                        <div class="form-group">
                                                            <input type="text" name="tax" placeholder=""
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>การปรับลดเงินเดือน: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>ยอดจ่ายสุทธิ: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label>หมายเหตุการปรับลดเงินเดือน: </label>
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="" id="" cols="30" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"style="justify-content: center;">
                                                <button type="submit" class="btn btn-outline-success round mr-1 mb-1"
                                                    type="submit"style="background-color: #164176;color: #fff;border: 1px solid #164176;"><b>ยืนยัน</b>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-outline-secondary round mr-1 mb-1"data-dismiss="modal"
                                                    aria-label="Close"><b>ยกเลิก</b>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--End Modal show-->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts">
                        <div class="col-md-12 col-12" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-">
                                                <label for="email-id-icon" style="font-size: 16px"><b>ช่วงวันที่</b></label>
                                            </div>
                                            <div class="col-lg-3 col-sm-5">
                                                <div class="form-group">
                                                    <fieldset
                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type='text' class="form-control datepicker1 " />
                                                        <div class="form-control-position">
                                                            <i class="ficon feather icon-calendar"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div class="col-lg-7 col-sm-7">
                                                <div class="d-flex justify-content-end mr-2">
                                                    <button type="button" class="btn btn-primary text-white px-5"
                                                        style="font-size: 18px; border-radius: 23px;background-color: #164175 !important;">
                                                        <a href="{{ url('/addEmployee1') }}"style="color: #fff;">
                                                            ตัดรอบเงินเดือน </a></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-">
                                                <label for="email-id-icon"
                                                    style="font-size: 16px"><b>ถึงวันที่</b></label>
                                            </div>
                                            <div class="col-lg-3 col-sm-5">
                                                <div class="form-group">
                                                    <fieldset
                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type='text' class="form-control datepicker2 " />
                                                        <div class="form-control-position">
                                                            <i class="ficon feather icon-calendar"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-sm-7">
                                                <div class="d-flex justify-content-end mr-2">
                                                    <div>
                                                        <div style="text-align: end;">
                                                            {{-- border-right: solid --}}
                                                            <h3
                                                                style="color: #5C5C5C;font-family: 'Kanit', sans-serif; font-weight:600;">
                                                                ยอดรวมเงินเดือน</h3>
                                                            <h1 style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                                                180,000</h1>
                                                        </div>
                                                    </div>
                                                    <div style="border-right: solid;margin: 10px"></div>
                                                    <div>
                                                        <h3
                                                            style="color: #5C5C5C;font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            ยอดจ่ายสุทธิ</h3>
                                                        <h1
                                                            style="color: #164176;font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            175,000</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top: -15px;">
                                            <div class="col-lg-2 col-sm-">
                                                <label for="email-id-icon"
                                                    style="font-size: 16px"><b>วันที่ชำระ</b></label>
                                            </div>
                                            <div class="col-lg-3 col-sm-5">
                                                <div class="form-group">
                                                    <fieldset
                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type='text' class="form-control datepicker2" />
                                                        <div class="form-control-position">
                                                            <i class="ficon feather icon-calendar"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content pt-1">
                                            <!-- Tab panes1 -->
                                            <div class="tab-pane active" id="home-fill" role="tabpanel"
                                                aria-labelledby="home-tab-fill">
                                                <div class="card-content">
                                                    <div class="table-responsive mt-1 dataTables_scroll"
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
                                                                                        style="white-space: nowrap;border: 0px solid !important;">
                                                                                        <thead class=" ">
                                                                                            <tr class="dataTables_scroll">

                                                                                                <th
                                                                                                    style=" border-radius: 15px 0px
                                                                                                    0px 0px;">
                                                                                                    ลำดับ

                                                                                                </th>
                                                                                                <th>
                                                                                                    ชื่อ -
                                                                                                    นามสกุล
                                                                                                </th>
                                                                                                <th>
                                                                                                    ช่องทางรับชำระ</th>
                                                                                                <th>
                                                                                                    เงินเดือน
                                                                                                </th>
                                                                                                <th>
                                                                                                    ปรับลด
                                                                                                </th>
                                                                                                <th>
                                                                                                    ยอดจ่ายสุทธิ
                                                                                                </th>
                                                                                                <th
                                                                                                    style=" border-radius: 0px 15px 0px 0px;">
                                                                                                    สถานะ
                                                                                                </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>Tiger Nixon</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        <img class="media-object mr-1"
                                                                                                            src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                                                            alt="Avatar"
                                                                                                            height="100"
                                                                                                            width="90">
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>Edinburgh</td>
                                                                                                <td>61</td>
                                                                                                <td>2011/04/25</td>
                                                                                                <td>$320,800</td>
                                                                                                <td>
                                                                                                    <div class="row"
                                                                                                        style="margin-top: 10px;">
                                                                                                        <div
                                                                                                            class="btn-group">
                                                                                                            <button
                                                                                                                class="btn btn-white"
                                                                                                                style="background-color: #FFD027 !important;height: 25px;width: 30px;padding: 0;border-radius: 5px;color:white"
                                                                                                                data-toggle="modal"
                                                                                                                data-target="#inlineFormCorrect">
                                                                                                                <i class="feather icon-edit"
                                                                                                                    style="margin-left: 3px; margin-right: 0px">&nbsp;</i>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <br>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn "
                                                                                                            style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;">
                                                                                                            <a
                                                                                                                href="{{ url('/slip') }}">
                                                                                                                <i class="fa fa-file-pdf-o"
                                                                                                                    style="color: #164176;"></i>
                                                                                                            </a> </button>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Garrett Winters</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        <img class="media-object mr-1"
                                                                                                            src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                                                            alt="Avatar"
                                                                                                            height="100"
                                                                                                            width="90">
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>Tokyo</td>
                                                                                                <td>63</td>
                                                                                                <td>2011/07/25</td>
                                                                                                <td>$170,750</td>
                                                                                                <td style=>
                                                                                                    <div class="row"
                                                                                                        style="margin-top: 10px;">
                                                                                                        <button
                                                                                                            class="btn btn-white"
                                                                                                            style="background-color: #FFD027 !important;height: 25px;width: 30px;padding: 0;border-radius: 5px;color:white"
                                                                                                            data-toggle="dropdown"
                                                                                                            aria-haspopup="true"
                                                                                                            aria-expanded="false">
                                                                                                            <i class="feather icon-edit"
                                                                                                                style="margin-left: 3px; margin-right: 0px">&nbsp;</i>
                                                                                                        </button>
                                                                                                        <br>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn "
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#exampleModalCenter"
                                                                                                            style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                                class="fa fa-file-pdf-o"
                                                                                                                style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Ashton Cox</td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        <img class="media-object mr-1"
                                                                                                            src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                                                            alt="Avatar"
                                                                                                            height="100"
                                                                                                            width="90">
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>San Francisco</td>
                                                                                                <td>66</td>
                                                                                                <td>2009/01/12</td>
                                                                                                <td>$86,000</td>
                                                                                                <td>
                                                                                                    <div class="row"
                                                                                                        style="margin-top: 10px;">
                                                                                                        <button
                                                                                                            class="btn btn-white"
                                                                                                            style="background-color: #FFD027 !important;height: 25px;width: 30px;padding: 0;border-radius: 5px;color:white"
                                                                                                            data-toggle="dropdown"
                                                                                                            aria-haspopup="true"
                                                                                                            aria-expanded="false">
                                                                                                            <i class="feather icon-edit"
                                                                                                                style="margin-left: 3px; margin-right: 0px">&nbsp;</i>
                                                                                                        </button>
                                                                                                        <br>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn "
                                                                                                            style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                                                class="fa fa-file-pdf-o"
                                                                                                                style="
                                                                                                            color: #164176;
                                                                                                        "></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                            <tr>
                                                                                                <th>Name</th>
                                                                                                <th>Position</th>
                                                                                                <th>Office</th>
                                                                                                <th>Age</th>
                                                                                                <th>Start date</th>
                                                                                                <th>Salary</th>
                                                                                                <th>Salary</th>
                                                                                            </tr>
                                                                                        </tfoot>
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
                                            <!--End Tab panes1 -->
                                        </div>
                                        {{-- <section id="nav-filled">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-content">
                                                        <div class="table-responsive mt-1 dataTables_scroll">
                                                            <table class="table table-hover-animation mb-0">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th style="background-color: #164176;">ลำดับ

                                                                        </th>
                                                                        <th style="background-color: #164176;">ชื่อ -
                                                                            นามสกุล
                                                                        </th>
                                                                        <th style="background-color: #164176;">
                                                                            ช่องทางรับชำระ</th>
                                                                        <th style="background-color: #164176;">เงินเดือน
                                                                        </th>
                                                                        <th style="background-color: #164176;">ปรับลด
                                                                        </th>
                                                                        <th style="background-color: #164176;">ยอดจ่ายสุทธิ
                                                                        </th>
                                                                        <th style="background-color: #164176;">สถานะ
                                                                        </th>
                                                                        <th style="background-color: #164176;"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>#879985</td>
                                                                        <td>
                                                                            <div>
                                                                                26/07/2018
                                                                        </td>
                                                                        <td class="p-1">
                                                                            1234567890123
                                                                        </td>
                                                                        <td>Anniston, Alabama</td>
                                                                        <td>0987654321</td>
                                                                        <td>@gmail.com</td>
                                                                        <td>
                                                                            <span>130 km</span>
                                                                            <div
                                                                                class="progress progress-bar-success mt-1 mb-0">
                                                                                <div class="progress-bar" role="progressbar"
                                                                                    style="width: 80%" aria-valuenow="80"
                                                                                    aria-valuemin="0" aria-valuemax="100">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="row" style="margin-top: 10px;">
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0;"><i
                                                                                    class="bi bi-pencil-fill"></i>
                                                                            </button>
                                                                            <br>
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                    class="bi bi-eye-fill"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>#156897</td>
                                                                        <td>
                                                                            <div>

                                                                                26/07/2018
                                                                        </td>
                                                                        <td class="p-1">
                                                                            1234567890123
                                                                        </td>
                                                                        <td>Cordova, Alaska</td>
                                                                        <td>0987654321</td>
                                                                        <td>@gmail.com</td>
                                                                        <td>
                                                                            <span>234 km</span>
                                                                            <div
                                                                                class="progress progress-bar-warning mt-1 mb-0">
                                                                                <div class="progress-bar"
                                                                                    role="progressbar" style="width: 60%"
                                                                                    aria-valuenow="60" aria-valuemin="0"
                                                                                    aria-valuemax="100">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="row" style="margin-top: 10px;">
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0;"><i
                                                                                    class="bi bi-pencil-fill"></i>
                                                                            </button>
                                                                            <br>
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                    class="bi bi-eye-fill"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>#568975</td>
                                                                        <td>
                                                                            <div>
                                                                                26/07/2018
                                                                        </td>
                                                                        <td class="p-1">
                                                                            1234567890123
                                                                        </td>
                                                                        <td>Florence, Alabama</td>
                                                                        <td>0987654321</td>
                                                                        <td>@gmail.com</td>
                                                                        <td>
                                                                            <span>168 km</span>
                                                                            <div
                                                                                class="progress progress-bar-success mt-1 mb-0">
                                                                                <div class="progress-bar"
                                                                                    role="progressbar" style="width: 70%"
                                                                                    aria-valuenow="70" aria-valuemin="0"
                                                                                    aria-valuemax="100">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="row" style="margin-top: 10px;">
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0;"><i
                                                                                    class="bi bi-pencil-fill"></i>
                                                                            </button>
                                                                            <br>
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                    class="bi bi-eye-fill"></i>
                                                                            </button>
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>#245689</td>
                                                                        <td>

                                                                            26/07/2018
                                                                        </td>

                                                                        <td class="p-1">
                                                                            1234567890123
                                                                        </td>
                                                                        <td>Clifton, Arizona</td>
                                                                        <td>0987654321</td>
                                                                        <td>@gmail.com</td>
                                                                        <td>
                                                                            <span>125 km</span>
                                                                            <div
                                                                                class="progress progress-bar-danger mt-1 mb-0">
                                                                                <div class="progress-bar"
                                                                                    role="progressbar" style="width: 95%"
                                                                                    aria-valuenow="95" aria-valuemin="0"
                                                                                    aria-valuemax="100">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="row" style="margin-top: 10px;">
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0;"><i
                                                                                    class="bi bi-pencil-fill"></i>
                                                                            </button>
                                                                            <br>
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                    class="bi bi-eye-fill"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </section> --}}
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
    <script>
        function preview() {
            cusImg.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('cusImgFile').value = null;
            cusImg.src = "";
        }
    </script>

    <script>
        $('.datepicker1').pickadate({
            // selectMonths: true, // Creates a dropdown to control month
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            // min: new Date()
        });

        var from_$input = $('.datepicker1').pickadate(),
            from_picker = from_$input.pickadate('picker')

        var to_$input = $('.datepicker2').pickadate(),
            to_picker = to_$input.pickadate('picker')


        // Check if there’s a “from” or “to” date to start with.
        if (from_picker.get('value'))

        {
            console.log("asdasdsad")
            var today = new Date($('.datepicker1').val());
            today.setDate(today.getDate() + 1)
            to_picker.set('min', today)
        }
        if (to_picker.get('value')) {
            var today = new Date($('.datepicker2').val());
            today.setDate(today.getDate() - 1)
            from_picker.set('max', today)


        }
        // When something is selected, update the “from” and “to” limits.
        from_picker.on('set', function(event) {

            if (event.select) {
                var today = new Date($('.datepicker1').val());
                today.setDate(today.getDate() + 1)
                to_picker.set('min', today)
            } else if ('clear' in event) {

                to_picker.set('min', false)
            }

        })

        to_picker.on('set', function(event) {
            if (event.select) {
                var today = new Date($('.datepicker2').val());
                today.setDate(today.getDate() - 1)
                from_picker.set('max', today)
            } else if ('clear' in event) {

                from_picker.set('max', false)
            }
        })
    </script>
    <script>
        jQuery.validator.addMethod("noSpace", function(value, element) {
            return value == '' || value.trim().length != 0;
        }, "No space please and don't leave it empty");
        jQuery.validator.addMethod("customEmail", function(value, element) {
            return this.optional(element) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(
                value);
        }, "Please enter valid email address!");
        $.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^\w+$/i.test(value);
        }, "Letters, numbers, and underscores only please");
        var $registrationForm = $('#salary');
        if ($registrationForm.length) {
            $registrationForm.validate({
                rules: {
                    tax: {
                        required: true
                    },
                },
                messages: {
                    tax: {
                        required: 'ประกันสังคม!'
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.is(":radio")) {
                        error.appendTo(element.parents('.gender'));
                    } else if (element.is(":checkbox")) {
                        error.appendTo(element.parents('.hobbies'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                // submitHandler: function(form) {
                //     $('.loading_submit').css("display", "block");
                //     $('#sumbit_create').prop('disabled', true)
                //     form.submit()
                // }
            });
        }
    </script>
@endsection
