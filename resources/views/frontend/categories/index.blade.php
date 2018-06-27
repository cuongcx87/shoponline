@extends('layouts.app')

@section('content')

<style>
    .nav-tabs{
        border-bottom: 0px;
    }
    .nav-item:hover{
        background-color: #f9f9f9;
    }
    a:hover {
        text-decoration: none;
    }
    .animation:hover{
        box-shadow: 1px 1px 2px 2px #f2f2f2;
        /*background-color: #fafafa;*/
    }
</style>
<div class="container">
    {{-- KHUYẾN MÃI HOT --}}
    <div class="row">
        <div class="col-lg-8" style="padding: 0px 0px 15px 0">
            <div id="demo" class="carousel slide" data-ride="carousel">
              <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="https://cdn2.tgdd.vn/qcao/14_05_2018_17_11_14_Huawei-P20-Pro-800-300-1.png" alt="Los Angeles" width="100%"> 
                </div>
                <div class="carousel-item">
                  <img src="https://cdn1.tgdd.vn/qcao/15_05_2018_15_12_54_Oppo-Month-800-300.png" alt="Chicago" width="100%">  
                </div>
                <div class="carousel-item">
                  <img src="https://cdn.tgdd.vn/qcao/30_04_2018_22_39_10_Big-Apple-800-300.png" alt="New York" width="100%">  
                </div>
              </div>
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
            
            <div class="row" style="background-color: white; margin: 0px; padding-bottom: 14px">
                <div class="col-lg-3" style="border-right: 1px solid #f6f6f6">Lorem ipsum dolor sit amet, consectetur.</div>
                <div class="col-lg-3" style="border-right: 1px solid #f6f6f6">Lorem ipsum dolor sit amet, consectetur.</div>
                <div class="col-lg-3" style="border-right: 1px solid #f6f6f6">Lorem ipsum dolor sit amet, consectetur.</div>
                <div class="col-lg-3">Lorem ipsum dolor sit amet, consectetur.</div>
            </div>
        </div>

        <div class="col-lg-4" style="padding: 0px 0px 0px 15px">
            <div>
                <img class="img-responsive" src="https://cdn3.tgdd.vn/qcao/14_05_2018_13_34_25_Samsung-J7+-J7Pro-398-110.png" alt="" width="100%">
            </div>
            <div style="padding: 20px 0px">
                <img class="img-responsive" src="https://cdn3.tgdd.vn/qcao/08_05_2018_08_15_48_iPhone-X-398-110.png" alt="" width="100%">
            </div>
            <div>
                <img class="img-responsive" src="https://cdn3.tgdd.vn/qcao/14_05_2018_13_34_25_Samsung-J7+-J7Pro-398-110.png" alt="" width="100%">
            </div>
        </div>
    </div>
    <br>
    {{-- Điện thoại --}}
    <div class="row" style="background-color: white; height: auto;">
        {{-- Header --}}
        <div class="col-lg-12" style="border-bottom: 1px solid #f6f6f6; border-right: 1px solid #f6f6f6">
            <div class="row">
                <div class="col-lg-4">
                    <h5 style="padding-top: 10px">ĐIỆN THOẠI NỔI BẬT NHẤT</h5>
                </div>
                <div class="col-lg-8">
                    <ul class="nav nav-tabs float-right">
                    <?php foreach ($company_dt as $company): ?>
                        <li class="nav-item"><a href="{{ route('category.company.show', [$category_dt->slug, $company->name]) }}" class="nav-link">{{ $company->name }}</a></li>
                    <?php endforeach ?>
                        <li class="nav-item"><a href="{{ route('category.show', [$category_dt->slug]) }}" class="nav-link">Xem tất cả {{ $category_dt->products->count() }} điện thoại</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">   
            <?php foreach ($products_dt as $product): ?>
                <div class="animation" style="width: 20%; padding: 15px 5px; border-bottom: 1px solid #f6f6f6; border-right: 1px solid #f6f6f6">
                    <a href="{{ route('product.show', [$category_dt->slug, $product->companies->slug, $product->slug]) }}"><img width="90%" src="{{ asset($product->image) }}" alt="{{ $product->title }}"></a>
                    <br>
                    <br>
                    <div style="height: 50px" class="p-2">
                        <a href="{{ route('product.show', [$category_dt->slug, $product->companies->slug, $product->slug]) }}">{{ $product->title }}</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 p-4">
                            <span>
                                <a href="{{ route('product.show', [$category_dt->slug, $product->companies->slug, $product->slug]) }}">
                                    <strong class="text-danger">{{ number_format($product->price, '0', ',', '.') }} đ</strong>
                                </a>
                            </span>
                            <span class="float-right">
                                <a href="{{ route('cart.edit', $product->id) }}" class="btn btn-outline-warning btn-sm">MUA</a>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
    <br>
    {{-- Laptop --}}
    <div class="row" style="background-color: white; height: auto;">
        {{-- Header --}}
        <div class="col-lg-12" style="border-bottom: 1px solid #f6f6f6; border-right: 1px solid #f6f6f6">
            <div class="row">
                <div class="col-lg-4">
                    <h5 style="padding-top: 10px">LAPTOP NỔI BẬT NHẤT</h5>
                </div>
                <div class="col-lg-8">
                    <ul class="nav nav-tabs float-right">
                    <?php foreach ($company_lt as $company): ?>
                        <li class="nav-item"><a href="{{ route('category.company.show', [$category_lt->slug, $company->name]) }}" class="nav-link">{{ $company->name }}</a></li>
                    <?php endforeach ?>
                        <li class="nav-item"><a href="{{ route('category.show', [$category_lt->slug]) }}" class="nav-link">Xem tất cả {{ $category_lt->products->count() }} laptop</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="row">   
            <?php foreach ($products_lt as $product): ?>
                <div class="animation" style="width: 20%; padding: 15px 5px; border-bottom: 1px solid #f6f6f6; border-right: 1px solid #f6f6f6">
                    <div style="height: 140px">
                        <a href="{{ route('product.show', [$category_lt->slug, $product->companies->slug, $product->slug]) }}"><img width="90%" src="{{ asset($product->image) }}" alt="{{ $product->title }}"></a>
                    </div>
                    <div style="height: 110px" class="p-1">
                        <a href="{{ route('product.show', [$category_lt->slug, $product->companies->slug, $product->slug]) }}">{{ $product->title }}</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <span>
                                <a href="{{ route('product.show', [$category_lt->slug, $product->companies->slug, $product->slug]) }}">
                                    <strong class="text-danger">{{ number_format($product->price, '0', ',', '.') }} đ</strong>
                                </a>
                            </span>
                            <span class="float-right">
                                <a href="{{ route('cart.edit', $product->id) }}" class="btn btn-outline-warning btn-sm">MUA</a>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
    <br>
    {{-- Máy tính bảng --}}
    <div class="row" style="background-color: white; height: auto;">
        {{-- Header --}}
        <div class="col-lg-12" style="border-bottom: 1px solid #f6f6f6; border-right: 1px solid #f6f6f6">
            <div class="row">
                <div class="col-lg-4">
                    <h5 style="padding-top: 10px">TABLET NỔI BẬT NHẤT</h5>
                </div>
                <div class="col-lg-8">
                    <ul class="nav nav-tabs float-right">
                    <?php foreach ($company_tb as $company): ?>
                        <li class="nav-item"><a href="{{ route('category.company.show', [$category_tb->slug, $company->name]) }}" class="nav-link">{{ $company->name }}</a></li>
                    <?php endforeach ?>
                        <li class="nav-item"><a href="{{ route('category.show', [$category_tb->slug]) }}" class="nav-link">Xem tất cả {{ $category_tb->products->count() }} tablet</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="row">   
            <?php foreach ($products_tb as $product): ?>
                <div class="animation" style="width: 20%; padding: 15px 5px; border-bottom: 1px solid #f6f6f6; border-right: 1px solid #f6f6f6">
                    <div style="height: 180px">
                        <a href="{{ route('product.show', [$category_tb->slug, $product->companies->slug, $product->slug]) }}"><img width="90%" src="{{ asset($product->image) }}" alt="{{ $product->title }}"></a>
                    </div>
                    <br>
                    <br>
                    <div style="height: 80px">
                        <a href="{{ route('product.show', [$category_tb->slug, $product->companies->slug, $product->slug]) }}">{{ $product->title }}</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <span>
                                <a href="{{ route('product.show', [$category_tb->slug, $product->companies->slug, $product->slug]) }}">
                                    <strong class="text-danger">{{ number_format($product->price, '0', ',', '.') }} đ</strong>
                                </a>
                            </span>
                            <span class="float-right">
                                <a href="{{ route('cart.edit', $product->id) }}" class="btn btn-outline-warning btn-sm">MUA</a>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
@endsection