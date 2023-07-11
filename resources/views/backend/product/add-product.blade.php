@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Product</h1>
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
                    <h3>Add Product</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('products.view')}}"><i class="fa fa-list"></i> Product List</a>
                </div>
                <div class="card-body">
                <form method="post" action="{{ route('products.store')}}" id="myFrom">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="supplier_id"> Supplier Name</label>
                            <select name="supplier_id" id="supplier_id" class="form-control">
                              <option value="">Select Supplier</option>
                              @foreach ($supplier as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                              @endforeach
                            </select>
                            <font style="color: red">{{($errors->has('supplier_id'))?($errors->first('supplier_id')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="category_id"> Category Name</label>
                          <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($category as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                          <font style="color: red">{{($errors->has('category_id'))?($errors->first('category_id')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="name"> Product Name</label>
                          <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Category Name" class="form-control">
                          <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="unit_id"> Unit Name</label>
                          <select name="unit_id" id="unit_id" class="form-control">
                            <option value="">Select Unit</option>
                            @foreach ($unit as $unit)
                              <option value="{{$unit->id}}">{{$unit->name}}</option>
                            @endforeach
                          </select>
                          <font style="color: red">{{($errors->has('unit_id'))?($errors->first('unit_id')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" value="Submit" class="btn btn-primary" >
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </section>
         
        </div>
      </div>
    </section>
  </div>

  <script type="text/javascript">
$(document).ready(function () {
  $('#myFrom').validate({
    rules: {
      supplier_id: {
        required: true,
      },
      category_id: {
        required: true,
      },
      unit_id: {
        required: true,
      },
      name: {
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
 
  @endsection