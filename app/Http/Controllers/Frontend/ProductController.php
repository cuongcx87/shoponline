<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Company;
use App\Models\Comment;
use App\Models\Category;
use App\Models\ReplyComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DateTime;
use Carbon\Carbon;
// use Illuminate\Pagination\LengthAwarePaginator;
// use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product_dt = Product::select('image', 'title', 'price', 'sale_price', 'sale', 'status')->where('category_id', 17)->get();

        // return $this->view('frontend.products.index', ['product_dt', $product_dt]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($category, $company, $slug)
    {
        
        $product = Product::where('slug', $slug)->get()->first();
        $category = $product->categories;
        // $category_slug = $category->slug

        // Các sản phẩm tương tự
        
        $products = Product::where('sale_price', '<=', $product->sale_price + 1000000)
                            ->where('sale_price', '>=', $product->sale_price - 1000000)
                            ->where('category_id', $product->category_id)
                            ->where('id', '<>', $product->id)
                            ->get();

        // Hiện thị bình luận và phân trang (phần bình luận không bình chọn sao)
        $comments = Comment::where('product_id', $product->id)
                            ->where('rating', 'null')
                            ->orderBy('created_at', 'desc')->paginate(5, ['*'], 'pg');
        
        // Tính tổng số Comment (phần bình luận không bình chọn sao)
        $comment_count = Comment::where('product_id', $product->id)
                            ->where('rating', 0)
                            ->count();
                            // echo $comment_count;

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

        // Thông tin chi tiết sản phẩm
        // $product_detail = ProductDetail::where('product_id', $product->id)->first();

        return view('frontend.products.show', ['product'               => $product, 
                                                'products'             => $products,
                                                // 'product_detail'       => $product_detail, 
                                                'comments'             => $comments, 
                                                'category'             => $category, 
                                                'comment_count'        => $comment_count, 
                                                'rating_comments'      => $rating_comments,
                                                'count_star1'          => $count_star1,
                                                'count_star2'          => $count_star2,
                                                'count_star3'          => $count_star3,
                                                'count_star4'          => $count_star4,
                                                'count_star5'          => $count_star5,
                                                'star_avg'             => $star_avg,
                                                'rating_comment_count' => $rating_comment_count]);
    }

    // Create Comment
    public function createComment($category, $company, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.products.commentForm', ['product' => $product]);
        
    }

    public function storeComment(Request $request)
    {
        $comment             = new Comment;
        $comment->product_id = $request->product_id;
        $comment->name       = $request->name;
        $comment->content    = $request->content;
        $comment->created_at = Carbon::now();
        $comment->updated_at = Carbon::now();
        $comment             = $comment->save();
        return response()->json([$comment]);

    }

    
    // Pagination Comment ajax
    public function loadPage($category, $company, $slug)
    {
        $product = Product::where('slug', $slug)->get()->first();
        $comment_count = DB::table('comments')
                            ->where('product_id', $product->id)
                            ->where('rating', 0)
                            ->count();
        // Hiện thị bình luận và phân trang
        
        $comments = Comment::where('product_id', $product->id)
                            ->orderBy('created_at', 'desc')
                            ->where('rating', 0)
                            ->paginate(5, ['*'], 'pg');

        return view('frontend.products.commentPage', ['comments' => $comments, 'comment_count' => $comment_count]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    
}
