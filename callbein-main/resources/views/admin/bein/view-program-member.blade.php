@extends('admin.layouts.master')
@section('main-content')
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><b>Program Members List</b></h6>
                    <span><strong>Program Id: </strong></span>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Member Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Area</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                            <tr>
                                <td>{{ $data->MemberID }}</td>
                                <td>{{ $data->Name }}</td>
                                <td>{{ $data->MobileNo }}</td>
                                <td>{{ $data->Address }}</td>
                                <td>{{ $data->Area }}</td>
                                <td>
                                    <a href="https://erp.mirpurclubltd.com/Photo/{{ $data->APhoto }}" target="_blank"  download="{{ $data->APhoto }}" ><img style="witdh:50px; height:50px" src="https://erp.mirpurclubltd.com/Photo/{{ $data->APhoto }}" alt=""></a>
                                    
                                </td>
                                <td><a href="{{ route('bein-orderMemberDetail', $data->MemberID) }}" class="btn btn-sm btn-primary">Order</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->

@endsection