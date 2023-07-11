<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Credit Report Pdf</title>
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
        <p style="font-size: 20px;background: #328FF8;text-align: center;padding: 5px 10px 5px 10px;color: #fff">CUSTOMER CREDIT REPORT</p>
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
              <table width="100%" class="table table-bordered" id="customers">
                <thead >
                  <tr style="background: #328FF8;">
                    <th>SL.</th>
                    <th>Customer Name</th>
                    <th>Invoice No</th>
                    <th>Date</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $total_sum = '0';
                    @endphp
                  @foreach($allData as $key => $payment)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$payment['customer']['name']}}({{$payment['customer']['mobile_no']}}-{{$payment['customer']['address']}})</td>
                        <td>Invoice No #{{$payment['invoice']['invoice_no']}}</td>
                        <td>{{date('d-m-Y',strtotime($payment['invoice']['date']))}}</td>
                        <td>{{$payment->due_amount}}</td>
                        @php
                        $total_sum += $payment->due_amount;
                        @endphp
                    </tr>                 
                  @endforeach
                  <tr>
                    <td colspan="4" style="text-align: right;"><b>Grand Total</b></td>
                    <td><b>{{$total_sum}}tk</b></td>
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
                        <td style="width: 40%;"></td>
                        <td style="width: 20%;"></td>
                        <td style="width: 40%;text-align: center;">
                            <p style="text-align: center;">__________________</p>
                        </td>
                    </tr>
                        <tr>
                            <td style="width: 40%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 40%;text-align: center;">
                                <p style="text-align: center;">Owner Signature</p>
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