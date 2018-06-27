
@extends('layouts.master')

@section('title', 'Danh mục tỉnh (thành phố)')

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
              <i class="fa fa-table"></i> Danh sách các tỉnh (thành phố)
              <a href="{{ route('admin.province.create') }}" class="btn btn-primary pull-right">Thêm tỉnh (thành phố) mới</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th width="30">STT</th>
                        <th>Tên tỉnh (thành phố)</th>
                        <th>Số lượng (quận/huyện)</th>
                        <th width="100">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên tỉnh (thành phố)</th>
                        <th>Số lượng (quận/huyện)</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i = 0 ?>
                    <?php foreach ($provinces as $province): ?>
                    <?php $i++ ?>
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $province->name }}</td>
                        <td>{{ $province->districts->count() }}</td>
                        <td>
                          <a href="{{ route('admin.province.show', [$province->name]) }}"><span class="badge badge-info">Xem</span></a>
                           <a href="{{ route('admin.province.edit', [$province->name]) }}"><span class="badge badge-warning">Sửa</span></a>
                           <a href="{{ route('admin.province.destroy', [$province->name]) }}" title="{{ $province->name }}" class="deteleProvince"><span class="badge badge-danger"">Xóa</span></a>
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
      $('a.deteleProvince').on('click',function(e){
        if(!confirm('Bạn chắc chắn xóa tỉnh (thành phố) # ' + $(this).attr('title'))){
           e.preventDefault();
        }
      });
    });
  </script>
  
@endsection