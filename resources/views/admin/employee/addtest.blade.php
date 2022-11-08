@extends('layouts.main_admin')

{{-- js --}}
@section('head')
    <title>AddEmployee</title>
    <style>
        h5,
        .h5 {
            font-size: 20px !important;
        }

        .error {
            color: red;
            font-style: italic;
            border-color: #ea5455;
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
                            <div>
                                <h1 class="m-0"
                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
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
                                        <div class="container">
                                            <div class="col-md- col-md-offset-3">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        Registration
                                                    </div>
                                                    <div class="panel-body">
                                                        <form id="registration">
                                                            <input type="text" class="form-control" name="username"
                                                                placeholder="Username" />
                                                            <br />
                                                            <input type="text" class="form-control" name="email"
                                                                placeholder="Email" />
                                                            <br />
                                                            {{-- <input type="password" class="form-control" name="password"
                                                                placeholder="Password" id="password" /> --}}
                                                            <br />
                                                            <input type="password" class="form-control" name="confirm"
                                                                placeholder="Confirm Password" />
                                                            <br />
                                                            <input type="text" class="form-control" name="fname"
                                                                placeholder="First Name" />
                                                            <br />
                                                            <input type="text" class="form-control" name="lname"
                                                                placeholder="Last Name" />
                                                            <br />
                                                            {{-- <div class="gender">
                                                                <label class="radio-inline"><input type="radio"
                                                                        name="gender" class="form-contorl" />Male</label>
                                                                <label class="radio-inline"><input type="radio"
                                                                        name="gender" class="form-contorl" />Female</label>
                                                            </div> --}}
                                                            <br />

                                                            <div class="hobbies">
                                                                <label class="checkbox-inline"><input type="checkbox"
                                                                        name="hobbies">Cricket</label>
                                                                <label class="checkbox-inline"><input type="checkbox"
                                                                        name="hobbies">Football</label>
                                                                <label class="checkbox-inline"><input type="checkbox"
                                                                        name="hobbies">Hockey</label>
                                                                <label class="checkbox-inline"><input type="checkbox"
                                                                        name="hobbies">Tennis</label>
                                                            </div>
                                                            <br />
                                                            {{-- <select class="form-control" name="country">
                                                                <option value="0" selected="" disabled="">
                                                                    --SELECT--</option>
                                                                <option>India</option>
                                                                <option>Australia</option>
                                                                <option>Japan</option>
                                                                <option>China</option>
                                                                <option>South Africa</option>
                                                            </select>
                                                            <br />
                                                            <textarea class="form-control" name="address" placeholder="Address"></textarea>
                                                            <br /> --}}

                                                            <div class="col-lg-9 col-sm-9">
                                                                <div class="row">
                                                                    <div class="form-group col-lg-6 col-sm-6">
                                                                        <label for="inputSex"
                                                                            style="font-size: 1.0rem !important;"><b>เลือกประเภทผู้ใช้งาน</b><span
                                                                                style="color: red">*</span></label>

                                                                        <select class="form-control" name="Sex">
                                                                            <option value="0" selected=""
                                                                                disabled="">ประเภทผู้ใช้งาน</option>
                                                                            <option>พนักงาน</option>
                                                                            <option>แอดมิน</option>
                                                                            <option>ซูปเปอร์แอดมิน</option>
                                                                        </select>
                                                                    </div>
                                                                    <select class="form-control" name="country">
                                                                        <option value="0" selected=""
                                                                            disabled="">
                                                                            ประเภทผู้ใช้งาน</option>
                                                                        <option>พนักงาน</option>
                                                                        <option>แอดมิน</option>
                                                                        <option>ซูปเปอร์แอดมิน</option>
                                                                    </select>
                                                                    <br />

                                                                    <div class="form-group col-lg-6 col-sm-6">
                                                                        <label for="inputSex"
                                                                            style="font-size: 1.0rem !important;"><b>สถานะ</b><span
                                                                                style="color: red">*</span></label>
                                                                        <select required id="inputSex" class="form-control"
                                                                            name="Sex">
                                                                            {{-- <option selected>ประเภทผู้ใช้งาน</option> --}}
                                                                            <option>ผ่านโปร</option>
                                                                            <option>ไม่ผ่านโปร</option>
                                                                            <option>ลาออก</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <h5
                                                                        style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">
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
                                                                            <label for="Image"
                                                                                class="form-label"></label>
                                                                            <input class="form-control" type="file"
                                                                                id="cusImgFile" accept="image/*"
                                                                                onchange="preview()"
                                                                                style="width: 150px;margin-top: 5px;">
                                                                            <h6
                                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #970a0a;">
                                                                                กรุณาเลือกรูปโปรไฟล์</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-9 col-sm-9">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="emId"
                                                                                    style="font-size: 1.0rem !important;"><b>เลขประจำตัวพนักงาน</b><span
                                                                                        style="color: red">*</span></label>
                                                                                <fieldset
                                                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                                                    <div class="controls">
                                                                                        <input type="text"
                                                                                            id="emId"
                                                                                            placeholder="เลขประจำตัวพนักงาน"
                                                                                            class="form-control"
                                                                                            name="emId">
                                                                                        <div class="form-control-position">
                                                                                            <i
                                                                                                class="bi bi-person-badge"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="PnID-id-icon"
                                                                                    style="font-size: 1.0rem !important;"><b>เลขประจำตัวประชาชน</b><span
                                                                                        style="color: red">*</span></label>
                                                                                <fieldset
                                                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                                                    <div class="controls">
                                                                                        <input type="text"
                                                                                            id="PnID"
                                                                                            placeholder="เลขประจำตัวประชาชน"
                                                                                            class="form-control"
                                                                                            name="PnID"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"maxlength="13">
                                                                                        <div class="form-control-position">
                                                                                            <i
                                                                                                class="bi bi-person-badge-fill"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="name-id-icon"
                                                                                    style="font-size: 1.0rem !important;"><b>ชื่อ
                                                                                        -
                                                                                        นามสกุล</b><span
                                                                                        style="color: red">*</span></label>
                                                                                <fieldset
                                                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                                                    <div class="controls">
                                                                                        <input type="text"
                                                                                            id="fullname" name="fullname"
                                                                                            class="form-control"
                                                                                            placeholder="ชื่อ - นามสกุล">
                                                                                        <div class="form-control-position">
                                                                                            <i
                                                                                                class="feather icon-user"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="-id-icon"
                                                                                    style="font-size: 1.0rem !important;"><b>วันเกิด</b><span
                                                                                        style="color: red">*</span></label>
                                                                                <fieldset
                                                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                                                    <div class="controls">
                                                                                        <input type='text'
                                                                                            placeholder="เลือกวันเกิด"
                                                                                            class="form-control pickadate"
                                                                                            id="birthday"
                                                                                            name="birthday" />
                                                                                        <div class="form-control-position">
                                                                                            <i
                                                                                                class="ficon feather icon-calendar"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6">
                                                                            <div class="gender">
                                                                                <ul class="list-unstyled mb-0">
                                                                                    <li class="d-inline-block mr-2">
                                                                                        <h5><b>เพศ</b><span
                                                                                                style="color: red">*</span>
                                                                                        </h5>
                                                                                    </li>
                                                                                    <li class="d-inline-block mr-2">
                                                                                        <fieldset>
                                                                                            <div class="vs-radio-con">
                                                                                                <input type="radio"
                                                                                                    name="gender"
                                                                                                    class="form-contorl">
                                                                                                <span class="vs-radio">
                                                                                                    <span
                                                                                                        class="vs-radio--border"></span>
                                                                                                    <span
                                                                                                        class="vs-radio--circle"></span>
                                                                                                </span>
                                                                                                <span
                                                                                                    class="">ชาย</span>
                                                                                            </div>
                                                                                        </fieldset>
                                                                                    </li>
                                                                                    <li class="d-inline-block mr-2">
                                                                                        <fieldset>
                                                                                            <div class="vs-radio-con">
                                                                                                <input type="radio"
                                                                                                    name="gender"
                                                                                                    class="form-contorl">
                                                                                                <span class="vs-radio">
                                                                                                    <span
                                                                                                        class="vs-radio--border"></span>
                                                                                                    <span
                                                                                                        class="vs-radio--circle"></span>
                                                                                                </span>
                                                                                                <span
                                                                                                    class="">หญิง</span>
                                                                                            </div>
                                                                                        </fieldset>
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-sm-4">
                                                                                <h5
                                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;font-size: 1.3rem;">
                                                                                    ชื่อบริษัท
                                                                                </h5>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="namecompany"
                                                                                        style="font-size: 1.0rem !important;"><b>ชื่อบริษัท</b><span
                                                                                            style="color: red">*</span></label>
                                                                                    <fieldset
                                                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                                                        <input type="text"
                                                                                            placeholder="ชื่อบริษัท" class="form-control"
                                                                                            name="password">
                                                                                        <div class="form-control-position">
                                                                                            <i class="bi bi-building"></i>
                                                                                        </div>
                                                                                    </fieldset>
                                                                                </div>
                                                                                <input type="password" class="form-control" name="password"
                                                                                placeholder="Password" id="password" />
                                                                            <br />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-sm-4">
                                                                                <h5
                                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;font-size: 1.3rem;">
                                                                                    ที่อยู่
                                                                                </h5>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="addresscom"
                                                                                        style="font-size: 1.0rem !important;"><b>ที่อยู่</b><span
                                                                                            style="color: red">*</span></label>
                                                                                    <fieldset
                                                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                                                        <input type="address" id="addresscom" placeholder="ที่อยู่"
                                                                                            class="form-control" name="addresscom">
                                                                                        <div class="form-control-position">
                                                                                            <i class="bi bi-geo-alt-fill"></i>
                                                                                        </div>
                                                                                    </fieldset>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-3 col-sm-4" style="">
                                                                                <h5
                                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;font-size: 1.3rem;">
                                                                                    เลขประจำตัวผู้เสียภาษี
                                                                                </h5>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="fname"
                                                                                        style="font-size: 1.0rem !important;"><b>เลขประจำตัวผู้เสียภาษี</b><span
                                                                                            style="color: red">*</span></label>
                                                                                    <fieldset
                                                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                                                        <input type="text" id="numbertax" placeholder=""
                                                                                            class="form-control" name="fname">
                                                                                        <div class="form-control-position">
                                                                                            <i class="bi bi-person"></i>
                                                                                        </div>
                                                                                    </fieldset>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
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
    <script>
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
        $('form#registration').submit(function(e) {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        var $registrationForm = $('#registration');
        if ($registrationForm.length) {
            $registrationForm.validate({
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
                    fname: {
                        required: true,
                        noSpace: true
                    },
                    lname: {
                        required: true,
                        noSpace: true
                    },
                    gender: {
                        required: true
                    },
                    hobbies: {
                        required: true
                    },
                    country: {
                        required: true
                    },
                    Sex: {
                        required: true
                    },
                    address: {
                        required: true
                    }
                },
                messages: {
                    username: {
                        required: 'Please enter username!',
                    },
                    email: {
                        required: 'Please enter email!',
                        email: 'Please enter valid email!'
                    },
                    password: {
                        required: 'Please enter password!'
                    },
                    confirm: {
                        required: 'Please enter confirm password!',
                        equalTo: 'Please enter same password!'
                    },
                    fname: {
                        required: 'Please enter first name!'
                    },
                    lname: {
                        required: 'Please enter last name!'
                    },
                    country: {
                        required: 'Please select country!'
                    },
                    Sex: {
                        required: 'Please select sex!'
                    },
                    address: {
                        required: 'Please enter address!'
                    },
                    address: {
                        required: 'Please enter address!'
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.is(":radio")) {
                        error.appendTo(element.parents('.gender'));
                    } else if (element.is(":checkbox")) {
                        error.appendTo(element.parents('.hobbies'));
                    } else {
                        error.insertAfter(element);
                    }

                }
            });
        }
    </script>
@endsection
