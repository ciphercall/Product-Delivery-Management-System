<?php

namespace App\Http\Controllers;

use App\Models\AdminExpense;
use Illuminate\Http\Request;

class AdminExpenseController extends Controller
{
    // show admin expense interface
    public function index()
    {
        $all_data = AdminExpense::orderBy('id','DESC') -> get();
        return view('admin.adminExpense.index', compact('all_data'));
    }

    /**
     *  store admin expense
     */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'company_name'  => 'required',
            'account_devision'  => 'required',
            'account_group'  => 'required',
            'account_head'  => 'required',
            'amount'  => 'required',
            'date'  => 'required',
            'time'  => 'required',
            'expense_desc'  => 'required',
            'prepared_by'  => 'required',
        ]);
        $all_data = new AdminExpense();
        $all_data -> expenseId = $request -> company_name . $request -> account_devision . $request -> account_group. date('dmY',strtotime($request->date)). $request -> account_head;
        $all_data -> company_name = $request -> company_name;
        $all_data -> account_devision = $request -> account_devision;
        $all_data -> account_group = $request -> account_group;
        $all_data -> account_head = $request -> account_head;
        $all_data -> amount = $request -> amount;
        $all_data -> date = $request -> date;
        $all_data -> time =  $request -> time;
        $all_data -> expense_desc = $request -> expense_desc;
        $all_data -> prepared_by = $request -> prepared_by;

        $all_data -> save();
        return redirect() -> back() -> with('success', "Data Inserted Successfully");
    }
    /**
     *  admin expense edit
     */
    public function edit($id)
    {
        $all_data = AdminExpense::all();
        $editData = AdminExpense::findOrFail($id);
        return view('admin.adminExpense.index', compact('all_data','editData'));
    }
    /**
     *  admin expense update
     */
    public function update(Request $request, $id)
    {
        $validateData = $request -> validate([
            'company_name'  => 'required',
            'account_devision'  => 'required',
            'account_group'  => 'required',
            'account_head'  => 'required',
            'amount'  => 'required',
            'date'  => 'required',
            'time'  => 'required',
            'expense_desc'  => 'required',
            'prepared_by'  => 'required',
        ]);
        $all_data = AdminExpense::findOrFail($id);
        $all_data -> expenseId = $request -> company_name . $request -> account_devision . $request -> account_group. date('dmY',strtotime($request->date)). $request -> account_head;
        $all_data -> company_name = $request -> company_name;
        $all_data -> account_devision = $request -> account_devision;
        $all_data -> account_group = $request -> account_group;
        $all_data -> account_head = $request -> account_head;
        $all_data -> amount = $request -> amount;
        $all_data -> date = $request -> date;
        $all_data -> time =  $request -> time;
        $all_data -> expense_desc = $request -> expense_desc;
        $all_data -> prepared_by = $request -> prepared_by;

        $all_data -> save();
        return redirect() -> route('admin.expense') -> with('success', "Data Updated Successfully");
    }
}
