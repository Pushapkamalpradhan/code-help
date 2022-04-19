<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

<!-- font-family: 'Poppins', sans-serif; -->

<table style="width:100%;">
  <tr>
    <td style="width:33%;"></td>
    <td style="width:33%;">
      <div style="width:100%;"><img style="text-align:center;width:250px;" class="logo" src="{{ url('public/admin/images/rantel_pdf.png') }}" /></div>
    </td>
    <td style="width:33%;"></td>
  </tr>
</table>
    <table style="width:100%;">
    <thead>
    @if($invoice->type == "0")
       <tr>
        <td style="font-size:20px; font-family: lato;"><strong>Invoice No.</strong>: {{ 'INV'.$invoice->invoice_no }}<br />
        <strong>Booking ID</strong>: #{{ $invoice->booking_no }}
      </td>
         @if($invoice->interval != "Weekly" && $invoice->interval != "Monthly")
         <td style="font-size:20px; font-family: lato;"><strong>From</strong>: {{ date('d-m-y',strtotime($invoice->booking_date))}} <br/>
         <strong>To</strong>: {{ date('d-m-y',strtotime($invoice->booking_return_date))}}
        </td>
         @elseif($invoice->interval == "Weekly" || $invoice->interval == "Monthly")
         <td style="font-size:20px; font-family: lato; text-align:right;"><strong>From</strong>: {{ date('d-m-y',strtotime($invoice->booking_date))}}<br />
         <strong>To</strong>: {{ date('d-m-y',strtotime($invoice->booking_date.' +7 day')) }}
        </td>
         @endif()
        </tr>
        @endif
        @if($invoice->type == "1")
        <tr>
        <td style="font-size:20px; font-family: lato;"><strong>Invoice No.</strong>: {{ 'INV'.$invoice->invoice_no }}<br />
          <strong>Booking ID</strong>: #{{ $invoice->booking_no }}
          </td>
          <td style="font-size:20px; font-family: lato;"><strong>From</strong>: {{ date('d-m-y',strtotime($invoice->invoice_date))}}<br />
          <strong>To</strong>: {{ date('d-m-y',strtotime($invoice->due_date)) }}
          </td>

          </tr>
        @endif
      </thead>
      </table>
      
<table style="width:100%;">
  <tr style="width:100%;">
  <th style="width:50%; text-align:left; font-size:25px; color:#E00B21; font-family:lato;">Invoice To:</th>
    <th style="width:50%; text-align:left; font-size:25px; color:#E00B21; font-family:lato;">Invoice From:</th>
  
    <!-- <td style="width:50%;background-color:#5a5b5b;color:#fff;font-size:20px;padding:0px 0 5px 5px;font-family: 'Poppins', sans-serif;">INVOICE TO:</td>
    <td style="width:50%;background-color:#5a5b5b;color:#fff;font-size:20px;padding:0px 0 5px 5px;font-family: 'Poppins', sans-serif;"> INVOICE FROM:</td> -->
  </tr>
  <tr>
  <td style="width:50%; font-family:lato; font-size:16px; vertical-align: top;">
    <strong>Name:</strong> {{ ucfirst($invoice->usr_name) }} <br>
    <strong>Phone: </strong> {{ $invoice->usr_phone }}<br>
    <strong>Email:</strong> {{ $invoice->usr_email }}<br>
    <strong>Address:</strong> {{ ucfirst($invoice->usr_address) }} 
  </td>
  <td style="width:50%; font-family:lato; font-size:16px;">
    <strong>Name:</strong> Singh Auto Rental<br>
    <strong>Phone: </strong> 03 8390 5421<br>
    <strong>Email: </strong>contact@singhautorental.com.au<br>
    <strong>Address: </strong> 6 Grace Way , Ravenhall VIC-3023,Australia
</td>

  </tr>
  <tr><td></td></tr>
  <tr><td></td></tr>
</table>
     

<!-- <table style="width:100%;margin-bottom:170px;">
<tbody style="width:100%;">
  <tr style="margin:0 0 10px 0;width:100%;">
    <td style="width:50%;float:left;margin:0;padding:0;display:block;font-family: 'Poppins', sans-serif;"><span style="margin:0;padding:0;display:block;"><strong>Name:</strong> {{ ucfirst($invoice->usr_name) }}</span>
    <span style="margin:0;padding:0;display:block;text-align:left;"><strong>Phone: </strong> {{ $invoice->usr_phone }}</span>
    <span style="margin:0;padding:0;display:block;"><strong>Email:</strong> {{ $invoice->usr_email }}</span>
    <span style="margin:0;padding:0;display:block;"><strong>Address:</strong> {{ ucfirst($invoice->usr_address) }} </span>
  </td>
  <td style="width:50%;float:left;margin:0;padding:0;display:block;text-align:left;font-family: 'Poppins', sans-serif;"><span style="margin:0;padding:0;display:block;"><strong>Name:</strong> Singh Auto Rental</span>
    <span style="margin:0;padding:0;display:block;text-align:left;"><strong>Phone: </strong> 03 8390 5421</span>
    <span style="margin:0;padding:0;display:block;text-align:left;"><strong>Email: </strong>contact@singhautorental.com.au</span>
    <span style="width:100%;float:margin:0;padding:0;display:table;text-align:left"><strong>Address: </strong> 6 Grace Way , Ravenhall VIC-3023,Australia</span>
</td>
</tr>

      </tbody>

    </table> -->
     @if($invoice->type == "0")
    <table style="width:100%;">
    <thead>
    <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:16px;">
    <th style="text-align:left; padding:5px 10px 10px;">Item</th>
    <th style="text-align:left; padding:5px 10px 10px;">No of Days</th>
    <th style="text-align:left; padding:5px 10px 10px;">Price</th>
    <th style="text-align:left; padding:5px 10px 10px;">Total</th>
</tr>
<tr style="font-family:lato; font-size:16px;">
<td style="padding:5px 10px;">{{ $invoice->rego_no }}<br>
<span style="color:red;font-size:12px;">{{ date('d-m-y',strtotime($invoice->booking_date)).'('.date('h:i A',strtotime($invoice->booking_time)).')' }}</span>
@if(isset($invoice->return_date) && !empty($invoice->return_date))  - 
<span style="color:red;font-size:15px;">{{ date('d-m-y',strtotime($invoice->return_date)).'('.date('h:i A',strtotime($invoice->return_time)).')' }}</span>
@endif
</td>
<td style="padding:5px 10px;">{{ $invoice->interval }}</td>
<td style="padding:5px 10px;">${{ $invoice->price }}</td>
          @if($invoice->interval != 'Weekly' && $invoice->interval != 'Monthly')
<td style="padding:5px 10px;">${{ round($invoice->price * $invoice->interval) }}</td>
          @else
<td style="padding:5px 10px;"> ${{  number_format($invoice->price,2) }}</td>
@endif
</tr>
</thead>

    

     </table> 
    @endif

 @if(!$invoice_extras->isEmpty())
<table style="width:100%;">
  <tr>
    <td style="text-align:center; width:100%; font-family:lato; font-size:20px;">Additional / Extra Items</td>
  </tr>
</table>
<table style="width:100%;">
<thead>

    <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:16px;">
    <th style="text-align:left; padding:5px 10px 10px;">Extra Items</th>
    <th style="text-align:left; padding:5px 10px 10px;">Quantity</th>
    <th style="text-align:left; padding:5px 10px 10px;">Price</th>
    <th style="text-align:left; padding:5px 10px 10px;">Total</th>
</tr>
  
</thead>
<tbody style="width:100%;">
@foreach($invoice_extras as $extra)
  <tr style="font-family:lato; font-size:16px;">
    <td style="padding:5px 10px;">{{ ucfirst($extra->itme_name) }}<br></td>
    <td style="padding:5px 10px;">{{ $extra->quantity }}</td>
    <td style="padding:5px 10px;">${{ number_format($extra->price ,2) }}</td>
    <td style="padding:5px 10px;">  ${{ number_format($extra->price * $extra->quantity,2) }}</td>
</tr>
@endforeach
</tbody>
</table>
  @else
 
 @endif
<table style="width:100%;">
<tr><td></td></td>
<tr style="width:100%; background:#F2F2F2; min-height:5px;">
<td style="width:100%;"></td>
<tr><td></td></td>
</tr>
</table>
    <table style="width:100%; font-family:lato; font-size:16px;">
    
    <tr style="vertical-align: top;">
	<td style="width:60%; padding:0 20px 0 0;"><strong style="font-size:20px;">Notes</strong>:<br> {{$invoice->public_note}}
  <!-- <strong style="font-weight: 600;color: #5a5b5b;">Private Notes: </strong> {{$invoice->private_note}} -->
</td>
  <td style="width:40%;">
  <!-- <--totale-->
  <table>
    <tbody>
        <tr>
      <td style="text-align:right; padding:5px 10px 10px;">Bond<br></td>
      <td style="text-align:lett; padding:5px 10px 10px;">${{ number_format($invoice->bond,2) }}</td>
    </tr>
    <tr>
    <td style="text-align:right; padding:5px 10px 10px;">Sub Total<br></td>
    <td style="text-align:lett; padding:5px 10px 10px;">${{ number_format(round($invoice->sub_total),2) }}</td>
    </tr>
    <tr>
      <td style="text-align:right; padding:5px 10px 10px;">Discount @if($invoice->discount_type == '1')
        {{'(Amount)'}}
        @elseif($invoice->discount_type == '2')
        {{'('.$invoice->discount_amount.'%)'}}
        @endif
      </td>
      <td style="text-align:lett; padding:5px 10px 10px;">$<?= ($invoice->discount_type == '1') ? number_format($invoice->discount_amount,2) : number_format($invoice->sub_total * $invoice->discount_amount /100,2) ?>
      </td>
      </tr>
      <tr>
      <td style="text-align:right; padding:5px 10px 10px;">Total</td>
        <td style="text-align:lett; padding:5px 10px 10px;">${{ number_format(round($invoice->total),2) }}</td>
    </tr>
    <tr>
    <td style="text-align:right; padding:5px 10px 10px;">GST</td>
    <td style="text-align:lett; padding:5px 10px 10px;">${{ number_format($invoice->total / 11,2) }}</td>
    </tr>
    <tr>
    <td style="text-align:right; padding:5px 10px 10px;">Pending Amount</td>
      <td style="text-align:lett; padding:5px 10px 10px;">${{ number_format($invoice->pending_amount,2) }}</td>
    </tr>
    </tbody>
  </table>

  <!-- <--totale-->
</td>
	</tr>
    </table>
    @php $paidPaymentDetails =
              DB::table('booking_invoice_amount')->where(["invoice_id"=>$invoice->invoice_id])->get(); @endphp
    @if(!empty($paidPaymentDetails[0]))

    <table style="width:100%;">
  <tr>
    <td style="text-align:center; width:100%; font-family:lato; font-size:20px;">Payment Detail</td>
  </tr>
</table>
    <table style="width:100%;">
      <thead>
      <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:16px;">
    <th style="text-align:left; padding:5px 10px 10px;">Date</th>
    <th style="text-align:left; padding:5px 10px 10px;">Mode of payment</th>
    <th style="text-align:left; padding:5px 10px 10px;">Price</th>
</tr>
      </thead>
      <tr><td></td></tr>
      <tbody>
      @foreach($paidPaymentDetails as $paidPaymentDetail)
        <tr style="font-family:lato; font-size:16px;">
          <td style="text-align:left; padding:5px 10px 10px;">{{ date('d-m-y',strtotime($paidPaymentDetail->paid_date)) }}</td>
          <td style="text-align:left; padding:5px 10px 10px;"> @if($paidPaymentDetail->payment_mode == "0") Eftpos
                        @elseif($paidPaymentDetail->payment_mode == "1") Bank Transfer
                        @elseif($paidPaymentDetail->payment_mode == "2") Cash @endif</td>
          <td style="text-align:left; padding:5px 10px 10px;">${{ $paidPaymentDetail->amount }}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
    @endif
