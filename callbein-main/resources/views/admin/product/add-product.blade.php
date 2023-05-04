@extends('admin.layouts.master') 
@section('main-content')
<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Add Product</b></h2>
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
            <form action="{{ (@$editData)? route('update-product',$editData->id) : route('store-product') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="productcode"><b>Product Code</b></label>
                        <input type="text" class="form-control" name="product_code" value="{{ @$editData -> product_code }}" id="productcode" placeholder="Ex: 101" {{ @$editData ? 'readonly' : '' }}/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="productname"><b>Product Name</b></label>
                        <input type="text" name="product_name" value="{{ @$editData -> product_name }}" class="form-control" id="productname" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="productcategory"><b>Product Category</b></label>
                        <select class="form-control" name="category_id" id="productcategory">
                            <option>--Select--</option>
                            @foreach ($all_category as $category)
                                <option value="{{ $category-> category_code }}" {{ (@$editData -> category_id ==  $category-> category_code) ? 'selected' : '' }}>{{ $category -> category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="productbrand"><b>Brand Name</b></label>
                        <select class="form-control" name="brand_id" id="productbrand">
                            <option>--Select--</option>
                            @foreach ($all_brand as $brand)
                                <option value="{{ $brand-> brand_code }}" {{ (@$editData -> brand_id ==  $brand-> brand_code) ? 'selected' : '' }}>{{ $brand -> brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="productsource"><b>Product Source/Bazar</b></label>
                        <select class="form-control" name="source_id" id="productsource">
                            <option>--Select--</option>
                            @foreach ($all_source as $source)
                                <option value="{{ $source-> id }}" {{ (@$editData -> source_id ==  $source-> id) ? 'selected' : '' }}>{{ $source -> product_source }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date"><b>Date</b></label>
                        <input type="text" value="{{ date('d/m/Y ') }}" name="product_date" class="form-control" id="date" readonly />
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
                    <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
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
                                <th>Id</th>
                                <th>Code</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Product Brand</th>
                                <th>Prepared By</th>
                                <th>Date</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_product as $product)
                                <tr>
                                    <td>{{ $product -> id }}</td>
                                    <td>{{ $product -> product_code }}</td>
                                    <td>{{ $product -> product_name }}</td>
                                    <td>{{ $product -> category_name }}</td>
                                    <td>{{ $product -> brand_name }}</td>
                                    <td>{{ $product -> prepared_by }}</td>
                                    <td>{{ $product -> product_date }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('edit-product', $product -> id) }}">Edit</a>
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
