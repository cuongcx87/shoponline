
@extends('layouts.master')

@section('title', 'Thêm chi tiết cho sản phẩm')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('admin.product') }}">Products</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('admin.product.show', $product->slug) }}">{{ $product->title }}</a>
        </li>
        <li class="breadcrumb-item active">@yield('title')</li>
      </ol>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            {{-- Create Form --}}
            <form action="" method="POST" role="form" enctype="multipart/form-data" id="formUpload">
              {{ csrf_field() }}
            <legend class="card-header">@yield('title'): <span class="text-danger">{{ $product->title }}</span></legend>
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
                <label for="include">Sản phẩm bao gồm</label>
                <input type="text" class="form-control" id="include" name="include" placeholder="Nhập thông số sản phẩm bao gồm" value="{{ old('include') }}" autofocus="true">
              </div>
              <div class="form-group">
                <label for="warranty">Thời gian bảo hành</label>
                <input type="text" class="form-control" id="warranty" name="warranty" placeholder="Nhập thông số thời gian bảo hành sản phẩm" value="{{ old('warranty') }}" autofocus="true">
              </div>
              <div class="form-group">
                <label for="policy_warranty">Chính sách bảo hành</label>
                <input type="text" class="form-control" id="policy_warranty" name="policy_warranty" placeholder="Nhập thông số chính sách bảo hành sản phẩm" value="{{ old('policy_warranty') }}" autofocus="true">
              </div>
              <div class="form-group">
                <label for="cpu">CPU</label>
                <input type="text" class="form-control" id="cpu" name="cpu" placeholder="Nhập thông số CPU" value="{{ old('cpu') }}" autofocus="true">
              </div>
              <div class="form-group">
                <label for="ram">RAM</label>
                <input type="text" class="form-control" id="ram" name="ram" placeholder="Nhập thông số RAM" value="{{ old('ram') }}">
              </div>
              <div class="form-group">
                <label for="hard_disk">Ổ cứng</label>
                <input type="text" class="form-control" id="hard_disk" name="hard_disk" placeholder="Nhập thông số ổ cứng" value="{{ old('hard_disk') }}">
              </div>
              <div class="form-group">
                <label for="screen">Màn hình</label>
                <input type="text" class="form-control" id="screen" name="screen" placeholder="Nhập thông số màn hình" value="{{ old('screen') }}">
              </div>
              <div class="form-group">
                <label for="graphic_card">Card màn hình</label>
                <input type="text" class="form-control" id="graphic_card" name="graphic_card" placeholder="Nhập thông số card màn hình" value="{{ old('graphic_card') }}">
              </div>
              <div class="form-group">
                <label for="connection">Cổng kết nối</label>
                <input type="text" class="form-control" id="connection" name="connection" placeholder="Nhập thông số cổng kết nối" value="{{ old('connection') }}">
              </div>
              <div class="form-group">
                <label for="os">Hệ điều hành</label>
                <input type="text" class="form-control" id="os" name="os" placeholder="Nhập thông số hệ điều hành" value="{{ old('os') }}">
              </div>
              <div class="form-group">
                <label for="model">Thiết kế</label>
                <input type="text" class="form-control" id="model" name="model" placeholder="Nhập thông số thiết kế" value="{{ old('model') }}">
              </div>
              <div class="form-group">
                <label for="size">Kích thước</label>
                <input type="text" class="form-control" id="size" name="size" placeholder="Nhập thông số kích thước" value="{{ old('size') }}">
              </div>
              <button type="submit" class="btn btn-primary">Thêm chi tiết</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
