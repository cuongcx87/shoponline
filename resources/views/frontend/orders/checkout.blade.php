@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <form action="{{ route('order.store') }}" method="POST">
        <div class="row" style="background-color: white; height: auto;" id="fadeTo">
            <div class="col-lg-8" style="border-right: 1px solid #f6f6f6">
                <div class="">
                    <h4 class="p-2">Thông tin giao hàng</h4> 
                </div>
                <hr>
                <div class="row">
            		{{ csrf_field() }}
                    <div class="col-lg-6">
                        <div class="form-group">
                           <label for="fullname">Tên của bạn</label>
                           <input type="text" placeholder="Vui lòng nhập họ và tên (bắt buộc)" class="form-control" name="fullname" value="{{ old('fullname') }}" required="true">
                        </div> 
                    </div>

	                <div class="col-lg-6">
	                    <div class="form-group">
	                       <label for="ward">Địa chỉ nhận hàng</label>
	                       <input type="text" placeholder="Địa chỉ xã/ phường nhận hàng (bắt buộc)" class="form-control" value="{{ old('ward') }}" name="ward" required="true">
	                   	</div> 
	                </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                           <label for="email">Địa chỉ email</label>
                           <input type="text" placeholder="Vui lòng nhập địa chỉ email" class="form-control" name="email" value="{{ old('email') }}">
                        </div> 
                    </div>

	                <div class="col-lg-6">
	                    <div class="form-group">
	                       <label for="province">Tỉnh/ Thành phố</label>
	                       <select name="province" id="province"  class="form-control" required="true">
                                <option value="0" disabled="true" selected="true">Hãy chọn tỉnh/ thành phố (bắt buộc)</option>
	                           <?php foreach ($provinces as $province): ?>
	                           		<option value="{{ $province->name }}">{{ $province->name }}</option>
	                           <?php endforeach ?>
	                       </select>
	                   </div> 
	                </div>

	                <div class="col-lg-6">
	                   <div class="form-group">
	                       <label for="phone">Số điện thoại</label>
	                       <input type="text" placeholder="Điện thoại liên hệ (bắt buộc)" class="form-control" name="phone" value="{{ old('phone') }}" required="true">
	                   </div> 
	                </div>

	                <div class="col-lg-6">
	                    <div class="form-group">
	                       <label for="district">Quận/ Huyện</label>
	                       <select name="district" id="district"  class="form-control" required="true">
                                <option value="0" disabled="true" selected="true">Hãy chọn quận/ huyện (bắt buộc)</option>
	                       </select>
	                   </div> 
	                </div>

                    <div class="col-lg-12">
                        <textarea name="note" id="" cols="30" rows="5" class="form-control" placeholder="Hãy để lại yêu cầu của bạn (nếu có)">{{ old('note') }}</textarea>
                    </div>
                    {{-- Hidden form for orders table --}}
                    
                    <div class="col-lg-6">
                       <div class="form-group">
                           <input type="hidden" placeholder="Tổng số sản phẩm" class="form-control" name="quantity" value="{{ Cart::count() }}">
                       </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="hidden" placeholder="Tổng phải trả chưa giảm" class="form-control" name="subtotal" value="{{ Cart::subtotal(0, ',', '') }}">
                        </div> 
                    </div>
                    @if (Session::has('code') == true)
                    <?php 
                        $percent = intval(session('percent'));
                        $subtotal = intval(Cart::subtotal(0, ',', ''));
                        $subtract = $subtotal*$percent/100;
                        $total = $subtotal - $subtract;
                     ?>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="hidden" placeholder="Phần giảm" class="form-control" name="subtract" value="{{ $subtract }}">
                        </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="hidden" placeholder="Tổng cần trả" class="form-control" name="total" value="{{ $total }}">
                        </div> 
                    </div>
                    @else
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="hidden" placeholder="Phần giảm" class="form-control" name="subtract" value="0">
                        </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="hidden" placeholder="Tổng tiền phải trả" class="form-control" name="total" value="{{ Cart::subtotal(0, ',', '') }}">
                        </div> 
                    </div>    
                    @endif

                </div>
                <br>
                {{-- Chi tiết giỏ hàng --}}
                @include('frontend.orders.detailcart')
            </div>

            {{-- Thông tin đơn hàng --}}
            <div class="col-lg-4">
                <div class="loadInfoCart">
                    @include('frontend.orders.infocart')
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-primary btn-md col-lg-12">TIẾN HÀNH THANH TOÁN</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Ajax dynamic load districts --}}

<script>
    $(document).ready(function() {
        $(document).on('change', '#province', function(){
            // console.log('Hello');
            var province_name = $(this).val();//Lay value trong option
            // console.log(province_name);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                url: "{{ route('order.showdistrict') }}",
                type: 'POST',
                data: {'name': province_name}, //Truyen du lieu (name) khi request
                success:function(data){
                    // console.log('Success');
                    // console.log(data1);
                    $('#district').html(data);
                },
                error:function(){
                    console.log('Error');
                }
            });  
        });
    });
</script>
@endsection