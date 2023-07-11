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
                    <h3>Employee List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('employee.reg.add')}}"><i class="fa fa-plus-circle"></i> Add Employee</a>
                </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Join Date</th>
                    <th>Salary</th>
                    <th>Designation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($allData as $key => $data)
                  <tr class="{{$data->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{$data->employ_name}}</td>
                    <td>{{$data->mobile_no}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{date('d-m-Y',strtotime($data->join_date))}}</td>
                    <td>{{$data->salary}}</td>
                    <td>{{$data->designation}}</td>
                    <td>
                        <a title="Edit"  class="btn btn-sm btn-primary" href="{{ route('employee.reg.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                        <a title="View"  class="btn btn-sm btn-success" href="{{ route('employee.reg.single.view',$data->id)}}"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Join Date</th>
                    <th>Salary</th>
                    <th>Designation</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
        </section>    
        </div>
      </div>
    </section>
  </div>
 
  @endsection