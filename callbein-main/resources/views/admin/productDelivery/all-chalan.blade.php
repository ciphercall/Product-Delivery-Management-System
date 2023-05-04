@extends('admin.layouts.master')
@section('main-content')
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><b>All Chalan List</b></h6>
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
                                <th>Chalan Id</th>
                                {{--  <th>Delivery Id</th>  --}}
                                <th>DateTime</th>
                                <th>Prepared By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                            <tr>
                                <td>{{ $loop -> index + 1 }}</td>
                                <td>{{ $data -> chalanId }}</td>
                                {{--  <td>{{ $data -> delivery_id }}</td>  --}}
                                <td>{{ date('d/m/Y', strtotime($data -> date)) }} {{ date('h:i a', strtotime($data -> time)) }}</td>
                                <td>{{ $data -> prepared_by }}</td>
                                <td>
                                    {{--  {{--  <a class="btn btn-warning btn-sm" href="{{ route('bein.program-edit', $data->id) }}"><i class="fas fa-edit" title="Edit"></i></a>  --}}
                                    <a class="btn btn-info btn-sm" href="{{ route('chalan-view-details', $data -> id) }}"><i class="fas fa-eye" aria-hidden="true" title="View"></i></a>
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
    <!--Row-->
</div>
<!---Container Fluid-->

@endsection