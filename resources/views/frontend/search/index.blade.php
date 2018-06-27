@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Kết quả tìm kiếm --}}
    @if($products->count() > 0)
        <div class="row" style="background-color: white; min-height: 400px;">
            <div class="col-lg-12" style="padding: 0px">
                <h6 class="text-center text-danger">Tìm thấy <strong>{{ $products->count() }}</strong> kết quả cho từ khóa: <strong>{{ $keyworld }}</strong></h6>
            </div>
            <div class="col-lg-12" style="padding: 0px">
                <div class="row">
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-2" style="border-left: 1px solid #f6f6f6; padding: 15px 10px">
                            <a href="{{ route('product.show', [$product->categories->slug, $product->companies->slug, $product->slug]) }}"><img width="100%" src="{{ asset($product->image) }}" alt="{{ $product->title }}"></a>
                            <p>{{ $product->title }}</p>
                            <h5>Giá bán: {{ $product->price }}</h5>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    @else
        <div class="row" style="background-color: white; min-height: 400px;">
            <div class="col-lg-12" style="padding: 0px">
                <h6 class="text-center text-danger">Không tìm thấy kết quả nào phù họp cho từ khóa: <strong>{{ $keyworld }}</strong></h6>
            </div>
            
        </div>
    @endif
    
    <div class="card-footer row" style="height: 100px">
        <h5 class="text-center">Copy by Cuongcx</h5>
    </div>
</div>
@endsection