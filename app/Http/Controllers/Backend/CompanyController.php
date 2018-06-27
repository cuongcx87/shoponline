<?php

namespace App\Http\Controllers\Backend;

use App\Models\Company;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DateTime;
use File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('backend.companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->select('id', 'title')->get();
        return view('backend.companies.create', ['categories' => $categories]);
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
            'name'        => 'required',
            'description' => 'required',
        ]);

        // Lấy data từ Form Request
        $company              = new Company;
        $company->name        = $request->name;
        $company->slug        = str_slug($request->name, '-');
        $company->description = $request->description;
        $company->created_at  = new DateTime;
        $company->updated_at  = new DateTime;
        $categories           = $request->category;
        
        $company->save();
        $company->categories()->attach($categories);

        // Lấy path thư mực parent (catygory)
        // dd($request->category);
        $cate_name = DB::table('categories')->select('slug')->whereIn('id', $categories)->get();

        // Tạo folder khi tạo Company mới
        foreach ($cate_name as $cate_name) {
            $path = 'images/' . $cate_name->slug . '/' . str_slug($request->name, '-');
            File::makeDirectory($path);
        }
        
        return redirect()->route('admin.company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        // $products = DB::table('products')->where('company_id', '=', $id)->get();
        $products = Product::select('id', 'title', 'category_id', 'price', 'image', 'sale_price', 'status')->where('company_id', '=', $id)->get();
           
        return view('backend.companies.show', ['company' => $company, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        $category_old = $company->categories;
        $categories = DB::table('categories')->select('id', 'title')->get();

        return view('backend.companies.edit', ['company' => $company, 'categories' => $categories, 'category_old' => $category_old]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Valdate Form
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
        ]);

        // Lấy data từ Form Request
        $dataForm = [
            'id'          => $request->id,
            'name'        => $request->name,
            'slug'        => str_slug($request->name, '-'),
            'description' => $request->description,
            'updated_at'  => new DateTime,
        ];
        
        $category_id = $request->category;
        
        DB::table('companies')
            ->where('id', $request->id)
            ->update($dataForm);
        $company = Company::find($request->id);
        $company->categories()->sync($category_id);

        // Lấy path thư mực parent (catygory)
        $cate_name = DB::table('categories')->select('slug')->whereIn('id', $category_id)->get();

        // Tạo folder mới khi sửa Company
        foreach ($cate_name as $cate_name) {
            // Lấy path
            $new_path = 'images/' . $cate_name->slug . '/' . str_slug($request->name, '-');
            // Tạo folder mới
            if(!File::exists($new_path)) {
                File::makeDirectory($new_path);
            }
        }

        return redirect()->route('admin.company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $company = Company::find($id);
        $comp_path = $company->slug;
        $categories = $company->categories;
        // dd($categories);
        
        // Xóa dữ liệu
        DB::table('companies')->where('id', '=', $id)->delete();
        // Xóa dữ liệu khỏi bảng trung gian (category_company)
        // foreach ($categories as $category) {
        //     $category_id = $category->id;
        //     $company->categories()->detach($category_id);
        // }
        
        // Xóa folder
        foreach ($categories as $category) {
            $cate_path = $category->slug;
            $path = 'images/' . $cate_path . '/' . $comp_path;
            File::deleteDirectory($path);
        }

        return redirect()->route('admin.company');
    }
}
