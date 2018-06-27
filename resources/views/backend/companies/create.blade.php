
@extends('layouts.master')

@section('title', 'Thêm công ty mới')

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
                <input type="text" class="form-control" id="name" name="name" placeholder="Tên công ty" value="{{ old('name') }}">
              </div>

              <div class="form-group">
                <label for="category">Chọn danh mục</label>
                <select name="category[]" id="category" class="form-control" multiple="multiple">
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>
                
              <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description" placeholder="Nhập thông tin về công ty" cols="30" rows="5">{{ old('description') }}</textarea>
                
              </div>
              
              <button type="submit" class="btn btn-primary">Tạo công ty</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
