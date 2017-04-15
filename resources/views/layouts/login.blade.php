<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Crazy Quiz</title>

    @include('layouts.styles')

    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @show

</head>

<body class="page-md login">

    <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" width="300px" alt=""/>
        </a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <div class="copyright">
        {{ date('Y') }} © CrazyQuiz.
    </div>

    @include('layouts.scripts')
</body>
</html>
