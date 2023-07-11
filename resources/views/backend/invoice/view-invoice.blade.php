@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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
                    <h3>Invoice List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('invoice.add')}}"><i class="fa fa-plus-circle"></i> Add Invoice</a>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Customer Name</th>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th style="width: 12%">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($allData as $key => $invoice)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>
                          {{$invoice['payment']['customer']['name']}} 
                          ({{$invoice['payment']['customer']['mobile_no']}}-
                          {{$invoice['payment']['customer']['address']}})
                        </td>
                        <td>Invoice No: #{{$invoice->invoice_no}}</td>
                        <td>{{date('Y-m-d',strtotime($invoice->date))}}</td>
                        <td>{{$invoice->description}}</td>
                        <td>{{$invoice['payment']['total_amount']}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SL.</th>
                        <th>Customer Name</th>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th style="width: 12%">Amount</th>
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