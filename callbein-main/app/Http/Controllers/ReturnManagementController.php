<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ReturnManagement;
use Illuminate\Http\Request;

class ReturnManagementController extends Controller
{
    /**
     *  Return management page show
     */
    public function index()
    {
        $all_data = ReturnManagement::orderBy('id', 'DESC') -> get();
        $all_product = Product::all();
        return view('admin.returnManagement.index', compact('all_product','all_data'));
    }
    /**
     *  return management store
     */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'return_reason'  => 'required',
            'member_id'  => 'required',
            'member_name'  => 'required',
            'requisitionId'  => 'required',
            'invoiceId'  => 'required',
            'product_name'  => 'required',
            'dc_no'  => 'required',
            'date'  => 'required',
            'prepared_by'  => 'required',
        ]);
        $all_data = new ReturnManagement();
        $all_data -> return_reason = $request -> return_reason;
        $all_data -> member_name = $request -> member_name;
        $all_data -> member_id = $request -> member_id;
        $all_data -> requisitionId = $request -> requisitionId;
        $all_data -> invoiceId = $request -> invoiceId;
        $all_data -> product_name = $request -> product_name;
        $all_data -> date = $request -> date;
        $all_data -> dc_no =  $request -> dc_no;
        $all_data -> prepared_by = $request -> prepared_by;

        $all_data -> save();
        return redirect() -> back() -> with('success', "Data Inserted Successfully");
    }

    /**
     *  return management Edit
     */

    public function edit($id)
    {
        $editData = ReturnManagement::findOrFail($id);
        $all_data = ReturnManagement::all();
        $all_product = Product::all();
        return view('admin.returnManagement.index', compact('all_product','all_data','editData'));
    }

    /**
     *  return management Update
     */

    public function update(Request $request, $id)
    {
        $validateData = $request -> validate([
            'return_reason'  => 'required',
            'member_id'  => 'required',
            'member_name'  => 'required',
            'requisitionId'  => 'required',
            'invoiceId'  => 'required',
            'product_name'  => 'required',
            'dc_no'  => 'required',
            'date'  => 'required',
            'prepared_by'  => 'required',
        ]);
        $all_data = ReturnManagement::findOrFail($id);
        $all_data -> return_reason = $request -> return_reason;
        $all_data -> member_name = $request -> member_name;
        $all_data -> member_id = $request -> member_id;
        $all_data -> requisitionId = $request -> requisitionId;
        $all_data -> invoiceId = $request -> invoiceId;
        $all_data -> product_name = $request -> product_name;
        $all_data -> date = $request -> date;
        $all_data -> dc_no =  $request -> dc_no;
        $all_data -> prepared_by = $request -> prepared_by;

        $all_data -> save();
        return redirect() -> route('return.management') -> with('success', "Data Inserted Successfully");
    }
}
