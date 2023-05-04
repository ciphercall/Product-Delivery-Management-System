@extends('admin.layouts.master') 
@section('main-content')
<div class="row" style="margin: 0px -12px;">
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
                                <select class="form-control" id="memberCategory">
                                    <option value="">--Select--</option>
                                    <option value="">100010</option>
                                    <option value="">100001</option>
                                    <option value="">10002</option>
                                    <option value="">1000012</option>
                                </select>
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

<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid">
        <h2 class="text-center" style="padding: 30px 0px; text-transform: uppercase; color:#6777ef;"><b>Inventory Entry</b></h2>
        <div class="col">
            <form action="">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="totalamount"><b>Product Code</b></label>
                        <select class="form-control" id="memberCategory">
                            <option value="">--Select--</option>
                            <option value="">100010</option>
                            <option value="">100001</option>
                            <option value="">10002</option>
                            <option value="">1000012</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="receiveamount"><b>Product Name</b></label>
                        <input type="text" class="form-control" id="receiveamount" readonly />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="returnamount"><b>Product Category</b></label>
                        <input type="text" class="form-control" id="returnamount" readonly />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="totalinvestment"><b>Product Brand</b></label>
                        <input type="text" class="form-control" id="totalinvestment" readonly />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="qtyreceived"><b>Quantity Received</b></label>
                        <input type="text" class="form-control" id="qtyreceived" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="qtyorder"><b>Quantity Ordered</b></label>
                        <input type="text" class="form-control" id="qtyorder" readonly />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="stockqty"><b>Total Stock Qty</b></label>
                        <input type="text" class="form-control" id="stockqty" readonly />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date"><b>Date</b></label>
                        <input type="date" class="form-control" id="date" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="receivedby"><b>Received by</b></label>
                        <input type="text" class="form-control" id="receivedby" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="docfile"><b>Document save</b></label>
                        <input type="file" class="form-control" id="docfile" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="preparedby"><b>Prepared By</b></label>
                        <input type="text" class="form-control" id="preparedby" readonly/>
                    </div>
                    <div class="form-group col-md-1" style="margin-top: 33px;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row mb-3" style="margin: 0px 12px;">
    <div class="card container-fluid d-flex">
        <div class="col-md-12">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">All Inventory Product</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>SL</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Quantity Received</th>
                            <th>Quantity Ordered</th>
                            <th>Stock Qty</th>
                            <th>Received By</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>100001</td>
                            <td>1kg Potato</td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>Rubel</td>
                            <td>12/12/2022</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>100002</td>
                            <td>1kg Potato</td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>Rubel</td>
                            <td>12/12/2022</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>100003</td>
                            <td>1kg Potato</td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>Rubel</td>
                            <td>12/12/2022</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>100004</td>
                            <td>1kg Potato</td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>Rubel</td>
                            <td>12/12/2022</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>100005</td>
                            <td>1kg Potato</td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>Rubel</td>
                            <td>12/12/2022</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>100006</td>
                            <td>1kg Potato</td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>Rubel</td>
                            <td>12/12/2022</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>100007</td>
                            <td>1kg Potato</td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>Rubel</td>
                            <td>12/12/2022</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>100008</td>
                            <td>1kg Potato</td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>Rubel</td>
                            <td>12/12/2022</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>100009</td>
                            <td>1kg Potato</td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>Rubel</td>
                            <td>12/12/2022</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>100010</td>
                            <td>1kg Potato</td>
                            <td>20</td>
                            <td>18</td>
                            <td>2</td>
                            <td>Rubel</td>
                            <td>12/12/2022</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
@endsection
