{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Download L/C Report</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <style type="text/css">

    td, th{
      border: 1px solid black;
    }

    th, td{
    padding: 0px 30px 0px 30px;
    }

      @media print {
        
          .print-button {
              display: none;
          }
      }

  </style>
  </head>
  <body>

    <h3>L/C Report</h3>
    <h5>Date - <span> {{$sdate}}</span> - <span>{{$edate}} </span></h5>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center w-5">SL.</th>
          <th class="text-center w-5">Date</th>
          <th class="text-center w-5">L/C no.</th>
          <th class="text-center w-5">Supplier</th>
          <th class="text-center w-5">Product</th>
          <th class="text-center w-5">Qty</th>
          <th class="text-center w-5">Grand Total</th>                  
        </tr>
      </thead>
      <tbody>
        @php
          $sl = 1;
          $amount = 0;	
        @endphp
        @foreach($filter as $purchase)
     
        <tr>
            <td>{{$sl++}}</td>
						<td>{{ $purchase->purchase_date }}</td>
            <td>{{ $purchase->chalan_no }}</td>
						<td>{{ $purchase->supplier->supplier_name }}</td>
						<td>{{ $purchase->grand_total }}</td>
						<td style="display:none;">{{$amount += $purchase->grand_total}}</td>
					</tr>
      
        @endforeach
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>{{$amount}}</td>
		   
         </tr>
      </tbody>
    </table>

  </body>
</html> --}}


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>L/C Report</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 13px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }

    .authority1 {
        /*text-align: center;*/
        float: left
    }
    .authority h5 {
        margin-top: -10px;
        color: #037c09;
        /*text-align: center;*/
        margin-left: 35px;
    }

    .authority1 h5 {
        margin-top: -10px;
        color: #037c09;
        /*text-align: center;*/
        margin-left: 35px;
    }
    
    .thanks p {
        color: #136108;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }

    .t {
  border: 1px solid black;
  border-collapse: collapse;
}

</style>

</head>
<body>

  <table width="100%" style="background: #f7f7f7; padding:0 0px 0 0px;">
    <tr>
        <td valign="top">
          <br>   
          <img width="200px" height="72px" src="{{ asset('/public/frontend/assets/img/logo2.png') }}" alt="">
        </td>
        <td align="right">
          <pre class="font" style="margin: 2px; line-height: 1;">
            STATA IT LIMITED 
            Email: statabangladesh@gmail.com
            {{-- <br> --}}
            Mob: 88 09678200509 
          </pre>
          <h3>Date : <span> {{$sdate}}</span> - <span>{{$edate}} </span></h3>
        </td>
    </tr>
  </table>


  <table width="100%" style="background:white; padding:2px;"></table>
  
  <br/>
{{-- <h3>Product List</h3> --}}
  <table class="t" width="100%">
    <thead style="background-color: #17810e; color:#FFFFFF;">
      <tr class="font">
        <th class="t">SL.</th>
        <th class="t">Date</th>
        <th class="t">Purchase Number</th>
        <th class="t">Supplier</th>
        <th class="t">Amount</th>
        
      </tr>
    </thead>
    <tbody>
        @php
            $sl = 1;
          $amount = 0;
        @endphp
     @foreach($filter as $purchase)
    
      <tr class="font">
        <td class="t" align="center">{{$sl++}}</td>
        <td class="t" align="center">{{$purchase->purchase_date}}</td>
        <td class="t" align="center">{{$purchase->chalan_no}}</td>
        <td class="t" align="center">{{$purchase->supplier->supplier_name}} </td>
        <td class="t" align="center">{{$purchase->grand_total}}</td>
        <td class="t" align="center" style="display:none;">{{$amount += $purchase->grand_total}}</td>
      </tr>
      @endforeach
      <tr>
        <td class="t" align="center"></td>
        <td class="t" align="center"></td>
        <td class="t" align="center"></td>
        <td class="t" align="center"></td>						
        <td class="t" align="center">{{$amount}}</td>	   
       </tr>
    </tbody>
  </table>
  
</body>
</html> 