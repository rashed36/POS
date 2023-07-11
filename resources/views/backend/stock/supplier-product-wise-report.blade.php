@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Supplier/Product Wise Stock</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                    <h3>Select Criteria</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 text-center"> 
                            <strong>Supplier wise report</strong>
                            <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value">&nbsp;&nbsp;
                            <strong>Product wise report</strong>
                            <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value">&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="show_supplier" style="display: none;">
                        <form action="{{route('supplier.product.wise.pdf')}}" method="GET" id="supplierWiseForm" target="_blank">
                            <div class="form-row">
                                <div class="col-sm-8">
                                    <label for="">Supplier Name</label>
                                    <select name="supplier_id" id="supplier_id" class="form-control select2 form-control-sm">
                                        <option value="">Select Supplier</option>
                                        @foreach ($supplier as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4" style="padding-top: 32px;">
                                    <input type="submit" value="Search" class="btn btn-primary btn-sm" >
                                    {{-- <button type="submit" class="btn btn-primary btn-sm">Search</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="show_product" style="display: none;">
                        <form action="{{route('product.wise.pdf')}}" method="GET" id="productWiseForm" target="_blank">
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <label for="category_id"> Category Name</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm select2">
                                    <option value="">Select Category</option>
                                    @foreach ($category as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                    <div class="col-sm-6">
                                    <label for="product_id"> Product Name</label>
                                    <select name="product_id" id="product_id" class="form-control form-control-sm select2" style="width: 100%;">
                                        <option value="">Select Product</option>
                                    </select>
                                    </div>
            
                                    <div class="col-sm-2" style="padding-top: 32px;">
                                        <input type="submit" value="Search" class="btn btn-primary btn-sm" >
                                        {{-- <button type="submit" class="btn btn-primary btn-sm">Search</button> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
              </div>
            </div>
        </section>
        </div>
      </div>
    </section>
  </div>
  <script>
      $(document).on('change','.search_value',function(){
          var search_value = $(this).val();
          if(search_value == 'supplier_wise'){
              $('.show_supplier').show();
          }else{
              $('.show_supplier').hide();
          }
          if(search_value == 'product_wise'){
              $('.show_product').show();
          }else{
              $('.show_product').hide();
          }
        });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#supplierWiseForm').validate({
          ignore:[],
          errorPlacement: function(error, element){
              if (element.attr("name") == "supplier_id"){error.insertAfter(element.next()); }
              else{error.insertAfter(element); }
          },
          errorClass:'text-danger',
          validClass:'text-success', 
        rules: {
            supplier_id: {
            required: true,
          }
        },
        messages: {
    
        },
      });
    });
    </script>
     <script type="text/javascript">
        $(document).ready(function () {
          $('#productWiseForm').validate({
              ignore:[],
              errorPlacement: function(error, element){
                  if (element.attr("name") == "category_id"){error.insertAfter(element.next()); }
                  else if (element.attr("name") == "product_id"){error.insertAfter(element.next()); }
                  else{error.insertAfter(element); }
              },
              errorClass:'text-danger',
              validClass:'text-success', 
            rules: {
                category_id: {
                required: true,
              },
              product_id: {
                required: true,
              }
            },
            messages: {
        
            },
          });
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
 
  @endsection