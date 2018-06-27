@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row" style="background-color: white; height: auto;" id="fadeTo">
        <div class="col-lg-8" style="border-right: 1px solid #f6f6f6">
            <div class="">
                <h4>Thông tin giao hàng</h4>
            </div>
            <hr>
            {{-- Form Thông tin checkout --}}
            <form action="#" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                           <label for="fullname">Tên của bạn</label>
                           <input type="text" placeholder="Vui lòng nhập họ và tên" class="form-control" name="fullname" value="">
                        </div> 
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                           <label for="address">Địa chỉ nhận hàng</label>
                           <input type="text" placeholder="Vui lòng nhập địa chỉ (xã, phường) nhận hàng" class="form-control" value="{{ old('address') }}" name="address">
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
                           <input disabled="true" class="form-control" value="{{ old('province') }}">
                        </div>  
                    </div>

                    <div class="col-lg-6">
                       <div class="form-group">
                           <label for="phone">Số điện thoại</label>
                           <input type="text" placeholder="Vui lòng nhập số điện thoại của bạn" class="form-control" name="phone" value="{{ old('phone') }}">
                       </div> 
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                           <label for="district">Quận/ Huyện</label>
                           <input disabled="true" class="form-control" value="{{ old('district') }}">
                        </div> 
                    </div>

                    <div class="col-lg-6">
                        <button class="btn btn-primary">LƯU THÔNG TIN</button>
                    </div>
                </div>
            </form>
            <hr>
            {{-- Chi tiết giỏ hàng --}}
            @include('frontend.orders.detailcart')
        </div>

        {{-- Thông tin đơn hàng --}}
        @include('frontend.orders.infocart')
    </div>
    <div class="panel-footer">
        <h5 class="text-center">Copy by Cuongcx</h5>
    </div>
</div>

{{-- Ajax dynamic load districts --}}

<script>
    $(document).ready(function() {
        $(document).on('change', '#province', function(){
            // console.log('Hello');
            var province_id = $(this).val();//Lay value trong option
            // console.log(province_id);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                url: "{{ route('order.showdistrict') }}",
                type: 'POST',
                data: {'id': province_id}, //Truyen du lieu (id) khi request
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