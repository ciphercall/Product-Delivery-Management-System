@extends('admin.layouts.master')
@section('main-content')
<div class="row">
    <div class="container-fluid">
       <div class="card h-100">
           <div class="card-header">
            <h2 class="text-center mt-3 text-uppercase" style="color: #6777ef"><b>Product Return</b></h2>
             {{--  error message  --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
           </div>
            <div class="card-body">
                <form action="{{ (@$editData)? route('return-management-update',$editData->id) : route('return-management-store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reason"><b>Reason</b></label>
                            <select class="form-control" name="return_reason" id="reason">
                                <option value="">-- select --</option>
                                <option value="Rotten fish" {{ @$editData->return_reason == 'Rotten fish'? 'Selected':'' }}>Rotten fish</option>
                                <option value="product Not Good" {{ @$editData->return_reason == 'product Not Good'? 'Selected':'' }}>product Not Good</option>
                                <option value="Given Another Product" {{ @$editData->return_reason == 'Given Another Product'? 'Selected':'' }}>Given Another Product</option>
                                <option value="Fake Product" {{ @$editData->return_reason == 'Fake Product'? 'Selected':'' }}>Fake Product</option>
                                <option value="Delivery Late" {{ @$editData->return_reason == 'Delivery Late'? 'Selected':'' }}>Delivery Late</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="memberId"><b>Member Id</b></label>
                            <input type="text" class="form-control" id="memberId" name="member_id" value="{{ @$editData->member_id }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="memberName"><b>Member Name</b></label>
                            <input type="text" class="form-control" id="memberName" name="member_name" value="{{ @$editData->member_name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="requisitionId"><b>Requisiton Id</b></label>
                            <input type="text" class="form-control" id="requisitionId" name="requisitionId" value="{{ @$editData->requisitionId }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="invoiceId"><b>Invoice Id</b></label>
                            <input type="text" class="form-control" id="invoiceId" name="invoiceId" value="{{ @$editData->invoiceId }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="productName"><b>Product Name</b></label>
                            <select class="form-control" name="product_name" id="productName">
                                <option value="">-- select --</option>
                                @foreach ($all_product as $product)
                                    <option value="{{ $product -> product_code }}" {{ @$editData->product_name == $product -> product_code ? 'Selected' :'' }}>{{ $product -> product_name }}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dcNo"><b>DC No</b></label>
                            <input type="text" class="form-control" name="dc_no" id="dcNo" value="{{ @$editData->dc_no }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date"><b>Date</b></label>
                            <input type="date" class="form-control" name="date" id="date" value="{{ @$editData->date }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sumittedBy"><b>Prepared By</b></label>
                            <input type="text" class="form-control" id="sumittedBy" value="{{ Auth::user()->name }}" name="prepared_by" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">{{ (@$editData) ? 'Update' : 'Submit' }}</button>
                        </div>
                    </div>
                </form>
            </div>
       </div>
    </div>
</div>

<div class="row mt-4">
    <div class="container-fluid">
        <div class="card col-md-12 mb-3">
            <div class="card-header">
                <h3 class="mt-3" style="color: #6777ef"><b>All Return Product List</b></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                     {{--  success msg show  --}}
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
                                <th>Member Id</th>
                                <th>Member Name</th>
                                <th>Reason</th>
                                <th>Requisition Id</th>
                                <th>Invoice Id</th>
                                <th>Product Code</th>
                                <th>Submited By</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_data as $data)
                            <tr>
                                <td>{{ $data->member_id }}</td>
                                <td>{{ $data->member_name }}</td>
                                <td>{{ $data->return_reason }}</td>
                                <td>{{ $data->requisitionId }}</td>
                                <td>{{ $data->invoiceId }}</td>
                                <td>{{ $data->product_name }}</td>
                                <td>{{ $data->prepared_by }}</td>
                                <td>{{ date('d/m/Y',strtotime($data->date)) }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('return-management-edit', $data -> id) }}">Edit</a>
                                    
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection