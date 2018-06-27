<?php
    use Carbon\Carbon;
    Carbon::setLocale('vi');
?>
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

<script>
    $(document).ready(function() {
        // Load more Comments
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
                        $("#loadMore{{ $comment->id }}").fadeOut('slow');
                    }
                });
            });
        <?php endforeach ?>
    });
</script>