@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                    <h3>Category List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('categories.add')}}"><i class="fa fa-plus-circle"></i> Add Category</a>
                </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($allData as $key => $categories)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$categories->name}}</td>
                    @php
                      $count_category = App\Model\Product::where('category_id',$categories->id)->count();
                    @endphp
                    <td>
                        <a title="Edit"  class="btn btn-sm btn-primary" href="{{ route('categories.edit',$categories->id)}}"><i class="fa fa-edit"></i></a>
                        @if ($count_category<1)
                          <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('categories.delete',$categories->id)}}"><i class="fa fa-trash"></i></a>
                        @endif
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>SL.</th>
                    <th>Category Name</th>
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