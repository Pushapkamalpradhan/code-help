<link
  href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
  rel="stylesheet">

<table style="width:100%;">
    <tr>
      <td style="width:33%;"></td>
      <td style="width:33%;">
        <div><img style="text-align:center;" class="logo" src="{{ url('public/admin/images/rantel_black_logo.png') }}" /></div>
      </td>
      <td style="width:33%;"></td>
    </tr>
  </table>

  <!--Booking Info -->

<table style="width:100%;">
    <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center;">
      <td style="padding:5px 0 10px; font-weight: 700;">Booking Information</td>
    </tr>
  </table>
 
  <table style="width:100%; font-family:lato; font-size:16px;">
    <tbody>
      <tr>
        <td style="width:33%; vertical-align: top;">
        <strong>Booking No.</strong>: <br>
        #{{ $pdf_data->booking_number }}
        <br />
        <strong>Booking Date / Time</strong>: <br>
        {{ date('d-m-y',strtotime($pdf_data->booking_date)) }}
            ({{ date('h:i A',strtotime($pdf_data->booking_time))  }})
            <br>
        <strong>Return Date / Time</strong>:<br> 
        {{ (isset($pdf_data->return_date) && !empty($pdf_data->return_date)) ? date('d-m-y',strtotime($pdf_data->return_date)) : '--' }}
            ({{ (isset($pdf_data->return_time) && !empty($pdf_data->return_time)) ? date('h:i A',strtotime($pdf_data->return_time)) : '--'  }})
          </td>
          <td style="width:33%; vertical-align: top;">
            <strong>Rego</strong>: <br>
            {{ $pdf_data->rego_no }}<br />
            <strong>Odometer:</strong>: <br>
            {{ $pdf_data->odometer }} KM<br />
            <strong>Fuel:</strong>: <br>
            {{ $pdf_data->fuel  }}
            </td>
          <td style="width:33%; vertical-align: top;"> 
            <?php $last_odometer =  DB::table('outgoing_inspection')->where('booking_id',$pdf_data->booking_id)->select('odometer','created_at')->first(); ?>
            @php
  
            $datetime1 = date_create($last_odometer->created_at);
            $datetime2 = date_create($pdf_data->created_at);
  
  
            $interval = date_diff($datetime1, $datetime2);
  
  
            $days = $interval->format('%R%a days');
            $weeks = $interval->format('%R%a weeks');
            @endphp
            <strong>Total KM</strong>: <br>
            {{ $pdf_data->odometer - $last_odometer->odometer }}<br />
            <strong>Total Days</strong>:<br>
             {{ str_replace('+',' ',$days) }}<br />
            
            <strong>Total Weeks</strong>:<br>
             {{ floor((float)$weeks  / 7).' weeks' }}
        </td>
        
      </tr>
      <tr><td><td></td><td></td></tr>
      <tr><td><td></td><td></td></tr>
  </tbody>
  </table>
  
  <!--Booking Info -->
  
  <!--Return Inspection Details Info -->
  <table style="width:100%;">
    <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center;">
      <td style="padding:5px 0 10px; font-weight: 700;">Return Inspection Details</td>
    </tr>
  </table>
  
  
  <table style="width:100%; font-family:lato; font-size:16px;">
    <tbody>
            @foreach($inspection_items_inputs as
          $inspection_items_input)
          
      <tr style="width:100%;">
        <td style="width:50%; border: 1px solid #7f7f7f7a; padding:5px;"><strong>{{ ucfirst($inspection_items_input->name) }}</strong></td>
           
        <td style="width:50%; border: 1px solid #7f7f7f7a; padding:5px;"> {{ucfirst($inspection_items_input->value)}}</td>
    </tr>
          @endforeach
      
     <tr><td><td></td></tr>
     <tr><td><td></td></tr>
  </tbody>
  </table>
  
  <!--Return Inspection Details Info -->
  
  <!--Upload (Images) Info -->
  <table style="width:100%;">

    <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center; ">
  
      <td style="padding:5px 0 10px; font-weight: 700;">Upload (Images)</td>
  
    </tr>
  
</table>
  <!-- <table style="width:100%;margin-top:10px;">
    <tbody style="width:100%">
    <tr><td></td></tr>
  
        @foreach(explode(',',$pdf_data->front_images) as $front_images)
        <?php
  
        // $image = @file_get_contents($front_images);
        // $filename = "";
        // if ($image != '') {
        //   $filename = uniqid().'.jpg';
        //   file_put_contents('public/temp/'.$filename, $image);
        // }
        ?><tr style="width:100%;">
        <td style="width:100%;float:left;margin:0;padding:0;display:block;">
        <img style="text-align:center;width:50px;" class="logo" src="<?php echo url('/').'/'.$front_images ?>">
  
          <!-- <img style="text-align:center;" class="logo"
            src='{{ url("public/temp/620f2fce6aeb2.jpg")}} '   /> -->
        <!-- </td></tr> -->
        <!-- @endforeach -->
        <!-- <br />
    <tbody>
  </table>  -->
  
<table style="width:100%; font-family:lato;">

    <tbody>
  
      <tr style="width:100%;">
  
        <td style="width:100%;;margin:0;padding:0;display:block; margin-top: 10px;"></td>
  
        @foreach(explode(',',$pdf_data->front_images) as $front_images)
  
        <a target="_blank" href="<?php echo url('/').'/'.$front_images; ?>"><img
            style="margin-top: 10px; width:50px; border: 1px solid rgb(136, 136, 136);  margin-left: 10px;"
            src="<?php echo url('/').'/'.$front_images; ?>"></a>
  
        @endforeach
  
        </td>
  
      </tr>
  
    </tbody>
  
  </table>
  
  <table style="width:100%; font-family:lato;">
    <tr>
      <td>
        <p> @if($pdf_data->terms_conditions == "1") <strong>You have Agree With our Terms &amp; Conditions</strong>@endif </p>
  
      </td>
    </tr>
  
  </table>
<!--Signature-->
  <table style="width:100%;">

    <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center; ">
  
      <td style="padding:5px 0 10px; font-weight: 700;">Signature</td>
  
    </tr>
  
</table>
 

  <table  style="font-family:lato; font-size:16px; ">
    <tbody style="width:100%">
      <tr style="margin:0 0 20px 0;">
      <?php
          $right_img = $pdf_data->signature;
            $signature_filename = "";
            $img = $pdf_data->signature;
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $signature_filename = 'sing'.uniqid() . '.jpg';
            $file = "public/temp/".$signature_filename;
            file_put_contents($file, $data);
            ?>
        <td style="width:100%;margin:0;padding:0;display:block;background-color:#fafafa;">
        <img  style="text-align:center;width:350px;" class="logo" src="{{ url('public/temp').'/'.$signature_filename }}" />
        </td>
      </tr>
      <tr><td  style="font-family:lato; font-size:16px; ">{{ date('d-m-Y',strtotime($pdf_data->created_at)) }} / {{ date('h:i A',strtotime($pdf_data->created_at)) }}</td></tr>
    <tbody>
  </table>
  <table  style="font-family:lato; font-size:16px; "><tr><td></td></tr><tr><td><p><strong>Notes</strong>: {{ $pdf_data->note  }}</p></td></tr></table>
  <table  style="width:100%; font-family:lato; font-size:16px; text-align: center;"><tr><td style="width:100%;"><div><p><strong>© 2022 Singh Auto Rental. All Rights Reserved.</strong></p></div></td></tr></table>