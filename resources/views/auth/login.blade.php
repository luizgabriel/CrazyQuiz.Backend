@extends('layouts.login')

@section('content')
    <form class="login-form" action="{{ route('login') }}" method="post" novalidate="novalidate">
        {{ csrf_field() }}

        <div class="form-title">
            <span class="form-title">Bem-vindo.</span>
            <span class="form-subtitle">Preencha suas credenciais.</span>
        </div>

        @foreach($errors as $error)
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>
                {{ $error }}
            </span>
        </div>
        @endforeach

        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="E-mail" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Senha" name="password">
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-block uppercase">Login</button>
        </div>
        <div class="form-actions">
            <div class="pull-left">
                <label class="rememberme check">
                    <input type="checkbox" name="remember" value="1">Lembrar de mim
                </label>
            </div>
        </div>
    </form>
@endsection
