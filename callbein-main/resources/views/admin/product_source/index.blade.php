@extends('admin.layouts.master') 
@section('main-content')
<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Add Product Source</b></h2>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first() }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col">
            <form action="{{ (@$edit_data)? route('update-product-source',$edit_data->id) : route('store-product-source') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="productSource"><b>Product Source/Bazar</b></label>
                        <input type="text" class="form-control" value="{{ @$edit_data -> product_source }}"  name="product_source" id="productSource" placeholder="Bazar Name Here"/>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="date"><b>Date</b></label>
                        <input type="{{ @$edit_data?'text':'date' }}" name="date" value="{{ @$edit_data -> date }}" class="form-control" id="date" {{ @$edit_data?'readonly':'' }} />
                    </div>
                    <div class="form-group col-md-2" style="margin-top: 33px;">
                        <button type="submit" class="btn btn-primary">{{ (@$edit_data) ? 'Update' : 'Submit' }}</button>
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
                    <h6 class="m-0 font-weight-bold text-primary">All Source/Bazar Name</h6>
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
                    <table class="table align-items-center table-flush text-center" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Source/Bazar Name</th>
                                <th>Prepared By</th>
                                <th>Date</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                                <tr>
                                    <td>{{ $loop -> index + 1 }}</td>
                                    <td>{{ $data -> product_source }}</td>
                                    <td>{{ $data -> prepared_by }}</td>
                                    <td>{{ $data -> date }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('edit-product-source', $data -> id) }}">Edit</a>
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
