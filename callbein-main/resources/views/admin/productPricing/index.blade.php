@extends('admin.layouts.master')
@section('main-content')
<div class="row">
    <div class="container-fluid">
        <div class="form-row">
              <div class="form-group col-md-6">
                  <div class="card h-100">
                      <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="procurementId"><b>Procurement Id</b></label>
                                    <select class="form-control" id="Procurement Id">
                                        <option>--Select--</option>
                                        <option>1000145</option>
                                        <option>1000254</option>
                                        <option>1000258</option>
                                        <option>1000358</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </form>
                      </div>
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <div class="card h-100">
                      <div class="card-body">
                            <div class="form-group">
                                <label for="productCode"><b>Product Code</b></label>
                                <select class="form-control" id="productCode">
                                    <option>--Select--</option>
                                    <option>101</option>
                                    <option>102</option>
                                    <option>103</option>
                                    <option>105</option>
                                </select>
                            </div>
                      </div>
                  </div>
              </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="container-fluid">
        <div class="card col-md-12">
            <div class="card-header">
                <h3 class="text-center mt-3 text-uppercase" style="color: #6777ef"><b>Product Price</b></h3>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="procurementId"><b>Procurement Id</b></label>
                            <input type="text" class="form-control" id="procurementId" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productCode"><b>Product Code</b></label>
                            <input type="text" class="form-control" id="productCode" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productName"><b>Product Name</b></label>
                            <input type="text" class="form-control" id="productName" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productCategory"><b>Product Category</b></label>
                            <input type="text" class="form-control" id="productCategory" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productBrand"><b>Product Brand</b></label >
                            <input type="text" class="form-control" id="productBrand" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="buyingPrice"><b>Product Buying Price</b></label>
                            <input type="text" class="form-control" id="buyingPrice">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="buyingDate"><b>Buying Date</b></label>
                            <input type="text" class="form-control" id="buyingDate">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sellingPrice"><b>Product Selling Price</b></label>
                            <input type="text" class="form-control" id="sellingPrice">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="carryingCost"><b>Carrying Cost</b></label>
                            <input type="text" class="form-control" id="carryingCost" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="overheadCost"><b>Overhead Cost</b></label>
                            <input type="text" class="form-control" id="overheadCost" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="businessCost"><b>Business Cost</b></label>
                            <input type="text" class="form-control" id="businessCost" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="auditBy"><b>Audit By</b></label>
                            <input type="text" class="form-control" id="auditBy">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="auditPrice"><b>Audit Price</b></label>
                            <input type="text" class="form-control" id="auditPrice">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="auditDocument"><b>Audit Document</b></label>
                            <input type="file" class="form-control" id="auditDocument">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="storeInvoiceNo"><b>Store Invoice No</b></label>
                            <input type="text" class="form-control" id="storeInvoiceNo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="calculatedPrice"><b>Calculated/Final Price</b></label>
                            <input type="text" class="form-control" id="calculatedPrice" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="submitBy"><b>Submit By</b></label>
                            <input type="text" class="form-control" id="submitBy">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date"><b>Date</b></label>
                            <input type="dateTimeLocal" class="form-control" id="submitBy" readonly>
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
<!---- form-end ---->
<div class="row mt-4">
    <div class="container-fluid">
        <div class="card col-md-12 mb-3">
            <div class="card-header">
                <h3 class="mt-3" style="color: #6777ef"><b>All Product Price List</b></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Procurement Id</th>
                                <th>Product Name</th>
                                <th>Overhead Cost</th>
                                <th>Buy Date</th>
                                <th>Submited By</th>
                                <th>Entry Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1001</td>
                                <td>Olive Oil</td>
                                <td>5tk</td>
                                <td>10-2-2022</td>
                                <td>Karim Jannat</td>
                                <td>12-2-2022</td>
                                <td><a class="btn btn-success" href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>1002</td>
                                <td>Olive Oil</td>
                                <td>5tk</td>
                                <td>10-2-2022</td>
                                <td>Karim Jannat</td>
                                <td>12-2-2022</td>
                                <td><a class="btn btn-success" href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>1003</td>
                                <td>Olive Oil</td>
                                <td>5tk</td>
                                <td>10-2-2022</td>
                                <td>Karim Jannat</td>
                                <td>12-2-2022</td>
                                <td><a class="btn btn-success" href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>1005</td>
                                <td>Olive Oil</td>
                                <td>5tk</td>
                                <td>10-2-2022</td>
                                <td>Karim Jannat</td>
                                <td>12-2-2022</td>
                                <td><a class="btn btn-success" href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>1005</td>
                                <td>Olive Oil</td>
                                <td>5tk</td>
                                <td>10-2-2022</td>
                                <td>Karim Jannat</td>
                                <td>12-2-2022</td>
                                <td><a class="btn btn-success" href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>1004</td>
                                <td>Olive Oil</td>
                                <td>5tk</td>
                                <td>10-2-2022</td>
                                <td>Karim Jannat</td>
                                <td>12-2-2022</td>
                                <td><a class="btn btn-success" href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>1002</td>
                                <td>Olive Oil</td>
                                <td>5tk</td>
                                <td>10-2-2022</td>
                                <td>Karim Jannat</td>
                                <td>12-2-2022</td>
                                <td><a class="btn btn-success" href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>1002</td>
                                <td>Olive Oil</td>
                                <td>5tk</td>
                                <td>10-2-2022</td>
                                <td>Karim Jannat</td>
                                <td>12-2-2022</td>
                                <td><a class="btn btn-success" href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>1003</td>
                                <td>Olive Oil</td>
                                <td>5tk</td>
                                <td>10-2-2022</td>
                                <td>Karim Jannat</td>
                                <td>12-2-2022</td>
                                <td><a class="btn btn-success" href="#">Edit</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection