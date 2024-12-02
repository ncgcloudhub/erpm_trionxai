<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Sale Invoice</title>

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
        color: #000000;
        /*text-align: center;*/
        margin-left: 35px;
    }

    .authority1 h5 {
        margin-top: -10px;
        color:  #000000; ;
        /*text-align: center;*/
        margin-left: 35px;
    }
    
    .thanks p {
        color:  #000000;
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

  <table width="100%" style="background: #ffffff; padding: 0; text-align: center;">
    <tr>
      <td valign="top">
        <img width="100px" height="80px" src="assets/img/sale_invoice.png" alt="">
        <div style="margin-top: 10px; font-family: Arial, sans-serif; line-height: 1.5; font-size: 14px;">
          <strong>STRITS TAX LLC |</strong>
          <strong>Email:</strong> taxhelp@stritstax.com |
          <strong>Phone:</strong> 929-491-0123 / 862-419-3849
        </div>
      </td>
    </tr>
  </table>
  


  <table width="100%" style="background:white; padding:2px;"></table>
  <table width="100%" style="background: #ffffff; padding:0 5px 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 0px;">
            @if($sale->customer)
            <strong>Company:</strong> {{ $sale->customer->company_name }}<br>
            <strong>Name:</strong> {{ $sale->customer->user_name }}<br>
            <strong>ID:</strong> {{ $sale->customer->customer_id }}<br>
            <strong>Address:</strong> {{  $sale->customer->address }}<br>
            <strong>Phone:</strong> {{  $sale->customer->phone }}<br>
            <strong>Email:</strong> {{ $sale->customer->email }}<br>
          
         @else
            <p>Customer information is unavailable.</p>
         @endif
         </p>

         <div class="font" style="margin-top: 12px;">
          <strong><span style="color: #000000; ;">Invoice:</span> #{{ $sale->invoice}}</strong><br>
          <strong>Sale Date:</strong> {{ $sale->sale_date }} <br>
          {{-- <strong>Expiry Date:</strong> {{ $sale->expire_date }} <br> --}}
          <strong>Made By:</strong> {{ $sale->user->name }} 
          {{-- <br> --}}
        </div>
        </td>
        <td align="right">
          <div class="font" style="margin-top: 40px; text-align: right; display: flex; gap: 10px; justify-content: flex-end;">
            <!-- Image 1 with description -->
            <div style="text-align: center; display: inline-block;">
              <img width="150px" height="150px" src="assets/img/qrzelle.png" alt="">
            
            </div>
            <!-- Image 2 with description -->
            <div style="text-align: center; display: inline-block;">
              <img width="150px" height="150px" src="assets/img/qrzelle1.png" alt="">
             
            </div>
          </div>
        </td>
        
        
    </tr>
  </table>
  <br/>
{{-- <h3>Product List</h3> --}}
  <table class="t" width="100%">
    <thead style="background-color: #000000; color:#FFFFFF;">
      <tr class="font">
        <th class="t" style="width: 20%">Ticket.</th>
        <th class="t" style="width: 50%">Description</th>
        <th class="t" style="width: 10%">Qty</th>
        <th class="t" style="width: 10%">Rate</th>
        <th class="t" style="width: 10%">Total </th>
      </tr>
    </thead>
    <tbody>
        @php
             $sl = 1;
        @endphp
     @foreach($saleItem as $item)
      <tr class="font">
        <td class="t" align="center">
          {{ $item->tax_tasks->task_id }}
        </td>
        <td class="t" align="center"> {!! $item->description !!}</td>
        <td class="t" align="center">
            {{ $item->qty }}
        </td>
        <td class="t" align="center">
            {{-- @if ($item->product->discount_price == NULL) --}}
            ${{ $item->rate  }}
            {{-- @else
            $ {{ $item->product->discount_price  }}
            @endif --}}
        </td>

        <td class="t" align="center">${{ $item->amount }}</td>
       
      </tr>
      @endforeach
      
    </tbody>
  </table>
  {{-- <br> --}}
  <table width="100%" style=" padding:0 3px 0 3px;">
    <tr>
        <td align="right" >
         
          {{-- <hr>   --}}
          <h3><span style="color: #000000; ;">Sub Total: </span><span style="font-size: 12px">${{ $sale->sub_total }}</span></h3>
            @if ($sale->discount_per == NULL && $sale->discount_flat == NULL)
            @elseif($sale->discount_per == NULL)
            <h3><span style="color:  #000000; ; font-size: 12px;">Discount: </span>${{ $sale->discount_flat }}</h3>
            @else
            <h3><span style="color:  #000000; ; font-size: 12px;">Discount: </span>{{ $sale->discount_per }}%</h3>
            @endif
            <h3><span style="color: #000000; ;">Tax </span><span style="font-size: 12px">{{ $sale->tax }}%</span></h3>
          <h3><span style="color:  #000000; ; font-size: 12px;">Grand Total: </span><span style="font-size: 12px">${{ $sale->grand_total }}</span></h3>
          
          {{-- <h3><span style="color: #26810f;">Total Tax </span> <span style="font-size: 12px"> $ 0.00</span></h3> --}}

           
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
            {{-- <hr> --}}
            @if ( $sale->p_paid_amount == null)
              <h3><span style="color:  #000000; ;">Paid Amount:</span> <span style="font-size: 12px"> $0</span></h3>
              <h3><span style="color:  #000000; ;">Due Amount:</span> <span style="font-size: 15px"> ${{ $sale->grand_total }}</span></h3>
            @else
              <h3><span style="color:  #000000; ;">Paid Amount:</span> <span style="font-size: 12px"> ${{$sale->p_paid_amount}}</span></h3>
              <h3><span style="color:  #000000; ;">Due Amount:</span> <span style="font-size: 15px"> ${{ $sale->due_amount }}</span></h3>
            @endif
          
        </td>
    </tr>
    {{-- <br> --}}
    <tr>
       <td><b> Sale Details : </b>{{$sale->details}}</td>
   
    </tr>
    <tr><td><b style="color: red"> Trionxai T&C : </b>Lorem ipsum dolor sit, amet laudantium facere. Voluptas minus doloremque, libero repudiandae itaque in officiis!</td></tr>
  </table>
  
  {{-- <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div> --}}
  <div class="authority1 float-left" style="margin-top:80px">
  <p>-----------------------------------</p>
  <h5>Customer Signature:</h5>
  <br>

  {{-- <h5 style="color: black; text-decoration:underline">We Accept</h5>
  <img src="frontend/assets/img/bank.png" alt="QR Code" style="width: 250px; height: 120px;">  --}}
  </div>
  <div class="authority float-right" style="margin-top:80px">
    
    {{-- <br> --}}
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
      
   
    
  </div>
</body>
</html> 