<form action="{{ route('replycomment.store', $comment->id) }}" id="reply_comment_form{{ $comment->id }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12">
            <input type="hidden" value="{{ $comment->id }}" name="comment_id">
        </div>
        <div class="col-lg-12" id="name" style="border-bottom: 1px solid #f6f6f6; padding-bottom: 10px;">
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

