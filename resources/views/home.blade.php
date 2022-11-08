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

                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('store.absentuse') }}" method="POST" id="submitform"
                                            enctype="multipart/form-data" class="form form-vertical"novalidate>
                                            @csrf
                                            <div class="form-body">
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
                                                </div>
                                            </div>
                                        </form>
                                        <div class="form-group" id="hiddenfile1" style="display: none;">
                                            <form action="">
                                                <input type="text">
                                            </form>
                                        </div>
                                        <div class="form-group" id="hiddenfile2" style="display: none;">
                                            <form action="">
                                                <input type="text">
                                                <input type="text" name="" id="">
                                            </form>
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
        function absent(val) {
            if (val == 3) {
                $('#hiddenfile1').show();
            } else {
                $('#hiddenfile1').hide();
            }
            if (val == 2) {
                $('#hiddenfile2').show();
            } else {
                $('#hiddenfile2').hide();
            }
        }
    </script>
@endsection
