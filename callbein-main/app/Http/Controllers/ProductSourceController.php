<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSource;
use Illuminate\Support\Facades\Auth;

class ProductSourceController extends Controller
{
    /**
     *  All product source Show
    */
    public function index()
    {
        $all_data = ProductSource::orderBy('id', 'DESC') -> get();
        return view('admin.product_source.index', compact('all_data'));
    }
    /**
     *  add product source
     */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'product_source'  => 'required|unique:product_sources',
            'date'  => 'required',
        ]);

        $productSource = new ProductSource();
        $productSource-> product_source = $request -> product_source;
        $productSource-> date = date('d/m/Y', strtotime($request -> date));
        $productSource-> prepared_by = Auth::user() -> name;
        $productSource-> save();

        return redirect() -> back() -> with('success','Data Inserted Successful');
    }
    /**
     *  Product Source edit
     */
    public function edit($id)
    {
        $edit_data = ProductSource::findOrFail($id);
        $all_data = ProductSource::orderBy('id', 'DESC') -> get();
        return view('admin.product_source.index', compact('all_data', 'edit_data'));
    }
    /**
     *  Update catgory data
     */
    public function update(Request $request, $id)
    {
        $validateData = $request -> validate([
            
            'product_source'  => 'required|unique:product_sources,product_source,' .$request -> id,
        ]);

        $single_data = ProductSource::findOrFail($id);
        $single_data-> product_source = $request -> product_source;
        $single_data-> save();

        return redirect() -> route('add-product-source') -> with('success', 'Data updated Successful');
    }
}
