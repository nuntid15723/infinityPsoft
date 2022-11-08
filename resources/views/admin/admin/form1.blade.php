@extends('layouts.admin')
@section('content')

  
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid mt-2">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <div>
                        <h1 class="m-0"
                            style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;"><img
                                src="{{ asset('images/absent.png') }}" alt="Infinity" class="mr-3">เเบบฟอร์มใบลา
                        </h1>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- start form --}}
    <div class="container">
        <div class="row" style="font-family: 'Prompt', sans-serif; font-weight:600;">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="card">
                    {{-- <form style="margin: 30px" action="{{ route('addd') }}" enctype="multipart/form-data " method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary" style="margin-right: 123px;" id="save">บันทึก</button>
                    </form> --}}
                    <form style="margin: 30px" action="{{ route('insertform') }}" enctype="multipart/form-data " method="post">
                        @csrf
                        <div class="form-group row offset-1 mt-1">
                            <label for="exampleInputUsername" class="col-sm-3 col-form-label">ชื่อ - นามสกุล</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="exampleInputUsername" name="Fullname"
                                    placeholder="ชื่อ - นามสกุล">
                            </div>

                        </div>


                        <div class="form-group row offset-1">
                            <label for="exampleInputEmail" class="col-sm-3 col-form-label">อีเมล</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="exampleInputEmail" name="email"
                                    placeholder="อีเมล">
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label for="exampleInputType" class="col-sm-3 col-form-label">ประเภทการลา</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="Typeofleave">
                                    <option>ประเภทการลา</option>
                                    <option class="btn btn-primary" data-toggle="collapse" href="#collapseExample1"
                                        role="button" aria-expanded="false" name="" aria-controls="collapseExample">ลากิจ
                                    </option>
                                    <option>ลาพักร้อน</option>
                                    <option class="btn btn-primary" data-toggle="collapse" name="" href="#collapseExample"
                                        role="button" aria-expanded="false" name="" aria-controls="collapseExample">ลาป่วย
                                    </option>
                                </select>
                                {{-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    Link with href
                                </a> --}}
                            </div>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="form-group row offset-1">
                                <label for="exampleInputType" class="col-sm-3 col-form-label">ใบรับรองเเพทย์</label>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" name="lafile" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="form-group row offset-1">
                            <label for="exampleInputType" class="col-sm-3 col-form-label">ใบรับรองเเพทย์</label>
                            <div class="col-sm-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">เลือกไฟล์</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                        </div> --}}


                        <div class="form-group row offset-1">
                            <label class="col-sm-3 col-form-label">วันที่ต้องการลา</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="datepicker1" name="startla"
                                    value="<?= date('d-m-y', strtotime(date('Y-m-d'))) ?>">
                            </div>
                            <div class="input-group-addon mx-1">ถึง
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="datepicker2" name="endla"
                                    value="<?= date('d-m-y', strtotime(date('Y-m-d'))) ?>">
                            </div>
                        </div>

                        <div class="form-group row offset-1">
                            <label class="col-sm-3 col-form-label"
                                style="font-family: 'Kanit', sans-serif; font-weight:600;">เวลาที่ต้องการลา</label>
                            <input type="number" name="hour" value="2" min="0" max="4" step="1" data-decimals="2" />
                        </div>

                        <div class="form-group row offset-1">
                            <div class="col-lg-3">
                                <label class="col-form-label">เหตุผลการลา</label>
                            </div>
                            <div class="col-lg-7">
                                <textarea type="text" name="reasonla" id="maxlength-textarea" class="form-control" maxlength="100" rows="3"
                                    placeholder="เหตุผลการลา"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row offset-4">
                            <!-- Button trigger modal -->
                            <button  type="submit" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalScrollable" id="save"
                                style="background-color: #164176;font-family: 'Kanit', sans-serif; font-weight:600;border-radius: 30px;width: 100;height: 40px;">
                                ยืนยัน
                            </button>
                            {{-- <button type="submit" class="btn btn-primary" style="margin-right: 123px;"
                                id="save">บันทึก</button> --}}

                            <!-- Modal -->
                            {{-- <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('images/finished.png') }}" width="450" height="400">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-sm-2"></div>
                            {{-- <button type="submit" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalScrollable"  id="save"
                                style="background-color: #144076;font-family: 'Kanit', sans-serif; font-weight:600;border-radius: 30px;width: 100;height: 40px;">
                                ยืนยัน
                            </button> --}}
                            {{-- <button type="submit" class="btn btn-primary" style="margin-right: 123px;" id="save">บันทึก</button> --}}
                            <button type="button" class="btn btn-outline-secondary"
                                style="font-family: 'Kanit', sans-serif; font-weight:600;border-radius: 30px;width: 100;height: 40px;">ยกเลิก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        {
            $("input[type='number']").inputSpinner();
        } {
            var date_start = new Date();
            date_start.setDate(date_start.getDate());
            var date_end = new Date();
            date_end.setDate(date_end.getDate() + 30);
            $('#datepicker2').datepicker({
                format: 'yyyy-mm-dd',
                language: 'th',
                startDate: date_start,
                endDate: date_end
            });
        } {
            var date_start = new Date();
            date_start.setDate(date_start.getDate());
            $('#datepicker1').datepicker({
                format: 'yyyy-mm-dd',
                language: 'th',
                startDate: date_start,
            });
        }
    </script>

@endsection
