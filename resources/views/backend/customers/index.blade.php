
@extends('layouts.master')

@section('title', 'Danh sách khách hàng')

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
              <i class="fa fa-table"></i> Danh sách khách hàng
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Tên khách hàng</th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Xã/ Phường</th>
                      <th>Huyện/ Quận</th>
                      <th>Tỉnh/ Thành phố</th>
                      <th>Yêu cầu</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Tên khách hàng</th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Xã/ Phường</th>
                      <th>Huyện/ Quận</th>
                      <th>Tỉnh/ Thành phố</th>
                      <th>Yêu cầu</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($customers as $customer): ?>
                      <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->fullname }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->ward }}</td>
                        <td>{{ $customer->district }}</td>
                        <td>{{ $customer->province }}</td>
                        <td>{{ $customer->note }}</td>
                        <td>
                          <a href="{{ route('admin.customer.show', [$customer->id]) }}"><span class="badge badge-info">Xem</span></a>
                          <a href="{{ route('admin.customer.destroy', [$customer->id]) }}" title="{{ $customer->name }}" class="deletecustomer"><span class="badge badge-danger"">Xóa</span></a>
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
         $('a.deletecustomer').on('click',function(e){
            if(!confirm('Bạn chắc chắn xóa khách hàng # ' + $(this).attr('title'))){
               e.preventDefault();
            }
         });
    });
  </script>
  
@endsection