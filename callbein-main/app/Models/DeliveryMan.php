<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    use HasFactory;
    protected $fillable = ['deliveryman_name','deliveryman_email','deliveryman_phone','deliveryman_address','deliveryman_image','deliveryman_nid','prepared_by','date'];
}
