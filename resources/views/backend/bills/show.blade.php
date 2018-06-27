
@extends('layouts.master')

@section('title', 'Thông tin khách hàng')

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
        <li class="breadcrumb-item active">{{ $customer->phone }}</li>
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
                   //print_r($customers); 
                  echo "</pre>"; 
                ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ email</th>
                        <th>Xã/ Phường</th>
                        <th>Quận/ Huyện</th>
                        <th>Tỉnh/ Thành phố</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ email</th>
                        <th>Xã/ Phường</th>
                        <th>Quận/ Huyện</th>
                        <th>Tỉnh/ Thành phố</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->fullname }}</td>
                        <td>{{ $customer->phone }}</a></td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->ward }}</td>
                        <td>{{ $customer->district }}</td>
                        <td>{{ $customer->province }}</td>
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
@endsection