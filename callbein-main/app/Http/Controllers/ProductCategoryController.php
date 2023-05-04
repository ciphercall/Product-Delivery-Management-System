<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    /**
     *  All product Category Show
    */
    public function index()
    {
        $all_data = ProductCategory::orderBy('id', 'DESC') -> get();
        return view('admin.product_category.index', compact('all_data'));
    }
    /**
     *  add product Category
     */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'category_code'  => 'required|unique:product_categories',
            'category_name'  => 'required|unique:product_categories',
            'category_desc'  => 'required',
        ]);

        $product_category = new ProductCategory();
        $product_category-> category_code = $request -> category_code;
        $product_category-> category_name = $request -> category_name;
        $product_category-> category_desc = $request -> category_desc;
        // $product_category-> category_date = $request -> category_date;
        $product_category-> category_date = date('d/m/Y', strtotime($request -> category_date));
        $product_category-> prepared_by = Auth::user() -> name;
        $product_category-> save();

        return redirect() -> back() -> with('success','Data Inserted Successful');
    }
    
    /**
     *  category edit
     */
    public function edit($id)
    {
        $edit_data = ProductCategory::findOrFail($id);
        $all_data = ProductCategory::orderBy('id', 'DESC') -> get();
        return view('admin.product_category.index', compact('all_data', 'edit_data'));
    }
    /**
     *  Update catgory data
     */
    public function update(Request $request, $id)
    {
        $validateData = $request -> validate([
            
            'category_name'  => 'required|unique:product_categories,category_name,' .$request -> id,
            'category_desc'  => 'required',
        ]);

        $single_data = ProductCategory::findOrFail($id);
        $single_data-> category_name = $request -> category_name;
        $single_data-> category_desc = $request -> category_desc;
        // $single_data-> company_date = date('d/m/Y', strtotime($request -> date));
        $single_data-> save();

        return redirect() -> route('add-category') -> with('success', 'Data updated Successful');
    }
}
