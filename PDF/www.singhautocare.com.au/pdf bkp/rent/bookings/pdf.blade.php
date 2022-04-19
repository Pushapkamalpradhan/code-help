<table>
  <tr>
    <td style="width:33%;"></td>
    <td style="width:33%;">
      <div><img style="text-align:center;" class="logo" src="{{ url('public/admin/images/rantel_black_logo.png') }}" /></div>
    </td>
    <td style="width:33%;"></td>
  </tr>
</table>
<table>
  <tr>
    <td style="width:33%;"></td>
    <td style="width:33%; text-align:center;">
      <h1>Booking Information</h1>
    </td>
    <td style="width:33%;"></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>

<table>
  <tbody>
    <tr style="margin:0 0 20px 0;">
      <td style="width:50%;float:left;margin:0;padding:0;display:block;"><span
          style="margin:0;padding:0;display:block;hight:50px;"><strong>Booking No.:</strong>
          #{{ $pdf_data->booking_number }}</span><br /><span style="margin:0;padding:0;display:block;"><strong>Booking
            Date/Time:</strong> {{ date('d-m-y',strtotime($pdf_data->booking_date)) }}
          ({{ date('h:i A',strtotime($pdf_data->booking_time))  }})</span><br /><span
          style="margin:0;padding:0;display:block;"><strong>Return Date/Time:</strong>
          {{ date('d-m-y',strtotime($pdf_data->return_date)) }}
          ({{ date('h:i A',strtotime($pdf_data->return_time))  }})</span>
      </td>
      <td style="width:50%;float:left;margin:0;padding:0;display:block;text-align:left;"><span
          style="width:100%;float:margin:0;padding:0;display:table;text-align:left;"><strong>Rego No.:</strong>
          {{ $pdf_data->rego_no }}</span><br />
        <span style="margin:0;padding:0;display:block;text-align:left;"><strong>Odometer:</strong>
          {{ $pdf_data->odometer }} KM</span><br />
        <span
          style="margin:0;padding:0;display:block;text-align:left;"><strong>Fuel:</strong>{{ $pdf_data->fuel  }}</span>
      </td>
    </tr>
  <tbody>
</table>


<table>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td style="text-align:center;">
      <h1>Outgoing Inspection Details</h1>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>

<table>
  <tbody>
    <tr style="margin:0 0 20px 0;">
      <td style="width:50%;float:left;margin:0;padding:0;display:block;">@foreach($inspection_items_inputs as
        $inspection_items_input)<span
          style="margin:0;padding:0;display:block;hight:50px;"><strong>{{ ucfirst($inspection_items_input->name) }}:</strong>
          {{ucfirst($inspection_items_input->value)}}</span>
        <br />
        @endforeach
      </td>

    </tr>
    <tr>
      <td></td>
    </tr>
  <tbody>
</table>


<!-- <table>
  <tbody>
    <tr style="margin:0 0 20px 0;">
      <td style="width:50%;float:left;margin:0;padding:0;display:block;">@foreach($inspection_items_inputs as
        $inspection_items_input)<span
          style="margin:0;padding:0;display:block;hight:50px;"><strong>{{ ucfirst($inspection_items_input->name) }}:</strong>
          {{ucfirst($inspection_items_input->value)}}</span>

        @endforeach
      </td>

    </tr>
    <tr>
      <td></td>
    </tr>
  <tbody>
</table> -->

<table>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <h1>Upload (Front)</h1><br><span>{{ $pdf_data->front_description  }}</span>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>

<table>
  <tbody>
    <tr style="margin:0 0 20px 0;">
      @foreach(explode(',',$pdf_data->front_images) as $front_images)
      <?php
      $image = @file_get_contents($front_images);

      $filename = "";
      if ($image != '') {
        $filename = uniqid().'.jpg';
        file_put_contents('public/temp/'.$filename, $image);
        //$path = public_path().'/temp/'.$filename;
        //move_uploaded_file($filename,$path);
      }
      ?>
      <td style="width:25%;float:left;margin:0;padding:0;display:block;">
      <img style="text-align:center;" class="logo" src="<?php echo url('public/temp').'/'.$filename ?>">

        <!-- <img style="text-align:center;" class="logo"
          src='{{ url("public/temp/620f2fce6aeb2.jpg")}} '   /> -->
      </td>
      @endforeach
    </tr>
    <tr>
      <td></td>
    </tr>
  <tbody>
