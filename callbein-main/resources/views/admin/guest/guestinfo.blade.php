@extends('admin.layouts.master') @section('main-content')
<div class="container-fluid" id="container-wrapper" style="margin: 0px -10px">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0" style="color:#6777ef;"><b>All Guests</b></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">All guests</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Guests Information</h6>
                </div>
                <div class="table-responsive p-3">
                    @if(session()->has('success'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                         {{ session()->get('success') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                    @endif
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Guest Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Guest Image</th>
                                <th>Driver</th>
                                <th>D. Phone</th>
                                <th>Reference Name</th>
                                <th>Program Name</th>
                                <th>Registration Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_guest as $data)
                            <tr>
                                <td>{{ $data->guestId }}</td>
                                <td>{{ $data->guest_name }}</td>
                                <td>{{ $data->guest_number }}</td>
                                <td>{{ $data->guest_address }}</td>
                                <td>
                                    <a href="{{ @$data -> guest_photo ? url('/'.$data -> guest_photo) : url('/image/no-image.png') }}" download="" title="Click to download"><img style="width: 50px;height:50px;" src="{{ $data -> guest_photo ? url('/'.$data -> guest_photo) : url('/image/no-image.png') }}" alt=""></a>
                                </td>
                                <td>{{ $data->guest_driver }}</td>
                                <td>{{ $data->driver_mobile }}</td>
                                <td>{{ $data->member_name }}</td>
                                <td>{{ $data->program_name }}</td>
                                <td>{{ date('d/m/Y', strtotime($data->date)) }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('guest-edit',$data->id) }}">Edit</a>
                                </td>
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
