@extends('layouts.base')

@section('body')

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" height="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-text">
                <span class="mb-0 h4">@yield('title')</span>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="{{ route('logout') }}" class="nav-item nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">

        @yield('content')

    </div>

@endsection