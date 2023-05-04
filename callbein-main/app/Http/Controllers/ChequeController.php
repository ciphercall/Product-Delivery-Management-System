<?php

namespace App\Http\Controllers;

use App\Models\ChequeManage;
use Illuminate\Http\Request;

class ChequeController extends Controller
{
    /**
     *  All cheque data View
     */
    public function index()
    {
        $all_data = ChequeManage::orderBy('id', 'DESC') -> get();
        return view('admin.chequeManage.index', compact('all_data'));
    }

    /**
     *  cheque data add
     */
    public function store(Request $request)
    {
       $validateData = $request -> validate([
            'cheque_no'   => 'required',
            'cheque_amount'   => 'required',
            'cheque_image'   => 'required',
            'member_id'   => 'required',
            'bank_name'   => 'required',
            'honoured_by'   => 'required',
            'honoured_date'   => 'required',
       ]);

       $chequeData = new ChequeManage();

       $chequeImage = $request -> file('cheque_image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($chequeImage -> getClientOriginalExtension());
        $img_name = $name_gen.".". $img_ext;
        $up_location = 'image/cheque/';
        $last_img = $up_location.$img_name;
        $chequeImage -> move($up_location,$img_name);

        ChequeManage::create([
            'cheque_no'  => $request -> cheque_no,
            'cheque_amount'  => $request -> cheque_amount,
            'member_id'  => $request -> member_id,
            'bank_name'  => $request -> bank_name,
            'honoured_by'  => $request -> honoured_by,
            'honoured_date'  => date('Y-m-d', strtotime($request -> honoured_date)),
            'prepared_by'  => $request -> prepared_by,
            'date'  => date('Y-m-d'),
            'cheque_image'  => $last_img,
        ]);
        return redirect()-> back() -> with("success",'Data added Successful');
        
    }

    /**
     *  cheque data Edit
     */
    public function edit($id)
    {
        $all_data = ChequeManage::orderBy('id', 'DESC') -> get();

        $editData = ChequeManage::findOrFail($id);
        return view('admin.chequeManage.index', compact('editData','all_data'));
        
    }

    /**
     *  cheque data Update
     */

    public function update(Request $request, $id)
    {
        $validateData = $request -> validate([
            'cheque_no'   => 'required',
            'cheque_amount'   => 'required',
            'member_id'   => 'required',
            'bank_name'   => 'required',
            'honoured_by'   => 'required',
            'honoured_date'   => 'required',
       ]);

       $chequeData = ChequeManage::findOrFail($id);

       $chequeImage = $request -> file('new_image');

       if($chequeImage){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($chequeImage -> getClientOriginalExtension());
        $img_name = $name_gen.".". $img_ext;
        $up_location = 'image/cheque/';
        $last_img = $up_location.$img_name;
        $chequeImage -> move($up_location,$img_name);
        unlink(public_path('/'.$chequeData->cheque_image));

        ChequeManage::find($id) ->update([
            'cheque_no'  => $request -> cheque_no,
            'cheque_amount'  => $request -> cheque_amount,
            'member_id'  => $request -> member_id,
            'bank_name'  => $request -> bank_name,
            'honoured_by'  => $request -> honoured_by,
            'honoured_date'  => date('Y-m-d', strtotime($request -> honoured_date)),
            'prepared_by'  => $request -> prepared_by,
            'date'  => date('Y-m-d'),
            'cheque_image'  => $last_img,
        ]);
        return redirect()-> route('cheque-management')  -> with("success",'Data Updated Successful');
       }
       else{
        ChequeManage::find($id) ->update([
            'cheque_no'  => $request -> cheque_no,
            'cheque_amount'  => $request -> cheque_amount,
            'member_id'  => $request -> member_id,
            'bank_name'  => $request -> bank_name,
            'honoured_by'  => $request -> honoured_by,
            'honoured_date'  => date('Y-m-d', strtotime($request -> honoured_date)),
            'prepared_by'  => $request -> prepared_by,
            'date'  => date('Y-m-d'),
        ]);
        return redirect()-> route('cheque-management')  -> with("success",'Data Updated Successful');
       }
        
    }
}
