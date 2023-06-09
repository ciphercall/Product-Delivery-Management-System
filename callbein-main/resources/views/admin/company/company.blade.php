@extends('admin.layouts.master') 
@section('main-content')
<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Company Registration</b></h2>
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
            <form action="{{ (@$editData)? route('update-company',$editData->id) : route('store-company') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="companyname"><b>Company Name</b></label>
                        <input type="text" name="name" value="{{ @$editData->company_name }}" class="form-control" id="companyname" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="receivedby"><b>Company Description</b></label>
                        <textarea class="form-control" name="description" id="" cols="40" rows="2">{{ @$editData->company_desc }}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date"><b>Date</b></label>
                        <input type="{{ @$editData?'text':'date' }}" name="date" value="{{ @$editData->company_date }}" class="form-control" id="date" {{ @$editData?'readonly':'' }}/>
                    </div>
                    <div class="form-group col-md-6" style="margin-top: 33px;">
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
                    <h6 class="m-0 font-weight-bold text-primary">All Company Information</h6>
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
                                <th>SL</th>
                                <th>Company Name</th>
                                <th>Description</th>
                                <th>Prepared By</th>
                                <th>Date</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $item)
                                <tr>
                                    <td>{{ $loop -> index + 1 }}</td>
                                    <td>{{ $item -> company_name }}</td>
                                    <td>{{ $item -> company_desc }}</td>
                                    <td>{{ $item -> prepared_by }}</td>
                                    <td>{{ $item -> company_date }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('edit-company', $item -> id) }}">Edit</a>
                                        {{--  <a class="btn btn-danger btn-sm" href="#">Delete</a>  --}}
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
