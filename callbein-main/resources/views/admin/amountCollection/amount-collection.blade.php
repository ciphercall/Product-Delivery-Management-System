@extends('admin.layouts.master')
@section('main-content')
<div class="row mt-4 mb-3">
    <div class="container-fluid">
        <div class="card col-md-12 mb-3">
            <div class="card-header">
                <h3 class="mt-3" style="color: #6777ef"><b>All Invoice List</b></h3>
                <form action="">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="payment"><b>Payment</b></label>
                            <select name="" id="payment" class="form-control">
                                <option value="" selected>--select--</option>
                                <option value="">Full Paid</option>
                                <option value="">Unpaid</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="payment"><b>Consumer</b></label>
                            <select name="" id="payment" class="form-control">
                                <option value="" selected>--select--</option>
                                <option value="">Consumer</option>
                                <option value="">Non consumer</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Member Id</th>
                                <th>Member Name</th>
                                <th>Phone</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Due</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1001</td>
                                <td>101</td>
                                <td>Abdul Karim</td>
                                <td>0145236987</td>
                                <td>5000 tk</td>
                                <td><span class="badge badge-danger">Unpaid</span></td>
                                <td>12-2-2022</td>
                                <td>4000 tk</td>
                                <td><a class="btn btn-primary" href="#">Collect</a></td>
                            </tr>
                            <tr>
                                <td>1002</td>
                                <td>102</td>
                                <td>David Visa</td>
                                <td>0175236987</td>
                                <td>8000 tk</td>
                                <td><span class="badge badge-success">Full Paid</span></td>
                                <td>19-2-2022</td>
                                <td>8000 tk</td>
                                <td><a class="btn btn-primary" href="#">Details</a></td>
                            </tr>
                            <tr>
                                <td>1003</td>
                                <td>103</td>
                                <td>David Visa</td>
                                <td>0185236987</td>
                                <td>3000 tk</td>
                                <td><span class="badge badge-success">Full Paid</span></td>
                                <td>19-2-2022</td>
                                <td>3000 tk</td>
                                <td><a class="btn btn-primary" href="#">Collect</a></td>
                            </tr>
                            <tr>
                                <td>1004</td>
                                <td>104</td>
                                <td>David Visa</td>
                                <td>0135236987</td>
                                <td>2000 tk</td>
                                <td><span class="badge badge-danger">Unpaid</span></td>
                                <td>30-2-2022</td>
                                <td>2000 tk</td>
                                <td><a class="btn btn-primary" href="#">Collect</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="memberName"><b>Count Invoice</b></label>
                        <input type="text" class="form-control" id="memberName" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="memberPhone"><b>Total Amount</b></label>
                        <input type="text" class="form-control" id="memberPhone" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="container-fluid">
        <div class="card col-md-12">
            <div class="card-header">
                <h3 class="text-center mt-3 text-uppercase" style="color: #6777ef"><b>Invoice Amount Collection</b></h3>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="memberName"><b>Member Name</b></label>
                            <input type="text" class="form-control" id="memberName" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="memberPhone"><b>Member Phone No</b></label>
                            <input type="text" class="form-control" id="memberPhone" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="invoiceNumber"><b>Invoice Number</b></label>
                            <input type="text" class="form-control" id="invoiceNumber" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="invoiceAmount"><b>Invoice Amount</b></label >
                            <input type="text" class="form-control" id="invoiceAmount" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="receiveAmount"><b>Received Amount</b></label>
                            <input type="text" class="form-control" id="receiveAmount" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="duesAmount"><b>Dues Amount</b></label>
                            <input type="text" class="form-control" id="duesAmount" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="todayPay"><b>Today Pay Amount</b></label>
                            <input type="text" class="form-control" id="todayPay" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cashReceived"><b>Cash Received</b></label>
                            <input type="text" class="form-control" id="cashReceived" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bkashReceived"><b>Bkash Received</b></label>
                            <input type="text" class="form-control" id="bkashReceived" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nagadReceived"><b>Nagad Received</b></label>
                            <input type="text" class="form-control" id="nagadReceived" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="chequeReceived"><b>Cheque Received</b></label>
                            <input type="text" class="form-control" id="chequeReceived" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="totalCashBkashNagad"><b>Total Cash/Bkash/Nagad</b></label>
                            <input type="text" class="form-control" id="totalCashBkashNagad" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date"><b>Date</b></label>
                            <input type="text" class="form-control" id="date" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="preparedBy"><b>Prepared By</b></label>
                            <input type="text" class="form-control" id="preparedBy" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-primary" type="submit" >Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection