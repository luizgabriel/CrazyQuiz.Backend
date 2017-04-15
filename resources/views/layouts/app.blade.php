<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('layouts.styles')

    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
    @show

</head>
<body>
    <!-- BEGIN HEADER -->
    <div class="page-header">

        <div class="page-header-top">
            <div class="container">

                <div class="page-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" height="70px" alt="logo">
                    </a>
                </div>

                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </div>

            </div>
        </div>

    </div>

    <div class="page-container">
        <div class="page-head">
            <div class="container">

                @yield('title')

            </div>
        </div>
        <!-- END PAGE HEAD -->

        <div class="page-content">
            <div class="container">

                @yield('content')

            </div>
        </div>
    </div>

    <!-- END PAGE CONTAINER -->
    <!-- BEGIN PRE-FOOTER -->
    <div class="page-prefooter">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                    <h2>Contato</h2>
                    <address class="margin-bottom-40">
                        Whatsapp: 85 9 99933961<br>
                        Email: <a href="mailto:luizgabriel.info@gmail.com">luizgabriel.info@gmail.com</a>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <!-- END PRE-FOOTER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="container">
            {{ date('Y') }} &copy; CrazyQuiz
        </div>
    </div>

    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>

    @include('layouts.scripts')
</body>
</html>
