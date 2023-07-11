@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Unit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Unit</li>
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
                    <h3>Edit Unit</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('units.view')}}"><i class="fa fa-list"></i> Unit List</a>
                </div>
                <div class="card-body">
                <form method="post" action="{{ route('units.update',$editData->id)}}" id="myFrom">
                    @csrf
                    <div class="form-row">
                         <div class="form-group col-md-6">
                            <label for="name"> Unit Name</label>
                            <input type="text" name="name" value="{{$editData->name}}" placeholder="Enter Unit Name" class="form-control">
                            <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>
                        <div class="form-group col-md-6" style="padding-top: 30px;">
                          <input type="submit" value="Update" class="btn btn-primary" >
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
      }
    },
    messages: {
      name: {
        required: "Please enter Unit name ",
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