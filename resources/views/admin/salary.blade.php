@extends('layouts.main_admin')
{{-- css --}}
{{-- js --}}
@section('head')
    <title>จัดการเงินเดือน</title>
    <style>
        .error {
            color: red !important;
            font-style: italic;
            border-color: red !important;
        }

        h4,
        .h4 {
            font-family: 'Kanit', sans-serif !important;
            font-weight: 400 !important;

        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="app-content content m-dis">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="container-fluid mt-2">
                    {{-- start form --}}
                    <div class="row mb-2">
                        <div class="col-sm-6 ">
                            <div>
                                <h1 class="m-0" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555;">
                                    <img src="{{ asset('images/dollar.png') }}" alt="" class="mr-1"
                                        style="height: 53px;
                                        width: 54px;">
                                    จัดการเงินเดือน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <!-- Modal show-->
                        {{-- <div class="modal fade text-left" id="inlineFormCorrect" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg "
                                role="document">
                                <div class="modal-content" style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33" style="color: #164176;"><i
                                                class="feather icon-edit mr-1"
                                                style="font-size: 1.3rem;"></i>แก้ไขการจัดการเงินเดือน</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('update.salary') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label
                                                        style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;">ชื่อพนักงาน
                                                        : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="ชื่อพนักงาน"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label
                                                        style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;">ช่องทางการรับชำระ
                                                        : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="ช่องทางการรับชำระ"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label
                                                        style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;">เงินเดือน
                                                        : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="เงินเดือน" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label
                                                        style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;">ประกันสังคม
                                                        : </label>
                                                    <div class="form-group">
                                                        <input type="text" name="tax" placeholder="ประกันสังคม"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label
                                                        style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;">การปรับลดเงินเดือน
                                                        : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="การปรับลดเงินเดือน"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label
                                                        style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;">ยอดจ่ายสุทธิ
                                                        : </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="ยอดจ่ายสุทธิ"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label
                                                        style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;">หมายเหตุการปรับลดเงินเดือน
                                                        : </label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="" id="" cols="30" rows="4"
                                                            placeholder="หมายเหตุการปรับลดเงินเดือน"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer"style="justify-content: center;">
                                            <button type="submit" class="btn btn-outline round mr-1 mb-1" type="submit"
                                                style="background-color: #164176;color: #fff;">ยืนยัน
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary round mr-1 mb-1"
                                                data-dismiss="modal" aria-label="Close"> ยกเลิก
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                        <!--End Modal show-->
                        <!-- Modal -->
                        <div class="modal fade" id="inlineFormCorrect" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle"
                                            style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1.3rem;color:#164175">
                                            การจัดการเงินเดือน</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="frmMain" action="{{ route('update.salary') }}" method="POST"
                                            id="salary">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="text" name="id" value=""
                                                        id="salary-id"class="form-control" hidden>
                                                    <div class="col-lg-6 col-sm-6 ">
                                                        <h6
                                                            style="color: #5C5C5C;font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;">
                                                            ชื่อ - นามสกุล <input type="text" class="form-control"
                                                                style="border: 0px;background-color: white;margin-left: -10px;font-size: 20px;"
                                                                name="fullname" id="salary-fullname" readonly></h6>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6">
                                                        <h6 class="text-right"
                                                            style="color: #5C5C5C;font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;">
                                                            เงินเดือนสุทธิ
                                                            <input type="text" class="form-control"
                                                                style="border: 0px;text-align: end;background-color: white;font-size: 20px;"name="salary"
                                                                id="salary-salary_show" readonly>
                                                            <input type="text" id="salary-salary" hidden>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <br>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;color:#525252;">ประกันสังคม
                                                        </label>
                                                        <div class="row">
                                                            <div class="col-lg-9 col-sm-10">
                                                                <div class="form-group">

                                                                    <input type="text"
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:500;"
                                                                        placeholder="ประกันสังคม" class="form-control"
                                                                        onkeyup="fncSum();" id="salary-tax" name="tax"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                                                    {{-- <input type="text" id="test_sala" value=""> --}}
                                                                </div>
                                                            </div>
                                                            <h4 style="margin-top: 7px;">%</h4>
                                                        </div>

                                                    </div>
                                                    <div class="col-4 text-right mt-2">
                                                        <p
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1.3rem;color: red;">
                                                            <input
                                                                type="text"style="margin-top: -5px; color:red; border: 0px;background-color: white;font-size: 20px;text-align: end;"
                                                                name="taxfall" class="form-control"
                                                                @if ($showsalary || $showsalary) @foreach ($showsalary as $lastatu)
                                                                 @if ($lastatu->id)
                                                                  value="{{ $lastatu->id }}" @endif
                                                                @endforeach
                                                            id="taxfall" placeholder="เงินค่าประกันสังคม" readonly>
                                                            @endif
                                                        </p>
                                                        {{-- @php
                                                            dd($lastatu->taxfall);
                                                        @endphp --}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;color:#525252;">ลาเกิน
                                                        </label>
                                                        <div class="row">
                                                            <div class="col-lg-9 col-sm-10">
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:500;"
                                                                        placeholder="ลาเกิน" class="form-control"
                                                                        onkeyup="fncSum();" name="leave_much"
                                                                        id="salary-leave_much" class="form-control"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                </div>
                                                            </div>
                                                            <h4 style="margin-top: 7px;">วัน</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-right mt-2">
                                                        <p
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1.3rem;color: red;">
                                                            <input
                                                                type="text"style="margin-top: -5px; color:red; border: 0px;background-color: white;font-size: 20px;text-align: end;"
                                                                name="leave_muchfall" class="form-control" value=""
                                                                id="leave_muchfall" placeholder="เงินที่ถูกหัก" readonly>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;color:#525252;">มาสาย
                                                        </label>
                                                        <div class="row">
                                                            <div class="col-lg-9 col-sm-10">
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:500;"
                                                                        placeholder="มาสาย" onkeyup="fncSum();"
                                                                        id="salary-work_late" name="work_late"
                                                                        class="form-control"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                </div>
                                                            </div>
                                                            <h4 style="margin-top: 7px;">นาที</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-right mt-2">
                                                        <p
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1.3rem;color: red;">
                                                            <input
                                                                type="text"style="margin-top: -5px; color:red; border: 0px;background-color: white;font-size: 20px;text-align: end;"
                                                                name="work_latefall" class="form-control" value=""
                                                                id="work_latefall" placeholder="เงินที่ถูกหัก" readonly>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;color:#525252;">ขาด
                                                        </label>
                                                        <div class="row">
                                                            <div class="col-lg-9 col-sm-10">
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:500;"
                                                                        placeholder="ขาด" name="not_work"
                                                                        onkeyup="fncSum();" class="form-control"
                                                                        id="salary-not_work"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                </div>
                                                            </div>
                                                            <h4 style="margin-top: 7px;">วัน</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-right mt-2">
                                                        <p
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1.3rem;color: red;">
                                                            <input
                                                                type="text"style="margin-top: -5px; color:red; border: 0px;background-color: white;font-size: 20px;
                                                        text-align: end;"
                                                                name="not_workfall" class="form-control" value=""
                                                                id="not_workfall" placeholder="เงินที่ถูกหัก" readonly>
                                                        </p>
                                                        <input type="text" name="sumdown" id="sumdown_show" hidden>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; font-size: 1rem;color:#525252;">หมายเหตุการปรับลดเงินเดือน
                                                        </label>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="note" id="" cols="30" rows="4"
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:500;" placeholder="หมายเหตุการปรับลดเงินเดือน"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 ">
                                                        <h2
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500; text-align: end;margin-top: 4px; color:#5C5C5C">
                                                            ยอดจ่ายสุทธิ :</h2>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 " style="margin-left: -25px">
                                                        <h2 style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                                            <input type="text" class="form-control" id="amount_sum"
                                                                name="amount" placeholder="ยอดเงินสุทธิ"
                                                                style="border: 0px;background-color: white;font-size: 1.7rem;margin-top: -8px;"
                                                                readonly>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"style="justify-content: center;">
                                                <button type="submit" class="btn btn-outline round mr-1 mb-1"
                                                    type="submit"
                                                    style="font-family: 'Kanit', sans-serif; font-weight:500;background-color: #164176;color: #fff;">ยืนยัน
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary round mr-1 mb-1"
                                                    style="font-family: 'Kanit', sans-serif; font-weight:500;"
                                                    data-dismiss="modal" aria-label="Close"> ยกเลิก
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--End Modal show-->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts">
                        <div style="font-family: 'Kanit', sans-serif; font-weight:400;">
                            <div class="card">
                                <div class="card-content">
                                    <form action="" id="salaryvalidator" novalidate>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-2 col-sm-">
                                                    <label for="email-id-icon"
                                                        style="font-size: 16px;color:#525252;">วันที่เริ่มต้น</label>
                                                </div>
                                                <div class="col-lg-3 col-sm-5">
                                                    <div class="form-group">
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type='text' class="form-control fromDate "
                                                                name="roundstart" autocomplete="off"
                                                                @if (!empty($lastatus)) value="{{ $lastatus->rlstatus == 0 ? $lastatus->roundstart : '' }}" @endif
                                                                id="roundstart" />
                                                            <div class="form-control-position">
                                                                <i class="ficon feather icon-calendar"></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="col-lg-7 col-sm-7">

                                                    @if (empty($lastatus))
                                                        <div class="d-flex justify-content-end mr-2">
                                                            <button type="button" class="btn btn-primary text-white px-5"
                                                                style="font-size: 18px; border-radius: 23px;background-color: #164175 !important;"
                                                                onclick="salary();">
                                                                {{-- <a href="{{ url('store-salary') }}"style="color: #fff;" >
                                                                เพิ่มรอบ </a> --}}
                                                                เพิ่มรอบ
                                                            </button>
                                                        </div>
                                                    @else
                                                        @if ($lastatus->rlstatus == '0')
                                                            <div class="form-group">
                                                                <input type="text" name="id" value=""
                                                                    id="round-id" placeholder="" class="form-control"
                                                                    hidden>
                                                            </div>
                                                            <div class="d-flex justify-content-end mr-2">
                                                                <button type="button"
                                                                    onclick="cutAround(1,{{ $lastatus->id }})"
                                                                    class="btn btn-primary text-white  mr-1"
                                                                    style="font-size: 18px; border-radius: 23px;background-color: #164175 !important;">
                                                                    {{-- <a href="{{ url('store-update') }}" style="color: #fff;"></a> --}}
                                                                    ตัดรอบเงินเดือน </button>
                                                                <button type="button"
                                                                    onclick="cancel(2,{{ $lastatus->id }})"
                                                                    class="btn btn-outline-secondary round"
                                                                    style="font-size: 18px; border-radius: 23px;color: #595858;">
                                                                    ยกเลิก </button>
                                                            </div>
                                                        @elseif ($lastatus->rlstatus == '2')
                                                            <div class="d-flex justify-content-end mr-2">
                                                                <button type="submit"
                                                                    class="btn btn-primary text-white px-5"
                                                                    style="font-size: 18px; border-radius: 23px;background-color: #164175 !important;"
                                                                    onclick="salary();">
                                                                    {{-- <a href="{{ url('store-salary') }}"style="color: #fff;" >
                                                                    เพิ่มรอบ </a> --}}
                                                                    เพิ่มรอบ
                                                                </button>
                                                            </div>
                                                        @else
                                                            <div class="d-flex justify-content-end mr-2">
                                                                <button type="submit"
                                                                    class="btn btn-primary text-white px-5"
                                                                    style="font-size: 18px; border-radius: 23px;background-color: #164175 !important;"
                                                                    onclick="salary();">
                                                                    {{-- <a href="{{ url('store-salary') }}"style="color: #fff;" >
                                                                        เพิ่มรอบ </a> --}}
                                                                    เพิ่มรอบ
                                                                </button>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-sm-">
                                                    <label for="email-id-icon"
                                                        style="font-size: 16px;color:#525252;">วันที่สิ้นสุด</label>
                                                </div>
                                                <div class="col-lg-3 col-sm-5">
                                                    <div class="form-group">
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type='text' class="form-control toDate"
                                                                autocomplete="off"
                                                                @if (!empty($lastatus)) value="{{ $lastatus->rlstatus == 0 ? $lastatus->roundend : '' }}" @endif
                                                                name="roundend" id="roundend" />
                                                            <div class="form-control-position">
                                                                <i class="ficon feather icon-calendar"></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-sm-7">
                                                    <div class="d-flex justify-content-end mr-2">
                                                        <div>
                                                            <div style="text-align: end;">
                                                                {{-- border-right: solid --}}
                                                                <h3
                                                                    style="color: #5C5C5C;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                                    ยอดรวมเงินเดือน</h3>
                                                                <h1
                                                                    style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                                                    {{ number_format($sum_salary, 2) }}</h1>
                                                            </div>
                                                        </div>
                                                        <div style="border-right: solid;margin: 10px"></div>
                                                        <div>
                                                            <h3
                                                                style="color: #5C5C5C;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                                ยอดจ่ายสุทธิ</h3>
                                                            <h1
                                                                style="color: #164176;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                                {{ number_format($amount_salary, 2) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-2 col-sm-">
                                                    <label for="email-id-icon"
                                                        style="font-size: 16px;color:#525252;">วันที่ชำระ</label>
                                                </div>
                                                <div class="col-lg-3 col-sm-5">
                                                    <div class="form-group">
                                                        <fieldset
                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                            <input type='text' class="form-control toDatepay"
                                                                autocomplete="off" name="rounddate"
                                                                @if (!empty($lastatus)) value="{{ $lastatus->rlstatus == 0 ? $lastatus->rounddate : '' }}" @endif
                                                                id="rounddate" />
                                                            <div class="form-control-position">
                                                                <i class="ficon feather icon-calendar"></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    <div class="tab-content ">
                                        <!-- Tab panes1 -->
                                        <div class="tab-pane active" id="home-fill" role="tabpanel"
                                            aria-labelledby="home-tab-fill">
                                            <div class="card-content">
                                                <div class="table-responsive mt-1 dataTables_scroll"
                                                    style="overflow-x: hidden;">
                                                    <section id="basic-datatable">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-content">
                                                                        <div class="card-body card-dashboard">
                                                                            @if (!empty($lastatus))
                                                                                @if ($lastatus->rlstatus !== '1' && $lastatus->rlstatus !== '2')
                                                                                    <div class="table-responsive  ">
                                                                                        <table
                                                                                            class="table zero-configuration "
                                                                                            style="white-space: nowrap;border: 0px solid !important;">
                                                                                            <thead class=" ">
                                                                                                <tr
                                                                                                    class="dataTables_scroll">

                                                                                                    <th
                                                                                                        style="font-size: 1rem;border-radius: 15px 0px
                                                                                                    0px 0px;">
                                                                                                        ลำดับ

                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ชื่อ -
                                                                                                        นามสกุล
                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ช่องทางรับชำระ</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        เงินเดือน
                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ปรับลด
                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ยอดจ่ายสุทธิ
                                                                                                    </th>
                                                                                                    <th
                                                                                                        style=" font-size: 1rem;border-radius: 0px 15px 0px 0px;">
                                                                                                        สถานะ
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @php
                                                                                                    $i = 0;
                                                                                                @endphp
                                                                                                @foreach ($showsalary as $show_user)
                                                                                                    <tr>
                                                                                                        <td>{{ ++$i }}
                                                                                                        </td>
                                                                                                        <td>{{ $show_user->fullname }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            @if ($show_user->payment == 1)
                                                                                                                ธนาคารกรุงไทย
                                                                                                            @elseif($show_user->payment == 2)
                                                                                                                ธนาคารกรุงเทพ
                                                                                                            @elseif($show_user->payment == 3)
                                                                                                                ธนาคารกรุงศรีอยุธยา
                                                                                                            @elseif($show_user->payment == 4)
                                                                                                                ธนาคารกสิกรไทย
                                                                                                            @elseif($show_user->payment == 5)
                                                                                                                ธนาคารไทยพาณิชย์
                                                                                                            @elseif($show_user->payment == 6)
                                                                                                                ธนาคารออมสิน
                                                                                                            @elseif($show_user->payment == 7)
                                                                                                                ธนาคารทหารไทยธนชาต
                                                                                                            @elseif($show_user->payment == 8)
                                                                                                                ธนาคารซีไอเอ็มบี
                                                                                                            @endif

                                                                                                        </td>
                                                                                                        <td>{{ number_format($show_user->salary) }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{ number_format($show_user->sumdown, 2) }}
                                                                                                        </td>
                                                                                                        <td>{{ number_format($show_user->salary - $show_user->sumdown, 2) }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="row"
                                                                                                                style="margin-top: 10px;">
                                                                                                                <div
                                                                                                                    class="btn-group">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        class="btn btn-white"
                                                                                                                        style="background-color: #FFD027 !important;height: 25px;width: 30px;padding: 0;border-radius: 5px;color:white"
                                                                                                                        onclick="getDataSalary('{{ $show_user->id }}')"
                                                                                                                        data-toggle="modal"
                                                                                                                        aria-hidden="true"
                                                                                                                        data-target="#inlineFormCorrect">
                                                                                                                        <i class="feather icon-edit"
                                                                                                                            style="margin-left: 3px; margin-right: 0px">&nbsp;</i>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <br>
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    class="btn "
                                                                                                                    style="background-color: #95DDFC;height: 25px;width: 30px;padding: 0; margin-left: 5px;">
                                                                                                                    <a
                                                                                                                        href="{{ route('export', ['id' => $show_user->id]) }}">
                                                                                                                        <i class="fa fa-file-pdf-o"
                                                                                                                            style="color: #164176;"></i>
                                                                                                                    </a>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="table-responsive  ">
                                                                                        <table
                                                                                            class="table zero-configuration "
                                                                                            style="white-space: nowrap;border: 0px solid !important;">
                                                                                            <thead class=" ">
                                                                                                <tr
                                                                                                    class="dataTables_scroll">

                                                                                                    <th
                                                                                                        style="font-size: 1rem;border-radius: 15px 0px0px 0px;">
                                                                                                        ลำดับ

                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        รอบเดือนที่
                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        สถานะ</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ยอดรวมที่หัก
                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ยอดจ่ายสุทธิ
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @php
                                                                                                    $i = 0;
                                                                                                @endphp
                                                                                                @foreach ($roundhistory as $history)
                                                                                                    <tr>
                                                                                                        <td>{{ ++$i }}
                                                                                                        </td>
                                                                                                        <td>{{ $history->rlname }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            @if ($history->rlstatus == 1)
                                                                                                                จ่ายเรียบร้อย
                                                                                                            @elseif($history->rlstatus == 2)
                                                                                                                ยกเลิก
                                                                                                            @endif
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{ $history->round_salarydown }}
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            {{$history->round_salary}}

                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                @endif
                                                                            @endif
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function cancel(params, id) {
            // console.log(id);
            $.ajax({
                type: "post",
                url: "{{ route('update.roundsalary') }}",
                data: {
                    _token: '{!! csrf_token() !!}',
                    id: id,
                    rlstatus: params,
                },
                dataType: "json",
                success: function(response) {
                    location.reload();
                }
            });
        }

        function cutAround(params, id) {
            var url = "{{ route('sendMail', ':id') }}";
            url = url.replace(":id", id);
            $('#loader').show();
            $('.m-dis').addClass('disablediv');
            $.ajax({
                type: "post",
                url: url,
                success: function(response) {
                    if (response.success === true) {
                        // $('#loading').hide();
                        window.location.reload();
                    }
                }
            });

        }
    </script>
    <script type="text/javascript">
        function getDataRound(id) {
            console.log(id)
            var url = "{{ route('roundsalary.show', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data) {
                console.log(data)
                $('#round-id').val(data.id);
                $('#round-rlstatus').val(data.rlstatus);
            })
        }
    </script>
    <script language="JavaScript">
        function preview() {
            cusImg.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('cusImgFile').value = null;
            cusImg.src = "";
        }

        function fncSum() {
            /////ประกันสังคม
            let salary = $('#salary-salary').val();
            let tax = document.frmMain.tax.value
            if (tax === '' || tax === null) {
                tax = 0
            }
            // console.log(document.frmMain.tax.value);
            if (salary <= 15000) {
                result = (parseFloat(tax) * parseFloat(salary)) / 100;
            } else {
                result = (parseFloat(tax) * parseFloat(15000)) / 100;
            }
            // if (result == 'Infinity' || result == '-Infinity' || isNaN(result)) {
            //     result = 0
            // }
            $('#taxfall').val(result.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            console.log($('#salary-salary').val());
            console.log(result.toFixed(2));

            //////////เข้างานสาย
            let work_late = document.frmMain.work_late.value
            if (work_late === '' || work_late === null) {
                work_late = 0
            }
            let hour = 1;
            if (hour === '' || hour === null) {
                hour = 0
            }
            let late = (parseFloat(work_late) * parseFloat(hour))
            if (late == 'Infinity' || late == '-Infinity' || isNaN(late)) {
                late = 0
            }
            $('#work_latefall').val(late.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            // console.log(late.toFixed(2));
            ////////// ลาเกิน
            let leave_much = document.frmMain.leave_much.value
            if (leave_much === '' || leave_much === null) {
                leave_much = 0
            }
            // console.log(salary);
            let salary_much = (parseFloat(salary) / 20)
            let much = ((parseFloat(leave_much) * parseFloat(salary_much)))
            if (much == 'Infinity' || much == '-Infinity' || isNaN(much)) {
                much = 0
            }
            $('#leave_muchfall').val(much.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            // console.log(much.toFixed(2));
            ////////// ขาดงาน
            let not_work = document.frmMain.not_work.value
            if (not_work === '' || not_work === null) {
                not_work = 0
            }
            let salary_not = (parseFloat(salary) / 20)
            // console.log(salary_not);
            let nott = ((parseFloat(not_work) * parseFloat(salary_not)))
            if (nott == 'Infinity' || nott == '-Infinity' || isNaN(nott)) {
                nott = 0
            }
            $('#not_workfall').val(nott.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            // console.log(nott.toFixed(2));
            let sumdown = (nott + much + late + result)
            $('#sumdown_show').val(sumdown);
            let amount = (salary - sumdown)
            $('#amount_sumhead').val(amount.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            $('#amount_sum').val(amount.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            $('#amount_sumtable').val(amount.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        }
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
            $(".toDatepay").datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                autoclose: true,
            }).on('changeDate', function(selected) {
                var minDate = new Date(selected.date.valueOf());
                $('.fromDate').datepicker('setEndDate', minDate);
            });
        });

        var from_$input = $('.foemDate').datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                autoclose: true,
            }),
            from_picker = from_$input.datepicker('picker')

        var to_$input = $('.toDate').datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                autoclose: true,
            }),
            to_picker = to_$input.datepicker('picker')

        // Check if there’s a “from” or “to” date to start with.
        if (from_picker.get('value')) {
            console.log("asdasdsad")
            var today = new Date($('.foemDate').val());
            today.setDate(today.getDate() + 1)
            to_picker.set('min', today)
        }
        if (to_picker.get('value')) {
            var today = new Date($('.toDate').val());
            today.setDate(today.getDate() - 1)
            from_picker.set('max', today)


        }
        // When something is selected, update the “from” and “to” limits.
        from_picker.on('set', function(event) {

            if (event.select) {
                var today = new Date($('.foemDate').val());
                today.setDate(today.getDate() + 1)
                to_picker.set('min', today)
            } else if ('clear' in event) {

                to_picker.set('min', false)
            }

        })

        to_picker.on('set', function(event) {
            if (event.select) {
                var today = new Date($('.toDate').val());
                today.setDate(today.getDate() - 1)
                from_picker.set('max', today)
            } else if ('clear' in event) {

                from_picker.set('max', false)
            }
        })
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
        var $registrationForm = $('#salaryvalidator');
        if ($registrationForm.length) {
            $registrationForm.validate({
                rules: {
                    tax: {
                        required: true
                    },
                    roundstart: {
                        required: true
                    },
                    roundend: {
                        required: true
                    },
                    rounddate: {
                        required: true
                    },
                },
                messages: {
                    tax: {
                        required: 'ประกันสังคม!'
                    },
                    roundstart: {
                        required: 'เลือกวันที่เริ่มต้น!'
                    },
                    roundend: {
                        required: 'เลือกวันที่สิ้นสุด!'
                    },
                    rounddate: {
                        required: 'เลือกวันที่ชำระ!'
                    },
                },
                // submitHandler: function(form) {
                //     $('.loading_submit').css("display", "block");
                //     $('#sumbit_create').prop('disabled', true)
                //     form.submit()
                // }
            });
        }
    </script>
    <script type="text/javascript">
        function getDataSalary(id) {
            var url = "{{ route('salary.show', ':id') }}";
            let _token = $('meta[name="csrf-token"]').attr('content');
            url = url.replace(':id', id);
            $.get(url, function(data) {
                console.log(data)
                $('#inlineFormCorrect').modal('show');
                $('#salary-id').val(data.id);
                $('#salary-fullname').val(data.fullname);
                $('#salary-payment').val(data.payment);
                $('#salary-salary').val(data.salary);
                $('#salary-salary_show').val(data.salary.toString().replace(/\D/g, "").replace(
                    /\B(?=(\d{3})+(?!\d))/g, ","));
                console.log(data.tax);
                $('#salary-tax').val(data.tax);
                $('#taxfall').val(data.taxfall);
                $('#salary-leave_much').val(data.leave_much);
                $('#leave_muchfall').val(data.leave_muchfall);
                $('#salary-work_late').val(data.work_late);
                $('#work_latefall').val(data.work_latefall);
                $('#salary-not_work').val(data.not_work);
                $('#not_workfall').val(data.not_workfall);
                $('#salary-amount').val(data.amount);
                $('#salary-note').val(data.note)
                $('#salary-roundsalaries_id').val(data.roundsalaries_id);
            })
            // $.ajax({
            //     type: "GET",
            //     dataType: "json",
            //     url: "{{ route('updatestatus.department') }}",
            //     data: {
            //         _token: _token,
            //         id: id,
            //         dpstatus: dpstatus
            //     },
            //     success: function(result) {}
            // });
        }
        // ('#close_modal').click(function(){
        //     $('#exampleModalCenter').modal('hide');
        // })
    </script>
    <script>
        function salary() {
            let roundstart = document.getElementById('roundstart').value;
            let rounddate = document.getElementById('rounddate').value;
            let roundend = document.getElementById('roundend').value;
            let url = "{{ route('store.salary') }}";
            $.get(url + "/?roundstart=" + roundstart + "&rounddate=" + rounddate + "&roundend=" + roundend, function(data) {
                console.log(data);
                window.location.reload()
            });

        }
    </script>
@endsection
