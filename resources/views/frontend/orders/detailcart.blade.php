<style>
    .form-control5{
        background-color: #fff;
        border: 1px solid #ffc107;
    }
</style>
<div class="">
    <h4 class="p-2">Chi tiết đặt hàng</h4>
    <hr>
    <?php foreach(Cart::content() as $product) :?>
    <?php $category = $product->categories; ?>
    <div class="row" style="">
        <div class="col-lg-2" style="">
            <a href="{{ route('product.show', [$product->options->category, $product->options->company, $product->options->slug]) }}">
                <img width="100%" src="{{ asset($product->options->has('image') ? $product->options->image : '') }}" alt="{{ $product->name }}">
            </a>
        </div>
        <div class="col-lg-5" style="">
            <a href="{{ route('product.show', [$product->options->category, $product->options->company, $product->options->slug]) }}" class="nav-link p-0">{{ $product->name }}</a>
            <a style="padding-left: 15px" href="{{ route('cart.romove', [$product->rowId]) }}" class="text-danger"><i class="fa fa-trash"></i></a>
        </div>
        <div class="col-lg-2" style="">
            <h5 style="color: #F57224">{{ number_format($product->price, 0, ',', '.') }}</h5>
            
        </div>
        <div class="col-lg-3 " style="">
            <div class="form-row">
                <input type="button" class="subtract_{{ $product->rowId }} btn btn-outline-warning" name="subtract" value="-" style="width: 38px;" class="btn btn-default">
                <input id="{{ $product->rowId }}" type="text" style="width: 48px" value="{{ $product->qty }}" class="text-center form-control form-control5" name="qty" min="1">
                <input type="button" class="add_{{ $product->rowId }} btn btn-outline-warning" name="up" value="+" style="width: 38px" class="btn btn-default">
            </div>
        </div>
    </div>
    <hr>
    <?php endforeach;?>
    
    <div class="row justify-content-between" style="padding: 15px">
        <a href="{{ route('cart.destroy') }}" class="btn btn-warning col-3">Làm rỗng giỏ hành</a>
        <a href="{{ route('home') }}" class="btn btn-success col-3">TIẾP TỤC MUA SẮM</a>
    </div>
    
</div>
{{-- Ajax dynamic load Qty --}}

<?php foreach(Cart::content() as $product) :?>
    <script>
        $(document).ready(function() {
            // Auto update cart when change qty
            $(document).on('change', '#{{ $product->rowId }}', function(){
                // console.log('Hello');
                var qty = parseInt($(this).val());//Lay value trong option
                var rowId = $(this).attr('id');
                // console.log(rowId);
                // console.log(qty);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                    url: "{{ route('cart.autoupdate', $product->rowId) }}",
                    type: 'POST',
                    data: {'qty': qty}, //Truyen du lieu (ty) khi request
                    success:function(data){
                        // console.log('Success');
                        // console.log(data);
                        $('#{{ $product->rowId }}').val(data);
                        location.reload();
                    },
                    error:function(){
                        console.log('Error');
                    }
                });  
            });

            // Click Add qty
            var qty = parseInt($('#{{ $product->rowId }}').val());
            $(document).on('click', '.subtract_{{ $product->rowId }}', function() {
                qty-=1;
                $('#{{ $product->rowId }}').val(qty);
                $.ajax({
                    url: "{{ route('cart.click_qty', $product->rowId) }}",
                    type: 'get',
                    data: {'qty': qty}, //Truyen du lieu (ty) khi request
                    success:function(data){
                        $('#{{ $product->rowId }}').val(data);
                        location.reload();
                    },
                    error:function(){
                        console.log('Error');
                    }
                });  
            });

            // Click Subtract qty
            $(document).on('click', '.add_{{ $product->rowId }}', function() {
                
                qty+=1;
                $('#{{ $product->rowId }}').val(qty);

                $.ajax({
                    url: "{{ route('cart.click_qty', $product->rowId) }}",
                    type: 'get',
                    data: {'qty': qty},
                    success:function(data){
                        $('#{{ $product->rowId }}').val(data);
                        location.reload();
                    },
                    error:function(){
                        console.log('Error');
                    }
                });
            });
        });
    </script>
<?php endforeach;?>