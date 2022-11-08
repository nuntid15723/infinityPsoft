@extends('layouts.main_admin')
@section('style')
    <style>
        table.dataTable thead th,
        table.dataTable thead td,
        table.dataTable tfoot th,
        table.dataTable tfoot td {
            font-size: 0.85rem;
            border: 0;
            font-family: 'Kanit', sans-serif;
            font-weight: 600 !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            font-size: 18px;
        }

        .pt-1,
        .py-1 {
            padding-top: 1rem !important;
            margin-top: -39px;
        }
    </style>
@endsection
@section('head')
    <title> Setting</title>
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
                                    บันทึกค่าเสื่อมราคา
                                </h1>
                            </div>
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-sm-6" style="margin-top: -55px;font-family: 'Kanit', sans-serif; font-weight:600;">
                            <div style="text-align: end;">
                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-primary text-white px-5"
                                    style="font-size: 18px; border-radius: 15px; padding-left: 2rem !important;
                                    padding-right: 2rem !important;background-color: #2E8B57 !important;"><img
                                        src="{{ asset('images/excel3.png') }}" class="mr-1"
                                        style="box-shadow: 0px 1px 1px #fff;">
                                    EXPORT
                                    </a>
                                </button> --}}
                                <button type="button" class="btn btn-success mr-1 mb-1 waves-effect waves-light"
                                    style="color: #ffffff;border-radius: 23px;font-size: 1.3rem;background-color: #1d6f42 !important;font-family: 'Kanit', sans-serif;font-weight:400;"><i
                                        class="bi bi-file-earmark-excel"> </i>Export</button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="nav-filled">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-lg-4 col-sm-4">
                                                <h6
                                                    style="margin-left: 25px;font-family: 'Kanit', sans-serif; font-weight:500;color:#5C5C5C">
                                                    ช่วงเวลาที่ต้องการคิดค่าเสื่อม
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-4">
                                                <div class="form-group"style="margin-left: 20px;margin-right: -20px;">
                                                    <fieldset
                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type='text' class="form-control datepicker1" />
                                                        <div class="form-control-position">
                                                            <i class="ficon feather icon-calendar"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6 col-sm-4"style="text-align: end;border-right: 2px solid;">
                                                <h2
                                                    style="color: #5C5C5C;font-size: 1.3rem;font-family: 'Kanit', sans-serif; font-weight:600;">
                                                    <b>ค่าเสื่อมทั้งหมด</b></h2>
                                                <h2 style="color: #164176"><b>180,000</b></h2>
                                            </div>
                                            <div class="col-lg-3 col-sm-4">
                                                <h2
                                                    style="color: #5C5C5C;font-size: 1.4rem;font-family: 'Kanit', sans-serif; font-weight:600;">
                                                    <b>ราคาทรัพย์สินทั้งหมด</b></h2>
                                                <h2 style="color: #164176"><b>180,000</b></h2>
                                            </div> --}}
                                            <div class="col-lg-9 col-sm-8">
                                                <div class="d-flex justify-content-end mr-2">
                                                    <div>
                                                        <div style="text-align: end;">
                                                            {{-- border-right: solid --}}
                                                            <h3
                                                                style="color: #5C5C5C;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                                ยอดรวมเงินเดือน</h3>
                                                            <h1 style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                                                180,000</h1>
                                                        </div>
                                                    </div>
                                                    <div style="border-right: solid;margin: 10px"></div>
                                                    <div>
                                                        <h3
                                                            style="color: #5C5C5C;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                            ยอดจ่ายสุทธิ</h3>
                                                        <h1
                                                            style="color: #164176;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                            175,000</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-4">
                                                <div class="form-group"style="margin-left: 20px;margin-right: -20px;">
                                                    <fieldset
                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type='text' class="form-control datepicker2" />
                                                        <div class="form-control-position">
                                                            <i class="ficon feather icon-calendar"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs nav-fill" id="myTab"
                                                role="tablist"style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab-fill" data-toggle="tab"
                                                        href="#home-fill" role="tab" aria-controls="home-fill"
                                                        aria-selected="true"style="font-size: 20px">
                                                        ฮาร์ดแวร์
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab-fill" data-toggle="tab"
                                                        href="#profile-fill" role="tab" aria-controls="profile-fill"
                                                        aria-selected="false"style="font-size: 20px">
                                                        ซอฟต์แวร์
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="messages-tab-fill" data-toggle="tab"
                                                        href="#messages-fill" role="tab" aria-controls="messages-fill"
                                                        aria-selected="false"style="font-size: 20px">
                                                        อื่นๆ
                                                    </a>
                                                </li>
                                                {{-- <li class="nav-item">
                                                    <a class="nav-link" id="settings-tab-fill" data-toggle="tab"
                                                        href="#settings-fill" role="tab" aria-controls="settings-fill"
                                                        aria-selected="false" style="font-size: 20px">

                                                    </a>
                                                </li> --}}
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content pt-1"
                                                style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                                <!-- Tab panes1 -->
                                                {{-- ฮาร์ดแวร์ --}}
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
                                                                                <div
                                                                                    class="card-body card-dashboard"style="margin-top: -20px;">
                                                                                    <div class="table-responsive">
                                                                                        <table
                                                                                            class="table zero-configuration"
                                                                                            style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                            <thead class="thead-secondary">
                                                                                                <tr
                                                                                                    class="dataTables_scroll">
                                                                                                    <th
                                                                                                        style="font-size: 1rem;border-radius: 15px 0px 0px 0px;">
                                                                                                        รหัสทรัพย์สิน</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ชื่อทรัพย์สิน</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        วันที่เริ่มใช้งาน
                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ราคาซื้อ</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;border-radius: 0px 15px 0px 0px;">
                                                                                                        ค่าเสื่อมราคา</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>Tiger Nixon</td>
                                                                                                    <td>
                                                                                                        lenroihgeh
                                                                                                    </td>
                                                                                                    <td>Edinburgh</td>
                                                                                                    <td>2011/04/25</td>
                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        ssssdf
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Garrett Winters</td>
                                                                                                    <td>
                                                                                                        <div>
                                                                                                            ger5thygtres
                                                                                                    </td>
                                                                                                    <td>Tokyo</td>
                                                                                                    <td>2011/07/25</td>
                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        fdgffdhg
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Ashton Cox</td>
                                                                                                    <td>
                                                                                                        <div>
                                                                                                            grewgye4wr
                                                                                                    </td>
                                                                                                    <td>San Francisco</td>

                                                                                                    <td>2009/01/12</td>

                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        fdhgazrgzr
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
                                                {{-- ซอฟต์แวร์ --}}
                                                <div class="tab-pane" id="profile-fill" role="tabpanel"
                                                    aria-labelledby="profile-tab-fill"
                                                    style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                                    <p>
                                                    <div class="card-content">
                                                        <div
                                                            class="table-responsive  mt-1 dataTables_scroll"style="overflow-x: hidden;">
                                                            <section id="basic-datatable">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-content">
                                                                                <div
                                                                                    class="card-body card-dashboard"style="margin-top: -20px;">

                                                                                    <div class="table-responsive  ">
                                                                                        <table
                                                                                            class="table zero-configuration"
                                                                                            style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                            <thead
                                                                                                class="thead-secondary ">
                                                                                                <tr
                                                                                                    class="dataTables_scroll">
                                                                                                    <th
                                                                                                        style="border-top-left-radius: 14px;font-size: 1rem;">
                                                                                                        รหัสทรัพย์สิน</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ชื่อทรัพย์สิน</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        วันที่เริ่มใช้งาน
                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ราคาซื้อ</th>
                                                                                                    <th
                                                                                                        style="border-radius: 0px 15px 0px 0px;font-size: 1rem;">
                                                                                                        ค่าเสื่อมราคา</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>Tiger Nixon</td>
                                                                                                    <td>
                                                                                                        lkbnjoierfthb
                                                                                                    </td>
                                                                                                    <td>Edinburgh</td>
                                                                                                    <td>2011/04/25</td>
                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        thrst
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Garrett Winters</td>
                                                                                                    <td>
                                                                                                        ghtrhtrht
                                                                                                    </td>
                                                                                                    <td>Tokyo</td>
                                                                                                    <td>2011/07/25</td>
                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        hgdjyyt
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Ashton Cox</td>
                                                                                                    <td>
                                                                                                        rhytytht
                                                                                                    </td>
                                                                                                    <td>San Francisco</td>

                                                                                                    <td>2009/01/12</td>

                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        xfhth
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
                                                {{-- อื่นๆ --}}
                                                <div class="tab-pane" id="messages-fill" role="tabpanel"
                                                    aria-labelledby="messages-tab-fill"
                                                    style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                                    <p>
                                                    <p>
                                                    <div class="card-content">
                                                        <div
                                                            class="table-responsive  mt-1 dataTables_scroll dataTables_scroll">
                                                            <section id="basic-datatable">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-content">
                                                                                <div
                                                                                    class="card-body card-dashboard"style="margin-top: -20px;">

                                                                                    <div class="table-responsive">
                                                                                        <table
                                                                                            class="table zero-configuration"
                                                                                            style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                            <thead class="thead-secondary">
                                                                                                <tr
                                                                                                    class="dataTables_scroll">
                                                                                                    <th
                                                                                                        style="border-radius: 15px 0px 0px 0px;font-size: 1rem;">
                                                                                                        รหัสทรัพย์สิน</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ชื่อทรัพย์สิน</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        วันที่เริ่มใช้งาน
                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ราคาซื้อ</th>
                                                                                                    <th
                                                                                                        style="border-radius: 0px 15px 0px 0px;font-size: 1rem;">
                                                                                                        ค่าเสื่อมราคา</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>Tiger Nixon</td>
                                                                                                    <td>
                                                                                                        kfujhuigbr
                                                                                                    </td>
                                                                                                    <td>Edinburgh</td>
                                                                                                    <td>2011/04/25</td>
                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        uhtjgkmtgb
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Garrett Winters</td>
                                                                                                    <td>
                                                                                                        thwsrthsh
                                                                                                    </td>
                                                                                                    <td>Tokyo</td>
                                                                                                    <td>2011/07/25</td>
                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        ';lkjhk'
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Ashton Cox</td>
                                                                                                    <td>
                                                                                                        htrshtwsh5t
                                                                                                    </td>
                                                                                                    <td>San Francisco</td>

                                                                                                    <td>2009/01/12</td>

                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        kufytcughj
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
                                                {{-- <div class="tab-pane" id="settings-fill" role="tabpanel"
                                                    aria-labelledby="settings-tab-fill" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                                    <p>
                                                    <div class="card-content">
                                                        <div
                                                            class="table-responsive  mt-1 dataTables_scroll  dataTables_scroll">
                                                            <section id="basic-datatable">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-content">
                                                                                <div
                                                                                    class="card-body card-dashboard"style="margin-top: -20px;">

                                                                                    <div class="table-responsive">
                                                                                        <table
                                                                                            class="table zero-configuration" style="white-space: nowrap;border-radius: 0px 14px 0px 0px;border:0px solid !important;">
                                                                                            <thead class="thead-secondary">
                                                                                                <tr
                                                                                                    class="dataTables_scroll">
                                                                                                    <th
                                                                                                        style="border-radius: 15px 0px 0px 0px;font-size: 1rem;">
                                                                                                        รหัสทรัพย์สิน</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ชื่อทรัพย์สิน</th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        วันที่เริ่มใช้งาน
                                                                                                    </th>
                                                                                                    <th
                                                                                                        style="font-size: 1rem;">
                                                                                                        ราคาซื้อ</th>
                                                                                                    <th
                                                                                                        style="border-radius: 0px 15px 0px 0px;font-size: 1rem;   ">
                                                                                                        ค่าเสื่อมราคา</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>Tiger Nixon</td>
                                                                                                    <td>
                                                                                                        samnfcoe
                                                                                                    </td>
                                                                                                    <td>Edinburgh</td>
                                                                                                    <td>2011/04/25</td>
                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        hgfkulku
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Garrett Winters</td>
                                                                                                    <td>
                                                                                                        <div>
                                                                                                            hat4reh65t4r
                                                                                                    </td>
                                                                                                    <td>Tokyo</td>
                                                                                                    <td>2011/07/25</td>
                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        jhgfckuy
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Ashton Cox</td>
                                                                                                    <td>
                                                                                                        hrwsthshtr
                                                                                                    </td>
                                                                                                    <td>San Francisco</td>

                                                                                                    <td>2009/01/12</td>

                                                                                                    <td
                                                                                                        style="padding: 0;">
                                                                                                        ghkutuyk
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
                                                </div> --}}
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
        </div>
    </div>
@endsection
@section('script')
    <script>
        var draw = function() {
            console.log('Table redrawn ' + new Date());
        };

        $('form#submitform').DataTable({
            drawCallback: draw
        });
    </script>
@endsection
