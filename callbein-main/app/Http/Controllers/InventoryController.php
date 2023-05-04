<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{

    /**
     * Inventory Entry page Show
    */
    public function index()
    {
        return view('admin.inventory.inventoryEntry');
    }
}
