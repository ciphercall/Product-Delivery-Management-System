@extends('admin.layouts.master')
@section('main-content')
<div class="row">
    <div class="container-fluid">
        <div class="card col-md-12">
            <div class="card-header">
                <h3 class="text-center mt-3 text-uppercase" style="color: #6777ef"><b>Admin Account Form</b></h3>
                {{--  error message  --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first() }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                 @endif
            </div>
            <div class="card-body">
                <form action="{{ (@$editData) ? route('admin-expense-update',$editData->id) : route('admin-expense-store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="companyName"><b>Company Name</b></label>
                            <select class="form-control" name="company_name" id="companyName">
                                <option value="">--Select--</option>
                                <option value="01" {{ @$editData->company_name == 01? 'Selected':'' }}>MCL</option>
                                <option value="02" {{ @$editData->company_name == 02? 'Selected':'' }}>BEIN Ltd</option>
                                <option value="03" {{ @$editData->company_name == 03? 'Selected':'' }}>MCL Exim Ltd</option>
                                <option value="04" {{ @$editData->company_name == 04? 'Selected':'' }}>MCL Builders Ltd</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="accountDivision"><b>Accounts Division</b></label>
                            <select class="form-control" name="account_devision" id="accountDivision">
                                <option value="">--Select--</option>
                                <option value="1" {{ @$editData->account_devision == 1? 'Selected':'' }}>Asset</option>
                                <option value="2" {{ @$editData->account_devision == 2? 'Selected':'' }}>Liabilities</option>
                                <option value="3" {{ @$editData->account_devision == 3? 'Selected':'' }}>Income</option>
                                <option value="4" {{ @$editData->account_devision == 4? 'Selected':'' }}>Expenditure</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="accountsGroup"><b>Accounts Group</b></label>
                            <select class="form-control" name="account_group" id="accountsGroup">
                                <option value="">--Select--</option>
                                <option value="001" {{ @$editData->account_group == 001? 'Selected':'' }}>Procurement</option>
                                <option value="002" {{ @$editData->account_group == 002? 'Selected':'' }}>Stationary</option>
                                <option value="003" {{ @$editData->account_group == 003? 'Selected':'' }}>Salary</option>
                                <option value="004" {{ @$editData->account_group == 004? 'Selected':'' }}>Entertainment</option>
                                <option value="005" {{ @$editData->account_group == 005? 'Selected':'' }}>Advertisement</option>
                                <option value="006" {{ @$editData->account_group == 006? 'Selected':'' }}>Food</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="accountsHead"><b>Accounts Head</b></label>
                            <select class="form-control" name="account_head" id="accountsHead">
                                <option value="">--Select--</option>
                                <option value="001" {{ @$editData->account_head == 001? 'Selected':'' }}>Caring cost</option>
                                <option value="002" {{ @$editData->account_head == 002? 'Selected':'' }}>Stapler</option>
                                <option value="003" {{ @$editData->account_head == 003? 'Selected':'' }}>Rapping paper</option>
                                <option value="004" {{ @$editData->account_head == 004? 'Selected':'' }}>A4 Paper</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="amount"><b>Amount</b></label>
                            <input type="text" name="amount" value="{{ @$editData->amount }}" class="form-control" id="amount">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date"><b>Date</b></label>
                            <input type="{{ @$editData -> date ? 'date' : 'date' }}" name="date" value="{{ @$editData->date }}" class="form-control" id="date">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date"><b>Time</b></label>
                            <input type="{{ @$editData -> time ? 'time' : 'time' }}" value="{{ @$editData->time }}" name="time" class="form-control" id="date">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="preparedBy"><b>Prepared By</b></label>
                            <input type="text" name="prepared_by" class="form-control" value="{{ Auth::user() -> name }}" id="preparedBy" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description"><b>Description</b></label>
                            <textarea class="form-control" name="expense_desc" id="description" rows="2" >{{ @$editData->expense_desc }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">{{ @$editData ? 'Update' : 'Submit' }}</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
<!---- form-end ---->
<div class="row mt-4">
    <div class="container-fluid">
        <div class="card col-md-12 mb-3">
            <div class="card-header">
                <h3 class="mt-3" style="color: #6777ef"><b>All Expense List</b></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
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
                                <th>Expense Id</th>
                                <th>Company Name</th>
                                <th>Accounts Group</th>
                                <th>Accounts Head</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                                <tr>
                                    <td>{{ $data->expenseId }}</td>
                                    <td>
                                        @if ( $data->company_name == 01)
                                         MCL
                                         @elseif ($data->company_name == 02)
                                         BEIN Ltd
                                         @elseif ($data->company_name == 03)
                                         MCL Exim Ltd
                                         @elseif ($data->company_name == 04)
                                         MCL Builders Ltd
                                        @endif
                                    </td>
                                    <td>
                                        @if ( $data->account_group == 001)
                                        Procurement
                                        @elseif ($data->account_group == 002)
                                        Stationary
                                        @elseif ($data->account_group == 003)
                                        Salary
                                        @elseif ($data->account_group == 004)
                                        Entertainment
                                        @elseif ($data->account_group == 005)
                                        Advertisement
                                        @elseif ($data->account_group == 006)
                                        Food
                                       @endif
                                    </td>
                                    <td>
                                        @if ( $data->account_head == 001)
                                        Caring cost
                                        @elseif ($data->account_head == 002)
                                        Stapler
                                        @elseif ($data->account_head == 003)
                                        Rapping paper
                                        @elseif ($data->account_head == 004)
                                        A4 Paper
                                       @endif
                                    </td>
                                    <td>{{ $data->amount }}</td>
                                    <td>{{ $data->expense_desc }}</td>
                                    <td>{{ date('d/m/Y', strtotime($data->date)) }}</td>
                                    <td>{{ date('h:i a', strtotime($data->time)) }}</td>
                                    <td><a class="btn btn-warning" href="{{ route('admin-expense-edit', $data -> id) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection