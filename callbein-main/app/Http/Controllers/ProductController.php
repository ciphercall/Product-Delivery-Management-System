<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductBrand;
use Illuminate\Http\Request;
use App\Models\ProductSource;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    /**
     *  All product Show
    */
    public function index()
    {
        $all_product = DB::table('products')
                ->join('product_brands','products.brand_id','product_brands.brand_code')
                ->join('product_categories','products.category_id','product_categories.category_code')
                ->select('product_brands.brand_name', 'product_categories.category_name','products.*')
                ->orderBy('products.id','DESC')->get();

        // $all_product = Product::all();
        $all_brand = ProductBrand::all();
        $all_category = ProductCategory::all();
        $all_source = ProductSource::all();
        return view('admin.product.add-product', compact('all_brand','all_category','all_source','all_product'));
    }

    /**
     *  add product
     */
    public function store(Request $request)
    {
       $validateData = $request -> validate([
           'product_code'           => 'required|unique:products',
           'product_name'           => 'required|unique:products',
           'category_id'           => 'required',
           'brand_id'           => 'required',
           'source_id'           => 'required',
       ]);

       $product = new Product();
       $product -> product_code = 103 . $request -> category_id . $request -> brand_id . $request -> product_code . date('dmY');
       $product -> product_name = $request -> product_name;
       $product -> category_id = $request -> category_id;
       $product -> brand_id = $request -> brand_id;
       $product -> source_id = $request -> source_id;
       $product -> product_date = date('d/m/Y');
       $product -> prepared_by = Auth::user() -> name;
       $product -> save();

       return redirect() -> back() -> with('success','Product Inserted Sucessfully');

    }
    /**
     *  product edit
     */
    public function edit($id)
    {
        $all_product = DB::table('products')
                ->join('product_brands','products.brand_id','product_brands.brand_code')
                ->join('product_categories','products.category_id','product_categories.category_code')
                ->select('product_brands.brand_name', 'product_categories.category_name','products.*')
                ->orderBy('products.id','DESC')->get();

        // $all_product = Product::all();
        $all_brand = ProductBrand::all();
        $all_category = ProductCategory::all();
        $all_source = ProductSource::all();

        $editData = Product::findOrFail($id);
        return view('admin.product.add-product', compact('all_brand','all_category','all_source','all_product', 'editData'));
    }

    /**
     *  update product data
     */
    public function update(Request $request, $id)
    {
       $validateData = $request -> validate([
           'product_name'           => 'required|unique:products,product_name,' .$request -> id,
           'category_id'           => 'required',
           'brand_id'           => 'required',
           'source_id'           => 'required',
       ]);

       $product =  Product::findOrFail($id);
       $product -> product_name = $request -> product_name;
       $product -> category_id = $request -> category_id;
       $product -> brand_id = $request -> brand_id;
       $product -> source_id = $request -> source_id;
       $product -> product_date = date('d/m/Y');
       $product -> prepared_by = Auth::user() -> name;
       $product -> save();

       return redirect() -> route('add-product') -> with('success','Product Updated Sucessfully');

    }


}
