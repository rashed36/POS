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
                     Employee Salary Details
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('employee.salary.view')}}"><i class="fa fa-list"></i> Go Back</a>
                </div>
                <div class="card-body">
                    <strong>Employee Name: </strong>{{$detils->employ_name}}
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SL.</th>
                          <th>Previous Salary</th>
                          <th>Increment Salary</th>
                          <th>Present Salary</th>
                          <th>Effected Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($salary_log as $key => $data)
                        <tr>
                          @if($key=="0")
                          <td class="text-center" colspan="5"><strong>Joining Salary : </strong>{{$data->previous_salary}} Tk</td>
                          @else
                          <td>{{$key+1}}</td>
                          <td>{{$data->previous_salary}} Tk</td>
                          <td>{{$data->increment_salary}} Tk</td>
                          <td>{{$data->present_salary}} Tk</td>
                          <td>{{date('d-m-Y',strtotime($data->effected_date))}}</td>
                          @endif
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
              </div>
            </div>
        </section>
         
        </div>
      </div>
    </section>
  </div>

  @endsection
  