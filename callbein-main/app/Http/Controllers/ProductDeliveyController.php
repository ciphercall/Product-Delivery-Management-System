<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use App\Models\ChalanDetail;
use Illuminate\Http\Request;
use App\Models\ProductChalan;
use App\Models\ProductDelivery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductDeliveyController extends Controller
{
    /**
     *  All product delivery Show
    */
    public function index()
    {
        $delivery_man = DeliveryMan::all();
        $all_data = ProductDelivery::where('status', 0) -> orderBy('id','DESC')->get();
        return view('admin.productDelivery.productDelivery',compact('delivery_man','all_data'));
    }

    /**
     *  Product delivery Store
     */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'invoice_id'  => 'required|unique:product_deliveries',
            'delivery_man'  => 'required',
            'areaby'  => 'required',
            'date'  => 'required',
            'time'  => 'required',
            'prepared_by'  => 'required',
        ]);
        $all_data = new ProductDelivery();
        $all_data -> invoice_id = $request -> invoice_id;
        $all_data -> delivery_man = $request -> delivery_man;
        $all_data -> areaby = $request -> areaby;
        $all_data -> date = $request -> date;
        $all_data -> time = $request -> time;
        $all_data -> prepared_by = $request -> prepared_by;
        $all_data -> save();
        return redirect() -> back() -> with('success', "Data Inserted Successfully");
    }
    /**
     *  Product delivery edit
     */

    public function edit($id)
    {
        $editData = ProductDelivery::findOrFail($id);
        $all_data = ProductDelivery::orderBy('id','DESC')->get();
        $delivery_man = DeliveryMan::all();
        return view('admin.productDelivery.productDelivery',compact('delivery_man','all_data','editData'));
    }

    /**
     *  Product delivery Update
     */

    public function update(Request $request, $id)
    {
        $validateData = $request -> validate([
            'invoice_id'  => 'required',
            'delivery_man'  => 'required',
            'areaby'  => 'required',
            'date'  => 'required',
            'time'  => 'required',
            'prepared_by'  => 'required',
        ]);
        $all_data = ProductDelivery::findOrFail($id);
        $all_data -> invoice_id = $request -> invoice_id;
        $all_data -> delivery_man = $request -> delivery_man;
        $all_data -> areaby = $request -> areaby;
        $all_data -> date = $request -> date;
        $all_data -> time = $request -> time;
        $all_data -> prepared_by = $request -> prepared_by;
        $all_data -> save();
        return redirect() -> route('product-delivery') -> with('success', "Data Updated Successfully");
    }

    /**
     *  store chalan
     */
    public function chalanStore(Request $request)
    {
       $validateData = $request -> validate([
           'chalan_id'  => 'required|unique:product_chalans,chalanId',
           'delivery_id'  => 'required'
       ]);

       // send data product chalan table
       $delivery_id = implode(',',$request->delivery_id);
       $product_chalan = new ProductChalan();
       $product_chalan -> delivery_id = $delivery_id;
       $product_chalan -> chalanId = $request -> chalan_id;
       $product_chalan -> date = date('Y-m-d ');
       $product_chalan -> time = date('H:i:s');
       $product_chalan -> prepared_by = Auth::user() -> name;
       $product_chalan -> save();

       // for status change after second form submit
       $all_delivery_data = count($request -> delivery_id);
       $delivery_all = $request -> delivery_id;
       for ($i=0; $i < $all_delivery_data; $i++) { 
            $product_delivery = ProductDelivery::findOrFail($delivery_all[$i]);
            $product_delivery -> status = 1;
            $product_delivery -> save();
       }

       // send data in chalan details table
       $data = count($request -> delivery_id);
       $delivery_id = $request -> delivery_id;
        for($i=0; $i< $data ; $i++){
            $product_chalan_detail = new ChalanDetail();
            $product_chalan_detail -> delivery_id = $delivery_id[$i];
            $product_chalan_detail -> chalan_id = $product_chalan -> id;
            $product_chalan_detail -> save();
        }
      return redirect() -> route('chalan-view') -> with('success', 'Data Inserted Successfully');

    }
    /**
     *  for show all chalan view page
     */
    public function chalanView()
    {
        $all_data = ProductChalan::orderBy('id', 'DESC') -> get();
       return view('admin.productDelivery.all-chalan', compact('all_data'));
    }
    /**
     *  for view chalan details
     */
    public function chalanViewDetails($id)
    {
        $all_data = DB::table('chalan_details as db1')
        ->join('product_chalans as db2','db1.chalan_id','db2.id')
        ->join('product_deliveries as db3','db1.delivery_id','db3.id')
        ->select('db3.*','db2.chalanId')
        ->where('db1.chalan_id',$id)
        ->get();

       return view('admin.productDelivery.chalan-details', compact('all_data'));
    }

}
