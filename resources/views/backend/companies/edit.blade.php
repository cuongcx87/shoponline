
@extends('layouts.master')

@section('title', 'Sửa Company')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('admin.company') }}">Companies</a>
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
                <label for="name">Tên công ty</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tên công ty" value="{{ $company['name'] }}">
              </div>

              <div class="form-group">
                <label for="">Danh mục đã tồn tại</label>
                <select name="" id="" class="form-control" multiple="multiple" disabled>
                  @foreach ($category_old as $category)
                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="category">Lựa chọn danh mục</label>
                <select name="category[]" id="category" class="form-control" multiple="multiple">
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>
                
              <div class="form-group">
                <label for="description">Mô tả</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Nhập thông tin về danh mục sách" value="{{ $company['description'] }}">
              </div>
              
              <button type="submit" class="btn btn-primary">Sửa công ty</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
