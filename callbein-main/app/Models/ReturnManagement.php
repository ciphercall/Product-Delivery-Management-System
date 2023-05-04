<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnManagement extends Model
{
    use HasFactory;
    protected $fillable = ['return_reason','member_id','member_name','requisitionId','invoiceId','product_name','dc_no','date','prepared_by'];
}
