@extends('layouts.admin')

<head>
    {{-- css --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- js --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"
        integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kanit:wght@500;700&family=Roboto+Condensed&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kanit:wght@500;700&family=Mitr:wght@200&family=Prompt:wght@300&family=Roboto+Condensed&display=swap"
        rel="stylesheet">
</head>

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid mt-2">
            <div class="row mb-2">
                <div class="col-sm-6 ">
                    <div style="font-family: 'Kanit', sans-serif; font-weight:600;">
                        <h1 class="m-0" style="color:#164176"><img src="{{ asset('images/approve.png') }}"
                                class="mr-3">อนุมัติสำเร็จ</h1>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <br>
    <div class="row ">
        <div class="col-lg-12 ">
            <div class="card" style="margin: 25px">
                <div class="card-body ">
                    <div class="active-member ">
                        <div class="table-responsive ">
                            <table class="table table-xs mb-0" style="font-family: 'Prompt', sans-serif; font-weight:400;">
                                <thead>
                                    <tr>
                                        <th style="font-family: 'Kanit', sans-serif; font-weight:600; color:#FFD027">#</th>
                                        <th style="font-family: 'Kanit', sans-serif; font-weight:600; color:#164176">ชื่อ</th>
                                        <th style="font-family: 'Kanit', sans-serif; font-weight:600; color:#FFD027">แผนก</th>
                                        <th style="font-family: 'Kanit', sans-serif; font-weight:600; color:#164176">วันที่ลา</th>
                                        <th style="font-family: 'Kanit', sans-serif; font-weight:600; color:#FFD027">วันที่สิ้นสุด</th>
                                        <th style="text-align: center; font-family: 'Kanit', sans-serif; font-weight:600; color:#164176">สถานะการลา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="./images/avatar/1.jpg " class=" rounded-circle mr-3 " alt=" ">Sarah
                                            Smith</td>
                                        <td>ออกเเบบ</td>
                                        <td>
                                            <span>01/06/2002</span>
                                        </td>
                                        <td>
                                            <span>02/6/2002</span>
                                        </td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px; margin-bottom: 1px; font-family: 'Kanit', sans-serif; font-weight:600;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h4 class="text-white " style="text-align: center;">อนุมัติ</h4>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><img src="./images/avatar/1.jpg " class=" rounded-circle mr-3 " alt=" ">Sarah
                                            Smith</td>
                                        <td>ออกเเบบ</td>
                                        <td>
                                            <span>01/06/2002</span>
                                        </td>
                                        <td>
                                            <span>02/6/2002</span>
                                        </td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px; margin-bottom: 1px; font-family: 'Kanit', sans-serif; font-weight:600;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h4 class="text-white " style="text-align: center;">อนุมัติ</h4>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><img src="./images/avatar/1.jpg " class=" rounded-circle mr-3 " alt=" ">Sarah
                                            Smith</td>
                                        <td>นักพัฒนาระบบ</td>
                                        <td>
                                            <span>01/06/2002</span>
                                        </td>
                                        <td>
                                            <span>02/6/2002</span>
                                        </td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px; margin-bottom: 1px; font-family: 'Kanit', sans-serif; font-weight:600;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h4 class="text-white " style="text-align: center;">อนุมัติ</h4>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><img src="./images/avatar/1.jpg " class=" rounded-circle mr-3 " alt=" ">Sarah
                                            Smith</td>
                                        <td>นักพัฒนาระบบ</td>
                                        <td>
                                            <span>01/06/2002</span>
                                        </td>
                                        <td>
                                            <span>02/6/2002</span>
                                        </td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px; margin-bottom: 1px; font-family: 'Kanit', sans-serif; font-weight:600;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h4 class="text-white " style="text-align: center;">อนุมัติ</h4>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><img src="./images/avatar/2.jpg " class=" rounded-circle mr-3 " alt=" ">Walter
                                            R.</td>
                                        <td>นักพัฒนาระบบ</td>
                                        <td>
                                            <span>01/06/2002</span>
                                        </td>
                                        <td>
                                            <span>02/6/2002</span>
                                        </td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px; margin-bottom: 1px; font-family: 'Kanit', sans-serif; font-weight:600;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h4 class="text-white " style="text-align: center;">อนุมัติ</h4>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><img src="./images/avatar/3.jpg " class=" rounded-circle mr-3 " alt=" ">Andrew
                                            D.</td>
                                        <td>การตลาด</td>
                                        <td>
                                            <span>01/06/2002</span>
                                        </td>
                                        <td>
                                            <span>02/6/2002</span>
                                        </td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px; margin-bottom: 1px; font-family: 'Kanit', sans-serif; font-weight:600;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h4 class="text-white " style="text-align: center;">อนุมัติ</h4>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td><img src="./images/avatar/6.jpg " class=" rounded-circle mr-3 " alt=" "> Megan
                                            S.</td>
                                        <td>การตลาด</td>
                                        <td>
                                            <span>01/06/2002</span>
                                        </td>
                                        <td>
                                            <span>02/6/2002</span>
                                        </td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px; margin-bottom: 1px; font-family: 'Kanit', sans-serif; font-weight:600;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h4 class="text-white " style="text-align: center;">อนุมัติ</h4>
                                                </div>
                                            </div>
                                        </td>


                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td><img src="./images/avatar/4.jpg " class=" rounded-circle mr-3 " alt=" "> Doris
                                            R.</td>
                                        <td>การตลาด</td>
                                        <td>
                                            <span>01/06/2002</span>
                                        </td>
                                        <td>
                                            <span>02/6/2002</span>
                                        </td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px; margin-bottom: 1px; font-family: 'Kanit', sans-serif; font-weight:600;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h4 class="text-white " style="text-align: center;">อนุมัติ</h4>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td><img src="./images/avatar/5.jpg " class=" rounded-circle mr-3 "
                                                alt=" ">Elizabeth W.</td>
                                        <td>การเงิน</td>
                                        <td>
                                            <span>01/06/2002</span>
                                        </td>
                                        <td>
                                            <span>02/6/2002</span>
                                        </td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px; margin-bottom: 1px; font-family: 'Kanit', sans-serif; font-weight:600;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h4 class="text-white " style="text-align: center;">อนุมัติ</h4>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td><img src="./images/avatar/5.jpg " class=" rounded-circle mr-3 "
                                                alt=" ">Elizabeth W.</td>
                                        <td>การเงิน</td>
                                        <td>
                                            <span>01/06/2002</span>
                                        </td>
                                        <td>
                                            <span>02/6/2002</span>
                                        </td>
                                        <td>
                                            <div class="card"
                                                style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px; margin-bottom: 1px; font-family: 'Kanit', sans-serif; font-weight:600;">

                                                <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                    <h4 class="text-white " style="text-align: center;">อนุมัติ</h4>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
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
        </div>
    </div>



    <section class="content">

        <style>
            form {
                padding: 0 100px;
            }

            input[type=text] {
                width: 100%;
                margin-bottom: 20px;
            }

            /* .placeicon{
                                            font-family: fontawesomes;
                                        } */
        </style>


    </section>
    <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
