
@extends('layouts.master')

@section('title', 'Chi tiết sản phẩm')

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      @if (session('status'))
        <div class="alert alert-success status">
            {{ session('status') }}
        </div>
      @endif
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('admin.product') }}">@yield('title')</a>
        </li>
        <lproducti class="breadcrumb-item active">{{ $product->title }}</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <a href="{{ route('admin.productdetail.create', [$product->slug]) }}" class="btn btn-primary pull-right">Thêm thông tin cho sản phẩm</a>
              <a href="{{ route('admin.image.create', [$product->slug]) }}" class="btn btn-primary">Thêm hình ảnh cho sản phẩm</a>
            </div>

            <div class="card-body">
               <?php 
                  echo "<pre>"; 
                   //print_r($products); 
                  echo "</pre>"; 
                ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Tên sản phẩm</th>
                      <th>Thông tin</th>
                      <th>Danh mục</th>
                      <th>Công ty</th>
                      <th>Hình ảnh</th>
                      <th>Giá</th>
                      <th>Giảm giá</th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Tên sản phẩm</th>
                      <th>Thông tin</th>
                      <th>Danh mục</th>
                      <th>Công ty</th>
                      <th>Hình ảnh</th>
                      <th>Giá</th>
                      <th>Giảm giá</th>
                      <th>Trạng thái</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->title }}</td>
                      <td>{{ $product->info }}</a></td>
                      <td>{{ $product->categories->title }}</td>
                      <td>{{ $product->companies->name }}</td>
                      <td>{{ $product->image }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->sale_price }}</td>
                      <td>{{ $product->status }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
      </div>
    </div>
  </div>
   @section('scripts')
      <script>
      $(document).ready(function(){
         $('a.deteleCategory').on('click',function(e){
            if(!confirm('Bạn chắc chắn xóa danh mục # ' + $(this).attr('title'))){
               e.preventDefault();
            }
         });
    });
  </script>
  
@endsection