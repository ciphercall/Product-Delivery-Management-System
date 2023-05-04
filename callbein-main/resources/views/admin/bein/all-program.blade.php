@extends('admin.layouts.master')
@section('main-content')
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><b>All Bein Program List</b></h6>
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
                                <th>Program Id</th>
                                <th>Program Reason</th>
                                <th>Program Incharge</th>
                                {{-- <th>member</th> --}}
                                <th>Program Schedule</th>
                                <th>Description</th>
                                <th style="width: 80px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                            <tr>
                                <td>{{ $data -> programId }}</td>
                                <td>
                                    @if ($data -> reason == '01')
                                            <span class="badge badge-success">Monthly Bazar</span>
                                        @elseif ($data -> reason == '02')
                                            <span class="badge badge-primary">Weekly Bazar</span>
                                        @elseif ($data -> reason == '03')
                                            <span class="badge badge-info">Seasonal Food</span>
                                    @endif
                                </td>
                                <td>{{ $data -> programIncharge }}</td>
                                <td>{{ date('d/m/Y', strtotime($data -> firstSchedule)) }} to {{ date('d/m/Y', strtotime($data -> lastSchedule)) }}</td>
                                <td>{{ $data -> programDesc }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ route('bein.program-edit', $data->id) }}"><i class="fas fa-edit" title="Edit"></i></a>
                                    <a class="btn btn-info btn-sm" href="{{ route('bein.program-view', $data->programId ) }}"><i class="fas fa-eye" aria-hidden="true" title="View"></i></a>
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