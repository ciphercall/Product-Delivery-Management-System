@extends('admin.layouts.master') 
@section('main-content')
<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase;color:#6777ef;"><b>Product Delivery</b></h2>
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
            <form action="{{ (@$editData)? route('product-delivery-update',$editData->id) : route('product-delivery-store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="invoiceid"><b>Invoice Id</b></label>
                        <select class="form-control" id="invoiceid" name="invoice_id">
                            <option value="">--Select--</option>
                            <option value="100010" {{ @$editData->invoice_id == '100010'? 'selected':''}}>100010</option>
                            <option value="100001" {{ @$editData->invoice_id == '100001'? 'selected':''}}>100001</option>
                            <option value="100011" {{ @$editData->invoice_id == '100011'? 'selected':''}}>100011</option>
                            <option value="100031" {{ @$editData->invoice_id == '100031'? 'selected':''}}>100031</option> 
                            <option value="100050" {{ @$editData->invoice_id == '100050'? 'selected':''}}>100050</option>
                            <option value="100041" {{ @$editData->invoice_id == '100041'? 'selected':''}}>100041</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="deliveryman"><b>Delivery man</b></label>
                        <select class="form-control" id="deliveryman" name="delivery_man">
                            <option value="">--Select--</option>
                            @foreach ($delivery_man as $man)
                            <option value="{{ $man->deliveryman_name }}" {{ @$editData->delivery_man == $man->deliveryman_name? 'selected':''}}>{{ $man->deliveryman_name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="areaby"><b>Area By</b></label>
                        <input type="text" class="form-control" id="areaby" placeholder="Area Here" name="areaby" value="{{ @$editData->areaby }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date"><b>Date</b></label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ @$editData->date }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="time"><b>Time</b></label>
                        <input type="time" class="form-control" id="time" name="time" value="{{ @$editData->time }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="preparedby"><b>Prepared By</b></label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" id="preparedby" name="prepared_by" readonly/>
                    </div>

                    <div class="form-group col-md-1">
                        <button type="submit" class="btn btn-primary">{{ @$editData ? 'Update':'Submit' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<form action="{{ route('chalan-store') }}" method="POST">
    @csrf
    <div class="row mb-3" style="margin: 0px -24px;">
        <div class="container-fluid d-flex">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Product Delivery Information</h6>
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
                                    <th>Select</th>
                                    <th>Sales Id</th>
                                    <th>Delivery Man</th>
                                    <th>Prepared By</th>
                                    <th>Area</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_data as $data)
                                <tr>
                                    <td><input type="checkbox" name="delivery_id[]" value="{{ $data->id }}"/></td>
                                    <td>{{ $data->invoice_id }}</td>
                                    <td>{{ $data->delivery_man }}</td>
                                    <td>{{ $data->prepared_by }}</td>
                                    <td>{{ $data->areaby }}</td>
                                    <td>{{ date('d/m/Y',strtotime($data->date)) }}</td>
                                    <td>{{ date('h:i a', strtotime($data->time)) }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('product-delivery-edit', $data -> id) }}">Edit</a>
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
    <div class="row mb-3" style="margin: 0px -24px;">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card" style="background-color: #e9e9e9;">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="chalanid"><b>Chalan Id</b></label>
                            <input type="text" name="chalan_id" class="form-control" id="chalanid" required />
                            {{--  <small class="text-danger">{{ $errors->first('chalan_id') }}</small>  --}}
                        </div>
    
                        <div class="form-group col-md-4" style="margin-top: 35px;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
