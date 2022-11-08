@extends('layouts.main_admin')
{{-- css --}}
{{-- js --}}
{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
{{-- <link href="css/bootstrap-imageupload/bootstrap-imageupload.css" rel="stylesheet"> --}}

@section('head')
    <title> Form</title>
@endsection
<style>
    body {
        padding-top: 70px;
    }

    .imageupload {
        margin: 20px 0;
    }
</style>
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="content-wrapper">
            {{-- start form --}}
            <div class="content">
                <div class="col-sm-12" style="margin: auto">
                    <div class="row mb-2" style="margin-top: 100px; margin-left: 10px;">
                        <div class="col-sm-6 ">
                            <div>
                                <h1 class="m-0" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                    เพิ่มพนักงาน
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
                                    <h4 class="card-title">Vertical Form with Icons</h4>
                                </div> --}}
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5 style="font-family: 'Kanit', sans-serif; font-weight:600;">ประเภทผู้ใช้งาน</h5>
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="inputSex">เลือกประเภทผู้ใช้งาน</label>
                                                        <select id="inputSex" class="form-control" name="Sex">
                                                            {{-- <option selected>ประเภทผู้ใช้งาน</option> --}}
                                                            <option>พนักงาน</option>
                                                            <option>แอดมิน</option>
                                                            <option>ซูปเปอร์แอดมิน</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="inputSex">สถานะ</label>
                                                        <select id="inputSex" class="form-control" name="Sex">
                                                            {{-- <option selected>ประเภทผู้ใช้งาน</option> --}}
                                                            <option>ใช้งาน</option>
                                                            <option>ไม่ได้ใช้งาน</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 style="font-family: 'Kanit', sans-serif; font-weight:600;">ข้อมูลส่วนตัว</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="mb-5">
                                                            <img id="cusImg" src="" class="img-fluid"
                                                                style="width: 150px;height: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                            <label for="Image" class="form-label"></label>
                                                            <input class="form-control" type="file" id="cusImgFile"
                                                                onchange="preview()" style="width: 150px;margin-top: 5px;">
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="first-name-icon">เลขประจำตัวพนักงาน</label>
                                                            <input type="int" id="first-name-icon" class="form-control">
                                                            {{-- <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div> --}}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="first-name-icon">เลขประจำตัวประชาชน</label>
                                                            <input type="text" id="first-name-icon" class="form-control">
                                                        </div>
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="d-inline-block mr-2">
                                                                <h5>เพศ</h5>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" name="vueradio" checked
                                                                            value="false">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        <span class="">ชาย</span>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" name="vueradio"
                                                                            value="false">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        <span class="">หญิง</span>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">ชื่อ - นามสกุล</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" id="email-id-icon"
                                                                    class="form-control">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email-id-icon">วันเกิด</label>
                                                            <div class="position-relative has-icon-right">
                                                                <input type='text' class="form-control pickadate" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5 style="font-family: 'Kanit', sans-serif; font-weight:600;">ข้อมูลการเงิน</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="mb-5">
                                                            <img id="bankImg" src="" class="img-fluid"
                                                                style="width: 150px;height: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                            <label for="Image" class="form-label"></label>
                                                            <input class="form-control" type="file" id="bankImgFile"
                                                                onchange="preview1()"
                                                                style="width: 150px;margin-top: 5px;">
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="first-name-icon">ธนาคาร</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" id="first-name-icon"
                                                                    class="form-control" name="">
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-bank"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="first-name-icon">ฐานเงินเดือน</label>
                                                            <input type="text" id="first-name-icon"
                                                                class="form-control" name="">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">เลขบัญชี</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" id="" class="form-control"
                                                                    name="email-id-icon">
                                                                {{-- <div class="form-control-position">
                                                                    <i class="feather icon-mail"></i>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email-id-icon">ประกันสังคม</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" id="email-id-icon"
                                                                    class="form-control" name="">
                                                                {{-- <div class="form-control-position">
                                                                    <i class="feather icon-mail"></i>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5 style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600;" >ข้อมูลจ้างงาน</h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">

                                                            <label for="inputSex">เเผนก</label>
                                                            <select id="inputSex" class="form-control" name="">
                                                                <option selected>ประเภทผู้ใช้งาน</option>
                                                                <option>UX/UI</option>
                                                                <option>แอดมิน</option>
                                                                <option>ซูปเปอร์แอดมิน</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">วันที่เริ่มงาน</label>
                                                            <div class="position-relative has-icon-right">
                                                                <input type='text' class="form-control pickadate" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5 style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600;" ">ข้อมูลการติดต่อ</h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">อีเมล</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" id="email-id-icon"
                                                                    class="form-control" name="">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-mail"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">เบอร์โทรศัพท์</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" id="email-id-icon"
                                                                    class="form-control" name="">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-smartphone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5 style="margin-top: 20px; font-family: 'Kanit', sans-serif; font-weight:600;" ">รหัสผ่าน</h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="password-info-icon">รหัสผ่าน</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="password" id="contact-info-icon"
                                                                    class="form-control" name="">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="contactform-group">
                                                            <label for="password-icon">ยืนยันรหัสผ่าน</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="password" id=""
                                                                    class="form-control" name="">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="top: 0px;margin-top: 30px;">
                                                    <div class="col-12" style="text-align: center;">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-1 mb-1">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-outline-warning mr-1 mb-1">Reset</button>
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
        function preview() {
            cusImg.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('cusImgFile').value = null;
            cusImg.src = "";
        }

        function preview1() {
            bankImg.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('bankImgFile').value = null;
            bankImg.src = "";
        }
    </script>
@endsection
