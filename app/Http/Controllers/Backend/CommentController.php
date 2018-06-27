<?php

namespace App\Http\Controllers\Backend;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use DB;

class CommentController extends Controller
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
    public function create()
    {
        $product = Product::find(6);
        $user = User::find(2);
        return view('backend.comments.create', ['product' => $product, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comments = DB::table('products')->select('comments')->where('id', '=', 6)->first();
        // $comments = 6;
        $request->validate([
            'content' => 'required',
        ]);
        $comment             = new Comment;
        $comment->user_id    = $request->user;
        $comment->product_id = $request->product;
        $comment->content    = $request->content;
        $comment->created_at = new DateTime;
        // dd($comments);
        $count = $comments->comments;
        if ($comment->save()) {
            DB::table('products')
            ->where('id', 6)
            ->update(['comments' => $count + 1]);
            // $product = Product::find(6);
            // $product->comments = $count + 1;
            // $product->save();
        }
        
        return redirect()->route('admin.comment');
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
    public function destroy($id)
    {
        DB::table('comments')->where('id', '=', $id)->delete();
        return redirect()->route('admin.product');
    }
}
