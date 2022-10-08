<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }} | @yield('title')</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    </head>

    <body class="hold-transition sidebar-mini layout-navbar-fixed">
        @include('components.navbar')
        @include('components.sidebar')
        <!-- Site wrapper -->
        <div class="content-wrapper">
            @include('components.header')

            <section class="content">
                @yield('content')
            </section>            
        </div>

        @include('components.footer')
        {{-- @include('components.sidebar_controller') --}}

        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        {{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}
    </body>
</html>