{{-- Related Comments --}}
<style>
	.form-control:focus{background-color: #fff; outline:none;box-shadow: none;}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<?php
	use Carbon\Carbon;
	Carbon::setLocale('vi');
?>
<h5>{{ $comment_count }} bình luận</h5>
<hr>
<?php if ($comments->count() > 0): ?>
    <?php foreach ($comments as $comment): ?>
    <div class="media p-0">
	    <div class="media-body" style="padding-bottom: 15px">
	      	<h6>{{ $comment->name }}<small> ({{ Carbon::parse($comment->created_at)->diffForHumans(Carbon::now()) }})</small></h6>
	      	<span style="margin-bottom: 0px">{{ $comment->content }}</span>
	      	<h6 style="margin-bottom: 0px" id="reply_comment_count{{ $comment->id }}">
	      		<small class="btn btn-link" style="padding-left: 0px" id="reply_comment{{ $comment->id }}">@if($comment->replycomment->count() > 0) {{ $comment->replycomment->count() }} @endif thảo luận</small>
	      	</h6>
	      	<div class="row"  style="padding: 15px; display: none;" id="reply_commentform{{ $comment->id }}">
	            <div class="col-lg-12 replyCommentForm" style="border: 1px solid #e5e5e5; border-radius: 5px">
	                <form action="{{ route('replycomment.store', $comment->id) }}" id="reply_comment_form{{ $comment->id }}" method="POST">
    					{{ csrf_field() }}
					    <div class="row">
					    	<div class="col-lg-12">
					            <input type="hidden" value="{{ $comment->id }}" name="comment_id">
					        </div>
					        <div class="col-lg-12" style="border-bottom: 1px solid #f6f6f6; padding-bottom: 10px;">
					            <input type="text" name="name" class="form-control border border-0" required="true" placeholder="Vui lòng nhập họ tên của bạn" style="padding: 0px;" autofocus="true">
					        </div>
					        <div class="col-lg-12">
					            <textarea class="form-control border border-0" name="content" id="content{{ $comment->id }}" cols="30" rows="5" placeholder="Nội dung bình luận ở đây" minlength="10" required="true" style="padding: 0px"></textarea>
					        </div>
					        <div class="col-lg-12" style="padding: 5px; border-top: 1px solid #f6f6f6">
					            <div class="row p-0">
					                <div class="col-lg-3 p-0">
					                    <a href="#" class="btn btn-default" >Quy định đăng bài</a>
					                </div>
					                <div class="col-lg-3 p-0">
					                </div>
					                <div class="col-lg-2 ml-auto p-0">
					                    <button style="width: 80px" class="btn btn-primary btn-sm" id="reply_commentSubmit{{ $comment->id }}">Gửi</button>
					                </div>
					            </div>
					        </div>
					    </div>
					</form>
	            </div>
            </div>

            {{-- Reply Comment --}}
            <div class="jaxreplycomment{{ $comment->id }}">
            	<?php if ($comment->replycomment->count() > 0): ?>
		      	<div class="media p-1 border " style="background-color: #f9f9f9; border-radius: 5px">
				    <div class="media-body" style="padding-left: 10px">
				        <?php foreach ($comment->replycomment as $repcomment): ?>
				        <div class="loadmore{{ $comment->id }}" style="display: none;">
				            <h6>{{ $repcomment->name }}<small> ({{ Carbon::parse($repcomment->created_at)->diffForHumans(Carbon::now()) }})</small></h6>
				            <p style="margin-bottom: 10px">{{ $repcomment->content }}</p>
				            <hr>
				        </div>
				        <?php endforeach ?>
				        <a href="#" id="loadMore{{ $comment->id }}" style="display: none;"><i class="fas fa-comment"></i> Xem thêm <span class="count_more{{ $comment->id }}"></span> thảo luận</a>
				    </div>
				</div>
				<?php endif ?> 
			</div>
        </div>
	</div>
    <?php endforeach ?>
<?php endif ?> 

{{ $comments->links('vendor/pagination/bootstrap-4-comment') }}

{{-- Ajax load ReplyComments --}}
<script>
	$(document).ready(function() {
		$.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
		// Load more Comment
		<?php foreach ($comments as $comment): ?>
			$(function () {
				var count = $(".loadmore{{ $comment->id }}:hidden").length;
				if (count > 1) {
					$('.count_more{{ $comment->id }}').text(count-1);
			        $('#loadMore{{ $comment->id }}').show();
			    }
				
			    $(".loadmore{{ $comment->id }}").slice(0, 1).show();
			    count = count - 1;
			    $("#loadMore{{ $comment->id }}").on('click', function (e) {
			        e.preventDefault();
			        count = count - 2;
			        console.log(count);
			        $('.count_more{{ $comment->id }}').text(count);
			        $(".loadmore{{ $comment->id }}:hidden").slice(0, 2).slideDown();
			        if ($(".loadmore{{ $comment->id }}:hidden").length == 0) {
			            $("#loadMore{{ $comment->id }}").hide();
			        }
			    });
			});
		<?php endforeach ?>

		// Toggle Form ReplyComment And Ajax load reply Comment
		<?php foreach ($comments as $comment): ?>
			
			// Reply Comment Form Submit
	        $(document).on('submit', '#reply_comment_form{{ $comment->id }}', function(event) {
	            event.preventDefault();
	            // console.log("SuccessSubmit");
	            var data = $(this).serialize();
	            // var route = $(this).attr('action');
	            var route = '{{ route('replycomment.store', $comment->id) }}';
	            var method = $(this).attr('method');

	            console.log(route);
	            // Send Data
	            $.ajax({
	                url: route,
	                type: method,
	                dataType: 'json',
	                data: data,
	                success:function(){
	                    $('#content{{ $comment->id }}').val('');
	                    $('#reply_commentform{{ $comment->id }}').hide('400');
	                    loadReplyComment();
	                    loadReplyCommentCount();
	                },
	                error:function(){
	                    console.log('Error');
	                }
	            });

	            // load Reply Comment->Not Ok
	            function loadReplyComment() {
	                $.ajax({
			            url: '{{ route('replycomment.loadpage', $comment->id)}}',
			        })
			        .done(function(data) {
			            console.log(data);
			            $('.jaxreplycomment{{ $comment->id }}').html(data);
			        });
	            }
	            // Load Reply Comment Count->ok
	            function loadReplyCommentCount() {
	                $.ajax({
			            url: '{{ route('load.replycomment.count', $comment->id) }}',
			        })
			        .done(function(data) {
			            // console.log(data);
			            $('#reply_comment_count{{ $comment->id }}').html(data);
			        });
	            }

	        });
			// Toggle Form ReplyComment->ok
			$('#reply_comment{{ $comment->id }}').click(function() {
				$('#reply_commentform{{ $comment->id }}').toggle(300);
			});
        <?php endforeach ?>
	});
</script>


