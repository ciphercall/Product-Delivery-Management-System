<?php

namespace App\Http\Controllers;

use App\Models\AdminProductPrice;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequisitionController extends Controller
{
    /**
    *   bein requistion form show
    */
    public function beinRequisiiton()
    {
        $get_brand = ProductBrand::orderBy('id','DESC')->get();
        $get_category = ProductCategory::orderBy('id','DESC')->get();
        $get_product = Product::orderBy('id','DESC')->get();
        return view('admin.bein.requistion.index', compact('get_brand','get_category','get_product'));
    }


    /**
     *  all requistion show
     */
    public function allBeinRequisition()
    {
        return view('admin.bein.requistion.all-requistion');
    }

    /**
     *  get Member details for requisition
    */
    public function getMemberDetail(Request $request)
    {
        $get_member = DB::connection('mysql2')->table("memberinfo")->where('MemberID', $request->member_id) -> first();
        $get_brand = ProductBrand::orderBy('id','DESC')->get();
        $get_category = ProductCategory::orderBy('id','DESC')->get();
        $get_product = Product::orderBy('id','DESC')->get();
        // dd($get_member);
        return view('admin.bein.requistion.index', compact('get_member','get_brand','get_category','get_product'));
    }

    /**
     *  get Member details for Order similar as previous
    */
    public function orderMemberDetail($id)
    {
        $get_member = DB::connection('mysql2')->table("memberinfo")->where('MemberID', $id) -> first();
        $get_brand = ProductBrand::orderBy('id','DESC')->get();
        $get_category = ProductCategory::orderBy('id','DESC')->get();
        $get_product = Product::orderBy('id','DESC')->get();
        return view('admin.bein.requistion.index', compact('get_member','get_brand','get_category','get_product'));
    }

    public function getPrice($id)
    {
        $get_price = AdminProductPrice::select('buying_price','selling_price')->where('product_id',$id)->first();
        return $get_price;
        
    }
}
