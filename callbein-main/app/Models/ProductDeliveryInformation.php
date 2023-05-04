<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDeliveryInformation extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_id','chalanId','received_amount','received_by','doc_file','return_status','return_reason','date','prepared_by'];
}
