@extends('layouts.base', ['body' => 'bg-dark'])

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-6 mx-auto text-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" width="300px" alt=""/>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mx-auto">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection