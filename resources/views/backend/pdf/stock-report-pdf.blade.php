<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Invoice Report Pdf</title>
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
        <p style="font-size: 20px;background: #328FF8;text-align: center;padding: 5px 10px 5px 10px;color: #fff">DAILY INVOICE REPORT</p>
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
                    <th>Supplier Name</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>In.Qty</th>
                    <th>Out.Qty</th>
                    <th>Stock</th>
                    <th>Unit</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($allData as $key => $product)
                  @php
                    $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                    $selling_total = App\Model\InvoiceDetails::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                  @endphp
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$product['supplier']['name']}}</td>
                        <td>{{$product['category']['name']}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$buying_total}}</td>
                    <td>{{$selling_total}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product['unit']['name']}}</td>
                    </tr>                 
                  @endforeach
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