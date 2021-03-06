
@extends('layouts.master')

@section('title', 'Danh sách nhân viên')

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
              <i class="fa fa-table"></i> Data Table Example
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Tên người dùng</th>
                      <th>Trạng thái</th>
                      <th>Email đăng ký</th>
                      <th>Tên</th>
                      <th>Họ</th>
                      <th>Địa chỉ</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Tên người dùng</th>
                      <th>Trạng thái</th>
                      <th>Email đăng ký</th>
                      <th>Tên</th>
                      <th>Họ</th>
                      <th>Địa chỉ</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($admins as $admin): ?>
                      <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>
                          <?php if ($admin->status == 1): ?>
                            <span class="badge badge-success">Đang hoạt động</span>
                          <?php else: ?>
                            <span class="badge badge-warning">Đang tạm khóa</span>
                          <?php endif ?>
                        </td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->firstname }}</td>
                        <td>{{ $admin->lastname }}</td>
                        <td>{{ $admin->address }}</td>
                        <td>{{ $admin->phone }}</td>
                        <td>
                          <a href="{{ route('admin.user.show', [$admin->id]) }}"><span class="badge badge-warning">Khóa tài khoản</span></a>
                          <a href="{{ route('admin.user.show', [$admin->id]) }}"><span class="badge badge-info">Xem</span></a>
                          <a href="{{ route('admin.user.edit', [$admin->id]) }}"><span class="badge badge-warning">Sửa</span></a>
                          <a href="{{ route('admin.user.destroy', [$admin->id]) }}" title="{{ $admin->name }}" class="deleteUser"><span class="badge badge-danger"">Xóa</span></a>
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
         $('a.deleteUser').on('click',function(e){
            if(!confirm('Bạn chắc chắn xóa người dùng # ' + $(this).attr('title'))){
               e.preventDefault();
            }
         });
     
      
    });
  </script>
  
@endsection