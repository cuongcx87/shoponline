
@extends('layouts.master')

@section('title', 'Danh mục sản phẩm')

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
          <a href="#">@yield('title')</a>
        </li>
        <li class="breadcrumb-item active">{{ $category['title'] }}</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Data Table Example</div>
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
                        <th>Công ty</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Tên sản phẩm</th>
                        <th>Công ty</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                      
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->company }}</a></td>
                        <td>{{ $product->image }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>{{ $product->status }}</td>
                        
                        <td>
                           <a href="category/show/'. $category->id .'"><span class="badge badge-info">Xem</span></a>
                           <a href="category/edit/'. $category->id .'"><span class="badge badge-warning">Sửa</span></a>
                           <a href="category/delete/'. $category->id .'" title="'. $category->title .'" class="deteleCategory"><span class="badge badge-danger"">Xóa</span></a>
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
         $('a.deteleCategory').on('click',function(e){
            if(!confirm('Bạn chắc chắn xóa danh mục # ' + $(this).attr('title'))){
               e.preventDefault();
            }
         });
     
      
    });
  </script>
  
@endsection