<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductChalan extends Model
{
    use HasFactory;
    protected $fillable = ['delivery_id','chalan_id','date','time','prepared_by'];
}
