@extends('admin.layouts.master') @section('main-content')
<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Cheque Management</b></h2>
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
            <form action="{{ (@$editData)? route('update-cheque',$editData->id) : route('store-cheque') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="chequeNo"><b>Cheque No</b></label>
                        <input type="text" name="cheque_no" value="{{ @$editData->cheque_no }}" class="form-control" id="chequeNo" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="chequeAmount"><b>Cheque Amount</b></label>
                        <input type="text" name="cheque_amount" value="{{ @$editData->cheque_amount }}" class="form-control" id="chequeAmount" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="memberId"><b>Member Id</b></label>
                        <input type="text" name="member_id" value="{{ @$editData->member_id }}" class="form-control" id="memberId" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bankName"><b>Bank Name</b></label>
                        <input type="text" name="bank_name" value="{{ @$editData->bank_name }}" class="form-control" id="bankName" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="honouredBy"><b>Honoured by</b></label>
                        <input type="text" name="honoured_by" value="{{ @$editData->honoured_by }}" class="form-control" id="honouredBy" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="honouredDate"><b>Honoured Date {{ @$editData?'(Y-m-d)':'' }}</b></label>
                        <input type="{{ @$editData ? 'text' :'date' }}" name="honoured_date" value="{{ @$editData->honoured_date }}" class="form-control" id="honouredDate" {{ @$editData?'readonly':'' }}/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="chequeImage"><b>Cheque Image</b></label>
                        <input type="file" name="{{ @$editData? 'new_image':'cheque_image' }}" value="{{ @$editData->cheque_image }}"  class="form-control" id="chequeImage" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="preparedby"><b>Prepared By</b></label>
                        <input type="text" name="prepared_by" class="form-control" value="{{ Auth::user() -> name }}" id="preparedby" readonly/>
                    </div>
                    <div class="form-group col-md-1" style="margin-top: 33px;">
                        <button type="submit" class="btn btn-primary">{{ @$editData? 'Update': 'Submit' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row mb-3" style="margin: 0px -22px;">
    <div class="container-fluid d-flex">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Cheque Information</h6>
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
                                <th>Cheque No</th>
                                <th>Amount</th>
                                <th>cheque image</th>
                                <th>Member Id</th>
                                <th>Bank</th>
                                <th>Honoured By</th>
                                <th>Honoured Date</th>
                                <th>Prepared By</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                                <tr>
                                    <td>{{ $data -> cheque_no }}</td>
                                    <td>{{ $data -> cheque_amount }}</td>
                                    <td>
                                        <a href="{{ url('/'.$data -> cheque_image) }}" target="_blank">
                                            <img style="height: 50px; width:50px;" src="{{ url('/'.$data -> cheque_image) }}" alt="">
                                        </a>
                                    </td>
                                    <td>{{ $data -> member_id }}</td>
                                    <td>{{ $data -> bank_name }}</td>
                                    <td>{{ $data -> honoured_by }}</td>
                                    <td>{{ date('d/m/Y', strtotime($data->honoured_date)) }}</td>
                                    <td>{{ $data -> prepared_by }}</td>
                                    <td>{{ date('d/m/Y', strtotime($data->date)) }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('edit-cheque',$data->id) }}">Edit</a>
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
