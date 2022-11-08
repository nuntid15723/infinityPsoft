<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kanit:wght@500;700&family=Roboto+Condensed&display=swap"
    rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kanit:wght@500;700&family=Mitr:wght@200&family=Prompt:wght@300&family=Roboto+Condensed&display=swap"
    rel="stylesheet">
@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <div style="font-family: 'Kanit', sans-serif; font-weight:600;">
                        <h1 class="m-0" style=" color:#164176"><img src="{{ asset('dist/img/logo.svg') }}"
                                alt="" class="mr-3">โปรไฟล์</h1>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Employee</a></li>
                    </ol> --}}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container" style="font-family: 'Kanit', sans-serif; font-weight:400;">
        <div class="card">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img img src={{ '/images/profile.png' }} class="img-fluid rounded-start" alt="..."
                        style="margin-left: 24px;">
                </div>
                <div class="col-md-3">
                    <div class="card-body">
                        <h5 class="card-title">สุดสวย สวยที่สุด</h5>
                        <p class="card-text" style="font-family: 'Kanit', sans-serif; font-weight:400;">123456789</p>
                        <a href="{{ url('/edit') }}">
                            <button type="button" class="badeg badge-pill btn btn-outline-background-color text-white"
                                style="background-image: linear-gradient(230deg, #7EA3D1, #164176, #164176 ); margin-bottom: 1px;"
                                data-dismiss="modal">แก้ไข</button>
                        </a>
                        <button type="button" class="badeg badge-pill btn btn-outline-danger"
                            data-dismiss="modal">ลบ</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-body">
                        <p class="card-text"><i class="bi bi-people-fill"></i> ชื่อ-นามสกุล</p>
                        <p class="card-text"><i class="bi bi-credit-card-fill"></i> เลขประจำตัวบัตรประชาชน</p>
                        <p class="card-text"><i class="bi bi-envelope-fill"></i> อีเมลล์</p>
                        <p class="card-text"><i class="bi bi-calendar-week-fill"></i> วันเกิด</p>
                        <p class="card-text"><i class="bi bi-calendar-week-fill"></i> วันที่เริ่มงาน</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <p class="card-text"><i class="bi bi-credit-card-2-front-fill"></i> เลขบัญชีธนาคาร</p>
                        <p class="card-text"><i class="bi bi-cash"></i> ฐานเงินเดือน</p>
                        <p class="card-text"><i class="bi bi-person-lines-fill"></i> แผนก</p>
                        <p class="card-text"><i class="bi bi-telephone-fill"></i></i> เบอรโทรศัพท์</p>
                        <p class="card-text"><i class="bi bi-gender-ambiguous"></i> เพศ</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card" style="font-family: 'Prompt', sans-serif; font-weight:400;">
                    <div class="card-body">
                        <h5 class="card-title text-primary" style="font-family: 'Kanit', sans-serif; font-weight:600;">
                            ประวัติการลา</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-primary"
                                            style="font-family: 'Kanit', sans-serif; font-weight:600;">#</th>
                                        <th class="text-warning"
                                            style="font-family: 'Kanit', sans-serif; font-weight:600;">ชื่อ</th>
                                        <th class="text-primary"
                                            style="font-family: 'Kanit', sans-serif; font-weight:600;">วันที่ลา</th>
                                        <th class="text-warning"
                                            style="font-family: 'Kanit', sans-serif; font-weight:600;">วันที่สิ้นสุด</th>
                                        <th class="text-primary"
                                            style="font-family: 'Kanit', sans-serif; font-weight:600;">สถานะ</th>
                                        <th class="text-warning"
                                            style="font-family: 'Kanit', sans-serif; font-weight:600;">ประเภทการลา</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>สุดสวย สวยที่สุด</td>
                                        <td>05/05/2022</td>
                                        <td>05/05/2022</td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #F8A8FF, #FD6585, #FC76A3 ); margin-bottom: 1px;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h5 class="text-white " style="text-align: center;">ไม่อนุมัติ</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>ลากิจ</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>สุดสวย สวยที่สุด</td>
                                        <td>05/05/2022</td>
                                        <td>05/05/2022</td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #F8A8FF, #FD6585, #FC76A3 ); margin-bottom: 1px;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h5 class="text-white " style="text-align: center;">ไม่อนุมัติ</h5>
                                                </div>
                                            </div>
                        </div>
                        </td>
                        <td>ลากิจ</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>สุดสวย สวยที่สุด</td>
                            <td>05/05/2022</td>
                            <td>05/05/2022</td>
                            <td>
                                <div class="card"
                                    style="background-image: linear-gradient(230deg, #F8A8FF, #FD6585, #FC76A3 ); margin-bottom: 1px;">

                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                        <h5 class="text-white " style="text-align: center;">ไม่อนุมัติ</h5>
                                    </div>
                                </div>

                            </td>
                            <td>ลากิจ</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>สุดสวย สวยที่สุด</td>
                            <td>05/05/2022</td>
                            <td>05/05/2022</td>
                            <td>
                                <div class="card"
                                    style="background-image: linear-gradient(230deg, #F8A8FF, #FD6585, #FC76A3 ); margin-bottom: 1px;">

                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                        <h5 class="text-white " style="text-align: center;">ไม่อนุมัติ</h5>
                                    </div>
                                </div>
                            </td>
                            <td>ลาป่วย</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>สุดสวย สวยที่สุด</td>
                            <td>05/05/2022</td>
                            <td>05/05/2022</td>
                            <td>
                                <div class="card"
                                    style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px;">
                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                        <h5 class="text-white " style="text-align: center;">อนุมัติ</h5>
                                    </div>
                            </td>
                            <td>ลาป่วย</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>สุดสวย สวยที่สุด</td>
                            <td>05/05/2022</td>
                            <td>05/05/2022</td>
                            <td>
                                <div class="card"
                                    style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px;">
                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                        <h5 class="text-white " style="text-align: center;">อนุมัติ</h5>
                                    </div>
                            </td>
                            <td>ลากิจ</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>สุดสวย สวยที่สุด</td>
                            <td>05/05/2022</td>
                            <td>05/05/2022</td>
                            <td>
                                <div class="card"
                                    style="background-image: linear-gradient(230deg, #F8A8FF, #FD6585, #FC76A3 ); margin-bottom: 1px;">
                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                        <h5 class="text-white " style="text-align: center;">ไม่อนุมัติ</h5>
                                    </div>
                                </div>
                            </td>
                            <td>ลาป่วย</td>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example" style="float: right">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Permissions</h5>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col" style="font-family: 'Kanit', sans-serif; font-weight:600;">หน้าที่</th>
                                <th scope="col" style="font-family: 'Kanit', sans-serif; font-weight:600;">ดู</th>
                                <th scope="col" style="font-family: 'Kanit', sans-serif; font-weight:600;">แก้ไข</th>
                                <th scope="col" style="font-family: 'Kanit', sans-serif; font-weight:600;">สร้าง</th>
                                <th scope="col" style="font-family: 'Kanit', sans-serif; font-weight:600;">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Admin</th>
                                <th scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1"></label>
                                    </div>
                                </th>
                                <th scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </th>
                                <th scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3"></label>
                                    </div>
                                </th>
                                <th scope="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4"></label>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    </section>
    <!-- /.content -->
@endsection
