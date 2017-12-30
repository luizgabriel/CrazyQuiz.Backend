@extends('layouts.login')

@section('content')
    <!-- form card login -->
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Login</h3>
        </div>
        <div class="card-body">
            <form class="login-form" action="{{ route('login') }}" method="post" novalidate="novalidate">
                {{ csrf_field() }}

                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert" aria-label="close"></button>
                        <span>
                            {{ $error }}
                        </span>
                    </div>
                @endforeach

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" required="">
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="password" id="password" required="" autocomplete="new-password">
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" id="rememberCheck">
                    <label class="custom-control-label" for="rememberCheck">Lembrar de mim</label>
                </div>
                <button type="submit" class="btn btn-success float-right">Login</button>
            </form>
        </div>
    </div>
@endsection
