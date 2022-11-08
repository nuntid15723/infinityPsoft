@extends('layouts.main_admin')

{{-- js --}}
@section('head')
    <title>เพิ่มพนักงาน</title>
    <style>
        h5,
        .h5 {
            font-size: 20px !important;
        }

        .error {
            color: red !important;
            font-style: italic;
            border-color: red !important;
        }

        .container1 {
            padding: 15px;
        }

        .error {
            color: #F00;
        }

        .error.true {
            color: #6bc900;
        }
    </style>
    {{-- css --}}
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                {{-- start form --}}
                <div class="container-fluid mt-2">
                    <div class="row mb-2">
                        <div class="col-sm-6 ">
                            <div>
                                <h1 class="m-0"
                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555;">
                                    {{-- <i class="fa fa-plus"></i> --}}
                                    <img src="{{ asset('images/boss.png') }}" alt="" class="mr-2"
                                        style="height: 56px;
                                width: 58px;margin-top: -22px;">
                                    เพิ่มพนักงาน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts">
                        <div style="font-family: 'Kanit', sans-serif; font-weight:400;">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4 class="card-title">Vertical Form with Icons</h4>
                                </div> --}}
                                <div class="card-content">
                                    @if (session('status'))
                                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                                    @endif
                                    <div class="card-body">
                                        <form action="{{ route('storeEmployee') }}" method="POST"
                                            enctype="multipart/form-data" class="form form-vertical" id="submitform"
                                            name="submitform" novalidate>
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-3">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12">
                                                                <h5
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #164176;">
                                                                    ประเภทผู้ใช้งาน</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 col-sm-9">
                                                        <div class="row">
                                                            <div class="form-group col-lg-6 col-sm-6">
                                                                <label for="emType"
                                                                    style="font-size: 1.0rem !important;color: #525252;">ประเภทผู้ใช้งาน<span
                                                                        style="color: red">*</span></label>
                                                                <select class="form-control" name="emType">
                                                                    <option selected="" disabled="">
                                                                        เลือกประเภทผู้ใช้งาน</option>
                                                                    <option value="0">พนักงาน</option>
                                                                    <option value="1">แอดมิน</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-sm-6">
                                                                <label for="inputSex"
                                                                    style="font-size: 1.0rem !important;color: #525252;">สถานะ<span
                                                                        style="color: red">*</span></label>
                                                                <select class="form-control" name="roleId">
                                                                    <option selected="" disabled="">
                                                                        เลือกสถานะผู้ใช้งาน</option>
                                                                    <option value="3">ทดลองงาน</option>
                                                                    <option value="1">ผ่านโปร</option>
                                                                    <option value="0">ไม่ผ่านโปร</option>
                                                                    <option hidden value="2">ลาออก</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-4">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #164176;">
                                                            ข้อมูลส่วนตัว</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-3">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12">
                                                                <img id="cusImg"
                                                                    src="https://i.pinimg.com/564x/a5/e8/1f/a5e81f19cf2c587876fd1bb08ae0249f.jpg"
                                                                    class="img-fluid"
                                                                    style="max-width: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                                <label for="Image" class="form-label"></label>
                                                                <input class="form-control" type="file" id="emImg"
                                                                    name="emImg" accept="image/*"
                                                                    onchange="readURL(this);"
                                                                    style="width: 150px;margin-top: 5px;">
                                                                {{-- <h6
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
                                                                        style="font-size: 1.0rem !important;color: #525252;">เลขประจำตัวพนักงาน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" id="emId"
                                                                            placeholder="เลขประจำตัวพนักงาน"
                                                                            class="form-control" name="emId"
                                                                            value="{{ $emid }}" readonly>
                                                                        <div class="form-control-position">
                                                                            <i class="bi bi-person-badge"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="PnID-id-icon"
                                                                        style="font-size: 1.0rem !important;color: #525252;">เลขประจำตัวประชาชน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        {{-- <input type="text"
                                                                            placeholder="เลขประจำตัวประชาชน"
                                                                            class="form-control"
                                                                            name="PnID"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                            maxlength="13"> --}}
                                                                        <input type="text" id="idcard"
                                                                            class="form-control" name="PnID"
                                                                            maxlength="13"
                                                                            placeholder="เลขประจำตัวประชาชน">
                                                                        <span class="error"></span>
                                                                        <div class="form-control-position">
                                                                            <i class="bi bi-person-badge-fill"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name-id-icon"
                                                                        style="font-size: 1.0rem !important;color: #525252;">ชื่อ
                                                                        -
                                                                        นามสกุล<span style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" name="fullname"
                                                                            class="form-control"
                                                                            placeholder="ชื่อ - นามสกุล">
                                                                        <div class="form-control-position">
                                                                            <i class="feather icon-user"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="-id-icon"
                                                                        style="font-size: 1.0rem !important;color: #525252;">วันเกิด<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type='text' placeholder="เลือกวันเกิด"
                                                                            class="form-control " id="datepicker"
                                                                            name="birthday" autocomplete="off"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
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
                                                                            <h5
                                                                                style="font-family: 'Kanit', sans-serif; font-weight:400;color:#525252;font-size:1.1rem !important;">
                                                                                เพศ<span style="color: red">*</span>
                                                                            </h5>
                                                                        </li>
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="vs-radio-con">
                                                                                    <input type="radio" value="0"
                                                                                        name="gender"
                                                                                        class="form-contorl">
                                                                                    <span class="vs-radio">
                                                                                        <span
                                                                                            class="vs-radio--border"></span>
                                                                                        <span
                                                                                            class="vs-radio--circle"></span>
                                                                                    </span>
                                                                                    <span class="">ชาย</span>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="vs-radio-con">
                                                                                    <input type="radio" value="1"
                                                                                        name="gender"
                                                                                        class="form-contorl">
                                                                                    <span class="vs-radio">
                                                                                        <span
                                                                                            class="vs-radio--border"></span>
                                                                                        <span
                                                                                            class="vs-radio--circle"></span>
                                                                                    </span>
                                                                                    <span class="">หญิง</span>
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
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #164176;">
                                                            ข้อมูลการเงิน</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12">
                                                                <img id="bankImg"
                                                                    src="https://i.pinimg.com/564x/ba/67/aa/ba67aabe7229f0305424138d79e00335.jpg"
                                                                    class="img-fluid"
                                                                    style="max-width: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                                <label for="Image" class="form-label"></label>
                                                                <input class="form-control" type="file" id="bankImg"
                                                                    name="bankImg" accept="image/*"
                                                                    onchange="readURL2(this);"
                                                                    style="width: 150px;margin-top: 5px;">
                                                                {{-- <h6
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
                                                                        style="font-size: 1.0rem !important;color: #525252;">ธนาคาร<span
                                                                            style="color: red">*</span></label>
                                                                    <select class="form-control" name="bankname">
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
                                                                    {{-- <input type="text" name="bankname"
                                                                            placeholder="ชื่อธนาคาร" class="form-control"> --}}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="banknumber"
                                                                        style="font-size: 1.0rem !important;color: #525252;">เลขบัญชี<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" placeholder="เลขบัญชี"
                                                                            class="form-control" name="banknumber"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"maxlength="10">
                                                                        <div class="form-control-position">
                                                                            <i class="bi bi-card-heading"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="salary"
                                                                        style="font-size: 1.0rem !important;color: #525252;">ฐานเงินเดือน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                                        <input type="text" name="salary"
                                                                            id="salary" placeholder="ฐานเงินเดือน"
                                                                            class="form-control" {{-- oninput="format_price(this.value)" --}}
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                        <div class="form-control-position">
                                                                            <i class="bi bi-cash-coin"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="tax"
                                                                        style="font-size: 1.0rem !important;color: #525252;">ประกันสังคม(โรงพยาบาล)<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" placeholder="โรงพยาบาล"
                                                                            class="form-control" name="taxname">
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
                                                                        style="font-size: 1.0rem !important;color: #525252;">เเผนก<span
                                                                            style="color: red">*</span></label>
                                                                    <select class="form-control" name="department">
                                                                        <option selected="" disabled="">
                                                                            เลือกประเภทเเผนก</option>
                                                                        @foreach ($departmentList as $departmentDetail)
                                                                            <option value="{{ $departmentDetail->id }}">
                                                                                {{ $departmentDetail->dpname }}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email-id-icon"
                                                                        style="font-size: 1.0rem !important;color: #525252;">วันที่เริ่มงาน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type='text'
                                                                            placeholder="เลือกวันที่เรื่มงาน"
                                                                            class="form-control" id="datepicker1"
                                                                            name="startwork"data-provide="datepicker"
                                                                            data-date-language="th-th" autocomplete="off"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
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
                                                {{-- <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <h5
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                                                    ข้อมูลจ้างงาน</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="inputSex"
                                                                        style="font-size: 1.0rem !important;">เเผนก<span
                                                                            style="color: red">*</span></label>
                                                                    <select class="form-control" name="department">
                                                                        <option value="0" selected=""
                                                                            disabled="">เลือกประเภทเเผนก</option>
                                                                        <option>UX/UI</option>
                                                                        <option>แอดมิน</option>
                                                                        <option>ซูปเปอร์แอดมิน</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email-id-icon"
                                                                        style="font-size: 1.0rem !important;">วันที่เริ่มงาน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type='text'
                                                                            placeholder="เลือกวันที่เรื่มงาน"
                                                                            class="form-control pickadate"
                                                                            name="startwork" />
                                                                        <div class="form-control-position">
                                                                            <i class="ficon feather icon-calendar"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <h5
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #164176;">
                                                                    ข้อมูลการติดต่อ</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email"
                                                                        style="font-size: 1.0rem !important;color: #525252;">อีเมล<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="email" id="email"
                                                                            class="form-control" name="email"
                                                                            placeholder="อีเมล">
                                                                        <div class="form-control-position">
                                                                            <i class="feather icon-mail"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="Phonenumber"
                                                                        style="font-size: 1.0rem !important;color: #525252;">เบอร์โทรศัพท์<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" id="Phonenumber"
                                                                            placeholder="เบอร์โทรศัพท์"
                                                                            class="form-control"
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
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <h5
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #164176;">
                                                                    รหัสผ่าน</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="password-info-icon"
                                                                        style="font-size: 1.0rem !important; color: #525252;">รหัสผ่าน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="password" id="password"
                                                                            placeholder="รหัสผ่าน" class="form-control"
                                                                            name="password">
                                                                        <div class="form-control-position">
                                                                            <i class="feather icon-lock"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="contactform-group">
                                                                    <label for="password-icon"
                                                                        style="font-size: 1.0rem !important;color: #525252;">ยืนยันรหัสผ่าน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="password" id="confirm"
                                                                            placeholder="ยืนยันรหัสผ่าน"
                                                                            class="form-control" name="confirm">
                                                                        <div class="form-control-position">
                                                                            <i class="feather icon-lock"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="top: 0px;margin-top: 30px;">
                                                    <div class="col-12" style="text-align: center;">
                                                        <button type="submit" class="btn btn-outline round mr-1 mb-1"
                                                            data-dismiss="modal"
                                                            style="background-color: #164176;color: white;">ยืนยัน
                                                        </button>
                                                        {{-- <button id="addRow" class="btn btn-primary mb-2"><i class="feather icon-plus"></i>&nbsp; Add new row</button> --}}
                                                        <a class="btn btn-outline-secondary round mr-1 mb-1"
                                                            href="{{ route('employee') }}" role="button">ยกเลิก</a>
                                                        {{-- <button type="button" href="{{route('employee')}}"
                                                            class="btn btn-outline-secondary round mr-1 mb-1"
                                                            data-dismiss="modal" aria-label="Close">ยกเลิก</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#datepicker").datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                autoclose: true
            });
        });
        $(function() {
            $("#datepicker1").datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                autoclose: true
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#idcard').on('keyup', function() {
                if ($.trim($(this).val()) != '' && $(this).val().length == 13) {
                    id = $(this).val().replace(/-/g, "");
                    var result = Script_checkID(id);
                    if (result === false) {
                        $('span.error').removeClass('true').text('เลขบัตรไม่ถูกต้อง');
                    } else {
                        // $('span.error').addClass('true').text('เลขบัตรถูกต้อง');
                    }
                } else {
                    $('span.error').removeClass('true').text('');

                }
            })
        });

        function Script_checkID(id) {
            if (!IsNumeric(id)) return false;
            if (id.substring(0, 1) == 0) return false;
            if (id.length != 13) return false;
            for (i = 0, sum = 0; i < 12; i++)
                sum += parseFloat(id.charAt(i)) * (13 - i);
            if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
            return true;
        }

        function IsNumeric(input) {
            var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
            return (RE.test(input));
        }
    </script>
    <script>
        @if (session('success') == true)
            dd("fdgverfg")
            // Swal.fire({
            //     title: {{ session('success') }},
            //     icon: 'success',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     confirmButtonText: 'ตกลง'
            // }).then(function(result) {

            // });
        @endif
        @if (session('error'))
            Swal.fire({
                title: {{ session('error') }},
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ตกลง'
            }).then(function(result) {

            });
        @endif
    </script>
    <script>
        function readURL(input) {
            const file = input.files[0];
            const fileType = file['type'];
            const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
            if (validImageTypes.includes(fileType)) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#cusImg").attr("src", e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $("#cusImg").attr("src", noimage);
                }
            } else {
                $("#cusImg").attr("src",
                    "https://i.pinimg.com/564x/a5/e8/1f/a5e81f19cf2c587876fd1bb08ae0249f.jpg"
                );
            }
        }
        $(":file").change(function() {
            const file = this.files[0];
            const fileType = file['type'];
            const validImageTypes = ['image/jpeg', 'image/png'];
            if (!validImageTypes.includes(fileType)) {
                Swal.fire({
                    title: "Error!",
                    text: " กรุณาใส่รูปภาพ!",
                    type: "error",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
                $('#stimgclear').val('');
            }
        })

        function readURL2(input) {
            const file = input.files[0];
            const fileType = file['type'];
            const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
            if (validImageTypes.includes(fileType)) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#bankImg").attr("src", e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $("#bankImg").attr("src", noimage);
                }
            } else {
                $("#bankImg").attr("src",
                    "https://i.pinimg.com/736x/c5/a7/98/c5a798e162782e1baa3c8a74693204fc.jpg?fbclid=IwAR0Dp9Ls0GZiN4vDiNzunssi3hG4Z6h3u3dpUl9qobIMDko44-kMRDms6WI"
                );
            }
        }
        $(":file").change(function() {
            const file = this.files[0];
            const fileType = file['type'];
            const validImageTypes = ['image/jpeg', 'image/png'];
            if (!validImageTypes.includes(fileType)) {
                Swal.fire({
                    title: "Error!",
                    text: " กรุณาใส่รูปภาพ!",
                    type: "error",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
                $('#stimgclear').val('');
            }
        })
    </script>
    {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#confirm-submit').on('click', function() {
            Swal.fire({
                title: 'คุณต้องการบันทึกใช่ไหม',
                text: "คุณแน่ใจใช่ไหม",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่',
                cancelButtonText: ' ปิด',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function(result) {
                if (result.value) {
                    Swal.fire({
                        type: "success",
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        confirmButtonClass: 'btn btn-success',
                    })
                }
            })
        });
    </script> --}}
    {{-- <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function(e) {
            e.preventDefault();
        });
    </script> --}}
    {{-- <script>
        var summernoteValidator = summernoteForm.validate({
            // custom validate
            rules: {
                // tag name
                name: {
                    required: true,
                    maxlength: 100,
                    remote: {
                        // url: "{{ route('check.username') }}",
                        type: "GET",
                        data: {
                            //email:$( "#email" ).val();
                            name: function() {
                                return $("#name").val();
                            }
                        }
                    },
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                telephone: {
                    number: true,
                    minlength: 9,
                    maxlength: 10,
                },
                email: {
                    remote: {
                        // url: "{{ route('check.email') }}",
                        type: "GET",
                        data: {
                            //email:$( "#email" ).val();
                            email: function() {
                                return $("#email").val();
                            }
                        }
                    },
                },
                storeName: {
                    remote: {
                        // url: "{{ route('check.store') }}",
                        type: "GET",
                        data: {
                            //email:$( "#email" ).val();
                            storeName: function() {
                                return $("#storeName").val();
                            }
                        }
                    },
                },
            },
            messages: {
                name: {
                    required: "กรุณากรอก ชื่อผู้ดูแลระบบ",
                    maxlength: "กรุณากรอก ตัวอักษรไม่เกิน 100 ตัวอักษร",
                    remote: "อีเมลล์นี้มีผู้ใช้แล้ว",
                },
                email: {
                    required: "กรุณากรอก อีเมล",
                    remote: "อีเมลล์นี้มีผู้ใช้แล้ว",
                },
                password: {
                    required: "กรุณากรอก รหัสผ่าน",
                    minlength: "รหัสผ่านไม่ต่ำกว่า 6 ตัวอักษร"
                },
                confirm_password: {
                    required: "กรุณากรอก ยืนยันรหัสผ่าน",
                    equalTo: "รหัสผ่านไม่ตรงกัน"
                },
                telephone: {
                    required: "กรุณากรอกเบอร์โทรศัพท์",
                    number: "กรุณากรอกตัวเลข",
                    minlength: "เบอร์โทรศัพท์ไม่ตำกว่า 9 ตัว",
                    maxlength: "เบอร์โทรศัพท์ไม่เกิน 10 ตัว",
                },
                permission: {
                    required: "กรุณาเลือกสิทธิ์ของผู้ใช้",
                },
                storeName: {
                    required: "กรุณากรอกชื่อร้านค้า",
                    remote: "ชื่อร้านนี้มีผู้ใช้แล้ว",
                },
                picture: {
                    required: "กรุณาอัพโหลดรูปภาพ",
                },
            },
            errorElement: "div",
            errorClass: "is-invalid",
            validClass: "is-valid",
            ignore: ":hidden:not(.summernote),.note-editable.card-block",
            errorPlacement: function(error, element) {
                // Add the help-block class to the error element
                error.addClass("invalid-feedback");
                // console.log(element);
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.siblings("label"));
                } else if (element.hasClass("summernote")) {
                    error.insertAfter(element.siblings(".note-editor"));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                $('.loading_submit').css("display", "block");
                $('#sumbit_create').prop('disabled', true)
                form.submit()
            }
        });
    </script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script> --}}
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
        var $registrationForm = $('#submitform');
        if ($registrationForm.length) {
            $registrationForm.validate({
                rules: {
                    username: {
                        required: true,
                        alphanumeric: true,
                        max: 10
                    },
                    email: {
                        required: true,
                        customEmail: true
                    },
                    password: {
                        required: true
                    },
                    confirm: {
                        required: true,
                        equalTo: '#password'
                    },
                    bankname: {
                        required: true,
                        // max: 10,
                        maxlength: 10,
                    },
                    salary: {
                        required: true,
                    },
                    banknumber: {
                        required: true,
                    },
                    taxname: {
                        required: true,
                    },
                    gender: {
                        required: true
                    },
                    department: {
                        required: true
                    },
                    roleId: {
                        required: true
                    },
                    emType: {
                        required: true
                    },
                    emId: {
                        required: true
                    },
                    PnID: {
                        required: true
                    },
                    fullname: {
                        required: true,
                        noSpace: true
                    },
                    birthday: {
                        required: true
                    },
                    startwork: {
                        required: true
                    },
                    Phonenumber: {
                        required: true
                    },
                    bankImg: {
                        required: true
                    },
                },
                messages: {
                    username: {
                        required: 'Please enter username !',
                    },
                    email: {
                        required: 'กรุณากรอก อีเมล !',
                        email: 'กรุณากรอก ที่อยู่อีเมล !'
                    },
                    password: {
                        required: 'กรุณากรอก รหัสผ่าน !'
                    },
                    confirm: {
                        required: 'กรุณายืนยัน รหัสผ่าน !',
                        equalTo: 'กรุณากรอก รหัสผ่านให้ตรงกัน !'
                    },
                    bankname: {
                        required: 'กรุณากรอกชื่อธนาคาร !',
                        maxlength: 'กรุณากรอกรหัสผ่านให้ตรงกัน !'
                    },
                    salary: {
                        required: 'กรุณากรอกฐานเงินเดือน !'
                    },
                    banknumber: {
                        required: 'กรุณากรอกเลขบัญชี !'
                    },
                    taxname: {
                        required: 'กรุณากรอกโรงพยาบาล !'
                    },
                    roleId: {
                        required: 'กรุณาเลือกสถานะผู้ใช้งาน !'
                    },
                    emId: {
                        required: 'กรุณากรอกเลขประจำตัวพนักงาน !'
                    },
                    PnID: {
                        required: 'กรุณากรอกเลขประจำตัวประชาชน !'
                    },
                    emType: {
                        required: 'กรุณาเลือกประเภทผู้ใช้งาน !'
                    },
                    fullname: {
                        required: 'กรุณากรอกชื่อ !'
                    },
                    birthday: {
                        required: 'กรุณาเลือกวันเกิด !'
                    },
                    gender: {
                        required: 'กรุณาเลือกเพศ !'
                    },
                    department: {
                        required: 'กรุณาเลือกเเผนก !'
                    },
                    startwork: {
                        required: 'กรุณาเลือกวันที่เริ่มงาน !'
                    },
                    Phonenumber: {
                        required: 'กรุณากรอกเบอร์โทรศัพท์ !'
                    },
                    bankImg: {
                        required: 'กรุณาอัพโหลดรูปภาพสมุดบัญชี !'
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
                submitHandler: function(form) {
                    .then(function(result) {
                        let data = new FormData(form);
                        // console.log(data);
                        if (result.value) {
                            // console.log("asdasdasd")
                            form.submit()
                            $.ajax({
                                type: "POST",
                                url: "{{ route('storeEmployee') }}",
                                data: data,
                                contentType: 'multipart/form-data',
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    console.log(response)
                                    if (response.successful == true) {
                                        Swal.fire({
                                            type: "success",
                                            title: 'บันทึกสำเร็จ!',
                                            text: '',
                                            confirmButtonClass: 'btn btn-success',
                                        }).then(function(result) {
                                            window.location.href =
                                                "{{ route('addEmployee1') }}"
                                        })
                                    }
                                }
                            });
                        }
                    })
                }
            })
            // .then(function(result) {
            //     let data = new FormData(form);
            //     // console.log(data);
            //     if (result.value) {
            //         // console.log("asdasdasd")
            //         form.submit()
            //         $.ajax({
            //             type: "POST",
            //             url: "{{ route('storeEmployee') }}",
            //             data: data,
            //             contentType: 'multipart/form-data',
            //             cache: false,
            //             contentType: false,
            //             processData: false,
            //             success: function(response) {
            //                 console.log(response)
            //                 if (response.successful == true) {
            //                     Swal.fire({
            //                         type: "success",
            //                         title: 'บันทึกสำเร็จ!',
            //                         text: '',
            //                         confirmButtonClass: 'btn btn-success',
            //                     }).then(function(result) {
            //                         window.location.href =
            //                             "{{ route('addEmployee1') }}"
            //                     })
            //                 }
            //             }
            //         });
            //     }
            // })
        }



        // function format_price(price) {
        //     // console.log(price)
        //     $('#salary').val(price.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","))
        //     // console.log("after :"+$('#salary').val())

        // }
    </script>
@endsection
