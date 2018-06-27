<?php

namespace App\Http\Controllers\Backend;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;

class ImageController extends Controller
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
        return view('backend.images.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product_name = $slug;
        $cate_name = $product->categories->slug;
        $comp_name = $product->companies->name;
        $file_path = 'images/' . $cate_name . '/' . $comp_name . '/' . $product_name;

        $files = $request->file('path');
        // echo $file_path;
        foreach ($files as $file) {
            // Lấy tên file
            $file_name = $file->getClientOriginalName();
            // echo $file_name .'<br>';
            // Tạo folder con cho Product mới (nếu chưa tồn tại)
            if(!File::exists($file_path)) {
                File::makeDirectory($file_path);
            }
            // Chuyển file vào thư mục và lưu product
            $file->move($file_path, $file_name);

            $image = new Image;
            $image->product_id = $product->id;
            $image->path = $file_path . '/' . $file_name;
            $image->created_at = Carbon::now();
            $image->updated_at = Carbon::now();
            $image->save();
        }
        return redirect()->route('admin.product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
