@extends('layouts.main_user')
{{-- css --}}
{{-- js --}}
@section('head')
    <title> Sender</title>
    <style>
        .error {
            color: red !important;
            font-style: italic;
            border-color: red !important;
        }

        h4,
        .h4 {
            font-family: 'Kanit', sans-serif !important;
            font-weight: 400 !important;

        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="app-content content m-dis">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="container-fluid mt-2">
                    <p>
                        Try publishing an event to channel <code>my-channel</code>
                        with event name <code>my-event</code>.
                    </p>
                    <form action="/sender" method="POST">
                        <input type="text" name="user_id">
                        <input type="text" name="emid">
                        <input type="submit" value="submit">
                        {{ csrf_field() }}
                    </form>
                    <h1>Pusher Test</h1>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
