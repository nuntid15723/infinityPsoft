@extends('layouts.main_admin')
{{-- css --}}
{{-- js --}}
@section('head')
    <title> Salary</title>
@endsection
@section('content')
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
                                    {{-- <img src="{{ asset('images/absent.png') }}" alt=""
                                        class="mr-1"> --}}
                                    ตัดรอบเงินเดือน
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="basic-vertical-layouts">
                        <div class="col-md-12 col-12" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-1 col-sm-">
                                                <label for="email-id-icon">วันที่</label>
                                            </div>
                                            <div class="col-lg-3 col-sm-5">
                                                <div class="form-group">
                                                    <div class="position-relative has-icon-right">
                                                        <input type='text' class="form-control pickadate" />
                                                        <div class="form-control-position">
                                                            <i class="ficon feather icon-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-sm-7">
                                                <div class="d-flex justify-content-end mr-2">
                                                    <div class="mr-1">
                                                        <button type="button" class="btn btn-primary text-white px-5"
                                                            style="font-size: 18px; border-radius: 23px; border-color: #ff0a0a !important;background-color: #BCC9E3 !important;">
                                                            <a href="{{ url('salary') }}"style="color: #fff;">
                                                                ยกเลิก </a>
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-primary text-white px-5"
                                                            style="font-size: 18px; border-radius: 23px;">
                                                            {{-- <i class="fa fa-plus mr-1" style="font-size: 1.3rem;"></i> --}}
                                                            <a href="{{ url('/download-pdf') }}"style="color: #fff;">
                                                                บันทึกเอกสาร </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <section id="nav-filled">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-content">
                                                        <div class="table-responsive mt-1 dataTables_scroll">
                                                            {{-- <table class="table table-hover-animation mb-0">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th style="background-color: #164176;">ลำดับ

                                                                        </th>
                                                                        <th style="background-color: #164176;">ชื่อ -
                                                                            นามสกุล
                                                                        </th>
                                                                        <th style="background-color: #164176;">
                                                                            ช่องทางรับชำระ</th>
                                                                        <th style="background-color: #164176;">เงินเดือน
                                                                        </th>
                                                                        <th style="background-color: #164176;">ปรับลด
                                                                        </th>
                                                                        <th style="background-color: #164176;">ยอดจ่ายสุทธิ
                                                                        </th>
                                                                        <th style="background-color: #164176;">สถานะ
                                                                        </th>
                                                                        <th style="background-color: #164176;"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>#879985</td>
                                                                        <td>
                                                                            <div>
                                                                                26/07/2018
                                                                        </td>
                                                                        <td class="p-1">
                                                                            1234567890123
                                                                        </td>
                                                                        <td>Anniston, Alabama</td>
                                                                        <td>0987654321</td>
                                                                        <td>@gmail.com</td>
                                                                        <td>
                                                                            <span>130 km</span>
                                                                            <div
                                                                                class="progress progress-bar-success mt-1 mb-0">
                                                                                <div class="progress-bar" role="progressbar"
                                                                                    style="width: 80%" aria-valuenow="80"
                                                                                    aria-valuemin="0" aria-valuemax="100">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="row" style="margin-top: 10px;">
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0;"><i
                                                                                    class="bi bi-pencil-fill"></i>
                                                                            </button>
                                                                            <br>
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                    class="bi bi-eye-fill"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>#156897</td>
                                                                        <td>
                                                                            <div>

                                                                                26/07/2018
                                                                        </td>
                                                                        <td class="p-1">
                                                                            1234567890123
                                                                        </td>
                                                                        <td>Cordova, Alaska</td>
                                                                        <td>0987654321</td>
                                                                        <td>@gmail.com</td>
                                                                        <td>
                                                                            <span>234 km</span>
                                                                            <div
                                                                                class="progress progress-bar-warning mt-1 mb-0">
                                                                                <div class="progress-bar" role="progressbar"
                                                                                    style="width: 60%" aria-valuenow="60"
                                                                                    aria-valuemin="0" aria-valuemax="100">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="row" style="margin-top: 10px;">
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0;"><i
                                                                                    class="bi bi-pencil-fill"></i>
                                                                            </button>
                                                                            <br>
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                    class="bi bi-eye-fill"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>#568975</td>
                                                                        <td>
                                                                            <div>
                                                                                26/07/2018
                                                                        </td>
                                                                        <td class="p-1">
                                                                            1234567890123
                                                                        </td>
                                                                        <td>Florence, Alabama</td>
                                                                        <td>0987654321</td>
                                                                        <td>@gmail.com</td>
                                                                        <td>
                                                                            <span>168 km</span>
                                                                            <div
                                                                                class="progress progress-bar-success mt-1 mb-0">
                                                                                <div class="progress-bar"
                                                                                    role="progressbar" style="width: 70%"
                                                                                    aria-valuenow="70" aria-valuemin="0"
                                                                                    aria-valuemax="100">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="row" style="margin-top: 10px;">
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0;"><i
                                                                                    class="bi bi-pencil-fill"></i>
                                                                            </button>
                                                                            <br>
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                    class="bi bi-eye-fill"></i>
                                                                            </button>
                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>#245689</td>
                                                                        <td>

                                                                            26/07/2018
                                                                        </td>

                                                                        <td class="p-1">
                                                                            1234567890123
                                                                        </td>
                                                                        <td>Clifton, Arizona</td>
                                                                        <td>0987654321</td>
                                                                        <td>@gmail.com</td>
                                                                        <td>
                                                                            <span>125 km</span>
                                                                            <div
                                                                                class="progress progress-bar-danger mt-1 mb-0">
                                                                                <div class="progress-bar"
                                                                                    role="progressbar" style="width: 95%"
                                                                                    aria-valuenow="95" aria-valuemin="0"
                                                                                    aria-valuemax="100">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="row" style="margin-top: 10px;">
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0;"><i
                                                                                    class="bi bi-pencil-fill"></i>
                                                                            </button>
                                                                            <br>
                                                                            <button type="button" class="btn "
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter"
                                                                                style="background-color: #FFC7004F;height: 25px;width: 30px;padding: 0; margin-left: 5px;"><i
                                                                                    class="bi bi-eye-fill"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> --}}
                                                            <table class="table zero-configuration "
                                                            style="white-space: nowrap;font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            <thead class="thead-dark ">
                                                                <tr class="dataTables_scroll">
                                                                    <th
                                                                        style="background-color: #164176; width: 100px; border-radius: 15px 0px 0px 0px;font-size: 1rem;">
                                                                        เลขประจำตัวพนักงาน</th>
                                                                    <th style="background-color: #164176; font-size: 1rem;">
                                                                        ชื่อพนักงาน</th>
                                                                    <th style="background-color: #164176;font-size: 1rem;">
                                                                        เบอร์โทร
                                                                    </th>
                                                                    <th style="background-color: #164176;font-size: 1rem;">
                                                                        อีเมล</th>
                                                                    <th
                                                                        style="background-color: #164176; border-radius: 0px 14px 0px 0px;font-size: 1rem;">
                                                                        <div style="text-align: center;">
                                                                            เงินเดือน</div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Tiger Nixon</td>
                                                                    <td>
                                                                        <div>
                                                                            <img class="media-object mr-1"
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                                alt="Avatar" height="100" width="90">
                                                                        </div>
                                                                    </td>
                                                                    <td>Edinburgh</td>
                                                                    <td>$320,800</td>
                                                                    <td style="padding: 0;">
                                                                        <div class="d-flex" style="justify-content: center;">
                                                                            <div class="mr-1">89,566552 </div>
                                                                            <div class="btn-group dropdown">
                                                                                <div class="btn-group">
                                                                                    <button class="btn btn-white"
                                                                                        style="background-color:#FFC7004F !important;height: 25px;width: 30px;padding: 0;border-radius: 5px;"
                                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                                        aria-expanded="false">
                                                                                        <i
                                                                                            class="bi bi-pencil-fill"style="margin-right: 0rem;"></i>
                                                                                    </button>
                                                                                    <div class="dropdown-menu">
                                                                                        <button class="dropdown-item" type="button"
                                                                                            data-toggle="modal" data-target="#large"
                                                                                            style="width: 100%;">
                                                                                            รายละเอียด
                                                                                        </button>
                                                                                        <a class="dropdown-item"
                                                                                            href="{{ url('/editInventory') }}">แก้ไข</a>
                                                                                        <a class="dropdown-item" href="#">ลบ</a>
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
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                                alt="Avatar" height="100" width="90">
                                                                        </div>
                                                                    </td>
                                                                    <td>Tokyo</td>

                                                                    <td>$170,750</td>
                                                                    <td style="padding: 0;">
                                                                        <div class="d-flex" style="justify-content: center;">
                                                                            <div class="mr-1">89,566552 </div>
                                                                            <div class="btn-group dropdown">
                                                                                <div class="btn-group">
                                                                                    <button class="btn btn-white"
                                                                                        style="background-color:#FFC7004F !important;height: 25px;width: 30px;padding: 0;border-radius: 5px;"
                                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                                        aria-expanded="false">
                                                                                        <i
                                                                                            class="bi bi-pencil-fill"style="margin-right: 0rem;"></i>
                                                                                    </button>
                                                                                    <div class="dropdown-menu">
                                                                                        <button class="dropdown-item" type="button"
                                                                                            data-toggle="modal" data-target="#large"
                                                                                            style="width: 100%;">
                                                                                            รายละเอียด
                                                                                        </button>
                                                                                        <a class="dropdown-item"
                                                                                            href="{{ url('/editInventory') }}">แก้ไข</a>
                                                                                        <a class="dropdown-item" href="#">ลบ</a>
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
                                                                                src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                                                alt="Avatar" height="100" width="90">
                                                                        </div>
                                                                    </td>
                                                                    <td>San Francisco</td>

                                                                    <td>$86,000</td>
                                                                    <td style="padding: 0;">
                                                                        <div class="d-flex" style="justify-content: center;">
                                                                            <div class="mr-1">89,566552 </div>
                                                                            <div class="btn-group dropdown">
                                                                                <div class="btn-group">
                                                                                    <button class="btn btn-white"
                                                                                        style="background-color:#FFC7004F !important;height: 25px;width: 30px;padding: 0;border-radius: 5px;"
                                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                                        aria-expanded="false">
                                                                                        <i
                                                                                            class="bi bi-pencil-fill"style="margin-right: 0rem;"></i>
                                                                                    </button>
                                                                                    <div class="dropdown-menu">
                                                                                        <button class="dropdown-item" type="button"
                                                                                            data-toggle="modal" data-target="#large"
                                                                                            style="width: 100%;">
                                                                                            รายละเอียด
                                                                                        </button>
                                                                                        <a class="dropdown-item"
                                                                                            href="{{ url('/editInventory') }}">แก้ไข</a>
                                                                                        <a class="dropdown-item" href="#">ลบ</a>
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

                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                        </div>
                                                    </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </section>
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
    </script>
@endsection
