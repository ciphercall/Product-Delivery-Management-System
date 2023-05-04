<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProductPrice extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','buying_price','selling_price','price_date','prepared_by','unit'];
}
