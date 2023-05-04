@extends('admin.layouts.master') 
@section('main-content')
<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Add Product Category</b></h2>
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
            <form action="{{ (@$edit_data)? route('update-category',$edit_data->id) : route('store-category') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="catid"><b>Category Code</b></label>
                        <input type="text" value="{{ @$edit_data -> category_code }}" class="form-control" name="category_code" id="catid" placeholder="Ex: 901, 9 for category" {{ @$edit_data?'readonly':'' }}/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="catname"><b>Category Name</b></label>
                        <input type="text" name="category_name" value="{{ @$edit_data -> category_name }}" class="form-control" id="catname" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="desc"><b>Category Description</b></label>
                        <textarea class="form-control" name="category_desc" id="desc" cols="40" rows="2">{{ @$edit_data -> category_desc }}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date"><b>Date</b></label>
                        <input type="{{ @$edit_data?'text':'date' }}" name="category_date" value="{{ @$edit_data -> category_date }}" class="form-control" id="date" {{ @$edit_data?'readonly':'' }} />
                    </div>
                    <div class="form-group col-md-6">
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
                    <h6 class="m-0 font-weight-bold text-primary">All Product Category</h6>
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
                                <th>Category ID</th>
                                <th>Category Code</th>
                                <th>Category Name</th>
                                <th>Category Desc</th>
                                <th>Date</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                            <tr>
                                <td>{{ $data -> id }}</td>
                                <td>{{ $data -> category_code }}</td>
                                <td>{{ $data -> category_name }}</td>
                                <td>{{ $data -> category_desc }}</td>
                                <td>{{ $data -> category_date }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('edit-category', $data -> id) }}">Edit</a>
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
