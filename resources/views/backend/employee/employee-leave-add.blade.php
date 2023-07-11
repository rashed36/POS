@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Employee Leave</li>
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
                        @if(isset($editData))
                        Edit Employee Leave
                        @else
                        Add Employee Leave
                        @endif
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('employee.leave.view')}}"><i class="fa fa-list"></i> Go Back</a>
                </div>
                <div class="card-body">
                <form method="post" action="{{(@$editData)?route('employee.leave.update',$editData->id):route('employee.leave.store')}}" id="myFrom" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="employee_id"> Employee Name <font style="color: red">*</font></label>
                           <select name="employee_id" id="employee_id" class="form-control form-control">
                               <option value="">Select Employee Name</option>
                               @foreach ($employees as $employee)
                                <option value="{{$employee->id}}" {{(@$editData->employee_id==$employee->id)?'selected':''}}>{{$employee->employ_name}}</option>  
                               @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="start_date"> Start Date <font style="color: red">*</font></label>
                            <input type="text" name="start_date" value="{{date(@$editData->start_date)}}" placeholder="Start date" id="start_date" class="form-control datepicker" autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="end_date"> End Date <font style="color: red">*</font></label>
                            <input type="text" name="end_date" value="{{date(@$editData->end_date)}}" placeholder="End date" id="end_date" class="form-control datepicker1" autocomplete="off">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="leave_purpose_id"> Leave Purpose <font style="color: red">*</font></label>
                           <select name="leave_purpose_id" id="leave_purpose_id" class="form-control form-control">
                               <option value="">Select Employee Name</option>
                               @foreach ($leave_purpose as $leave)
                                <option value="{{$leave->id}}" {{(@$editData->leave_purpose_id==$leave->id)?'selected':''}}>{{$leave->name}}</option>  
                               @endforeach
                               <option value="0">New purpose</option>
                           </select>
                           <input type="text" name="name" class="form-control from-control" placeholder="Write Purpose" id="add_others" style="display: none">
                        </div>

                        <div class="form-group col-md-3" style="padding-top: 33px;">
                            <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
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
      employee_id: {
        required: true,
      },
      start_date: {
        required: true,
      },
      end_date: {
        required: true,
      },
      leave_purpose_id: {
        required: true,
      }
    },
    messages: {
      employee_id: {
        required: "Please Select Employee ",
      },
      start_date: {
        required: "Please Select Start Date",
      },
      end_date: {
        required: "Please Select End Date",
      },
      leave_purpose_id: {
        required: "Pls Select Purpose",
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

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','#leave_purpose_id',function(){
            var leave_purpose_id = $(this).val();
            if(leave_purpose_id == '0'){
                $('#add_others').show();
            }else{
                $('#add_others').hide();
            }
        })
    })
</script>
 
  @endsection
  