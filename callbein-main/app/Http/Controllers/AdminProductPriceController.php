<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\AdminProductPrice;
use Illuminate\Support\Facades\DB;

class AdminProductPriceController extends Controller
{
    // show admin expense interface
    public function index()
    {
        $all_product = Product::orderBy('id','DESC') -> get();
        $all_data = DB::table('admin_product_prices')
                ->join('products','admin_product_prices.product_id','products.id')
                ->select('products.product_name', 'products.product_code','admin_product_prices.*')
                ->orderBy('products.id','DESC')->get();
        return view('admin.adminProduct_price.index', compact('all_product','all_data'));
    }

    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'product_id'  => 'required|unique:admin_product_prices',
            'buying_price'  => 'required',
            'selling_price'  => 'required',
            'unit'  => 'required'
        ],
        [
            'product_id.required' =>"Please Select Product Name",
            'product_id.unique' =>"The Product has Already Inserted!"
        ]
    );
        $all_data = new AdminProductPrice();
        $all_data -> product_id = $request -> product_id;
        $all_data -> buying_price = $request -> buying_price;
        $all_data -> selling_price = $request -> selling_price;
        $all_data -> unit =  $request -> unit;
        $all_data -> price_date = $request -> price_date;
        $all_data -> prepared_by = $request -> prepared_by;

        $all_data -> save();
        return redirect() -> back() -> with('success', "Data Inserted Successfully");
    }

    public function edit($id)
    {
        $all_product = Product::orderBy('id','DESC') -> get();
        $all_data = DB::table('admin_product_prices')
                ->join('products','admin_product_prices.product_id','products.id')
                ->select('products.product_name', 'products.product_code','admin_product_prices.*')
                ->orderBy('products.id','DESC')->get();
        $editData = AdminProductPrice::findOrFail($id);
        return view('admin.adminProduct_price.index', compact('all_product','all_data','editData'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request -> validate([
            'product_id'  => 'required|unique:admin_product_prices,product_id,'.$request->id,
            'buying_price'  => 'required',
            'selling_price'  => 'required',
            'unit'  => 'required'
        ],
        [
            'product_id.required' =>"Please Select Product Name",
            'product_id.unique' =>"The Product has Already Inserted!"
        ]
    );
        $all_data = AdminProductPrice::findOrFail($id);
        $all_data -> product_id = $request -> product_id;
        $all_data -> buying_price = $request -> buying_price;
        $all_data -> selling_price = $request -> selling_price;
        $all_data -> unit =  $request -> unit;
        $all_data -> price_date = $request -> price_date;
        $all_data -> prepared_by = $request -> prepared_by;

        $all_data -> save();
        return redirect() -> route('admin-product-pricing') -> with('success', "Data Updated Successfully");
    }
}
