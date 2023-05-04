<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoneyDisburseController extends Controller
{
    /**
     * Money Disburse Page Show
    */
    public function index()
    {
        return view('admin.moneyDisburse.moneyDisburse');
    }
}
