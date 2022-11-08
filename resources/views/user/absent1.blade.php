@extends('layouts.main_user')
{{-- css --}}
{{-- js --}}
@section('head')
    <title> FormAbsent</title>
    <style>
        .form-control {
            border: 1px solid #9b9b9b;
            color: #000000;
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
                            <h1 class="m-0" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                ฟอร์มใบลา
                            </h1>
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
                                        <form class="form form-vertical" id="submitform">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                                            ข้อมูลส่วนตัว
                                                        </h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="first-name-id-icon">ชื่อ - นามสกุล</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="first-name" id="first-name-icon"
                                                                    placeholder="ชื่อ - นามสกุล" class="form-control"
                                                                    name="name">
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">เลขประจำตัวพนักงาน</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" id="email-id-icon"
                                                                    placeholder="เลขประจำตัวพนักงาน" class="form-control"
                                                                    name="PnID">
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-person-badge"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                                            ข้อมูลการจ้างงาน
                                                        </h5>
                                                    </div>
                                                    <div class="form-group col-4">
                                                        <label for="inputSex">เลือกเเผนก</label>
                                                        <select id="inputSex" class="form-control" name="Sex"
                                                            onchange="test(this.value)">
                                                            <option selected>เลือกเเผนก</option>
                                                            <option value="1">การตลาด</option>
                                                            <option value="2">นักพัฒนาระบบ</option>
                                                            <option value="3">การเงิน</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">อีเมล</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" id="email-id-icon" placeholder="อีเมล"
                                                                    class="form-control" name="email">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-mail"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5
                                                            style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                                            ประเภทผู้ใช้งาน</h5>
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="inputSex">เลือกประเภทการลา</label>
                                                        <select id="inputSex" class="form-control" name="Sex"
                                                            onchange="absent(this.value)">
                                                            <option selected>เลือกประเภทการลา</option>
                                                            <option value="1">ลากิจ</option>
                                                            <option value="2">ลาพักร้อน</option>
                                                            <option value="3">ลาป่วย</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="inputSex">เลือกระยะเวลาการลา</label>
                                                        <select id="inputSex" class="form-control" name="Sex"
                                                            onchange="hour(this.value)">
                                                            <option selected>เลือกระยะเวลาการลา</option>
                                                            <option value="1">ทั้งวัน</option>
                                                            <option value="2">ครึ่งเช้า</option>
                                                            <option value="3">ครึ่งบ่าย</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-3"></div>
                                                    {{-- <div class="form-group col-4" id="hiddenfile" style="display: none">
                                                        <label for="inputSex">ใบรับรองเเพทย์</label>
                                                        <input type="file" class="form-control">
                                                    </div> --}}
                                                    <div class="col-4">
                                                        <fieldset class="form-group" id="hiddenfile1"
                                                            style="display: none;
                                                    ">
                                                            <label for="basicInputFile"
                                                                style="
                                                            margin-left: 2px;
                                                        ">ใบรับรองเเพทย์</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="inputGroupFile01" name="file"
                                                                    accept="image/*">
                                                                <label class="custom-file-label" for="inputGroupFile01">
                                                                    เลือกไฟล์</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-4" id="hiddenfile2" style="display: none;">
                                                        <label for="basicInputFile"
                                                            style="
                                                    margin-left: 2px;
                                                ">เลือกเวลา</label>
                                                        <br>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" name="vueradio" checked
                                                                        value="ลาเต็ม">
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">ลาเต็ม</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" name="vueradio"
                                                                        value="1 ชั่วโมง">
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">1 ชั่วโมง</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" name="vueradio"
                                                                        value="2 ชั่วโมง">
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">2 ชั่วโมง</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" name="vueradio"
                                                                        value="3 ชั่วโมง">
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">3 ชั่วโมง</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-3" style="">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                                            วันที่ต้องการลา
                                                        </h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">วันที่เริ่มลา</label>
                                                            <div class="position-relative has-icon-right">
                                                                <input type='text' class="form-control pickadate" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">วันที่สิ้นสุด</label>
                                                            <div class="position-relative has-icon-right">
                                                                <input type='text' class="form-control pickadate" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5
                                                            style="margin-top: 20px; font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
                                                            เหตุผลการลา
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <textarea id="maxlength-textarea" class="form-control" maxlength="100" rows="3" placeholder="เหตุผลการลา"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <section id="types">
                                                <div class="row" style="top: 0px;margin-top: 30px;">
                                                    <div class="col-12" style="text-align: center;">
                                                        <button type="submit"
                                                            class="btn btn-outline-success round mr-1 mb-1"
                                                            id="confirm-submit"
                                                            style="background-color: #164176;color: white;border: 1px solid #fff;">ยืนยัน
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-outline-dark round mr-1 mb-1">ยกเลิก
                                                        </button>
                                                    </div>
                                                </div>
                                            </section>
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
        function absent(val) {
            if (val == 3) {
                $('#hiddenfile1').show();

            } else {
                $('#hiddenfile1').hide();
            }
        }

        function hour(val) {
            if (val == 2 || val == 3) {
                $('#hiddenfile2').show();

            } else {
                $('#hiddenfile2').hide();
            }
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $('#confirm-submit').on('click', function() {
        //     Swal.fire({
        //         title: 'คุณต้องการบันทึกใช่ไหม',
        //         text: "คุณแน่ใจใช่ไหม",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'ใช่',
        //         cancelButtonText: ' ปิด',
        //         confirmButtonClass: 'btn btn-primary',
        //         cancelButtonClass: 'btn btn-danger ml-1',
        //         buttonsStyling: false,
        //     }).then(function(result) {
        //         if (result.value) {
        //             Swal.fire({
        //                 type: "success",
        //                 title: 'Deleted!',
        //                 text: 'Your file has been deleted.',
        //                 confirmButtonClass: 'btn btn-success',
        //             })
        //         }
        //     })
        // });
        $('form#submitform').submit(function(e) {
            e.preventDefault();
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
                let data = new FormData(this);
                console.log(data);
                // if (result.value) {
                //     $.ajax({
                //         type: "POST",
                //         url: "url",
                //         data: "data",
                //         contentType: 'multipart/form-data',
                //         cache: false,
                //         contentType: false,
                //         processData: false,
                //         success: function (response) {
                //             if (response.successful == true) {
                //                 Swal.fire({
                //                     type: "success",
                //                     title: 'Deleted!',
                //                     text: 'Your file has been deleted.',
                //                     confirmButtonClass: 'btn btn-success',
                //                 })
                //             }
                //         }
                //     });
                // }
            })
        });
    </script>
@endsection
