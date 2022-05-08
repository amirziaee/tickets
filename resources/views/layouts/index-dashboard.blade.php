<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/dist/img/favicon.ico') }}" />


    <title>صندوقچه</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard-rtl/">



    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.rtl.min.css') }}" rel="stylesheet">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/dist/css/dashboard.rtl.css') }}" rel="stylesheet">
</head>

<body>

    <!-- header -->

    @include('dashboard.header.header')

    <!-- side bar menu -->

    <div class="container-fluid">
        <div class="row">

            @include('dashboard.sidebar.nav')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-2">

                @yield('content')

            </main>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"
                integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF"
                crossorigin="anonymous"></script>
            <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
            @hasSection('texteditor')
                @yield('texteditor')
            @endif


            <script>
                $(document).ready(function() {
                    $("#search").keyup(function() {
                        if (evt.which == 13) { //If they press enter
                            // Your AJAX code here
                            $("#search").submit(); // Submit the form
                        }

                    });
                });


            </script>

</body>

</html>
