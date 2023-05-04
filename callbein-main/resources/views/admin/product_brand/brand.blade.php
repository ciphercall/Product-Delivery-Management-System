@extends('admin.layouts.master') 
@section('main-content')
<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Add Product Brand</b></h2>
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
            <form action="{{ (@$editData)? route('update-brand',$editData->id) : route('store-brand') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="catid"><b>Brand Code</b></label>
                        <input type="text" class="form-control" value="{{@$editData->brand_code}}" name="brand_code" id="catid" placeholder="Ex: 801, 8 for Brand" {{ @$editData?'readonly':'' }}/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="companyName"><b>Company Name</b></label>
                        <select class="form-control" id="companyName" name="company_id">
                            <option>--Select--</option>
                            @foreach ($all_company as $data)
                                <option value="{{$data->id}}" {{@$editData->company_id == $data->id? 'selected':''}}>{{ $data->company_name }}</option>
                                
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="brandname"><b>Brand Name</b></label>
                        <input type="text" class="form-control" value="{{@$editData->brand_name}}" name="brand_name" id="brandname" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date"><b>Date</b></label>
                        <input type="{{ @$editData?'text':'date' }}" class="form-control" value="{{@$editData->brand_date}}" name="brand_date" id="date" {{ @$editData?'readonly':'' }} />
                    </div>
                    <div class="form-group col-md-6" >
                        <button type="submit" class="btn btn-primary">{{ (@$editData) ? 'Update' : 'Submit' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row mb-3" style="margin: 0px -23px;">
    <div class="container-fluid d-flex">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Product Brand</h6>
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
                                <th>Brand Id</th>
                                <th>Brand Code</th>
                                <th>Company Name</th>
                                <th>Brand Name</th>
                                <th>Date</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_brand as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->brand_code}}</td>
                                <td>{{$item->company_name}}</td>
                                <td>{{$item->brand_name}}</td>
                                <td>{{$item->brand_date}}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('edit-brand', $item -> id) }}">Edit</a>
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
