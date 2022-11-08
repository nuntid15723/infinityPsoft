@extends('layouts.main_admin')
@section('style')
@endsection
@section('head')
    <title>
        Stock</title>
    <style>
        .dropdown .dropdown-menu {
            width: 160px;
            padding: -0.5rem 0;
            /* margin: -0.5rem 0 0; */
        }

        .table-hover-animation tbody tr:hover {
            transform: none !important;
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
                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176; ">
                                    รายการทรัพย์สิน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-sm-6" style="margin-top: -55px;">
                            <div style="text-align: end;">
                                <button type="button" class="btn btn-primary text-white px-5"
                                    style="font-size: 18px; border-radius: 23px;background-color: #164175 !important;font-family: 'Kanit', sans-serif; font-weight:500;"><i
                                        class="fa fa-plus mr-1" style="font-size: 1.3rem;"></i>
                                    <a href="{{ url('/addEmployee1') }}"style="color: #fff;">
                                        เพิ่มทรัพย์สิน </a></button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="modal-size-lg mr-1 mb-1 d-inline-block">
                                {{-- <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                                    data-target="#large">
                                    Large Modal
                                </button> --}}

                                <div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel17" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel17">สถานะทรัพย์สิน</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body"style="padding: 2rem;">
                                                <div style="text-align: -moz-center;">
                                                    <img src="{{ asset('image.png') }}" width="200" height="200"
                                                        class="img img-responsive">
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-6">รหัสทรัพย์สิน<input type='text'
                                                            class="form-control" /></div>
                                                    <div class="col-6">ชื่อทรัพย์สิน <input type='text'
                                                            class="form-control" /></div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-6">ประเภททรัพย์สิน<input type='text'
                                                            class="form-control" /></div>
                                                    <div class="col-6">วันที่ซื้อ <div class="form-group">
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
                                                    <div class="col-6">สถานะการใช้งาน
                                                        <input type='text' class="form-control" />
                                                    </div>
                                                    <div class="col-6">ผู้ใช้งาน<input type='text'
                                                            class="form-control" /></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                    style="width: 15%;">ปิด</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- modal --}}
                                <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel160" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary white"
                                                style="
                                            background-color: #164176 !important;">
                                                <h4 class="modal-title" id="myModalLabel160"
                                                    style="font-family: 'Kanit', sans-serif; font-weight:600; color: #fff;">
                                                    ประวัติการส่งซ่อม
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;font-size: 1.3rem;">
                                                            ค่าใช้จ่ายในการซ่อม
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="first-name-id-icon"
                                                                style="font-size: 1.0rem !important;"><b>ชื่อบริษัท</b><span
                                                                    style="color: red">*</span></label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type="first-name" id="first-name-icon"
                                                                    placeholder="" class="form-control" name="name">
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
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;font-size: 1.3rem;">
                                                            วันที่เริ่ม</h5>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="first-name-icon"><b>วันที่เริ่ม</b><span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type='text'
                                                                    class="form-control pickadate"placeholder="เลือกวันที่เริ่มใช้งาน" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="first-name-icon"><b>วันที่สิ้นสุด</b><span
                                                                    style="color: red">*</span>
                                                            </label>
                                                            <fieldset
                                                                class="form-group position-relative has-icon-left input-divider-left">
                                                                <input type='text'
                                                                    class="form-control pickadate"placeholder="เลือกวันที่สิ้นสุด" />
                                                                <div class="form-control-position">
                                                                    <i class="ficon feather icon-calendar"></i>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light"
                                                        data-dismiss="modal">Accept</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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
                                                aria-selected="true"style="font-size: 20px">
                                                แสดงทั้งหมด
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab-fill" data-toggle="tab"
                                                href="#profile-fill" role="tab" aria-controls="profile-fill"
                                                aria-selected="false"style="font-size: 20px">
                                                ใช้งานอยู่
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="messages-tab-fill" data-toggle="tab"
                                                href="#messages-fill" role="tab" aria-controls="messages-fill"
                                                aria-selected="false"style="font-size: 20px">
                                                พักการใช้งาน
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-fill" data-toggle="tab"
                                                href="#settings-fill" role="tab" aria-controls="settings-fill"
                                                aria-selected="false"style="font-size: 20px">
                                                เลิกใช้แล้ว
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content pt-1"
                                        style="font-family: 'Kanit', sans-serif; font-weight:400;">
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
                                                                            <div class="table-responsive  ">
                                                                                <table class="table zero-configuration "
                                                                                    style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                    <thead class="thead-secondary ">
                                                                                        <tr class="dataTables_scroll">
                                                                                            <th
                                                                                                style="border-top-left-radius: 14px;font-size: 1rem;">
                                                                                                รหัสทรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                รูป</th>
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
                                                                                        @foreach ($stock as $stocklist)
                                                                                            <tr>
                                                                                                <td>{{ $stocklist->stid }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div>
                                                                                                        <img class="media-object mr-1"
                                                                                                            img
                                                                                                            src="{{ asset('imgstock/' . $stocklist->stimg) }}"
                                                                                                            alt="Avatar"
                                                                                                            height="100"
                                                                                                            width="100">
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>{{ $stocklist->stdaystart }}
                                                                                                </td>
                                                                                                <td>{{ $stocklist->stname }}
                                                                                                </td>
                                                                                                <td>{{ $stocklist->inventory_name }}
                                                                                                </td>
                                                                                                <td>{{ $stocklist->stprice }}</td>
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
                                                                                                                <a class="dropdown-item "
                                                                                                                    href="#">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        class="btn btn-outline-success waves-effect waves-light"
                                                                                                                        data-toggle="modal"
                                                                                                                        aria-haspopup="true"
                                                                                                                        aria-expanded="false"
                                                                                                                        data-target="#primary"
                                                                                                                        style="width: 118px">
                                                                                                                        ใช้งานอยู่
                                                                                                                    </button></a>
                                                                                                                <a class="dropdown-item "
                                                                                                                    href="#">
                                                                                                                    <button
                                                                                                                        type="button"
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
                                                                                                                        class="dropdown-item"
                                                                                                                        type="button"
                                                                                                                        data-toggle="modal"
                                                                                                                        data-target="#large"
                                                                                                                        style="width: 100%;">
                                                                                                                        รายละเอียด
                                                                                                                    </button>
                                                                                                                    <a class="dropdown-item"
                                                                                                                        href="{{ url('/edit-Inventory',$stocklist->id) }}">แก้ไข</a>
                                                                                                                    <a class="dropdown-item"
                                                                                                                        href="#">ลบ</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                        <tr>
                                                                                            <td>Garrett Winters</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer1.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Tokyo</td>
                                                                                            <td>63</td>
                                                                                            <td>2011/07/25</td>
                                                                                            <td>$170,750</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                    class="dropdown-item"
                                                                                                                    type="button"
                                                                                                                    data-toggle="modal"
                                                                                                                    data-target="#large"
                                                                                                                    style="width: 100%;">
                                                                                                                    รายละเอียด
                                                                                                                </button>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="{{ url('/editInventory') }}">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Ashton Cox</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer1.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>San Francisco</td>
                                                                                            <td>66</td>
                                                                                            <td>2009/01/12</td>
                                                                                            <td>$86,000</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                    class="dropdown-item"
                                                                                                                    type="button"
                                                                                                                    data-toggle="modal"
                                                                                                                    data-target="#large"
                                                                                                                    style="width: 100%;">
                                                                                                                    รายละเอียด
                                                                                                                </button>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="{{ url('/editInventory') }}">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th>Name</th>
                                                                                            <th>Position</th>
                                                                                            <th>Office</th>
                                                                                            <th>Age</th>
                                                                                            <th>Start date</th>
                                                                                            <th>Salary</th>
                                                                                            <th>Salary</th>
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
                                            {{-- <div class="card-content">
                                                <div class="table-responsive mt-1 dataTables_scroll"
                                                    style="overflow-x: hidden;">
                                                    <table class="table table-hover-animation mb-0">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th style="background-color: #164176; width: 100px">
                                                                    รหัสทรัพย์สิน</th>
                                                                <th style="background-color: #164176; text-align: center">
                                                                    รูป</th>
                                                                <th style="background-color: #164176;">วันที่เริ่มใช้งาน
                                                                </th>
                                                                <th style="background-color: #164176;">ชื่อทรัพย์สิน</th>
                                                                <th style="background-color: #164176;">ประเภททรัพย์สิน</th>
                                                                <th style="background-color: #164176;">มูลค่าทรัพย์สิน</th>
                                                                <th
                                                                    style="background-color: #164176; text-align: -moz-center;">
                                                                    สถานะทรัพย์สิน</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>#879985</td>
                                                                <td>
                                                                    <div style="text-align: center"><img
                                                                            class="media-object mr-1"
                                                                            src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                            alt="Avatar" height="100" width="90">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    26/07/2018
                                                                </td>
                                                                <td class="p-1">
                                                                    <ul
                                                                        class="list-unstyled users-list m-0  d-flex align-items-center">


                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Elicia Rieske"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-7.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Julee Rossignol"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-10.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Darcey Nooner"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-8.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td>Anniston, Alabama</td>
                                                                <td>
                                                                    <span>130 km</span>
                                                                    <div class="progress progress-bar-success mt-1 mb-0">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 80%" aria-valuenow="80"
                                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td style="padding: 0;">
                                                                    <div class="d-flex" style="justify-content: end;">
                                                                        <div class="btn-group dropdown">
                                                                            <button type="button"
                                                                                class="btn btn-outline-success dropdown-toggle"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                ใช้งานอยู่
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item " href="#">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-warning"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        style="width: 118px">
                                                                                        พักใช้งาน
                                                                                    </button></a>
                                                                                <a class="dropdown-item " href="#">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-warning"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        style="width: 118px">
                                                                                        พักใช้งาน
                                                                                    </button></a>
                                                                                <a class="dropdown-item " href="#">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-danger"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        style="width: 118px">
                                                                                        เลิกใช้งาน
                                                                                    </button></a>
                                                                            </div>
                                                                            <div class="btn-group">
                                                                                <button class="btn btn-white"
                                                                                    style="background-color: rgb(255, 255, 255)"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <i
                                                                                        class="bi bi-three-dots-vertical"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item"
                                                                                        data-target="#exampleModal"
                                                                                        data-toggle="modal">รายละเอียด
                                                                                    </a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">แก้ไข</a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">ลบ</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>#156897</td>
                                                                <td>
                                                                    <div style="text-align: center"><img
                                                                            class="media-object mr-1"
                                                                            src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                            alt="Avatar" height="100" width="90">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    26/07/2018
                                                                </td>
                                                                <td class="p-1">
                                                                    <ul
                                                                        class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Trina Lynes"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-1.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Lilian Nenez"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-2.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Alberto Glotzbach"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-3.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td>Cordova, Alaska</td>
                                                                <td>
                                                                    <span>234 km</span>
                                                                    <div class="progress progress-bar-warning mt-1 mb-0">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 60%" aria-valuenow="60"
                                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td style="padding: 0;">
                                                                    <div class="d-flex" style="justify-content: end;">
                                                                        <div class="btn-group dropdown">
                                                                            <button type="button"
                                                                                class="btn btn-outline-success dropdown-toggle"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                ใช้งานอยู่
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a href="">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-warning"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        style="width: 118px">
                                                                                        พักใช้งาน
                                                                                    </button></a>
                                                                                <a href="">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-danger"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        style="width: 118px">
                                                                                        เลิกใช้งาน
                                                                                    </button></a>
                                                                            </div>
                                                                            <div class="btn-group">
                                                                                <button class="btn btn-white"
                                                                                    style="background-color: rgb(255, 255, 255)"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <i
                                                                                        class="bi bi-three-dots-vertical"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item"
                                                                                        data-target="#exampleModal"
                                                                                        data-toggle="modal">รายละเอียด
                                                                                    </a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">แก้ไข</a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">ลบ</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>#568975</td>
                                                                <td>
                                                                    <div style="text-align: center"><img
                                                                            class="media-object mr-1"
                                                                            src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                            alt="Avatar" height="100" width="90">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    26/07/2018
                                                                </td>
                                                                <td class="p-1">
                                                                    <ul
                                                                        class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Lai Lewandowski"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-6.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Elicia Rieske"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-7.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Darcey Nooner"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-8.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Julee Rossignol"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-10.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Jeffrey Gerondale"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-9.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td>Florence, Alabama</td>
                                                                <td>
                                                                    <span>168 km</span>
                                                                    <div class="progress progress-bar-success mt-1 mb-0">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 70%" aria-valuenow="70"
                                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td style="padding: 0;">
                                                                    <div class="d-flex" style="justify-content: end;">
                                                                        <div class="btn-group dropdown">
                                                                            <button type="button"
                                                                                class="btn btn-outline-success dropdown-toggle"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                ใช้งานอยู่
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a href="">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-warning"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        style="width: 118px">
                                                                                        พักใช้งาน
                                                                                    </button></a>
                                                                                <a href="">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-danger"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        style="width: 118px">
                                                                                        เลิกใช้งาน
                                                                                    </button></a>
                                                                            </div>
                                                                            <div class="btn-group">
                                                                                <button class="btn btn-white"
                                                                                    style="background-color: rgb(255, 255, 255)"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <i
                                                                                        class="bi bi-three-dots-vertical"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item"
                                                                                        data-target="#exampleModal"
                                                                                        data-toggle="modal">รายละเอียด
                                                                                    </a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">แก้ไข</a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">ลบ</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>#245689</td>
                                                                <td>
                                                                    <div style="text-align: center"><img
                                                                            class="media-object mr-1"
                                                                            src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                            alt="Avatar" height="100" width="90">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    26/07/2018
                                                                </td>

                                                                <td class="p-1">
                                                                    <ul
                                                                        class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Vinnie Mostowy"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                        <li data-toggle="tooltip"
                                                                            data-popup="tooltip-custom"
                                                                            data-placement="bottom"
                                                                            data-original-title="Elicia Rieske"
                                                                            class="avatar pull-up">
                                                                            <img class="media-object rounded-circle"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-7.jpg"
                                                                                alt="Avatar" height="30"
                                                                                width="30">
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td>Clifton, Arizona</td>
                                                                <td>
                                                                    <span>125 km</span>
                                                                    <div class="progress progress-bar-danger mt-1 mb-0">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 95%" aria-valuenow="95"
                                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td style="padding: 0;">
                                                                    <div class="d-flex" style="justify-content: end;">
                                                                        <div class="btn-group dropdown">
                                                                            <button type="button"
                                                                                class="btn btn-outline-success dropdown-toggle"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                ใช้งานอยู่
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a href="">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-warning"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        style="width: 118px">
                                                                                        พักใช้งาน
                                                                                    </button></a>
                                                                                <a href="">
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-danger"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        style="width: 118px">
                                                                                        เลิกใช้งาน
                                                                                    </button></a>
                                                                            </div>
                                                                            <div class="btn-group">
                                                                                <button class="btn btn-white"
                                                                                    style="background-color: rgb(255, 255, 255)"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    <i
                                                                                        class="bi bi-three-dots-vertical"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item"
                                                                                        data-target="#exampleModal"
                                                                                        data-toggle="modal">รายละเอียด
                                                                                    </a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">แก้ไข</a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">ลบ</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> --}}

                                        </div>

                                        <!--End Tab panes1 -->
                                        <!-- Tab panes2 -->
                                        {{-- ใช้งานอยู่ --}}
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
                                                                                                style="border-radius: 15px 0px 0px 0px;font-size: 1rem;">
                                                                                                รหัสทรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem; ">
                                                                                                รูป</th>
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
                                                                                        {{-- modal --}}
                                                                                        <div class="modal fade text-left"
                                                                                            id="primary" tabindex="-1"
                                                                                            role="dialog"
                                                                                            aria-labelledby="myModalLabel160"
                                                                                            style="display: none;"
                                                                                            aria-hidden="true">
                                                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                                                role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div
                                                                                                        class="modal-header bg-primary white">
                                                                                                        <h5 class="modal-title"
                                                                                                            id="myModalLabel160">
                                                                                                            Primary Modal
                                                                                                        </h5>
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="close"
                                                                                                            data-dismiss="modal"
                                                                                                            aria-label="Close">
                                                                                                            <span
                                                                                                                aria-hidden="true">×</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-body">
                                                                                                        Tart lemon drops
                                                                                                        macaroon oat cake
                                                                                                        chocolate toffee
                                                                                                        chocolate bar icing.
                                                                                                        Pudding jelly beans
                                                                                                        carrot cake pastry
                                                                                                        gummies cheesecake
                                                                                                        lollipop. I love
                                                                                                        cookie lollipop cake
                                                                                                        I love sweet
                                                                                                        gummi
                                                                                                        bears cupcake
                                                                                                        dessert.
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="modal-footer">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-primary waves-effect waves-light"
                                                                                                            data-dismiss="modal">Accept</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <tr>
                                                                                            <td>Tiger Nixon</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer2.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Edinburgh</td>
                                                                                            <td>61</td>
                                                                                            <td>2011/04/25</td>
                                                                                            <td>$320,800</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                <a class="dropdown-item"
                                                                                                                    data-target="#exampleModal"
                                                                                                                    data-toggle="modal">รายละเอียด
                                                                                                                </a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Garrett Winters</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer1.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Tokyo</td>
                                                                                            <td>63</td>
                                                                                            <td>2011/07/25</td>
                                                                                            <td>$170,750</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                <a class="dropdown-item"
                                                                                                                    data-target="#exampleModal"
                                                                                                                    data-toggle="modal">รายละเอียด
                                                                                                                </a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Ashton Cox</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer1.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>San Francisco</td>
                                                                                            <td>66</td>
                                                                                            <td>2009/01/12</td>
                                                                                            <td>$86,000</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                <a class="dropdown-item"
                                                                                                                    data-target="#exampleModal"
                                                                                                                    data-toggle="modal">รายละเอียด
                                                                                                                </a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th>Name</th>
                                                                                            <th>Position</th>
                                                                                            <th>Office</th>
                                                                                            <th>Age</th>
                                                                                            <th>Start date</th>
                                                                                            <th>Salary</th>
                                                                                            <th>Salary</th>
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
                                        {{-- พักการใช้งาน --}}
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
                                                                                                style="border-radius: 15px 0px 0px 0px;font-size: 1rem;">
                                                                                                รหัสทรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                รูป</th>
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

                                                                                        <tr>
                                                                                            <td>Tiger Nixon</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer1.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Edinburgh</td>
                                                                                            <td>61</td>
                                                                                            <td>2011/04/25</td>
                                                                                            <td>$320,800</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    class="btn btn-outline-success"
                                                                                                                    data-toggle="modal"
                                                                                                                    aria-haspopup="true"
                                                                                                                    aria-expanded="false"
                                                                                                                    data-target="#primary"
                                                                                                                    style="width: 118px">
                                                                                                                    ใช้งานอยู่
                                                                                                                </button></a>
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                <a class="dropdown-item"
                                                                                                                    data-target="#exampleModal"
                                                                                                                    data-toggle="modal">รายละเอียด
                                                                                                                </a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Garrett Winters</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer1.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Tokyo</td>
                                                                                            <td>63</td>
                                                                                            <td>2011/07/25</td>
                                                                                            <td>$170,750</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                <a class="dropdown-item"
                                                                                                                    data-target="#exampleModal"
                                                                                                                    data-toggle="modal">รายละเอียด
                                                                                                                </a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Ashton Cox</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer2.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>San Francisco</td>
                                                                                            <td>66</td>
                                                                                            <td>2009/01/12</td>
                                                                                            <td>$86,000</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                <a class="dropdown-item"
                                                                                                                    data-target="#exampleModal"
                                                                                                                    data-toggle="modal">รายละเอียด
                                                                                                                </a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th>Name</th>
                                                                                            <th>Position</th>
                                                                                            <th>Office</th>
                                                                                            <th>Age</th>
                                                                                            <th>Start date</th>
                                                                                            <th>Salary</th>
                                                                                            <th>Salary</th>
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
                                        <!--End Tab panes3 -->
                                        <!-- Tab panes4 -->
                                        {{-- เลิกใช้งาน --}}
                                        <div class="tab-pane" id="settings-fill" role="tabpanel"
                                            aria-labelledby="settings-tab-fill">
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
                                                                                    <thead class="thead-secondary">
                                                                                        <tr class="dataTables_scroll">
                                                                                            <th
                                                                                                style="width: 100px; border-radius: 15px 0px 0px 0px;font-size: 1rem;">
                                                                                                รหัสทรัพย์สิน</th>
                                                                                            <th style="font-size: 1rem;">
                                                                                                รูป</th>
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
                                                                                                style="border-radius: 0px 14px 0px 0px;font-size: 1rem;">
                                                                                                <div
                                                                                                    style="text-align: center;">
                                                                                                    สถานะทรัพย์สิน</div>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Tiger Nixon</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer1.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Edinburgh</td>
                                                                                            <td>61</td>
                                                                                            <td>2011/04/25</td>
                                                                                            <td>$320,800</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                <a class="dropdown-item"
                                                                                                                    data-target="#exampleModal"
                                                                                                                    data-toggle="modal">รายละเอียด
                                                                                                                </a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Garrett Winters</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer1.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>Tokyo</td>
                                                                                            <td>63</td>
                                                                                            <td>2011/07/25</td>
                                                                                            <td>$170,750</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                <a class="dropdown-item"
                                                                                                                    data-target="#exampleModal"
                                                                                                                    data-toggle="modal">รายละเอียด
                                                                                                                </a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Ashton Cox</td>
                                                                                            <td>
                                                                                                <div>
                                                                                                    <img class="media-object mr-1"
                                                                                                        img
                                                                                                        src="{{ asset('images/computer2.jpg') }}"
                                                                                                        alt="Avatar"
                                                                                                        height="100"
                                                                                                        width="90">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>San Francisco</td>
                                                                                            <td>66</td>
                                                                                            <td>2009/01/12</td>
                                                                                            <td>$86,000</td>
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
                                                                                                            <a class="dropdown-item "
                                                                                                                href="#">
                                                                                                                <button
                                                                                                                    type="button"
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
                                                                                                                <a class="dropdown-item"
                                                                                                                    data-target="#exampleModal"
                                                                                                                    data-toggle="modal">รายละเอียด
                                                                                                                </a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">แก้ไข</a>
                                                                                                                <a class="dropdown-item"
                                                                                                                    href="#">ลบ</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th>Name</th>
                                                                                            <th>Position</th>
                                                                                            <th>Office</th>
                                                                                            <th>Age</th>
                                                                                            <th>Start date</th>
                                                                                            <th>Salary</th>
                                                                                            <th>Salary</th>
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
                                        <!--End Tab panes4 -->
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
@endsection
