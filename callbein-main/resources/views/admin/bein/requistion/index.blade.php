@extends('admin.layouts.master')
@section('main-content')

<div class="row">
    <div class="container-fluid">
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="card h-20">
                    <form action="{{ route('bein-getMemberDetail') }}" method="POST">
                        @csrf
                        <div class="card-body d-flex">
                            <div class="col-md-4">
                                <label for="memberId"><b>Member Id:</b></label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="member_id" class="form-control" id="memberId" />
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-sm mt-1">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<form action="" method="POST">
    <div class="row ">
        <div class="container-fluid">
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="form-row">
                        <div class="row mt-4 col-md-8">
                            <div class="form-group col-md-6">
                                <label for="memberId">Member Id:</label>
                                <span style="font-weight: bold; font-size:16px; padding-left:10px">{{ @$get_member->MemberID }}</span>
                                <input type="hidden" name="member_id" value="{{ @$get_member->MemberID }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="memberId">Member Name:</label>
                                <span style="font-weight: bold; font-size:16px; padding-left:10px">{{ @$get_member->Name }}</span>
                                <input type="hidden" name="member_name" value="{{ @$get_member->Name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="memberId">Member Category:</label>
                                <span style="font-weight: bold; font-size:16px; padding-left:10px">{{ @$get_member->Catagory }}</span>
                                <input type="hidden" name="member_category" value="{{ @$get_member->Catagory }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="memberId">Member Address:</label>
                                <span style="font-weight: bold; font-size:10px; padding-left:10px">{{ @$get_member->Address }}</span>
                                <input type="hidden" name="member_address" value="{{ @$get_member->Address }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="memberId">Member Email:</label>
                                <span style="font-weight: bold; font-size:16px; padding-left:10px">{{ @$get_member->Email }}</span>
                                <input type="hidden" name="member_email" value="{{ @$get_member->Email }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="memberId">Member Phone:</label>
                                <span style="font-weight: bold; font-size:16px; padding-left:10px">{{ @$get_member->MobileNo }}</span>
                                <input type="hidden" name="member_phone" value="{{ @$get_member->MobileNo }}">
                            </div>
                        </div>
                        <div class="row col-md-4 col-sm-12  mt-4 ml-4 text-center">
                            <div class="form-group col-md-12">
                                <label for="memberId">Member Photo:</label>
                                <img  src="{{ @$get_member->APhoto ? url('https://erp.mirpurclubltd.com/Photo/'.$get_member->APhoto) : url('/image/no-image.png') }}" alt="" style="width: 147px;height:127px; padding-left:10px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-4 ">
        <div class="container-fluid">
            <div class="card col-md-12">
                <form action="#">
                    <div class="row">
                        <div class="card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Take Order</h6>
                            </div>
                            <div class="table-responsive add_item">
                            <table class="table align-items-center table-flush table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                    <th>Buying Price</th>
                                    <th>Selling Price</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
{{--                                        <td>--}}
{{--                                            <select class="form-control" id="category" name="category_id[]">--}}
{{--                                                <option value="">--Select--</option>--}}
{{--                                                @foreach ( $get_category as $category)--}}
{{--                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <select class="form-control product" name="product_id[]">--}}
{{--                                                <option value="">--Select--</option>--}}
{{--                                                @foreach ( $get_product as $product)--}}
{{--                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <select class="form-control" id="Brand" name="brand_id[]">--}}
{{--                                                <option value="">--Select--</option>--}}
{{--                                                @foreach ( $get_brand as $brand)--}}
{{--                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>--}}
{{--                                                @endforeach--}}

