
@extends('back-end.layouts.master')

@section('title', 'Trang chủ')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 offset-3">
          <div class="card">
            <form action="{{ route('register') }}" method="POST" role="form">
              {{ csrf_field() }}
            <legend class="card-header">Đăng ký thành viên quản trị</legend>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            @endif

            @if (session('status'))
              <div class="alert alert-danger">
                  {{ session('status') }}
              </div>
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="username">Tên tài khoản</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" value="{{ old('username') }}">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email đăng nhập" value="{{ old('email') }}">
              </div>
                    
              <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
              </div>

              <div class="form-group">
                <label for="password-confirm">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="Nhập lại mật khẩu">
              </div>

              <div class="form-group">
                <label for="firstname">Tên thành viên</label>
                <input type="firstname" class="form-control" id="firstname" name="firstname" placeholder="Tên thành viên" value="{{ old('firstname') }}">
              </div>

              <div class="form-group">
                <label for="lastname">Họ thành viên</label>
                <input type="lastname" class="form-control" id="lastname" name="lastname" placeholder="Họ thành viên" value="{{ old('lastname') }}">
              </div>

              <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Điện thoại liên hệ" value="{{ old('phone') }}">
              </div>

              <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="address" class="form-control" id="address" name="address" placeholder="Địa chỉ" value="{{ old('address') }}">
              </div>
              
              <button type="submit" class="btn btn-primary">Đăng ký</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
