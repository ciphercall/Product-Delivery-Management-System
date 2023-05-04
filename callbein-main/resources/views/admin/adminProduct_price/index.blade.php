@extends('admin.layouts.master') 
@section('main-content')
@if (Auth::user()->role != '1')
  @php
        header("Location: " . route('dashboard'));
        exit();
  @endphp
@endif

<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Add Product Price</b></h2>
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
            <form action="{{ (@$editData)? route('product-price-update',$editData->id) : route('product-price-store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="productbrand"><b>Product Name</b></label>
                        <select class="form-control" name="product_id" id="productbrand">
                            <option value="">--Select--</option>
                            @foreach ($all_product as $product)
                            <option value="{{$product->id}}" {{ @$editData->product_id == $product->id ? 'Selected': '' }} >{{$product->product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="buying_price"><b>Buying Price</b></label>
                        <input type="text" name="buying_price"  class="form-control" id="buying_price" value="{{ @$editData->buying_price }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="seeling_price"><b>Selling Price</b></label>
                        <input type="text" name="selling_price"class="form-control" id="selling_price" value="{{ @$editData->selling_price }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="unit"><b>Product Unit</b></label>
                        <select class="form-control" name="unit" id="unit">
                            <option>--Select--</option>
                            <option value="kg" {{ @$editData->unit == 'kg' ? 'Selected': '' }}>KG</option>
                            <option value="liter" {{ @$editData->unit == 'liter' ? 'Selected': '' }}>Liter</option>
                            <option value="box" {{ @$editData->unit == 'box' ? 'Selected': '' }}>Box</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="date"><b>Date</b></label>
                        <input type="text" value="{{ date('Y-m-d ') }}" name="price_date" class="form-control" id="date" readonly/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="preparedby"><b>Prepared By</b></label>
                        <input type="text" class="form-control" name="prepared_by" id="preparedby" value="{{ Auth::user() -> name }}" readonly/>
                    </div>
                    
                    <div class="form-group col-md-6" style="margin-top: 33px">
                        <button type="submit" class="btn btn-primary">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
                    <h6 class="m-0 font-weight-bold text-primary">All Products Price</h6>
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
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Product Unit</th>
                                <th>Prepared By</th>
                                <th>Date</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                                <tr>
                                    <td>{{ $data ->product_code }}</td>
                                    <td>{{ $data ->product_name }}</td>
                                    <td>{{ $data ->buying_price }}</td>
                                    <td>{{ $data ->selling_price }}</td>
                                    <td>{{ $data ->unit }}</td>
                                    <td>{{ $data ->prepared_by }}</td>
                                    <td>{{ $data ->price_date }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('product-price-edit',$data ->id) }}">Edit</a>
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
