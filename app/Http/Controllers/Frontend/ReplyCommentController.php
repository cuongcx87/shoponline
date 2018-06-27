<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Replycomment;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ReplycommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();
        return view('frontend.comments.replyCommentForm', ['comment' => $comment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $replycomment             = new Replycomment;
        $replycomment->comment_id = $request->comment_id;
        $replycomment->content    = $request->content;
        $replycomment->name       = $request->name;
        $replycomment->created_at = Carbon::now();
        $replycomment->updated_at = Carbon::now();
        $replycomment             = $replycomment->save();
        return response()->json($replycomment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Replycomment  $Replycomment
     * @return \Illuminate\Http\Response
     */
    // Load Rating Reply Comments view
    public function showRatingReplyComment($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->get()->first();
        $rating_comments = Comment::where('id', $comment_id)
                            ->where('rating', '>', 0)
                            ->orderBy('created_at', 'desc')->paginate(5, ['*'], 'page_rating');
        $replycomments = Replycomment::where('comment_id', $comment_id)->orderBy('created_at', 'desc')->get();
        return view('frontend.comments.show-rating-reply-comment', ['replycomments' => $replycomments, 'comment' => $comment, 'rating_comments' => $rating_comments]);
    }

    // Load Reply Comments view
    public function showReplyComment($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->get()->first();
        $comments = Comment::where('id', $comment_id)
                            ->orderBy('created_at', 'desc')->paginate(5, ['*'], 'page_rating');
        $replycomments = Replycomment::where('comment_id', $comment_id)->orderBy('created_at', 'desc')->get();
        return view('frontend.comments.show-reply-comment', ['replycomments' => $replycomments, 'comment' => $comment, 'comments' => $comments]);
    }

    // Load reply Comment Count
    public function loadRatingReplyCommentCount($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->get()->first();
        return view('frontend.comments.reply_comment_count', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Replycomment  $Replycomment
     * @return \Illuminate\Http\Response
     */
    public function edit(Replycomment $Replycomment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Replycomment  $Replycomment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Replycomment $Replycomment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Replycomment  $Replycomment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Replycomment $Replycomment)
    {
        //
    }
}
