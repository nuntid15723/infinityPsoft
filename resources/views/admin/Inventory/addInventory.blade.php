@extends('layouts.main_admin')
{{-- css --}}
{{-- js --}}
@section('head')
    <title>เพิ่มทรัพย์สิน</title>
    {{-- <script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script> --}}
    <style>
        h5,
        .h5 {
            font-size: 1.5rem !important;
        }

        .error {
            color: red !important;
            font-style: italic;
            border-color: red !important;
        }

        label {
            font-size: 1.0rem !important;
        }

        select.form-control:not([multiple="multiple"]) {
            background-image: url(../../app-assets/images/pages/arrow-down.png);
            background-position: calc(100% - 12px) 13px, calc(100% - 20px) 13px, 100% 0;
            background-size: 12px 12px, 10px 10px;
            background-repeat: no-repeat;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 0.5rem;
            padding-left: 1rem;
        }
    </style>
@endsection
@section('content')
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
                                <h1 class="m-0" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555;">
                                    {{-- <i class="bi bi-plus-circle-fill"></i> --}}
                                    <img src="{{ asset('images/add-box.png') }}" alt="" class="mr-1"
                                        style="height: 59px;
                                        width: 55px;margin-top:-22px;">
                                    เพิ่มทรัพย์สิน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts">
                        <div style="font-family: 'Kanit', sans-serif; font-weight:400;">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form name="frmMain" action="{{ url('/storeInventory') }}" method="POST"
                                            enctype="multipart/form-data" class="form form-vertical" id="submitform"
                                            name="submitform" novalidate>
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-4"style="text-align: -moz-center;">
                                                        <div class="mb-0">
                                                            <img id="stImg"
                                                                src="https://i.pinimg.com/736x/c5/a7/98/c5a798e162782e1baa3c8a74693204fc.jpg?fbclid=IwAR0Dp9Ls0GZiN4vDiNzunssi3hG4Z6h3u3dpUl9qobIMDko44-kMRDms6WI"
                                                                class="img-fluid"
                                                                style="max-width: 200px; max-height: 200px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                            <label for="Image" class="form-label"
                                                                accept="image/*"></label>
                                                            <input class="form-control" name="stImg" type="file"
                                                                id="stimgclear" onchange="readURL(this);"
                                                                accept="image/jpg, image/jpeg, image/png"
                                                                style="width:200px;margin-top: 5px;">
                                                        </div>
                                                        {{-- <h6
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #970a0a;">
                                                            กรุณาเลือกรูปทรัพย์สิน</h6> --}}

                                                    </div>
                                                    <div class="col-lg-6 col-sm-4"style="margin-top: 75px;">
                                                        <h5 style="font-size: 1.6rem;"> ชื่อ : <span
                                                                id="stname"></span>(<span id="stdescription"></span>)
                                                        </h5>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-4"
                                                        style="text-align: center;margin-top: 75px;">
                                                        <h2 style="color: #5C5C5C;font-size: 1.6rem;margin-right: 14px;">
                                                            ราคาซื้อ
                                                            <div>
                                                                : <span id="stprice"></span>
                                                            </div>

                                                        </h2>

                                                    </div>
                                                </div>
                                                <hr>
                                                <br>
                                                <div class="row mt-1">
                                                    <div class="col-lg-3 col-sm-">
                                                        <h5
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;">
                                                            ข้อมูลทรัพย์สินพื้นฐาน</h5>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-sm-6">
                                                        <label for="emType"
                                                            style="font-size: 1.0rem !important;">สถานะการใช้งาน<span
                                                                style="color: red">*</span></label>
                                                        <select class="form-control" name="ststatus">
                                                            <option selected="" disabled="">
                                                                เลือกสถานะการใช้งาน</option>
                                                            <option value="1">ใช้งาน</option>
                                                            <option value="2">พักใช้งาน</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="stId"> รหัสทรัพย์สิน </label>
                                                            <input type="text" id="" value="{{ $stid }}"
                                                                disabled name="stId"class="form-control"
                                                                placeholder="รหัสทรัพย์สิน">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-"></div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="sttype">ประเภททรัพย์สิน<span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <select class="form-control" name="sttype">
                                                                <option selected="" disabled="">
                                                                    เลือกประเภททรัพย์สิน
                                                                </option>
                                                                @foreach ($inventoryList as $inventoryDetail)
                                                                    <option value="{{ $inventoryDetail->id }}">
                                                                        {{ $inventoryDetail->stname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="stname">ชื่อทรัพย์สิน<span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" id="stname" class="form-control"
                                                                name="stname" onInput="showName(event)"
                                                                placeholder="ชื่อทรัพย์สิน">
                                                            <div class="form-control-position">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-"></div>
                                                    <div class="col-lg-2 col-sm-4">
                                                        <div class="form-group">
                                                            <label for="stamount">จำนวน<span style="color: red">*</span>
                                                            </label>
                                                            <input type="text" id="" name="stamount"
                                                                class="form-control" placeholder="จำนวน"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4">
                                                        <div class="form-group">
                                                            <label for="stunit">หน่วยนับ<span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <select class=" form-control"name="stunit">
                                                                <option selected="" disabled="">เลือกหน่วยนับ
                                                                </option>
                                                                @foreach ($unit as $departmentDetail)
                                                                    <option value="{{ $departmentDetail->id }}">
                                                                        {{ $departmentDetail->unname }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4">
                                                        <label for="stusers" style="color: #525252;">ผู้ใช้งาน<span
                                                                style="color: red">*</span>
                                                        </label>
                                                        <div class="form-group">
                                                            <select class="select2 form-control" value=""
                                                                id="" name="stusers">
                                                                <option>เลือกผู้ใช้งาน</option>
                                                                @foreach ($user as $userlist)
                                                                    <option value="{{ $userlist->id }}">
                                                                        {{ $userlist->fullname }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-lg-3 col-sm-"></div>
                                                    <div class="col-lg-2 col-sm-4">
                                                        <div class="form-group">
                                                            <label for="stamount" style="color: #525252;">จำนวน<span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <input type="text" id=""
                                                                value="{{ $stock->stamount }}" name="stamount"
                                                                class="form-control"placeholder="จำนวน"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4">
                                                        <div class="form-group">
                                                            <label for="stunit" style="color: #525252;">หน่วยนับ<span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <select id="stunit" class="select2 form-control"
                                                                name="stunit">
                                                                @foreach ($unit as $departmentDetail)
                                                                    <option value="{{ $departmentDetail->id }}">
                                                                        {{ $departmentDetail->unname }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4">
                                                        <label for="stusers" style="color: #525252;">ผู้ใช้งาน<span
                                                                style="color: red">*</span>
                                                        </label>
                                                        <div class="form-group">
                                                            <select class="select2 form-control" value=""
                                                                id="" name="stusers">
                                                                <option>เลือกผู้ใช้งาน</option>
                                                                @foreach ($user as $userlist)
                                                                    <option value="{{ $userlist->id }}"
                                                                        @if ($userlist->id == $stock->stusers) {{ 'selected' }} @endif>
                                                                        {{ $userlist->fullname }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-"></div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">วันที่ซื้อ<span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type='text' class="form-control"
                                                                    id="datepicker1" placeholder="เลือกวันที่ซื้อ"
                                                                    name="stdaybuy"data-provide="datepicker"
                                                                    data-date-language="th-th"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                    autocomplete="off">
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="first-name-icon">เลขที่เอกสารอ้างอิง<span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" id="" name="stnumber"
                                                                class="form-control" placeholder="เลขที่เอกสารอ้างอิง">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-4">
                                                        {{-- <h5
                                                            style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                                            ข้อมูลทรัพย์สินพื้นฐาน</h5> --}}
                                                    </div>
                                                    <div class="col-lg-8 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="descriptionTextarea1">รายละเอียดทรัพย์สิน
                                                            </label>
                                                            <textarea class="form-control" onInput="showDescription(event)" name="stdescription" id="descriptionTextarea1"
                                                                rows="3"></textarea>
                                                            {{-- <input type="text" id="" class="form-control"
                                                                style="height: 100px;"> --}}
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-2 col-sm-"></div> --}}
                                                </div>
                                                <hr>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-">
                                                        <h5
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;">
                                                            คำนวณค่าเสื่อม</h5>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="first-name-icon">วันที่เริ่มต้นใช้งาน
                                                            </label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                {{-- <input type='text' id="datepicker" class="form-control "
                                                                    placeholder="เลือกวันที่เริ่มใช้งาน"
                                                                    name="stdaystart" /> --}}
                                                                <input type="text" placeholder="เลือกวันที่เริ่มใช้งาน"
                                                                    name="stdaystart" class="form-control"
                                                                    id="datepicker" autocomplete="off"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="price-id-icon">ราคาซื้อ<span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                {{-- <input type="text" id="stprice" class="form-control"
                                                                    name="stprice" onInput="showPrice(event)"
                                                                    placeholder="ราคาซื้อ"
                                                                    onkeyup="depreciation(this)"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> --}}
                                                                <input type="text" class="form-control" name="stprice"
                                                                    value="" placeholder="ราคาซื้อ" id="stprice"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');showPrice(event)"
                                                                    onkeyup="fncSum();"> <br>
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-currency-bitcoin"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-"></div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="contact-info-icon">อายุการใช้งานทางบัญชี<span
                                                                    style="color: red">*</span> </label>
                                                            {{-- <input style="margin-top: 2px;" type="text"
                                                                id="contact-info-icon" class="form-control"
                                                                name="stageuse"
                                                                placeholder="อายุการใช้งานทางบัญชี"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> --}}
                                                            <input type="text" style="margin-top: 2px;"
                                                                class="form-control" name="stageuse" value=""
                                                                onkeyup="fncSum();" placeholder="อายุการใช้งานทางบัญชี"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            {{-- <div class="form-control-position">
                                                                    <i class="feather icon-smartphone"></i>
                                                                </div> --}}

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="text-icon">ค่าเสื่อมที่คำนวณได้ต่อปี
                                                                <button style="border: solid 0px ;background-color: #fff;"
                                                                    data-toggle="popover"
                                                                    data-content="ค่าเสื่อมราคารายปีที่คำนวณออกมาได้จะถือเป็นค่าใช้จ่ายที่เกิดขึ้นในปีปัจจุบัน"
                                                                    data-trigger="hover" data-original-title="">
                                                                    <i style="color: #164176;"
                                                                        class="bi bi-exclamation-circle-fill"></i>
                                                                </button>
                                                            </label>
                                                        </div>
                                                        {{-- <input style="margin-top: -21px;" type="text" id="stmath"
                                                            class="form-control" name="stmath" disabled
                                                            placeholder="ค่าเสื่อมที่คำนวณได้ต่อปี"> --}}
                                                        <input type="text" style="margin-top: -21px;" name="stmath"
                                                            class="form-control" value="" id="stmath"
                                                            placeholder="ค่าเสื่อมที่คำนวณได้ต่อปี" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="top: 0px;margin-top: 30px;">
                                                @include('sweetalert::alert')
                                                <div class="col-12" style="text-align: center;">
                                                    <button type="submit" class="btn btn-outline round mr-1 mb-1"
                                                        data-dismiss="modal"
                                                        style="background-color: #164176;color: white;">ยืนยัน
                                                    </button>
                                                    <a class="btn btn-outline-secondary round mr-1 mb-1"
                                                        href="{{ route('stock') }}" role="button">ยกเลิก</a>
                                                    {{-- <button type="button"
                                                        class="btn btn-outline-secondary round mr-1 mb-1"
                                                        data-dismiss="modal" aria-label="Close">ยกเลิก</button> --}}
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
    <script language="JavaScript">
        function fncSum() {
            let stprice = document.frmMain.stprice.value
            if (stprice === '' || stprice === null) {
                stprice = 0
            }
            let stageuse = document.frmMain.stageuse.value
            stageuse = (stageuse * 365)
            console.log(stageuse);
            if (stageuse === '' || stageuse === null) {
                stageuse = 0
            }
            let result = [(parseFloat(stprice) - 0) - 1] / parseFloat(stageuse);
            if (result == 'Infinity' || result == '-Infinity' || isNaN(result)) {
                result = 0
            }
            // result=(result*365)
            // document.frmMain.stmath.value = (result.toFixed(2));
            $('#stmath').val(result.toFixed(2));
        }
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
                        $("#stImg").attr("src", e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $("#stImg").attr("src", noimage);
                }
            } else {
                $("#stImg").attr("src",
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
    <script>
        function showName(event) {
            const value = event.target.value;
            document.getElementById("stname").innerText = value;
        }

        function showPrice(event) {
            const value = event.target.value;
            document.getElementById("stprice").innerText = value;
        }

        function showDescription(event) {
            const value = event.target.value;
            document.getElementById("stdescription").innerText = value;
        }

        function showDescription(event) {
            const value = event.target.value;
            document.getElementById("stdescription").innerText = value;
        }
        // function showDescription(event) {
        //     const value = event.target.value;
        //     document.getElementById("stdescription").innerText = value;
        // }
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
        var $registrationForm = $('#submitform');
        if ($registrationForm.length) {
            $registrationForm.validate({
                rules: {
                    stname: {
                        required: true,
                    },
                    sttype: {
                        required: true,

                    },
                    stamount: {
                        required: true

                    },
                    stunit: {
                        required: true

                    },
                    quantity: {
                        required: true

                    },
                    stdaybuy: {
                        required: true

                    },
                    ststatus: {
                        required: true
                    },
                    stprice: {
                        required: true
                    },
                    stageuse: {
                        required: true
                    },
                },
                messages: {
                    stname: {
                        required: 'กรุณากรอกชื่อทรัพย์สิน !',
                    },
                    sttype: {
                        required: 'กรุณาเลือกประเภททรัพย์สิน !',
                    },
                    stamount: {
                        required: 'กรุณากรอกจำนวนของทรัพย์สิน !'
                    },
                    stunit: {
                        required: 'กรุณาเลือกหน่วยนับ !'
                    },
                    quantity: {
                        required: 'Please enter !'
                    },
                    stdaybuy: {
                        required: 'กรุณาเลือกวันที่ซื้อทรัพย์สิน !'
                    },
                    ststatus: {
                        required: 'กรุณาเลือกการใช้งาน !'
                    },
                    stprice: {
                        required: 'กรุณากรอกราคาของทรัพย์สิน !'
                    },
                    stageuse: {
                        required: 'กรุณากรอกอายุการใช้งานทางบัญชี !'
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
                    $.ajax({
                        type: "POST",
                        url: "{{ route('storeInventory') }}",
                        data: data,
                        contentType: 'multipart/form-data',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            // console.log(response)
                            window.location.href =
                                "{{ route('addInventory') }}"
                        }
                    });
                }
            });
        }
    </script>
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
@endsection
