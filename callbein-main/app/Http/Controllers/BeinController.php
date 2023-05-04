<?php

namespace App\Http\Controllers;

use App\Models\BeinProgram;
use App\Models\Member;
use App\Models\ProgramDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BeinController extends Controller
{
    /**
    *   bein program form show
    */
    public function index()
    {
        $all_member = DB::connection('mysql2')->table("memberinfo")->orderBy('Id', 'DESC') -> get();
        $all_employee = DB::connection('mysql2')->table("employeeinfo")->get();
        return view('admin.bein.bein', compact('all_member', 'all_employee'));
    }

    /**
     *  bein search
     */
    public function search(Request $request)
    {

        $member = DB::connection('mysql2')->table("memberinfo");

        if($request->memberCategory != null AND $request->memberType != null AND $request->memberArea != null ){
            $all_member =  $member ->where('Catagory', $request -> memberCategory)
                            ->where('Status', $request -> memberType)
                            ->where('Area', $request -> memberArea)
                            ->get();
            $all_employee = DB::connection('mysql2')->table("employeeinfo")->get();
            return view('admin.bein.bein', compact('all_member', 'all_employee'));

        }
        elseif($request->memberCategory != null AND $request->memberType != null){
            $all_member =  $member ->where('Catagory', $request -> memberCategory)
                            ->where('Status', $request -> memberType)
                            ->get();
            $all_employee = DB::connection('mysql2')->table("employeeinfo")->get();
            return view('admin.bein.bein', compact('all_member', 'all_employee'));
        }

        elseif($request->memberCategory != null AND $request->memberArea != null){
            $all_member =  $member ->where('Catagory', $request -> memberCategory)
                            ->where('Area', $request -> memberArea)
                            ->get();
            $all_employee = DB::connection('mysql2')->table("employeeinfo")->get();
            return view('admin.bein.bein', compact('all_member', 'all_employee'));

        }
        elseif($request->memberType != null AND $request->memberArea != null){
            $all_member =  $member ->where('Status', $request -> memberType)
                            ->where('Area', $request -> memberArea)
                            ->get();
             $all_employee = DB::connection('mysql2')->table("employeeinfo")->get();
             return view('admin.bein.bein', compact('all_member', 'all_employee'));

        }
        elseif($request->memberCategory != null OR $request->memberType != null OR $request->memberArea != null){
            $all_member =  $member ->where('Catagory', $request -> memberCategory)
                            ->orWhere('Status', $request -> memberType)
                            ->orWhere('Area', $request -> memberArea)
                            ->get();
            $all_employee = DB::connection('mysql2')->table("employeeinfo")->get();
            return view('admin.bein.bein', compact('all_member', 'all_employee'));
        }

        else{
            $all_member = DB::connection('mysql2')->table("memberinfo")->get();
            $all_employee = DB::connection('mysql2')->table("employeeinfo")->get();
            return view('admin.bein.bein', compact('all_member', 'all_employee'));
        }

    }

    /**
     *  Bein Program Set
     */
    public function beinProgram(Request $request)
    {
        $messages = [
            'member.required' => 'Please Select Member Checkbox',
        ];

        $validateData = $request -> validate([
            'member' => 'required',
            'reason' => 'required',
            'programIncharge' => 'required',
            'firstSchedule' => 'required',
            'lastSchedule' => 'required',
            'programDesc' => 'required',
        ],$messages);

        $member = implode(',',$request->member);
        $bein_program = new BeinProgram();
            $bein_program -> member = $member;
            $bein_program -> reason = $request -> reason;
            $bein_program -> programId = '002' . date('dmY') . $request -> reason;
            $bein_program -> programIncharge = $request -> programIncharge;
            $bein_program -> firstSchedule = $request -> firstSchedule;
            $bein_program -> lastSchedule = $request -> lastSchedule;
            $bein_program -> programDesc = $request -> programDesc;
            $bein_program -> prepared_by = Auth::user() -> name;
            $bein_program -> save();


         $data = count($request -> member);
         $member = $request -> member;
        for($i=0; $i< $data ; $i++){
            $bein_program_detail = new ProgramDetail();
            $bein_program_detail -> member = $member[$i];
            $bein_program_detail -> programId = '002' . date('dmY') . $request -> reason;
            $bein_program_detail -> save();
        }


        return redirect() -> route('bein.all-program') -> with('success', 'Data Inserted Successfully');
    }

    /**
     *  Bein all program show
     */
    public function allBeinProgram()
    {
        // $all_data = BeinProgram::select('programId','programIncharge','reason','firstSchedule','lastSchedule','programDesc')->groupBy('programId','programIncharge','reason','firstSchedule','lastSchedule','programDesc')->get();
        $all_data = BeinProgram::orderBy('id', 'DESC') -> get();
        return view('admin.bein.all-program', compact('all_data'));
    }
    /**
    *   Program Members View
    */
    public function view($id)
    {

        $all_data = DB::table('program_details as db1')
                ->join('erp.memberinfo as db2','db1.member','db2.ID')
                ->select('db2.*','db1.programId')
                ->where('db1.programId',$id)
                ->get();
        return view('admin.bein.view-program-member', compact('all_data'));
    }
    /**
     *  bein program edit
     */
    public function edit($id)
    {
        $all_member = DB::connection('mysql2')->table("memberinfo")->get();
        $all_employee = DB::connection('mysql2')->table("employeeinfo")->get();
        $edit_data = BeinProgram::find($id);
        // dd($edit_data);
        return view('admin.bein.bein-program-edit',['edit_data'=>$edit_data, 'member_data'=>explode(',', $edit_data->member)], compact('all_member', 'all_employee'));
    }


    /**
    *   Program Update
    */
    public function update(Request $request,$id)
    {
//        dd($request->all());

        $messages = [
            'member.required' => 'Please Select Member Checkbox',
        ];

        $validateData = $request -> validate([
            'member' => 'required',
            'programIncharge' => 'required',
            'firstSchedule' => 'required',
            'lastSchedule' => 'required',
            'programDesc' => 'required',
        ],$messages);


        $members = implode(',',$request->member);
        BeinProgram::where('programId',$id)->update([
            'member' => $members,
            'programIncharge' => $request -> programIncharge,
            'firstSchedule' => $request -> firstSchedule,
            'lastSchedule' => $request -> lastSchedule,
            'programDesc' => $request -> programDesc,
        ]);

        DB::table('program_details')->where('programId',$id)->delete();

         $data = count($request -> member);
         $member = $request -> member;
        for($i=0; $i< $data ; $i++){
            $bein_program_detail = new ProgramDetail();
            $bein_program_detail -> member = $member[$i];
            $bein_program_detail -> programId = '002' . date('dmY') . $request -> reason;
            $bein_program_detail -> save();
        }


//        return redirect() -> route('bein.all-program') -> with('success', 'Data Updated Successfully');
        return response()->json(['message' => 'success', 'data' => 'Data updated successfully!']);
    }


}
