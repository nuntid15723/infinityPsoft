<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head')
    {{-- <title> INFINITY </title> --}}
    <link rel="apple-touch-icon" href="{{ asset('images/infinityV2.png') }}">
    <link rel="shortcut icon" href="{{ asset('app-assets/images/ico/V2.ico') }}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/ag-grid/ag-grid.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/ag-grid/ag-theme-material.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">



    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/tour/tour.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/forms/validation/form-validation.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kanit:wght@100;200&family=Mitr:wght@200&family=Prompt:wght@300&family=Roboto+Condensed&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-user.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/aggrid.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link href="{{ asset('bootstrap-datepicker-thai/css/datepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toastr.css') }}">


    <!-- END: Custom CSS-->

    <style>
        .dataTables_scroll {
            /* border: 1px solid #ccc; */
            margin: 1.5rem 0;
            border-radius: 15px
                /* border-top-left-radius: 8px;
             border-top-right-radius: 4px;
             border-bottom-left-radius: 4px;
             border-bottom-right-radius: 4px; */
        }

        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: 250px;
            font-size: 18px;
            border-radius: 15px
        }

        .error {
            color: red !important;
            font-style: italic;
            border-color: red !important;
        }

        strong {
            font-weight: 400 !important;
        }

        .nav.nav-tabs .nav-item .nav-link.active {
            color: #164176;
        }

        .nav.nav-tabs .nav-item .nav-link.active:after {
            background: linear-gradient(30deg, #164176, rgb(110, 121, 224)) !important;
            box-shadow: 0 0 8px 0 rgb(67, 84, 240) !important;
        }

        .table td {
            font-weight: 400 !important;
            font-size: 1.0rem !important;

        }

        table.dataTable thead th,
        table.dataTable thead td,
        table.dataTable tfoot th,
        table.dataTable tfoot td {
            font-size: 1.0rem;
            border: 0;
            color: #164176;
        }

        .swal2-title {
            position: relative;
            max-width: 100%;
            margin: 0 0 0.4em;
            padding: 0;
            color: #595959;
            font-size: 1.875em;
            font-weight: 600;
            font-family: 'Kanit', sans-serif;
            font-weight: 400;
            text-align: center;
            text-transform: none;
            word-wrap: break-word;
        }

        .swal2-styled.swal2-confirm {
            border: 0;
            border-radius: 0.25em;
            background: initial;
            background-color: #164176 !important;
            color: #fff;
            font-size: 1.0625em;
        }

        .datepicker {
            font-size: 0.85rem;
            border: 2;
            font-family: 'Kanit', sans-serif;
            font-weight: 400 !important;
        }

        .disablediv {
            pointer-events: none;
            opacity: 0.4;
        }

        .loader {
            display: none;
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 999999999999999999999999;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #toast-container>.toast-success {
            max-width: 181px;
            background-color: #0ba008;
            font-size: 15px;
        }
    </style>
    @yield('style')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns" style="background: color;background-color: white; ">
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content" style="font-family: 'Kanit', sans-serif; font-weight:800;">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                        class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">

                            <!-- select.bookmark-select-->
                            <!--   option Chat-->
                            <!--   option email-->
                            <!--   option todo-->
                            <!--   option Calendar-->
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">

                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="ficon feather icon-bell"></i>
                                <span class="badge badge-pill badge-primary badge-up bellcount">0</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white"> <strong class="bellcount">0</strong> ใหม่</h3><span
                                            class="notification-title">การแจ้งเตือน</span>
                                    </div>
                                </li>

                                <li class="scrollable-container media-list" id="data_notify">
                                </li>
                                <form action="{{ route('update.read') }}" method="GET">
                                    @csrf
                                    {{-- <input type="text" value="1"id="status_read" name="status_read" hidden> --}}
                                    <li class="dropdown-menu-footer">
                                        <a class="dropdown-item p-1 text-center" onclick="readAll()">อ่านทั้งหมด</a>
                                    </li>
                                </form>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name text-bold-600">{{ Auth::user()->fullname }} </span><span
                                        class="user-status"><i
                                            class="fa fa-circle font-small-3 text-success mr-50"></i> ใช้งานอยู่</span>
                                </div><span>
                                    @if (Auth::user()->emimg != null)
                                        <img class="round"src="{{ asset('imguse/' . Auth::user()->emimg) }}"
                                            alt="avatar"height="40" width="40">
                                    @else
                                        <img class="round"src="https://i.pinimg.com/564x/a5/e8/1f/a5e81f19cf2c587876fd1bb08ae0249f.jpg"
                                            alt="avatar"height="40" width="40">
                                    @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                {{-- <a class="dropdown-item" href="{{ route('logout') }}"><i class="feather icon-user"></i> Edit Profile</a> --}}
                                {{-- <a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My Inbox</a>
                                <a class="dropdown-item" href="app-todo.html"><i class="feather icon-check-square"></i> Task</a>
                                <a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a> --}}
                                {{-- <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i
                                        class="feather icon-power"></i>ออกจากระบบ</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    {{-- <ul class="main-search-list-defaultlist d-none"style="font-family: 'Kanit', sans-serif; font-weight:800;">
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="../../../app-assets/images/icons/xls.png" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small
                            class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="../../../app-assets/images/icons/jpg.png" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="../../../app-assets/images/icons/pdf.png" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="../../../app-assets/images/icons/doc.png" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">{{ Auth::user()->fullname }}</p><small
                            class="text-muted">{{ Auth::user()->emimg }}</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">{{ Auth::user()->department }}</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-14.jpg"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                            Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span
                        class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul> --}}
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header" style="display: flex; margin-top: 10px; margin-bottom: 5px;">
            <div style="width: 25%"></div>
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/infinityV2.png') }}"style="max-width: 100px;">
            </a>
            {{-- <div style="width: 25%"></div> --}}
            {{-- <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Infinity</h2>
                    </a>
                </li>
            </ul> --}}
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                style="margin-top: 18px; font-family: 'Kanit', sans-serif; font-weight:800;">
                {{-- <li class=" navigation-header"><span>Dashboard</span>
                </li> --}}
                <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }} nav-item"><a
                        href="{{ route('dashboard') }}"><i class="bi bi-house-door-fill"
                            style="margin-top: 3px;"></i><span class="menu-title" data-i18n="Email"
                            style="font-size: 18px">หน้าหลัก</span></a>
                </li>
                <li class="{{ Request::routeIs('') ? 'active' : '' }} nav-item">
                    <a href="{{ route('employee') }}"><i class="bi bi-people-fill"style="margin-top: 3px;"></i><span
                            class="menu-title" data-i18n="Calender"style="font-size: 18px; ">จัดการสมาชิก</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::routeIs('employee') ? 'active' : '' }} nav-item"><a
                                href="{{ route('employee') }}"><i class="feather icon-circle"
                                    style="font-size: 1.2rem;"></i><span class="menu-item">รายชื่อพนักงาน</span></a>
                        </li>
                        <li class="{{ Request::routeIs('addEmployee1') ? 'active' : '' }} nav-item"><a
                                href="{{ route('addEmployee1') }}"><i class="feather icon-circle"
                                    style="font-size: 1.2rem;"></i><span class="menu-item">เพิ่มพนักงาน</span></a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::routeIs('work') ? 'active' : '' }} nav-item"><a href="{{ route('work') }}"><i
                            class="bi bi-clock-history"style="margin-top: 3px;"></i><span class="menu-title"
                            data-i18n="Chat"style="font-size: 18px; ">ตารางพนักงาน</span></a>
                </li>
                <li class="{{ Request::routeIs('salary') ? 'active' : '' }} nav-item"><a
                        href="{{ route('salary') }}"><i class="bi bi-cash"style="margin-top: 3px;"></i><span
                            class="menu-title" data-i18n="Chat"style="font-size: 18px; ">จัดการเงินเดือน</span></a>
                </li>
                <li class="{{ Request::routeIs('') ? 'active' : '' }} nav-item"><a
                        href="{{ route('sumleavework') }}"><i
                            class="bi bi-file-earmark-text"style="margin-top: 3px;"></i><span class="menu-title"
                            data-i18n="Chat"style="font-size: 18px; ">การลา</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::routeIs('absent') ? 'active' : '' }} nav-item"><a
                                href="{{ route('absent') }}"><i
                                    class="feather icon-circle"style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Shop">แบบฟอร์มใบลา</span></a>
                        </li>
                        <li class="{{ Request::routeIs('sumleavework') ? 'active' : '' }} nav-item"><a
                                href="{{ route('sumleavework') }}"><i
                                    class="feather icon-circle"style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Checkout">ประวัติการลา</span></a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="{{ Request::routeIs('stockhome') ? 'active' : '' }} nav-item"><a
                        href="{{ url('/stockhome') }}"><i class="bi bi-box-seam"style="margin-top: 3px;"></i><span
                            class="menu-title" data-i18n="Todo"style="font-size: 18px; ">คลัง</span></a>
                    <ul class="menu-content">
                        <li><a href="app-ecommerce-shop.html"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Shop">Shop</span></a>
                        </li>
                        <li><a href="app-ecommerce-details.html"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Details">Details</span></a>
                        </li>
                        <li><a href="app-ecommerce-wishlist.html"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Wish List">Wish List</span></a>
                        </li>
                        <li><a href="app-ecommerce-checkout.html"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Checkout">Checkout</span></a>
                        </li>
                    </ul>
                </li> --}}
                <li class="{{ Request::routeIs('stock') ? 'active' : '' }} nav-item">
                    <a href="{{ route('stock') }}"><i class="bi bi-box-seam"style="margin-top: 3px;"></i><span
                            class="menu-title" data-i18n="Todo"style="font-size: 18px; ">ทรัพย์สิน</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::routeIs('stock') ? 'active' : '' }} nav-item"><a
                                href="{{ route('stock') }}"><i class="feather icon-circle"
                                    style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Shop">รายการทรัพย์สิน</span></a>
                        </li>
                        <li class="{{ Request::routeIs('addInventory') ? 'active' : '' }} nav-item"><a
                                href="{{ route('addInventory') }}"><i class="feather icon-circle"
                                    style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Shop">เพิ่มทรัพย์สิน</span></a>
                        </li>
                        <li class="{{ Request::routeIs('stockmath') ? 'active' : '' }} nav-item"><a
                                href="{{ route('stockmath') }}"><i class="feather icon-circle"
                                    style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Details">ค่าเสื่อม</span></a>
                        </li>
                        {{-- <li class="{{ Request::routeIs('') ? 'active' : '' }} nav-item"><a
                                href="{{ url('/stocksetting') }}"><i class="bi bi-gear-fill"
                                    style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Checkout">ตั้งค่า</span></a>
                        </li> --}}
                    </ul>
                </li>
                <li class="{{ Request::routeIs('departsetting') ? 'active' : '' }} nav-item"><a
                        href="{{ route('departsetting') }}"><i class="fa fa-gear"style="margin-top: 3px;"></i><span
                            class="menu-title" data-i18n="Todo"style="font-size: 18px; ">ตั้งค่า</span></a>
                    <ul class="menu-content">
                        <li class="{{ Request::routeIs('employeesetting') ? 'active' : '' }} nav-item"><a
                                href="{{ route('employeesetting') }}"><i class="feather icon-circle"
                                    style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Shop">ประวัติพนักงาน</span></a>
                        </li>
                        <li class="{{ Request::routeIs('departsetting') ? 'active' : '' }} nav-item"><a
                                href="{{ route('departsetting') }}"><i class="feather icon-circle"
                                    style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Details">ประเภทแผนก</span></a>
                        </li>
                        <li class="{{ Request::routeIs('stocksetting') ? 'active' : '' }} nav-item"><a
                                href="{{ route('stocksetting') }}"><i class="feather icon-circle"
                                    style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Checkout">ประเภททรัพย์สิน </span></a>
                        </li>
                        <li class="{{ Request::routeIs('unitsetting') ? 'active' : '' }} nav-item"><a
                                href="{{ route('unitsetting') }}"><i class="feather icon-circle"
                                    style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Checkout">หน่วยนับ </span></a>
                        </li>
                        <li class="{{ Request::routeIs('tax') ? 'active' : '' }} nav-item"><a
                                href="{{ route('tax') }}"><i class="feather icon-circle"
                                    style="font-size: 1.2rem;"></i><span class="menu-item"
                                    data-i18n="Checkout">ใบแจ้งเงินเดือน
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::routeIs('logout') ? 'active' : '' }} nav-item"><a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                            class="bi bi-box-arrow-right"style="margin-top: 3px;"></i><span class="menu-title"
                            data-i18n="Ecommerce"style="font-size: 18px; ">ออกจากระบบ</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <div id="loader" class="loader"></div>
    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        {{-- <p class="clearfix blue-grey lighten-2 mb-0"><span
                class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a
                    class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio"
                    target="_blank">Pixinvent,</a>All rights Reserved</span><span
                class="float-md-right d-none d-md-block">Hand-crafted & Made with<i
                    class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="feather icon-arrow-up"></i></button>
        </p> --}}
        {{-- <small>
            <time class="media-meta" datetime="${timeM}">${timeM}</time>
        </small> --}}

    </footer>
    <!-- END: Footer-->

    <!-- BEGIN: Page Vendor JS-->

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->



    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>


    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

    <script src="{{ asset('app-assets/vendors/js/charts/echarts/echarts.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/app-user1.js') }}"></script>

    <script src="{{ asset('app-assets/js/scripts/forms/number-input.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/sweet-alerts.js') }}"></script>

    <script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/validation/form-validation.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/navs/navs.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/popover/popover.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/charts/chart-apex.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/charts/chart-chartjs.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('bootstrap-datepicker-thai/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js') }}">
    </script>
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <script src="{{ asset('assets/js/toastr.js') }}"></script>


    <!-- END: Page JS-->
    @yield('script')

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        // moment.locale('th');
        // moment().startOf('hour').fromNow(true);
        // moment.lang("de").format('LLL');
        let countbell = 0;

        $(document).ready(function() {
            readcount();
        });



        function readcount() {
            let url = "{{ route('show.read') }}";
            $.get(url, function(data) {

                console.log(data);
                countbell = data.length;
                console.log(countbell);
                $.each(data, function(key, value) {
                    let type = value.type;
                    let timeM = value.created_at;
                    timeM = moment().fromNow();
                    let type2 = null;
                    if (type == 1) {
                        type2 = 'ลากิจ'
                    } else if (type == 2) {
                        type2 = 'ลาพักร้อน'
                    } else if (type == 3) {
                        type2 = 'ลาป่วย'
                    }
                    // <i class="feather icon-plus-square font-medium-5 primary"></i>
                    // <small ><time class = "media-meta"datetime = "${timeM}" > $ {timeM} </time> </small>
                    let html = `<a class="d-flex justify-content-between" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    </div>
                                <div class="media-body">
                                    <h6 class="primary media-heading">คำร้องขอการลา</h6>
                                    <small class="notification-text">${value.fullname} (${type2})</small>
                                </div>

                            </div>
                        </a>`;
                    $('#data_notify').append(html);
                });

                $('.bellcount').html(countbell);

            });

        }
        Pusher.logToConsole = true;

        var pusher = new Pusher('a7d54ae0924576c9efb5', {
            cluster: 'ap1',
            // useTLS: true
        });
        var channel = pusher.subscribe('channel-admin');
        channel.bind('event-admin', function(data) {
            countbell = countbell + 1;
            let type = data.typeleave;
            let timeM = data.time;
            timeM = moment().fromNow();
            let type2 = null;
            if (type == 1) {
                type2 = 'ลากิจ'
            } else if (type == 2) {
                type2 = 'ลาพักร้อน'
            } else if (type == 3) {
                type2 = 'ลาป่วย'
            }
            // let emid = (data.emid);
            // $('#emid').val(emid)
            // console.log(type2);

            // <i class="feather icon-plus-square font-medium-5 primary"></i>
            let html = `<a class="d-flex justify-content-between" href="javascript:void(0)">
                        <div class="media d-flex align-items-start">
                            <div class="media-left">
                                </div>
                            <div class="media-body">
                                <h6 class="primary media-heading">คำร้องขอการลา</h6>
                                <small class="notification-text">${data.user_fullname} (${type2})</small>
                            </div>

                        </div>
                    </a>`;
            $('#data_notify').append(html);
            $('.bellcount').html(countbell);
        });

        function readAll() {
            $.ajax({
                type: "GET",
                url: "{{ route('update.read') }}",
                success: function(response) {
                    $('#data_notify').html('');
                    $('.bellcount').html(0);
                }
            });
        }
    </script>
</body>
<!-- END: Body-->

</html>
