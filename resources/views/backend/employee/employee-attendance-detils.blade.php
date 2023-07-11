@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
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
                     Employee Attendance Detils
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('employee.attend.view')}}"><i class="fa fa-list"></i> Go Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SL.</th>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Attend Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($detils as $key => $data)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$data['employee']['employ_name']}} </td>
                          <td>{{date('d-m-Y',strtotime($data->date))}}</td>
                          <td>{{$data->attend_status}}</td>
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
  