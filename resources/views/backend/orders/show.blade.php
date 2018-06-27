
@extends('layouts.master')

@section('title', 'Chi tiết đơn đặt hàng')

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
                <a href="{{ route('admin.order') }}">Danh sách đơn hàng</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">@yield('title')</a>
            </li>
            <li class="breadcrumb-item active">{{ $order->customers->fullname }} (ĐT: {{ $order->customers->phone }})</li>
        </ol>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Chi tiết đơn đặt hàng
                    </div>
                <div class="card-body">
                    <h5>Thông tin khách hàng:</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="400px">Ngày đặt hàng:</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Tên khách hàng:</td>
                                <td>{{ $order->customers->fullname }}</td>
                            </tr>
                            <tr>
                                <td>ĐT khách hàng:</td>
                                <td>{{ $order->customers->phone }}</td>
                            </tr>
                            <tr>
                                <td>Email khách hàng:</td>
                                <td>{{ $order->customers->email }}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ khách hàng:</td>
                                <td>{{ $order->customers->ward }} - {{ $order->customers->district }} - {{ $order->customers->province }}</td>
                            </tr>
                            <tr>
                                <td>Yêu cầu của khách hàng:</td>
                                <td>{{ $order->customers->note }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h5>Thông tin đơn hàng:</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="400px">Số lượng sản phẩm:</td>
                                <td>{{ $order->quantity }}</td>
                            </tr>
                            <tr>
                                <td>Tổng tiền:</td>
                                <td>{{ number_format($order->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Số tiền được giảm:</td>
                                <td>{{ number_format($order->subtract, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Số tiền phải trả:</td>
                                <td><strong class="text-danger">{{ number_format($order->total, 0, ',', '.') }}</strong></td>
                            </tr>
                            <tr>
                                <td>Hình thức thanh toán:</td>
                                <td>{{ $order->payment }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h5>Chi tiết đơn hàng:</h5>
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
                        <?php $i = 0; ?>
                        <?php foreach ($order->customers->bills as $bill): ?>
                            <?php 
                                $i++;
                                $quantity = intval($bill->quantity);
                                $price    = intval($bill->price);
                                $total_item = $quantity*$price;
                             ?>
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $bill->product_name }}</td>
                                <td>{{ $quantity }}</td>
                                <td>{{ number_format($price, 0, ',', '.') }}</td>
                                <td>{{ number_format($total_item, 0, ',', '.') }}</td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer small text-muted">
                    Updated yesterday at 11:59 PM
                </div>
            </div>
        </div>
    </div>
</div>
@endsection