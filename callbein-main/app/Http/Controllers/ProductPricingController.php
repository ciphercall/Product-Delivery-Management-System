<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductPricingController extends Controller
{
    // product pricing page show
    public function index()
    {
       return view('admin.productPricing.index');
    }
}
