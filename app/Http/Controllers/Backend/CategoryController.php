<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DateTime;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      $count = DB::table('products')->count();
      return view('backend.categories.index', ['categories' => $categories, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = DB::table('companies')->select('id', 'name')->get();
        return view('backend.categories.create', ['companies' => $companies]);
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
            'title'       => 'required',
            'description' => 'required',
        ]);
        $category              = new Category;
        $category->title       = $request->title;
        $category->slug        = str_slug($request->title, '-');
        $category->description = $request->description;
        $category->created_at  = new DateTime;
        $category->updated_at  = new DateTime;

        $category->save();

        // Tạo folder (Category) khi tạo Category mới
        $path_cate = 'images/' . str_slug($request->title, '-');
        File::makeDirectory($path_cate);

        return redirect()->route('admin.category');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('backend.categories.show', ['category' => Category::findOrFail($id)]);
        $category = Category::findOrFail($id)->toArray();
        $products = DB::table('categories')->where('categories.id', '=', $id)
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('companies', 'companies.id', '=', 'products.company_id')
            ->select('products.id', 'products.title', 'image', 'price', 'sale_price', 'status', 'companies.name as company', 'products.company_id', 'sale', 'companies.name as name')
            ->get();
           
        return view('backend.categories.show', ['category' => $category, 'products' => $products]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category = Category::find($id);
        $company = $category->companies;
        $companies = Company::all();
        return view('backend.categories.edit', ['category' => $category, 'company' => $company, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Lấy path foler cũ
        $category = DB::table('categories')->select('slug')->where('id', $id)->get()->first();
        $old_path = 'images/' . $category->slug;

        // Lấy data từ Form
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);
        $dataForm = [
            'id'          => $request->id,
            'title'       => $request->title,
            'slug'        => str_slug($request->title, '-'),
            'description' => $request->description,
            'updated_at'  => new DateTime,
        ];
        
        DB::table('categories')
            ->where('id', $request->id)
            ->update($dataForm);
        

        // Tạo folder khi tạo Category mới
        $new_path_cate = 'images/' . str_slug($request->title, '-');
        if(!File::exists($new_path_cate)) {
            File::makeDirectory($new_path_cate);
            // Copy dữ liệu từ folder cũ sang mới
            File::copyDirectory($old_path, $new_path_cate);

            // Xóa folder cũ
            File::deleteDirectory($old_path);
        }

        return redirect()->route('admin.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = DB::table('categories')->select('slug')->where('id', $id)->get()->first();
        $cate_path = 'images/' . $category->slug;
        DB::table('categories')->where('id', '=', $id)->delete();

        // Xóa folder
        File::deleteDirectory($cate_path);

        return redirect()->route('admin.category');
    }
}
