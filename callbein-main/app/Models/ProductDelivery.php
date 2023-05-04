<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDelivery extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_id', 'delivery_man', 'areaby', 'date','time','prepared_by'];
}
