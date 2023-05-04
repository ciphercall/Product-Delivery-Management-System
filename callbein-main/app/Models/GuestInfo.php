<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestInfo extends Model
{
    use HasFactory;
    protected $fillable = ['program_name','guestId','guest_name','member_id','member_name','guest_email','guest_number','guest_address','guest_area','guest_designation','member_relation','guest_nid','guest_driver','driver_mobile','guest_remark','guest_photo','prepared_by','date'];
}
