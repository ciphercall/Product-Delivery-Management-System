@extends('admin.layouts.master')
@section('main-content')
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><b>All Procurement List</b></h6>
                </div>
                <form action="">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>Select</th>
                                    <th>Procurement Id</th>
                                    <th>Requisition Id</th>
                                    <th>Items Name</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>10001</td>
                                    <td>
                                        <span class="badge badge-secondary">1001</span>
                                        <span class="badge badge-secondary">1002</span>
                                        <span class="badge badge-secondary">1003</span>
                                        <span class="badge badge-secondary">1004</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>11-1-2022</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">Details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>10002</td>
                                    <td>
                                        <span class="badge badge-secondary">1005</span>
                                        <span class="badge badge-secondary">1006</span>
                                        <span class="badge badge-secondary">1007</span>
                                        <span class="badge badge-secondary">1008</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>11-1-2022</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">Details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>10003</td>
                                    <td>
                                        <span class="badge badge-secondary">1009</span>
                                        <span class="badge badge-secondary">1010</span>
                                        <span class="badge badge-secondary">1011</span>
                                        <span class="badge badge-secondary">1012</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>11-1-2022</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">Details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>10001</td>
                                    <td>
                                        <span class="badge badge-secondary">1001</span>
                                        <span class="badge badge-secondary">1002</span>
                                        <span class="badge badge-secondary">1003</span>
                                        <span class="badge badge-secondary">1004</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>11-1-2022</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">Details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>10001</td>
                                    <td>
                                        <span class="badge badge-secondary">1001</span>
                                        <span class="badge badge-secondary">1002</span>
                                        <span class="badge badge-secondary">1003</span>
                                        <span class="badge badge-secondary">1004</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>11-1-2022</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">Details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                   <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>Total Amount</b></label>
                                <input type="text" class="form-control" readonly>
                            </div>
                            {{--  <div class="form-group col-md-4">
                                <button class="btn btn-primary">Submit</button>
                            </div>  --}}
                        </div>
                   </div>
                </form>    
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
<!---Procurement Details-->
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><b>Procurement Details</b></h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Items</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>chal</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>meat</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>oil</td>
                                <td>35</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
<!---Total Procurement Details-->
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><b>Total Procurement Details</b></h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Items</th>
                                <th>Product Source</th>
                                <th>Total Qty</th>
                                <th>Subtotal Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>chal</td>
                                <td>60 Feet Bazar</td>
                                <td>60</td>
                                <td>4000</td>
                            </tr>
                            <tr>
                                <td>Beef</td>
                                <td>Mirpur-1 Bazar</td>
                                <td>10</td>
                                <td>7000</td>
                            </tr>
                            <tr>
                                <td>Mutton</td>
                                <td>60 Feet Bazar</td>
                                <td>10</td>
                                <td>8000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
@endsection