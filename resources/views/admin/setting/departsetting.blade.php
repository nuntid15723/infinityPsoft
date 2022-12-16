@extends('layouts.main_admin')
@section('style')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/extensions/shepherd-theme-default.css') }}">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <a href="https://www.chartjs.org/docs/latest/getting-started/" target="_blank"></a>
    <!-- END: Custom CSS--> --}}

    <style>
        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: 250px;
            font-size: 17px;
        }
    </style>
@endsection
@section('head')
    <title>ตั้งค่าประเภทแผนก</title>
@endsection
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
</style>
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="container-fluid mt-2">
                    <div class="row mb-2">
                        <div class="col-sm-6 ">
                            <div style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                <h1 class="m-0" style="color:#555555;font-family: 'Kanit', sans-serif; font-weight:600;">
                                    <img src="{{ asset('images/list.png') }}" class="mr-2"
                                        style="height: 44px;
                                        width: 46px;">ประเภทแผนก
                                </h1>
                            </div>
                        </div><!-- /.col -->
                    </div>
                    <!-- Form and scrolling Components start -->
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-sm-6" style="margin-top: -55px;font-family: 'Kanit', sans-serif; font-weight:500;">
                            <div style="text-align: end;">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary text-white px-5"
                                    style="font-size: 18px; border-radius: 23px; padding-left: 2rem !important;
                                    padding-right: 2rem !important; background-color:#164176 !important"
                                    data-toggle="modal" data-target="#inlineFormAdd"><i class="fa fa-plus mr-1"
                                        style="font-size: 1.3rem !important;"></i>
                                    เพิ่มประเภทแผนก
                                    </a>
                                </button>
                                <!-- Modal add-->
                                <form action="{{ route('storedepart') }}" method="POST" class="form form-vertical"
                                    enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="modal fade text-left" id="inlineFormAdd" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content"
                                                style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33" style="color: #164176;"><i
                                                            class="fa fa-plus mr-1"
                                                            style="font-size: 1.3rem;"></i>เพิ่มประเภทแผนก</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        style="font-size: 1.0rem !important;color: #525252;">รหัสประเภทแผนก
                                                        :
                                                    </label>
                                                    <div class="form-group">
                                                        <input type="text" id="" name="dpId"
                                                            value="{{ $dpid }}" disabled
                                                            placeholder="รหัสประเภทแผนก" class="form-control">
                                                    </div>

                                                    <label
                                                        style="font-size: 1.0rem !important;color: #525252;">ชื่อประเภทแผนก
                                                        :
                                                    </label>
                                                    <div class="form-group">
                                                        <input type="text" id="" name="dpname" value=""
                                                            placeholder="ชื่อประเภทแผนก" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer" style="justify-content: center;">
                                                    <button type="submit" class="btn btn-outline round mr-1 mb-1"
                                                        style="background-color: #164176;color: white;">ยืนยัน
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary round mr-1 mb-1"
                                                        data-dismiss="modal" aria-label="Close">ยกเลิก</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--End Modal add-->
                                <!-- Modal Edit-->
                                <div class="modal fade text-left" id="inlineFormEdit" tabindex="-1" role="dialog"
                                    aria-labelledby="inlineFormEdit" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content"
                                            style="font-family: 'Kanit', sans-serif; font-weight:500;">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="inlineFormEdit" style="color: #164176;"><i
                                                        class="feather icon-edit mr-1"
                                                        style="font-size: 1.3rem;"></i>แก้ไขประเภทแผนก</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            {{-- @foreach ($department as $data)
                                                {{ $data->title }}
                                            @endforeach --}}
                                            <form action="{{ route('update.department') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" name="Id" value=""
                                                            id="department-id" placeholder="รหัสประเภทแผนก"
                                                            class="form-control" hidden>
                                                    </div>
                                                    <label
                                                        style="font-size: 1.0rem !important;color: #525252;">รหัสประเภทแผนก
                                                        :
                                                    </label>

                                                    <div class="form-group">
                                                        <input type="text" name="dpId" value="" readonly
                                                            id="department-dpid" placeholder="รหัสประเภทแผนก"
                                                            class="form-control">
                                                    </div>

                                                    <label
                                                        style="font-size: 1.0rem !important;color: #525252;">ชื่อประเภทแผนก
                                                        :
                                                    </label>
                                                    <div class="form-group">
                                                        <input type="text" name="dpname" value=""
                                                            id="department-dpname" placeholder="ชื่อประเภทแผนก"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                @include('sweetalert::alert')
                                                <div class="modal-footer" style="justify-content: center;">
                                                    <button type="submit" class="btn btn-outline round mr-1 mb-1"
                                                        style="background-color: #164176;color: white;">ยืนยัน
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-outline-secondary round mr-1 mb-1"
                                                        data-dismiss="modal" aria-label="Close">ยกเลิก</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--End Modal Edit-->
                            </div>
                            <!-- Form and scrolling Components end -->
                        </div>
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <section id="add-row">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <h4 class="card-title">Add rows</h4>
                                    </div> --}}
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="table-responsive mt-1 dataTables_scroll">
                                                <table class="table zero-configuration "
                                                    style="white-space: nowrap;font-family: 'Kanit', sans-serif; font-weight:600;border: 0px  solid  !important">
                                                    <thead class="thead">
                                                        <tr class="dataTables_scroll">
                                                            <th style=" border-radius: 15px 0px 0px 0px;font-size: 1rem;">
                                                                ลำดับ</th>
                                                            <th style=" font-size: 1rem;">
                                                                รหัสประเภท</th>
                                                            <th style="font-size: 1rem;">
                                                                ชื่อประเภทแผนก
                                                            </th>
                                                            <th style="font-size: 1rem;">
                                                            </th>
                                                            {{-- <th style="font-size: 1rem;">

                                                                เงินเดือน
                                                            </th>
                                                            <th style=" border-radius: 0px 14px 0px 0px;font-size: 1rem;">
                                                            </th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;

                                                        @endphp
                                                        @foreach ($data as $cus)
                                                            <tr>
                                                                <td>{{ ++$i }}</td>
                                                                <td>{{ $cus->dpid }}</td>
                                                                <td>
                                                                    {{ $cus->dpname }}
                                                                </td>
                                                                <td style="padding: 0;">
                                                                    <div class="d-flex" style="justify-content: center;">
                                                                        {{-- <div>{{ $cus->salary }} </div> --}}
                                                                        <div class="btn-group dropdown">
                                                                            <div class="btn-group mr-1 mt-1">
                                                                                <button type="button" class="btn "
                                                                                    {{-- data-toggle="modal"
                                                                                    data-target="#inlineFormEdit" --}}
                                                                                    onclick="getData('{{ $cus->id }}')"
                                                                                    style="background-color: #FFD027;height: 30px;width: 75px;padding: 0; color:white;border-radius: 7px;">
                                                                                    <i class="feather icon-edit"></i>แก้ไข
                                                                                </button>
                                                                                <br>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="custom-control custom-switch custom-switch-success mr-2 "
                                                                                    style="margin-top: 4px;">
                                                                                    <input type="checkbox" name="dpstatus"
                                                                                        id="customSwitch4{{ $cus->id }}"
                                                                                        class="custom-control-input"
                                                                                        {{ $cus->dpstatus ? 'checked' : '' }}
                                                                                        onclick="changeUserStatus(event.target, {{ $cus->id }});">
                                                                                    <label
                                                                                        class="custom-control-label mt-1"
                                                                                        for="customSwitch4{{ $cus->id }}"></label>
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
    <script type="text/javascript">
        function getData(id) {
            console.log(id)
            var url = "{{ route('department.show', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data) {
                $('#inlineFormEdit').modal('show');
                $('#department-id').val(data.id);
                console.log(data);
                $("#department-dpid").val(data.dpid);
                $("#department-dpname").val(data.dpname);
                $("#department-dpstatus").val(data.dpstatus);
            })
        }
        // ('#close_modal').click(function(){
        //     $('#exampleModalCenter').modal('hide');
        // })
    </script>
    <script>
        function changeUserStatus(_this, id) {
            var dpstatus = $(_this).prop('checked') == true ? 1 : 0;
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('updatestatus.department') }}",
                data: {
                    _token: _token,
                    id: id,
                    dpstatus: dpstatus
                },
                success: function(result) {
                    if (result.successful == true) {
                        // toastr.success('อัพเดตสถานะ', {timeOut: 100000})
                        toastr.success('อัพเดตสถานะแล้ว', {timeOut: 5000})
                    } else {
                        toastr.error('เกิดข้อผิดพลาด')
                    }

                }
            });
        }
    </script>
@endsection
