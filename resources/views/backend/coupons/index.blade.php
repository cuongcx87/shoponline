
@extends('layouts.master')

@section('title', 'Danh sách mã giảm giá')

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
      <?php 
        use Carbon\Carbon;
        $time  = Carbon::now();
      ?>
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Data Table Example
              <span class="float-right">Ngày hiện tại: {{ $time->format('d-m-y H:i:s') }}</span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Code giảm giá</th>
                      <th>Trạng thái</th>
                      <th>Mô tả</th>
                      <th>Tỷ lệ giảm (%)</th>
                      <th>Ngày bắt đầu</th>
                      <th>Ngày kết thúc</th>
                      <th width="90">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Code giảm giá</th>
                      <th>Trạng thái</th>
                      <th>Mô tả</th>
                      <th>Tỷ lệ giảm (%)</th>
                      <th>Ngày bắt đầu</th>
                      <th>Ngày kết thúc</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($coupons as $coupon): ?>
                      <?php
                        $start = $coupon->time_start;
                        $end   = $coupon->time_end;
                      ?>
                      <tr>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>
                          <?php if ($start > $time): ?>
                            <span class="badge badge-warning">Chưa diễn ra</span>
                          <?php elseif ($start <= $time and $end >= $time): ?>
                            <span class="badge badge-success">Đang diễn ra</span>
                          <?php else: ?>
                            <span class="badge badge-danger">Đã kết thúc</span>
                          <?php endif ?>
                        </td>
                        <td>{{ $coupon->description }}</td>
                        <td>{{ $coupon->percent }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($coupon->time_start)) }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($coupon->time_end)) }}</td>
                        <td>
                          <a href="{{ route('admin.coupon.show', [$coupon->id]) }}"><span class="badge badge-info">Xem</span></a>
                          <a href="{{ route('admin.coupon.edit', [$coupon->id]) }}"><span class="badge badge-warning">Sửa</span></a>
                          <a href="{{ route('admin.coupon.destroy', [$coupon->id]) }}" title="{{ $coupon->code }}" class="deleteCompany"><span class="badge badge-danger"">Xóa</span></a>
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