<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcurementController extends Controller
{

    /**
     *  Bein procurement show
    */
    public function beinProcurement()
    {
        return view('admin.bein.procurement.index');
    }
}
