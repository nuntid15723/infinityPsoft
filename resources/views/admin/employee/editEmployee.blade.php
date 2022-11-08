@extends('layouts.main_admin')

{{-- js --}}
@section('style')
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

        .swal2-title {
            position: relative;
            max-width: 100%;
            margin: 0 0 0.4em;
            padding: 0;
            color: #595959;
            font-size: 1.875em;
            font-weight: 600;
            font-family: 'Kanit', sans-serif;
            font-weight: 400;
            text-align: center;
            text-transform: none;
            word-wrap: break-word;
        }
    </style>
@endsection
@section('head')
    <title>แก้ไขพนักงาน</title>
    {{-- <style>
        h5,
        .h5 {
            font-size: 20px !important;
        }

        .error {
            color: red !important;
            font-style: italic;
            border-color: red !important;
        }

        .swal2-title {
            position: relative;
            max-width: 100%;
            margin: 0 0 0.4em;
            padding: 0;
            color: #595959;
            font-size: 1.875em;
            font-weight: 600;
            font-family: 'Kanit', sans-serif;
            font-weight: 400;
            text-align: center;
            text-transform: none;
            word-wrap: break-word;
        }
    </style> --}}

    {{-- css --}}
@endsection
@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <!-- Content Header (Page header) -->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="container-fluid ">
                    <div class="row mt-3 ">
                        <div class="col-sm-6 ">
                            <div>
                                <h1 class="m-0" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555;">
                                    <img src="{{ asset('images/edit-boss.png') }}" alt="" class="mr-1"
                                        style="height: 56px;
                                    width: 60px;margin-top: -22px;">
                                    แก้ไขพนักงาน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts ">
                        <div class=" mt-2" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('update.employee', $user->id) }}"
                                            enctype="multipart/form-data" method="POST" class="form form-vertical"
                                            id="submitform" novalidate>
                                            @csrf
                                            @method('PUT')
                                            @include('sweetalert::alert')
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
                                                                <label for="inputSex"
                                                                    style="font-size: 1.0rem !important;color:#525252;">ประเภทผู้ใช้งาน<span
                                                                        style="color: red">*</span></label>
                                                                <select class="form-control" name="emType"
                                                                    id="user-emtype">
                                                                    <option selected="" disabled="">
                                                                        เลือกประเภทผู้ใช้งาน</option>
                                                                    <option value="0"
                                                                        {{ $user->emtype == 0 ? 'selected' : '' }}>
                                                                        พนักงาน
                                                                    </option>
                                                                    <option value="1"
                                                                        {{ $user->emtype == 1 ? 'selected' : '' }}>
                                                                        แอดมิน
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-sm-6">
                                                                <label for="inputSex"
                                                                    style="font-size: 1.0rem !important;color:#525252;">สถานะ<span
                                                                        style="color: red">*</span></label>
                                                                <select class="form-control" name="roleId"
                                                                    id="user-roleid">
                                                                    <option selected="" disabled="">
                                                                        ประเภทผู้ใช้งาน</option>
                                                                    <option value="3"
                                                                        {{ $user->roleid == 3 ? 'selected' : '' }}>ทดลองงาน
                                                                    </option>
                                                                    <option value="1"
                                                                        {{ $user->roleid == 1 ? 'selected' : '' }}>
                                                                        ผ่านโปร
                                                                    </option>
                                                                    <option value="0"
                                                                        {{ $user->roleid == 0 ? 'selected' : '' }}>
                                                                        ไม่ผ่านโปร</option>
                                                                    <option value="2"
                                                                        {{ $user->roleid == 2 ? 'selected' : '' }}>ลาออก
                                                                    </option>
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
                                                                    src="{{ asset('imguse/' . $user->emimg) }}"
                                                                    {{-- src="/imguse/{{ $user->emimg }}" alt="" --}} class="img-fluid"
                                                                    style="max-width: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                                <label for="Image" class="form-label"></label>
                                                                <input class="form-control" type="file" id="cusImg"
                                                                    name="cusImg"
                                                                    value="{{ $user->emimg }}"accept="image/*"
                                                                    onchange="readURL(this)"
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
                                                                        style="font-size: 1.0rem !important;color:#525252;">เลขประจำตัวพนักงาน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" id="emId"
                                                                            placeholder="เลขประจำตัวพนักงาน"
                                                                            class="form-control" name="emId" readonly
                                                                            value="{{ $user->emid }}">
                                                                        <div class="form-control-position">
                                                                            <i class="bi bi-person-badge"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="PnID-id-icon"
                                                                        style="font-size: 1.0rem !important;color:#525252;">เลขประจำตัวประชาชน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text"
                                                                            placeholder="เลขประจำตัวประชาชน"
                                                                            class="form-control"
                                                                            value="{{ $user->pnid }}"
                                                                            name="PnID"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"maxlength="13">
                                                                        <div class="form-control-position">
                                                                            <i class="bi bi-person-badge-fill"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name-id-icon"
                                                                        style="font-size: 1.0rem !important;color:#525252;">ชื่อ
                                                                        -
                                                                        นามสกุล<span style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" name="fullname"
                                                                            class="form-control"
                                                                            value="{{ $user->fullname }}"
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
                                                                        style="font-size: 1.0rem !important;color:#525252;">วันเกิด<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type='text' placeholder="เลือกวันเกิด"
                                                                            class="form-control " id="datepicker"
                                                                            autocomplete="off"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                            value="{{ Carbon::parse($user->birthday)->thaidate('j/m/Y') }}"
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
                                                                            <h5
                                                                                style="font-family: 'Kanit', sans-serif; font-weight:400;color:#525252;font-size:1.1rem !important;">
                                                                                เพศ<span style="color: red">*</span>
                                                                            </h5>
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="vs-radio-con">
                                                                                    <input type="radio" name="gender"
                                                                                        class="form-contorl"
                                                                                        id="gender1" value="0"
                                                                                        {{ $user->gender == 0 ? 'checked' : '' }}>
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
                                                                                    <input type="radio" name="gender"
                                                                                        class="form-contorl"
                                                                                        id="gender2" value="1"
                                                                                        {{ $user->gender == 1 ? 'checked' : '' }}>
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
                                                            <div class="col-12">

                                                                <img id="bankImg"
                                                                    src="{{ asset('imgbank/' . $user->bankimg) }}"class="img-fluid"
                                                                    style="max-width: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                                <label for="Image" class="form-label"></label>
                                                                <input class="form-control" type="file" id="bankImg"
                                                                    name="bankImg" accept="image/*"
                                                                    onchange="readURL2(this)"
                                                                    style="width: 150px;margin-top: 5px;"
                                                                    value="{{ $user->bankimg }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-9 col-sm-9">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="bank-name"
                                                                        style="font-size: 1.0rem !important;color:hsl(0, 0%, 32%);">ธนาคาร<span
                                                                            style="color: red">*</span></label>
                                                                    <select class="form-control" name="bankname"
                                                                        id="user-emtype">
                                                                        <option selected="" disabled="">
                                                                            เลือกธนาคาร</option>
                                                                        <option value="1"
                                                                            {{ $user->bankname == 1 ? 'selected' : '' }}>
                                                                            ธนาคารกรุงไทย</option>
                                                                        <option value="2"
                                                                            {{ $user->bankname == 2 ? 'selected' : '' }}>
                                                                            ธนาคารกรุงเทพ</option>
                                                                        <option value="3"
                                                                            {{ $user->bankname == 3 ? 'selected' : '' }}>
                                                                            ธนาคารกรุงศรีอยุธยา</option>
                                                                        <option value="4"
                                                                            {{ $user->bankname == 4 ? 'selected' : '' }}>
                                                                            ธนาคารกสิกรไทย</option>
                                                                        <option value="5"
                                                                            {{ $user->bankname == 5 ? 'selected' : '' }}>
                                                                            ธนาคารไทยพาณิชย์</option>
                                                                        <option value="6"
                                                                            {{ $user->bankname == 6 ? 'selected' : '' }}>
                                                                            ธนาคารออมสิน</option>
                                                                        <option value="7"
                                                                            {{ $user->bankname == 7 ? 'selected' : '' }}>
                                                                            ธนาคารทหารไทยธนชาต</option>
                                                                        <option value="8"
                                                                            {{ $user->bankname == 8 ? 'selected' : '' }}>
                                                                            ธนาคารซีไอเอ็มบี</option>
                                                                    </select>
                                                                    {{-- <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" name="bankname"
                                                                            placeholder="ชื่อธนาคาร"
                                                                            value="{{ $user->bankname }}"
                                                                            class="form-control">
                                                                        <div class="form-control-position">
                                                                            <i class="bi bi-bank"></i>
                                                                        </div>

                                                                    </fieldset> --}}
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="banknumber"
                                                                        style="font-size: 1.0rem !important;color:#525252;">เลขบัญชี<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" placeholder="เลขบัญชี"
                                                                            class="form-control"
                                                                            value="{{ $user->banknumber }}"
                                                                            name="banknumber"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"maxlength="10">
                                                                        <div class="form-control-position">
                                                                            <i class="bi bi-card-heading"></i>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="salary"
                                                                        style="font-size: 1.0rem !important;color:#525252;">ฐานเงินเดือน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                                        <input type="text"name="salary"
                                                                            placeholder="ฐานเงินเดือน"
                                                                            class="form-control"
                                                                            value="{{ $user->salary }}"
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
                                                                        style="font-size: 1.0rem !important;color:#525252;">ประกันสังคม(โรงพยาบาล)<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" placeholder="โรงพยาบาล"
                                                                            class="form-control"
                                                                            value="{{ $user->taxname }}"
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
                                                                    <label for="inputSex"
                                                                        style="font-size: 1.0rem !important;color:#525252;">เเผนก<span
                                                                            style="color: red">*</span></label>
                                                                    <select class="form-control" name="department">
                                                                        <option value="0" disabled="">
                                                                            เลือกประเภทเเผนก</option>
                                                                        @foreach ($departmentList as $departmentDetail)
                                                                            <option value="{{ $departmentDetail->id }}"
                                                                                @if ($departmentDetail->id == $user->department) {{ 'selected' }} @endif>
                                                                                {{ $departmentDetail->dpname }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email-id-icon"
                                                                        style="font-size: 1.0rem !important;color:#525252;">วันที่เริ่มงาน<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type='text'
                                                                            placeholder="เลือกวันที่เรื่มงาน"
                                                                            class="form-control " id="datepicker1"
                                                                            autocomplete="off"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                            value=" {{ Carbon::parse($user->startwork)->thaidate('j/m/Y') }} "
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
                                                                        style="font-size: 1.0rem !important;"><b>เเผนก</b><span
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
                                                                        style="font-size: 1.0rem !important;"><b>วันที่เริ่มงาน</b><span
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
                                                                        style="font-size: 1.0rem !important;color:#525252;">อีเมล<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="email" id="email"
                                                                            class="form-control" name="email"
                                                                            value="{{ $user->email }}"
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
                                                                        style="font-size: 1.0rem !important;color:#525252;">เบอร์โทรศัพท์<span
                                                                            style="color: red">*</span></label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <input type="text" id="Phonenumber"
                                                                            placeholder="เบอร์โทรศัพท์"
                                                                            value="{{ $user->phonenumber }}"
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
                                                                        style="font-size: 1.0rem !important;color:#525252;">รหัสผ่านใหม่<span
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
                                                                        style="font-size: 1.0rem !important;color:#525252;">ยืนยันรหัสผ่านใหม่อีกครั้ง<span
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
                                                            style="background-color: #164176;color: white;">บันทึก
                                                        </button>
                                                        {{-- <button id="addRow" class="btn btn-primary mb-2"><i class="feather icon-plus"></i>&nbsp; Add new row</button> --}}
                                                        <a href="{{ url('/employee') }}">
                                                            <button type="button"
                                                                class="btn btn-outline-secondary round mr-1 mb-1"
                                                                aria-label="Close">ยกเลิก
                                                            </button>
                                                        </a>
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
@endsection
@section('script')
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
                    "{{ asset('imguse/' . $user->emimg) }}"
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
                    "{{ asset('imgbank/' . $user->bankimg) }}"
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
    <script>
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
    </script>


    {{-- <script type="text/javascript">
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
                if (data.gender.type == 0) {
                    $('#gender2').prop('checked', true);
                } else {
                    $('#gender1').prop('checked', true);
                }
                $('#user-bankimg').attr("src", "{{ asset('imgbank') }}" + "/" + data.bankimg);
                $('#user-bankimg').val(data.bankimg);
                $('#user-bankname').val(data.bankname);
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
    </script> --}}
    {{-- <script>
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
        var $updateemployee = $('#submitform');
        if ($updateemployee.length) {
            $updateemployee.validate({
                rules: {
                    username: {
                        required: true,
                        alphanumeric: true
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
                    },
                    salary: {
                        required: true,
                    },
                    banknumber: {
                        required: true,
                    },
                    tax: {
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
                },
                messages: {
                    username: {
                        required: 'Please enter username!',
                    },
                    email: {
                        required: 'กรอกอีเมล!',
                        email: 'กรอกที่อยู่อีเมล!'
                    },
                    password: {
                        required: 'กรอกรหัสผ่าน!'
                    },
                    confirm: {
                        required: 'ยืนยันรหัสผ่าน!',
                        equalTo: 'กรอกรหัสผ่านให้ตรงกัน!'
                    },
                    bankname: {
                        required: 'กรอกชื่อธนาคาร!'
                    },
                    salary: {
                        required: 'กรอกฐานเงินเดือน!'
                    },
                    banknumber: {
                        required: 'กรอกเลขบัญชี!'
                    },
                    tax: {
                        required: 'กรอกประกันสังคม!'
                    },
                    roleId: {
                        required: 'เลือกสถานะผู้ใช้งาน!'
                    },
                    emId: {
                        required: 'กรอกเลขประจำตัวพนักงาน!'
                    },
                    PnID: {
                        required: 'กรอกเลขประจำตัวประชาชน!'
                    },
                    emType: {
                        required: 'เลือกประเภทผู้ใช้งาน!'
                    },
                    fullname: {
                        required: 'กรอกชื่อ!'
                    },
                    birthday: {
                        required: 'เลือกวันเกิด!'
                    },
                    gender: {
                        required: 'เลือกเพศ!'
                    },
                    department: {
                        required: 'เลือกเเผนก!'
                    },
                    startwork: {
                        required: 'เลือกวันที่เริ่มงาน!'
                    },
                    Phonenumber: {
                        required: 'กรอกเบอร์โทรศัพท์!'
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
                submitHandler: function(form) {
                    // $('.loading_submit').css("display", "block");
                    // $('#sumbit_create').prop('disabled', true)
                    // form.submit()
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
                        let data = new FormData(form);
                        // console.log(data);
                        if (result.value) {
                            // console.log("asdasdasd")
                            // form.submit()

                        }
                    })
                }
            });
        }
    </script> --}}
@endsection
