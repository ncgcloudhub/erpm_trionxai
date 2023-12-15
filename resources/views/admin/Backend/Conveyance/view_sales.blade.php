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
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          {{-- <br><br> --}}
          <br>
          <img width="200px" height="72px" src="frontend/assets/img/logo2.png" alt="">
          {{-- <h2 style="color: #ff7c00; font-size: 26px;"><strong>Bengal Automation.</strong></h2> --}}
        </td>
        <td align="right">
          <pre class="font" style="margin: 2px; line-height: 1;">
            STATA IT LIMITED 
            Email: statabangladesh@gmail.com
            {{-- <br> --}}
            Mob: 88 09678200509 
          </pre>
        </td>
    </tr>
  </table>


  <table width="100%" style="background:white; padding:2px;"></table>
  <table width="100%" style="background: #F7F7F7; padding:0 5px 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{ $sale->customer->customer_name }}<br>
           <strong>Email:</strong> {{ $sale->customer->email }} <br>
           <strong>Phone:</strong> {{  $sale->customer->phone }} <br>
           <strong>Address:</strong> {{  $sale->customer->address  }}
         </p>
        </td>
        <td align="right">
          <div class="font" style="margin-top: -12px;">
            <h3><span style="color: #106908;">Invoice:</span> #{{ $sale->invoice}}</h3>
            @if ( $sale->pInvoice == NULL)
            @else
            <h4><span style="color: #106908;">Prev Invoice:</span> #{{ $sale->pInvoice}}</h4>
            @endif
            <strong>Sale Date:</strong> {{ $sale->sale_date }} <br>
            {{-- <strong>Expiry Date:</strong> {{ $sale->expire_date }} <br> --}}
            <strong>Made By:</strong> {{ $sale->user->name }} 
            {{-- <br> --}}
          </div>
          
        </td>
    </tr>
  </table>
  <br/>
{{-- <h3>Product List</h3> --}}
  <table class="t" width="100%">
    <thead style="background-color: #17810e; color:#FFFFFF;">
      <tr class="font">
        <th class="t">SL.</th>
        <th class="t">Product Name</th>
        <th class="t">Code</th>
        <th class="t">Unit Price </th>
        <th class="t">Quantity</th>
        <th class="t">Total </th>
      </tr>
    </thead>
    <tbody>
        @php
             $sl = 1;
        @endphp
     @foreach($saleItem as $item)
      <tr class="font">
        <td class="t" align="center">
                {{$sl++}}
        </td>
        <td class="t" align="center"> {{ $item->product->product_name }}</td>
        <td class="t" align="center">
            {{ $item->product->product_code }}
        </td>
        <td class="t" align="center">
            {{-- @if ($item->product->discount_price == NULL) --}}
            TK {{ $item->rate  }}
            {{-- @else
            TK {{ $item->product->discount_price  }}
            @endif --}}
        </td>

        <td class="t" align="center">{{ $item->qty }}</td>
        
        <td class="t" align="center">TK {{ $item->amount }} </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
  {{-- <br> --}}
  <table width="100%" style=" padding:0 3px 0 3px;">
    <tr>
        <td align="right" >
         
          {{-- <hr>   --}}
          <h3><span style="color: #11790d;">Sub Total </span><span style="font-size: 12px">{{ $sale->sub_total }}</span></h3>
            @if ($sale->discount_per == NULL && $sale->discount_flat == NULL)
            @elseif($sale->discount_per == NULL)
            <h3><span style="color: #169211; font-size: 12px;">Discount </span>TK {{ $sale->discount_flat }}</h3>
            @else
            <h3><span style="color: #169211; font-size: 12px;">Discount </span>{{ $sale->discount_per }}%</h3>
            @endif
          <h3><span style="color: #11790d; font-size: 12px;">Grand Total </span><span style="font-size: 12px">TK {{ $sale->grand_total }}</span></h3>
          
          {{-- <h3><span style="color: #26810f;">Total Tax </span> <span style="font-size: 12px"> TK 0.00</span></h3> --}}

           
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
            {{-- <hr> --}}
            @if ( $sale->p_paid_amount == null)
              <h3><span style="color: #26810f;">Paid Amount</span> <span style="font-size: 12px"> TK 0</span></h3>
              <h3><span style="color: #26810f;">Due Amount</span> <span style="font-size: 15px"> TK {{ $sale->grand_total }}</span></h3>
            @else
              <h3><span style="color: #26810f;">Paid Amount</span> <span style="font-size: 12px"> TK {{$sale->p_paid_amount}}</span></h3>
              <h3><span style="color: #26810f;">Due Amount</span> <span style="font-size: 15px"> TK {{ $sale->due_amount }}</span></h3>
            @endif
          
        </td>
    </tr>
    {{-- <br> --}}
    <tr>
       <td><b> Sale Details : </b>{{$sale->details}}</td> 
    </tr>
  </table>
  
  {{-- <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div> --}}
  <div class="authority1 float-left" style="margin-top:80px">
  <p>-----------------------------------</p>
  <h5>Customer Signature:</h5>
  </div>
  <div class="authority float-right" style="margin-top:80px">
    
    {{-- <br> --}}
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
  </div>
</body>
</html> 