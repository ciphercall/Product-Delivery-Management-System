<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DeliveryManController extends Controller
{
    /**
     *  All Delivery Man Show
    */
    public function index()
    {
        $all_data = DeliveryMan::orderBy('id', 'DESC') -> get();
        return view('admin.deliveryman.index', compact('all_data'));
    }

    /**
     *  Delivery Man store
    */

    public function store(Request $request)
    {
       $validateData = $request -> validate([
            'deliveryman_name'   => 'required',
            'deliveryman_email'   => 'required',
            'deliveryman_phone'   => 'required',
            'deliveryman_address'   => 'required',
            'deliveryman_nid'   => 'required|unique:delivery_men,deliveryman_nid'
            // 'deliveryman_image'   => 'required',
       ]);

       $deliverymanImage = $request -> file('deliveryman_image');

       if ($deliverymanImage ) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($deliverymanImage -> getClientOriginalExtension());
            $img_name = $name_gen.".". $img_ext;
            $up_location = 'image/deliveryman/';
            $last_img = $up_location.$img_name;
            $deliverymanImage -> move($up_location,$img_name);

            DeliveryMan::create([
                'deliveryman_name'  => $request -> deliveryman_name,
                'deliveryman_email'  => $request -> deliveryman_email,
                'deliveryman_phone'  => $request -> deliveryman_phone,
                'deliveryman_address'  => $request -> deliveryman_address,
                'deliveryman_nid'  => $request -> deliveryman_nid,
                'prepared_by'  => $request -> prepared_by,
                'date'  => date('Y-m-d', strtotime($request -> date)),
                'deliveryman_image'  => $last_img,
            ]);
       }else {
            DeliveryMan::create([
                'deliveryman_name'  => $request -> deliveryman_name,
                'deliveryman_email'  => $request -> deliveryman_email,
                'deliveryman_phone'  => $request -> deliveryman_phone,
                'deliveryman_address'  => $request -> deliveryman_address,
                'deliveryman_nid'  => $request -> deliveryman_nid,
                'prepared_by'  => $request -> prepared_by,
                'date'  => date('Y-m-d', strtotime($request -> date))
            ]);
       }
        return redirect()-> back() -> with("success",'Data added Successfully');
        
    }

    /**
     *  Delivery Man edit
    */
    public function edit($id)
    {
        $all_data = DeliveryMan::orderBy('id', 'DESC') -> get();

        $editData = DeliveryMan::findOrFail($id);
        return view('admin.deliveryman.index', compact('editData','all_data'));
        
    }

    /**
     *  Delivery Man update
    */

    public function update(Request $request, $id)
    {
        $validateData = $request -> validate([
            'deliveryman_name'   => 'required',
            'deliveryman_email'   => 'required',
            'deliveryman_phone'   => 'required',
            'deliveryman_address'   => 'required',
       ]);

       $deliverymanData = DeliveryMan::findOrFail($id);

       $deliverymanImage = $request -> file('new_image');

       if($deliverymanImage){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($deliverymanImage -> getClientOriginalExtension());
        $img_name = $name_gen.".". $img_ext;
        $up_location = 'image/deliveryman/';
        $last_img = $up_location.$img_name;
        $deliverymanImage -> move($up_location,$img_name);

        $path = public_path('/'.$deliverymanData->deliveryman_image);

        if (File::exists($path)) {
            //File::delete($image_path);
            @unlink($path);
        }
        

        DeliveryMan::find($id) ->update([
            'deliveryman_name'  => $request -> deliveryman_name,
            'deliveryman_email'  => $request -> deliveryman_email,
            'deliveryman_phone'  => $request -> deliveryman_phone,
            'deliveryman_address'  => $request -> deliveryman_address,
            'deliveryman_nid'  => $request -> deliveryman_nid,
            'prepared_by'  => $request -> prepared_by,
            'date'  => date('Y-m-d', strtotime($request -> date)),
            'deliveryman_image'  => $last_img,
        ]);
        return redirect()-> route('deliveryman-registration') -> with("success",'Data Updated Successfully');
       }
       else{
        DeliveryMan::find($id) ->update([
            'deliveryman_name'  => $request -> deliveryman_name,
            'deliveryman_email'  => $request -> deliveryman_email,
            'deliveryman_phone'  => $request -> deliveryman_phone,
            'deliveryman_address'  => $request -> deliveryman_address,
            'deliveryman_nid'  => $request -> deliveryman_nid,
            'prepared_by'  => $request -> prepared_by,
            'date'  => date('Y-m-d', strtotime($request -> date)),
        ]);
        return redirect()->route('deliveryman-registration') -> with("success",'Data Updated Successfully');
       }
        
    }
}
