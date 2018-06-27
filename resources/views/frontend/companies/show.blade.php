
@extends('layouts.master')

@section('title', 'Danh sách công ty')

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
          <a href="{{ route('admin.company') }}">@yield('title')</a>
        </li>
        <li class="breadcrumb-item active">{{ $company['name'] }}</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Bảng chi tiết các sản phẩm
              <a href="{{ route('admin.product.create') }}" class="btn btn-primary pull-right">Thêm sản phẩm mới</a>
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
                      <th>Trạng thái</th>
                      <th>Khuyến mãi</th>
                      <th>Danh mục</th>
                      <th>Công ty</th>
                      <th>Hình ảnh</th>
                      <th>Giá bán</th>
                      <th>Giảm KM</th>
                      <th width="100">Thao tác</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Tên sản phẩm</th>
                      <th>Trạng thái</th>
                      <th>Khuyến mãi</th>
                      <th>Danh mục</th>
                      <th>Công ty</th>
                      <th>Hình ảnh</th>
                      <th>Giá bán</th>
                      <th>Giá KM</th>
                      <th>Thao tác</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->title }}</td>
                      <td>
                        <?php if ($product->status == 0): ?>
                          <span class="badge badge-danger"">Hết hàng</span>
                        <?php else: ?>
                          <span class="badge badge-success"">Còn hàng</span>
                        <?php endif ?>
                        
                      </td>
                      <td>
                        <?php if ($product->sale == 0): ?>
                          <span class="badge badge-success"">Không KM</span>
                        <?php else: ?>
                          <span class="badge badge-danger"">Đang KM</span>
                        <?php endif ?>
                        
                      </td>
                      <td>{{ $product->categories->title }}</td>
                      <td>{{ $company['name'] }}</td>
                      <td><img src="{{ asset($product->image) }}" alt="{{ $product->title }}" width="90"></td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->sale_price }}</td>
                      
                      <td>
                        <a href="{{ route('admin.product.show', [$product->id]) }}"><span class="badge badge-info">Xem</span></a>
                        <a href="{{ route('admin.product.edit', [$product->id]) }}"><span class="badge badge-warning">Sửa</span></a>
                        <a href="{{ route('admin.product.destroy', [$product->id]) }}" title="{{ $product->title }}" class="deleteProduct"><span class="badge badge-danger"">Xóa</span></a>
                      </td>
                    </tr>
                    <?php endforeach ?>
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
         $('a.deleteProduct').on('click',function(e){
            if(!confirm('Bạn chắc chắn xóa sản phẩm # ' + $(this).attr('title'))){
               e.preventDefault();
            }
         });
     
      
    });
  </script>
  
@endsection