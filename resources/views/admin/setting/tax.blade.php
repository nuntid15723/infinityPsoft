@extends('layouts.main_admin')
{{-- css --}}
{{-- js --}}
@section('head')
    <title>ใบแจ้งเงินเดือน</title>
    <style>
        .form-control {
            border: 1px solid #9b9b9b;
            color: #000000;
        }

        .error {
            color: red !important;
            font-style: italic;
            border-color: red !important;
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
                            <div style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                <h1 class="m-0" style="color:#555555;font-family: 'Kanit', sans-serif; font-weight:600;">
                                    <img src="{{ asset('images/tax2.png') }}" class="mr-2"
                                        style="height: 54px;
                                        width: 52px;">ใบแจ้งเงินเดือน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts">
                        <div style="font-family: 'Kanit', sans-serif; font-weight:400;">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        {{-- <form name="frmMain" action="{{ route('store.tax') }}" method="POST"
                                            enctype="multipart/form-data" class="form form-vertical" id="submitform"
                                            name="submitform" novalidate>
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-4">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                            ชื่อบริษัท
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="namecompany"
                                                                style="font-size: 1.0rem !important;color: #525252;">ชื่อบริษัท<span
                                                                    style="color: red">*</span></label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="text" placeholder="ชื่อบริษัท"
                                                                    class="form-control" name="pay_company">
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-building"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-4">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                            ที่อยู่
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="addresscom"
                                                                style="font-size: 1.0rem !important;color: #525252;">ที่อยู่<span
                                                                    style="color: red">*</span></label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="address" placeholder="ที่อยู่"
                                                                    class="form-control" name="pay_address">
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
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                            เลขประจำตัวผู้เสียภาษี
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="numbertax"
                                                                style="font-size: 1.0rem !important;color: #525252;">เลขประจำตัวผู้เสียภาษี<span
                                                                    style="color: red">*</span></label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="text" placeholder="เลขประจำตัวผู้เสียภาษี"
                                                                    class="form-control" name="pay_id"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-4" style="">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                            รูปภาพโลโก้
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-3">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12">
                                                                <img id="Logo"
                                                                    src="https://www.ip-soft.co/public/assets/img/logo/20200227_200714.jpg"
                                                                    class="img-fluid"
                                                                    style="max-width: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                                <label for="Image" class="form-label"></label>
                                                                <input class="form-control" type="file" id="emImg"
                                                                    name="pay_imglogo" accept="image/*"
                                                                    onchange="readURL(this);"
                                                                    style="width: 150px;margin-top: 5px;">
                                                                <h6
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #b62020;">
                                                                    กรุณาเลือกรูปภาพโลโก้</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <section id="types">
                                                @include('sweetalert::alert')
                                                <div class="row" style="top: 0px;margin-top: 30px;">
                                                    <div class="col-12" style="text-align: center;">
                                                        <button type="submit" class="btn btn-outline round mr-1 mb-1"
                                                            data-dismiss="modal"
                                                            style="background-color: #164176;color: white;">ยืนยัน
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary round mr-1 mb-1"
                                                            data-dismiss="modal" aria-label="Close">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </section>
                                        </form> --}}
                                        <div hidden>
                                            @foreach ($slip as $slip)
                                                {{ $slip->id }}
                                                {{ $slip->pay_company }}
                                                {{ $slip->pay_id }}
                                                {{ $slip->pay_address }}
                                            @endforeach
                                        </div>
                                        <form action="{{ route('update.tax', $slip->id) }}" method="POST"
                                            enctype="multipart/form-data" novalidate>
                                            @csrf
                                            @method('PUT')
                                            @include('sweetalert::alert')
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-4">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                            ชื่อบริษัท
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="namecompany"
                                                                style="font-size: 1.0rem !important;color: #525252;">ชื่อบริษัท<span
                                                                    style="color: red">*</span></label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="text" placeholder="ชื่อบริษัท"
                                                                    class="form-control" value="{{ $slip->pay_company }}"
                                                                    name="pay_company">
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-building"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-4">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                            ที่อยู่
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="addresscom"
                                                                style="font-size: 1.0rem !important;color: #525252;">ที่อยู่<span
                                                                    style="color: red">*</span></label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="address" value="{{ $slip->pay_address }}"
                                                                    placeholder="ที่อยู่" class="form-control"
                                                                    name="pay_address">
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
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                            เลขประจำตัวผู้เสียภาษี
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="numbertax"
                                                                style="font-size: 1.0rem !important;color: #525252;">เลขประจำตัวผู้เสียภาษี<span
                                                                    style="color: red">*</span></label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="text" placeholder="เลขประจำตัวผู้เสียภาษี"
                                                                    class="form-control" value="{{ $slip->pay_id }}"
                                                                    name="pay_id"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-4" style="">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                            รูปภาพโลโก้
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-3">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12">
                                                                <img id="Logo"
                                                                    src="{{ asset('imguse/' . $slip->pay_imglogo) }}"
                                                                    class="img-fluid"
                                                                    style="max-width: 150px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                                                <label for="Image" class="form-label"></label>
                                                                <input class="form-control" type="file" id="emImg"
                                                                    name="pay_imglogo" accept="image/*"
                                                                    onchange="readURL(this);"
                                                                    style="width: 150px;margin-top: 5px;">
                                                                <h6
                                                                    style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #b62020;">
                                                                    กรุณาเลือกรูปภาพโลโก้</h6>
                                                            </div>
                                                        </div>
                                                        {{-- <input type="text" name="salaries_id"> --}}
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <section id="types">
                                                @include('sweetalert::alert')
                                                <div class="row" style="top: 0px;margin-top: 30px;">
                                                    <div class="col-12" style="text-align: center;">
                                                        <button type="submit" class="btn btn-outline round mr-1 mb-1"
                                                            data-dismiss="modal"
                                                            style="background-color: #164176;color: white;">ยืนยัน
                                                        </button>
                                                        {{-- <button id="addRow" class="btn btn-primary mb-2"><i class="feather icon-plus"></i>&nbsp; Add new row</button> --}}
                                                        <button type="button"
                                                            class="btn btn-outline-secondary round mr-1 mb-1"
                                                            data-dismiss="modal" aria-label="Close">ยกเลิก</button>
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
        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             $("#Logo").attr("src", e.target.result);
        //         };
        //         reader.readAsDataURL(input.files[0]);
        //     } else {
        //         $("#Logo").attr("src", noimage);
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
                        $("#Logo").attr("src", e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $("#Logo").attr("src", noimage);
                }
            } else {
                $("#Logo").attr("src","{{ asset('imguse/' . $slip->pay_imglogo) }}"
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
                    addresscom: {
                        required: true,
                    },
                    namecompany: {
                        required: true,

                    },
                    numbertax: {
                        required: true

                    },
                },
                messages: {
                    addresscom: {
                        required: 'กรอกที่อยู่!',
                    },
                    namecompany: {
                        required: 'กรอกชื่อบริษัท!',

                    },
                    numbertax: {
                        required: 'กรอกเลขประจำตัวผู้เสียภาษี!'
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
            });
        }
    </script>
@endsection
