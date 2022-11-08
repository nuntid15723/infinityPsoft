@extends('layouts.main_admin')
@section('style')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/extensions/shepherd-theme-default.css') }}"> --}}

    <!-- BEGIN: Custom CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <a href="https://www.chartjs.org/docs/latest/getting-started/" target="_blank"></a> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}"> --}}
    <!-- END: Custom CSS-->
@endsection
@section('head')
    <title>ประวัติพนักงาน</title>
    <style>
        div.dataTables_wrapper div.dataTables_filter input {
            width: 250px !important;
            font-size: 1.0rem;
        }
    </style>
@endsection
@section('content')
    @php
        use App\Models\User;
    @endphp
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="container-fluid mt-2">
                    <div class="row mb-2">
                        <div class="col-sm-6 ">
                            <div style="margin-left: 5px;">
                                <h1 class="m-0"
                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555; ">
                                    <img src="{{ asset('images/member.png') }}" alt="" class="mr-1"
                                        style="height: 61px;
                                    width: 58px;margin-top: -12px;">
                                    รายชื่อพนักงานที่ลาออก
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <div style="text-align: end;">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary text-white px-5"
                                    style="font-size: 18px; border-radius: 23px; padding-left: 2rem !important;
                                    padding-right: 2rem !important;background-color: #2E8B57 !important;">
                                    <a href="{{ route('users.export') }}" style="color: #ffffff"><i
                                            class="bi bi-file-earmark-excel mr-1 "></i>Export</a>

                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-sm-6">
                            <div style="text-align: end;">
                                <button type="button" class="btn btn-primary text-white px-5"
                                    style="font-size: 18px; border-radius: 15px;background-color: #164175 !important;"><i
                                        class="fa fa-plus mr-1" style="font-size: 1.3rem;"></i>
                                    <a href="{{ url('/addEmployee1') }}"style="color: #fff;">
                                        เพิ่มพนักงาน </a>
                                    </button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row --> --}}
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                style="font-family: 'Kanit', sans-serif; font-weight:600;">
                <div class="modal-dialog modal-centered modal-dialog-scrollable  " role="document"
                    style="max-width: 800px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle"
                                style="font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size:1.3rem;">
                                รายละเอียดพนักงาน</h5>
                            <button type="button" id="close_modal" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if (\Session::has('error'))
                                <div id="error" class="text-danger">
                                    {!! \Session::get('error') !!}
                                </div>
                            @endif
                            {{-- action="{{ route('add') }}" method="POST" --}}
                            <form class="form form-vertical" id="submitform">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12">
                                                    <h5
                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size:1.2rem;">
                                                        ประเภทผู้ใช้งาน</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-9 col-sm-9">
                                            <div class="row">
                                                <div class="form-group col-lg-6 col-sm-6">
                                                    <label for="emtype"
                                                        style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">เลือกประเภทผู้ใช้งาน</label>
                                                    <select class="form-control" disabled name="emtype" id="user-emtype">
                                                        <option value="0">พนักงาน</option>
                                                        <option value="1">แอดมิน</option>
                                                        <option value="2">ซูปเปอร์แอดมิน</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-6 col-sm-6">
                                                    <label for="roleId"
                                                        style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">สถานะ</label>
                                                    <select class="form-control" disabled name="roleId" id="user-roleid">
                                                        <option value="1">ผ่านโปร</option>
                                                        <option value="0">ไม่ผ่านโปร</option>
                                                        <option value="2">ลาออก</option>
                                                        <option value="3">ทดลองงาน</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-4">
                                            <h5
                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size:1.2rem;">
                                                ข้อมูลส่วนตัว</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12">
                                                    <img id="user-emimg"
                                                        src="https://i.pinimg.com/564x/a5/e8/1f/a5e81f19cf2c587876fd1bb08ae0249f.jpg"
                                                        class="img-fluid"
                                                        style="max-width: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                    <label for="Image" class="form-label"></label>
                                                    {{-- <input class="form-control" type="file" id="user-emimg" disabled
                                                        name="emImg" accept="image/*" onchange="preview()"
                                                        style="width: 150px;margin-top: 5px;">
                                                    <h6
                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #970a0a;">
                                                        กรุณาเลือกรูปโปรไฟล์</h6> --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-9 col-sm-9">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="emId"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">เลขประจำตัวพนักงาน</label>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                            <input type="text" placeholder="เลขประจำตัวพนักงาน"
                                                                class="form-control" id="user-emid" disabled>
                                                            <div class="form-control-position">
                                                                <i class="bi bi-person-badge"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="PnID-id-icon"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">เลขประจำตัวประชาชน</label>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                            <input type="text" placeholder="เลขประจำตัวประชาชน"
                                                                class="form-control" name="PnID" id="user-pnid"
                                                                disabled
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"maxlength="13">
                                                            <div class="form-control-position">
                                                                <i class="bi bi-person-badge-fill"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name-id-icon"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">ชื่อ
                                                            -
                                                            นามสกุล</label>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                            <input type="text" name="fullname" class="form-control"
                                                                placeholder="ชื่อ - นามสกุล" disabled id="user-fullname">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="-id-icon"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">วันเกิด</label>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                            <input type='text' placeholder="เลือกวันเกิด"
                                                                class="form-control" disabled id="user-birthday"
                                                                name="birthday" />
                                                            <div class="form-control-position">
                                                                <i class="ficon feather icon-calendar"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="gender">
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="d-inline-block mr-2">
                                                                <h5 style="color: #5C5C5C;">เพศ
                                                                </h5>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" disabled name="gender"
                                                                            class="form-contorl" id="gender1">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        <span class=""
                                                                            style="font-family: 'Kanit', sans-serif;font-weight:500;color:#525252">ชาย</span>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" disabled name="gender"
                                                                            class="form-contorl" id="gender2">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        <span class=""
                                                                            style="font-family: 'Kanit', sans-serif;font-weight:500;color:#525252">หญิง</span>
                                                                    </div>
                                                                </fieldset>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-4">
                                            <h5
                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size:1.2rem;">
                                                ข้อมูลการเงิน</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="row">
                                                <div class="col-12">

                                                    <img id="user-bankimg"
                                                        src="https://i.pinimg.com/564x/ba/67/aa/ba67aabe7229f0305424138d79e00335.jpg"
                                                        class="img-fluid"
                                                        style="max-width: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                    <label for="Image" class="form-label"></label>
                                                    {{-- <input class="form-control" type="file" id="bankImg"
                                                        name="bankImg" accept="image/*" disabled onchange="preview1()"
                                                        style="width: 150px;margin-top: 5px;">
                                                    <h6
                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #970a0a;">
                                                        กรุณาเลือกรูปสมุดบัญชี</h6> --}}

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-9 col-sm-9">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="bank-name"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">ธนาคาร</label>
                                                        <select class="form-control" id="user-bankname" name="bankname"
                                                            disabled>
                                                            <option selected="" disabled="">
                                                                เลือกธนาคาร</option>
                                                            <option value="1">ธนาคารกรุงไทย</option>
                                                            <option value="2">ธนาคารกรุงเทพ</option>
                                                            <option value="3">ธนาคารกรุงศรีอยุธยา</option>
                                                            <option value="4">ธนาคารกสิกรไทย</option>
                                                            <option value="5">ธนาคารไทยพาณิชย์</option>
                                                            <option value="6">ธนาคารออมสิน</option>
                                                            <option value="7">ธนาคารทหารไทยธนชาต</option>
                                                            <option value="8">ธนาคารซีไอเอ็มบี</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="salary"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">ฐานเงินเดือน</label>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type="text"name="salary" id="user-salary"
                                                                placeholder="ฐานเงินเดือน" disabled class="form-control"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            <div class="form-control-position">
                                                                <i class="bi bi-cash-coin"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="banknumber"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">เลขบัญชี</label>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                            <input type="text" placeholder="เลขบัญชี"
                                                                class="form-control" disabled name="banknumber"
                                                                id="user-banknumber"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"maxlength="10">
                                                            <div class="form-control-position">
                                                                <i class="bi bi-card-heading"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="tax"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">ประกันสังคม</label>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type="text" placeholder="ประกันสังคม"
                                                                class="form-control" disabled id="user-taxname"
                                                                name="tax"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            <div class="form-control-position">
                                                                <i class="bi bi-credit-card-2-front-fill"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="department"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">เเผนก</label>
                                                        <select class="form-control" disabled name="department"
                                                            id="user-department">
                                                            @foreach ($departmentList as $val)
                                                                <option value="{{ $val->id }}">
                                                                    {{ $val->dpname }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email-id-icon"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">วันที่เริ่มงาน</label>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                            <input type='text' placeholder="เลือกวันที่เรื่มงาน"
                                                                disabled class="form-control " id="user-startwork"
                                                                name="startwork" />
                                                            <div class="form-control-position">
                                                                <i class="ficon feather icon-calendar"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5
                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size:1.2rem;">
                                                        ข้อมูลการติดต่อ</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color: #525252;">อีเมล</label>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                            <input type="email" id="user-email" class="form-control"
                                                                disabled name="email" placeholder="อีเมล">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-mail"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Phonenumber"
                                                            style="font-family: 'Kanit', sans-serif;font-weight:400;font-size: 1.0rem !important;color:#525252;">เบอร์โทรศัพท์</label>
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                            <input type="text" id="user-phonenumber" disabled
                                                                placeholder="เบอร์โทรศัพท์" class="form-control"
                                                                name="Phonenumber"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                maxlength="10">
                                                            <div class="form-control-position">
                                                                <i class="bi bi-telephone-fill"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="top: 0px;margin-top: 30px;">
                                        <div class="col-12" style="text-align: end;">
                                            <button type="button" class="btn btn-outline-secondary round mr-1 mb-1"
                                                style="background-color: #164176;color: white;"data-dismiss="modal"
                                                aria-label="Close">ปิด</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <section id="nav-filled">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive mt-1 dataTables_scroll">
                                    <table class="table zero-configuration "
                                        style="white-space: nowrap;font-family: 'Kanit', sans-serif; font-weight:600;border: 0px  solid  !important">
                                        <thead class="thead">
                                            <tr class="dataTables_scroll">
                                                <th style=" border-radius: 15px 0px 0px 0px;font-size: 1rem;">
                                                    ลำดับ</th>
                                                <th style="font-size: 1rem;">
                                                    รหัสพนักงาน</th>
                                                <th style=" font-size: 1rem;">
                                                    ชื่อ-นามสกุล</th>
                                                <th style="font-size: 1rem;">
                                                    เบอร์โทรศัพท์
                                                </th>
                                                <th style="font-size: 1rem;">
                                                    อีเมล</th>
                                                <th style="font-size: 1rem;">
                                                    เงินเดือน
                                                </th>
                                                <th style=" border-radius: 0px 14px 0px 0px;font-size: 1rem;">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($users_not as $cus)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $cus->emid }}</td>
                                                    <td>
                                                        {{ $cus->fullname }}
                                                    </td>
                                                    <td>{{ $cus->phonenumber }}</td>
                                                    <td>{{ Str::limit($cus->email, '20', '..') }}</td>
                                                    <td>{{ number_format($cus->salary) }}
                                                    </td>
                                                    <td style="padding: 0;">
                                                        <div class="d-flex" style="justify-content: center;">
                                                            {{-- <div>{{ $cus->salary }} </div> --}}
                                                            <div class="btn-group dropdown">
                                                                <div class="btn-group">
                                                                    <button class="btn btn-white"
                                                                        style="background-color: #FFD027 !important;height: 25px;width: 30px;padding: 0;border-radius: 5px;color:white"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <i class="feather icon-edit"
                                                                            style="margin-left: 3px; margin-right: 0px">&nbsp;</i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <button class="dropdown-item" type="button"
                                                                            onclick="getData({{ $cus->id }})"
                                                                            data-url="{{ route('users.show', $cus->fullname) }}"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModalCenter"
                                                                            style="width: 100%;font-size:1.1rem;">
                                                                            รายละเอียด
                                                                        </button>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('edit.employee', $cus->id) }}"
                                                                            style="font-size:1.1rem;">แก้ไข</a>
                                                                        {{-- <a class="dropdown-item"
                                                                            href="#"><b>ลบ</b></a> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                {{-- <th>{{ $sum_salary }} </th> --}}
                                                <th></th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function getData(id) {
            var url = "{{ route('users.show', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data) {
                console.log(data)
                $('#exampleModalCenter').modal('show');
                $('#user-id').val(data.id);
                $("#user-emtype").val(data.emtype).change();
                // console.log(data.department);
                $('#user-roleid').val(data.roleid).change();
                // $('#user-emimg').val(data.emimg);
                $('#user-emimg').attr("src", "{{ asset('imguse') }}" + "/" + data.emimg);
                // $('#edit_pic').attr("src", "{{ asset('uploads/images') }}" + "/" + data.categoryList.image)
                $('#user-emid').val(data.emid);
                $('#user-pnid').val(data.pnid);
                $('#user-fullname').val(data.fullname);
                $('#user-birthday').val(data.birthday);
                // $('#user-gender').val(data.gender);
                if (data.gender == 1) {
                    $('#gender2').prop('checked', true);
                } else {
                    $('#gender1').prop('checked', true);
                }
                // console.log(data.gender);
                $('#user-bankimg').attr("src", "{{ asset('imgbank') }}" + "/" + data.bankimg);
                $('#user-bankimg').val(data.bankimg);
                $('#user-bankname').val(data.bankname).change();
                $('#user-banknumber').val(data.banknumber);
                $('#user-salary').val(data.salary);
                $('#user-taxname').val(data.taxname);
                $('#user-department').val(data.department).change();
                $('#user-startwork').val(data.startwork);
                $('#user-email').val(data.email);
                $('#user-phonenumber').val(data.phonenumber);
            })
        }

        // ('#close_modal').click(function(){
        //     $('#exampleModalCenter').modal('hide');
        // })
    </script>
@endsection
