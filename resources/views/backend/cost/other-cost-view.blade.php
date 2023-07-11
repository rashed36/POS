@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Cost</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Others Cost</li>
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
                    <h3>Others Cost List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('account.cost.add')}}"><i class="fa fa-plus-circle"></i> Add Others Cost</a>
                </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($allData as $key => $data)
                  <tr class="{{$data->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{date('d-m-Y',strtotime($data->date))}}</td>
                    <td>{{$data->amount}}</td>
                    <td>{{$data->description}}</td>
                    <td>
                        <img src="{{(!empty($data->image))?url('public/upload/cost_image/'.$data->image):url('upload/no_image.jpg')}}"alt="data Cost picture" width="90px" height="60px">
                    </td>
                    <td>
                        <a title="Edit"  class="btn btn-sm btn-primary" href="{{ route('account.cost.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SL.</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Image</th>
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