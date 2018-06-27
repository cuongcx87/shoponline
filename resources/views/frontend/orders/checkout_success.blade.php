@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center" style="background-color: #fff; height: auto;" id="fadeTo">
        <div class="col-lg-8 ">
            <br>
            <h4 class="text-center text-success"><i class="fas fa-check"></i> ĐẶT HÀNG THÀNH CÔNG</h4>
            <br>
            <h6>Cảm ơn bạn <strong>{{ $customer->fullname }}</strong> đã cho Chúng tôi cơ hội được phục vụ bạn. Trong vòng 5 phút, nhân viên của Chúng tôi sẽ gọi điện xác nhận đơn hàng của bạn!</h6>
            <br>
            <hr>
            <h6>Chi tiết đơn hàng: {{ Session('customer_id') }}</h6>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Đơn giá (đ)</th>
                  <th scope="col">Thành tiền (đ)</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($customer->bills as $bill): ?>
                    <?php 
                        $quantity = intval($bill->quantity);
                        $price    = intval($bill->price);
                        $total_item = $quantity*$price;
                     ?>
                    <tr>
                  <th scope="row">1</th>
                  <td>{{ $bill->product_name }}</td>
                  <td>{{ $quantity }}</td>
                  <td>{{ number_format($price, 0, ',', '.') }}</td>
                  <td>{{ number_format($total_item, 0, ',', '.') }}</td>
                </tr>
                <?php endforeach ?>
                <tr>
                  <th colspan="4">Tổng số tiền (đồng)</th>
                  <td>{{ number_format($customer->orders[0]->subtotal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                  <th colspan="4">Giảm giá (đồng)</th>
                  <td>{{ number_format($customer->orders[0]->subtract, 0, ',', '.') }}</td>
                </tr>
                <tr>
                  <th colspan="4">Số tiền phải trả (đồng)</th>
                  <td><strong>{{ number_format($customer->orders[0]->total, 0, ',', '.') }}</strong></td>
                </tr>
              </tbody>
            </table>
        </div>

        <div class="col-lg-8" style="padding: 15px">
            <a href="{{ route('home') }}" class="btn btn-success col-3  float-right">TIẾP TỤC MUA SẮM</a>
        </div>
    </div>
    <div class="panel-footer">
        <h5 class="text-center">Copy by Cuongcx</h5>
    </div>
</div>
@endsection