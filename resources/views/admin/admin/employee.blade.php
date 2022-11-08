@extends('layouts.admin')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        < script src = "https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity = "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin = "anonymous" >
            <link href = "css/bootstrap - datetimepicker.css "rel = "stylesheet" >
            <script src = "js/bootstrap-datetimepicker.min.js" >
            <link rel = "stylesheet"
        href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity = "sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin = "anonymous"
        referrerpolicy = "no-referrer"/>
            <script src = "https://kit.fontawesome.com/a076d05399.js"
        crossorigin = "anonymous" >
    </script>
    {{-- js --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"
        integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .btn-primary:active,
        .btn-primary:focus,
        .btn-primary:hover {
            background: #030051;
            color: #fff;
            border-color: #030063;
        }
    </style>
    </script>
    <script src="./js/plugins-init/bootstrap-input-spinner.js"></script>
</head>

@section('content')
    {{-- <style>
    body{
        font-family: 'Kanit', sans-serif; font-weight:600;
    }
</style> --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid mt-2">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <div>
                        <h1 class="m-0" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;"><img
                                src="{{ asset('images/person.png') }}" alt="" class="mr-3">รายชื่อพนักงาน
                        </h1>
                    </div>
                </div><!-- /.col -->
                <!-- Button trigger modal -->
                <div class="col-sm-6">
                    <div class="offset-7">
                        <button type="button" class="btn btn-primary rounded-pill text-white px-5" data-toggle="modal"
                            data-target="#exampleModalLong" style="padding: 12px 21px;background: #164176;"> <i
                                class=" bi bi-person-plus"></i> เพิ่มพนักงาน</button>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <div class="card" style="font-family: 'Prompt', sans-serif; font-weight:400;">
            <div class="col-lg-14">

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"
                                    style="font-family: 'Prompt', sans-serif; font-weight:600;"> <img
                                        src="{{ asset('images/person.png') }}" alt="" class="mr-3">เพิ่มพนักงาน
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (\Session::has('error'))
                                    <div id="error" class="text-danger">
                                        {!! \Session::get('error') !!}
                                    </div>
                                @endif
                                {{-- action="{{ route('add') }}" method="POST" --}}
                                <form method="POST" action="{{ route('addCustomer') }}" enctype="multipart/form-data ">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputName">ชื่อ</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror "
                                                id="inputName"name="name" value="{{ old('name') }}" placeholder="ชื่อ">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputLastname">นามสกุล</label>
                                            <input type="text"
                                                class="form-control @error('lastName') is-invalid @enderror"
                                                id="inputLastname" name="lastName" value="{{ old('lastName') }}"
                                                placeholder="นามสกุล">
                                            @error('lastName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmail" name="email" value="{{ old('email') }}"
                                                placeholder="infinity@example.com">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPhone">เบอรโทรศัพท์</label>
                                            <input type="text"
                                                class="form-control @error('numberPhone') is-invalid @enderror"
                                                id="inputPhone" name="numberPhone" value="{{ old('numberPhone') }}"
                                                placeholder="1234567890">
                                            @error('numberPhone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPersoncard">เลขประจำตัวบัตรประชาชน</label>
                                            <input type="text"
                                                class="form-control @error('PersoncardID') is-invalid @enderror"
                                                id="inputPersoncard" name="PersoncardID"
                                                value="{{ old('PersoncardID') }}" placeholder="1212121212121">
                                            @error('PersoncardID')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword">รหัสผ่าน</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="inputPassword" name="password" value="{{ old('password') }}"
                                                placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form row">
                                        <div class="form-group col-md-6">
                                            <label for="inputBanknumber">เลขบัญชีธนาคาร</label>
                                            <input type="text"
                                                class="form-control  @error('Banknumber') is-invalid @enderror"
                                                id="inputBanknumber" name="Banknumber" value="{{ old('Banknumber') }}"
                                                placeholder="123456789">
                                            @error('Banknumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="ImgBank">รูปสมุดบัญชีธนาคาร</label>
                                            <input type="file"
                                                class="form-control-file @error('Imgbank') is-invalid @enderror"
                                                id="ImgBank" name="ImgBank" value="{{ old('Imgbank') }}"
                                                style="margin-top: 10px;">
                                            @error('Imgbank')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputSalary">ฐานเงินเดือน</label>
                                        <input type="text" class="form-control @error('Salary') is-invalid @enderror"
                                            id="inputSalary" name="Salary" value="{{ old('Salary') }}"
                                            placeholder="25000">
                                        @error('Salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputDepartment">แผนก</label>
                                            <select id="inputDepartment" class="form-control" name="Department">
                                                <option selected>เลือกแผนก</option>
                                                <option>UX/UI</option>
                                                <option>Frontend</option>
                                                <option>Backend</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputSex">เพศ</label>
                                            <select id="inputSex" class="form-control" name="Sex">
                                                <option selected>เลือกเพศ</option>
                                                <option>ชาย</option>
                                                <option>หญิง</option>
                                                <option>LGBTQ+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row offset-1">
                                        <label class="col-sm-3 col-form-label"
                                            style="margin-bottom:8px; font-family: 'Kanit', sans-serif; font-weight:600;">วันที่เริ่มงาน</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="datepicker1" name="startwork"
                                                value="<?= date('y-m-d', strtotime(date('Y-m-d'))) ?>">


                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary"
                                        style="margin-right: 65px;margin-left: 128px;   border-radius: 15px;"
                                        id="save">บันทึก</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                                        aria-label="Close"style="margin-right: 54px; border-radius: 15px;color: #5e5e5e;background-color: #fff;border-color: #a3a3a3;}">ยกเลิก</button>

                                    {{-- <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary" style="margin-right: 123px;"
                                            id="save">บันทึก</button>
                                    </div> --}}
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <form class="form-inline" style="float: right; margin-top: 5px;">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit"
                        style="padding: 10px 21px;background: #fff;border-color: #fff;"><i class="bi bi-search"
                            style="font-size: 1.5rem;color: #000;"></i></button>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-primary" style="font-family: 'Kanit', sans-serif; font-weight:600;">#
                                </th>
                                <th class="text-warning" style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    เลขประจำตัวบัตรประชาชน</th>
                                <th class="text-primary" style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    ชื่อ-นามสกุล</th>
                                <th class="text-warning" style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    Email</th>
                                <th class="text-primary" style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    เบอร์โทร</th>
                                <th class="text-warning" style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    แผนก</th>
                                <th class="text-primary" style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    ฐานเงินเดือน</th>
                                <th class="text-warning" style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    วันที่เริ่มงาน</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $i = 0;

                            @endphp

                            @foreach ($users as $cus)
                                <tr>

                                    <td>{{ ++$i }}</td>
                                    <td>{{ $cus->PersoncardID }}</td>
                                    <td>{{ $cus->name }}</td>
                                    <td>{{ Str::limit($cus->email, '25', '..') }}</td>
                                    <td>{{ $cus->numberPhone }}</td>
                                    <td>{{ $cus->Department }}</td>
                                    <td>{{ $cus->Salary }}</td>
                                    <td>{{ $cus->startwork }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-white" style="background-color: rgb(255, 255, 255)"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <!-- Modal -->
                                                <button onclick="getData({{ $cus->id }})"
                                                    data-url="{{ route('users.show', $cus->name) }}"
                                                    class="dropdown-item" data-target="#exampleModal" data-toggle="modal"
                                                    type="button" style="color: #000;">รายละเอียด
                                                </button>
                                                <a class="dropdown-item" data-target="#exampleModal" type="button"
                                                    style="color: #000;"href={{route('Editcus', $cus->id)}}>แก้ไข
                                                </a>
                                                <a class="dropdown-item" data-target="#exampleModal" type="button"
                                                    style="color: #000;"href={{ '/deleteCustomer/' . $cus['id'] }}>ลบ
                                                </a>
                                            </div>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="exampleModalLabel">
                                                                ข้อมูลพนักงาน
                                                            </h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form>
                                                                <fieldset disabled>
                                                                    <div class="form-row">
                                                                        <div
                                                                            class="form-group col-md-6"style="margin: auto;">
                                                                            <label for="disabledTextInput">ชื่อ</label>
                                                                            <input type="text" class="form-control"
                                                                                id="user-name">

                                                                        </div>
                                                                        <div
                                                                            class="form-group col-md-6"style="margin: auto;">
                                                                            <label for="inputLastname">นามสกุล</label>
                                                                            <input type="text" class="form-control"
                                                                                id="user-lastName">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail">Email</label>
                                                                            <input type="text" class="form-control"
                                                                                id="user-email">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPhone">เบอรโทรศัพท์</label>
                                                                            <input type="text" class="form-control"
                                                                                id="user-numberPhone">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label
                                                                                for="inputPersoncard">เลขประจำตัวบัตรประชาชน</label>
                                                                            <input type="text" class="form-control"
                                                                                id="user-PersoncardID">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label
                                                                                for="inputBanknumber">เลขบัญชีธนาคาร</label>
                                                                            <input type="text" class="form-control"
                                                                                id="user-Banknumber">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group ">
                                                                        <label for="inputBanknumber">ฐานเงินเดือน</label>
                                                                        <input type="text" class="form-control"
                                                                            id="user-Salary">
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="inputDepartment">แผนก</label>
                                                                                <input type="text"
                                                                                    class="form-control"id="user-Department">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputSex">เพศ</label>
                                                                            <input type="text"
                                                                                class="form-control"id="user-Sex">
                                                                        </div>
                                                                    </div><div class="form-group">
                                                                <label for="inputStart">วันที่เริ่มงาน</label>
                                                                <input type="text" class="form-control"
                                                                    id="user-startwork">
                                                               </form>
                                                            </div>
                                                        </div><div class="modal-footer">
                                                        <button type="button"
                                                            class="badeg badge-pill btn btn-secondary btn btn-white "
                                                            data-dismiss="modal">ยกเลิก</button>

                                                    </div>
                                                        {{-- <form>
                                                                <fieldset disabled>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="disabledTextInput">ชื่อ</label>
                                                                            <input type="text" class="form-control"
                                                                                id="disabledTextInput"
                                                                                value=" {{ $cus->name }}">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputLastname">นามสกุล</label>
                                                                            <input type="text" class="form-control"
                                                                                id="inputLastname"
                                                                                value=" {{ $cus->lastName }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputEmail">Email</label>
                                                                            <input type="text" class="form-control"
                                                                                id="inputEmail"
                                                                                value=" {{ $cus->email }}">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputPhone">เบอรโทรศัพท์</label>
                                                                            <input type="text" class="form-control"
                                                                                id="inputPhone"
                                                                                value=" {{ $cus->numberPhone }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label
                                                                                for="inputPersoncard">เลขประจำตัวบัตรประชาชน</label>
                                                                            <input type="text" class="form-control"
                                                                                id="inputPersoncard"
                                                                                value=" {{ $cus->PersoncardID }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form row">
                                                                        <div class="form-group col-md-6">
                                                                            <label
                                                                                for="inputBanknumber">เลขบัญชีธนาคาร</label>
                                                                            <input type="text" class="form-control"
                                                                                id="inputBanknumber"
                                                                                value=" {{ $cus->Banknumber }}">
                                                                        </div>
                                                                        <form>
                                                                            <div class="form-group col-md-6">
                                                                                <label
                                                                                    for="exampleFormControlFile1">รูปสมุดบัญชีธนาคาร</label>
                                                                                <input type="file"
                                                                                    class="form-control-file"
                                                                                    id="exampleFormControlFile1"
                                                                                    value=" {{ $cus->ImgBank }}">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputSalary">ฐานเงินเดือน</label>
                                                                        <input type="text" class="form-control"
                                                                            id="inputSalary"
                                                                            value=" {{ $cus->Salary }}">
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="inputDepartment">แผนก</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="inputDepartment"
                                                                                    value=" {{ $cus->Department }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="inputSex">เพศ</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="inputSex"
                                                                                    value=" {{ $cus->Sex }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputStart">วันที่เริ่มงาน</label>
                                                                        <input type="text" class="form-control"
                                                                            id="inputStrat"
                                                                            value=" {{ $cus->startwork }}">
                                                                    </div>
                                                                </fieldset>
                                                            </form> --}}

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div class="row">{{ $users->links() }}</div>
                </div>
                <!-- /.content-header -->
            </div>
        </div>
    </div>

    <script>
        {
            $("input[type='number']").inputSpinner();
        } {
            var date_start = new Date(2018);
            // console.log(date_start);
            date_start.setDate(date_start.getDate());
            $('#datepicker1').datepicker({
                format: 'yyyy-mm-dd',
                language: 'th',
                startDate: date_start,

            });
        }
    </script>
    <script>
        {
            $("selector").datepicker({
                altField: "#datepicker1"
                altFormat: "yyyy-mm-dd"
            });
        }
    </script>
    <script type="text/javascript">
        function getData(id) {
            var url = "{{ route('users.show', ':id') }}";
            url = url.replace(':id', id);

            $.get(url, function(data) {
                $('#exampleModal').modal('show');
                $('#user-id').val(data.id);
                $('#user-name').val(data.name);
                $('#user-lastName').val(data.lastName);
                $('#user-email').val(data.email);
                $('#user-numberPhone').val(data.numberPhone);
                $('#user-PersoncardID').val(data.PersoncardID);
                $('#user-Banknumber').val(data.Banknumber);
                $('#user-ImgBank').val(data.ImgBank);
                $('#user-Salary').val(data.Salary);
                $('#user-Department').val(data.Department);
                $('#user-Sex').val(data.Sex);
                $('#user-startwork').val(data.startwork);
            })
        }
    </script>
@endsection
