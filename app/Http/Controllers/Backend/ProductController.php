<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DateTime;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies  = DB::table('companies')->select('id', 'name')->get();
        $categories = DB::table('categories')->select('id', 'title')->get();
        return view('backend.products.create', ['companies' => $companies, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required',
            'image'      => 'required',
            'info'       => 'required',
            'price'      => 'required',
            'sale_price' => 'required'
        ]);

        // Lấy tên file
        $file = $request->image;
        $file_name = str_slug($request->title, '-');
        $file_exte = $file->getClientOriginalExtension();

        // Lấy tên đường dẫn
        $cate_id = $request->category;
        $comp_id = $request->company;
        $cate_name = DB::table('categories')->select('slug')->where('id', $cate_id)->get()->first()->slug;
        $comp_name = DB::table('companies')->select('slug')->where('id', $comp_id)->get()->first()->slug;
        $file_path = 'images/' . $cate_name . '/' . $comp_name . '/' . $file_name;
        $file_img = $file_path . '/' .$file_name .'.'.$file_exte;

        // Lấy dữ liệu product
        $product              = new Product;
        $product->title       = $request->title;
        $product->slug        = str_slug($request->title, '-');
        $product->image       = $file_img;
        $product->info        = $request->info;
        $product->price       = $request->price;
        $product->sale_price  = $request->sale_price;
        $product->category_id = $cate_id;
        $product->company_id  = $comp_id;
        $product->created_at  = new DateTime;
        $product->updated_at  = new DateTime;

        // Tạo folder con cho Product mới
        File::makeDirectory($file_path);

        // Chuyển file vào thư mục và lưu product
        $request->image->move($file_path, $file_name .'.'.$file_exte);
        $product->save();

        return redirect()->route('admin.product');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = DB::table('companies')->select('id', 'name')->get();
        $categories = DB::table('categories')->select('id', 'title')->get();
        $product = Product::findOrFail($id);
        return view('backend.products.edit', ['product' => $product, 'companies' => $companies, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'      => 'required',
            'image'      => 'required',
            'info'       => 'required',
            'price'      => 'required',
            'sale_price' => 'required'
        ]);

        // Lấy tên file
        $file = $request->image;
        $file_name = str_slug($request->title, '-');
        $file_exte = $file->getClientOriginalExtension();

        // Lấy tên đường dẫn
        $cate_id = $request->category;
        $comp_id = $request->company;
        $cate_name = DB::table('categories')->select('slug')->where('id', $cate_id)->get()->first()->slug;
        $comp_name = DB::table('companies')->select('slug')->where('id', $comp_id)->get()->first()->slug;
        $file_path = 'images/' . $cate_name . '/' . $comp_name . '/' . $file_name;
        $file_img = $file_path . '/' .$file_name .'.'.$file_exte;

        // Lấy dữ liệu product
        $dataForm = [
            'title'       => $request->title,
            'company_id'  => $comp_id,
            'category_id' => $cate_id,
            'image'       => $file_img,
            'info'        => $request->info,
            'price'       => $request->price,
            'sale_price'  => $request->sale_price,
            'hotkey'      => $request->hotkey,
            'sale'        => $request->sale,
            'status'      => $request->status,
            'updated_at'  => new DateTime
        ];
        // dd($dataForm);
        // Chuyển file vào thư mục và lưu product
        $request->image->move($file_path, $file_name .'.'.$file_exte);
        DB::table('products')
            ->where('id', $request->id)
            ->update($dataForm);
        return redirect()->route('admin.product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('products')->where('id', '=', $id)->first();
        $image = $product->image;
        DB::table('products')->where('id', '=', $id)->delete();
        File::delete($image);
        return redirect()->route('admin.product');
    }
}
