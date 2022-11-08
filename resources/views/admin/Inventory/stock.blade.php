@extends('layouts.main_admin')
@section('style')
@endsection
@section('head')
    <title>รายการทรัพย์สิน</title>
    <style>
        .dropdown .dropdown-menu {
            width: 160px;
            padding: -0.5rem 0;
            /* margin: -0.5rem 0 0; */
        }

        .table-hover-animation tbody tr:hover {
            transform: none !important;

        }

        .table-hover-animation thead th {
            border-top: 0px solid #f8f8f8 !important;
            border-bottom: 0;
        }

        .table-hover-animation {
            background-color: white !important;
        }

        .table-hover-animation tbody tr {
            transition: all 0.25s ease !important;
            background-color: #fff;
        }

        .pt-1,
        .py-1 {
            padding-top: 0rem !important;
            margin-top: -39px;
        }



        div.dataTables_wrapper div.dataTables_filter input {
            font-size: 18px;
        }
    </style>
@endsection

@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="container-fluid mt-2">
                    <div class="row mb-2">
                        <div class="col-sm-6 ">
                            <div style="margin-left: 5px;">
                                <h1 class="m-0"
                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555; ">
                                    <img src="{{ asset('images/boxes1.png') }}" alt="" class="mr-1"
                                        style="height: 55px;
                                width: 58px;">
                                    รายการทรัพย์สิน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-sm-6" style="margin-top: -55px;">
                            {{-- <div style="text-align: end;">
                                <button type="button" class="btn btn-primary text-white px-5"
                                    style="font-size: 18px; border-radius: 15px;background-color: #164175 !important;font-family: 'Kanit', sans-serif; font-weight:500;"><i
                                        class="fa fa-plus mr-1" style="font-size: 1.3rem;"></i>
                                    <a href="{{ url('/addEmployee1') }}"style="color: #fff;">
                                        เพิ่มทรัพย์สิน </a></button>
                            </div> --}}
                            <div style="text-align: end;">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary text-white px-5"
                                    style="font-size: 18px; border-radius: 23px; padding-left: 2rem !important;
                                    padding-right: 2rem !important;background-color: #2E8B57 !important;">
                                    {{-- <img src="{{ asset('images/excel3.png') }}" class="mr-1"
                                        style="box-shadow: 0px 1px 1px #fff;"> --}}
                                        <a href="{{ route('stock.export') }}" style="color: #ffffff"><i
                                            class="bi bi-file-earmark-excel mr-1 "></i>Export</a>
                                    {{-- <i class="bi bi-file-earmark-excel mr-1 "></i>Export</button> --}}
                                </a>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="modal-size-lg mr-1 mb-1 d-inline-block">
                                {{-- <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                                    data-target="#large">
                                    Large Modal
                                </button> --}}
                                {{-- modal --}}
                                <div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel17" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="col-12">
                                                    <ul class="nav nav-tabs justify-content-center"
                                                        style="margin-bottom: 0rem;" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link"
                                                                style="font-family: 'Kanit', sans-serif; font-weight:500;font-size:1.3rem;"
                                                                id="home-tab-center" data-toggle="tab" href="#home-center"
                                                                aria-controls="home-center" role="tab"
                                                                aria-selected="true">สถานะทรัพย์สิน</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link active"
                                                                style="font-family: 'Kanit', sans-serif; font-weight:500;font-size:1.3rem;"
                                                                id="service-tab-center" data-toggle="tab"
                                                                href="#service-center" aria-controls="service-center"
                                                                role="tab" aria-selected="false">ประวัติการส่งซ่อม</a>
                                                        </li>
                                                    </ul>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close" style="margin-top: -45px;">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane" id="home-center" aria-labelledby="home-tab-center"
                                                    role="tabpanel">
                                                    <div class="modal-body">
                                                        <form class="form form-vertical"method="POST">
                                                            <div class="form-body">
                                                                @if (\Session::has('error'))
                                                                    <div id="error" class="text-danger">
                                                                        {!! \Session::get('error') !!}
                                                                    </div>
                                                                @endif
                                                                <input type="text" name="id" value=""
                                                                    id="Inventory-id" class="form-control" hidden>
                                                                <div class="modal-body"style="margin-top: -25px;">
                                                                    <div style="text-align: center;">
                                                                        <img id="Inventory-stimg"
                                                                            name="stimg"src="" width="200"
                                                                            height="200" class="img img-responsive">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6"
                                                                            style="font-family: 'Kanit', sans-serif; font-weight:500;color:#525252;">
                                                                            รหัสทรัพย์สิน
                                                                            <input type='text' name="stId" disabled
                                                                                id="Inventory-stid" class="form-control" />
                                                                        </div>
                                                                        <div class="col-6"
                                                                            style="font-family: 'Kanit', sans-serif; font-weight:500;color:#525252;">
                                                                            ชื่อทรัพย์สิน
                                                                            <input type='text' name="stname" disabled
                                                                                id="Inventory-stname"
                                                                                class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-1">
                                                                        <div class="col-6"
                                                                            style="font-family: 'Kanit', sans-serif; font-weight:500;color:#525252;">
                                                                            ประเภททรัพย์สิน
                                                                            <select class="form-control" disabled
                                                                                name="sttype" id="Inventory-sttype">
                                                                                @foreach ($inventoryList as $val)
                                                                                    <option value="{{ $val->id }}">
                                                                                        {{ $val->stname }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-6"
                                                                            style="font-family: 'Kanit', sans-serif; font-weight:500;color:#525252;">
                                                                            วันที่ซื้อ <div class="form-group">
                                                                                <div
                                                                                    class="position-relative has-icon-right">
                                                                                    <input type='text' disabled
                                                                                        id="Inventory-stdaystart"
                                                                                        name="stdaystart"
                                                                                        class="form-control pickadate" />
                                                                                    <div class="form-control-position">
                                                                                        <i
                                                                                            class="ficon feather icon-calendar"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6"
                                                                            style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                                                            <label for="emtype"
                                                                                style="font-size: 1.0rem !important;color:#525252;">เลือกประเภทผู้ใช้งาน</label>
                                                                            <select class="form-control" disabled
                                                                                name="ststatus" id="Inventory-ststatus">
                                                                                <option value="0">เลิกใช้งาน</option>
                                                                                <option value="1">ใช้งาน</option>
                                                                                <option value="2">พักใช้งาน</option>
                                                                            </select>
                                                                        </div>
                                                                        {{-- <div class="col-6"
                                                                    style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                                                    ผู้ใช้งาน<input type='text' disabled
                                                                        id="Inventory-stusers" class="form-control" />
                                                                </div> --}}
                                                                        <div class="col-6"
                                                                            style="font-family: 'Kanit', sans-serif; font-weight:500;color:#525252;">
                                                                            ผู้ใช้งาน
                                                                            <div class="form-group">
                                                                                {{-- <select class="select2 form-control"
                                                                            value="" disabled id="Inventory-stusers"
                                                                            name="stusers">
                                                                            @foreach ($user as $userlist)
                                                                                <option value="{{ $userlist->id }}">
                                                                                    {{ $userlist->fullname }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select> --}}
                                                                                <select class="form-control" disabled
                                                                                    id="Inventory-stusers">
                                                                                    @foreach ($user as $val)
                                                                                        <option
                                                                                            value="{{ $val->id }}">
                                                                                            {{ $val->fullname }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane active" id="service-center"
                                                    aria-labelledby="service-tab-center" role="tabpanel">
                                                    <div class="card-body" style="margin-top: -21px;">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="card-content"
                                                                style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover-animation mb-0"
                                                                        style="white-space: nowrap;border-radius: 0px 15px 0px 0px;border:0px solid !important; ">
                                                                        <thead class="thead-secondary">
                                                                            <tr>
                                                                                <th
                                                                                    style="border-radius: 15px 0px 0px 0px !important;background-color: #fafafa;">
                                                                                    ลำดับ
                                                                                </th>
                                                                                <th
                                                                                    style="font-size: 1rem;background-color: #fafafa;">
                                                                                    สถานที่ซ่อม
                                                                                </th>
                                                                                <th
                                                                                    style="font-size: 1rem;background-color: #fafafa;">
                                                                                    วันที่เริ่มต้น
                                                                                </th>
                                                                                <th
                                                                                    style="font-size: 1rem;background-color: #fafafa;">
                                                                                    วันที่สิ้นสุด
                                                                                </th>
                                                                                <th
                                                                                    style="font-size: 1rem;background-color: #fafafa;">
                                                                                    ค่าใช้จ่ายในการซ่อม
                                                                                </th>
                                                                                <th
                                                                                    style="font-size: 1rem;border-radius: 0px 15px 0px 0px;background-color: #fafafa">
                                                                                    ผู้บันทึก
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="getDatahistory">
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12" style="text-align: end">
                                                        <button type="button"
                                                            class="btn btn-outline-success round mr-1 mb-1"
                                                            id="confirm-submit" data-dismiss="modal"
                                                            style="font-family: 'Kanit', sans-serif; font-weight:500;background-color: #164176;color: white;border: 1px solid #fff;width: 15%;">ปิด
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}

                                {{-- modal --}}
                                <form action="{{ route('store.history') }}" method="POST" class="form form-vertical"
                                    enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="modal fade text-left" id="history-show" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel160" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-secondary"
                                                    style="background-color: #f8f8f8 !important;">
                                                    <h4 class="modal-title" id="myModalLabel160"
                                                        style="font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;">
                                                        ประวัติการส่งซ่อม
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <input type="text" name="id" value="" hidden
                                                            id="Inventory-id1" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="repair_stid" hidden
                                                            value="repair_stid" id="Inventory-stid1"
                                                            class="form-control">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-">
                                                            <h5
                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                                สถานที่
                                                            </h5>
                                                        </div>
                                                        <div class="col-lg-8 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="first-name-id-icon"
                                                                    style="font-family: 'Kanit', sans-serif; font-weight:400;font-size: 1.0rem !important;color:#525252;">ชื่อสถานที่<span
                                                                        style="color: red">*</span></label>
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                                    <input type="first-name" id="first-name-icon"
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:400"
                                                                        placeholder="ชื่อสถานที่" class="form-control"
                                                                        name="repair_place">
                                                                    <div class="form-control-position">
                                                                        <i class="bi bi-building"></i>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="justify-content: end">
                                                        <div class="col-lg-4 col-sm-">
                                                            <h5
                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                                วันที่เริ่ม</h5>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="first-name-icon"
                                                                    style="font-family: 'Kanit', sans-serif; font-weight:400;font-size: 1.0rem !important;color:#525252;">วันที่เริ่ม<span
                                                                        style="color: red">*</span>
                                                                </label>
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                                    <input type='text' name="repair_start"
                                                                        class="form-control pickadate"
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:400"
                                                                        placeholder="เลือกวันที่เริ่มใช้งาน" />
                                                                    <div class="form-control-position">
                                                                        <i class="ficon feather icon-calendar"></i>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="first-name-icon"
                                                                    style="font-family: 'Kanit', sans-serif; font-weight:400;font-size: 1.0rem !important;color:#525252;">วันที่สิ้นสุด<span
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:500;color: red">*</span>
                                                                </label>
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                                    <input type='text' name="repair_end"
                                                                        class="form-control pickadate"
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:400"
                                                                        placeholder="เลือกวันที่สิ้นสุด" />
                                                                    <div class="form-control-position">
                                                                        <i class="ficon feather icon-calendar"></i>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-">
                                                            <h5
                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                                ค่าใช้จ่ายในการซ่อม
                                                            </h5>
                                                        </div>
                                                        <div class="col-lg-8 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="first-name-id-icon"
                                                                    style="font-family: 'Kanit', sans-serif; font-weight:400;font-size: 1.0rem !important;color:#525252;">ค่าใช้จ่าย<span
                                                                        style="color: red">*</span></label>
                                                                <fieldset
                                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                                    <input type="first-name" id="first-name-icon"
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:400"
                                                                        placeholder="" class="form-control"
                                                                        name="repair_cost">
                                                                    <div class="form-control-position">
                                                                        <i class="bi bi-wallet"></i>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-">
                                                            <h5
                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size: 1.3rem;">
                                                                ผู้บันทึก
                                                            </h5>
                                                        </div>
                                                        <div class="col-lg-8 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="first-name-id-icon"
                                                                    style="font-family: 'Kanit', sans-serif; font-weight:400;font-size: 1.0rem !important;color:#525252;">ผู้บันทึก<span
                                                                        style="color: red">*</span></label>
                                                                {{-- <input type="first-name" id="first-name-icon"
                                                                        style="font-family: 'Kanit', sans-serif; font-weight:400"
                                                                        placeholder="" class="form-control"
                                                                        name="repair_name"> --}}
                                                                <select class="select2 form-control" value=""
                                                                    id="" name="repair_name">
                                                                    <option>เลือกผู้ใช้งาน</option>
                                                                    @foreach ($user as $userlist)
                                                                        <option value="{{ $userlist->id }}"
                                                                            {{-- @if ($userlist->id == $stock->stusers) {{ 'selected' }} @endif --}}>
                                                                            {{ $userlist->fullname }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-outline round mr-1 mb-1"
                                                            onclick="active1(1)"
                                                            style="font-family: 'Kanit', sans-serif; font-weight:400;background-color: #164176;color: white;">ยืนยัน
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                {{-- end modal --}}
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            {{-- </div> --}}
            <section id="nav-filled">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                            <div class="card-content" style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                <div class="card-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab-fill" data-toggle="tab"
                                                href="#home-fill" role="tab" aria-controls="home-fill"
                                                aria-selected="true" style="font-size: 20px">
                                                ใช้งานอยู่
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab-fill" data-toggle="tab"
                                                href="#profile-fill" role="tab" aria-controls="profile-fill"
                                                aria-selected="false" style="font-size: 20px">
                                                พักการใช้งาน
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="messages-tab-fill" data-toggle="tab"
                                                href="#messages-fill" role="tab" aria-controls="messages-fill"
                                                aria-selected="false" style="font-size: 20px">
                                                เลิกใช้แล้ว
                                            </a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-fill" data-toggle="tab"
                                                href="#settings-fill" role="tab" aria-controls="settings-fill"
                                                aria-selected="false"style="font-size: 20px">

                                            </a>
                                        </li> --}}
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content pt-1"
                                        style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                        <!-- Tab panes1 ใช้งานอยู่ -->
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
                                                                            <div class="table-responsive  ">
                                                                                <table class="table zero-configuration "
                                                                                    style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                    <thead class="thead-secondary ">
                                                                                        <tr class="dataTables_scroll">
                                                                                            <th
                                                                                                style="border-top-left-radius: 14px;font-size: 1rem;">
                                                                                                ลำดับ</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                รหัสทรัพย์สิน</th>
                                                                                            {{-- <th style="font-size: 1rem;">
                                                                                                รูป</th> --}}
                                                                                            <th style="font-size: 1rem;">
                                                                                                วันที่เริ่มใช้งาน
                                                                                            </th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                ชื่อทรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                ประเภททรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                มูลค่าทรัพย์สิน</th>
                                                                                            <th
                                                                                                style="border-top-right-radius: 14px;font-size: 1rem;">
                                                                                                <div
                                                                                                    style="text-align: center;">
                                                                                                    สถานะทรัพย์สิน</div>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @php
                                                                                            $i = 0;
                                                                                        @endphp
                                                                                        @foreach ($stock1 as $stocklist)
                                                                                            <tr>
                                                                                                <td>{{ ++$i }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{ $stocklist->stid }}
                                                                                                </td>
                                                                                                {{-- <td>
                                                                                                    <div>
                                                                                                        <img class="media-object mr-1"
                                                                                                            img
                                                                                                            src="{{ asset('imgstock/' . $stocklist->stimg) }}"
                                                                                                            alt="Avatar"
                                                                                                            height="100"
                                                                                                            width="100">
                                                                                                    </div>
                                                                                                </td> --}}
                                                                                                <td>
                                                                                                    {{-- {{$stocklist->stdaystart}} --}}
                                                                                                    {{ Carbon::parse($stocklist->stdaystart)->thaidate('j M Y') }}
                                                                                                </td>
                                                                                                <td>{{ $stocklist->stname }}
                                                                                                </td>
                                                                                                <td>{{ $stocklist->inventory_name }}
                                                                                                </td>
                                                                                                <td>{{ number_format($stocklist->stprice) }}
                                                                                                </td>
                                                                                                <td style="padding: 0;">
                                                                                                    <div class="d-flex"
                                                                                                        style="justify-content: end;">
                                                                                                        <div
                                                                                                            class="btn-group dropdown">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="btn btn-outline-success dropdown-toggle"
                                                                                                                data-toggle="dropdown"
                                                                                                                aria-haspopup="true"
                                                                                                                aria-expanded="false">
                                                                                                                ใช้งานอยู่
                                                                                                            </button>
                                                                                                            <div
                                                                                                                class="dropdown-menu">
                                                                                                                @include('sweetalert::alert')
                                                                                                                {{-- <a class="dropdown-item "
                                                                                                                    href="#">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        class="btn btn-outline-success waves-effect waves-light"
                                                                                                                        data-toggle="modal"
                                                                                                                        aria-haspopup="true"
                                                                                                                        aria-expanded="false"
                                                                                                                        style="width: 118px">
                                                                                                                        ใช้งานอยู่
                                                                                                                    </button></a> --}}
                                                                                                                <a class="dropdown-item "
                                                                                                                    href="#">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        onclick="breakk(2,{{ $stocklist->id }})"
                                                                                                                        class="btn btn-outline-warning"
                                                                                                                        data-toggle="dropdown"
                                                                                                                        aria-haspopup="true"
                                                                                                                        aria-expanded="false"
                                                                                                                        style="width: 118px">
                                                                                                                        พักใช้งาน
                                                                                                                    </button></a>

                                                                                                                <a class="dropdown-item "
                                                                                                                    href="#">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        onclick="deprecated(0,{{ $stocklist->id }})"
                                                                                                                        class="btn btn-outline-danger"
                                                                                                                        data-toggle="dropdown"
                                                                                                                        aria-haspopup="true"
                                                                                                                        aria-expanded="false"
                                                                                                                        style="width: 118px">
                                                                                                                        เลิกใช้งาน
                                                                                                                    </button></a>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="btn-group">
                                                                                                                <button
                                                                                                                    class="btn btn-white"
                                                                                                                    style="background-color: rgb(255, 255, 255)"
                                                                                                                    data-toggle="dropdown"
                                                                                                                    aria-haspopup="true"
                                                                                                                    aria-expanded="false">
                                                                                                                    <i
                                                                                                                        class="bi bi-three-dots-vertical"></i>
                                                                                                                </button>
                                                                                                                <div
                                                                                                                    class="dropdown-menu">
                                                                                                                    <button
                                                                                                                        class="dropdown-item"type="button"
                                                                                                                        onclick="getData({{ $stocklist->id }})"
                                                                                                                        data-url="{{ route('Inventory.show', $stocklist->stname) }}"
                                                                                                                        {{-- data-toggle="modal"
                                                                                                                        data-target="#large" --}}
                                                                                                                        {{-- data-target="#exampleModalCenter" --}}
                                                                                                                        id="large"
                                                                                                                        style="width: 100%;font-size: 1.1rem;">
                                                                                                                        รายละเอียด
                                                                                                                    </button>
                                                                                                                    <a class="dropdown-item"
                                                                                                                        href="{{ route('edit.Inventory', $stocklist->id) }}"
                                                                                                                        style="font-size: 1.1rem;">แก้ไข</a>
                                                                                                                    {{-- <a class="dropdown-item"
                                                                                                                        href="#"
                                                                                                                        style="font-size: 1rem;">ลบ</a> --}}
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
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
                                        <!--End Tab panes1 -->
                                        <!-- Tab panes2 -->
                                        {{-- พักการใช้งาน --}}
                                        <div class="tab-pane" id="profile-fill" role="tabpanel"
                                            aria-labelledby="profile-tab-fill">
                                            <p>
                                            <div class="card-content">
                                                <div class="table-responsive mt-1"style="overflow-x: hidden;">
                                                    <section id="basic-datatable">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-content">
                                                                        <div class="card-body card-dashboard">
                                                                            <div class="table-responsive  ">
                                                                                <table class="table zero-configuration"
                                                                                    style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                    <thead class="thead-secondary">
                                                                                        <tr class="dataTables_scroll">
                                                                                            <th
                                                                                                style="border-top-left-radius: 14px;font-size: 1rem;">
                                                                                                ลำดับ</th>
                                                                                            <th>รหัสทรัพย์สิน</th>

                                                                                            <th style="font-size: 1rem;">
                                                                                                วันที่เริ่มใช้งาน
                                                                                            </th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                ชื่อทรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                ประเภททรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                มูลค่าทรัพย์สิน</th>
                                                                                            <th
                                                                                                style="border-top-right-radius: 14px;font-size: 1rem;">
                                                                                                <div
                                                                                                    style="text-align: center;">
                                                                                                    สถานะทรัพย์สิน</div>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @php
                                                                                            $i = 0;
                                                                                        @endphp
                                                                                        @foreach ($stock2 as $stocklist)
                                                                                            <tr>
                                                                                                {{-- @php
                                                                                                    dd($stocklist->stid)
                                                                                                @endphp --}}
                                                                                                <td>{{ ++$i }}
                                                                                                </td>
                                                                                                <td>{{ $stocklist->stid }}
                                                                                                    {{-- <a class=""  onclick="getData({{ $stocklist->id }})"
                                                                                                        data-url="{{ route('Inventory.show', $stocklist->stname) }}">
                                                                                                         {{ $stocklist->stid }}</a> --}}

                                                                                                    {{-- {{ $stocklist->stid }} --}}
                                                                                                </td>
                                                                                                {{-- <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('imgstock/' . $stocklist->stimg) }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="100">
                                                                                                </div>
                                                                                            </td> --}}
                                                                                                <td>
                                                                                                    {{ Carbon::parse($stocklist->stdaystart)->thaidate('j M Y') }}
                                                                                                </td>
                                                                                                <td>{{ $stocklist->stname }}
                                                                                                </td>
                                                                                                <td>{{ $stocklist->inventory_name }}
                                                                                                </td>
                                                                                                <td>{{ number_format($stocklist->stprice) }}
                                                                                                    <input type="hidden"
                                                                                                        value={{ $stocklist->stid }}
                                                                                                        id="stid_{{ $stocklist->id }}">
                                                                                                </td>
                                                                                                <td style="padding: 0;">
                                                                                                    <div class="d-flex"
                                                                                                        style="justify-content: end;">
                                                                                                        <div
                                                                                                            class="btn-group dropdown">

                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="btn btn-outline-warning dropdown-toggle"
                                                                                                                data-toggle="dropdown"
                                                                                                                aria-haspopup="true"
                                                                                                                aria-expanded="false">
                                                                                                                พักการใช้งาน
                                                                                                            </button>
                                                                                                            {{-- @php
                                                                                                                dd($stocklist->stid)
                                                                                                            @endphp --}}
                                                                                                            <div
                                                                                                                class="dropdown-menu">
                                                                                                                @include('sweetalert::alert')
                                                                                                                <a class="dropdown-item "
                                                                                                                    href="#">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        class="btn btn-outline-success"
                                                                                                                        data-toggle="modal"
                                                                                                                        aria-haspopup="true"
                                                                                                                        aria-expanded="false"
                                                                                                                        data-target="#history-show"
                                                                                                                        style="width: 118px"
                                                                                                                        {{-- onclick="active(1,{{ $stocklist->id }})" --}}
                                                                                                                        onclick="getDataId({{ $stocklist->id }})">
                                                                                                                        ใช้งานอยู่
                                                                                                                    </button></a>
                                                                                                                <a class="dropdown-item "
                                                                                                                    href="#">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        onclick="deprecated(0,{{ $stocklist->id }})"
                                                                                                                        class="btn btn-outline-danger"
                                                                                                                        data-toggle="dropdown"
                                                                                                                        aria-haspopup="true"
                                                                                                                        aria-expanded="false"
                                                                                                                        style="width: 118px">
                                                                                                                        เลิกใช้งาน
                                                                                                                    </button></a>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="btn-group">
                                                                                                                <button
                                                                                                                    class="btn btn-white"
                                                                                                                    style="background-color: rgb(255, 255, 255)"
                                                                                                                    data-toggle="dropdown"
                                                                                                                    aria-haspopup="true"
                                                                                                                    aria-expanded="false">
                                                                                                                    <i
                                                                                                                        class="bi bi-three-dots-vertical"></i>
                                                                                                                </button>
                                                                                                                <div
                                                                                                                    class="dropdown-menu">
                                                                                                                    <button
                                                                                                                        class="dropdown-item"type="button"
                                                                                                                        onclick="getData({{ $stocklist->id }})"
                                                                                                                        data-url="{{ route('Inventory.show', $stocklist->stname) }}"
                                                                                                                        {{-- data-toggle="modal"
                                                                                                                data-target="#large" --}}
                                                                                                                        {{-- data-target="#exampleModalCenter" --}}
                                                                                                                        id="large"
                                                                                                                        style="width: 100%;font-size: 1.1rem;">
                                                                                                                        รายละเอียด
                                                                                                                    </button>
                                                                                                                    <a class="dropdown-item"
                                                                                                                        href="{{ url('/edit-Inventory', $stocklist->id) }}"
                                                                                                                        style="font-size: 1.1rem;">แก้ไข</a>
                                                                                                                    {{-- <a class="dropdown-item"
                                                                                                                href="#"
                                                                                                                style="font-size: 1rem;">ลบ</a> --}}
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                        <!--End Tab panes2 -->
                                        <!-- Tab panes3 -->
                                        {{-- เลิกใช้งาน --}}
                                        <div class="tab-pane" id="messages-fill" role="tabpanel"
                                            aria-labelledby="messages-tab-fill">
                                            <p>
                                            <div class="card-content">
                                                <div class="table-responsive mt-1 dataTables_scroll">
                                                    <section id="basic-datatable">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-content">
                                                                        <div class="card-body card-dashboard">

                                                                            <div class="table-responsive  ">
                                                                                <table class="table zero-configuration"
                                                                                    style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                    <thead class="thead-secondary ">
                                                                                        <tr class="dataTables_scroll">
                                                                                            <th
                                                                                                style="border-top-left-radius: 14px;font-size: 1rem;">
                                                                                                ลำดับ</th>
                                                                                            <th>รหัสทรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                วันที่เริ่มใช้งาน
                                                                                            </th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                ชื่อทรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                ประเภททรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                มูลค่าทรัพย์สิน</th>
                                                                                            <th
                                                                                                style="border-top-right-radius: 14px;font-size: 1rem;">
                                                                                                <div
                                                                                                    style="text-align: center;">
                                                                                                    สถานะทรัพย์สิน</div>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                        @php
                                                                                            $i = 0;
                                                                                        @endphp
                                                                                        @foreach ($stock0 as $stocklist)
                                                                                            <tr>

                                                                                                <td>{{ ++$i }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a class=""
                                                                                                        onclick="getData({{ $stocklist->id }})"
                                                                                                        data-url="{{ route('Inventory.show', $stocklist->stname) }}">
                                                                                                        {{ $stocklist->stid }}</a>

                                                                                                    {{-- {{ $stocklist->stid }}

                                                                                                </td>
                                                                                                {{-- <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('imgstock/' . $stocklist->stimg) }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="100">
                                                                                                </div>
                                                                                            </td> --}}
                                                                                                <td>
                                                                                                    {{ Carbon::parse($stocklist->stdaystart)->thaidate('j M Y') }}
                                                                                                </td>
                                                                                                <td>{{ $stocklist->stname }}
                                                                                                </td>
                                                                                                <td>{{ $stocklist->inventory_name }}
                                                                                                </td>
                                                                                                <td>{{ number_format($stocklist->stprice) }}
                                                                                                </td>
                                                                                                <td style="padding: 0;">
                                                                                                    <div class="d-flex"
                                                                                                        style="justify-content: end;">
                                                                                                        <div
                                                                                                            class="btn-group dropdown">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="btn btn-outline-danger dropdown-toggle"
                                                                                                                data-toggle="dropdown"
                                                                                                                aria-haspopup="true"
                                                                                                                aria-expanded="false">
                                                                                                                เลิกใช้งาน
                                                                                                            </button>
                                                                                                            <div
                                                                                                                class="dropdown-menu">
                                                                                                                @include('sweetalert::alert')
                                                                                                                <a class="dropdown-item "
                                                                                                                    href="#">

                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        onclick="active(1,{{ $stocklist->id }})"
                                                                                                                        class="btn btn-outline-success"
                                                                                                                        data-toggle="dropdown"
                                                                                                                        aria-haspopup="true"
                                                                                                                        aria-expanded="false"
                                                                                                                        style="width: 118px">
                                                                                                                        ใช้งานอยู่
                                                                                                                    </button></a>
                                                                                                                <a class="dropdown-item "
                                                                                                                    href="#">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        onclick="breakk(2,{{ $stocklist->id }})"
                                                                                                                        class="btn btn-outline-warning"
                                                                                                                        data-toggle="dropdown"
                                                                                                                        aria-haspopup="true"
                                                                                                                        aria-expanded="false"
                                                                                                                        style="width: 118px">
                                                                                                                        พักใช้งาน
                                                                                                                    </button></a>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="btn-group">
                                                                                                                <button
                                                                                                                    class="btn btn-white"
                                                                                                                    style="background-color: rgb(255, 255, 255)"
                                                                                                                    data-toggle="dropdown"
                                                                                                                    aria-haspopup="true"
                                                                                                                    aria-expanded="false">
                                                                                                                    <i
                                                                                                                        class="bi bi-three-dots-vertical"></i>
                                                                                                                </button>
                                                                                                                <div
                                                                                                                    class="dropdown-menu">
                                                                                                                    <button
                                                                                                                        class="dropdown-item"type="button"
                                                                                                                        onclick="getData({{ $stocklist->id }})"
                                                                                                                        data-url="{{ route('Inventory.show', $stocklist->stname) }}"
                                                                                                                        {{-- data-toggle="modal"
                                                                                                                    data-target="#large" --}}
                                                                                                                        {{-- data-target="#exampleModalCenter" --}}
                                                                                                                        id="large"
                                                                                                                        style="width: 100%;font-size: 1.1rem;">
                                                                                                                        รายละเอียด
                                                                                                                    </button>
                                                                                                                    <a class="dropdown-item"
                                                                                                                        href="{{ url('/edit-Inventory', $stocklist->id) }}"
                                                                                                                        style="font-size: 1.1rem;">แก้ไข</a>
                                                                                                                    {{-- <a class="dropdown-item"
                                                                                                                    href="#"
                                                                                                                    style="font-size: 1rem;">ลบ</a> --}}
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            </p>
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
@endsection
@section('script')
    <script type="text/javascript">
        function getData(id) {
            var url = "{{ route('Inventory.show', ':id') }}";
            url = url.replace(':id', id);
            // console.log($data);
            $.get(url, function(data) {
                console.log(data)
                $('#large').modal('show');
                $('#Inventory-id').val(data.data.id);
                $('#Inventory-stid').val(data.data.stid);
                $('#Inventory-stimg').attr("src", "{{ asset('imgstock') }}" + "/" + data.data.stimg);
                $('#Inventory-stname').val(data.data.stname);
                $('#Inventory-sttype').val(data.data.sttype).change();
                $('#Inventory-stdaystart').val(data.data.stdaystart);
                $('#Inventory-stusers').val(data.data.stusers);
                $('#Inventory-ststatus').val(data.data.ststatus);
                $('#getDatahistory').html(data.history)
                console.log(data.id).val('#Inventory-id');

            })
        }

        // ('#close_modal').click(function(){
        //     $('#exampleModalCenter').modal('hide');
        // })
    </script>
    <script type="text/javascript">
        function getDataHistory(id) {
            console.log(id)
            var url = "{{ route('history.show', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data) {
                $('#history-show').modal('show');
                $('#history-id').val(data.id);
                console.log(data);
                $("#history-repair-name").val(data.repair_name);
                $("#history-repair-place").val(data.repair_place);
                $("#history-repair-start").val(data.repair_start);
                $("#history-repair-end").val(data.repair_end);
                $("#history-repair-cost").val(data.repair_cost);
            })
        }

        // ('#close_modal').click(function(){
        //     $('#exampleModalCenter').modal('hide');
        // })
    </script>
    <script>
        function getDataId(id) {
            // console.log($('#stid_'+id).val())
            $('#Inventory-id1').val(id)
            $('#Inventory-stid1').val($('#stid_' + id).val())
        }

        function active1(params) {
            var id = $('#Inventory-id1').val();
            $.ajax({
                type: "post",
                url: "{{ route('update.statusInventory') }}",
                data: {
                    _token: '{!! csrf_token() !!}',
                    id: id,
                    ststatus: params,
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    location.reload();
                }
            });
        }

        function active(params, id) {
            // var id = $('#Inventory-id').val();
            $.ajax({
                type: "post",
                url: "{{ route('update.statusInventory') }}",
                data: {
                    _token: '{!! csrf_token() !!}',
                    id: id,
                    ststatus: params,
                },
                dataType: "json",
                success: function(response) {
                    location.reload();
                }
            });
        }

        function breakk(params, id) {
            console.log(id)
            $.ajax({
                type: "post",
                url: "{{ route('update.statusInventory') }}",
                data: {
                    _token: '{!! csrf_token() !!}',
                    id: id,
                    ststatus: params,
                },
                dataType: "json",
                success: function(response) {
                    location.reload();
                    // console.log(response);
                }
            });

        }

        function deprecated(params, id) {
            $.ajax({
                type: "post",
                url: "{{ route('update.statusInventory') }}",
                data: {
                    _token: '{!! csrf_token() !!}',
                    id: id,
                    ststatus: params,
                },
                dataType: "json",
                success: function(response) {
                    location.reload();
                }
            });

        }
    </script>
@endsection
