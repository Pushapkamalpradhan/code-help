<table style="width:100%;">
  <tr>
    <td style="width:33%;"></td>
    <td style="width:33%;">
      <div style="width:100%;text-align:center;"><img style="text-align:center;width:140px;margin:0 auto;"  src="{{ url('public/admin/dist/images/logo.png') }}" />
      </div>
    </td>
    <td style="width:33%;"></td>
  </tr>
</table>
<!-- 
<table style="width:100%;">
  <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center;">
    <td style="padding:5px 0 10px; font-weight: 700;">Booking Details Information</td>
  </tr>
</table> -->


<table style="width:100%;">
<thead>
<tr style="background:#5a5b5b; color:white; font-family:lato; font-size:16px;">
<th style="text-align:left; padding:5px 10px 10px;">BOOKING DETAIL</th>
<th style="text-align:left; padding:5px 10px 10px;">CUSTOMER DETAIL</th>
</tr>
</thead>
</table> 


<table style="width:100%; font-family:lato; font-size:16px;">
  <tbody>
    <tr>
      <td style="width:33%; vertical-align: top;">
          <span ><strong>Booking Time:</strong> {{ date('d-m-y',strtotime($details->booking_date)) }}</span><br />
          <span ><strong>Booking Date:</strong> {{ date('h:i A',strtotime($details->booking_time)) }}</span><br />
          @if($details->service_type != "0" && !empty($details->service_type))
          <span ><strong>Type of Service:</strong> {{ $details->service_type }}</span><br />
          @elseif($details->service_type == "0" || empty($details->service_type))
          <span ><strong>Type of Service:</strong> {{ 'Other' }}</span><br />
          <span ><strong>Other:</strong> {{ $details->other_service_type }}</span><br />
          @endif
      </td>
      <td style="width:33%; vertical-align: top;">
          <span ><strong>Name:</strong> {{ ucfirst($details->name) }}</span><br />
          <span><strong>Phone No.:</strong> {{ $details->phone }}</span><br />
          <span><strong>Email:</strong> {{ $details->email }}</span><br />
          <span><strong>Address:</strong> {{ $details->address }}</span><br />
      </td>
      </tr>

  <tbody>
</table>

<table style="width:100%;">
<thead>
<tr style="background:#5a5b5b; color:white; font-family:lato; font-size:16px;">
<th style="text-align:left; padding:5px 10px 10px;">VEHICLE DETAIL</th>
</tr>
</thead>
</table> 


<table style="width:100%; font-family:lato; font-size:16px;">
  <tbody>
      <tr>
      <td style="width:33%; vertical-align: top;">
          <span ><strong>Rego No:</strong> {{ $details->rego_number }}</span><br />
          <span ><strong>Vehicle Type / Model:</strong> {{  $details->car_type_name }}</span><br />
          <span ><strong>Vehicle Make / Make Year: </strong> {{ $details->vehicle_make_year }}</span><br />
          <span ><strong>VIN: </strong> {{ $details->vin }}</span><br />
          <span ><strong>Vehicle Reg State:</strong> {{ $details->state }}</span><br />
      </td>
      <td style="width:33%; vertical-align: top;">
          <span ><strong>Engine No: </strong> {{ $details->engine_number }}</span><br />
          <span ><strong>Tyre Size:</strong> {{ $details->tyre_size }}</span><br />
          <span ><strong>Color:</strong> {{ $details->color }}</span><br />
          <span ><strong>Last Odometer:</strong> {{ $details->odometer }}</span><br />
          <span ><strong>Fuel:</strong> {{ $details->fuel }}</span><br />
      </td>
    </tr>
  <tbody>
</table>

<table style="width:100%;">
<thead>
<tr style="background:#5a5b5b; color:white; font-family:lato; font-size:16px;">
<th style="text-align:left; padding:5px 10px 10px;width:50%;">INSPECTION CHECKLIST</th>
<th style="text-align:left; padding:5px 10px 10px;width:50%;">CONDITION</th>
</tr>
</thead>
</table> 




