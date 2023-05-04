@extends('admin.layouts.master') 
@section('main-content')
<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Delivery Information</b></h2>
         {{--  error message  --}}
         @if ($errors->any())
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
             {{ $errors->first() }}
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
     @endif
        <div class="col">
            <form action="{{ (@$editData)? route('delivery-information-update',$editData->id) : route('delivery-information-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="invoiceid"><b>Invoice Id</b></label>
                        <select class="form-control" id="invoiceid" name="invoice_id">
                            <option value="">--Select--</option>
                            <option value="100010" {{ @$editData->invoice_id == '100010'?'selected':'' }}>100010</option>
                            <option value="100001" {{ @$editData->invoice_id == '100001'?'selected':'' }}>100001</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="chalanid"><b>Chalan Id</b></label>
                        <input type="text" class="form-control" id="chalanid" name="chalanId" value="{{ @$editData->chalanId }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="receiveddamountcod"><b>Received Amount COD</b></label>
                        <input type="text" class="form-control" id="receiveddamountcod" name="received_amount" value="{{ @$editData->received_amount }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="receiveddby"><b>Received By</b></label>
                        <input type="text" class="form-control" id="receiveddby" name="received_by" value="{{ @$editData->received_by }}"/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="doc"><b>Document</b></label>
                        <input type="file" class="form-control" id="doc" name="doc_file"/>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="timedate"><b>Received Date</b></label>
                        <input type="date" class="form-control" id="timedate" name="date" value="{{ @$editData->date }}"/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="time"><b>Received Time</b></label>
                        <input type="time" class="form-control" id="time" name="time" value="{{ @$editData->time }}"/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="returnstatus"><b>Return Status</b></label>
                        <select class="form-control" id="returnstatus" name="return_status">
                            <option value="">--Select--</option>
                            <option value="0" {{ @$editData->return_status == '0'?'selected':'' }}>Not Return</option>
                            <option value="1" {{ @$editData->return_status == '1'?'selected':'' }}>Product Return</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="returnreason"><b>Return Reason</b></label>
                        <textarea class="form-control" id="returnreason" cols="37" rows="2" name="return_reason">{{ @$editData->return_reason == 0? '' : @$editData->return_reason }}</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="preparedby"><b>Prepared By</b></label>
                        <input type="text" class="form-control" id="preparedby" value="{{ Auth::user()->name }}" name="prepared_by" readonly/>
                    </div>

                    <div class="form-group col-md-12">
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
                    <h6 class="m-0 font-weight-bold text-primary">All Delivery Information</h6>
                </div>
                <div class="table-responsive p-3">
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
                                <th>Invoice Id</th>
                                <th>Chalan Id</th>
                                <th>Received Amount</th>
                                <th>Received By</th>
                                <th>Image</th>
                                <th>Date & Time</th>
                                <th>Return Status</th>
                                <th>Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($all_data as $data)
                                <tr>
                                    <td>{{ $data->invoice_id }}</td>
                                    <td>{{ $data->chalanId }}</td>
                                    <td>{{ $data->received_amount }}</td>
                                    <td>{{ $data->received_by }}</td>
                                    <td>
                                        <a href="{{ url('/'.$data->doc_file) }}" download="" title="Click to Download">
                                            <img style="width: 50px;height:50px;" src="{{ url('/'.$data->doc_file) }}" alt="">
                                        </a>
                                        
                                    </td>
                                    <td>{{ date('d/m/Y',strtotime($data->date)) }} {{ date('h:i a',strtotime($data->time)) }}</td>
                                    <td>
                                        @if ($data->return_status == 0)
                                        <span class="badge badge-success">Not Return</span>
                                        @else
                                            <span class="badge badge-danger">Product Return</span>
                                            
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->return_reason)
                                            {{ $data->return_reason }}
                                        @else
                                        <span class="badge badge-success">No Reason</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('delivery-information-edit', $data -> id) }}">Edit</a>
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
</div>
@endsection
