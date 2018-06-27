
@extends('layouts.master')

@section('title', 'Danh sách các tỉnh')

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
          <a href="{{ route('admin.province') }}">@yield('title')</a>
        </li>
        <li class="breadcrumb-item active">{{ $province['name'] }}</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Danh sách các huyện (quận) của tỉnh (thành phố) <strong>{{ $province->name }}</strong>
              <a href="{{ route('admin.district.create') }}" class="btn btn-primary pull-right">Thêm quận (huyện) mới</a>
            </div>
            <div class="card-body">
               <?php
                  echo "<pre>";
                   //print_r($provinces);
                  echo "</pre>";
                ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên huyện (quận)</th>
                      <th width="100">Thao tác</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Tên huyện (quận)</th>
                      <th>Thao tác</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i = 0 ?>
                    <?php foreach ($districts as $district): ?>
                      <?php $i++ ?>
                    <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $district->name }}</td>
                      
                      <td>
                        <a href="{{ route('admin.district.show', [$district->name]) }}"><span class="badge badge-info">Xem</span></a>
                        <a href="{{ route('admin.district.edit', [$district->name]) }}"><span class="badge badge-warning">Sửa</span></a>
                        <a href="{{ route('admin.district.destroy', [$district->name]) }}" title="{{ $district->name }}" class="deleteprovince"><span class="badge badge-danger"">Xóa</span></a>
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
         $('a.deleteprovince').on('click',function(e){
            if(!confirm('Bạn chắc chắn xóa huyện (quận) # ' + $(this).attr('title'))){
               e.preventDefault();
            }
         });
    });
  </script>
  
@endsection