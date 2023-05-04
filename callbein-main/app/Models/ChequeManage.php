<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeManage extends Model
{
    use HasFactory;

    protected $fillable = ['cheque_no','cheque_amount','cheque_image','member_id','bank_name','honoured_by','honoured_date','prepared_by','date'];
}