{{--                                            </select>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <input type="text" class="form-control" name="quantity[]"  style="width:70px">--}}
{{--                                        </td>--}}
{{--                                        <td><input type="text" class="form-control result1" name="buying_price[]" value="" readonly></td>--}}
{{--                                        <td><input type="text" class="form-control result2" name="selling_price[]" value="" readonly></td>--}}
{{--                                        <td><input type="text" class="form-control" name="sub_total[]" value="" readonly></td>--}}
{{--                                        <td style="width:100px">--}}
{{--                                            <span id="addRow" style="display: none" class="btn btn-success addeventmore" title="Add More"><i class="fa fa-plus-circle"></i></span>--}}
{{--                                        </td>--}}
                                        <span id="addRow" style="display: none" class="btn btn-success addeventmore" title="Add More"><i class="fa fa-plus-circle"></i></span>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-4 mx-0 shadow">
                        <div class="container">
                            <div class="form-row mt-4">
                                <div class="form-group col-md-4">
                                    <label for="paymentMethod"><b>Payment Method</b></label>
                                    <select class="form-control" id="paymentMethod" name="payment_method">
                                        <option>--Select--</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Nagad">Nagad</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Hand Cash">Hand Cash</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="deliveryCharge"><b>Delivery Charge</b></label>
                                    <input type="text" class="form-control" id="deliveryCharge" name="delivery_charge">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="viaCharge"><b>Bkash/Nagad Charge</b></label>
                                    <input type="text" class="form-control" id="viaCharge" name="pay_charge">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="overheadCost"><b>Overhead Cost</b></label>
                                    <input type="text" class="form-control" id="overheadCost"  disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="total"><b>Total</b></label>
                                    <input type="text" class="form-control" id="total" name="total"  readonly>
                                </div>
                                {{--  <div class="form-group col-md-4">
                                    <label for="email"><b>Email</b></label>
                                    <input type="text" class="form-control" id="email">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="whatsapp"><b>Whatsapp</b></label>
                                    <input type="text" class="form-control" id="whatsapp">
                                </div>  --}}
                                <div class="form-group col-md-4">
                                    <label for="date"><b>Date</b></label>
                                    <input type="text" class="form-control" name="date" value="{{ date('d-M-Y ') }}" id="date" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="preparedBy"><b>Prepared By</b></label>
                                    <input type="text" class="form-control" id="preparedBy" name="prepared_by" value="{{ Auth::user()->name }}" readonly>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea1"><b><b>Comments</b></label>
                                    <textarea class="form-control" name="comments" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</form>



