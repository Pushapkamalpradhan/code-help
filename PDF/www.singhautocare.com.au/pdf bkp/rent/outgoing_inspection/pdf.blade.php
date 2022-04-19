<link
  href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
  rel="stylesheet">



<table style="width:100%;">

  <tr>

    <td style="width:33%;"></td>

    <td style="width:33%;">

      <div><img style="text-align:center;" class="logo" src="{{ url('public/admin/images/rantel_black_logo.png') }}" />
      </div>

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

        <strong>Booking No.</strong>: <br>#{{ $pdf_data->booking_number }}</span>

        <br>

        <strong>Booking Date / Time</strong>: <br>{{ date('d-m-y',strtotime($pdf_data->booking_date)) }}

        ({{ date('h:i A',strtotime($pdf_data->booking_time))  }})

        <br />

        <strong>Purpose of Booking</strong>: <br />{{ ucfirst($pdf_data->purpose_of_booking) }}

      </td>



      <td style="width:33%; vertical-align: top;">

        <strong>Rego:</strong><br />{{ $pdf_data->rego_no }}

        <br />

        <strong>Odometer:</strong><br />{{ $pdf_data->odometer }} KM

      </td>



      <td style="width:33%; vertical-align: top;">

        <strong>Return Date/Time:</strong><br />

        {{ (isset($pdf_data->return_date) && !empty($pdf_data->return_date)) ? date('d-m-y',strtotime($pdf_data->return_date)) : '--' }}

        ({{ (isset($pdf_data->return_time) && !empty($pdf_data->return_time)) ? date('h:i A',strtotime($pdf_data->return_time)) : '--'  }})

        <br />

        <strong>Fuel:</strong><br />{{ $pdf_data->fuel  }}</span>

      </td>

    </tr>

    <tr>
      <td></td>
    </tr>

  </tbody>

</table>

<!--Booking Info -->



<!--Outgoing Inspection Details Info -->

<table style="width:100%;">

  <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center;">

    <td style="padding:5px 0 10px; font-weight: 700;">Outgoing Inspection Details</td>

  </tr>



</table>



<table style="width:100%;">

  <tbody>



    @foreach($inspection_items_inputs as

    $inspection_items_input)

    <tr style="width:100%; font-family:lato; font-size:16px;">

      <td style="width:50%; border: 1px solid #7f7f7f7a; padding:5px;">
        <strong>{{ ucfirst($inspection_items_input->name) }}:</strong></td>

      <td style="width:50%; border: 1px solid #7f7f7f7a; padding:5px;">{{ucfirst($inspection_items_input->value)}}</td>

    </tr>

    @endforeach

    <tr>
      <td></td>
    </tr>

  </tbody>

</table>

<!--Outgoing Inspection Details Info -->



<!--Card Detail Info -->

<table style="width:100%;">

  <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center;">

    <td style="padding:5px 0 10px; font-weight: 700;">Card Details</td>

  </tr>

</table>



<table style="width:100%; font-family:lato; font-size:16px;">

  <tbody>

    <tr>

      <td style="width:50%; padding:5px;">

        <strong>Card Type</strong>: {{ $pdf_data->card_type }}

        <br>

        <strong>Expiry Date</strong>: {{ $pdf_data->card_date }}

      </td>



      <td style="width:50%; padding:5px;">

        <strong>Card Number</strong>: {{ $pdf_data->card_number }}

        <br>

        <strong>CVV: </strong>{{ $pdf_data->card_cvv }}

      </td>



    </tr>

  </tbody>

</table>

<!--Card Detail Info -->



<!--Additional Driver Info -->



@if(isset($additional_drivers[0]) && !empty($additional_drivers[0]))



<table style="width:100%;">

  <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center;">

    <td style="padding:5px 0 10px; font-weight: 700;">Additional Driver</td>

  </tr>

</table>



@foreach($additional_drivers as $additional_driver)

