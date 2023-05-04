<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeinProgram extends Model
{
    use HasFactory;
    protected $fillable = ['member','reason','programId','programIncharge','firstSchedule','lastSchedule','programDesc'];
}
