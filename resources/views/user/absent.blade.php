@extends('layouts.main_user')
{{-- css --}}
{{-- js --}}
@section('head')
    <title> แบบฟอร์มใบลา</title>
    <style>
        .form-control {
            border: 1px solid #9b9b9b;
            color: #000000;
        }

        b {
            font-weight: bold;
            font-family: 'Kanit', sans-serif;
            font-weight: 400;
        }

        b,
        strong {
            font-weight: 400 !important;
        }

        label {
            font-size: 1.0rem !important;
            color: #525252 !important;

        }

        h5,
        .h5 {
            font-size: 1.6rem !important;
        }

        .error {
            color: red !important;
            font-style: italic;
            border-color: red !important;
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
                {{-- start form --}}
                <div class="container-fluid mt-2">
                    <div class="row mb-2">
                        <div class="col-sm-6 ">
                            <div style="margin-left: 5px;">
                                <h1 class="m-0"
                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555; ">
                                    <img src="{{ asset('images/registration-form.png') }}" alt="" class="mr-1"
                                        style="height: 53px;
                                width: 54px;">
                                    แบบฟอร์มใบลา
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts">
                        <div class="" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4 class="card-title">Vertical Form with Icons</h4>
                                </div> --}}
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('store.absentuse') }}" method="POST" id="submitform"
                                            enctype="multipart/form-data" class="form form-vertical"novalidate>
                                            @csrf
                                            {{ csrf_field() }}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:400; color: #164176;">
                                                            ข้อมูลส่วนตัว
                                                        </h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="first-name-id-icon">ชื่อ - นามสกุล<span
                                                                    style="color: red">*</span></label>
                                                                    <input type="text" id="first-name-icon"
                                                                    placeholder="ชื่อ - นามสกุล" value="{{ Auth::user()->id }}" class="form-control"
                                                                    name="user_id" hidden>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="text" id="first-name-icon"
                                                                    placeholder="ชื่อ - นามสกุล" class="form-control"
                                                                     readonly
                                                                    value="{{ Auth::user()->fullname }}">
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">รหัสพนักงาน</label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="text" id="user-emid"
                                                                    placeholder="รหัสพนักงาน" readonly class="form-control"
                                                                    name="emid" value="{{ Auth::user()->emid }}">
                                                                <div class="form-control-position">
                                                                    <i class="bi bi-person-badge"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-3">

                                                    </div>
                                                    {{-- @php
                                                    dd( Auth::user()->department );
                                                @endphp --}}
                                                    <div class="form-group col-4">
                                                        <label for="inputSex">เเผนก</label>
                                                        {{-- <input type="text" id="user-department" readonly
                                                            class="form-control" name="ladepartment"
                                                            @foreach ($departList as $val)
                                                                @if (Auth::user()->department == $val->id)
                                                                    value="{{ $val->dpname }}">
                                                                @endif @endforeach --}}
                                                        <select class="form-control" name="ladepartment"
                                                            id="user-department" readonly>
                                                            @foreach ($departList as $departmentDetail)
                                                                <option value="{{ $departmentDetail->id }}"
                                                                    @if ($departmentDetail->id ==Auth::user()->department) {{ 'selected' }} @endif>
                                                                    {{ $departmentDetail->dpname }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">อีเมล</label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="email" id="user-email" placeholder="อีเมล"
                                                                    class="form-control" value="{{ Auth::user()->email }}"
                                                                    name="email">
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-mail"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;">
                                                            ประเภทการลา</h5>
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="inputSex">ประเภทการลา<span
                                                                style="color: red">*</span></label>
                                                        <select id="inputSex" class="form-control" name="typeleave"
                                                            onchange="absent(this.value)">
                                                            <option value="0" selected="" disabled="">
                                                                เลือกประเภทการลา</option>
                                                            <option value="1">ลากิจ</option>
                                                            <option value="2">ลาพักร้อน</option>
                                                            <option value="3">ลาป่วย</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-4">
                                                        <label for="inputSex">ระยะเวลาการลา<span
                                                                style="color: red">*</span></label>
                                                        <select id="inputSex" class="form-control" name="timestart"
                                                            onchange="hour(this.value)">
                                                            <option value="0" selected="" disabled="">
                                                                เลือกระยะเวลาการลา</option>
                                                            <option value="1">ทั้งวัน</option>
                                                            <option value="2">ครึ่งเช้า</option>
                                                            <option value="3">ครึ่งบ่าย</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3"></div>
                                                    <div class="col-4">
                                                        <fieldset class="form-group" id="hiddenfile1"
                                                            style="display: none;">
                                                            <label for="basicInputFile" style="margin-left: 2px;">
                                                                ใบรับรองเเพทย์</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="inputGroupFile01" name="laimg"
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
                                                                    <input type="radio" name="timeend" value="0"
                                                                        checked>
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
                                                                    <input type="radio" name="timeend" value="1">
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
                                                                    <input type="radio" name="timeend" value="2">
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
                                                                    <input type="radio" name="timeend" value="3">
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
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;">
                                                            วันที่ต้องการลา
                                                        </h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">วันที่เริ่มลา<span
                                                                    style="color: red">*</span></label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type='text' id="startabsent"
                                                                    class="form-control fromDate " name="daystartla"
                                                                    autocomplete="off" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="email-id-icon">วันที่สิ้นสุด<span
                                                                    style="color: red">*</span></label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type='text' id="endabsent"
                                                                    class="form-control toDate " name="dayendla"
                                                                    autocomplete="off" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col-3">
                                                        <h5
                                                            style="margin-top: 20px; font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;">
                                                            เหตุผลการลา
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-8">
                                                        <div class="form-group">
                                                            <textarea id="maxlength-textarea" name="reasonla" class="form-control" maxlength="100" rows="3"
                                                                placeholder="เหตุผลการลา"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <section id="types">
                                                <div class="row" style="top: 0px;margin-top: 30px;">
                                                    <div class="col-12" style="text-align: center;">
                                                        <button type="submit"
                                                            class="btn btn-outline-success round mr-1 mb-1"
                                                            style="background-color: #164176;color: white;border: 1px solid #fff;">ยืนยัน
                                                        </button>
                                                        @include('sweetalert::alert')
                                                        <a class="btn btn-outline-secondary round mr-1 mb-1"
                                                            href="{{ route('history') }}" role="button">ยกเลิก</a>
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
    <script type="text/javascript">
        function getData(val) {
            let id = val.value
            var url = "{{ route('users.show', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data) {
                console.log(data)
                $('#exampleModalCenter').modal('show');
                $('#user-id').val(data.id);
                $("#user-emtype").val(data.emtype).change();
                $('#user-roleid').val(data.roleid).change();
                $('#user-emid').val(data.emid);
                $('#user-user_id').val(data.user_id);
                $('#user-department').val(data.department).change();
                $('#user-email').val(data.email);

            })
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
    <script>
        $(document).ready(function() {
            $(".fromDate").datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                autoclose: true,
            }).on('changeDate', function(selected) {
                var minDate = new Date(selected.date.valueOf());
                $('.toDate').datepicker('setStartDate', minDate);
            });

            $(".toDate").datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                autoclose: true,
            }).on('changeDate', function(selected) {
                var minDate = new Date(selected.date.valueOf());
                $('.fromDate').datepicker('setEndDate', minDate);
            });
        });
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
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
                    typeabsent: {
                        required: true,
                    },
                    email: {
                        required: true,
                        customEmail: true
                    },
                    daystartla: {
                        required: true
                    },
                    dayendla: {
                        required: true,
                    },
                    timeabsent: {
                        required: true,
                    },
                    department: {
                        required: true
                    },
                    typeleave: {
                        required: true
                    },
                    timestart: {
                        required: true,
                        noSpace: true
                    },
                },
                messages: {
                    typeabsent: {
                        required: 'เลือกประเภทการลา!',
                    },
                    email: {
                        required: 'กรอกอีเมล!',
                        email: 'กรอกที่อยู่อีเมล!'
                    },
                    daystartla: {
                        required: 'เลือกวันที่เริ่มลา!'
                    },
                    dayendla: {
                        required: 'เลือกวันที่สิ้นสุด!',
                    },
                    timeabsent: {
                        required: 'เลือกดวลาที่ต้องการลา!'
                    },
                    typeleave: {
                        required: 'เลือกประเภทการลา!'
                    },
                    timestart: {
                        required: 'เลือกระยะเวลาการลา!'
                    },

                    department: {
                        required: 'เลือกเลือกเเผนก!'
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
            });
        }
    </script>
@endsection
