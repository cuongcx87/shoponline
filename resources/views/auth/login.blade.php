@extends('layouts.app')

@section('content')
<style>
    a:hover{
        text-decoration: none;
    }
    .form-control6{
        background-color: #fff;
        outline:none;
        box-shadow: none;
        padding: 8px;
        border: 1px solid #d1d1d1;
        border-radius: 3px;
    }
    .form-control6:focus {
        background-color: #fff;
        outline:none;
        box-shadow: none;
        border: 1px solid #d1d1d1;
        border-radius: 3px;
    }
    .contact{
        background-color: #fff;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9 contact">
            <div class="row">
                <div class="col-lg-8">
                    <h5 class="p-2">Chào mừng đến với Laravel Shop. Đăng nhập ngay!</h5>
                </div>
                <div class="col-lg-4 p-2">
                    Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a>
                </div>
            </div>
            <hr>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-7 p-2">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">Địa chỉ email</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form-control6" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Mật khẩu</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control form-control6" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ mật khẩu
                                    </label>
                                    <a class="btn btn-link" href="{{ route('password.request') }}">Bạn quên mật khẩu?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 p-2">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-warning col-lg-12">
                                    Đăng nhập
                                </button>
                            </div>
                            <p style="padding-left: 15px">Hoặc kết nối cùng</p>
                            <div class="col-lg-12">
                                <a href="{{ route('login.facebook') }}" class="btn btn-outline-primary col-lg-12"><i class="fab fa-facebook-f"></i> &nbsp &nbsp Facebook</a>
                            </div>
                            <div class="col-lg-12 p-3">
                                <a href="{{ route('login.google') }}" class="btn btn-outline-danger col-lg-12"><i class="fab fa-google-plus-g"></i> &nbsp &nbsp Google</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
@endsection
