<?php

namespace App\Http\Controllers;

use App\Models\GuestInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GuestController extends Controller
{
    /**
     *  all guest view
    */
    public function index()
    {
        $all_guest = GuestInfo::orderBy('id','DESC')->get();
        return view('admin.guest.guestinfo',compact('all_guest'));
    }

    /**
     *  Add guest page view
    */
    public function addGuest()
    {
        return view('admin.guest.addguest');
    }


    /**
     *  Get Member data for guest reference
    */
    public function getMember(Request $request)
    {
        $get_member = DB::connection('mysql2')->table("memberinfo")->where('MemberID', $request->id) -> first();
        // dd($get_member);
        return view('admin.guest.addguest', compact('get_member'));
    }


    /**
     *  guest store
    */
    public function store(Request $request)
    {

        $validateData = $request -> validate([
            'program_name'   => 'required',
            'guestId'   => 'required',
            'guest_name'   => 'required',
            'member_id'   => 'required',
            'guest_number'   => 'required',
            'member_relation'   => 'required',
       ]);


       $guest_image = $request -> file('guest_photo');

       if ($guest_image ) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($guest_image -> getClientOriginalExtension());
            $img_name = $name_gen.".". $img_ext;
            $up_location = 'image/guestImages/';
            $last_img = $up_location.$img_name;
            $guest_image -> move($up_location,$img_name);

            GuestInfo::create([
                'program_name'  => $request -> program_name,
                'guestId'  => $request -> guestId,
                'guest_name'  => $request -> guest_name,
                'member_id'  => $request -> member_id,
                'member_name'  => $request -> member_name,
                'guest_email'  => $request -> guest_email,
                'guest_number'  => $request -> guest_number,
                'guest_address'  => $request -> guest_address,
                'guest_area'  => $request -> guest_area,
                'guest_designation'  => $request -> guest_designation,
                'member_relation'  => $request -> member_relation,
                'guest_nid'  => $request -> guest_nid,
                'guest_driver'  => $request -> guest_driver,
                'driver_mobile'  => $request -> driver_mobile,
                'guest_remark'  => $request -> guest_remark,
                'prepared_by'  => Auth::user()->name,
                'date'  => date('Y-m-d', strtotime($request -> date)),
                'guest_photo'  => $last_img,
            ]);

        }else{
            GuestInfo::create([
                'program_name'  => $request -> program_name,
                'guestId'  => $request -> guestId,
                'guest_name'  => $request -> guest_name,
                'member_id'  => $request -> member_id,
                'member_name'  => $request -> member_name,
                'guest_email'  => $request -> guest_email,
                'guest_number'  => $request -> guest_number,
                'guest_address'  => $request -> guest_address,
                'guest_area'  => $request -> guest_area,
                'guest_designation'  => $request -> guest_designation,
                'member_relation'  => $request -> member_relation,
                'guest_nid'  => $request -> guest_nid,
                'guest_driver'  => $request -> guest_driver,
                'driver_mobile'  => $request -> driver_mobile,
                'guest_remark'  => $request -> guest_remark,
                'prepared_by'  => Auth::user()->name,
                'date'  => date('Y-m-d', strtotime($request -> date))
            ]);
        }

        return redirect()-> route('guest-info') -> with("success",'Data added Successfully');
    }

    /**
     *  guest edit
    */
    public function edit($id)
    {
        $editData = GuestInfo::findOrFail($id);
        return view('admin.guest.addguest',compact('editData'));
    }


    /**
     *  guest update
    */
    public function update(Request $request,$id)
    {
        $validateData = $request -> validate([
            'program_name'   => 'required',
            'guestId'   => 'required',
            'guest_name'   => 'required',
            'guest_number'   => 'required',
            'member_relation'   => 'required',
       ]);


       $guest_data = GuestInfo::findOrfail($id);
       $guest_image = $request -> file('new_image');

       if ($guest_image ) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($guest_image -> getClientOriginalExtension());
            $img_name = $name_gen.".". $img_ext;
            $up_location = 'image/guestImages/';
            $last_img = $up_location.$img_name;
            $guest_image -> move($up_location,$img_name);

            $path = public_path('/'.$guest_data->guest_photo);

            if (File::exists($path)) {
                @unlink($path);
            }
        

            GuestInfo::find($id) ->update([
                'program_name'  => $request -> program_name,
                'guestId'  => $request -> guestId,
                'guest_name'  => $request -> guest_name,
                'member_id'  => $request -> member_id,
                'member_name'  => $request -> member_name,
                'guest_email'  => $request -> guest_email,
                'guest_number'  => $request -> guest_number,
                'guest_address'  => $request -> guest_address,
                'guest_area'  => $request -> guest_area,
                'guest_designation'  => $request -> guest_designation,
                'member_relation'  => $request -> member_relation,
                'guest_nid'  => $request -> guest_nid,
                'guest_driver'  => $request -> guest_driver,
                'driver_mobile'  => $request -> driver_mobile,
                'guest_remark'  => $request -> guest_remark,
                'prepared_by'  => Auth::user()->name,
                'date'  => date('Y-m-d', strtotime($request -> date)),
                'guest_photo'  => $last_img,
            ]);

            return redirect()-> route('guest-info') -> with("success",'Data Updated Successfully');

        }else{
            GuestInfo::find($id) ->update([
                'program_name'  => $request -> program_name,
                'guestId'  => $request -> guestId,
                'guest_name'  => $request -> guest_name,
                'member_id'  => $request -> member_id,
                'member_name'  => $request -> member_name,
                'guest_email'  => $request -> guest_email,
                'guest_number'  => $request -> guest_number,
                'guest_address'  => $request -> guest_address,
                'guest_area'  => $request -> guest_area,
                'guest_designation'  => $request -> guest_designation,
                'member_relation'  => $request -> member_relation,
                'guest_nid'  => $request -> guest_nid,
                'guest_driver'  => $request -> guest_driver,
                'driver_mobile'  => $request -> driver_mobile,
                'guest_remark'  => $request -> guest_remark,
                'prepared_by'  => Auth::user()->name,
                'date'  => date('Y-m-d', strtotime($request -> date))
            ]);

            return redirect()-> route('guest-info') -> with("success",'Data Updated Successfully');
        }

        
    }
}
