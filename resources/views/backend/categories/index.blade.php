
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
        <li class="breadcrumb-item active">@yield('title')</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Bảng danh mục sản phẩm
              <a href="{{ route('admin.category.create') }}" class="btn btn-primary pull-right">Thêm danh mục mới</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th width="30">STT</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Mô tả</th>
                        <th width="100">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i = 0 ?>
                    <?php foreach ($categories as $category): ?>
                    <?php $i++ ?>
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->products->count() }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                          <a href="{{ route('admin.category.show', [$category->id]) }}"><span class="badge badge-info">Xem</span></a>
                           <a href="{{ route('admin.category.edit', [$category->id]) }}"><span class="badge badge-warning">Sửa</span></a>
                           <a href="{{ route('admin.category.destroy', [$category->id]) }}" title="{{ $category->name }}" class="deteleCategory"><span class="badge badge-danger"">Xóa</span></a>
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