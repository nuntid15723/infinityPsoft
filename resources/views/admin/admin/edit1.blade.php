@extends('layouts.admin')

<head>
    {{-- css --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- js --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"
        integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kanit:wght@500;700&family=Roboto+Condensed&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kanit:wght@500;700&family=Mitr:wght@200&family=Prompt:wght@300&family=Roboto+Condensed&display=swap"
        rel="stylesheet">
</head>

@section('content')
    <br>

    {{-- start form --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="card" style="block-size: 1400px; font-family: 'Prompt', sans-serif; font-weight:400;" >
                    <br>
                    <form action="" method="POST" style="margin: 20px">
                        <div class="form-group row offset-1">
                            <h2 style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600; color:#164176">เเก้ไขข้อมูลพนักงาน</h2>
                            <div class="col-sm-7">
                                <img src="..." class="rounded float-right" width="150" height="150" alt="...">
                                <div class="col-sm-9"> </div>
                                <div action="upload.blade.php" method="post" enctype="multipart/form-data" style="
                                            margin-left: 192px;">
                                    <input type="file" style="
                                            margin-top: 10px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row offset-1">
                            <label for="exampleInputUsername" class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">ชื่อ  </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" nanme="name" id="exampleInputUsername"
                                    style="font-family: fontawesome; "  placeholder="&#xf007; ชื่อ">
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label for="exampleInputUsername" class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">นามสกุล </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" nanme="lastName" id="exampleInputUsername"
                                    style="font-family: fontawesome; "  placeholder="&#xf007; นามสกุล">
                            </div>
                        </div>
                        <div class="form-group row offset-1">
                            <label for="exampleInputIdperson" class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">เลขบัตรประชาชน</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="exampleInputIdperson"
                                    style="font-family: fontawesome;" placeholder="&#xf2bb; เลขบัตรประชาชน">
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label for="exampleInputEmail" class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">อีเมล</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="exampleInputEmail"
                                    style="font-family: fontawesome;" placeholder="✉ อีเมล">
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label for="exampleInputBanknum" class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">เลขบัญชี</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="exampleInputBanknum"
                                    style="font-family: fontawesome;" placeholder="&#xf2c2; เลขบัญชี">
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label for="exampleImagebank" class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">รูปสมุดบัญชี</label>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">รูปสมุดบัญชี</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">วันเกิด</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="datepicker3"
                                    value="<?= date('d-m-y', strtotime(date('Y-m-d'))) ?>">
                                <script type="text/javascript">
                                    // var date = new Date();
                                    // date_start.setDate(date_start.getDate());
                                    $('#datepicker3').datepicker({
                                        format: 'dd-mm-yyyy',
                                        language: 'th',
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">วันที่เริ่มงาน</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="datepicker4"
                                    value="<?= date('d-m-y', strtotime(date('Y-m-d'))) ?>">
                                <script type="text/javascript">
                                    var date_start = new Date();
                                    date_start.setDate(date_start.getDate());
                                    $('#datepicker4').datepicker({
                                        format: 'dd-mm-yyyy',
                                        language: 'th',
                                        startDate: date_start,
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label for="exampleInputSalary" class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">ฐานเงินเดือน</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="exampleInputSalary"
                                    style="font-family: fontawesome;" placeholder="&#xf0d6; ฐานเงินเดือน">
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label for="exampleInputDepartment" class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">เเผนก</label>
                            <div class="col-sm-7">
                                <select class="form-control">
                                    <option selected>เเผนก</option>
                                    <option>ออกเเบบ</option>
                                    <option>นักพัฒนาระบบ</option>
                                    <option>การตลาด</option>
                                    <option>การเงิน</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row offset-1">
                            <label for="exampleInputTel" class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">เบอร์โทร</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="exampleInputTel"
                                    style="font-family: fontawesome;" placeholder="&#xf095; เบอร์โทร">
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label class="col-sm-4 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">เพศ</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios"
                                            id="membershipRadios1" value="" checked="">ชาย<i
                                            class="input-helper"></i></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios"
                                            id="membershipRadios2" value="option2">หญิง<i
                                            class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label for="exampleInputPassword" class="col-sm-3 col-form-label" style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">รหัสผ่าน</label>
                            <div class="col-sm-5">
                                <a style="margin:8px">รหัสผ่านใหม่</a>
                            </div>
                            <div class="col-sm-4">
                                <a style="margin:8px">ยืนยันรหัสผ่านใหม่</a>
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="exampleInputPassword"
                                    placeholder="รหัสผ่านใหม่">
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="exampleInputPassword"
                                    placeholder="ยืนยันรหัสผ่านใหม่">
                            </div>
                        </div>


                        <div class="form-group row offset-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalScrollable" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #fff;background-color: #164176;border-color: #164176;  border-radius: 30px; width: 100px; height: 40px;">
                                ยืนยัน
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('images/finished.png') }}" width="450" height="400">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                            <button type="button" class="btn btn-outline-secondary" style="font-family: 'Kanit', sans-serif; font-weight:600; background: #A19C9C;color: #FFF;border-color: #A19C9C;  border-radius: 30px; width: 100px; height: 40px;">ยกเลิก</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>






    {{-- stop form --}}

    <!-- Main content -->
    <section class="content">


        <style>
            form {
                padding: 0 100px;
            }

            input[type=text] {
                width: 100%;
                margin-bottom: 20px;
            }

            /* .placeicon{
                                font-family: fontawesomes;
                            } */
        </style>


    </section>
    <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
