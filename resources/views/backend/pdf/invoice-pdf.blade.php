<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Pdf</title>
    <style>
      #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      
      #customers tr:nth-child(even){background-color: #f2f2f2;}
      
      #customers tr:hover {background-color: #e7f0ff;}
      
      #customers th {
        padding-top: 5px;
        padding-bottom: 5px;
        text-align: left;
        background-color: #328FF8;
        color: white;
      }
      #customers td {
        padding-top: 5px;
        padding-bottom: 5px;
        text-align: left;
      }
      </style>
</head>
<body>
    <div class="container">
      <div class="row">
        <p style="font-size: 20px;background: #328FF8;text-align: center;padding: 5px 10px 5px 10px;color: #fff">CUSTOMER INVOICE</p>
      </div>
      <div class="row">
        <p style="font-size: 40px; color: #328FF8; text-align: center; margin : 50px;">Rahi Shopping Mall</p>
        <p style="font-size: 13px; text-align: center;">Muradnagor-Bager, Cumilla, Bangladesh.</p>
        <p style="font-size: 13px; text-align: center;">Showroom : <b>01767078222</b></p>
        <p style="font-size: 13px; text-align: center;">Owner No : <b>01917454737</b></p>
      </div>
      <hr style="margin-bottom: 0px;">
      <br>
      <div class="row">
        <div class="col-md-12">
          @php
            $payment = App\model\Payment::where('invoice_id',$invoice->id)->first();
          @endphp
          <table width="100%"> 
            <tr>
              <td width="85%"><b>BILL TO:</b></td>
              <td><b>Invoice No#</b></td>
            </tr>
            <tr>
              <td width="85%"><b>Name : </b>{{$payment['customer']['name']}}</td>
              <td>{{$invoice->invoice_no}}</td>
            </tr>
            <tr>
              <td width="85%"><b>Mobile No : </b>{{$payment['customer']['mobile_no']}}</td>
              <td><b>Date :</b></td>
            </tr>
            <tr>
              <td width="85%"><b>Address : </b>{{$payment['customer']['address']}}</td>
              <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
            </tr>
          </table>
        </div>
      </div>
      <br>
        <div class="row">
            <div class="col-md-12">
                @php
                $payment = App\model\Payment::where('invoice_id',$invoice->id)->first();
              @endphp
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
                  @endphp
                  @foreach($invoice['invoice_details'] as $key => $details)
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
                    <td>{{$payment->due_amount}}tk</td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align: right;"><b>Grand Total</b></td>
                    <td><strong>{{$payment->total_amount}}tk</strong></td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr style="margin-bottom: 0px;">
                <br><br>
                <table border="0" width="100%">
                    <tbody>
                      <tr>
                        <td style="width: 40%;">
                            <p style="text-align: center;margin-left: 20px;">_____________________</p>
                        </td>
                        <td style="width: 20%;"></td>
                        <td style="width: 40%;text-align: center;">
                            <p style="text-align: center;">__________________</p>
                        </td>
                    </tr>
                        <tr>
                            <td style="width: 40%;">
                                <p style="text-align: center;margin-left: 20px;">Customer Signature</p>
                            </td>
                            <td style="width: 20%;"></td>
                            <td style="width: 40%;text-align: center;">
                                <p style="text-align: center;">Seller Signature</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br> <br>
        <div class="row">
          @php
          $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        @endphp
        <p style="text-align: center;">Printing time : {{$date->format('F j, Y, g:i a')}}</p>
        </div>
        <br>
        
    </div>
</body>
</html>