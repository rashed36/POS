@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Purchase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
                    <h3>Purchase List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('purchase.add')}}"><i class="fa fa-plus-circle"></i> Add Purchase</a>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Purchase No</th>
                        <th>Date</th>
                        <th>Supplier Name</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Buying Price</th>
                        <th>Status</th>
                        <th style="width: 12%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($allData as $key => $purchase)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$purchase->purchase_no}}</td>
                        <td>{{date('d-m-Y',strtotime($purchase->date))}}</td>
                        <td>{{$purchase['supplier']['name']}}</td>
                        <td>{{$purchase['category']['name']}}</td>
                        <td>{{$purchase['product']['name']}}</td>
                        <td>{{$purchase->description}}</td>
                        <td>
                          {{$purchase->buying_qty}}
                          {{$purchase['product']['unit']['name']}}
                        </td>
                        <td>{{$purchase->unit_price}}</td>
                        <td>{{$purchase->buying_price}}</td>
                        <td>
                          @if ($purchase->status=='0')
                          <button type="button" class="btn btn-warning btn-sm">Pending</button>
                          @elseif($purchase->status=='1')
                          <button type="button" class="btn btn-success btn-sm">Approved</button>
                          @endif
                        </td>
                        <td>
                          @if ($purchase->status=='0')
                            <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('purchase.delete',$purchase->id)}}"><i class="fa fa-trash"></i></a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SL.</th>
                        <th>Purchase No</th>
                        <th>Date</th>
                        <th>Supplier Name</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Buying Price</th>
                        <th>Status</th>
                        <th style="width: 12%">Action</th>
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