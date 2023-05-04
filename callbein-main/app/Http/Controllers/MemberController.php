<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * get member data
    */
    public function getRecord()
    {
        $get_member = DB::connection('mysql2')->table("memberinfo")->get();
        dd($get_member);
    }

}
