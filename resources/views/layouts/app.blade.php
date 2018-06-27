<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Latest compiled and minified CSS -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" integrity="sha384-DmABxgPhJN5jlTwituIyzIUk6oqyzf3+XuP7q3VfcWA2unxgim7OSSZKKf0KSsnh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/fontend/style.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        a:hover{
            text-decoration: none;
        }
        .form-control0{
            background-color: #f9f9f9;
            outline:none;
            box-shadow: none;
            padding: 10px;
            border: 0px;
            border-radius: 3px 0px 0px 3px;
        }
        .form-control0:focus{
            background-color: #fff;
            outline:none;
            box-shadow: none;
            padding: 10px;
            border: 0px;
            border-radius: 3px 0px 0px 3px;
        }
        .button1{
            padding: 10px;
            width: 50px;
            border: 0px;
            border-radius: 0px 3px 3px 0px;
        }
        .button2{
            padding: 10px;
            width: 80px;
            border: 0px;
        }
        .fa-shopping-cart{
            color: #2874f0;
        }
        a.navbar1{
            color: #fff;
        }
        a.navbar1:hover{
            background-color: #f9f9f9;
            color: #111;
        }
    </style>

    <?php use App\Models\Category; ?>
</head>
<body style="background-color: #f9f9f9">
<section id="showshow">
    <div class="container-fluid" style="background-color: #2874f0; height: 120px; color: white;">
        <div class="row justify-content-md-center p-0">
            <div class="col-lg-6 offset-3">
                <ul class="nav justify-content-center">
                    <?php foreach (Category::all() as $category): ?>
                    <li class="nav-item">
                        <a class="nav-link navbar1" href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a>
                    </li>
                    <?php endforeach ?>
                    <li class="nav-item"><a class="nav-link navbar1" href="{{ route('contact.create') }}">LIÊN HỆ</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <ul class="nav justify-content-center">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link navbar1" href="{{ route('login') }}">ĐĂNG NHẬP</a></li>
                        <li class="nav-item"><a class="nav-link navbar1" href="{{ route('register') }}">ĐĂNG KÝ</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link navbar1 dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Thoát</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>                
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
        <div class="row p-1">
            <div class="col-lg-3">
                <a href="{{ route('home') }}" title="Trang chủ"><h3 class="text-center text1" style="color: #ffffff">SHOP ONLINE</h3></a>
            </div>
            <div class="col-lg-6" style="">
                <form class="form-inline" method="GET" action="{{ route('search') }}">
                    <input type="text" autocomplete="off" id="search" class="form-control col-lg-11 form-control0" placeholder="Mời bạn tìm kiếm ở đây" name="keyworld" value="{{ old('keyworld') }}">
                    <button class="btn btn-warning button1" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-lg-3">
                <a href="{{ route('cart') }}" class="btn btn-warning button2">
                    <span><i class="fa fa-shopping-cart"></i></span>
                    <span class="item-number">{{ Cart::count() }}</span>
                </a>
            </div>
        </div>
    </div>
    <br>

    @yield('content')
    <br>
    <div class="container-fluid">
        <div class="row justify-content-center" style="background-color: #fff; height: 100px;">
            <h4>Copyright by Cuongcx</h4>
        </div>
        
    </div>
</section>

<!-- Scripts -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script type="text/javascript">
$(document).ready(function(){
    $("#search").autocomplete({
        source: "{{ route('ajaxsearch') }}",
            focus: function( event, ui ) {
            // $( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
            return false;
        },
        select: function( event, ui ) {
            window.location.href = ui.item.url;
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" ></div><div class="label"><h4><b>' + item.title + '</b></h4></div></div></a>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
});
</script>
</body>
</html>