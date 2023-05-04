@extends('admin.layouts.master')
@section('main-content')
<style>

select[readonly] {
  pointer-events: none;
  touch-action: none;
}
</style>
<div id="status" style="display: none; height: 33%;width: 85%;background-color: rgba(126, 229, 143, 1);position: fixed;z-index: 1;top: 31%;bottom: 31%;left: 9%;border-radius: 32px 32px 32px 32px;opacity: 82%;"><h1 style="color: white;padding: 7% 0% 8% 31%;">Data is saved successfully!</h1></div>
<div class="row mx-auto mt-3">
    <div class="container-fluid">
            <div class="card col-md-12 ">
                <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Of Members</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover" id="dataTable4">
                        <thead class="thead-light">
                            <tr>
                                <th>
                                    <input type="checkbox" id="checkedAll">
                                </th>
                                <th>Member ID</th>
                                <th>Name</th>
                                <th>Member Type</th>

                                <th>Status</th>

                                <th>RCS</th>
                                <th>Phone</th>
                                <th>Area</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_member as $member)
                            <tr>
                                <td>
                                    <input type="checkbox" class="allChecked" name="member[]" value="{{ $member -> ID  }}" {{ in_array($member->ID, $member_data) ? 'checked' : '' }} />
                                </td>
                                {{--  <input type="hidden" value="{{ $member -> MemberID }}" />  --}}
                                <td>{{ $member -> MemberID }}</td>
                                <td>{{ $member -> Name }}</td>
                                <td>{{ $member -> Catagory }}</td>

                                <td>{{ $member -> Status }}</td>
                                {{--  <td>{{ $member -> AD }}</td>  --}}

                                <td>{{ $member -> RCS }}</td>
                                <td>{{ $member -> MobileNo }}</td>
                                <td>{{ $member -> Area }}</td>
                                {{--
                                <td><span class="badge badge-warning">{{ $member -> MemberID }}</span></td>
                                --}}
                                <td><a href="#" class="btn btn-sm btn-primary">Order</a></td>
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
                        <select class="form-control" name="reason" id="reason" required readonly>
                            <option value="">--Select--</option>
                            <option value="01" {{ @$edit_data->reason == 01? 'Selected':'' }}>Monthly Bazar</option>
                            <option value="02" {{ @$edit_data->reason == 02? 'Selected':'' }}>Weekly Bazar</option>
                            <option value="03" {{ @$edit_data->reason == 03? 'Selected':'' }}>Seasonal Food</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="programIncharge"><b>Program Incharge</b></label>
                        <select class="form-control" name="programIncharge" id="programIncharge" required>
                            <option value="">--Select--</option>
                            @foreach ($all_employee as $employee)
                                <option value="{{ $employee->Name }}" {{ @$edit_data->programIncharge == $employee->Name?'Selected':'' }}>{{ $employee->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="programSchedule"><b>Program Schedule</b></label>
                        <div class="input-group">
                            <input name="firstSchedule" type="text" value="{{ @$edit_data->firstSchedule }}" class="form-control" style="width: 45%" required>
                            <span style="padding:10px"><b>to</b></span>
                            <input name="lastSchedule" type="text" class="form-control" value="{{ @$edit_data->lastSchedule }}" style="width: 45%" required>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlTextarea1"><b>Program Description</b></label>
                        <textarea class="form-control" name="programDesc" id="exampleFormControlTextarea1" rows="3" required>{{ @$edit_data->programDesc }}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <button id="update" class="btn btn-success" type="button" style="margin: 10px 0px">Update</button>
                    </div>
                </div>
            </div>
    </div>
</div>


@endsection

@section('main-script')
<script>

$(function(){
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

$(function(){
    var memIdArr = [];
    var selectedMem;
    var extMem = false;
    $(".allChecked").on('change', function(){
        selectedMem = $(this).val();
        if($(this).is(':checked')){
        for(var i=0;i<memIdArr.length; i++){
            if(memIdArr[i] == selectedMem){
                extMem = true;
            }
        }
        if(!extMem){
            memIdArr.push($(this).val());
        }else{
            extMem = false;
        }
        }else{
            for(var i=0;i<memIdArr.length; i++){
            if(memIdArr[i] == selectedMem){
                memIdArr.splice(i,1);
            }
        }
        }
        console.log('this is my member array: '+memIdArr);

    });

    $(".allChecked[checked]").each(function(){
        memIdArr.push($(this).val());
    });

    $('#dataTable4').DataTable({
                "pagingType" : 'simple',
                "drawCallback": function( settings ) {
        // alert( 'DataTables has redrawn the table' );
        $('.paginate_button.next:not(.disabled)', this.api().table().container())
             .on('click', function(){
                // alert('fff');
                 // localStorage.setItem('memberDOM', memIdArr);
                 // localStorage.removeItem('memberDOM');
        // console.log('this is my populated DOM: '+localStorage.getItem('memberDOM'));
             });
    }
            });

    // data table ajax
    var pId = "<?php echo $edit_data->programId ?>";
    var url = '{{ route('bein-program-update', ":id") }}';
    url = url.replace(':id',pId);
    $('#update').on('click', function (){
        $.ajax({
            method: "POST",
            url: url,
            // contentType: "application/json",
            dataType: "json",
            data: {
                dataTable4_length: 10,
                member: memIdArr,
                reason: '01',
                programIncharge: 'Morshed Ahmed',
                firstSchedule: '2022-02-15',
                lastSchedule: '2022-02-18',
                programDesc: 'hjfgfhjf'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function (){
                console.log("Waiting...");
            },
            error: function() {
                console.log("Server-sided error!");
            },
            success: function (data) {
                $("#status").fadeIn().delay(2000).fadeOut('slow');
                console.log(data);
            }
            // sending checkout list to server to process checkout
            // console.log(total);
        });
    });

    // data table ajax
});

</script>
@endsection


