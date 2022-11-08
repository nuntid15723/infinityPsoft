@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row " style="font-family: 'Kanit', sans-serif; font-weight:600;">
            <div class="col-lg-4 col-sm-4 ">
                <a href="{{ url('/summaryle') }}">
                    <div class="card gradient-1 ">
                        <div class="card-body ">
                            <h2 class="card-title text-white ">ยอดรวมการลา</h2>
                            <div class="d-inline-block ">
                                <h2 class="text-white ">4565</h2>
                            </div>
                            <span class="float-right display-5 opacity-5 "><i class="bi bi-graph-up"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-4 ">
                <div class="card gradient-2 ">
                    <div class="card-body ">
                        <h2 class="card-title text-white ">เงินเดือนพนักงาน</h2>
                        <div class="d-inline-block ">
                            <h2 class="text-white ">$ 8541</h2>
                        </div>
                        <span class="float-right display-5 opacity-5 "><i class="bi bi-cash-stack "></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 ">
                <a href="{{ url('/employee') }}" alt="">
                    <div class="card gradient-3 ">
                        <div class="card-body ">
                            <h2 class="card-title text-white ">พนักงาน</h2>
                            <div class="d-inline-block">
                                <h2 class="text-white ">4565</h2>
                            </div>
                            <span class="float-right display-5 opacity-5 "><i class="fa fa-users "></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row " style="font-family: 'Prompt', sans-serif; font-weight:400;">
        <div class="col-lg-12 ">
            <div class="row ">
                <div class="col-lg-8 col-sm-4 ">
                    <div class="card " style="margin-left: 30PX; margin-right: 10px;">
                        <div class="card-body pb-0 d-flex justify-content-between ">
                            <div>
                                <h4 class="mb-1 ">Product Sales</h4>
                                <p>Total Earnings of the Month</p>
                                <h3 class="m-0 ">$ 12,555</h3>
                            </div>
                            <div>
                                <ul>
                                    <li class="d-inline-block mr-3 "><a class="text-dark " href="# ">Day</a></li>
                                    <li class="d-inline-block mr-3 "><a class="text-dark " href="# ">Week</a></li>
                                    <li class="d-inline-block "><a class="text-dark " href="# ">Month</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-wrapper ">
                            {{-- <canvas id="chart_widget_2 "></canvas> --}}
                            <canvas id="myChart"
                                style="display: block; box-sizing: border-box; height: 200px; width: 1047.2px;" width="1309"
                                height="490"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 ">
                    <div class="card " style=" margin-right: 30px;">
                        <div class="card-body pb-0 d-flex justify-content-between ">
                            <div>
                                <h4 class="mb-1 ">Product Sales</h4>
                                <p>Total Earnings of the Month</p>
                                <h3 class="m-0 ">$ 12,555</h3>
                            </div>
                            <div>
                                <ul>
                                    <li class="d-inline-block mr-3 "><a class="text-dark " href="# ">Day</a></li>
                                    <li class="d-inline-block mr-3 "><a class="text-dark " href="# ">Week</a></li>
                                    <li class="d-inline-block "><a class="text-dark " href="# ">Month</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="chart-wrapper ">
                        {{-- <canvas id="chart_widget_2 "></canvas> --}}
                        <canvas id="myChart" style="display: block; box-sizing: border-box; height: 200px; width: 1047.2px;"
                            width="1309" height="490"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card " style="margin-left: 30PX; margin-right: 30px;">
                <div class="card-body ">
                    <div class="active-member " style="font-family: 'Prompt', sans-serif; font-weight:400;">
                        <div class="table-responsive ">
                            <table class="table table-xs mb-0 ">
                                <thead>
                                    <tr style="font-family: 'Kanit', sans-serif; font-weight:600;">
                                        <th>ชื่อ</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>แผนก</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="./images/avatar/1.jpg " class=" rounded-circle mr-3 " alt=" ">Sarah
                                            Smith</td>
                                        <td>iPhone X</td>
                                        <td>
                                            <span>United States</span>
                                        </td>
                                        <td>
                                            <div>
                                                <input id="chck" type="checkbox">
                                                <label for="chck" class="check-trail">
                                                    <span class="check-handler"></span>
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/2.jpg " class=" rounded-circle mr-3 " alt=" ">Walter
                                            R.</td>
                                        <td>Pixel 2</td>
                                        <td><span>Canada</span></td>
                                        <td>
                                            <div>
                                                <input id="chck2" type="checkbox">
                                                <label for="chck2" class="check-trail">
                                                    <span class="check-handler"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/3.jpg " class=" rounded-circle mr-3 " alt=" ">Andrew
                                            D.</td>
                                        <td>OnePlus</td>
                                        <td><span>Germany</span></td>
                                        <td>
                                            <div>
                                                <input id="chck3" type="checkbox">
                                                <label for="chck3" class="check-trail">
                                                    <span class="check-handler"></span>
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/6.jpg " class=" rounded-circle mr-3 " alt=" "> Megan
                                            S.</td>
                                        <td>Galaxy</td>
                                        <td><span>Japan</span></td>
                                        <td>
                                            <div>
                                                <input id="chck4" type="checkbox">
                                                <label for="chck4" class="check-trail">
                                                    <span class="check-handler"></span>
                                                </label>
                                            </div>
                                        </td>


                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/4.jpg " class=" rounded-circle mr-3 " alt=" "> Doris
                                            R.</td>
                                        <td>Moto Z2</td>
                                        <td><span>England</span></td>
                                        <td>
                                            <div>
                                                <input id="chck5" type="checkbox">
                                                <label for="chck5" class="check-trail">
                                                    <span class="check-handler"></span>
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/5.jpg " class=" rounded-circle mr-3 "
                                                alt=" ">Elizabeth W.</td>
                                        <td>Notebook Asus</td>
                                        <td><span>China</span></td>
                                        <td>
                                            <div>
                                                <input id="chck6" type="checkbox">
                                                <label for="chck6" class="check-trail">
                                                    <span class="check-handler"></span>
                                                </label>
                                            </div>
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
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
