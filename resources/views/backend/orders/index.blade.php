
@extends('layouts.master')

@section('title', 'Danh sách đặt hàng')

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
              <i class="fa fa-table"></i> Danh sách đặt hàng
            </div>
            <br>
            <div class="card-body p-0">
              <div class="table-responsive"">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>STT</th>
                      <th>SĐT khách hàng</th>
                      <th>Tên khách hàng</th>
                      <th>Status</th>
                      <th>Số lượng SP</th>
                      <th>Tổng tiền</th>
                      <th>Tiền giảm</th>
                      <th>Tổng phải trả</th>
                      <th>Hình thức TT</th>
                      <th>Ngày đặt hàng</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>STT</th>
                      <th>SĐT khách hàng</th>
                      <th>Tên khách hàng</th>
                      <th>Status</th>
                      <th>Số lượng SP</th>
                      <th>Tổng tiền</th>
                      <th>Tiền giảm</th>
                      <th>Tổng phải trả</th>
                      <th>Hình thức TT</th>
                      <th>Ngày đặt hàng</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                      $i = 0;
                    ?>
                    <?php foreach ($orders as $order): ?>
                    <?php 
                      $i++;
                    ?>
                    <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $order->customers->phone }}</td>
                      <td>{{ $order->customers->fullname }}</td>
                      <td>
                        <?php if ($order->status == 0): ?>
                          <span class="badge badge-danger">Chưa xử lý</span>
                        <?php elseif ($order->status == 1): ?>
                          <span class="badge badge-success">Đã xử lý</span>
                        <?php else: ?>
                          <span class="badge badge-warning">Đang xử lý</span>
                        <?php endif ?>
                      </td>
                      <td>{{ $order->quantity }}</td>
                      <td>{{ number_format($order->subtotal, 0, ',', '.') }}</td>
                      <td>{{ number_format($order->subtract, 0, ',', '.') }}</td>
                      <td>{{ number_format($order->total, 0, ',', '.') }}</td>
                      <td>{{ $order->payment }}</td>
                      <td>{{ $order->created_at }}</td>
                      <td>
                        <a href="{{ route('admin.order.show', [$order->id]) }}"><span class="badge badge-info">Xem</span></a>
                        <!-- <a href="{{ route('admin.order.edit', [$order->id]) }}"><span class="badge badge-info">Sửa</span></a> -->
                        <a href="{{ route('admin.order.destroy', [$order->id]) }}" title="{{ $order->id }}" class="deleteorder"><span class="badge badge-danger"">Xóa</span></a>
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
         $('a.deleteorder').on('click',function(e){
            if(!confirm('Bạn chắc chắn xóa đơn đặt hàng # ' + $(this).attr('title'))){
               e.preventDefault();
            }
         });
    });
  </script>
  
@endsection