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
    <title>ค่าเสื่อม</title>
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
                                    {{-- <i class="bi bi-bookmarks-fill"></i> --}}
                                    <img src="{{ asset('images/stockmath.png') }}" alt="" class="mr-1"
                                        style="height: 53px;
                                width: 54px;">
                                    ค่าเสื่อม
                                </h1>
                            </div>
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                        </div>
                        {{-- <div class="col-sm-6" style="margin-top: -55px;font-family: 'Kanit', sans-serif; font-weight:600;">
                            <div style="text-align: end;">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary text-white px-5"
                                    style="font-size: 18px; border-radius: 23px; padding-left: 2rem !important;
                                    padding-right: 2rem !important;background-color: #2E8B57 !important;">
                                    <i class="bi bi-file-earmark-excel mr-1 "></i>Export</button>
                                </a>
                                </button>
                            </div>
                        </div> --}}
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
                                                {{-- <h5
                                                    style="margin-left: 25px;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                    ช่วงเวลาที่ต้องการคิดค่าเสื่อม
                                                </h5> --}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-4" style="margin-top: 25px">
                                                {{-- <div class="form-group"style="margin-left: 20px;margin-right: -20px;">
                                                    <fieldset
                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type='text' id="fromDate" class="form-control " />
                                                        <div class="form-control-position">
                                                            <i class="ficon feather icon-calendar"></i>
                                                        </div>
                                                    </fieldset>
                                                </div> --}}
                                                <h2
                                                    style="margin-left: 25px;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                    ประเภทของทรัพย์สิน
                                                </h2>
                                            </div>
                                            <div class="col-lg-9 col-sm-8">
                                                <div class="d-flex justify-content-end mr-2">
                                                    <div>
                                                        <div style="text-align: end;">
                                                            {{-- border-right: solid --}}
                                                            <h3
                                                                style="color: #5C5C5C;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                                ค่าเสื่อมทั้งหมด</h3>
                                                            <h1 style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                                                45,000.00</h1>
                                                        </div>
                                                    </div>
                                                    <div style="border-right: solid;margin: 10px"></div>
                                                    <div>
                                                        <h3
                                                            style="color: #5C5C5C;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                            ราคาทั้งหมด</h3>
                                                        <h1
                                                            style="color: #164176;font-family: 'Kanit', sans-serif; font-weight:500;">
                                                            500,000.00</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-lg-3 col-sm-4">
                                                <div class="form-group"style="margin-left: 20px;margin-right: -20px;">
                                                    <fieldset
                                                        class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type='text' id="toDate" class="form-control " />
                                                        <div class="form-control-position">
                                                            <i class="ficon feather icon-calendar"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <section id="accordion-with-margin">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card collapse-icon accordion-icon-rotate">
                                                        <div class="card-body">
                                                            <div class="accordion" id="accordionExample">
                                                                @foreach ($inventory as $inventory)
                                                                    <div class="collapse-margin">
                                                                        <div class="card-header"
                                                                            id="headingOne_{{ $inventory['id'] }}"
                                                                            data-toggle="collapse" role="button"
                                                                            data-target="#collapseOne{{ $inventory['id'] }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseOne">
                                                                            <span class="lead collapse-title"
                                                                                style="font-family: 'Kanit', sans-serif; font-weight:500;font-size:1.3rem;">

                                                                                {{ $inventory['stname'] }}

                                                                            </span>
                                                                        </div>


                                                                        <div id="collapseOne{{ $inventory['id'] }}"
                                                                            class="collapse"
                                                                            aria-labelledby="headingOne_{{ $inventory['id'] }}"
                                                                            data-parent="#accordionExample">
                                                                            <div class="card-body">
                                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                    <div class="card">
                                                                                        <div class="card-content"
                                                                                            style="font-family: 'Kanit', sans-serif; font-weight:400;">
                                                                                            <div class="table-responsive">
                                                                                                <table
                                                                                                    class="table table-hover-animation mb-0"
                                                                                                    style="white-space: nowrap;border-radius: 0px 15px 0px 0px;border:0px solid !important;">
                                                                                                    <thead
                                                                                                        class="thead-secondary">
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                style="border-radius: 15px 0px 0px 0px !important;background-color: #fafafa;font-size:1rem;color:#164176;">
                                                                                                                ลำดับ</th>
                                                                                                            <th
                                                                                                                style="font-size: 1rem;background-color: #fafafa;color:#164176;">
                                                                                                                รหัสทรัพย์สิน
                                                                                                            </th>
                                                                                                            <th
                                                                                                                style="font-size: 1rem;background-color: #fafafa;color:#164176;">
                                                                                                                ชื่อทรัพย์สิน
                                                                                                            </th>
                                                                                                            <th
                                                                                                                style="font-size: 1rem;background-color: #fafafa;color:#164176;">
                                                                                                                วันที่เริ่มต้นใช้งาน
                                                                                                            </th>
                                                                                                            <th
                                                                                                                style="font-size: 1rem;background-color: #fafafa;color:#164176;">
                                                                                                                ราคาซื้อ
                                                                                                            </th>
                                                                                                            <th
                                                                                                                style="font-size: 1rem;border-radius: 0px 15px 0px 0px;background-color: #fafafa;color:#164176;">
                                                                                                                มูลค่าเสื่อม
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>

                                                                                                        @php
                                                                                                            $i = 1;
                                                                                                        @endphp
                                                                                                        @foreach ($inventory['list'] as $stock)
                                                                                                            <tr>
                                                                                                                <td>{{ $i++ }}
                                                                                                                </td>
                                                                                                                <td>{{ $stock->stid }}
                                                                                                                </td>
                                                                                                                <td>{{ $stock->stname }}
                                                                                                                </td>
                                                                                                                <td>{{ $stock->stdaystart }}
                                                                                                                </td>
                                                                                                                <td>{{ number_format($stock->stprice) }}
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    {{ $stock->depreciation }}
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
                                                                        </div>
                                                                    </div>
                                                                @endforeach
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
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script language="JavaScript">
        function fncSum() {
            let stprice = document.frmMain.stprice.value
            if (stprice === '' || stprice === null) {
                stprice = 0
            }
            let stageuse = document.frmMain.stageuse.value
            stageuse = (stageuse * 365)
            if (stageuse === '' || stageuse === null) {
                stageuse = 0
            }
            let result = [(parseFloat(stprice) - 0) - 1] / parseFloat(stageuse);
            if (result == 'Infinity' || result == '-Infinity' || isNaN(result)) {
                result = 0
            }
            document.frmMain.stmath.value = (result.toFixed(2));
            // $('#stmath').val(result.toFixed(2));
        }
    </script>
    <script>
        var draw = function() {
            console.log('Table redrawn ' + new Date());
        };

        $('form#submitform').DataTable({
            drawCallback: draw
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#fromDate").datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                autoclose: true,
            }).on('changeDate', function(selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#toDate').datepicker('setStartDate', minDate);
            });

            $("#toDate").datepicker({
                language: 'th-th',
                format: 'dd/mm/yyyy',
                autoclose: true,
            }).on('changeDate', function(selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#fromDate').datepicker('setEndDate', minDate);
            });
        });
    </script>
    <script>
        function temp(form) {
            // var f = parseFloat(form.DegF.value);
            var price = parseFloat(form.DegF.value);
            // var year = $stock - > stdaystart;
            var T = 0;
            T = [(price - 0) - 1] / 1825;
            form.DegC.value = T;
        }
    </script>
@endsection
