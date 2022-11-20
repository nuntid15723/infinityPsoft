@extends('layouts.main_admin')
{{-- css --}}
{{-- js --}}
@section('head')
    <title>เเก้ไขทรัพย์สิน</title>
    <style>
        h5,
        .h5 {
            font-size: 1.5rem !important;
        }

        label {
            font-size: 1.0rem !important;
        }

        .select2-container {
            font-family: 'Kanit', sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.45;
            color: #000;
        }
    </style>
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
                    <div class="row mt-2">
                        <div class="col-sm-6 ">
                            <div>
                                <h1 class="m-0" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555;">
                                    <img src="{{ asset('images/edit-box.png') }}" alt="" class="mr-1"
                                        style="height: 59px;
                                        width: 55px;
                                        margin-top: -22px;">
                                    เเก้ไขทรัพย์สิน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts">
                        <div class=" mt-2" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form name="frmMain" action="{{ route('update.Inventory', $stock->id) }}"
                                            method="POST" enctype="multipart/form-data" novalidate>
                                            @csrf
                                            @method('PUT')
                                            @include('sweetalert::alert')
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-4"style="text-align: -moz-center;">
                                                        <div class="mb-0">
                                                            <img id="stImg"
                                                                src="{{ asset('imgstock/' . $stock->stimg) }}"
                                                                class="img-fluid"
                                                                style="max-width: 200px; max-height: 200px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                            <label for="Image" class="form-label"
                                                                accept="image/*"></label>
                                                            <input class="form-control" name="stImg" type="file"
                                                                id="stImg" value="" onchange="readURL(this);"
                                                                accept="image/jpg, image/jpeg, image/png"
                                                                style="width:200px;margin-top: 5px;">
                                                        </div>
                                                        {{-- <h6
                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #970a0a;">
                                                        กรุณาเลือกรูปทรัพย์สิน</h6> --}}

                                                    </div>
                                                    <div class="col-lg-6 col-sm-4"style="margin-top: 75px;">
                                                        <h5 style="font-size: 1.6rem;"> ชื่อ : <span
                                                                id="stname">{{ $stock->stname }}</span>
                                                            (<span id="stdescription">{{ $stock->stdescription }}</span>)
                                                        </h5>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-4"
                                                        style="text-align: center;margin-top: 75px;">
                                                        <h2 style="color: #525252;font-size: 1.6rem;margin-right: 14px;">
                                                            ราคาซื้อ
                                                            <div style="color:#164176">
                                                                : <span id="stprice">{{ $stock->stprice }}</span>
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
                                                            style="font-size: 1.0rem !important;color: #525252;">
                                                            สถานะการใช้งาน<span style="color: red">*</span></label>
                                                        <select class="form-control" name="ststatus">
                                                            <option selected="" disabled="">
                                                                เลือกสถานะการใช้งาน</option>
                                                            {{-- <option value="0">พนักงาน</option> --}}
                                                            <option value="0"
                                                                {{ $stock->ststatus == 0 ? 'selected' : '' }}>เลิกใช้งาน
                                                            </option>
                                                            <option value="1"
                                                                {{ $stock->ststatus == 1 ? 'selected' : '' }}>ใช้งาน
                                                            </option>
                                                            <option value="2"
                                                                {{ $stock->ststatus == 2 ? 'selected' : '' }}>พักใช้งาน
                                                            </option>

                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="stId" style="color: #525252;">รหัสทรัพย์สิน
                                                            </label>
                                                            <input type="text" readonly id=""
                                                                value="{{ $stock->stid }}" name="stid"
                                                                class="form-control" placeholder="รหัสทรัพย์สิน">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-"></div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="stname" style="color: #525252;">ชื่อทรัพย์สิน<span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" id="stname"
                                                                value="{{ $stock->stname }}" class="form-control"
                                                                name="stname" onInput="showName(event)"
                                                                placeholder="ชื่อทรัพย์สิน">
                                                            <div class="form-control-position">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="sttype"
                                                                style="color: #525252;">ประเภททรัพย์สิน<span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <select id="sttype" class="form-control" name="sttype">
                                                                <option selected>เลือกประเภททรัพย์สิน</option>
                                                                @foreach ($inventoryList as $inventoryDetail)
                                                                    <option value="{{ $inventoryDetail->id }}"
                                                                        @if ($inventoryDetail->id == $stock->sttype) {{ 'selected' }} @endif>
                                                                        {{ $inventoryDetail->stname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
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
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-"></div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="email-id-icon"
                                                                style="color: #525252;">วันที่ซื้อ<span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type='text' id="datepicker"
                                                                    class="form-control " placeholder="เลือกวันที่ซื้อ"
                                                                    autocomplete="off"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                    value="{{ Carbon::parse($stock->stdaybuy)->thaidate('j/m/Y') }}"
                                                                    name="stdaybuy" />
                                                                {{-- Carbon::parse( $stock->stdaybuy)->thaidate('j/M/Y') --}}
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="first-name-icon"
                                                                style="color: #525252;">เลขที่เอกสารอ้างอิง<span
                                                                    style="color: red">*</span></label>
                                                            <input type="text" id=""
                                                                value="{{ $stock->stnumber }}" name="stnumber"
                                                                class="form-control"placeholder="เลขที่เอกสารอ้างอิง">
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
                                                            <label for="descriptionTextarea1"
                                                                style="color: #525252;">รายละเอียดทรัพย์สิน
                                                            </label>
                                                            <textarea class="form-control" onInput="showDescription(event)" name="stdescription" id="descriptionTextarea1"
                                                                rows="3">{{ $stock->stdescription }}"</textarea>
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
                                                            <label for="first-name-icon"
                                                                style="color: #525252;">วันที่เริ่มต้นใช้งาน
                                                            </label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type='text' id="datepicker1"autocomplete="off"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                    class="form-control "
                                                                    placeholder="เลือกวันที่เริ่มใช้งาน" name="stdaystart"
                                                                    value="{{ Carbon::parse($stock->stdaystart)->thaidate('j/m/Y') }}" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="price-id-icon"
                                                                style="color: #525252;">ราคาซื้อ<span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="text" id="stprice" class="form-control"
                                                                    name="stprice" onkeyup="fncSum();"
                                                                    value="{{ $stock->stprice }}"
                                                                    onInput="showPrice(event)"placeholder="ราคาซื้อ"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
                                                            <label for="contact-info-icon"
                                                                style="color: #525252;">อายุการใช้งานทางบัญชี<span
                                                                    style="color: red">*</span> </label>
                                                            <input type="text" id="contact-info-icon"
                                                                class="form-control" name="stageuse" onkeyup="fncSum();"
                                                                value="{{ $stock->stageuse }}"
                                                                placeholder="อายุการใช้งานทางบัญชี"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            {{-- <div class="form-control-position">
                                                                <i class="feather icon-smartphone"></i>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="text-icon"
                                                                style="color: #525252;">ค่าเสื่อมที่คำนวณได้ต่อปี <button
                                                                    style="border: solid 0px ;background-color: #fff;"
                                                                    data-toggle="popover"
                                                                    data-content="ค่าเสื่อมราคารายปีที่คำนวณออกมาได้จะถือเป็นค่าใช้จ่ายที่เกิดขึ้นในปีปัจจุบัน"
                                                                    data-trigger="hover" data-original-title="">
                                                                    <i style="color: #164176;"
                                                                        class="bi bi-exclamation-circle-fill"></i>
                                                                </button></label>
                                                            <input type="text" id="stmath" class="form-control"
                                                                name="stmath" readonly value="{{ $stock->stmath }}"
                                                                placeholder="ค่าเสื่อมที่คำนวณได้ต่อปี"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            {{-- <div class="form-control-position">
                                                                <i class="feather icon-lock"></i>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="top: 0px;margin-top: 30px;">
                                                    <div class="col-12" style="text-align: center;">
                                                        <button type="submit" class="btn btn-outline round mr-1 mb-1"
                                                            style="background-color: #164176;color: white;">ยืนยัน
                                                        </button>
                                                        {{-- <button id="addRow" class="btn btn-primary mb-2"><i class="feather icon-plus"></i>&nbsp; Add new row</button> --}}
                                                        <a href="{{ route('stock') }}">
                                                        <button type="button"
                                                            class="btn btn-outline-secondary round mr-1 mb-1"data-dismiss="modal"
                                                            aria-label="Close">ยกเลิก</button>
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
        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             $("#stImg").attr("src", e.target.result);
        //         };
        //         reader.readAsDataURL(input.files[0]);
        //     } else {
        //         $("#stImg").attr("src", noimage);
        //     }
        // }

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
                $("#stImg").attr("src", "{{ asset('imgstock/' . $stock->stimg) }}");
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
