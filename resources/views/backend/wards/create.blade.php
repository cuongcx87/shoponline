
@extends('layouts.master')

@section('title', 'Thêm sản phẩm mới')

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
        <li class="breadcrumb-item active">@yield('title')</li>
      </ol>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            {{-- Create Form --}}
            <form action="" method="POST" role="form" enctype="multipart/form-data" id="formUpload">
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
                <label for="title">Tên sản phẩm</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Tên sản phẩm mới" value="{{ old('title') }}">
              </div>

              <div class="form-group">
                <label for="company">Chọn công ty</label>
                <select name="company" id="company" class="form-control">
                  @foreach ($companies as $company)
                      <option value="{{ $company->id }}">{{ $company->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="category">Chọn danh mục</label>
                <select name="category" id="category" class="form-control">
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>
                
              <div class="form-group">
                <label for="image">Hình ảnh</label>
                <button type="reset" class="btn-reset">Làm mới</button>
                <input type="file" class="form-control" id="image" name="image" placeholder="Nhập hình ảnh" value="{{ old('image') }}" onchange="previewImg(event);">
              </div>
              <div class="box-preview-img img-responsive"></div>

              <div class="form-group">
                <label for="info">Thông tin sản phẩm</label>
                <textarea class="form-control" name="info" id="info" cols="30" rows="5" placeholder="Nhập thông tin sản phẩm" >{{ old('info') }}</textarea>
              </div>

              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá bán sản phẩm" value="{{ old('price') }}">
              </div>

              <div class="form-group">
                <label for="sale_price">Sale_Price</label>
                <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="Nhập giảm giá sản phẩm" value="{{ old('sale_price') }}">
              </div>
              
              <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
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
