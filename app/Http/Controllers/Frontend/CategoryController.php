<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_dt = Category::where('slug', 'dien-thoai')->first();
        $category_lt = Category::where('slug', 'laptop')->first();
        $category_tb = Category::where('slug', 'tablet')->first();

        $company_dt  = $category_dt->companies->take(6);
        $company_lt  = $category_lt->companies;
        $company_tb  = $category_tb->companies;

        // Các sản phẩm nổi bật nhất
        $products_dt = $category_dt->products->take(10); 
        $products_lt = $category_lt->products->take(10);
        $products_tb = $category_tb->products->take(10); 

        return view('frontend.categories.index', [
            'category_dt'    => $category_dt,
            'category_lt'    => $category_lt,
            'category_tb'    => $category_tb,
            'company_dt'     => $company_dt,
            'company_lt'     => $company_lt,
            'company_tb'     => $company_tb,
            'products_dt'    => $products_dt,
            'products_lt'    => $products_lt,
            'products_tb'    => $products_tb,
        ]);
    }

    // Phân trang cho Category/Products
    public function pagePagination($category)
    {
        $category = Category::where('slug', $category)->first();
        $products = Product::where('category_id', $category->id)
                            ->orderBy('price', 'desc')
                            ->paginate(8);
        if ($category->slug == 'laptop') {
            return view('frontend.categories.show_product_laptop', ['products' => $products, 'category' => $category]);
        } else {
            return view('frontend.categories.show_product', ['products' => $products, 'category' => $category]);
        }
        
        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // Show all products with Category
    public function show($slug)
    {
        $category  = Category::where('slug', $slug)->first();
        $companies = $category->companies->take(5);
        $products  = Product::where('category_id', $category->id)
                                ->orderBy('price', 'desc')
                                ->paginate(8);

        return view('frontend.categories.show_cate_product', ['products' => $products, 'companies' => $companies, 'category' => $category]);
    }

    // Show all products with Price
    public function showPriceAjax(Request $request, $slug)
    {
        $p           = $request->p;
        $category    = Category::where('slug', $slug)->first();
        $category_id = $category->id;
        switch ($p) {
            case 'duoi-3-trieu':
                $price1 = 0;
                $price2 = 3000000;
                break;
            case 'tu-3-5-trieu':
                $price1 = 3000000;
                $price2 = 5000000;
                break;
            case 'tu-5-10-trieu':
                $price1 = 5000000;
                $price2 = 10000000;
                break;
            case 'tren-10-trieu':
                $price1 = 10000000;
                $price2 = 1000000000;
                break;    
            default:
                $price1 = 0;
                $price2 = 100000000000;
                break;
        }
        $products    = Product::where('category_id', $category_id)
                            ->where('price', '>=', $price1)
                            ->where('price', '<=', $price2)
                            ->paginate(8);

        if ($slug == 'laptop') {
            return view('frontend.categories.show_price_product_laptop', ['products' => $products]);
        } else {
            return view('frontend.categories.show_price_product', ['products' => $products]);
        }
    }

    // Show all products with company and category
    public function showCompany($slug, $company)
    {
        
        $category    = Category::where('slug', $slug)->first();
        $companies   = $category->companies->take(5);
        $company     = Company::where('name', $company)->first();
        $category_id = $category->id;
        $company_id  = $company->id;
        
        $products    = Product::where('category_id', $category_id)
                                ->where('company_id', $company_id)
                                ->paginate(8);
        return view('frontend.categories.show_company_product', ['products' => $products, 'companies' => $companies, 'category' => $category, 'company' => $company]);
        
    }

    // Phân trang cho Category/Company/Products
    public function pageCompany($category, $company)
    {
        $category = Category::where('slug', $category)->first();
        $company  = Company::where('name', $company)->first();
        $products = Product::where('category_id', $category->id)
                            ->where('company_id', $company->id)
                            ->orderBy('price', 'desc')
                            ->paginate(8);
        // dd($products->toArray());
        if ($category->slug == 'laptop') {
            return view('frontend.categories.show_product_laptop', ['products' => $products, 'category' => $category, 'company' => $company]);
        } else {
            return view('frontend.categories.show_product', ['products' => $products, 'category' => $category, 'company' => $company]);
        }   
    }

    // Show all products with company and category
    public function showCompanyAjax(Request $request, $slug, $company)
    {
        $name = $request->company;
        // echo $name;
        // exit();
        $category    = Category::where('slug', $slug)->first();
        $category_id = $category->id;
        if ($name == 'all') {
            $products = Product::where('category_id', $category_id)
                                ->get();
        } else {
            $company     = Company::where('name', $name)->first();
            $company_id  = $company->id;
            $products    = Product::where('category_id', $category_id)
                                ->where('company_id', $company_id)
                                ->paginate(8);
        }
        
        // return response()->json($products);
        return view('frontend.categories.show_comp_product', ['products' => $products]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
