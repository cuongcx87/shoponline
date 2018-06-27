<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $item = Cart::add($id, $product->title, 1, $product->sale_price, ['image' => $product->image, 'slug' => $product->slug, 'category' => $product->categories->slug, 'company' => $product->companies->name]);
        return redirect()->route('cart');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $rowId)
    // {
    //     Cart::update($rowId, $request->qty);
    //     return redirect()->back();
    // }

    public function autoupdate(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);
        echo $request->qty;
        // return redirect()->back();
    }

    public function click_qty(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);
        echo $request->qty;
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('home');
    }

    // Remove Item
    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }
}
