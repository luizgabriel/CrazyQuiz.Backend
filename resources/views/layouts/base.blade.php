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

</head>
<body class="{{ $body or "" }}">
@yield('body')

@include('layouts.scripts')
</body>
</html>
