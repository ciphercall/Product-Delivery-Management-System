@extends('admin.layouts.master') 
@section('main-content')

@if (Auth::user()->role != '1')
  @php
        header("Location: " . route('dashboard'));
        exit();
  @endphp
@endif
<div class="row mb-3" style="margin: 0px 5px;">
    <div class="container-fluid">
        <div class="card">
            <h2 class="text-center" style="padding: 30px 0px 0px 0px; text-transform: uppercase; color:#6777ef;"><b>Employee Registration</b></h2>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="login-form">
                      <form  action="{{ route('employee-store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                          <label>Confirm Password</label>
                          <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                          <label>Employee Type</label>
                          <select class="form-control" name="role">
                            <option value="">--Select--</option>
                            <option value="2" selected>Employee</option>
                            <option value="3">Admin</option>
                        </select>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
        

    </div>
</div>

@endsection
