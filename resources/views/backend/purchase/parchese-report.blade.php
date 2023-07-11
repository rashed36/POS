@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Purchase Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Purchase Report</li>
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
                      <h3>Purchase Report</h3>
                  </div>
                  <div class="card-body">
                  <form method="GET" action="{{ route('purchase.report.pdf')}}" target="_blank" id="myFrom">
                      <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="start_date"> Start Date</label>
                              <input type="text" name="start_date" id="start_date"  placeholder="YYYY-MM-DD" class="form-control datepicker form-control-sm">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="end_date"> End Date</label>
                            <input type="text" name="end_date" id="end_date"  placeholder="YYYY-MM-DD" class="form-control datepicker1 form-control-sm">
                        </div>
                          <div class="form-group col-md-4" style="padding-top: 32px;">
                              <input type="submit" value="Search" class="btn btn-primary btn-sm" >
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
        start_date: {
          required: true,
        },
        end_date: {
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