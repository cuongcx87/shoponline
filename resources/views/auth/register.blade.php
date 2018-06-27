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
                    <h5 class="p-2">Chào mừng đến với Laravel Shop. Đăng ký ngay!</h5>
                </div>
                <div class="col-lg-4 p-2">
                    Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a>
                </div>
            </div>
            <hr>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-7">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-12 control-label">Tên tài khoản *</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control form-control6" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">Địa chỉ email *</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form-control6" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Mật khẩu *</label>

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
                            <label for="password-confirm" class="col-md-12 control-label">Nhập lại mật khẩu *</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control form-control6" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-12 control-label">Họ tên của bạn *</label>
                            <div class="col-md-12">
                                <input id="fullname" type="text" class="form-control form-control6" name="fullname" value="{{ old('fullname') }}" required autofocus>

                                @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-12 control-label">Số điện thoại *</label>
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control form-control6" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success col-lg-12">
                                    Đăng ký
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
