@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
                        Edit Employee
                        @else
                        Add Employee
                        @endif
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('employee.reg.view')}}"><i class="fa fa-list"></i> Go Back</a>
                </div>
                <div class="card-body">
                <form method="post" action="{{(@$editData)?route('employee.reg.update',$editData->id):route('employee.reg.store')}}" id="myFrom" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="employ_name"> Employee Name <font style="color: red">*</font></label>
                            <input type="text" name="employ_name" value="{{@$editData->employ_name}}" id="employ_name" placeholder="Enter Employee Name" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fathers_name"> Father's Name <font style="color: red">*</font></label>
                            <input type="text" name="fathers_name" value="{{@$editData->fathers_name}}" id="fathers_name" placeholder="Enter Fathers Name" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mothers_name"> Mother's Name <font style="color: red">*</font></label>
                            <input type="text" name="mothers_name" value="{{@$editData->mothers_name}}" id="mothers_name" placeholder="Enter Mothers Name" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobile_no"> Mobile No <font style="color: red">*</font></label>
                            <input type="text" name="mobile_no" value="{{@$editData->mobile_no}}" id="mobile_no" placeholder="Enter Mobile Number" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address"> Address <font style="color: red">*</font></label>
                            <input type="text" name="address" value="{{@$editData->address}}" id="address" placeholder="Enter Address" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dob"> Date of Birth <font style="color: red">*</font></label>
                            <input type="text" name="dob" value="{{date(@$editData->dob)}}" placeholder="Date of birth" id="dob" class="form-control datepicker" autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender"> Gender <font style="color: red">*</font></label>
                           <select name="gender" id="gender" class="form-control form-control">
                               <option value="">Select Gender</option>
                               <option value="Male" {{(@$editData->gender=='Male')?'selected':''}}>Male</option>
                               <option value="Female" {{(@$editData->gender=='Female')?'selected':''}}>Female</option>
                           </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="religion"> Religion <font style="color: red">*</font></label>
                           <select name="religion" id="religion" class="form-control form-control">
                               <option value="">Select Religion</option>
                               <option value="Islam" {{(@$editData->religion=='Islam')?'selected':''}}>Islam</option>
                               <option value="Hindu" {{(@$editData->religion=='Hindu')?'selected':''}}>Hindu</option>
                               <option value="Khristan" {{(@$editData->religion=='Khristan')?'selected':''}}>Khristan</option>
                           </select>
                        </div>
                       
                        <div class="form-group col-md-4">
                            <label for="designation"> Designation <font style="color: red">*</font></label>
                           <select name="designation" id="designation" class="form-control form-control">
                               <option value="">Select Designation</option>
                               <option value="Operator" {{(@$editData->designation=='Operator')?'selected':''}}>Operator</option>
                               <option value="Staff" {{(@$editData->designation=='Staff')?'selected':''}}>Staff</option>
                               <option value="Selsman" {{(@$editData->designation=='Selsman')?'selected':''}}>Selsman</option> 
                           </select>
                        </div>
                        @if(!@$editData)
                        <div class="form-group col-md-4">
                            <label for="salary"> Salary <font style="color: red">*</font></label>
                            <input type="text" name="salary" value="{{@$editData->salary}}" id="salary" placeholder="Enter Starting Salary" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="join_date"> Join Date <font style="color: red">*</font></label>
                            <input type="text" name="join_date" value="{{date(@$editData->join_date)}}" placeholder="join date" id="join_date" class="form-control datepicker1" autocomplete="off">
                        </div>
                        @endif
                        <div class="form-group col-md-4">
                            <label for="image"> Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                             <img id="showImage" src="{{(!empty(@$editData->image))?url('public/upload/employee_image/'.@$editData->image):url('upload/no_image.jpg')}}" style="width: 175px;height: 175px; border:1px solid #000;">
                        </div>
                       
                        <div class="form-group col-md-3" style="padding-top: 50px;">
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
      employ_name: {
        required: true,
      },
      fathers_name: {
        required: true,
      },
      mothers_name: {
        required: true,
      },
      mobile_no: {
        required: true,
      },
      address: {
        required: true,
      },
      gender: {
        required: true,
      },
      religion: {
        required: true,
      },
      dob: {
        required: true,
      },
      salary: {
        required: true,
      },
      designation: {
        required: true,
      },
      join_date: {
        required: true,
      }
    },
    messages: {
      employ_name: {
        required: "Please Enter Employee name ",
      },
      fathers_name: {
        required: "Please Enter Employee Fathers name",
      },
      mothers_name: {
        required: "Please Enter Employee Mothers name",
      },
      mobile_no: {
        required: "Please Enter Mobile No ",
      },
      address: {
        required: "Please enter Address",
      },
      gender: {
        required: "Please Select Gender",
      },
      religion: {
        required: "Please Select Religion",
      },
      dob: {
        required: "Please enter Date Of Birth",
      },
      salary: {
        required: "Please enter Sarting Salary",
      },
      designation: {
        required: "Please Select Designation",
      },
      join_date: {
        required: "Please Enter Join Date",
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
  