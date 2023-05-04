@extends('admin.layouts.master') 
@section('main-content')
<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Delivery Man Registration</b></h2>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first() }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col">
            <form action="{{ (@$editData)? route('update-deliveryman',$editData->id) : route('store-deliveryman') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name"><b>Name</b></label>
                        <input type="text" class="form-control" name="deliveryman_name" value="{{ @$editData->deliveryman_name }}" id="name" placeholder="Enter Name Here" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email"><b>Email</b></label>
                        <input type="text" class="form-control" name="deliveryman_email" value="{{ @$editData->deliveryman_email }}"  id="email" placeholder="Enter Email Here" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone"><b>Phone</b></label>
                        <input type="text" class="form-control" name="deliveryman_phone" value="{{ @$editData->deliveryman_phone }}" id="phone" placeholder="Enter Phone Here" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="address"><b>Address</b></label>
                        <input type="text" class="form-control"name="deliveryman_address" value="{{ @$editData->deliveryman_address }}" id="address" placeholder="Enter Address Here" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nid"><b>Nid</b></label>
                        <input type="text" class="form-control" name="deliveryman_nid" value="{{ @$editData->deliveryman_nid }}"  id="nid" placeholder="Enter Nid Here" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="stockqty"><b>Image</b></label>
                        <input type="file" name="{{ @$editData? 'new_image': 'deliveryman_image' }}" value="{{ @$editData->deliveryman_image }}" class="form-control" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date"><b>Date {{ @$editData?'(Y-m-d)':'' }}</b></label>
                        <input type="{{ @$editData? 'text': 'date' }}" name="date" value="{{ @$editData->date }}" class="form-control" id="date" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="preparedby"><b>Prepared By</b></label>
                        <input type="text" name="prepared_by" class="form-control" value="{{ Auth::user()->name }}" id="preparedby" readonly/>
                    </div>

                    <div class="form-group col-md-4" style="margin-top: 33px">
                        <button type="submit" class="btn btn-primary">{{ @$editData?'Update':'Submit' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row mb-3" style="margin: 0px -24px;">
    <div class="container-fluid d-flex">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Delivery Man Information</h6>
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Nid</th>
                                <th>Image</th>
                                <th>Prepared by</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->deliveryman_name }}</td>
                                <td>{{ $data->deliveryman_phone }}</td>
                                <td>{{ $data->deliveryman_address }}</td>
                                <td>{{ $data->deliveryman_nid }}</td>
                                <td><a href="{{ @$data -> deliveryman_image ? url('/'.$data -> deliveryman_image) : url('/image/no-image.png') }}" download=""><img style="width: 50px;height:50px;" src="{{ $data -> deliveryman_image ? url('/'.$data -> deliveryman_image) : url('/image/no-image.png') }}" alt=""></a></td>
                                <td>{{ $data->prepared_by }}</td>
                                <td>{{ date('d/m/Y', strtotime($data->date)) }}</td>
                                <td><a class="btn btn-primary" href="{{ route('edit-deliveryman',$data->id) }}">Edit</a></td>
                            </tr>
                                
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection
