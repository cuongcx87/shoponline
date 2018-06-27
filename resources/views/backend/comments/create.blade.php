
@extends('layouts.master')

@section('title', 'Thêm bình luận mới')

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
      
      {{-- Thêm bình luận --}}
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
                <input type="hidden" class="form-control" id="user" name="user" value="{{ $user->id }}">
              </div>

              <div class="form-group">
                <input type="hidden" class="form-control" id="product" name="product" value="{{ $product->id }}">
              </div>

              <div class="form-group">
                <label for="content">Nội dung bình luận</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="5" placeholder="Nhập thông tin sản phẩm" >{{ old('content') }}</textarea>
              </div>

              <button type="submit" class="btn btn-primary">Gửi bình luận</button>
            </div>
          </form>
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