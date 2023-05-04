<?php

namespace App\Http\Controllers;

use App\Models\ProductDeliveryInformation;
use Illuminate\Http\Request;

class DeliveryInformationController extends Controller
{
    public function index()
    {
        $all_data = ProductDeliveryInformation::orderBy('id','DESC')->get();
        return view('admin.deliveryinfo.deliveryinfo',compact('all_data'));
    }

    /**
     *  Product delivery Information Store
     */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'invoice_id'  => 'required',
            'chalanId'  => 'required',
            'received_amount'  => 'required',
            'received_by'  => 'required',
            'doc_file'  => 'required',
            'return_status'  => 'required',
            'date'  => 'required',
            'prepared_by'  => 'required',
        ]);


        $deliverydoc = $request -> file('doc_file');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($deliverydoc -> getClientOriginalExtension());
        $img_name = $name_gen.".". $img_ext;
        $up_location = 'image/delivery_Documents/';
        $image = $up_location.$img_name;
        $deliverydoc -> move($up_location,$img_name);



        $all_data = new ProductDeliveryInformation();
        $all_data -> invoice_id = $request -> invoice_id;
        $all_data -> chalanId = $request -> chalanId;
        $all_data -> received_amount = $request -> received_amount;
        $all_data -> return_status = $request -> return_status;
        $all_data -> return_reason = $request -> return_reason;
        $all_data -> received_by = $request -> received_by;
        $all_data -> time = $request -> time;
        $all_data -> date = $request -> date;
        $all_data -> prepared_by = $request -> prepared_by;
        $all_data -> doc_file = $image;
        $all_data -> save();
        return redirect() -> back() -> with('success', "Data Inserted Successfully");
    }
    /**
     *  Product delivery Information edit
     */

    public function edit($id)
    {
        $editData = ProductDeliveryInformation::findOrFail($id);
        $all_data = ProductDeliveryInformation::orderBy('id','DESC')->get();
        return view('admin.deliveryinfo.deliveryinfo',compact('all_data','editData'));
    }

    /**
     *  Product delivery Information Update
     */

    public function update(Request $request, $id)
    {
        $validateData = $request -> validate([
            'invoice_id'  => 'required',
            'chalanId'  => 'required',
            'received_amount'  => 'required',
            'received_by'  => 'required',
            'return_status'  => 'required',
            'date'  => 'required',
            'prepared_by'  => 'required',
        ]);

        $all_data = ProductDeliveryInformation::findOrFail($id);

        if($request -> file('doc_file')){
            $deliverydoc = $request -> file('doc_file');

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($deliverydoc -> getClientOriginalExtension());
            $img_name = $name_gen.".". $img_ext;
            $up_location = 'image/delivery_Documents/';
            $image = $up_location.$img_name;
            $deliverydoc -> move($up_location,$img_name);
            unlink(public_path('/'.$all_data->doc_file));


            $all_data -> invoice_id = $request -> invoice_id;
            $all_data -> chalanId = $request -> chalanId;
            $all_data -> received_amount = $request -> received_amount;
            $all_data -> return_status = $request -> return_status;
            $all_data -> return_reason = $request -> return_reason;
            $all_data -> received_by = $request -> received_by;
            $all_data -> time = $request -> time;
            $all_data -> date = $request -> date;
            $all_data -> prepared_by = $request -> prepared_by;
            $all_data -> doc_file = $image;
            $all_data -> save();

        }else{
            $all_data -> invoice_id = $request -> invoice_id;
            $all_data -> chalanId = $request -> chalanId;
            $all_data -> received_amount = $request -> received_amount;
            $all_data -> return_status = $request -> return_status;
            $all_data -> return_reason = $request -> return_reason;
            $all_data -> received_by = $request -> received_by;
            $all_data -> time = $request -> time;
            $all_data -> date = $request -> date;
            $all_data -> prepared_by = $request -> prepared_by;
            $all_data -> save();
        }

        return redirect() -> route('delivery-information') -> with('success', "Data Updated Successfully");
    }
}
