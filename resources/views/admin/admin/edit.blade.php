@extends('layouts.admin')
@section('content')

    <head>
        {{-- css --}}
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
            integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        {{-- js --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
                integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"
                integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="./js/plugins-init/bootstrap-input-spinner.js"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script> --}}


        {{-- <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.0.0/css/bootstrap-datetimepicker.css"
            integrity="sha512-iuhluKb/Iizb36mRW+XEZXJKw77cPMhQSYumnnNjIerzAh4UFuIEwXymSVxhKKtQlpi3S7J0UmMZA8H7OF1dvg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.0.0/js/bootstrap-datetimepicker.min.js"
                integrity="sha512-qad7VVBX2sj5mYsP19Jr3sWBvdd3ONe6iSU1qtyXrrvhejmE8oXzPm2fJUuyO21qqtiMOZsCvmwDFCKKsXyk7g=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


        {{-- <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" /> --}}
        {{-- <script>
            $(document).ready(function() {
                var date_input = $('input[name="date"]'); //our date input has the name "date"
                var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                date_input.datepicker({
                    format: 'mm/dd/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                })
            })
        </script> --}}
        {{-- <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="./css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js">
        </script> --}}
        {{-- <script type="text/javascript" src="./js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="./js/demo.js"></script> --}}
    </head>

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
                   
                </div>
            </div>
        </div>
    </div>


@endsection
