@extends('layouts.main_user')
{{-- css --}}
{{-- js --}}
@section('head')
    <title>โปรไฟล์</title>
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
            {{-- start form --}}
            <div class="content-body">
                <div class="col-sm-12" style="margin: auto">
                    <div class="row mb-2" style="margin-left: 10px;">
                        <div class="col-sm-6 ">
                            <h1 class="m-0" style="font-family: 'Kanit', sans-serif; font-weight:600; color: #555555;">
                                <img src="{{ asset('images/boss1.png') }}" alt="" class="mr-1"
                                    style="height: 55px;
                                    width: 58px;margin-top: -8px;">
                                โปรไฟล์
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <section id="basic-vertical-layouts">
                        <div class="row">
                            <div class="col-5">
                                {{-- col1 --}}
                                <div class="col-12" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-body">
                                                    <div class="text-center">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-sm-"></div>
                                                                <form action="{{ route('update.profile') }}" method="POST"
                                                                    enctype="multipart/form-data" class="form form-vertical"
                                                                    id="submitform" novalidate>
                                                                    @csrf
                                                                    <div class="col-lg-12 col-sm-12">
                                                                        @if (Auth::user()->emimg != null)
                                                                            <img class="round"src="{{ asset('imguse/' . Auth::user()->emimg) }}"
                                                                                id="cusImg"
                                                                                style="max-width: 200px;height: 200px;border-radius: 10px;border: 1px solid #d9d9d9;">
                                                                        @else
                                                                            <img class="round"src="https://i.pinimg.com/564x/a5/e8/1f/a5e81f19cf2c587876fd1bb08ae0249f.jpg"
                                                                                alt="avatar"height="200px" max-width="100">
                                                                        @endif
                                                                        <label for="Image" class="form-label"></label>
                                                                        <input type="text" name="id"
                                                                            value="{{ Auth::user()->id }}" hidden>
                                                                        <input class="form-control " type="file"
                                                                            name="emImg" id="cusImgFile" accept="image/*"
                                                                            onchange="preview(this.value);"
                                                                            style=" width: 200px; margin-top: 5px;">
                                                                    </div>
                                                                </form>
                                                                <div class="col-lg-3 col-sm-"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <h3 class="text-center">ชื่อ - นามสกุล : {{ Auth::user()->fullname }}
                                                </h3>
                                                <h5 class="text-center" style="color: #555555">เเผนก :
                                                    {{ $departList->dpname }}
                                                </h5>
                                                <br>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="text-left" style="color:#555555">เลขประจำตัวพนักงาน :
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="text-left" style="color:#000000">
                                                            {{ $departList->emid }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="text-left" style="color:#555555">ประเภทผู้ใช้งาน :
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="text-left" style="color:#000000">
                                                            @if ($departList->emtype == '0')
                                                                พนักงาน
                                                            @elseif ($departList->emtype == '1')
                                                                แอดมิน
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="text-left" style="color:#555555">สถานะผู้ใช้งาน :
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="text-left" style="color:#000000">
                                                            @if ($departList->role == '0')
                                                                ไม่ผ่านโปร
                                                            @elseif ($departList->roleid == '1')
                                                                ผ่านโปร
                                                            @elseif ($departList->roleid == '2')
                                                                ลาออก
                                                            @elseif ($departList->roleid == '3')
                                                                ทดลองงาน
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- col2 --}}
                                <div class="col-12" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form form-vertical">
                                                    <div class="form-body">
                                                        <h5
                                                            style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size:1.4rem;">
                                                            การใช้งานทรัพย์สิน
                                                        </h5>
                                                        <br>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="card">
                                                                <div class="card-content"
                                                                    style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                                                    <div class="table-responsive ">
                                                                        <table class="table table-hover-animation mb-0"
                                                                            style="white-space: nowrap;border-radius: 0px 15px 0px 0px;border:0px solid !important;">
                                                                            <thead class="thead-secondary">
                                                                                <tr>
                                                                                    <th
                                                                                        style="border-radius: 15px 0px 0px 0px;font-size: 1rem;background-color: #fafafa;color:#164176;">
                                                                                        ลำดับ</th>
                                                                                    <th
                                                                                        style="font-size: 1rem;background-color: #fafafa;color:#164176;">
                                                                                        รหัสทรัพย์สิน</th>
                                                                                    <th
                                                                                        style="font-size: 1rem;background-color: #fafafa;color:#164176;">
                                                                                        ชื่อทรัพย์สิน</th>
                                                                                    <th
                                                                                        style="font-size: 1rem;background-color: #fafafa;color:#164176;">
                                                                                        วันที่เริ่มใช้งาน</th>
                                                                                    <th
                                                                                        style="font-size: 1rem;border-radius: 0px 15px 0px 0px;background-color: #fafafa;color:#164176;">
                                                                                        สถานะ</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @php
                                                                                    $i = 0;
                                                                                @endphp
                                                                                @foreach ($stockList as $list)
                                                                                    <tr>
                                                                                        <td>{{ ++$i }}</td>
                                                                                        <td>{{ $list->stid }}</td>
                                                                                        <td>{{ $list->stname }} </td>
                                                                                        <td>{{ Carbon::parse($list->stdaystart)->thaidate('j M Y') }}
                                                                                        </td>
                                                                                        <td>
                                                                                            @if ($list->ststatus == '0')
                                                                                                <p style="color:#ea5455">
                                                                                                    เลิกใช้งาน</p>
                                                                                            @elseif($list->ststatus == '1')
                                                                                                <p style="color:#28c76f">
                                                                                                    ใช้งานอยู่</p>
                                                                                            @elseif($list->ststatus == '2')
                                                                                                <p style="color:#ff9f43">
                                                                                                    พักใช้งาน</p>
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- col3 --}}
                            <div class="col-7">
                                <div class="col-12" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form form-vertical">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <h5
                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size:1.4rem;">
                                                                ข้อมูลส่วนตัว
                                                            </h5>
                                                            <br>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label for="email-id-icon"
                                                                        style="font-size: 1.0rem !important;color:#555555;">เลขบัตรประชาชน</label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="text" id="email-id-icon"
                                                                                placeholder="เลขบัตรประชาชน"
                                                                                value="{{ $departList->pnid }}"
                                                                                class="form-control" readonly
                                                                                name="PnID">
                                                                            <div class="form-control-position">
                                                                                <i class="bi bi-person-badge-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="email-id-icon"
                                                                        style="font-size: 1.0rem !important;color:#555555;">ชื่อ
                                                                        - นามสกุล</label>
                                                                    <fieldset
                                                                        class="form-group position-relative has-icon-left input-divider-left">

                                                                        <div class="position-relative has-icon-left">
                                                                            <input type="text" readonly
                                                                                id="email-id-icon"
                                                                                placeholder="ชื่อ - นามสกุล"
                                                                                class="form-control"
                                                                                value="{{ $departList->fullname }}"
                                                                                name="fullname">
                                                                            <div class="form-control-position">
                                                                                <i class="feather icon-user"></i>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="email-id-icon"
                                                                            style="font-size: 1.0rem !important;color:#555555">วันเกิด</label>
                                                                        <fieldset
                                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                                            <div class="position-relative has-icon-left">
                                                                                <input type='text'
                                                                                    value="{{ Carbon::parse($departList->birthday)->thaidate('j M Y') }}"
                                                                                    class="form-control fromDate"
                                                                                    id="" readonly />
                                                                                <div class="form-control-position">
                                                                                    <i
                                                                                        class="ficon feather icon-calendar"></i>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="gender">
                                                                        <ul class="list-unstyled mb-0"
                                                                            style="margin-top: 20px;">
                                                                            <li class="d-inline-block mr-1">
                                                                                <h5 style="color: #5C5C5C;">เพศ
                                                                                </h5>
                                                                            </li>
                                                                            <li class="d-inline-block mr-1">
                                                                                <fieldset>
                                                                                    <div class="vs-radio-con">
                                                                                        <input type="radio"
                                                                                            name="gender"
                                                                                            class="form-contorl" disabled
                                                                                            id="gender1"
                                                                                            {{ $departList->gender == 0 ? 'checked' : '' }}>
                                                                                        <span class="vs-radio">
                                                                                            <span
                                                                                                class="vs-radio--border"></span>
                                                                                            <span
                                                                                                class="vs-radio--circle"></span>
                                                                                        </span>
                                                                                        <span class=""
                                                                                            style="font-family: 'Kanit', sans-serif;font-weight:500;color:#525252">ชาย</span>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </li>
                                                                            <li class="d-inline-block">
                                                                                <fieldset>
                                                                                    <div class="vs-radio-con">
                                                                                        <input type="radio" disabled
                                                                                            name="gender"
                                                                                            class="form-contorl"
                                                                                            id="gender2"
                                                                                            {{ $departList->gender == 1 ? 'checked' : '' }}>
                                                                                        <span class="vs-radio">
                                                                                            <span
                                                                                                class="vs-radio--border"></span>
                                                                                            <span
                                                                                                class="vs-radio--circle"></span>
                                                                                        </span>
                                                                                        <span class=""
                                                                                            style="font-family: 'Kanit', sans-serif;font-weight:500;color:#525252">หญิง</span>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>
                                                            <hr>

                                                            <h5
                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size:1.4rem;">
                                                                ข้อมูลการเงิน
                                                            </h5>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="bank-name"
                                                                            style="font-size: 1.0rem !important;color: #525252;">ธนาคาร</label>
                                                                        <fieldset
                                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                                            <input type="text" name="bankname"
                                                                                placeholder="ชื่อธนาคาร" readonly
                                                                                class="form-control"
                                                                                @if ($departList->bankname == 1) value="ธนาคารกรุงไทย"
                                                                            @elseif ($departList->bankname == 2)
                                                                            value="ธนาคารกรุงเทพ"
                                                                            @elseif ($departList->bankname == 3)
                                                                            value="ธนาคารกรุงศรีอยุธยา"
                                                                            @elseif ($departList->bankname == 4)
                                                                            value=" ธนาคารกสิกรไทย"
                                                                            @elseif ($departList->bankname == 5)
                                                                            value="ธนาคารไทยพาณิชย์"
                                                                            @elseif ($departList->bankname == 6)
                                                                            value="ธนาคารออมสิน"
                                                                            @elseif ($departList->bankname == 7)
                                                                            value="ธนาคารทหารไทยธนชาต"
                                                                            @elseif ($departList->bankname == 8)
                                                                            value="ธนาคารซีไอเอ็มบี" @endif>
                                                                            <div class="form-control-position">
                                                                                <i class="fa fa-university"></i>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="banknumber"
                                                                            style="font-size: 1.0rem !important;color: #525252;">เลขบัญชี</label>
                                                                        <fieldset
                                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                                            <input type="text" name="banknumber"
                                                                                placeholder="เลขบัญชี" readonly
                                                                                value="{{ $departList->banknumber }}"
                                                                                class="form-control">
                                                                            {{-- oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> --}}
                                                                            <div class="form-control-position">
                                                                                <i class="bi bi-card-heading"></i>
                                                                            </div>

                                                                        </fieldset>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="salary"
                                                                            style="font-size: 1.0rem !important;color: #525252;">ฐานเงินเดือน</label>
                                                                        <fieldset
                                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                                            <input type="text" name="salary"
                                                                                placeholder="ฐานเงินเดือน" readonly
                                                                                value="{{ $departList->salary }}"
                                                                                class="form-control">
                                                                            {{-- oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> --}}
                                                                            <div class="form-control-position">
                                                                                <i class="bi bi-cash-coin"></i>
                                                                            </div>

                                                                        </fieldset>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="tax"
                                                                            style="font-size: 1.0rem !important;color: #525252;">ประกันสังคม(โรงพยาบาล)</label>
                                                                        <fieldset
                                                                            class="form-group position-relative has-icon-left input-divider-left">

                                                                            <input type="text"
                                                                                placeholder="ประกันสังคม"
                                                                                class="form-control" readonly
                                                                                value="{{ $departList->taxname }}"
                                                                                name="taxname">
                                                                            <div class="form-control-position">
                                                                                <i
                                                                                    class="bi bi-credit-card-2-front-fill"></i>
                                                                            </div>

                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="inputSex"
                                                                            style="font-size: 1.0rem !important;color:#555555;">เเผนก</label>
                                                                        <fieldset
                                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                                            <div class="position-relative has-icon-right">
                                                                                <input type="text" name=""
                                                                                    readonly placeholder=""
                                                                                    class="form-control"
                                                                                    value=" {{ $departList->dpname }}">
                                                                                <div class="form-control-position">
                                                                                    <i
                                                                                        class="ficon feather icon-users"></i>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="email-id-icon"
                                                                            style="font-size: 1.0rem !important;color:#555555;">วันที่เริ่มงาน</label>
                                                                        <fieldset
                                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                                            <div class="position-relative has-icon-right">
                                                                                <input type='text' id=""
                                                                                    readonly
                                                                                    value="{{ Carbon::parse($departList->startwork)->thaidate('j M Y') }}"
                                                                                    class="form-control fromDate " />
                                                                                <div class="form-control-position">
                                                                                    <i
                                                                                        class="ficon feather icon-calendar"></i>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>
                                                            <hr>

                                                            <h5
                                                                style="margin-top: 20px;font-family: 'Kanit', sans-serif; font-weight:500; color: #164176;font-size:1.4rem;">
                                                                ข้อมูลการติดต่อ
                                                            </h5>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="email-id-icon"
                                                                            style="font-size: 1.0rem !important;color:#555555;">อีเมล</label>
                                                                        <fieldset
                                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                                            <div class="position-relative has-icon-left">
                                                                                <input type="text" id="email-id-icon"
                                                                                    placeholder="อีเมล" readonly
                                                                                    value=" {{ $departList->email }}"
                                                                                    class="form-control" name="email">
                                                                                <div class="form-control-position">
                                                                                    <i class="feather icon-mail"></i>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="email-id-icon"
                                                                            style="font-size: 1.0rem !important;color:#555555;">เบอร์โทรศัพท์</label>
                                                                        <fieldset
                                                                            class="form-group position-relative has-icon-left input-divider-left">
                                                                            <div class="position-relative has-icon-left">
                                                                                <input type="text" id="email-id-icon"
                                                                                    placeholder="เบอร์โทรศัพท์"
                                                                                    class="form-control" readonly
                                                                                    value=" {{ $departList->phonenumber }}"
                                                                                    name="Phonenumber">
                                                                                <div class="form-control-position">
                                                                                    <i class="bi bi-telephone-fill"></i>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
        $(document).ready(function() {
            $(".fromDate").datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                autoclose: true,
            })
            // $("#toDate").datepicker({
            //     language: 'th-th',
            //     format: 'dd/mm/yyyy',
            //     autoclose: true,
            // });
        });
    </script>
    <script>
        function preview(pic) {
            console.log(pic);
            cusImg.src = URL.createObjectURL(event.target.files[0]);
            document.getElementById("submitform").submit();
        }

        function clearImage() {
            document.getElementById('cusImgFile').value = null;
            cusImg.src = "";
        }
    </script>
@endsection
