<?php foreach ($products as $product): ?>
<div class="col-lg-3 animation" style="border-right: 1px solid #f6f6f6; padding: 15px 10px; border-bottom: 1px solid #f6f6f6;">
    <div style="height: 300px">
        <a href="{{ route('product.show', [$product->categories->slug, $product->companies->slug, $product->slug]) }}"><img width="90%" src="{{ asset($product->image) }}" alt="{{ $product->title }}"></a>
    </div>
    <div style="height: 60px">
        <a href="{{ route('product.show', [$product->categories->slug, $product->companies->slug, $product->slug]) }}">{{ $product->title }}</a>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <span>
                <a href="{{ route('product.show', [$product->categories->slug, $product->companies->slug, $product->slug]) }}"><strong class="text-danger">{{ number_format($product->price, 0, ',', '.') }} đ</strong></a>
            </span>    
        </div>
        <div class="col-lg-5">
            <span class="float-right">
                <a href="{{ route('cart.edit', $product->id) }}" class="btn btn-warning btn-sm">MUA NGAY</a>
            </span>
        </div>
    </div>
</div>
<?php endforeach ?>
<br>
<hr>
<div class="col-lg-12">
    <br>
    <div class="row justify-content-center">
        {{ $products->links('vendor/pagination/bootstrap-4') }}
    </div>
</div>