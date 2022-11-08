@extends('layouts.main_user')
{{-- css --}}
{{-- js --}}
@section('head')
    <title>Profile</title>
    <style>
        h5,
        .h5 {
            font-size: 20px !important;
        }
    </style>
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
                                    โปรไฟล์
                                </h1>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="col-lg-12 col-sm-4"
                                        style="font-family: 'Kanit', sans-serif; font-weight:400;text-align: -moz-center;">
                                        <img id="cusImg"
                                            src="https://img.icons8.com/cotton/452/user-male--v1.png?fbclid=IwAR2UdoncPPWNUpaaefuqxmFSuG7RP0T1nfCp85xAq---ayciLNjP6pDpvPE"
                                            class="img-fluid"
                                            style="width: 250px;height: 250px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                                        <label for="Image" class="form-label"></label>
                                        <input class="form-control" type="file" id="cusImgFile" accept="image/*"
                                            onchange="preview()" style="width: 250px;margin-top: 5px;">
                                        <div class="card-content">
                                        </div>
                                        <h2 class="mt-2">สุดสวย สวยที่สุด</h2>
                                        <h3>Developer</h3>
                                        <hr>
                                        <div class="row ml-2"style="text-align: start;">
                                            <div class="col-lg-4">
                                                อีเมล</div>
                                            <div class="col-lg-6">example@ipsoft.com</div>
                                        </div>
                                        <div class="row ml-2"style="text-align: start;">
                                            <div class="col-lg-4">
                                                เบอร์โทรศัพท์</div>
                                            <div class="col-lg-6">0936597826</div>
                                        </div>
                                        <div class="row ml-2"style="text-align: start;">
                                            <div class="col-lg-4">
                                                เลขพนักงาน</div>
                                            <div class="col-lg-6">123456</div>
                                        </div>
                                        <div class="row ml-2"style="text-align: start;">
                                            <div class="col-lg-4">
                                                วันเกิด</div>
                                            <div class="col-lg-6">12 กันยายน 2538</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">


                            </div>
                        </div>
                    </div>
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

        function preview1() {
            bankImg.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('bankImgFile').value = null;
            bankImg.src = "";
        }
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $('#confirm-submit').on('click', function() {
        //     Swal.fire({
        //         title: 'คุณต้องการบันทึกใช่ไหม',
        //         text: "คุณแน่ใจใช่ไหม",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'ใช่',
        //         cancelButtonText: ' ปิด',
        //         confirmButtonClass: 'btn btn-primary',
        //         cancelButtonClass: 'btn btn-danger ml-1',
        //         buttonsStyling: false,
        //     }).then(function(result) {
        //         if (result.value) {
        //             Swal.fire({
        //                 type: "success",
        //                 title: 'Deleted!',
        //                 text: 'Your file has been deleted.',
        //                 confirmButtonClass: 'btn btn-success',
        //             })
        //         }
        //     })
        // });
        $('form#submitform').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'คุณต้องการบันทึกใช่ไหม',
                text: "คุณแน่ใจใช่ไหม",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่',
                cancelButtonText: ' ปิด',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function(result) {
                let data = new FormData(this);
                console.log(data);
                // if (result.value) {
                //     $.ajax({
                //         type: "POST",
                //         url: "url",
                //         data: "data",
                //         contentType: 'multipart/form-data',
                //         cache: false,
                //         contentType: false,
                //         processData: false,
                //         success: function (response) {
                //             if (response.successful == true) {
                //                 Swal.fire({
                //                     type: "success",
                //                     title: 'Deleted!',
                //                     text: 'Your file has been deleted.',
                //                     confirmButtonClass: 'btn btn-success',
                //                 })
                //             }
                //         }
                //     });
                // }
            })
        });
    </script>
@endsection
