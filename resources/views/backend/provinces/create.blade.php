
@extends('layouts.master')

@section('title', 'Thêm tỉnh (thành phố) mới')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('admin.province') }}">Provinces</a>
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
                <label for="name">Tên tỉnh (thành phố)</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tên tỉnh (thành phố)" value="{{ old('name') }}" autofocus>
              </div>
              
              <button type="submit" class="btn btn-primary">Tạo mới</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
