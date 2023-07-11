@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Cusomer Wise Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Cusomer</li>
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
                    <h3>Select Criteria</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 text-center"> 
                            <strong>Customer wise Due report</strong>
                            <input type="radio" name="customer_wise_report" value="customer_wise_credit" class="search_value">&nbsp;&nbsp;
                            <strong>Customer wise Paid report</strong>
                            <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="show_credit" style="display: none;">
                        <form action="{{route('customers.wise.credit.report')}}" method="GET" id="creditForm" target="_blank">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="">Customer Name</label>
                                    <select name="customer_id" id="customer_id" class="form-control select2 form-control-sm">
                                        <option value="">Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->mobile_no}}-{{$customer->address}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4" style="padding-top: 32px;">
                                    <input type="submit" value="Search" class="btn btn-primary btn-sm" >
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="show_paid" style="display: none;">
                        <form action="{{route('customers.wise.paid.report')}}" method="GET" id="paidForm" target="_blank">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="">Customer Name</label>
                                    <select name="customer_id" id="customer_id" class="form-control select2 form-control-sm">
                                        <option value="">Select Customer</option>
                                        @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->mobile_no}}-{{$customer->address}})</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4" style="padding-top: 32px;">
                                    <input type="submit" value="Search" class="btn btn-primary btn-sm" >
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
  <script>
      $(document).on('change','.search_value',function(){
          var search_value = $(this).val();
          if(search_value == 'customer_wise_credit'){
              $('.show_credit').show();
          }else{
              $('.show_credit').hide();
          }
          if(search_value == 'customer_wise_paid'){
              $('.show_paid').show();
          }else{
              $('.show_paid').hide();
          }
        });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#creditForm').validate({
          ignore:[],
          errorPlacement: function(error, element){
              if (element.attr("name") == "customer_id"){error.insertAfter(element.next()); }
              else{error.insertAfter(element); }
          },
          errorClass:'text-danger',
          validClass:'text-success', 
        rules: {
            customer_id: {
            required: true,
          }
        },
        messages: {
    
        },
      });
    });
    </script>
     <script type="text/javascript">
        $(document).ready(function () {
          $('#paidForm').validate({
              ignore:[],
              errorPlacement: function(error, element){
                  if (element.attr("name") == "customer_id"){error.insertAfter(element.next()); }
                  else{error.insertAfter(element); }
              },
              errorClass:'text-danger',
              validClass:'text-success', 
            rules: {
                customer_id: {
                required: true,
              }
            },
            messages: {
        
            },
          });
        });
        </script>
  @endsection