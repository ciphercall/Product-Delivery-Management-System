@extends('admin.layouts.master')
@section('main-content')
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><b>Chalan Details</b></h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Chalan Id</th>
                                <th>Invoice Id</th>
                                <th>Delivery Man</th>
                                <th>Area</th>
                                <th>DateTime</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                            <tr>
                                <td>{{ $data -> chalanId }}</td>
                                <td>{{ $data -> invoice_id }}</td>
                                <td>{{ $data -> delivery_man }}</td>
                                <td>{{ $data -> areaby }}</td>
                                <td>{{ date('d/m/Y', strtotime($data->date)) }} {{ date('h:i a', strtotime($data->time)) }}</td>
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