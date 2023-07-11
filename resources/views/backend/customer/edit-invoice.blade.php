@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Credit Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Coustomer</li>
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
                    <h3>Edit Invoice No. #{{$payment['invoice']['invoice_no']}}</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{route('customers.credit')}}"><i class="fa fa-list"></i> Credit Customer List</a>
                </div>
                <div class="card-body">

                    @php
                    $payment = App\model\Payment::where('invoice_id',$payment->invoice_id)->first();
                  @endphp
                  <table width="100%"> 
                      <tr>
                          <td colspan="3"><strong>Customer Info</strong></td>
                      </tr>
                    <tr>
                      <td width="25%"><b>Customer Name : </b>{{$payment['customer']['name']}}</td>
                      <td width="25%"><b>Mobile No : </b>{{$payment['customer']['mobile_no']}}</td>
                      <td width="35%"><b>Address : </b>{{$payment['customer']['address']}}</td>
                    </tr>
                  </table>
                  <br>
                    <form method="post" action="{{route('customers.update.invoice',$payment->invoice_id)}}" id="myFrom">
                        @csrf
                        <table width="100%" class="table table-bordered" id="customers">
                            <thead >
                            <tr style="background: #328FF8;">
                                <th>Items</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total_sum = '0';
                                $invoice_details = App\Model\InvoiceDetails::where('invoice_id',$payment->invoice_id)->get()
                            @endphp
                            @foreach($invoice_details as $key => $details)
                                <tr>
                                <td>ITEM {{$key+1}}</td>
                                <td width="40%">{{$details['product']['name']}}</td>
                                <td>{{$details->selling_qty}}</td>
                                <td width="15%">{{$details->unit_price}}</td>
                                <td>{{$details->selling_price}}</td>
                                </tr>
                                @php
                                $total_sum += $details->selling_price;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="4" style="text-align: right;"><b>Sub Total</b></td>
                                <td><strong>{{$total_sum}}tk</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;">Discount</td>
                                <td>{{$payment->discount_amount}}tk</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;">Paid Amount</td>
                                <td>{{$payment->paid_amount}}tk</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;">Due Amount</td>
                                <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
                                <td>{{$payment->due_amount}}tk</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;"><b>Grand Total</b></td>
                                <td><strong>{{$payment->total_amount}}tk</strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="paid_status"> Paid Status</label>
                                <select name="paid_status" id="paid_status" class="form-control form-control-sm" style="width: 100%;">
                                <option value="">Select Status</option>
                                <option value="full_paid">Full Paid</option>
                                <option value="partial_paid">Partial Paid</option>
                                </select>
                                <input type="text" name="paid_amount" id="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                            </div>

                            <div class="form-group col-md-3">
                                <label> Date</label>
                                <input type="text" name="date" id="date" class="form-control form-control-sm datepicker" placeholder="YYYY-MM-DD" readonly>
                            </div>
                            <div class="form-group col-md-3" style="padding-top: 32px;">
                                <input type="submit" value="Invoice Update" class="btn btn-primary btn-sm">
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </section>    
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript">
    $(document).on('change','#paid_status',function(){
      var paid_status = $(this).val();
      if(paid_status == 'partial_paid'){
        $('.paid_amount').show();
      }else{
        $('.paid_amount').hide();
      }
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#myFrom').validate({
        rules: {
            paid_status: {
            required: true,
          },
          date: {
            required: true,
          }
        },
        messages: {

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
 
  @endsection