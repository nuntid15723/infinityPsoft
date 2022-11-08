@extends('layouts.main_admin')
{{-- css --}}
{{-- js --}}
@section('head')
    <title> EditInventory</title>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            {{-- <div class="container-fluid mt-2">
                <div class="row mb-2">
                    <div class="col-sm-6 ">
                        <div>
                            <h1 class="m-0" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                <img src="{{ asset('images/absent.png') }}" alt="Infinity" class="mr-3">เเบบฟอร์มใบลา
                            </h1>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid --> --}}
            <!-- /.content-header -->
            {{-- start form --}}
            <div class="content">
                <div class="col-sm-12" style="margin: auto">
                    <div class="row mb-2" style="margin-top: 100px; margin-left: 10px;">
                        <div class="col-sm-6 ">
                            <div>
                                <h1 class="m-0"
                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                    {{-- <img src="{{ asset('images/absent.png') }}" alt=""
                                        class="mr-1"> --}}
                                    แก้ไขทรัพย์สิน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts">
                        <div class="col-md-12 col-12" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h1 class="card-title"
                                        style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                        <img src="{{ asset('images/absent.png') }}" alt=""
                                            class="mr-1">เเบบฟอร์มใบลา
                                    </h1>
                                </div> --}}
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <div class="form-body">
                                                {{-- <div class="row">
                                                    <div class="col-4">
                                                        <h5>ข้อมูลทรัพย์สินพื้นฐาน</h5>
                                                    </div>
                                                </div> --}}
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-4"style="text-align: -moz-center;">
                                                        <div class="mb-0">
                                                            <img id="cusImg"
                                                                src="https://i.pinimg.com/736x/c5/a7/98/c5a798e162782e1baa3c8a74693204fc.jpg"
                                                                class="img-fluid"
                                                                style="width: 200px;height: 200px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                            <label for="Image" class="form-label"></label>
                                                            <input class="form-control" type="file" id="cusImgFile"
                                                                accept="image/*" onchange="preview()"
                                                                style="width:200px;margin-top: 5px;">
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-4 col-sm-4"style="margin-top: 75px;">
                                                        <h5>name :APPLE MacBook Air M1, 2020 (13.3", Ram 8GB, 256GB, Gold)
                                                        </h5>
                                                        <h5>สถานะทรัพย์สิน : ใช้งานอยู่</h5>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-4"
                                                        style="text-align: end;margin-top: 75px;">
                                                        <h2 style="color: #5C5C5C;font-size: 1.4rem;margin-right: 14px;">
                                                            ราคาซื้อ
                                                        </h2>
                                                        <h2>180,000</h2>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-"></div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="first-name-icon"
                                                                style="font-size: 1.0rem !important;"><b>รหัสทรัพย์สิน<span
                                                                        style="color: red">*</span></b></label>
                                                            <input type="int" id="first-name-icon" class="form-control">
                                                            {{-- <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div> --}}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="first-name-icon"
                                                                style="font-size: 1.0rem !important;"><b>เลขที่เอกสารอ้างอิง<span
                                                                        style="color: red">*</span></b></label>
                                                            <input type="text" id="first-name-icon" class="form-control">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name-icon"
                                                                        style="font-size: 1.0rem !important;"><b>จำนวน<span
                                                                                style="color: red">*</span></b></label>
                                                                    <input type="text" id="first-name-icon"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="first-name-icon"
                                                                        style="font-size: 1.0rem !important;"><b>หน่วยนับ<span
                                                                                style="color: red">*</span></b></label>
                                                                    <input type="text" id="first-name-icon"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label for="first-name-icon">จำนวน</label>
                                                            <input type="text" id="first-name-icon" class="form-control">
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="email-id-icon"
                                                                style="font-size: 1.0rem !important;"><b>ชื่อทรัพย์สิน<span
                                                                        style="color: red">*</span></b></label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" id="email-id-icon"
                                                                    class="form-control">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input"
                                                                    style="font-size: 1.0rem !important;"><b>ประเภททรัพย์สิน<span
                                                                            style="color: red">*</span></b></label>

                                                                <select id="input" class="form-control" name="">
                                                                    <option selected>ประเภทผู้ใช้งาน</option>
                                                                    <option>พนักงาน</option>
                                                                    <option>แอดมิน</option>
                                                                    <option>ซูปเปอร์แอดมิน</option>
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email-id-icon"><b
                                                                        style="font-size: 1.0rem !important;">วันที่ซื้อ<span
                                                                            style="color: red">*</span></b></label>
                                                                <div class="position-relative has-icon-right">
                                                                    <input type='text'
                                                                        class="form-control pickadate" />
                                                                    <div class="form-control-position">
                                                                        <i class="ficon feather icon-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-sm-"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-3">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                                            ข้อมูลทรัพย์สินพื้นฐาน</h5>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-9">
                                                        <div class="form-group">
                                                            <label for="email-id-icon"
                                                                style="font-size: 1.0rem !important;"><b>รายละเอียดทรัพย์สิน<span
                                                                        style="color: red">*</span></b></label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" id="email-id-icon"
                                                                    class="form-control" style="height: 100px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-2 col-sm-"></div> --}}
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                                            คำนวณค่าเสื่อม</h5>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="first-name-icon"
                                                                style="font-size: 1.0rem !important;"><b>วันที่เริ่มต้นใช้งาน<span
                                                                        style="color: red">*</span></b></label>
                                                            <div class="position-relative has-icon-right">
                                                                <input type='text' class="form-control pickadate" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="email-id-icon"
                                                                style="font-size: 1.0rem !important;"><b>ราคาซื้อ<span
                                                                        style="color: red">*</span></b></label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" id="price-id-icon"
                                                                    class="form-control" name="">
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-currency-bitcoin"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-"></div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="contact-info-icon"
                                                                style="font-size: 1.0rem !important;"><b>อายุการใช้งานทางบัญชี<span
                                                                        style="color: red">*</span></b></label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="number" id="contact-info-icon"
                                                                    class="form-control" name="">
                                                                {{-- <div class="form-control-position">
                                                                    <i class="feather icon-smartphone"></i>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="password-icon"
                                                                style="font-size: 1.0rem !important;"><b>ค่าเสื่อมที่คำนวณได้ต่อปี<span
                                                                        style="color: red">*</span></b></label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="password" id="password-icon"
                                                                    class="form-control" name="">
                                                                {{-- <div class="form-control-position">
                                                                    <i class="feather icon-lock"></i>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="top: 0px;margin-top: 30px;">
                                                    <div class="col-12" style="text-align: center;">
                                                        <button type="submit"
                                                            class="btn btn-outline-success round mr-1 mb-1"
                                                            id="confirm-submit">ยืนยัน
                                                        </button>
                                                        <button type="reset"
                                                            class="btn btn-outline-secondary round mr-1 mb-1">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
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
    <script>
        function preview() {
            cusImg.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('cusImgFile').value = null;
            cusImg.src = "";
        }
    </script>
@endsection
