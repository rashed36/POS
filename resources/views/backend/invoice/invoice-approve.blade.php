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
                    <h3>Invoice No #{{$invoice->invoice_no}} ({{date('d-m-Y',strtotime($invoice->date))}})</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('invoice.add')}}"><i class="fa fa-list"></i> Panding Add Invoice</a>
                </div>
                <div class="card-body">
                  @php
                    $payment = App\model\Payment::where('invoice_id',$invoice->id)->first();
                  @endphp
                  <table width="100%">
                    <tbody>
                      <tr>
                        <td width="15%"><p><strong>Customer Info </strong></p></td>
                        <td width="25%"><p><strong>Name : </strong>{{$payment['customer']['name']}}</p></td>
                        <td width="25%"><p><strong>Mobile No : </strong>{{$payment['customer']['mobile_no']}}</p></td>
                        <td width="35%"><p><strong>Address : </strong>{{$payment['customer']['address']}}</p></td>
                      </tr>
                      <tr>
                        <td width="15%"><p><strong></strong></p></td>
                        <td width="85%" colspan="3"><p><strong>Description : </strong>{{$invoice->description}}</p></td>
                      </tr>
                    </tbody>
                  </table>
                  <form action="{{route('approval.store',$invoice->id)}}" method="post">
                    @csrf
                    <table border="1" width="100%" style="margin-bottom: 10px;">
                      <thead>
                        <tr class="text-center">
                          <th>SL .</th>
                          <th>Category</th>
                          <th>Product Name</th>
                          <th class="text-center" style="background: #ddd; padding: 1px;">Current Stock</th>
                          <th>Quantity</th>
                          <th>Unit Price</th>
                          <th>Total Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $total_sum = '0';
                        @endphp
                        @foreach($invoice['invoice_details'] as $key => $details)
                          <tr class="text-center">
                            <input type="hidden" name="category_id[]" value="{{$details->category_id}}">
                            <input type="hidden" name="product_id[]" value="{{$details->product_id}}">
                            <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{$details->selling_qty}}">
                            <td>{{$key+1}}</td>
                            <td>{{$details['category']['name']}}</td>
                            <td>{{$details['product']['name']}}</td>
                            <td class="text-center" style="background: #ddd; padding: 1px;">{{$details['product']['quantity']}}</td>
                            <td>{{$details->selling_qty}}</td>
                            <td>{{$details->unit_price}}</td>
                            <td>{{$details->selling_price}}</td>
                          </tr>
                          @php
                            $total_sum += $details->selling_price;
                          @endphp
                        @endforeach
                        <tr>
                          <td colspan="6" class="text-right"><strong>Sub Total</strong></td>
                          <td class="text-center"><strong>{{$total_sum}}</strong></td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-right">Discount</td>
                          <td class="text-center"><strong>{{$payment->discount_amount}}</strong></td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-right">Paid Amount</td>
                          <td class="text-center"><strong>{{$payment->paid_amount}}</strong></td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-right">Due Amount</td>
                          <td class="text-center"><strong>{{$payment->due_amount}}</strong></td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-right"><strong>Grand Total</strong></td>
                          <td class="text-center"><strong>{{$payment->total_amount}}</strong></td>
                        </tr>
                      </tbody>
                    </table>
                    <button type="submit" class="btn btn-success btn-sm">Invoice Approve</button>
                  </form>
                  
              </div>
            </div>
        </section>
        </div>
      </div>
    </section>
  </div>
 
  @endsection