{{-- for extra field --}}

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <table class="table align-items-center table-flush table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <select class="form-control" id="category" name="category_id[]">
                                    <option value="">--Select--</option>
                                    @foreach ( $get_category as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control product1" name="product_id[]">
                                    <option value="">--Select--</option>
                                    @foreach ( $get_product as $product)
                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" id="Brand" name="brand_id[]">
                                    <option value="">--Select--</option>
                                    @foreach ( $get_brand as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach

                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="quantity[]" style="width:70px">
                            </td>
                            <td class="result3"><input type="text" class="form-control" name="buying_price[]" value="" readonly></td>
                            <td class="result4"><input type="text" class="form-control" name="selling_price[]" value="" readonly></td>
                            <td><input type="text" class="form-control" name="sub_total[]" value="" readonly></td>
                            <td style="width:120px">
                                <span class="btn btn-success btn-sm addeventmore" title="Add More"><i class="fa fa-plus-circle"></i></span>
                                <span class="btn btn-danger btn-sm removeeventmore" title="Remove"><i class="fa fa-minus-circle"></i></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

{{-- for extra field js--}}
@section('main-script')
<script>
    $(document).ready(function(){
    var counter = 0;
    $(document).on('click','.addeventmore',function()
    {
        // var whole_extra_item_add = $('#whole_extra_item_add').html();
        $(this).closest('.add_item').append('<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add"><div class="form-row"><table class="table align-items-center table-flush table-hover"><tbody><tr><td><select class="form-control" id="category" name="category_id[]"><option value="">--Select--</option>@foreach ( $get_category as $category)<option value="{{ $category->id }}">{{ $category->category_name }}</option>@endforeach</select></td><td><select class="form-control product1" data-id="'+counter+'" name="product_id[]"><option value="">--Select--</option>@foreach ( $get_product as $product)<option value="{{ $product->id }}">{{ $product->product_name }}</option>@endforeach</select></td><td><select class="form-control" id="Brand" name="brand_id[]"><option value="">--Select--</option>@foreach ( $get_brand as $brand)<option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>@endforeach</select></td><td><input data-id="'+counter+'" id="prod1_input1_'+counter+'" type="text" class="form-control qty" name="quantity[]" style="width:70px"></td><td class="result3"><input id="prod1_input2_'+counter+'" type="text" class="form-control" name="buying_price[]" value="" readonly></td><td class="result4"><input id="prod1_input3_'+counter+'" type="text" class="form-control" name="selling_price[]" value="" readonly></td><td><input id="prod1_input4_'+counter+'" type="text" class="form-control sub_total" name="sub_total[]" value="" readonly></td><td style="width:120px"><span class="btn btn-success btn-sm addeventmore" title="Add More"><i class="fa fa-plus-circle"></i></span><span class="btn btn-danger btn-sm removeeventmore" title="Remove"><i class="fa fa-minus-circle"></i></span></td></tr></tbody></table></div></div>');

        $('.product1').change(function(){
      if($(this).val() != ''){
        var id= $(this).val();
        var dataId = $(this).data('id');
        var url = "{{ url('bein-requisition-price')}}";
        var priceUrl = url+"/"+id;
       $.ajax({
        method:"get",
        url:priceUrl,

        data:{
				_token:'{{ csrf_token() }}'
			},
        success:function(result)
        {
            // $('.result3>input').val(result.buying_price);
            // $('.result4>input').val(result.selling_price);
            // $(this).find('input[id = prod1_input1_'+dataId+']').val(result.buying_price);
            // $(this).find('input[id = prod1_input2_'+dataId+']').val(result.buying_price);
            $("#prod1_input2_"+dataId).val(result.buying_price);
            $("#prod1_input3_"+dataId).val(result.selling_price);

        }

       })
      }
     });
        counter++;

        $(".qty").keyup(function (){
            var qtyId = $(this).data('id');
            $("#prod1_input4_"+qtyId).val(parseFloat($("#prod1_input3_"+qtyId).val())*parseFloat($(this).val()));
            total();
        });

    });
        $(document).on('click','.removeeventmore',function(event)
    {
        $(this).closest('.delete_whole_extra_item_add').remove();
        counter -= 1;
    });


    });
    function total(){
        var nullChk= 0;
        var sum=0;
        $(".sub_total").each(function (){
            if($(this).val() != "" && $(this).val() != null && $(this).val() != undefined){
                sum+=parseFloat($(this).val());
            }else{
                sum+=parseFloat(nullChk);
            }
        });
        // console.log(sum);
        $("#total").val(sum);

    }
</script>
<script>
    {{--$(document).ready(function(){--}}

    {{-- $('.product').change(function(){--}}
    {{--  if($(this).val() != '')--}}
    {{--  {--}}
    {{--   var id= $(this).val();--}}
    {{--    var url = "{{ url('bein-requisition-price')}}";--}}
    {{--    var priceUrl = url+"/"+id;--}}
    {{--   $.ajax({--}}
    {{--    method:"get",--}}
    {{--    url:priceUrl,--}}

    {{--    data:{--}}
	{{--			_token:'{{ csrf_token() }}'--}}
	{{--		},--}}
    {{--    success:function(result)--}}
    {{--    {--}}
    {{--        $('.result1').val(result.buying_price);--}}
    {{--        $('.result2').val(result.selling_price);--}}
    {{--        console.log(result);--}}
    {{--    }--}}

    {{--   })--}}
    {{--  }else{--}}
    {{--    $('.result1').val('');--}}
    {{--        $('.result2').val('');--}}
    {{--  }--}}
    {{-- });--}}

    {{--//  $('select[name="product_id[]"]').on("change",(function(){--}}
    {{--// $('.product1').change(function(){--}}
    {{--//   if(('.product1').val() != '')--}}
    {{--//   {--}}
    {{--//    var id= $('.product1').val();--}}
    {{--//     var url = "{{ url('bein-requisition-price')}}";--}}
    {{--//     var priceUrl = url+"/"+id;--}}
    {{--//    $.ajax({--}}
    {{--//     method:"get",--}}
    {{--//     url:priceUrl,--}}
    {{--//     data:{--}}
	{{--// 			_token:'{{ csrf_token() }}'--}}
	{{--// 		},--}}
    {{--//     success:function(result)--}}
    {{--//     {--}}
    {{--//         // $('.result3').val(result.buying_price);--}}
    {{--//         // $('.result4').val(result.selling_price);--}}
    {{--//         // console.log(result);--}}

    {{--//         $(".result3").empty().append("<input type='text' class='form-control' name='selling_price[]' value='"+result.buying_price+"' readonly>")--}}
    {{--//         $(".result4").empty().append("<input type='text' class='form-control' name='selling_price[]' value='"+result.selling_price+"' readonly>")--}}
    {{--//     }--}}

    {{--//    })--}}
    {{--//   }--}}
    {{--//  });--}}


    {{--});--}}
    jQuery(function(){
        jQuery('#addRow').click();
    });
</script>
@endsection
