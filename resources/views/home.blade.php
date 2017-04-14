@extends('layouts.app')

@section('title')
    <div class="page-title">
        <h1>Blank Page Layout <small>blank page sample</small></h1>
    </div>
@endsection

@section('content')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="#">Home</a><i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="layout_blank_page.html">Features</a>
            <i class="fa fa-circle"></i>
        </li>
        <li class="active">
            Blank Page Layout
        </li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            Page content goes here
        </div>
    </div>

@endsection
