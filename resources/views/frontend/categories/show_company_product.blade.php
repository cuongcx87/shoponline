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
    <div class="row">
        <ul class="nav nav-pills" role="tablist">
        <?php foreach ($companies as $companies): ?>
            <li class="nav-item company"><a href='{{ route("category.company.show", [$category->slug, $companies->name]) }}' class='nav-link' class="nav-link">{{ $companies->name }}</a></li>
        <?php endforeach ?>
            <li class="nav-item price"><a href="{{ route('category.show', [$category->slug, 'p=duoi-1-trieu']) }}" class="nav-link" data-toggle="pill">Dưới 1 triệu</a></li>
            <li class="nav-item price"><a href="{{ route('category.show', [$category->slug, 'p=tu-1-3-trieu']) }}" class="nav-link" data-toggle="pill">Từ 1 - 3 triệu</a></li>
            <li class="nav-item price"><a href="{{ route('category.show', [$category->slug, 'p=tu-3-5-trieu']) }}" class="nav-link" data-toggle="pill">Từ 3 - 5 triệu</a></li>
            <li class="nav-item price"><a href="{{ route('category.show', [$category->slug, 'p=tu-5-10-trieu']) }}" class="nav-link" data-toggle="pill">Từ 5 - 10 triệu</a></li>
            <li class="nav-item price"><a href="{{ route('category.show', [$category->slug, 'p=tren-10-trieu']) }}" class="nav-link" data-toggle="pill">Trên 10 triệu</a></li>
            <li class="nav-item price"><a href="{{ route('category.show', [$category->slug, 'p=all']) }}" class="nav-link" data-toggle="pill">Xem tất cả</a></li>
        </ul>
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
            // console.log(page);
            loadPage(page);
        });
        // ============================================================================
        // Function Load Page
        function loadPage(page) {
            $.ajax({
                // type: 'GET',
                url: '{{ route('category.company.page', [$category->slug, $company->name]) }}?page='+page,
            })
            .done(function(data) {
                // console.log(data);
                $('.loadproduct').html(data);
                location.hash = page;
            }); 
        }
        // ============================================================================
        // Load Products when change Company
        // $(document).on('click', '.company a', function(event) {
        //     event.preventDefault();
        //     var company = $(this).attr('href').split('company=')[1];
        //     var page = $(this).attr('href');
        //     console.log(page);
        //     // console.log(company);
        //     $.ajax({
        //         url: '',
        //         // type: 'GET',
        //         // dataType: 'json',
        //         // data: {company: company},
        //     })
        //     .done(function(data) {
        //         // console.log(data);
        //         loadproduct(company);
        //     })
        //     .fail(function() {
        //         console.log("error");
        //     });
        //     // ========================================================================
        //     function loadproduct(company) {
        //         $.ajax({
        //             url: '',
        //         })
        //         .done(function(data) {
        //             // console.log(data);
        //             $('.loadproduct').html(data);
        //             location.hash = company;
        //         });
        //     } 
        // });
        // ============================================================================
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
            // ========================================================================
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