<table style="width:100%; font-family:lato; font-size:16px;">



  <tr style="width:100%;">

    <td style="width:50%; padding:5px;">

      <strong>Name</strong>: {{ $additional_driver->name }}

      <br>

      <strong>DOB</strong>: {{ date('d-m-Y',strtotime($additional_driver->dob)) }}

    </td>

    <td style="width:50%; padding:5px;">

      <strong>License Number</strong>: {{ $additional_driver->license_number }}

      <br>

      <strong>License Expiry Date</strong>: {{ date('d-m-Y',strtotime($additional_driver->license_expiry_date)) }}

    </td>

  </tr>

</table>

<table style="font-family:lato;">

  <tr style="width:100%;">

    <td style="width:35%;">
      <h3>License Images: </h3>
    </td>


    <td style="width:65%;">

      @if(isset($additional_driver->images) && !empty($additional_driver->images))

      @foreach(explode(',',$additional_driver->images) as $key => $limages)

      @if(isset($limages) && !empty($limages))

      <a href="{{ url('/').'/'.$limages }}" target="_blank"><img
          style="width:50px; border: 1px solid rgb(136, 136, 136); margin-left: 10px;"
          src="{{ url('/').'/'.$limages }}"></a>

      @endif

      @endforeach

      @endif

    </td>


  </tr>

</table>

@endforeach

@endif

<!--Additional Driver Info -->



<!--Upload (Images) Info -->

@if(isset($pdf_data->front_images) && !empty($pdf_data->front_images))



<table style="width:100%;">

  <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center; ">

    <td style="padding:5px 0 10px; font-weight: 700;">Upload (Images)</td>

  </tr>

</table>



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

@endif
<!--Upload (Images) Info -->

<!--Terms and condtions Info -->
<table style="width:100%; font-family:lato; font-size:16px;">

  <tbody>

    <tr >

      <td>
        <img style="width:16px;" src="{{ url('public/admin/images/check-box.png') }}">  <strong>Accidental
            Excess $1500 + Age Excess</strong>
            <br />
            <img style="width:16px;" src="{{ url('public/admin/images/check-box.png') }}">  <strong>Decline Card
            Charges $40</strong>
            <br />
            <img style="width:16px;" src="{{ url('public/admin/images/check-box.png') }}">  <strong>Late Fees $50
            per day</strong>
            <br />
            <img style="width:16px;" src="{{ url('public/admin/images/check-box.png') }}">  <strong>Fine & Toll
            Transfer $10 each</strong
            ><br />
            <img style="width:16px;" src="{{ url('public/admin/images/check-box.png') }}">  <strong>Km Allowed On
            Booking {{ '('.$pdf_data->km_allowed_on_booking_value.' KM)' }} </strong>
            <br />
            <img style="width:16px;" src="{{ url('public/admin/images/check-box.png') }}">  <strong>Cleaning
            Charges $70 (Minimum)</strong>
            <br />
            <img style="width:16px;" src="{{ url('public/admin/images/check-box.png') }}">  <strong>You have Agree
            With our Terms &amp; Conditions</strong>
          </td>

    </tr>
<tr><td></td></tr>
<tr><td></td></tr>
  </tbody>

</table>

<!--Terms and condtions Info -->
<table style="width:100%;">
  <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center;">
    <td style="padding:5px 0 10px; font-weight: 700;">Singh Auto Rental Terms and Conditions</td>
  </tr>
</table>

