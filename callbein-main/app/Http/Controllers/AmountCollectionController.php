<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmountCollectionController extends Controller
{
    // invoice amount collection page show
    public function index()
    {
        return view('admin.amountCollection.amount-collection');
    }
}
