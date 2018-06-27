@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .star-rating .fas{
        cursor:pointer;
    }
</style>
<div class="container">
    <div class="row" style="background-color: white; height: auto;margin-bottom: 15px">
        <div class="col-lg-4 text-center p-3">
            <img width="90%" src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="main">
            <div class="row p-3">
                <?php foreach ($product->images as $image): ?>
                    <div class="col-lg-3 p-2 border-2 detail">
                        <img width="90%" src="{{ asset($image->path) }}">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-lg-5 p-3">
            <div class="row">
                <div class="col-lg-12">
                    <h4>{{ $product->title }}</h4>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link p-1" href="#section1" style="color: #F57224">{{ $comment_count }} lượt bình luận | </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-1" href="#ratingcomment" style="color: #F57224">{{ $rating_comment_count }} đánh giá</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link p-1" href="#ratingcomment" style="color: #F57224"><i class="fas fa-star fa-md"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h6>Thương hiệu: 
                        <a href="{{ route('category.company.show', [$product->categories->slug, $product->companies->name]) }}">{{ $product->companies->name }}</a>
                        <span> | <a href="{{ route('category.company.show', [$product->categories->slug, $product->companies->name]) }}">Xem thêm sản phẩm của {{ $product->companies->name }}</a></span>
                    </h6>
                </div>
                <hr>
                <div class="col-lg-12">
                    <h3 style="color: #F57224">{{ number_format($product->sale_price, 0, ',', '.') }} <u>đ</u></h3>
                </div>
                <div class="col-lg-12">
                    <h6><del>{{ number_format($product->price, 0, ',', '.') }} <u>đ</u></del></h6>
                </div>
                <div class="col-lg-12">
                    <div class="card p-2">
                        <h3><span class="badge badge-pill badge-success"><i class="fas fa-gift"></i> KHUYẾN MÃI</span></h3>
                        <p><i class="fas fa-check-circle text-success"></i> Giảm ngay 1.500.000đ khi thanh toán Online bằng thẻ Mastercard (Từ 01/05 - 31/05)</p>
                        <p><i class="fas fa-check-circle text-success"></i> Giảm ngay 2 triệu khi mua online (áp dụng cho đơn hàng đặt và nhận hàng từ ngày 28 - 31/05) </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <br>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-between" style="padding: 15px">
                        <a href="{{ route('cart.edit', $product->id) }}" class="btn btn-warning btn-md col-5">THÊM VÀO GIỎ HÀNG</a>
                        <a href="{{ route('home') }}" class="btn btn-primary btn-md col-5">TIẾP TỤC MUA SẮM</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 card p-3">
            <p><i class="fas fa-check-circle text-warning"></i> <strong>Sản phẩm bao gồm:</strong> {{ $product->product_details->include }}</p>
            <hr>
            <p><i class="fas fa-check-circle text-warning"></i> <strong>Bảo hành chính hãng:</strong> {{ $product->product_details->warranty }}</p>
            <hr>
            <p><i class="fas fa-check-circle text-warning"></i> <strong>Chính sách bảo hành:</strong> {{ $product->product_details->policy_warranty }}</p>
        </div>
    </div>
    
    <div class="row" style="background-color: white; height: auto;">
        <div class="col-lg-8" style="border-right: 1px solid #f6f6f6">
            <div class="p-2">
                <h4>Giới thiệu sản phẩm</h4>
                <h6 class="text-justify">{{ $product->info }}</h6>
            </div>

            <div id="demo" class="carousel slide p-2" data-ride="carousel">
              <ul class="carousel-indicators">
                <?php $i = 0 ?>
                <?php foreach ($product->images as $image): ?>
                    <li data-target="#demo" data-slide-to="{{ $i }}" @if ($i == 0) class="active" @endif></li>
                    <?php $i++ ?>
                <?php endforeach ?>
              </ul>
              <div class="carousel-inner">
                <?php $i = 0 ?>
                <?php foreach ($product->images as $image): ?>
                    <div class="carousel-item @if ($i == 0) active @endif">
                        <img src="{{ asset($image->path) }}" width="100%">
                    </div>
                    <?php $i++ ?>
                <?php endforeach ?>
                
              </div>
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
            <hr>
            <div class="p-2">
                <h5>Các sản phẩm tương tự</h5>
                <div class="row">
                    <?php foreach ($products as $products): ?>
                    <div class="col-lg-3" style="border-right: 1px solid #f6f6f6; padding: 15px 10px; border-bottom: 1px solid #f6f6f6;">
                        <div style="height: 220px">
                            <a href="{{ route('product.show', [$products->categories->slug, $products->companies->slug, $products->slug]) }}"><img width="90%" src="{{ asset($products->image) }}" alt="{{ $products->title }}"></a>
                        </div>
                        <div style="height: 80px">
                            <a href="{{ route('product.show', [$products->categories->slug, $products->companies->slug, $products->slug]) }}">{{ $products->title }}</a>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span>
                                    <a href="{{ route('product.show', [$products->categories->slug, $products->companies->slug, $products->slug]) }}"><strong class="text-danger">{{ number_format($products->price, 0, ',', '.') }} đ</strong></a>
                                </span>    
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <hr>
            <!-- Form rating comment -->
            <div id="ratingcomment">
                @include('frontend.products.ratingForm')
            </div>

            {{-- Hiển thị các bình luận có bình chọn star và phân trang kết quả hiển thị Ajax --}}
            <div class="pageRating">
                @include('frontend.products.ratingPage')
            </div>
            <hr>
            {{-- Comments --}}
            <div class="commentForm" id="section1">
                @include('frontend.products.commentForm')
            </div>  
            <div class="row" style="background-color: #f6f6f6; height: 20px;"></div>
            {{-- Related Comments --}}
            <div class="pageComment">
                @include('frontend.products.commentPage')
            </div>
        </div>
        <?php if ($category->slug == 'dien-thoai'): ?>
            @include('frontend.products.product_detail_phone')
        <?php elseif ($category->slug == 'laptop'): ?>
            @include('frontend.products.product_detail_laptop')
        <?php else: ?>
            @include('frontend.products.product_detail_tablet')
        <?php endif ?>
        
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
        // Comment Form Submit
        $(document).on('submit', '#commentForm', function(event) {
            event.preventDefault();
            var data = $(this).serialize();
            var route = $(this).attr('action');
            var method = $(this).attr('method');

            // console.log(route);
            // Send Data
            $.ajax({
                url: route,
                type: method,
                dataType: 'json',
                data: data,
                beforeSend: function() {
                    // $("#loading-image").show();
                    // $("#showshow").hide();
                },
                success:function(){
                    // $("#loading-image").hide();
                    // $("#showshow").show();
                    loadForm();
                    loadPage(loadComment);
                },
                error:function(){
                    console.log('Error');
                }
            });
            // ============================================================================
            // load Form Comment
            function loadForm() {
                $.ajax({
                    url: '{{ route('product.formcomment', [$product->categories->slug, $product->companies->slug, $product->slug]) }}',
                })
                .done(function(data) {
                    // console.log(data);
                    $('.commentForm').html(data);
                });
            }
            // ============================================================================
            // Load Comment pagination
            function loadComment() {
                $.ajax({
                    url: '{{ route('product.commentPagination', [$product->categories->slug, $product->companies->slug, $product->slug]) }}',
                })
                .done(function(data) {
                    // console.log(data);
                });
            }
        });
        // ============================================================================
        // Pagination Comment
        $(document).on('click', '.comment a', function(event) {
            // console.log("Success");
            event.preventDefault();
            var page = parseInt($(this).attr('href').split('pg=')[1]);
            // var page1 = $(this).attr('href');
            // console.log(page1);
            loadPage(page);
        });
        // ============================================================================
        // Function Load Page
        function loadPage(page) {
            $.ajax({
                // type: 'GET',
                url: '{{ route('product.commentPagination', [$product->categories->slug, $product->companies->slug, $product->slug]) }}?pg='+page,
            })
            .done(function(data) {
                // console.log(data);
                $('.pageComment').html(data);
                // location.hash = page;
            }); 
        }
        // ============================================================================
        // Request Form Rating
        $(document).on('submit', '#ratingstar', function(event) {
            event.preventDefault();
            var data = $(this).serialize();
            var route = $(this).attr('action');
            var method = $(this).attr('method');
            // console.log(rating);
            // console.log(route);
            // Send Data
            $.ajax({
                url: route,
                type: method,
                dataType: 'json',
                data: data,
                success:function(){
                    // console.log('Success');
                    // $('#ratingstar').toggle(400);
                    loadRatingForm();
                    loadRatingPage(loadRatingComment);
                },
                error:function(){
                    console.log('Error');
                }
            });
            // <===================================================================>
            // load Form Rating Comment->Ok
            function loadRatingForm() {
                $.ajax({
                    url: '{{ route('product.formrating', [$product->slug]) }}',
                })
                .done(function(data) {
                    // console.log(data);
                    $('#ratingcomment').html(data);
                });
            }
            // <===================================================================>
            // Load Rating Comment pagination (page_rating=1) when submit rating Success->Ok
            function loadRatingComment() {
                $.ajax({
                    url: '{{ route('product.ratingPagination', [$product->slug]) }}',
                })
                .done(function(data) {
                    // console.log(data);
                });
            }
        });
        // <========================================================================>
        // Pagination Rating Comment
        $(document).on('click', '.rating a', function(event) {
            // console.log("Success");
            event.preventDefault();
            var page_rating = parseInt($(this).attr('href').split('page_rating=')[1]);
            // var page_rating = $(this).attr('href');
            // console.log(page_rating);
            loadRatingPage(page_rating);
        });
        // <========================================================================>
        // Function Load Rating Page
        function loadRatingPage(page_rating) {
            $.ajax({
                // type: 'GET',
                url: '{{ route('product.ratingPagination', [$product->slug]) }}?page_rating='+page_rating,
            })
            .done(function(data) {
                // console.log(data);
                $('.pageRating').html(data);
                // location.hash = page_rating;
            }); 
        }
        // <========================================================================>
        // Hover Iamges Slider
        $("body").on('mouseover', '.detail img', function(event) {
            console.log("Image hover");
            var src = $(this).attr('src');
            console.log(src);
            $(".main").attr('src', src);
            /* Act on the event */
        });
           
    });
</script>
@endsection