<table style="width:100%; font-family:lato; font-size:12px; ">

  <tr style="width:100%;">

    <td>

      <p>These Rental Terms and Conditions is between Singh Auto Rental and the customer.</p>
      <p>In these Terms and Conditions:</p>
      <p>“Australian Consumer Law” means: the Australian Consumer Law set out in Schedule 2 of the Competition and Consumer Act 2010 (cth) as amended or replacedfrom time time.</p>
      <p>"Authorized Driver / Joint Renter" means: an additional driver who is noted on the Rental Agreement as an Authorized Driver or Joint Renter.</p>
      <p>"Rental Period" means: the period commencing on the date shown on the Rental Document and ending on the date that you return the Vehicle to Singh Auto Rental</p>
      <p>"Substitute Vehicle Insurance" means: a policy of motor vehicle insurance held by Youb or an Authorized Driver which covers You or the Authorized Driver while You or the Authorized Driver use theVehicle as a substitute for the vehicle insured under that policy</p>
      <p>"Vehicle" means: the vehicle described on the Rental Document (or any substitute vehicle), and includes its parts, components, accessories and contents supplied by Singh Auto Rental</p>
      <p>"You" or "Your" refers: to the person(s) with whom the Rental Agreement is made.</p>
      <p>"Your Consumer Rights" means: Your rights as a consumer under applicable consumer protection legislation, including the Australian Consumer Law, which cannot be excluded, restricted ormodified by this Rental Agreement.</p>
    </td>
    </tr>
    <tr>
      <td>
      <h3>1. DRIVER</h3>
      <p>You agree, acknowledge and warrant that:</p>
      <p>(a) only You or an Authorized Driver will drive the Vehicle; and</p>
      <p>(b) You and any Authorized Driver are currently licensed to drive the Vehicle and have been so licensed to drive for a period of 12 months or longer (excluding any time under a learner's permit or a provisional license); and</p>
      <p>(c) You and the Authorized Driver are not under 21 years age; and</p>
      <p>(d) You and the Authorized Driver have not had Your driver’s license canceled, endorsed or suspended within the last three years.</p>
    </td>
  </tr>
  <tr>
    <td>
      <h3>2. VEHICLE</h3>
<p>You and any Authorized Driver must only use the Vehicle on a road, which is properly formed and constructed as a sealed, metaled or graded gravel road. You and any Authorized Driver must not, unless authorized in writing by Singh Auto Rental, drive or take the Vehicle to places not mentioned in your rental agreement.</p>
</td>
</tr>
<tr>
  <td>
<h3>3. USE OF THE VEHICLE</h3>
<p>You and any Authorized Driver must:</p>
<p>(a) not allow the Vehicle to be used for any illegal purpose, race, contest or performance test of any kind;</p>
<p>(b) not allow the Vehicle to be used to tow or push anything;</p>
<p>(c) not carry more passengers than may be properly accommodated by the seat belt restraints provided in the  Vehicle, or carry a greater load than that for which it was built;</p>
<p>(d) not be under the influence of alcohol, drugs or have a blood alcohol content that exceeds the legal limit  in the State or Territory in which the Vehicle is driven;</p>
<p>(e) not allow the Vehicle to be used to carry passengers for payment or reward of any kind;</p>
<p>(f) not use the Vehicle when it is damaged or unsafe;</p>
<p>(g) not use the Vehicle to transport goods, except in compliance with all necessary approvals, permits,  licenses and government requirements and in accordance with the Vehicle manufacturer's and Singh Auto Rental’s  recommendations;</p>
<p>(h) not use the Vehicle for the conveyance or towing of any load which is incorrectly loaded or secured or is in excess of that for which the Vehicle was constructed;</p>
<p>(i) not, without Singh Auto Rental’s prior written consent, use the Vehicle to carry any inflammable substance which has a flash point under 22.8°C or any other explosive or corrosive substances;</p>
<p>(j) not use the Vehicle in contravention of any law.</p>
<p>You must pay for any unauthorized repairs to the Vehicle and for all parking and traffic infringements in respect of the Vehicle during the Rental Period. You and any Authorized Driver must not carry any animal or pet in the Vehicle. You and any Authorized Driver or any passenger must not smoke in the Vehicle.</p>
</td>
</tr>
<tr>
  <td>
  <h3>4. MAINTENANCE, SECURITY AND SAFETY</h3>   
   <p>You and any Authorized Driver must:</p>
      <p>(a) maintain all of the Vehicle’s engine oils and engine coolant levels to the manufacturer’s specifications, as set out in the Vehicle’s operations manual located in the glove box or otherwise as required to maintain the Vehicle’s efficient performance;</p>
      <p>(b) keep the Vehicle locked and the keys under Your or the Authorized driver’s personal control at all times;</p>
      <p>(c) comply with any applicable seat belt and child restraint laws.</p>
      <p>You must not service the Vehicle or have repairs to the Vehicle carried out unless Singh Auto Rental authorises You to do so. Singh Auto Rental will reimburse You for any repairs to the vehicle authorised by it, provided that the cost of those repairs is verified.</p>
    </td>
  </tr>
  <tr>
    <td>
      <h3>5. LOSS DAMAGE WAIVER, DAMAGE AND LOSS OF PROPERTY</h3>
      <p>5.1 You are liable:</p>
  
      <p>(a) for the loss of, and all damage to, the Vehicle; and</p>
  <p>(b) for all damage to the property of any person:</p>
  <p>(i)  which is caused or contributed to by You or an Authorized Driver; or</p>
    <p>(ii) which arises from the use of the Vehicle by You or an Authorized Driver.</p>
  
  <p>5.2 Subject to if:</p>
  
  <p>(a) You accept the Loss Damage Waiver option on the Rental Document at the commencement of the Rental Period; and</p>
  <p>(b) where applicable, You pay the excess shown on the Rental Document for each separate event involving damage to or loss of the Vehicle or for each separate event involving damage to the property of any third party which is caused by or arises from the use of the Vehicle by You or an Authorized Driver</p>
  <p>(c) waives Your liability for damage to the Vehicle or loss of the Vehicle;</p>
  <p>(d) provided that You and any Authorized Driver are entitled to be indemnified under a policy of motor vehicle insurance provided by a registered insurer for Your and an Authorized Driver’s legal liability to a third party for damage to the property of that third party which is  caused by the use of the Vehicle by You or an Authorized Driver.</p>
</td>
</tr>
<tr>
  <td>
  <p>5.3 You must always pay:</p>
  
  <p>(a) the excess shown on the Rental Document if there is damage to or loss of the Vehicle or if there is damage to the property of any third party;</p>
  <p>(b) the cost of rectifying any tyres damage not attributable to normal wear and tear;</p>
  <p>(c) the cost of repairing any damage caused deliberately or recklessly by:</p>
  <p>(i) You;</p>
      <p>(ii) any other driver of the Vehicle; or</p>
      <p>(iii) any passenger carried during the Rental Period;</p>
      <p>(d) the cost of repairing any damage to the Vehicle or to third party property caused by You or an Authorized Driver using, or permitting the Vehicle to be used, in any area prohibited by the Rental Agreement;</p>
  <p>(e) the cost of repairing overhead or roof damage caused by, but not limited to, contact between the Vehicle and objects overhanging or obstructing the path of the Vehicle; or</p>

  <p>(f) the cost of repairing any water damage to the Vehicle or any underbody damage, and any resulting damage from that underbody damage, to the Vehicle;</p>
  <p>(g) Under any circumstances where the Vehicle has been refueled with fuel other than that recommended by the Vehicle manufacturer;</p>
  <p>(h) Under any circumstances where the Vehicle and its keys are unsecured.  </p>
  
  <p>5.4 You must pay for any damage or repair that may be reasonably determined by Singh Auto Rental the amount which includes:</p>
</td>
</tr>
<tr>
  <td>
  <p>(a) the cost of repairs to the Vehicle or the market value of the Vehicle at the time of the loss or damage, whichever is the lesser;</p>
  <p>(b) appraisal fees;</p>
  <p>(c) towing, storage and recovery costs;</p>
  <p>(d) a reasonable administrative fee reflecting the cost of making arrangements for repairs and towing and other administrative activities; and</p>
  <p>(e) a per day loss of use fee based on the estimated downtime of the Vehicle. </p>
</td>
</tr>
<tr>
  <td>
  <h3>6. RETURN OF VEHICLE</h3>

<p>You must return the Vehicle to Singh Auto Rental:</p>

<p>(a) to the place, on the date and by the time shown on the Rental Document;</p>
<p>(b) in the same condition as it was at the commencement of the Rental Period, fair wear and tear excepted;</p>
<p>(c) with a full tank of fuel</p>

<p>You must return the Vehicle to the Singh Auto Rental location during our normal business hours. If You return the vehicle later than the time shown on the rental document, You must pay all additional rental charges. If: </p>

<p>(a) You return the Vehicle on a date, or at a time, or to a place other than  that shown on the Rental Document; or</p>
<p>(b) any special conditions set out in the “Rates” section on the Rental Document are breached, the rates shown on the Rental Document will not apply and You must pay the Singh Auto Rental standard rate for the Vehicle for the Rental Period.</p>
</td>
</tr>
<tr>
  <td>
<p>Rentals may request the immediate return of the Vehicle, or Singh Auto Rental may re-take the Vehicle without notice, if it reasonably suspects that:</p>

<p>(a) You have breached a term or condition of the Rental Agreement;</p>
<p>(b) damage to the Vehicle, or injury to persons or property is likely to occur; or</p>
<p>(c) the Vehicle will be involved in an industrial dispute; or</p>
<p>(d) the Vehicle may be used for an unlawful purpose; You must also pay Singh Auto Rental any cost it incurs as well as all costs and charges under the Rental Agreement for the period up to return/ repossession of the Vehicle.</p>

<p>Singh Auto Rental reserves the right to refuse hire of another vehicle to You following any incident or accident or where You have breached a condition of Rental Agreement.</p>
</td>
</tr>
<tr>
  <td>
<h3>7. CLAIMS AND PROCEEDINGS</h3>

<p>Where the use of the Vehicle by You, an Authorized Driver, or any other person results in an accident or claim, or where damage or loss is  sustained to the Vehicle or any third party property, You and/or any Authorized Driver must:</p>

<p>(a) promptly report such incident to the local police;</p>
<p>(b) promptly report such incident in writing;</p>
<p>(c) not, without Singh Auto Rental’s written consent, make or give any offer, promise of payment, settlement, waiver, release, indemnity or admission of liability;</p>
<p>(d) permit Singh Auto Rental or its insurer at its own cost to bring, defend, enforce or settle any legal proceedings against a third party in Your name;</p>
<p>(e) permit or ensure that Singh Auto Rental may claim in Your name or that of the Authorized Driver under any applicable Substitute Vehicle Insurance, and assist, and cause the Authorized Driver to assist, Singh Auto Rental in making such a claim, including assigning any right to claim under any Substitute Vehicle Insurance to Singh Auto Rental;</p>
<p>(f) complete and furnish to Singh Auto Rental within a reasonable time any statement, information or assistance which Singh Auto Rental or its insurer may reasonably require, including attending at a lawyer's office and at Court to give evidence.</p>
</td>
</tr>
<tr>
  <td>
<h3>8. PAYMENT INFORMATION</h3>

<p>At the end of the Rental Period, You must pay Singh Auto Rental on demand:</p>

<p>(a) all charges specified on the Rental Document and all charges payable under the Rental Agreement;</p>
<p>(b) any amount paid or payable by Singh Auto Rental or You to any person arising out of Your use of the Vehicle or imposed on You by any governmental or other competent authority; </p>
<p>(c) any amount for which You are liable to Singh Auto Rental under the Rental Agreement.</p>

<p>The minimum charge You must pay for the rental of the Vehicle is an amount equivalent to:</p>

<p>(a) one day's rental at the "daily rate" as explained on the Rental Document; </p>
<p>(b) the amount payable for the number of kilometers driven during the Rental Period.</p>

<p>Distance charges are measured from the Vehicle's odometer. You authorize Singh Auto Rental to charge all money payable to Singh Auto Rental under the Rental Agreement to Your credit card or charge account.</p>
</td>
</tr>
<tr>
  <td>
<h3>9. LIABILITY</h3>

<p>Unless it is negligent, Singh Auto Rental is not liable to any person, and You indemnify Singh Auto Rental, for any loss of, or damage to, any property:</p>

<p>(a) stolen from the Vehicle or otherwise lost during the rental; or</p>
<p>(b) left in the Vehicle after its return to Singh Auto Rental.</p>
</td>
</tr>
<tr>
  <td>
<h3>10. TERMINATION</h3>

<p>Either party may terminate the Rental Agreement at any time if the other party commits a material breach of the Rental Agreement. You may terminate the Rental Agreement at any time for any other reason. If the Rental Agreement is terminated early for any reason other than a breach by Singh Auto Rental Car. You agree to pay rental charges that reflect the actual duration of the rental. Such charges may be higher than those that apply for a longer rental period.</p>
</td>
</tr>
<tr>
  <td>
<h3>11. PRESUMPTIONS AND INTERPRETATION</h3>

<p>Unless the context otherwise requires:</p>

<p>(a) A word that denotes the singular denotes the plural and vice versa;</p>
<p>(b) Any gender denotes the other genders; and</p>
<p>(c) A person includes an individual, a body corporate and a government body.</p>

<p>Unless the context otherwise requires, a reference to:</p>

<p>(a) Any legislation includes any regulation or instrument made under it and where amended, re-enacted or replaced means that amended, re-enacted or replaced legislation;</p>
<p>(b) Any other agreement or instrument, where a </p>                                                                                                                               

 <p>If you don't add an additional driver in the rental agreement when you pick up the vehicle & if the unauthorized driver is driving the vehicle & had an accident that's not covered in the insurance policy. We will not make any claim and we will not accept your accident's claim. It's not a finished matter by paying accident's excess. We will not take any responsibility for the third party's vehicle damages cost (Recovery Cost). </p>

 <p>Renter must turn off engine & locked vehicle whenever you come outside of the vehicle. If you leave key in ignition & don't locked the vehicle, it is counting breach of the rental agreement a per breach of the vehicle safety.</p>

</td>
  </tr>

</table>

<!--Terms and condtions Info -->

<!--Signature-->
<table style="width:100%;">
  <tr style="background:#5a5b5b; color:white; font-family:lato; font-size:20px;  text-align:center;">
    <td style="padding:5px 0 10px; font-weight: 700;">Customer Signature</td>
  </tr>
</table>

<table style=";width:100%;float:left;margin-top:10px;">

  <tbody style="width:100%;">

    <tr style="margin:0 0 20px 0;width:100%;">

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

      <td style="width:100%;float:left;margin:0;padding:0;display:block;">

        <img style="text-align:center;width:350px;hight:150px;float:left;" class="logo"
          src="{{ url('public/temp').'/'.$signature_filename }}" />

      </td>

    </tr>

    <table style="width:100%;margin-bottom:110px; font-family:lato; font-size:16px; ">

    </table>

    <tr>

      <td style="font-family:lato; font-size:16px;">{{ date('d-m-Y',strtotime($pdf_data->created_at)) }} /
          {{ date('h:i A',strtotime($pdf_data->created_at)) }}</td>

    </tr>

</table>

<table style="width:100%; font-family:lato; font-size:16px;">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>
      <p><strong>Notes</strong>: {{ (isset($pdf_data->note)) ? $pdf_data->note : '' }}</p>
    </td>
  </tr>
  <tr>

    <td></td>

  </tr>

</table>

<!-- New -->





<table style="width:100%;">

  <tr>



    <td style="width:100%;">

      <div>

        <p style="font-family:lato; font-size:16px; text-align:center;">
          <strSignatureong>© 2022 Singh Auto Rental. All Rights

            Reserved.</strong>
        </p>

      </div>

    </td>



  </tr>

</table>
