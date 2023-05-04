<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     *  company page show
     */
    public function index()
    {
        $data['companies']= Company::orderBy('id', 'DESC') -> get();
        return view('admin.company.company',$data);
    }
    /**
     *  store company
     */
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'name'  => 'required',
            'description'  => 'required',
            'date'  => 'required',
        ]);

        $company = new Company();
        $company-> company_name = $request -> name;
        $company-> company_desc = $request -> description;
        $company-> company_date = date('d/m/Y', strtotime($request -> date));
        $company-> prepared_by = Auth::user() -> name;
        $company-> save();

        return redirect() -> back() -> with('success','Data Inserted Successful');
    }

    public function edit($id)
    {
        $data['editData']    = Company:: findOrFail($id);
        $data['companies']= Company::orderBy('id', 'DESC') -> get();
        // dd($editData);
        return view('admin.company.company', $data);
    }

    /**
     *  Update company data
     */
    public function update(Request $request,$id)
    {
        $validateData = $request -> validate([
            'name'  => 'required',
            'description'  => 'required',
            'date'  => 'required',
        ]);

        $company = Company::findOrFail($id);
        $company-> company_name = $request -> name;
        $company-> company_desc = $request -> description;
        // $company-> company_date = date('d/m/Y', strtotime($request -> date));
        $company-> save();

        return redirect() -> route('add-company') -> with('success', 'Data updated Successful');
    }

    
}
