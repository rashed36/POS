@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Coustomer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Coustomer</li>
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
                    <h3>Add Coustomer</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('customers.view')}}"><i class="fa fa-list"></i> Coustomer List</a>
                </div>
                <div class="card-body">
                <form method="post" action="{{ route('customers.store')}}" id="myFrom">
                    @csrf
                    <div class="form-row">
                         <div class="form-group col-md-6">
                            <label for="name"> Customer Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Coustomer Name" class="form-control">
                            <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_no"> Mobile No</label>
                            <input type="text" name="mobile_no" value="{{ old('mobile_no') }}" placeholder="Enter Mobile Number" class="form-control">
                            <font style="color: red">{{($errors->has('mobile_no'))?($errors->first('mobile_no')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email"> Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="abc@gmail.com" class="form-control">
                             <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address"> Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Enter address" class="form-control">
                            <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" value="Submit" class="btn btn-primary">
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
      name: {
        required: true,
      },
      mobile_no: {
        required: true,
      },
      address: {
        required: true,
      }
    },
    messages: {
      name: {
        required: "Please enter Coustomer name ",
      },
      mobile_no: {
        required: "Please enter a mobile number",
      },
      address: {
        required: "Please enter Address",
      }
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