
@extends('layouts.master')

@section('title', 'Sữa mã giảm giá')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('admin.category') }}">Coupons</a>
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
                <label for="code">Tên mã giảm giá</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Tên mã giảm giá" value="{{ $coupon->code }}">
              </div>
                
              <div class="form-group">
                <label for="description">Mô tả</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Nhập thông tin về mã giảm giá" value="{{ $coupon->description }}">
              </div>

              <div class="form-group">
                <label for="percent">Tỷ lệ giảm (%)</label>
                <input type="number" class="form-control" id="percent" name="percent" placeholder="Nhập tỷ lệ giảm giá" value="{{ $coupon->percent }}">
              </div>

              <div class="form-group">
                <label for="time_start">Ngày bắt đầu</label>
                <input type="date" class="form-control" id="time_start" name="time_start" placeholder="Ngày bắt đầu" value="{{ $coupon->time_start }}">
              </div>

              <div class="form-group">
                <label for="time_end">Ngày kết thúc</label>
                <input type="date" class="form-control" id="time_end" name="time_end" placeholder="Ngày kết thúc" value="{{ $coupon->time_end }}">
              </div>
              
              <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
