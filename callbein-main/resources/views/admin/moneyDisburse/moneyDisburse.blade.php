@extends('admin.layouts.master') 
@section('main-content')
<style>
    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: 0.5em;
        display: inline-block;
        width: 120px;
        margin-right: 20px;
    }
    li.paginate_button.page-item {
        font-size: 15px;
    }
    li#dataTable_previous {
        width: 80px;
        font-size: 15px;
    }
    li#dataTable_next {
        font-size: 15px;
    }
    div#dataTable_paginate {
        width: 250px;
    }
</style>
<div class="row">
    <div class="container-fluid">
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="card h-20">
                    <form action="">
                        <div class="card-body d-flex">
                            <div class="col-md-4">
                                <label for="procurementId"><b>Procurement Id:</b></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="procurementId" />
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="container-fluid">
        <div class="card">
            <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Money Disburse</b></h2>
            <div class="col">
                <form action="">
                    <div class="form-row">
                        <div class="col-md-7"></div>
                        <div class="form-group col-md-5 d-flex">
                            <div class="col-md-4">
                                <label for="procurementId"><b>Procurement Id:</b></label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="procurementId" readonly />
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="totalamount"><b>Total Amount</b></label>
                            <input type="text" class="form-control" id="totalamount" readonly />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="receiveamount"><b>Receive Amount</b></label>
                            <input type="text" class="form-control" id="receiveamount" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="returnamount"><b>Return Amount</b></label>
                            <input type="text" class="form-control" id="returnamount" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="totalinvestment"><b>Total Investment</b></label>
                            <input type="text" class="form-control" id="totalinvestment" readonly />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="receivedby"><b>Received By</b></label>
                            <input type="text" class="form-control" id="receivedby" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date"><b>Date Time</b></label>
                            <input type="datetime-local" class="form-control" id="date" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status"><b>Status</b></label>
                            <select class="form-control" id="status">
                                <option value="">--Select--</option>
                                <option value="">Pending</option>
                                <option value="">Approved</option>
                            </select>
                            
                        </div>
                        <div class="form-group col-md-4" style="margin-top: 33px">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="container-fluid d-flex">
        <div class="card col-md-6 mr-2">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Given Amount Data</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Procurement Id</th>
                            <th>Amount</th>
                            <th>Received By</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>100001</td>
                            <td>10000</td>
                            <td>Rubel</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100002</td>
                            <td>10000</td>
                            <td>Rubel</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100003</td>
                            <td>10000</td>
                            <td>Rubel</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100004</td>
                            <td>10000</td>
                            <td>Rubel</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100005</td>
                            <td>10000</td>
                            <td>Rubel</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100006</td>
                            <td>10000</td>
                            <td>Makhon</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100007</td>
                            <td>10000</td>
                            <td>Makhon</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100008</td>
                            <td>10000</td>
                            <td>Makhon</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100009</td>
                            <td>10000</td>
                            <td>Makhon</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100010</td>
                            <td>10000</td>
                            <td>Makhon</td>
                            <td>12/12/12</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
        <div class="card col-md-6">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Received Amount Data</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable1">
                    <thead class="thead-light">
                        <tr>
                            <th>Invoice No</th>
                            <th>Amount</th>
                            <th>Name</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>100001</td>
                            <td>10000</td>
                            <td>Karim</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100002</td>
                            <td>10000</td>
                            <td>Karim</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100003</td>
                            <td>10000</td>
                            <td>Rarim</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100004</td>
                            <td>10000</td>
                            <td>Karim</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100005</td>
                            <td>10000</td>
                            <td>Rarim</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100006</td>
                            <td>10000</td>
                            <td>Karim</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100007</td>
                            <td>10000</td>
                            <td>Karim</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100008</td>
                            <td>10000</td>
                            <td>Rarim</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100009</td>
                            <td>10000</td>
                            <td>Rarim</td>
                            <td>12/12/12</td>
                        </tr>
                        <tr>
                            <td>100010</td>
                            <td>10000</td>
                            <td>Karim</td>
                            <td>12/12/12</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="container-fluid d-flex">
        <div class="card col-md-4 mr-1">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Received Amount</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">40,000 TK</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-md-4 mr-1">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Accounts Reacivable</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">37,000 TK</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-md-4 mr-1">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Unsold goods Amount</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">3000 TK</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="container-fluid d-flex">
        <div class="card col-md-12 mr-2">
            <div class="">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">All Procurement Amount Invest Data</h5>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable2">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Procurement Id</th>
                                <th>Total Amount</th>
                                <th>Received Amount</th>
                                <th>Return Amount</th>
                                <th>Total Investment</th>
                                <th>Received By</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>100001</td>
                                <td>10000</td>
                                <td>11000</td>
                                <td>1000</td>
                                <td>10000</td>
                                <td>Rubel</td>
                                <td><span class="badge badge-danger">Pending</span></td>
                                <td>12/12/21</td>
                                <td><a class="btn btn-sm btn-success" href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>100001</td>
                                <td>10000</td>
                                <td>11000</td>
                                <td>1000</td>
                                <td>10000</td>
                                <td>Rubel</td>
                                <td><span class="badge badge-danger">Pending</span></td>
                                <td>12/12/21</td>
                                <td><a class="btn btn-sm btn-success" href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>100001</td>
                                <td>10000</td>
                                <td>11000</td>
                                <td>1000</td>
                                <td>10000</td>
                                <td>Rubel</td>
                                <td><span class="badge badge-danger">Pending</span></td>
                                <td>12/12/21</td>
                                <td><a class="btn btn-sm btn-success" href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>100001</td>
                                <td>10000</td>
                                <td>11000</td>
                                <td>1000</td>
                                <td>10000</td>
                                <td>Rubel</td>
                                <td><span class="badge badge-danger">Pending</span></td>
                                <td>12/12/21</td>
                                <td><a class="btn btn-sm btn-success" href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>100001</td>
                                <td>10000</td>
                                <td>11000</td>
                                <td>1000</td>
                                <td>10000</td>
                                <td>Rubel</td>
                                <td><span class="badge badge-danger">Pending</span></td>
                                <td>12/12/21</td>
                                <td><a class="btn btn-sm btn-success" href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>100001</td>
                                <td>10000</td>
                                <td>11000</td>
                                <td>1000</td>
                                <td>10000</td>
                                <td>Rubel</td>
                                <td><span class="badge badge-success">Approved</span></td>
                                <td>12/12/21</td>
                                <td><a class="btn btn-sm btn-success" href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>100001</td>
                                <td>10000</td>
                                <td>11000</td>
                                <td>1000</td>
                                <td>10000</td>
                                <td>Rubel</td>
                                <td><span class="badge badge-success">Approved</span></td>
                                <td>12/12/21</td>
                                <td><a class="btn btn-sm btn-success" href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>100001</td>
                                <td>10000</td>
                                <td>11000</td>
                                <td>1000</td>
                                <td>10000</td>
                                <td>Rubel</td>
                                <td><span class="badge badge-success">Approved</span></td>
                                <td>12/12/21</td>
                                <td><a class="btn btn-sm btn-success" href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>100001</td>
                                <td>10000</td>
                                <td>11000</td>
                                <td>1000</td>
                                <td>10000</td>
                                <td>Rubel</td>
                                <td><span class="badge badge-success">Approved</span></td>
                                <td>12/12/21</td>
                                <td><a class="btn btn-sm btn-success" href="">Update</a></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>100001</td>
                                <td>10000</td>
                                <td>11000</td>
                                <td>1000</td>
                                <td>10000</td>
                                <td>Rubel</td>
                                <td><span class="badge badge-success">Approved</span></td>
                                <td>12/12/21</td>
                                <td><a class="btn btn-sm btn-success" href="">Update</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="container-fluid d-flex">
        <div class="card col-md-12 mr-2">
            <div class="">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Total Dues List Data</h5>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable3">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Invoice Id</th>
                                <th>Amount</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>100001</td>
                                <td>5000</td>
                                <td>Kahim</td>
                                <td>01777777777</td>
                                <td>12/12/21</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>100001</td>
                                <td>1000</td>
                                <td>Rahim</td>
                                <td>01777777777</td>
                                <td>12/12/21</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>100001</td>
                                <td>5000</td>
                                <td>Rahim</td>
                                <td>01777777777</td>
                                <td>12/12/21</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>100001</td>
                                <td>2000</td>
                                <td>Rakib</td>
                                <td>01777777777</td>
                                <td>12/12/21</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>100001</td>
                                <td>5000</td>
                                <td>Rahim</td>
                                <td>01777777777</td>
                                <td>12/12/21</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>100001</td>
                                <td>5000</td>
                                <td>Rahim</td>
                                <td>01777777777</td>
                                <td>12/12/21</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>100001</td>
                                <td>5000</td>
                                <td>Rahim</td>
                                <td>01777777777</td>
                                <td>12/12/21</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>100001</td>
                                <td>5000</td>
                                <td>Rahim</td>
                                <td>01777777777</td>
                                <td>12/12/21</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>100001</td>
                                <td>5000</td>
                                <td>Rahim</td>
                                <td>01777777777</td>
                                <td>12/12/21</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>100001</td>
                                <td>5000</td>
                                <td>Rahim</td>
                                <td>01777777777</td>
                                <td>12/12/21</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

@endsection
