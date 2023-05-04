@extends('admin.layouts.master')
@section('main-content')

  <div class="row">
      <div class="container-fluid">
          <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $errors->first() }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('get-member') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="memberId"><b>Member Id</b></label>
                                    <input type="number" class="form-control" id="memberId" name="id" >
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                </div>
                            </form>
                                
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="reason"><b>Member Name:</b></label>
                                <span style="font-weight: 600; font-size:20px; padding-left:10px">{{ @$get_member->Name }}</span>
                            </div>
                            <div class="form-group">
                                <label for="reason"><b>Member Photo:</b></label>
                                <img  src="{{ @$get_member->APhoto ? url('https://erp.mirpurclubltd.com/Photo/'.$get_member->APhoto) : url('/image/no-image.png') }}" alt="" style="width: 147px;height:127px; padding-left:10px">
                            </div>
                        </div>
                    </div>
                </div>
          </div>
      </div>
  </div>

<div class="container-fluid">
    <div class="row justify-content-center mb-4">
        <div class="card col-lg-12">
            <div class="card-body">
                <h2 class="text-center" style="padding: 30px 0px; text-transform:uppercase;color:#6777ef;"><b>Guest Registration</b></h2>

                <div class="form-validation">
                    <form class="form-valide" action="{{ (@$editData)? route('guest-update',$editData->id) : route('guest-store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                    
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" ><b>Program</b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <select style="border: .01px solid #969393;" class="form-control"  name="program_name" required>
                                    <option value="">--Select--</option>
                                    <option value="Picnic" {{ @$editData->program_name == 'Picnic'?'selected':'' }}>Picnic</option>
                                    <option value="Formation Meeting" {{ @$editData->program_name == 'Formation Meeting'?'selected':'' }}>Formation Meeting</option>
                                    <option value="Others" {{ @$editData->program_name == 'Others'?'selected':'' }}>Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Guest ID </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  placeholder="Guest ID" value="{{ @$editData->guestId }}" name="guestId" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" for="guest_name"><b>Guest Name </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" id="guest_name" name="guest_name" value="{{ @$editData->guest_name }}" placeholder="Guest Name..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" for="member_id"><b>Refference Id </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" value="{{ @$editData ? @$editData->member_id : @$get_member->MemberID }}" name="member_id" placeholder="Member Id" readonly>
                                <input style="border: .01px solid #969393;" type="hidden" class="form-control" value="{{ @$editData ? @$editData->member_name : @$get_member->Name }}" name="member_name" placeholder="Member Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" for="guest_email"><b>Email </b>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" id="guest_email" name="guest_email" value="{{ @$editData->guest_email }}" placeholder="Email Address..">
                            </div>
                        </div>

                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Mobile Number </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" name="guest_number" value="{{ @$editData->guest_number }}" placeholder="01700-999999" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Guest Address </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  placeholder="Guest Address" value="{{ @$editData->guest_address }}" name="guest_address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Area</b> <span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="Area" name="guest_area" value="{{ @$editData->guest_area }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Guest Designation</b>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="Guest Designation" name="guest_designation" value="{{ @$editData->guest_designation }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" ><b>Member Relation</b><span class="text-danger"></span>
                            </h6>
                            <div class="col-lg-6">
                                <select style="border: .01px solid #969393;" class="form-control"  name="member_relation">
                                    <option value="">--Select--</option>
                                    <option value="Wife" {{ @$editData->member_relation == 'Wife'?'selected':'' }}>Wife</option>
                                    <option value="Son" {{ @$editData->member_relation == 'Son'?'selected':'' }}>Son</option>
                                    <option value="Daughter" {{ @$editData->member_relation == 'Daughter'?'selected':'' }}>Daughter</option>
                                    <option value="Father" {{ @$editData->member_relation == 'Father'?'selected':'' }}>Father</option>
                                    <option value="Mother" {{ @$editData->member_relation == 'Mother'?'selected':'' }}>Mother</option>
                                    <option value="Siblings" {{ @$editData->member_relation == 'Siblings'?'selected':'' }}>Siblings</option>
                                    <option value="Friends" {{ @$editData->member_relation == 'Friends'?'selected':'' }}>Friends</option>
                                    <option value="Guest" {{ @$editData->member_relation == 'Guest'?'selected':'' }}>Guest</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label" for="val-digits"><b>NID </b>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control" id="val-digits" name="guest_nid" value="{{ @$editData->guest_nid }}" placeholder="NID">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Driver Name </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  placeholder="Driver name" name="guest_driver" value="{{ @$editData->guest_driver }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Driver Mobile </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="text" class="form-control"  placeholder="Driver Mobile" name="driver_mobile" value="{{ @$editData->driver_mobile }}" required>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Remarks </b><span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <textarea style="border: .01px solid #969393;" class="form-control"  name="guest_remark" rows="5" placeholder="Enter Member Remarks" required>{{ @$editData->guest_remark }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"><b>Date</b> <span class="text-danger">*</span>
                            </h6>
                            <div class="col-lg-6">
                                <input style="border: .01px solid #969393;" type="date" class="form-control"  name="date" value="{{ @$editData->date }}" required>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <h6 class="col-lg-4 col-form-label"> Attatchment (Photo)<span class="text-danger"></span>
                            </h6>
                            <div class="col-lg-6">
                                <input type="file" name="{{ @$editData? 'new_image': 'guest_photo' }}" class="form-control-file" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">{{ @$editData?'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection