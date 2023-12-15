<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Chalan</title>

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

  <table width="100%" style="background: #f7f7f7; padding:0 10px 0 10px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <br><br>
          <img width="200px" height="72px" src="frontend/assets/img/logo2.png" alt="">
          {{-- <h2 style="color: #ff7c00; font-size: 26px;"><strong>Bengal Automation.</strong></h2> --}}
        </td>
        <td align="right">
            <pre class="font" >
              STATA IT LIMITED 
               Email:info@stataglobal.com	
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
           <strong>Name:</strong> {{ $chalan->customer->customer_name }}<br>
           <strong>Email:</strong> {{ $chalan->customer->email }} <br>
           <strong>Phone:</strong> {{  $chalan->customer->phone }} <br>
           <strong>Address:</strong> {{  $chalan->customer->address  }}
         </p>
        </td>
        <td>
          <p class="font" style="margin-left: 20px; margin-top:-12px">
            <h3><span style="color: #106908;">Chalan No:</span> #{{ $chalan->chalan_no}}</h3>
            <strong>Chalan Date:</strong> {{ $chalan->chalan_date }} <br>
            {{-- <strong>Expiry Date:</strong> {{ $chalan->expire_date }} <br> --}}
            <strong>Made By:</strong> {{ $chalan->user->name }} <br>
         </p>
        </td>
    </tr>
  </table>
  <br/>
  <p class="font">The document acknowledges that STATA IT LIMITED is providing the following STATA products for <strong> {{$chalan->purpose}}</strong></p>
  <p class="font"><strong>{{ $chalan->customer->customer_name }}</strong></p>
 
  <table class="t" width="100%">
    <thead style="background-color: #17810e; color:#FFFFFF;">
      <tr class="font">
        <th class="t">SL.</th>
        <th class="t">Product Name</th>
        <th class="t">Code</th>
        <th class="t">Quantity</th>
        <th class="t">Inventory</th>
      </tr>
    </thead>
    <tbody>
        @php
             $sl = 1;
        @endphp
     @foreach($chalanItem as $item)
      <tr class="font">
        <td class="t" align="center">
                {{$sl++}}
        </td>
        <td class="t" align="center"> {{ $item->product->product_name }}</td>
        <td class="t" align="center">
            {{ $item->product->product_code }}
        </td>

        <td class="t" align="center">{{ $item->qty }}</td>
        <td class="t" align="center">{{ $item->inventory }}</td>

      </tr>
      @endforeach
      
    </tbody>
  </table>
  <br>
  <p class="font">Please acknowledge this document by giving your initial below.</p>

  
    <p class="font"> <b>Chalan Details : </b>{{$chalan->details}}</p>
 


  <div class="authority1 float-left" style="margin-top:120px">
  <p>-------------------------------</p>
  <h5>{{ $chalan->customer->customer_name }}</h5>
  </div>
  <div class="authority float-right">
    <div class="">
      <img width="110" height="112" src="frontend/assets/img/auth_seal.png" alt="">
    </div>
      <p>---------------------------------</p>
      <h5>Authority Signature:</h5>
  </div>
</body>
</html> 