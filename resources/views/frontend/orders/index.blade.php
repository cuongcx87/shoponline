@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <?php if (Cart::count() > 0): ?>
        <div class="row" style="background-color: white; min-height: 350px;">
            <div class="col-lg-8" style="border-right: 1px solid #f6f6f6">
                @include('frontend.orders.detailcart')
            </div>
            
            <div class="col-lg-4">
                <div class="loadInfoCart">
                    @include('frontend.orders.infocart')
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('order.create') }}" class="btn btn-warning btn-md col-lg-12">TIẾN HÀNH THANH TOÁN</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row justify-content-lg-center" style="min-height: 300px">
            <br>
            <div class="col-lg-12 text-center">
                <h5 class="text-center text-danger">Giỏ hàng rỗng</h5>
                <br>
                <a href="{{ route('home') }}" class="btn btn-warning ">TIẾP TỤC MUA SẮM</a>
            </div>
        </div>
    <?php endif ?>
    <br>
    <br>
</div>

@endsection