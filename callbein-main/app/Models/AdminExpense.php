<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminExpense extends Model
{
    use HasFactory;
    protected $fillable = ['company_name','account_devision','account_group','account_head','amount','date','time','expense_desc','prepared_by'];
}
