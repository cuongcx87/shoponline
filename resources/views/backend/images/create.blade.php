
@extends('layouts.master')

@section('title', 'Thêm hình ảnh cho sản phẩm')

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
                <label for="path">Thêm hình ảnh cho sản phẩm</label>
                <input type="file" multiple="multiple" class="form-control" id="image" name="path[]" onchange="previewImg(event);">
              </div>
              <div class="form-group">
                <input type="reset" class="btn btn-danger btn-reset btn-sm" value="Xóa hết">
              </div>
              <div class="box-preview-img img-responsive row"></div>
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
