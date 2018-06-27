
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
                      <th>SĐT khách hàng</th>
                      <th>Tên sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Ngày đặt hàng</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>SĐT khách hàng</th>
                      <th>Tên sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Ngày đặt hàng</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($bills as $bill): ?>
                      <tr>
                        <td>{{ $bill->id }}</td>
                        <td>{{ $bill->customers->phone }}</td>
                        <td>{{ $bill->product_name }}</td>
                        <td>{{ $bill->quantity }}</td>
                        <td>{{ number_format($bill->price, 0, ',', '.') }}</td>
                        <td>{{ $bill->created_at }}</td>
                        <td>
                          <a href="{{ route('admin.bill.show', [$bill->id]) }}"><span class="badge badge-info">Xem</span></a>
                          <a href="{{ route('admin.bill.destroy', [$bill->id]) }}" title="{{ $bill->id }}" class="deletebill"><span class="badge badge-danger"">Xóa</span></a>
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
         $('a.deletebill').on('click',function(e){
            if(!confirm('Bạn chắc chắn xóa hóa đơn # ' + $(this).attr('title'))){
               e.preventDefault();
            }
         });
    });
  </script>
  
@endsection