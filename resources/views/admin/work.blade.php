@extends('layouts.main_admin')
{{-- css --}}
{{-- js --}}
@section('head')
    <title>ตารางการทำงาน</title>
    {{-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet"> --}}
    <style>
        .vs-radio-con .vs-radio .vs-radio--border {
            background: black !important;
        }

        .dot1 {
            height: 20px;
            width: 20px;
            background-color: #000;
            border-radius: 50%;
            display: inline-block;
        }

        .dot2 {
            height: 20px;
            width: 20px;
            background-color: #0FA958;
            border-radius: 50%;
            display: inline-block;
        }

        .dot3 {
            height: 20px;
            width: 20px;
            background-color: #FFC700;
            border-radius: 50%;
            display: inline-block;
        }

        .dot4 {
            height: 20px;
            width: 20px;
            background-color: #0396FF;
            border-radius: 50%;
            display: inline-block;
        }

        .dot5 {
            height: 20px;
            width: 20px;
            background-color: #E83DD7;
            border-radius: 50%;
            display: inline-block;
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
                            <div style="margin-left: 5px;">
                                <h1 class="m-0"
                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555; ">
                                    <img src="{{ asset('images/schedule1.png') }}" alt="" class="mr-1"
                                        style="height: 54px;
                                width: 51px;">
                                    ตารางการทำงาน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts">
                        <div class="card">
                            {{-- <div class="card-header">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="row justify-content">
                                        <div class="form-group" style="margin-left: 10px">
                                            <label for="first-name-icon"
                                                style="font-size: 1.0rem !important;margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500;">เลือกเดือน<span
                                                    style="color: red">*</span>
                                            </label>
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" class="form-control datepicker" autocomplete="off"
                                                    name="datepicker" id="datepicker" onInput="showName(event)"
                                                    style="width: auto; text-align: center" />
                                                <div class="form-control-position">
                                                    <i class="ficon feather icon-calendar"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row ">
                                <div class="col-lg-3 col-sm-4 p-3  ">
                                    <div class="d-flex" style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                        <span class="dot1 mr-1"></span>วันหยุดประจำสัปดาห์
                                    </div>
                                </div>

                                <div class="col-lg-2 col-sm-3 p-3  ">
                                    <div class="d-flex" style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                        <span class="dot2 mr-1" style=""></span>ลากิจ
                                    </div>
                                </div>

                                <div class="col-lg-2 col-sm-3 p-3  ">
                                    <div class="d-flex" style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                        <span class="dot3 mr-1" style=""></span>ลาป่วย
                                    </div>
                                </div>

                                <div class="col-lg-2 col-sm-3 p-3  ">
                                    <div class="d-flex" style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                        <span class="dot4 mr-1" style=""></span>ลาพักร้อน
                                    </div>
                                </div>

                                {{-- <div class="col-lg-2 col-sm-3 p-3  ">
                                    <div class="d-flex" style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                        <span class="dot5 mr-1" style=""></span>ลากิจ(ชั่วโมง)
                                    </div>
                                </div> --}}
                            </div>

                            {{-- ตาราง --}}
                            <div class="card-content">
                                <div class="card-body">
                                    <p class="card-text"></p>
                                    {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                                    <!-- Table with outer spacing -->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ชื่อ</th>

                                                    @for ($i = 1; $i <= date('t'); $i++)
                                                        @php
                                                            $name = date('D', strtotime(date('Y-m') . '-' . $i));
                                                        @endphp
                                                        <th>{{ $i }} <br>
                                                            {{ date('D', strtotime(date('Y-m') . '-' . $i)) }}</th>
                                                    @endfor
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr>
                                                    <th scope="row">ยีน</th>

                                                    @for ($i = 1; $i <= date('t'); $i++)
                                                        <td>
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="false">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class=""></span>
                                                            </div>
                                                        </td>
                                                    @endfor
                                                </tr> --}}

                                                @foreach ($data as $item)
                                                <tr>
                                                    <th scope="row">{{ $item['fullname'] }}</th>
                                                    @foreach ($item['date'] as $item2)
                                                        <td>
                                                            @php
                                                                $d = date('l', strtotime($item2['date']));
                                                            @endphp
                                                            {{-- หาวันว่าเสาร์หรืออาทิตย์ ถ้าเสาร์ให้โชว์วงกลม ถ้าไม่ใช่โชว์เช้คบล็อกธรรมดา --}}
                                                            @if ($d == 'Saturday' || $d == 'Sunday')
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <span class="vs-radio cicle">
                                                                            <span class="dot1 mr-1"></span>
                                                                        </span>
                                                                        <span class=""></span>
                                                                    </div>
                                                                </fieldset>
                                                            @else
                                                                @if ($item2['type'] == 1)
                                                                    <fieldset>
                                                                        <div class="vs-radio-con">
                                                                            <span class="vs-radio cicle">
                                                                                <span class="dot2 mr-1" style=""></span>
                                                                            </span>
                                                                            <span class=""></span>
                                                                        </div>
                                                                    </fieldset>
                                                                @elseif ($item2['type'] == 2)
                                                                    <fieldset>
                                                                        <div class="vs-radio-con">
                                                                            <span class="vs-radio cicle">
                                                                                <span class="dot4 mr-1" style=""></span>
                                                                            </span>
                                                                            <span class=""></span>
                                                                        </div>
                                                                    </fieldset>
                                                                @elseif ($item2['type'] == 3)
                                                                    <fieldset>
                                                                        <div class="vs-radio-con">
                                                                            <span class="vs-radio cicle">
                                                                                <span class="dot3 mr-1" style=""></span>
                                                                            </span>
                                                                            <span class=""></span>
                                                                        </div>
                                                                    </fieldset>
                                                                @else
                                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                                        <input type="checkbox" value="false" disabled>
                                                                        <span class="vs-checkbox">
                                                                            <span class="vs-checkbox--check">
                                                                                <i class="vs-icon feather icon-check"></i>
                                                                            </span>
                                                                        </span>
                                                                        <span class=""></span>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                                @endforeach

                                                {{-- <tr>
                                                    <th scope="row">นัน</th>

                                                    @for ($i = 1; $i <= date('t'); $i++)
                                                        <td>
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="false">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class=""></span>
                                                            </div>
                                                        </td>
                                                    @endfor

                                                </tr> --}}

                                            </tbody>
                                        </table>
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
        $(".datepicker").datepicker({
            language: 'th-th',
            format: "MM yyyy",
            startView: "months",
            minViewMode: "months"
        });

        function showName(event) {
            const value = event.target.value;
            document.getElementById("datepicker").innerText = value;
        }
    </script>
@endsection
