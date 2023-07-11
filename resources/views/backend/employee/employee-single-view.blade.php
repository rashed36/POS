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
                <section class="col-md-4 offset-md-4">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{(!empty($editData->image))?url('public/upload/employee_image/'.$editData->image):url('upload/no_image.jpg')}}"
                                    alt="User profile picture">
                            </div>
            
                            <h3 class="profile-username text-center">{{$editData->employ_name}}</h3>
            
                            <p class="text-muted text-center">{{$editData->designation}}</p>
            
                           <table width="100%" class="table table-bordered">
                               <tbody>
                                   <tr>
                                       <td>Father's Name</td>
                                       <td>{{$editData->fathers_name}}</td>
                                   </tr>
                                   <tr>
                                        <td>Mother's Name</td>
                                        <td>{{$editData->mothers_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile No</td>
                                        <td>{{$editData->mobile_no}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{$editData->address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{$editData->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td>{{$editData->religion}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>{{$editData->dob}}</td>
                                    </tr>
                                    <tr>
                                        <td>Join Date</td>
                                        <td>{{$editData->join_date}}</td>
                                    </tr>
                                    <tr>
                                        <td>Salary</td>
                                        <td>{{$editData->salary}} Tk</td>
                                    </tr>

                               </tbody>
                           </table>
                           <br>
                            <a href="{{ route('employee.reg.view')}}" class="btn btn-primary btn-block"><b>Back</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                </section>
          </div>
        </div>
      </section>
  </div>
 
  @endsection