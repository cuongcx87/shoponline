
@extends('layouts.master')

@section('title', 'Thêm người dùng mới')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('admin.user') }}">Users</a>
        </li>
        <li class="breadcrumb-item active">@yield('title')</li>
      </ol>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <form action="" method="POST" role="form">
              {{ csrf_field() }}
            <legend class="card-header">@yield('title')</legend>
            @if ($errors->any())
              <div class="alert alert-danger status">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            @endif

            @if (session('status'))
              <div class="alert alert-danger status">
                  {{ session('status') }}
              </div>
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="name">Tên đăng nhập</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tên đăng nhập của bạn" value="{{ old('name') }}" autofocus>
              </div>
                
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email đăng ký" value="{{ old('email') }}">
              </div>

              <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu của bạn" value="{{ old('password') }}">
              </div>

              <div class="form-group">
                <label for="re_password">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu của bạn" value="{{ old('re_password') }}">
              </div>

              <div class="form-group">
                <label for="firstname">Họ của bạn</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Họ của bạn" value="{{ old('firstname') }}">
              </div>

              <div class="form-group">
                <label for="lastname">Tên của bạn</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Tên của bạn" value="{{ old('lastname') }}">
              </div>

              <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ của bạn" value="{{ old('address') }}">
              </div>

              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại liên hệ" value="{{ old('phone') }}">
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
