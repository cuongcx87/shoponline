@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="background-color: white; height: auto;margin-bottom: 15px">
        <div class="col-lg-4" style="">
            <a href=""><img class="img-responsive" src="https://cdn1.tgdd.vn/Products/Images/42/157031/Feature/samsung-galaxy-a6-2018-2.jpg" alt=""></a>
        </div>
        <div class="col-lg-5" style="border-left: 1px solid #f6f6f6">
            <h4>Sản phẩm chính hãng</h4>
            <h5>Giá bán: 10.000 đ</h5>
            <button class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-shopping-cart"></i></button>
        </div>
        <div class="col-lg-3" style="border-left: 1px solid #f6f6f6">
            <p>Tùy chọn giao hàng</p>
            <p>Địa chỉ</p>
            <p>Tùy chọn nhận hàng</p>
            <p>Chế độ bảo hành</p>
        </div>
    </div>

    <div class="row" style="background-color: white; height: auto;">
        <div class="col-lg-9" style="border-right: 1px solid #f6f6f6">
            <h4>Giới thiệu sản phẩm</h4>
            <hr>
            <h4>Các sản phẩm tương tự</h4>
            <hr>
            <h4>Đánh giá về sản phẩm</h4>
        </div>
        <div class="col-lg-3">
            <h4>Thông số kỹ thuật</h4>
        </div>
    </div>

    

    <div class="panel-footer">
        <h5 class="text-center">Copy by Cuongcx</h5>
    </div>
</div>
@endsection