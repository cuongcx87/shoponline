<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{

    public function autoComplete()
    {
        // return view('autocomplete');
        // echo "string";
    }
    
    public function autoCompleteAjax(Request $request)
    {
        $search=  $request->term;
        
        $posts = Product::where('title','LIKE',"%{$search}%")
                       ->orderBy('created_at','DESC')->limit(5)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $new_row['title']= $post->title;
                $new_row['image']= asset($post->image);
                $new_row['url']= route('product.show', [$post->categories->slug, $post->companies->name, $post->slug]);

                $row_set[] = $new_row; //build an array
            }
        }
        return response()->json($row_set);
        
    }

    // Search Products
    public function search(Request $request)
    {
        $keyworld = $request->keyworld;
        $keyworld11 = str_replace('    ', '-', $keyworld);
        $keyworld12 = str_replace('   ', '-', $keyworld11);
        $keyworld13 = str_replace('  ', '-', $keyworld12);
        $keyworld1 = str_replace(' ', '-', $keyworld13);
        $keyworld2 = str_replace("'", '', $keyworld1);
        $keyworld3 = str_replace('"', '', $keyworld1);
        
        $products = Product::where('title', 'LIKE', '%'.$keyworld.'%')
                            ->orWhere('slug', 'LIKE', '%'.$keyworld1.'%')
                            ->orWhere('slug', 'LIKE', '%'.$keyworld2.'%')
                            ->orWhere('slug', 'LIKE', '%'.$keyworld3.'%')
                            ->take(10)->get();
        
        return view('frontend.search.index', ['products' => $products, 'keyworld' => $keyworld]);
    }


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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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