<table style="width:100%; ">
  <tbody>
  @php $inspection_items_inputs = DB::connection('workshop')->table('inspection_items_inputs')->where(["inspection_id"=>$details->inspection_id])->get();  @endphp
          @foreach($inspection_items_inputs as $inspection_items_input)
          @if($inspection_items_input->value == "good" || $inspection_items_input->value == "recommended_replacement")
     <tr style="width:100%; font-family:lato; font-size:16px;">
      <td style="width:50%; border: 1px solid #7f7f7f7a; padding:5px;"><span ><strong> {{ucfirst($inspection_items_input->name)}}:</strong></span>

      </td>
      <td style="width:50%; border: 1px solid #7f7f7f7a; padding:5px;"><span > {{ucfirst(str_replace('_',' ',$inspection_items_input->value))}} </span>

      </td>
      </tr>
      @endif
      @if($inspection_items_input->value != "good" &&  $inspection_items_input->value != "recommended_replacement")
      <tr>
      <td style="width:50%; border: 1px solid #7f7f7f7a; padding:5px;"><span ><strong> {{ucfirst($inspection_items_input->name)}} (Faulty):</strong></span>

      </td>
      <td style="width:50%; border: 1px solid #7f7f7f7a; padding:5px;"><span > {{ ucfirst($inspection_items_input->reason) }} </span>

      </td>
      </tr>
      @endif

    @endforeach
</tbody>
</table>



<table style="width:100%;">
    <thead>
    <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:16px;">
       <th style="text-align:left; padding:5px 10px 10px;">Upload (Front)</th>
    </tr>
    </thead>
</table> 


<table style="width:100%; font-family:lato;">
  <tbody>
    <tr style="width:100%;">
      <td style="width:100%;;margin:0;padding:0;display:block;">
      @foreach(explode(',',$details->front_images) as $front_images)
      <a target="_blank" href="<?php echo url('/').'/'.$front_images ?>">
      <img style="margin-top: 10px; width:80px; border: 1px solid rgb(136, 136, 136);  margin-left: 10px;"  src="<?php echo url('/').'/'.$front_images ?>"></a>
      @endforeach
      </td>
    </tr>
  </tbody>
</table>



<!-- <table  style="width:100%; font-family:lato;">
  <tbody>
    <tr style="width:100%;">
    @foreach(explode(',',$details->front_images) as $front_images)
    <?php
      // $image = @file_get_contents($front_images);

      // $filename = "";
      // if ($image != '') {
      //   $filename = uniqid().'.jpg';
      //   file_put_contents('public/temp/'.$filename, $image);
      //   //$path = public_path().'/temp/'.$filename;
      //   //move_uploaded_file($filename,$path);
      //}
      ?>
      <td style="width:25%;float:left;margin:0;padding:0;display:inline-block;">
      <img style="text-align:center;width:100%;float:left;" class="logo" src="<?php echo url('/').'/'.$front_images ?>">

      </td>
      @endforeach

    </tr>
    <tr>
      <td></td>
    </tr>
  <tbody>
</table> -->



<table style="width:100%; font-family:lato; font-size:16px;">
  <tbody>
    <tr >
      <td>  <strong>You have Agree With our Terms &amp; Conditions</strong></td>
    </tr>
<tr><td></td></tr>
  </tbody>
</table>


<table style="width:100%; font-family:lato; font-size:16px;">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <p><strong>Notes</strong>: {{ $details->note  }}</p>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>

<table style="width:100%;">
    <thead>
    <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:16px;">
       <th style="text-align:left; padding:5px 10px 10px;">Signature</th>
    </tr>
    </thead>
</table> 




<table style="width:100%;float:left;">
  <tbody>
    <tr style="margin:0 0 20px 0;">
    <?php
        $right_img = $details->signature;
          $signature_filename = "";
          $img = $details->signature;
          $img = str_replace('data:image/png;base64,', '', $img);
          $img = str_replace(' ', '+', $img);
          $data = base64_decode($img);
          $signature_filename = 'sing'.uniqid() . '.jpg';
          $file = "public/temp/".$signature_filename;
          file_put_contents($file, $data);
          ?>
      <td style="width:100%;float:left;margin:0;padding:0;display:block;background-color:#fafafa;">
      <img style="text-align:center;width:350px;height:150px;" class="logo" src="{{ url('public/temp').'/'.$signature_filename }}" />
      </td>
    </tr>
    <tr>
      <td></td>
    </tr>
  <tbody>
</table>

<table style="width:100%;">
  <tr>
    <td style="width:100%;">
      <div>
        <p style="font-family:lato; font-size:16px; text-align:center;">
          <strSignatureong>© 2022 Singh Auto Care. All Rights



            Reserved.</strong>

        </p>



      </div>



    </td>







  </tr>



</table>