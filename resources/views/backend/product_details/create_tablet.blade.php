
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
                <label for="screen">Màn hình</label>
                <input type="text" class="form-control" id="screen" name="screen" placeholder="Nhập giá bán sản phẩm" value="{{ old('screen') }}">
              </div>

              <div class="form-group">
                <label for="os">Hệ điều hành</label>
                <input type="text" class="form-control" id="os" name="os" placeholder="Nhập giảm giá sản phẩm" value="{{ old('os') }}">
              </div>

              <div class="form-group">
                <label for="cpu">CPU</label>
                <input type="text" class="form-control" id="cpu" name="cpu" placeholder="Nhập giảm giá sản phẩm" value="{{ old('cpu') }}">
              </div>
              <div class="form-group">
                <label for="ram">RAM</label>
                <input type="text" class="form-control" id="ram" name="ram" placeholder="Nhập giảm giá sản phẩm" value="{{ old('ram') }}">
              </div>
              <div class="form-group">
                <label for="rom">Bộ nhớ trong</label>
                <input type="text" class="form-control" id="rom" name="rom" placeholder="Nhập giảm giá sản phẩm" value="{{ old('rom') }}">
              </div>
              <div class="form-group">
                <label for="camera_after">Camera sau</label>
                <input type="text" class="form-control" id="camera_after" name="camera_after" placeholder="Nhập giảm giá sản phẩm" value="{{ old('camera_after') }}">
              </div>
              <div class="form-group">
                <label for="camera_before">Camera trước</label>
                <input type="text" class="form-control" id="camera_before" name="camera_before" placeholder="Nhập giảm giá sản phẩm" value="{{ old('camera_before') }}">
              </div>
              <div class="form-group">
                <label for="connection">Kết nối mạng</label>
                <input type="text" class="form-control" id="connection" name="connection" placeholder="Nhập giảm giá sản phẩm" value="{{ old('connection') }}">
              </div>
              <div class="form-group">
                <label for="conversation">Đàm thoại</label>
                <input type="text" class="form-control" id="conversation" name="conversation" placeholder="Nhập giảm giá sản phẩm" value="{{ old('conversation') }}">
              </div>
              <div class="form-group">
                <label for="sim">Hỗ trợ SIM</label>
                <input type="text" class="form-control" id="sim" name="sim" placeholder="Nhập giảm giá sản phẩm" value="{{ old('sim') }}">
              </div>
              <button type="submit" class="btn btn-primary">Thêm chi tiết</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('/js/admin/uploadimg/jquery.js') }}"></script>
  <script src="{{ asset('/js/admin/uploadimg/main.js') }}"></script>
@endsection
