
@extends('layouts.master')

@section('title', 'Thêm danh mục sản phẩm mới')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('admin.category') }}">Categories</a>
        </li>
        <li class="breadcrumb-item active">@yield('title')</li>
      </ol>
      <div class="row">
        <div class="col-lg-6 offset-3">
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
                <label for="title">Tên danh mục</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Tên danh mục sách" value="{{ old('title') }}">
              </div>
                
              <div class="form-group">
                <label for="description">Mô tả</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Nhập thông tin về danh mục sách" value="{{ old('description') }}">
              </div>
              
              <button type="submit" class="btn btn-primary">Tạo danh mục</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
