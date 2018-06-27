<style>
    .form-control1{
        border: 1px solid #d6d6d6;
        border-radius: 5px 5px 0px 0px;
    }

    .form-control2{
        border: 1px solid #d6d6d6;
        border-top: 0px;
        border-radius: 0px 0px 5px 5px;
    }
</style>
<form action="{{ route('product.storeComment', [$product->categories->slug, $product->companies->slug, $product->slug]) }}" method="POST" id="commentForm">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12">
            <input type="hidden" value="{{ $product->id }}" name="product_id">
        </div>

        <div class="col-lg-12" id="name">
            <input type="text" name="name" class="form-control form-control1" required="true" placeholder="Vui lòng nhập họ tên của bạn">
        </div>

        <div class="col-lg-12">
            <textarea class="form-control form-control2" name="content" id="content" cols="30" rows="5" placeholder="Mời bạn bình luận ở đây" minlength="10" required="true"></textarea>
        </div>

        <div class="col-lg-12" style="padding: 20px">
            <div class="row">
                <div class="col-lg-3">
                    <a href="#" class="btn btn-default" >Quy định đăng bài</a>
                </div>
                <div class="col-lg-3">
                </div>
                <div class="col-lg-2 ml-auto">
                    <button style="width: 80px" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Gửi</button>
                </div>
            </div>
        </div>
    </div>
</form>