@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Paid Coustomer List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Paid Coustomer</li>
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
                    <h3>Paid Coustomer List</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('customers.paid.pdf')}}" target="_blank"><i class="fa fa-download"></i> Download Pdf</a>
                </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Customer Name</th>
                    <th>Invoice No</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $total_sum = '0';
                    @endphp
                  @foreach ($allData as $key => $payment)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$payment['customer']['name']}}({{$payment['customer']['mobile_no']}}-{{$payment['customer']['address']}})</td>
                    <td>Invoice No #{{$payment['invoice']['invoice_no']}}</td>
                    <td>{{date('d-m-Y',strtotime($payment['invoice']['date']))}}</td>
                    <td>{{$payment->paid_amount}}</td>
                    <td>
                        <a title="Details"  class="btn btn-sm btn-success" href="{{ route('invoice.details.pdf',$payment->invoice_id)}}" target="_blank"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                    @php
                        $total_sum += $payment->paid_amount;
                    @endphp
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th colspan="4" style="text-align: right;"><b>Grand Total</b></th>
                    <th><b>{{$total_sum}}tk</b></th>
                    <th></th>
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