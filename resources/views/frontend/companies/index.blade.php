
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
        <li class="breadcrumb-item active">@yield('title')</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Bảng chi tiết các sản phẩm
              <a href="{{ route('admin.company.create') }}" class="btn btn-primary pull-right">Thêm công ty mới</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th width="30">STT</th>
                        <th>Tên công ty</th>
                        <th>Số lượng SP</th>
                        <th>Mô tả</th>
                        <th width="100">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên công ty</th>
                        <th>Số lượng SP</th>
                        <th>Mô tả</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i=0 ?>
                    <?php foreach ($companies as $company): ?>
                    <tr>
                      <?php $i++ ?> 
                      <td>{{ $i }}</td>
                      <td>{{ $company->name }}</td>
                      <td>{{ $company->products->count() }}</td>
                      <td>{{ $company->description }}</a></td>
                      
                      <td>
                         <a href="{{ route('admin.company.show', [$company->id]) }}"><span class="badge badge-info">Xem</span></a>
                         <a href="{{ route('admin.company.edit', [$company->id]) }}"><span class="badge badge-warning">Sửa</span></a>
                         <a href="{{ route('admin.company.destroy', [$company->id]) }}" title="{{ $company->name }}" class="deleteCompany"><span class="badge badge-danger"">Xóa</span></a>
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
         $('a.deleteCompany').on('click',function(e){
            if(!confirm('Bạn chắc chắn xóa công ty # ' + $(this).attr('title'))){
               e.preventDefault();
            }
         });
     
      
    });
  </script>
  
@endsection