</table>

<table>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <h1>Upload (Back)</h1><br><span>{{ $pdf_data->back_description  }}</span>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<table>
  <tbody>
    <tr style="margin:0 0 20px 0;">
      @foreach(explode(',',$pdf_data->back_image) as $back_image)
      <?php
        $back_img = @file_get_contents($back_image);
          $back_filename = "";
          if ($back_img != '') {
            $back_filename = uniqid().'.jpg';
            file_put_contents('public/temp/'.$back_filename, $back_img);
          }
          ?>
      <td style="width:25%;float:left;margin:0;padding:0;display:block;">
      <img style="text-align:center;" class="logo" src="<?php echo url('public/temp/').'/'.$back_filename ?>">
        <!-- <img style="text-align:center;" class="logo" src="<?= $front_images ?>" /> -->
      </td>
      @endforeach

    </tr>
    <tr>
      <td></td>
    </tr>
  <tbody>
</table>

<table>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <h1>Upload (Left)</h1><br><span>{{ $pdf_data->left_description  }}</span>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<table>
  <tbody>
    <tr style="margin:0 0 20px 0;">
      @foreach(explode(',',$pdf_data->left_images) as $left_images)
      <?php
        $left_img = @file_get_contents($left_images);
          $left_filename = "";
          if ($left_img != '') {
            $left_filename = uniqid().'.jpg';
            file_put_contents('public/temp/'.$left_filename, $left_img);
          }
          ?>
      <td style="width:25%;float:left;margin:0;padding:0;display:block;">
        <img style="text-align:center;" class="logo" src="<?=  url('public/temp/').'/'.$left_filename ?>" />
      </td>
      @endforeach

    </tr>
    <tr>
      <td></td>
    </tr>
  <tbody>
</table>


<table>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <h1>Upload (Right)</h1><br><span>{{ $pdf_data->right_description  }}</span>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<table>
  <tbody>
    <tr style="margin:0 0 20px 0;">
      @foreach(explode(',',$pdf_data->right_imgaes) as $right_imgaes)
      <?php
        $right_img = @file_get_contents($right_imgaes);
          $right_filename = "";
          if ($right_img != '') {
            $right_filename = uniqid().'.jpg';
            file_put_contents('public/temp/'.$right_filename, $right_img);
          }
          ?>
      <td style="width:25%;float:left;margin:0;padding:0;display:block;">
      <img style="text-align:center;" class="logo" src="<?=  url('public/temp/').'/'.$right_filename ?>" />
      </td>
      @endforeach

    </tr>
    <tr>
      <td></td>
    </tr>
  <tbody>
</table>


<table>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <p> @if($pdf_data->terms_conditions == "1") <strong>You have Agree With our Terms &amp; Conditions</strong></p>
      @endif
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>

<table>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <h1>Signature</h1><br><span></span>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<table  style=";width:100%;float:left;">
  <tbody>
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
      <td style="width:250px;float:left;margin:0;padding:0;display:block;background-color:#fafafa;">
      <img style="text-align:center;width:150px;hight:150px;" class="logo" src="{{ url('public/temp').'/'.$signature_filename }}" />
      </td>
    </tr>
    <tr>
      <td></td>
    </tr>
  <tbody>
</table>

<table>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <p><strong>Notes</strong>: {{ $pdf_data->note  }}</p>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<!-- New -->
<!-- <table>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <h1>signature</h1></span>
    </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<table>
  <tbody>
    <tr style="margin:0 0 20px 0;">

      <td style="width:25%;float:left;margin:0;padding:0;display:block;">
        <img style="text-align:center;" class="logo" src="<?=  $pdf_data->signature ?>" />
      </td>


    </tr>
    <tr>
      <td></td>
    </tr>
  <tbody>
</table> -->







<!-- <table><tr>
  <td style="width:33%;"></td>
  <td style="width:33%;"><div><a href="https://www.facebook.com/singhautocare/" title="Facebook" target="_blank"><img style="text-align:center;" class="logo" src="{{ url('public/admin/dist/images/logo.png') }}" /></a></div></td>
  <td style="width:33%;"></td>
</tr>
</table> -->

<table>
  <tr>

    <td style="width:100%;">
      <div>
        <p style="font-size: 14px; line-height: 190%;text-align:center;"><strong>© 2022 Singh Auto Care. All Rights
            Reserved.</strong></p>
      </div>
    </td>

  </tr>
</table>