<meta name="csrf-token" content="{{ csrf_token() }}">

<h4 class="p-2">Thông tin đơn hàng</h4>
<hr>
<h6>Tạm tính ({{ Cart::count() }} sản phẩm) <span class="float-right">{{ Cart::subtotal(0, ',', '.') }} đ</span></h6>

@if (Session::has('code') == true)
    <?php 
        $percent = intval(session('percent'));
        $subtotal = intval(Cart::subtotal(0, ',', ''));
        $subtract = $subtotal*$percent/100;
        $total = $subtotal - $subtract;
     ?>
    <h6>
        Mã <span class="text-danger">{{ session('code') }}</span> giảm:<span class="float-right">{{ session('percent') }} %</span>
    </h6>
    <h6>
        Giảm: <span class="float-right">-{{ number_format($subtract, 0, ',', '.') }} đ</span>
    </h6>
    
    <h6>
        <strong>Cần thanh toán: <span class="float-right text-danger">{{ number_format($total, 0, ',', '.') }} đ</span></strong>
    </h6>
    
@else
    <div class="form-group">
        <div class="row">
            <div class="col-lg-8">
                <input class="form-control" type="text" placeholder="Nhập mã giảm giá" id="code" name="code" value="{{ old('code') }}">
                {{-- @if (session('status')) --}}
                <p class="text-danger status"></p>
                {{-- @endif --}}
            </div>

            <div class="col-lg-4">
                <input type="button" class="btn btn-outline-primary" id="check_coupon" style="width: 100px" value="Áp dụng">
            </div>
        </div>
    </div>
    <h6>
        <strong>Cần thanh toán: <span class="float-right text-danger">{{ Cart::subtotal() }} đ</span></strong>
    </h6> 
@endif
<h6>Chọn hình thức thanh toán</h6>
<hr>
<div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" value="COD" checked="true" name="payment">Thanh toán bằng tiền mặt
    </label>
</div>
<div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" value="ATM" name="payment">Thanh toán chuyển khoản
    </label>
</div>
<br>

<script>
    $(document).ready(function() {
        $('#check_coupon').on('click', function(event) {
            event.preventDefault();
            var code = $('#code').val();
            // console.log(code);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('coupon.checkcoupon') }}',
                method: 'post',
                data: {data:code}
            })
            .done(function(data) {
                // console.log(data);
                if (data.flag == 0) {
                    $('.status').text(data.status);
                } else {
                    location.reload();
                }
            })
            .fail(function() {
                console.log("error");
            });
            
        });
    });
</script>