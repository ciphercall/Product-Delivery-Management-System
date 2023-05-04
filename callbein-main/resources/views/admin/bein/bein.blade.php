@extends('admin.layouts.master')
@section('main-content')
    <div class="row mx-auto">
        <div class="container-fluid">
            <h2 class="text-center" style="text-transform:uppercase; color:#6777ef"><b>Bein Management</b></h2>
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first() }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            <div class="card col-md-12 ">
                <form action="{{ route('bein-search') }}" method="POST">
                    @csrf
                    <div class="form-row mt-3 p-4">
                        <div class="form-group col-md-6">
                            <label for="memberCategory"><b>Member Category</b></label>
                            <select name="memberCategory" class="form-control" id="memberCategory">
                                <option value="">--Select--</option>
                                <option value="Gold_Member">Gold</option>
                                <option value="Silver_Member">Silver</option>
                                <option value="Bronze_Member">Bronze</option>
                                <option value="Platinum_Member">Platinum</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="memberStatus"><b>Member Status</b></label>
                            <select name="memberType" class="form-control" id="memberStatus">
                                <option value="">--Select--</option>
                                <option value="1">Active</option>
                                <option value="">Halt</option>
                                <option value="">Pause</option>
                                <option value="0">Not Active</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="memberComplain"><b>Member Complain</b></label>
                            <select class="form-control" id="memberComplain">
                                <option>--Select--</option>
                                <option>porduct was not good</option>
                                <option>your delivery man was very bad</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="guestDateRange"><b>Guest Date Range</b></label>
                            <div class="input-group">
                                <input type="date" class="form-control" style="width: 45%" >
                                <span style="width: 5%; margin-top: 8px; margin-left:10px;"><b>to</b></span>
                                <input type="date" class="form-control" style="width: 45%">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="searchByItem"><b>Search by Item</b></label>
                            <select class="form-control" id="searchByItem">
                                <option>--Select--</option>
                                <option>Beef</option>
                                <option>Mutton</option>
                                <option>Chal</option>
                                <option>Oil</option>
                                <option>Dal</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastCallDateRange"><b>Last Call Date Range</b></label>
                            <div class="input-group">
                                <input type="date" class="form-control" style="width: 45%" >
                                <span style="width: 5%; margin-top: 8px; margin-left:10px;"><b>to</b></span>
                                <input type="date" class="form-control" style="width: 45%">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="consumerOrNonconsumber"><b>Consumer/Non Consumer</b></label>
                            <select class="form-control" id="consumerOrNonconsumber">
                                <option>--Select--</option>
                                <option>Consumer</option>
                                <option>Non consumber</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"><b>Consumer Date Range</b></label>
                            <div class="input-group">
                                <input type="date" class="form-control" style="width: 45%" >
                                <span style="width: 5%; margin-top: 8px; margin-left:10px;"><b>to</b></span>
                                <input type="date" class="form-control" style="width: 45%">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="memberDues"><b>Member Dues(Highest Limit)</b></label>
                            <select class="form-control" id="memberDues">
                                <option>--Select--</option>
                                <option>0 to 1000</option>
                                <option>1000 to 3000</option>
                                <option>3000 to 5000</option>
                                <option>5000 to 7000</option>
                                <option>7000 to 10000</option>
                                <option>10000 to 15000</option>
                                <option>15000 to 20000</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="memberArea"><b>Member Area</b></label>
                            <select name="memberArea" class="form-control" id="memberArea">
                                <option value="">--Select--</option>
                                <option value="Dhanmondi">Dhanmondi</option>
                                <option value="Mirpur">Mirpur</option>
                                <option value="Rampura">Rampura</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="memberDesignation"><b>Member Designation</b></label>
                            <select class="form-control" id="memberDesignation">
                                <option>--Select--</option>
                                <option>CEO</option>
                                <option>MD</option>
                                <option>Government Officer</option>
                                <option>GM</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="memberInstraction"><b>Member Instruction</b></label>
                            <select class="form-control" id="memberInstraction">
                                <option>--Select--</option>
                                <option>call after 5PM</option>
                                <option>call after Lunch</option>
                                <option>call after 10AM</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="searchByAmount"><b>Search By Amount</b></label>
                            <select class="form-control" id="searchByAmount">
                                <option>--Select--</option>
                                <option>0 to 1000</option>
                                <option>1000 to 3000</option>
                                <option>3000 to 5000</option>
                                <option>5000 to 7000</option>
                                <option>7000 to 10000</option>
                                <option>10000 to 15000</option>
                                <option>15000 to 20000</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="amountDateRange"><b>Search By Amount Date Range</b></label>
                            <div class="input-group">
                                <input type="date" class="form-control" style="width: 45%" >
                                <span style="width: 5%; margin-top: 8px; margin-left:10px;"><b>to</b></span>
                                <input type="date" class="form-control" style="width: 45%">
                            </div>
                        </div>
                       
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a class="btn btn-success" href="{{ route('bein') }}">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<div class="row mx-auto mt-3">
    <div class="container-fluid">
        <form action="{{ route('bein-program') }}" method="POST">
            @csrf
            <div class="card col-md-12 ">
                <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Of Members</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th><input type="checkbox" id="checkedAll"></th>
                                <th>Member ID</th>
                                <th>Name</th>
                                <th>Member Type</th>

                                <th>Status</th>
                                {{--  <th>AD</th>  --}}

                                <th>RCS</th>
                                <th>Phone</th>
                                <th>Area</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_member as $member)
                            <tr>
                                <td><input type="checkbox" class="allChecked" name="member[]" value="{{ $member -> ID  }}" /></td>
                                {{--  <input type="hidden" value="{{ $member -> MemberID }}" />  --}}
                                <td>{{ $member -> MemberID }}</td>
                                <td>{{ $member -> Name }}</td>
                                <td>{{ $member -> Catagory }}</td>

                                <td>{{ $member -> Status }}</td>

                                <td>{{ $member -> RCS }}</td>
                                <td>{{ $member -> MobileNo }}</td>
                                <td>{{ $member -> Area }}</td>
                                <td><a href="{{ route('bein-orderMemberDetail', $member->MemberID) }}" class="btn btn-sm btn-primary">Order</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card col-md-12 mt-4 mb-4">
                <div class="form-row mt-4">
                    <div class="form-group col-md-6">
                        <label for="reason"><b>Reason</b></label>
                        <select class="form-control" name="reason" id="reason" required>
                            <option value="">--Select--</option>
                            <option value="01">Monthly Bazar</option>
                            <option value="02">Weekly Bazar</option>
                            <option value="03">Seasonal Food</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="programIncharge"><b>Program Incharge</b></label>
                        <select class="form-control" name="programIncharge" id="programIncharge" required>
                            <option value="">--Select--</option>
                            @foreach ($all_employee as $employee)
                                <option value="{{ $employee -> 	Name }}">{{ $employee -> Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="programSchedule"><b>Program Schedule</b></label>
                        <div class="input-group">
                            <input name="firstSchedule" type="date" class="form-control" style="width: 45%" required>
                            <span style="padding:10px"><b>to</b></span>
                            <input name="lastSchedule" type="date" class="form-control" style="width: 45%" required>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlTextarea1"><b>Program Description</b></label>
                        <textarea class="form-control" name="programDesc" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-primary" type="submit" style="margin: 10px 0px">Submit</button>
                    </div>
                </div>  
            </div>
        </form>
    </div>
</div>


@endsection

@section('main-script')
<script>
    $(function(e){
        $("#checkedAll").click(function(){
        $(".allChecked").prop('checked', $(this).prop('checked'));
    });
    $('.allChecked').change(function(){
        var total = $('.allChecked').length;
        var number = $('.allChecked:checked').length;
        if(total == number){
            $('#checkedAll').prop('checked', true);
        }else{
            $('#checkedAll').prop('checked', false);
        }
    });
});
</script>
@endsection


