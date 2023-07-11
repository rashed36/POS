@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Employee Salary</li>
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
                    <h3 class="card-title">
                        Increment Employee Salary
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('employee.salary.view')}}"><i class="fa fa-list"></i> Go Back</a>
                </div>
                <div class="card-body">
                <form method="post" action="{{ route('employee.salary.store',$editData->id) }}" id="myFrom" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="salary"> Present Salary</label>
                            <input type="text" name="" value="{{$editData->salary}}" id="salary"  class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="increment_salary"> Increment Amount <font style="color: red">*</font></label>
                            <input type="text" name="increment_salary" value="" id="increment_salary" placeholder="Enter Increment Salary" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="effected_date"> Effected Date <font style="color: red">*</font></label>
                            <input type="text" name="effected_date" value="" placeholder="Date" id="effected_date" class="form-control datepicker" autocomplete="off">
                        </div>
                       
                        <div class="form-group col-md-1" style="padding-top: 30px;">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
      increment_salary: {
        required: true,
      },
      effected_date: {
        required: true,
      }
    },
    messages: {
      increment_salary: {
        required: "Please Enter Employee Increment Salary Amount ",
      },
      effected_date: {
        required: "Please Enter Employee Increment Salary Date",
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
  