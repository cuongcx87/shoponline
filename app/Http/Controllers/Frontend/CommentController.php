<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Replycomment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use DateTime;
use DB;
use Carbon\Carbon;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $comments = Comment::orderBy('created_at', 'desc')->get();
        // return redirect()->route('product.show', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRating($slug)
    {
        $product = Product::where('slug', $slug)->first();
        // Hiện thị bình luận và phân trang (phần bình luận có bình chọn sao)
        $count_star1 = Comment::where('product_id', $product->id)
                                ->where('rating', '=', 1)
                                ->count();
        $count_star2 = Comment::where('product_id', $product->id)
                                ->where('rating', '=', 2)
                                ->count();
        $count_star3 = Comment::where('product_id', $product->id)
                                ->where('rating', '=', 3)
                                ->count();
        $count_star4 = Comment::where('product_id', $product->id)
                                ->where('rating', '=', 4)
                                ->count();
        $count_star5 = Comment::where('product_id', $product->id)
                                ->where('rating', '=', 5)
                                ->count();
        
        $star_avg = DB::table('comments')
                ->where('rating', '>', 0)
                ->where('product_id', $product->id)
                ->avg('rating');

        $rating_comments = Comment::where('product_id', $product->id)
                            ->where('rating', '>', 0)
                            ->orderBy('created_at', 'desc')->paginate(5, ['*'], 'page_rating');
        
        // Tính tổng số Comment (phần bình luận có bình chọn sao)
        $rating_comment_count = Comment::where('product_id', $product->id)
                                ->where('rating', '>', 0)
                                ->count();

        return view('frontend.products.ratingForm', ['product'               => $product,
                                                    'rating_comments'      => $rating_comments,
                                                    'count_star1'          => $count_star1,
                                                    'count_star2'          => $count_star2,
                                                    'count_star3'          => $count_star3,
                                                    'count_star4'          => $count_star4,
                                                    'count_star5'          => $count_star5,
                                                    'star_avg'             => $star_avg,
                                                    'rating_comment_count' => $rating_comment_count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRating(Request $request)
    {
        $comment             = new Comment;
        $comment->product_id = $request->product_id;
        $comment->content    = $request->content;
        $comment->rating     = $request->rating;
        $comment->name       = $request->name;
        $comment->phone      = $request->phone;
        $comment->email      = $request->email;
        $comment->created_at = Carbon::now();
        $comment->updated_at = Carbon::now();
        $comment             = $comment->save();
        return response()->json($comment);

    }

    // Pagination Rating Comment ajax
    public function loadRatingPage($slug)
    {
        $product = Product::where('slug', $slug)->get()->first();
        $rating_comment_count = DB::table('comments')
                            ->where('product_id', $product->id)
                            ->where('rating', '>', 0)
                            ->count();
        // Hiện thị bình luận và phân trang
        
        $rating_comments = Comment::where('product_id', $product->id)
                            ->orderBy('created_at', 'desc')
                            ->where('rating', '>', 0)
                            ->paginate(5, ['*'], 'page_rating');

        return view('frontend.products.ratingPage', ['rating_comments' => $rating_comments, 'rating_comment_count' => $rating_comment_count]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
