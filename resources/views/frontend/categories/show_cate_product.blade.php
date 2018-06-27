@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .nav-link:hover{
        background-color: #f6f6f6;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #111;
        background-color: #f2f2f2;
    }
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
        <div class="col-lg-8" style="padding: 0px 0px 15px 0;">
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
            
            <div class="row" style="background-color: white; margin: 0px; padding-bottom: 14px;">
                <div class="col-lg-3" style="border-right: 1px solid #f6f6f6">Lorem ipsum dolor sit amet, consectetur.</div>
                <div class="col-lg-3" style="border-right: 1px solid #f6f6f6">Lorem ipsum dolor sit amet, consectetur.</div>
                <div class="col-lg-3" style="border-right: 1px solid #f6f6f6">Lorem ipsum dolor sit amet, consectetur.</div>
                <div class="col-lg-3">Lorem ipsum dolor sit amet, consectetur.</div>
            </div>
        </div>

        <div class="col-lg-4" style="padding: 0px 0px 0px 15px;">
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
    <div class="row" style="background-color: white; height: auto;">
        <div class="col-lg-12" style="border-bottom: 1px solid #f6f6f6; border-right: 1px solid #f6f6f6">
            <div class="row">
                <div class="col-lg-5">
                    <ul class="nav nav-pills" role="tablist">
                    <?php foreach ($companies as $company): ?>
                        <li class="nav-item"><a href="{{ route('category.company.show', [$category->slug, $company->name]) }}" class="nav-link">{{ $company->name }}</a></li>
                    <?php endforeach ?>
                    </ul>
                </div>
                <div class="col-lg-7">
                    <ul class="nav nav-pills float-right" role="tablist">
                        <li class="nav-item price"><a href="{{ route('category.show', [$category->slug, 'p=duoi-3-trieu']) }}" class="nav-link" data-toggle="pill">Dưới 3 triệu</a></li>
                        <li class="nav-item price"><a href="{{ route('category.show', [$category->slug, 'p=tu-3-5-trieu']) }}" class="nav-link" data-toggle="pill">Từ 3 - 5 triệu</a></li>
                        <li class="nav-item price"><a href="{{ route('category.show', [$category->slug, 'p=tu-5-10-trieu']) }}" class="nav-link" data-toggle="pill">Từ 5 - 10 triệu</a></li>
                        <li class="nav-item price"><a href="{{ route('category.show', [$category->slug, 'p=tren-10-trieu']) }}" class="nav-link" data-toggle="pill">Trên 10 triệu</a></li>
                        <li class="nav-item price float-right"><a href='{{ route('category.show', [$category->slug, 'p=all']) }}' class='nav-link' data-toggle="pill">Xem tất cả</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="background-color: white; height: auto;">
        <div class="col-lg-12">
            <div class="row loadproduct">
                <?php if ($category->slug == 'laptop'): ?>
                    @include('frontend.categories.show_product_laptop')
                <?php else: ?>
                    @include('frontend.categories.show_product')
                <?php endif ?>
            </div>
        </div>
    </div>
    <br>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        // ============================================================================
        // Pagination Page
        $(document).on('click', '.pagination a', function(event) {
            console.log("Success");
            event.preventDefault();
            var page = parseInt($(this).attr('href').split('page=')[1]);
            // var page = $(this).attr('href');
            console.log(page);
            loadPage(page);
        });
        // ============================================================================
        // Function Load Page
        function loadPage(page) {
            $.ajax({
                // type: 'GET',
                url: '{{ route('category.pagePagination', [$category->slug]) }}?page='+page,
            })
            .done(function(data) {
                console.log(data);
                $('.loadproduct').html(data);
                location.hash = page;
            }); 
        }
        // ===========================================================================
        // Load Products when change Price
        $(document).on('click', '.price a', function(event) {
            event.preventDefault();
            var price = $(this).attr('href').split('p=')[1];
            // var page = $(this).attr('href');
            // console.log(page);
            console.log(price);
            $.ajax({
                url: '{{ route('category.price.show_ajax', [$category->slug]) }}?p='+price,
                // type: 'GET',
                // dataType: 'json',
                // data: {price: price},
            })
            .done(function(data) {
                // console.log(data);
                loadprice(price);
            })
            .fail(function() {
                console.log("error");
            });
            // ==========================================================================
            function loadprice(price) {
                $.ajax({
                    url: '{{ route('category.price.show_ajax', [$category->slug]) }}?p='+price,
                })
                .done(function(data) {
                    // console.log(data);
                    $('.loadproduct').html(data);
                    location.hash = price;
                });
            } 
        });
    });
</script>
@endsection