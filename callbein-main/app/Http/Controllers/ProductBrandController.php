<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\ProductBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductBrandController extends Controller
{
    /**
     * Brand page Show
    */
    public function index()
    {
        $all_company = Company::all();
        $all_brand = DB::table('product_brands')
                ->join('companies','product_brands.company_id','companies.id')
                ->select('companies.company_name','product_brands.*')
                ->orderBy('product_brands.id','DESC')->get();
                
        return view('admin.product_brand.brand',compact('all_brand','all_company'));
    }

    /**
     *  add product Brand
     */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'brand_code'  => 'required|unique:product_brands',
            'company_id'  => 'required',
            'brand_name'  => 'required|unique:product_brands',
            'brand_date'  => 'required',
        ]);

        $product_brand = new ProductBrand();
        $product_brand-> brand_code = $request -> brand_code;
        $product_brand-> company_id = $request -> company_id;
        $product_brand-> brand_name = $request -> brand_name;
        $product_brand-> brand_date = date('d/m/Y', strtotime($request -> brand_date));
        $product_brand-> prepared_by = Auth::user() -> name;
        $product_brand-> save();

        return redirect() -> back() -> with('success','Data Inserted Successful');
    }
    /**
     *  Brand edit
     */
    public function edit($id)
    {
        $all_brand = DB::table('product_brands')
                ->join('companies','product_brands.company_id','companies.id')
                ->select('companies.company_name','product_brands.*')
                ->orderBy('product_brands.id','DESC')->get();
        $all_company = Company::all();
        $editData = ProductBrand::findOrFail($id);
        return view('admin.product_brand.brand', compact('all_brand','all_company','editData'));
    }
    /**
     *  Update Brand data
     */
    public function update(Request $request, $id)
    {
        $validateData = $request -> validate([
            'brand_name'  => 'required|unique:product_brands,brand_name,' .$request -> id,
            'company_id'  => 'required',
        ]);

        $product_brand = ProductBrand::findOrFail($id);
        $product_brand-> company_id = $request -> company_id;
        $product_brand-> brand_name = $request -> brand_name;
        $product_brand-> prepared_by = Auth::user() -> name;
        $product_brand-> save();

        return redirect() -> route('add-brand') -> with('success', 'Data updated Successful');
    }
}
