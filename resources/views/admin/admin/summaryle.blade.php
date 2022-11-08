@extends('layouts.admin')
@section('content')
    {{-- <style>
    body{
        font-family: 'Kanit', sans-serif; font-weight:600;
    }
</style> --}}
    <div class="container-fluid mt-2 ">
        <div class="row ">
            <div class="col-lg-4 col-sm-4 ">
                <a class="has" href="{{ url('/PendingApproval') }}" alt="">
                    <div class="card gradient-1 "
                        style="background-image: linear-gradient(230deg, #FFA8A8, #FCFF00, #F7FA00 );">
                        <div class="card-body ">
                            <b class="logo-abbr"><img src="images/Other.png" alt="" style="margin-left: 82px;"> </b>
                            <div class="d-inline-block ">
                                {{-- <h2 class="text-white " style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                รออนุมัติ</h2> --}}
                                <h2 class="text-white " style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    รออนุมัติ</h2>
                            </div>
                            {{-- <span class="float-right display-5 opacity-5 "><i class="bi bi-graph-up"></i></span> --}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-4 ">
                <a class="has" href="{{ url('/approve') }}" alt="">
                    <div class="card gradient-2 "
                        style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C );">
                        <div class="card-body ">
                            <b class="logo-abbr"><img src="images/Other01.png" alt=""
                                    style="width: 120px;height: 100px; margin-left: 82px;"> </b>
                            <div class="d-inline-block ">
                                <h2 class="text-white " style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    อนุมัติ
                                </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-4 ">
                <a class="has" href="{{ url('/disapproved') }}" alt="">
                    <div class="card gradient-3 "
                        style="background-image: linear-gradient(230deg, #F8A8FF, #FD6585, #FC76A3);">
                        <div class="card-body ">
                            <b class="logo-abbr"><img src="images/Other02.png" alt=""
                                    style="width: 120px;height: 100px; margin-left: 82px;"> </b>
                            <div class="d-inline-block">
                                <h2 class="text-white " style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                    ไม่อนุมัติ</h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-12 ">
            <div class="card " style="margin: 25px;">
                <div class="card-body ">
                    <div class="active-member ">
                        <div class="table-responsive " style="font-family: 'Prompt', sans-serif; font-weight:400;">
                            <table class="table table-xs mb-0 ">
                                <thead >
                                    <h2 style="font-family: 'Kanit', sans-serif; font-weight:600; color: #164176;">ประวิติการลา</h2>
                                    <tr>
                                        <th style="font-family: 'Kanit', sans-serif; font-weight:600;color: #FFD027;">#</th>
                                        <th style="font-family: 'Kanit', sans-serif; font-weight:600;color: #164176;">ชื่อ</th>
                                        <th style="font-family: 'Kanit', sans-serif; font-weight:600;color: #FFD027;">แผนก</th>
                                        <th style="font-family: 'Kanit', sans-serif; font-weight:600;color: #164176;">วันที่ลา</th>
                                        <th style="font-family: 'Kanit', sans-serif; font-weight:600;color: #FFD027;">วันที่สิ้นสุด</th>
                                        <th style="text-align: center; font-family: 'Kanit', sans-serif; font-weight:600;color: #164176;">
                                            สถานะการลา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;">1</td>
                                        <td><img src="./images/avatar/1.jpg "
                                                class=" rounded-circle mr-3 " alt="" >Sarah
                                            Smith</td>
                                        <td  style="font-family: 'Prompt', sans-serif; font-weight:400;">นักพัฒนาโปรแกรม</td>
                                        <td>
                                            <span style="font-family: 'Prompt', sans-serif; font-weight:400;">United States</span>
                                        </td>
                                        <td>
                                            <span style="font-family: 'Prompt', sans-serif; font-weight:400;">United States</span>
                                        </td>
                                        <td>
                                            <a class="has" href="#" alt="">
                                                <div class="card"
                                                    style="background-image: linear-gradient(230deg, #F8A8FF, #FD6585, #FC76A3 ); margin-bottom: 1px;">

                                                    <div class="d-inline-block" style="margin: auto;margin-top: 1px;">
                                                        <h4 class="text-white"
                                                            style="margin-top: 5px; font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            ไม่อนุมัติ</h4>
                                                    </div>

                                                    {{-- <input id="chck" type="checkbox">
                                                <label for="chck" class="check-trail">
                                                    <span class="check-handler"></span>
                                                </label> --}}
                                                </div>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;">2</td>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;"><img src="./images/avatar/1.jpg " class=" rounded-circle mr-3 " alt=" ">Sarah
                                            Smith</td>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;">iPhone X</td>
                                        <td>
                                            <span>United States</span>
                                        </td>
                                        <td>
                                            <span>United States</span>
                                        </td>
                                        <td>
                                            <a class="has" href="#" alt="">
                                                <div class="card"
                                                    style="background-image: linear-gradient(230deg, #FF8E8E, #FFC107, #fcff31 ); margin-bottom: 1px;">

                                                    <div class="d-inline-block" style="margin: auto;margin-top: 1px;">
                                                        <h4 class="text-white "
                                                            style="margin-top: 5px; font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            อนุรอมัติ</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;">3</td>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;"><img src="./images/avatar/1.jpg " class=" rounded-circle mr-3 " alt=" ">Sarah
                                            Smith</td>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;">iPhone X</td>
                                        <td>
                                            <span style="font-family: 'Prompt', sans-serif; font-weight:400;">United States</span>
                                        </td>
                                        <td>
                                            <span style="font-family: 'Prompt', sans-serif; font-weight:400;">United States</span>
                                        </td>
                                        <td><a class="has" href="#" alt="">
                                                <div class="card"
                                                    style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px;">

                                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                        <h4 class="text-white "
                                                            style="text-align: center; font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            อนุมัติ</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;">4</td>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;"><img src="./images/avatar/1.jpg " class=" rounded-circle mr-3 " alt=" ">Sarah
                                            Smith</td>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;">iPhone X</td>
                                        <td style="font-family: 'Prompt', sans-serif; font-weight:400;">
                                            <span>United States</span>
                                        </td>
                                        <td>
                                            <span>United States</span>
                                        </td>
                                        <td>
                                            <a class="has" href="#" alt="">
                                                <div class="card"
                                                    style="background-image: linear-gradient(230deg, #C6F6CB, #06C360,#1CF38C ); margin-bottom: 1px;">

                                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                        <h4 class="text-white "
                                                            style="text-align: center; font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            อนุมัติ</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><img src="./images/avatar/2.jpg " class=" rounded-circle mr-3 " alt=" ">Walter
                                            R.</td>
                                        <td>Pixel 2</td>
                                        <td><span>Canada</span></td>
                                        <td><span>Canada</span></td>
                                        <td>
                                            <a class="has" href="#" alt="">
                                                <div class="card"
                                                    style="background-image: linear-gradient(230deg, #F8A8FF, #FD6585, #FC76A3 ); margin-bottom: 1px;">

                                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                        <h4 class="text-white "
                                                            style="text-align: center; font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            ไม่อนุมัติ</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><img src="./images/avatar/3.jpg " class=" rounded-circle mr-3 " alt=" ">Andrew
                                            D.</td>
                                        <td>OnePlus</td>
                                        <td><span>Germany</span></td>
                                        <td><span>Germany</span></td>
                                        <td>
                                            <a class="has" href="#" alt="">
                                                <div class="card"
                                                    style="background-image: linear-gradient(230deg, #FF8E8E, #FFC107, #fcff31 ); margin-bottom: 1px;">

                                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                        <h4 class="text-white "
                                                            style="text-align: center; font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            รออนุมัติ</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td><img src="./images/avatar/6.jpg " class=" rounded-circle mr-3 " alt=" "> Megan
                                            S.</td>
                                        <td>Galaxy</td>
                                        <td><span>Japan</span></td>
                                        <td><span>Japan</span></td>
                                        <td>
                                            <a class="has" href="#" alt="">
                                                <div class="card"
                                                    style="background-image: linear-gradient(230deg, #F8A8FF, #FD6585, #FC76A3 ); margin-bottom: 1px;">

                                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                        <h4 class="text-white "
                                                            style="text-align: center; font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            ไม่อนุมัติ</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>


                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td><img src="./images/avatar/4.jpg " class=" rounded-circle mr-3 " alt=" "> Doris
                                            R.</td>
                                        <td>Moto Z2</td>
                                        <td><span>England</span></td>
                                        <td><span>England</span></td>
                                        <td>
                                            <a class="has" href="#" alt="">
                                                <div class="card"
                                                    style="background-image: linear-gradient(230deg, #FF8E8E, #FFC107, #fcff31 ); margin-bottom: 1px;">

                                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                        <h4 class="text-white "
                                                            style="text-align: center; font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            รออนุมัติ</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td><img src="./images/avatar/5.jpg " class=" rounded-circle mr-3 "
                                                alt=" ">Elizabeth W.</td>
                                        <td>Notebook Asus</td>
                                        <td><span>China</span></td>
                                        <td><span>China</span></td>
                                        <td>
                                            <a class="has" href="#" alt="">
                                                <div class="card"
                                                    style="background-image: linear-gradient(230deg, #F8A8FF, #FD6585, #FC76A3 ); margin-bottom: 1px;">

                                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                        <h4 class="text-white "
                                                            style="text-align: center; font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            ไม่อนุมัติ</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td><img src="./images/avatar/5.jpg " class=" rounded-circle mr-3 "
                                                alt=" ">Elizabeth W.</td>
                                        <td>Notebook Asus</td>
                                        <td><span>China</span></td>
                                        <td><span>China</span></td>
                                        <td>
                                            <a class="has" href="#" alt="">
                                                <div class="card"
                                                    style="background-image: linear-gradient(230deg, #FF8E8E, #FFC107, #fcff31 ); margin-bottom: 1px;">
                                                    <div class="d-inline-block" style="margin: auto;margin-top: 5px;">
                                                        <h4 type="text/css" class="text-white "
                                                            style="text-align: center; font-family: 'Kanit', sans-serif; font-weight:600;">
                                                            รออนุมัติ</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
