@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
        <div class="row">
        <section class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Invoice</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('invoice.view')}}"><i class="fa fa-list"></i> Invoice List</a>
                </div>
                <div class="card-body">
                    <div class="form-row">

                      <div class="form-group col-md-1">
                        <label> Invoice No</label>
                        <input type="text" name="invoice_no" id="invoice_no" value="{{ $invoice_no }}" class="form-control form-control-sm" readonly style="background-color: #D8FDBA">
                      </div>
                      
                      <div class="form-group col-md-2">
                          <label> Date</label>
                          <input type="text" name="date" id="date" value="{{ $date }}" class="form-control form-control-sm datepicker" placeholder="YYYY-MM-DD" readonly>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="category_id"> Category Name</label>
                        <select name="category_id" id="category_id" class="form-control form-control-sm select2">
                          <option value="">Select Category</option>
                          @foreach ($category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>

                        <div class="form-group col-md-3">
                          <label for="product_id"> Product Name</label>
                          <select name="product_id" id="product_id" class="form-control form-control-sm select2" style="width: 100%;">
                            <option value="">Select Product</option>
                          </select>
                        </div>

                        <div class="form-group col-md-1">
                          <label for="current_buying_price"> Purchase Price</label>
                          <input type="text" name="current_buying_price" id="current_buying_price" class="form-control form-control-sm" readonly style="background-color: #D8FDBA">
                        </div>

                        <div class="form-group col-md-1">
                          <label for="product_id"> Stock(Pcs/Kg)</label>
                          <input type="text" name="current_stock_qty" id="current_stock_qty" class="form-control form-control-sm" readonly style="background-color: #D8FDBA">
                        </div>

                        <div class="form-group col-md-1" style="padding-top: 30px;">
                            <a class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle"></i> Add</a>
                        </div>
                    </div>
                
                </div>
               
            </div>
            <div class="card">
              <div class="card-body">
                <form method="post" action="{{route('invoice.store')}}" id="myForm">
                  @csrf
                  <table class="table-sm table-bordered" width="100%">
                    <thead>
                      <tr>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th width="7%">Pcs/Kg</th>
                        <th width="10%">Unit Price</th>
                        <th width="17%">Total Price</th>
                        <th width="5%">Action</th>
                      </tr>
                    </thead>
                    <tbody id="addRow" class="addRow">

                    </tbody>
                    <tbody>
                      <tr>
                        <td class="text-right" colspan="4">Discount</td>
                        <td><input type="text" name="discount_amount" id="discount_amount" class="form-control form-control-sm text-right discount_amount" placeholder="Enter Discount Amount"></td>
                      </tr>
                      <tr>
                        <td class="text-right" colspan="4">Grand total</td>
                        <td>
                          <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
                        </td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Write description here"></textarea>
                      </div>
                    
                      <div class="form-group col-md-3">
                        <label for="paid_status"> Paid Status</label>
                        <select name="paid_status" id="paid_status" class="form-control form-control-sm" style="width: 100%;">
                          <font style="color: red">{{($errors->has('paid_status'))?($errors->first('paid_status')):''}}</font>
                          <option value="">Select Status</option>
                          <option value="full_paid">Full Paid</option>
                          <option value="full_due">Full Due</option>
                          <option value="partial_paid">Partial Paid</option>
                        </select>
                        <input type="text" name="paid_amount" id="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                      </div>
                      <div class="form-group col-md-9">
                        <label for="customer_id"> Customer Name</label>
                        <select name="customer_id" id="customer_id" class="form-control form-control-sm select2" style="width: 100%;">
                          <font style="color: red">{{($errors->has('customer_id'))?($errors->first('customer_id')):''}}</font>
                          <option value="">Select Customer</option>
                          @foreach ($customer as $customer)
                          <option value="{{$customer->id}}">{{$customer->name}}({{$customer->mobile_no}} - {{$customer->address}})</option>
                          @endforeach
                          <option value="0">New Customer</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row new_customer" style="display: none;">
                      <div class="form-group col-md-4">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Coustomer Name" class="form-control">
                        <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="text" name="mobile_no" value="{{ old('mobile_no') }}" placeholder="Enter Mobile Number" class="form-control">
                        <font style="color: red">{{($errors->has('mobile_no'))?($errors->first('mobile_no')):''}}</font>
                      </div>
                      <div class="form-group col-md-4">
                        <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Enter address" class="form-control">
                        <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                      </div>
                    </div>
                    <div class="from-group" style="padding-top: 30px;">
                      <button type="submit" class="btn btn-primary" id="storeButton">Invoice Store</button>
                    </div>
                </form>
              </div>
            </div>
        </section>
         
        </div>
      </div>
    </section>
  </div>
  <script id="document-template" type="text/x-handlebers-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
      <input type="hidden" name="date" value="@{{date}}">
      <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
      <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{category_name}}
      </td>
      <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{product_name}}
      </td>
      <td>
        <input type="number" min="1" id="selling_qty" class="form-control form-control-sm text-right selling_qty" name="selling_qty[]" value="1">
        
      </td>
      <td>
        <input type="number" id="unit_price" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="1">
        
      </td>
      <td>
        <input class="form-control form-control-sm text-right selling_price" name="selling_price[]" value="0" readonly>
        
      </td>
      <td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>
    </tr>
    
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#myFrom').validate({
        rules: {
          paid_status: {
            required: true,
          },
          customer_id: {
            required: true,
          }
        },
        messages: {

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on("click",".addeventmore",function (){
        var date = $('#date').val();
        var invoice_no = $('#invoice_no').val();
        var category_id = $('#category_id').val();
        var category_name = $('#category_id').find('option:selected').text();
        var product_id = $('#product_id').val();
        var product_name = $('#product_id').find('option:selected').text();

        if(date==''){
          $.notify("Date is required", {globalPosition: 'top right',className: 'error'});
          return false;
        }
        if(category_id==''){
          $.notify("Category is required", {globalPosition: 'top right',className: 'error'});
          return false;
        }
        if(product_id==''){
          $.notify("Product is required", {globalPosition: 'top right',className: 'error'});
          return false;
        }

        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var data = {
                    date:date,
                    invoice_no:invoice_no,
                    category_id:category_id,
                    category_name:category_name,
                    product_id:product_id,
                    product_name:product_name
        };
        var html = template(data);
        $("#addRow").append(html);
      });

      $(document).on("click",".removeeventmore", function (event) {
        $(this).closest(".delete_add_more_item").remove();
        totalAmountPrice();
      });

      $(document).on('keyup click','.unit_price,.selling_qty',function(){
        var unit_price = $(this).closest("tr").find("input.unit_price").val();
        var qty = $(this).closest("tr").find("input.selling_qty").val();
        var total = unit_price * qty;
        $(this).closest("tr").find("input.selling_price").val(total);
        $('#discount_amount').trigger('keyup');
      });

      $(document).on('keyup','#discount_amount',function(){
        totalAmountPrice();
      });

      function totalAmountPrice(){
        var sum=0;
        $(".selling_price").each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length != 0) {
            sum += parseFloat(value);
          }
        });
        var discount_amount = parseFloat($('#discount_amount').val());
        if(!isNaN(discount_amount) && discount_amount.length != 0) {
          sum -= parseFloat(discount_amount);
        }
        $('#estimated_amount').val(sum);
      }
    });

  </script>

  <script type="text/javascript">
    $(function(){
      $(document).on('change','#category_id',function(){
        var category_id = $(this).val();
        $.ajax({
          url:"{{route('get-product')}}",
          type:"GET",
          data:{category_id:category_id},
          success:function(data){
            var html = '<option value="">Select Product</option>';
            $.each(data,function(key,v){
              html +='<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#product_id').html(html);
          }
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(function(){
      $(document).on('change','#product_id',function(){
        var product_id = $(this).val();
        $.ajax({
          url:"{{route('check-product-stock')}}",
          type:"GET",
          data:{product_id:product_id},
          success:function(data){
            $('#current_stock_qty').val(data);
          }
        });
      });
    });
  </script>
  <script type="text/javascript">
    $(function(){
      $(document).on('change','#product_id',function(){
        var product_id = $(this).val();
        $.ajax({
          url:"{{route('check-product-parchase')}}",
          type:"GET",
          data:{product_id:product_id},
          success:function(data){
            $('#current_buying_price').val(data);
          }
        });
      });
    });
  </script>
  <script type="text/javascript">
    $(document).on('change','#paid_status',function(){
      var paid_status = $(this).val();
      if(paid_status == 'partial_paid'){
        $('.paid_amount').show();
      }else{
        $('.paid_amount').hide();
      }
    });
  </script>
  <script type="text/javascript">
    $(document).on('change','#customer_id',function(){
      var customer_id = $(this).val();
      if(customer_id == '0'){
        $('.new_customer').show();
      }else{
        $('.new_customer').hide();
      }
    });
  </script>


 
  @endsection