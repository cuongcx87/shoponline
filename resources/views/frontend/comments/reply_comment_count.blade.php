<small class="btn btn-link" style="padding-left: 0px" id="reply_comment{{ $comment->id }}">@if($comment->replycomment->count() > 0) {{ $comment->replycomment->count() }} @endif thảo luận</small>

<script>
    $(document).ready(function() {
        // Toggle Form ReplyComment
        $('#reply_comment{{ $comment->id }}').click(function() {
            $('#reply_commentform{{ $comment->id }}').toggle(300);
        });
    });
</script>