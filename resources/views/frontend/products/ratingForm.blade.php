<div id="ratingcomment">
    <h5>Đánh giá về sản phẩm: {{ $product->title }}</h5>
    <div class="row"  style="padding: 15px">
        <div class="col-lg-12" style="border: 1px solid #e5e5e5; border-radius: 5px; padding-bottom: 20px">
            <div class="row">
                <div class="col-lg-2">
                    <h2 class="text-danger">{{ number_format($star_avg, 1, '.', ',') }} <i class="fas fa-star"></i></h2>
                    <h6 class="text-muted">{{ $rating_comment_count }} đánh giá</h6>
                </div>
                <div class="col-lg-7" style="border-left: 1px solid #f6f6f6; border-right: 1px solid #f6f6f6">
                    <div class="row" style="padding: 0; margin: 0px">
                        <div class="col-lg-2">
                            <h6 class="text-right" style="margin: 5px 0px">5 <i class="fas fa-star"></i></h6>
                        </div>
                        <div class="col-lg-9">
                            <div class="progress" style="height: 8px; margin: 12px">
                            <?php if ($rating_comment_count > 0): ?>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:{{ $count_star5*100/$rating_comment_count }}%">
                                </div>
                            <?php else: ?>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:0%">
                                </div>
                            <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <h6 class="text-right" style="margin: 5px 0px">{{ $count_star5 }}</h6>
                        </div>
                    </div>
                    <div class="row" style="padding: 0; margin: 0px">
                        <div class="col-lg-2">
                            <h6 class="text-right" style="margin: 5px 0px">4 <i class="fas fa-star"></i></h6>
                        </div>
                        <div class="col-lg-9">
                            <div class="progress" style="height: 8px; margin: 12px">
                            <?php if ($rating_comment_count > 0): ?>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:{{ $count_star4*100/$rating_comment_count }}%">
                                </div>
                            <?php else: ?>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:0%">
                                </div>
                            <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <h6 class="text-right" style="margin: 5px 0px">{{ $count_star4 }}</h6>
                        </div>
                    </div>
                    <div class="row" style="padding: 0; margin: 0px">
                        <div class="col-lg-2">
                            <h6 class="text-right" style="margin: 5px 0px">3 <i class="fas fa-star"></i></h6>
                        </div>
                        <div class="col-lg-9">
                            <div class="progress" style="height: 8px; margin: 12px">
                            <?php if ($rating_comment_count > 0): ?>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:{{ $count_star3*100/$rating_comment_count }}%">
                                </div>
                            <?php else: ?>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:0%">
                                </div>
                            <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <h6 class="text-right" style="margin: 5px 0px">{{ $count_star3 }}</h6>
                        </div>
                    </div>
                    <div class="row" style="padding: 0; margin: 0px">
                        <div class="col-lg-2">
                            <h6 class="text-right" style="margin: 5px 0px">2 <i class="fas fa-star"></i></h6>
                        </div>
                        <div class="col-lg-9">
                            <div class="progress" style="height: 8px; margin: 12px">
                            <?php if ($rating_comment_count > 0): ?>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:{{ $count_star2*100/$rating_comment_count }}%">
                                </div>
                            <?php else: ?>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:0%">
                                </div>
                            <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <h6 class="text-right" style="margin: 5px 0px">{{ $count_star2 }}</h6>
                        </div>
                    </div>
                    <div class="row" style="padding: 0; margin: 0px">
                        <div class="col-lg-2">
                            <h6 class="text-right" style="margin: 5px 0px">1 <i class="fas fa-star"></i></h6>
                        </div>
                        <div class="col-lg-9">
                            <div class="progress" style="height: 8px; margin: 12px">
                            <?php if ($rating_comment_count > 0): ?>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:{{ $count_star1*100/$rating_comment_count }}%">
                                </div>
                            <?php else: ?>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="width:0%">
                                </div>
                            <?php endif ?>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <h6 class="text-right" style="margin: 5px 0px">{{ $count_star1 }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" style="padding: 20px; text-align: center;">
                    <button class="btn btn-primary btn-sm" style="margin-top: 30px" id="rating_star">Gửi đánh giá của bạn</button>
                </div>
            </div>
            <div class="ratingForm">
                <form action="{{ route('product.storerating', $product->slug) }}" method="POST" id="ratingstar" style="display: none;">
                    {{ csrf_field() }}
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-lg-3">
                            <h6>Chọn đánh giá của bạn</h6>
                        </div>
                        <div class="star-rating col-lg-4">
                            <span class="fas fa-star fa-2x text-muted p-0" data-rating="1" data-status="Không thích"></span>
                            <span class="fas fa-star fa-2x text-muted p-0" data-rating="2" data-status="Tạm được"></span>
                            <span class="fas fa-star fa-2x text-muted" data-rating="3" data-status="Bình thường"></span>
                            <span class="fas fa-star fa-2x text-muted" data-rating="4" data-status="Rất tốt"></span>
                            <span class="fas fa-star fa-2x text-muted" data-rating="5" data-status="Tuyệt vời"></span>
                            <input type="hidden" name="whatever1" class="rating-value" value="0">
                          </div>
                        <div class="col-lg-2">
                            <h6 class="status text-primary"></h6>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 20px; display: none;" id="rating_form">
                        <div class="col-lg-12">
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                        </div>
                        <div class="col-lg-12">
                            <input type="hidden" value="" name="rating" id="select_rating">
                        </div>
                        <div class="col-lg-5">
                            <textarea class="form-control" name="content" id="content" cols="30" rows="6" placeholder="Mời bạn bình luận ở đây" minlength="10" required="true"></textarea>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="Họ tên" name="name">
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Số điện thoại" name="phone">
                                </div>
                            </div>
                            <div class="row" style="padding-top: 15px">
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                </div>
                                <div class="col-lg-5">
                                    <button id="ratingform" class="btn btn-primary col-lg-12">GỬI ĐÁNH GIÁ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Toggle Rating Star Form
        $('#rating_star').click(function() {
            $('#ratingstar').toggle(400);
        });
        // <========================================================================>
        // Show Form Rating
        $('.star-rating .fas').click(function() {
            $('#rating_form').show();
        });
        // <========================================================================>
        // Rating Star
        var $star_rating = $('.star-rating .fas');
        var SetRatingStar = function() {
            return $star_rating.each(function() {          
            
            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
              return $(this).removeClass('text-muted').addClass('text-warning');
              
            } else {
              return $(this).removeClass('text-warning').addClass('text-muted');
            }
            
          });
        };

        $star_rating.on('click', function() {
            status = $(this).data('status');
            star   = $(this).data('rating');
            // console.log(status);select_rating
            $('.status').text(status);
            $('#select_rating').attr('value', star);
            $star_rating.siblings('input.rating-value').val($(this).data('rating'));
            return SetRatingStar();
        });

        SetRatingStar();
        $(document).ready(function() {

        }); 
    });
</script>