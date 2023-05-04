@extends('admin.layouts.master')
@section('main-content')
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><b>All Requisition List</b></h6>
                </div>
                <form action="">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>Select</th>
                                    <th>Requisition Id</th>
                                    <th>Member Id</th>
                                    <th>Member Name</th>
                                    <th>Items Name</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>100001</td>
                                    <td>101</td>
                                    <td>Tofael Ahmed</td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>1000tk</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>100002</td>
                                    <td>102</td>
                                    <td>Anis Ahmed</td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                    </td>
                                    <td>1000tk</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>100003</td>
                                    <td>101</td>
                                    <td>Tofael Ahmed</td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>1000tk</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>100004</td>
                                    <td>101</td>
                                    <td>Tofael Ahmed</td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>1000tk</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>100005</td>
                                    <td>101</td>
                                    <td>Tofael Ahmed</td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>1000tk</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>100006</td>
                                    <td>101</td>
                                    <td>Tofael Ahmed</td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                    </td>
                                    <td>1200tk</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>100007</td>
                                    <td>101</td>
                                    <td>Tofael Ahmed</td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>1000tk</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>100008</td>
                                    <td>101</td>
                                    <td>Tofael Ahmed</td>
                                    <td>
                                        <span class="badge badge-primary">meat</span>
                                        <span class="badge badge-primary">mutton</span>
                                        <span class="badge badge-primary">oil</span>
                                        <span class="badge badge-primary">milk</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">2</span>
                                        <span class="badge badge-primary">4</span>
                                        <span class="badge badge-primary">10</span>
                                        <span class="badge badge-primary">3</span>
                                    </td>
                                    <td>1000tk</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Analysis</button>
                        <button type="submit" class="btn btn-success">Send Procurement</button>
                    </div>
                </form>    
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->
<!---Requisition Analysis-->
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><b>Requisition Analysis</b></h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Items</th>
                                <th>Member Name</th>
                                <th>Total Qty</th>
                                <th>Total Buying Price</th>
                                <th>Total Selling Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>chal</td>
                                <td>Anis, Jabed, Akmal</td>
                                <td>20</td>
                                <td>1500</td>
                                <td>2000</td>
                            </tr>
                            <tr>
                                <td>Beef</td>
                                <td>Jabed, Akmal</td>
                                <td>20</td>
                                <td>5000</td>
                                <td>6000</td>
                            </tr>
                            <tr>
                                <td>Mutton</td>
                                <td>Akmal</td>
                                <td>20</td>
                                <td>2500</td>
                                <td>2800</td>
                            </tr>
                            <tr>
                                <td>Oil</td>
                                <td>Kader, Jhony, Akmal</td>
                                <td>40</td>
                                <td>3500</td>
                                <td>5000</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for=""><b>Total Buy Amount</b></label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Total Sell Amount</b></label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Total Profit</b></label>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
@endsection