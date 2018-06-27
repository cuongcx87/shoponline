<?php

namespace App\Http\Controllers\Backend;

use App\Models\ProductDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ProductDetailController extends Controller
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
    public function create($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $category_name = $product->categories->slug;
        switch ($category_name) {
            case 'dien-thoai':
                return view('backend.product_details.create_phone', ['product' => $product]);
                break;
            case 'laptop':
                return view('backend.product_details.create_laptop', ['product' => $product]);
                break;
            default:
                return view('backend.product_details.create_tablet', ['product' => $product]);
                break;
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        // dd($request->toArray());
        $product                         = Product::where('slug', $slug)->first();
        $product_detail                  = new ProductDetail;
        $product_detail->product_id      = $product->id;
        $product_detail->warranty        = $request->warranty;
        $product_detail->policy_warranty = $request->policy_warranty;
        $product_detail->include         = $request->include;
        $product_detail->screen          = $request->screen;
        $product_detail->graphic_card    = $request->graphic_card;
        $product_detail->os              = $request->os;
        $product_detail->cpu             = $request->cpu;
        $product_detail->ram             = $request->ram;
        $product_detail->rom             = $request->rom;
        $product_detail->camera_after    = $request->camera_after;
        $product_detail->camera_before   = $request->camera_before;
        $product_detail->connection      = $request->connection;
        $product_detail->conversation    = $request->conversation;
        $product_detail->weight          = $request->weight;
        $product_detail->hard_disk       = $request->hard_disk;
        $product_detail->model           = $request->model;
        $product_detail->size            = $request->size;
        $product_detail->sim             = $request->sim;
        $product_detail->memory          = $request->memory;
        $product_detail->battery         = $request->battery;
        $product_detail->fm              = $request->fm;
        $product_detail->jack_headphone  = $request->jack_headphone;
        $product_detail->created_at = Carbon::now();
        $product_detail->updated_at = Carbon::now();

        $product_detail->save();
        return redirect()->route('admin.product');
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetail $productDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDetail $productDetail)
    {
        //
    }
}
