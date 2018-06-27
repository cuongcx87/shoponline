
@extends('layouts.master')

@section('title', 'Sửa thông tin sản phẩm')

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
        <li class="breadcrumb-item active">{{ $product->title }}</li>
      </ol>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
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
                <input type="text" class="form-control" id="title" name="title" placeholder="Tên sản phẩm mới" value="{{ $product->title }}">
              </div>

              <div class="form-group">
                <label for="company">Chọn công ty</label>
                <select name="company" id="company" class="form-control">
                  @foreach ($companies as $company)
                      <option value="{{ $company->id }}" @if($product->company_id == $company->id) selected="selected" @endif>{{ $company->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="category">Chọn danh mục</label>
                <select name="category" id="category" class="form-control">
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>
                
              <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" class="form-control" id="image" name="image" onchange="previewImg(event);">
              </div>

              <div class="box-preview-img img-responsive"></div>
              
              <div class="form-group">
                <label for="info">Thông tin sản phẩm</label>
                <textarea class="form-control" name="info" id="info" cols="30" rows="5" placeholder="Nhập thông tin sản phẩm" >{{ $product->info }}</textarea>
              </div>

              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá bán sản phẩm" value="{{ $product->price }}">
              </div>

              <div class="form-group">
                <label for="sale_price">Sale_Price</label>
                <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="Nhập giá bán sản phẩm sau khi giảm" value="{{ $product->sale_price }}">
              </div>

              <div class="form-group">
                <label for="">Hot key</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="hotkey" value="1" @if($product->hotkey ==  1) checked="checked" @endif>Hot
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="hotkey" value="0" @if($product->hotkey ==  0) checked="checked" @endif>Not hot
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="">Khuyến mãi</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sale" value="1" @if($product->sale ==  1) checked="checked" @endif>Có khuyến mãi
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sale" value="0" @if($product->sale ==  0) checked="checked" @endif>Không khuyến mãi
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="">Trạng thái</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" checked name="status" value="1" @if($product->status ==  1) checked="checked" @endif>Còn hàng
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="0" @if($product->status == 0) checked="checked" @endif>Hết hàng
                  </label>
                </div>
              </div>
              
              <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
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

