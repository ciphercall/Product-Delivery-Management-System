<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChalanDetail extends Model
{
    use HasFactory;
    protected $fillable = ['chalan_id','delivery_id'];
}
