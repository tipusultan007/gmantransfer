<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <!-- Web Font / @font-face : BEGIN -->
    <!--[if mso]>
    <style>
        * {
            font-family: 'Roboto', sans-serif !important;
        }
    </style>
    <![endif]-->

    <!--[if !mso]>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->


    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color: #8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
    </style>

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
@php
    $date = new \Carbon\Carbon($mailData->created_at);
@endphp
<center style="width: 100%; background-color: #f5f6fa;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
        <tr>
            <td style="padding: 40px 0;">
                <table style="width:100%;max-width:620px;margin:0 auto;">
                    <tbody>
                    <tr>
                        <td style="text-align: center; padding-bottom:25px">
                            <a href="#"><img src="{{ asset('assets/images/disneycab.png') }}" alt="logo"></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                    <tbody>
                    <tr>
                        <td style="padding: 30px 30px">
                            <div><strong>Booking no :</strong> DC{{$mailData->disney_id}}</div>
                            <div><strong>Date : </strong> {{$date->format('d/m/Y H:m')}}</div>
                            <div><strong>Name : </strong> {{ $mailData->disney->first_name }} {{ $mailData->disney->last_name }}</div>
                            <div><strong>Phone no :</strong> {{ $mailData->disney->phone }}</div>
                            <div><strong>E-mail :</strong> {{ $mailData->disney->email }}</div>
                            <hr>
                            <h4 style="margin-top:5px;margin-bottom:5px;text-align: center">BOOKING SUMMARY</h4>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 30px">
                            @if($mailData->disney->tourtype=='oneway')
                                <div><strong>Journey type :</strong> Oneway</div>
                                <div><strong>Pickup date & time :</strong> {{$mailData->pickup_date1}} {{$mailData->pickup_time1}}</div>
                                <div><strong>Pickup From :</strong> {{$mailData->pickupFrom1->name}} {{$mailData->pickupHotel1->name??''}}</div>
                                <div><strong>Destination :</strong> {{$mailData->destinationName1->name}} {{$mailData->dropHotel->name??''}}</div>
                            @endif

                            @if($mailData->disney->tourtype=='roundtour')
                                <div><strong>Journey type :</strong> Round Tour</div>
                                <div><strong>Pickup date & time 1:</strong> {{$mailData->pickup_date1}} {{$mailData->pickup_time1}}</div>
                                <div><strong>Pick Up From 1:</strong> {{$mailData->pickupFrom1->name}} {{$mailData->pickupHotel1->name??''}}</div>
                                <div><strong>Destination 1:</strong> {{$mailData->destinationName1->name}} {{$mailData->dropHotel1->name??''}}</div>

                                <div><strong>Pickup date & time 2:</strong> {{$mailData->pickup_date2}} {{$mailData->pickup_time2}}</div>
                                <div><strong>Pick Up From 2:</strong> {{$mailData->pickupFrom2->name}} {{$mailData->pickupHotel2->name??''}}</div>
                                <div><strong>Destination 2:</strong> {{$mailData->destinationName2->name}} {{$mailData->dropHotel2->name??''}}</div>
                            @endif

                            @if($mailData->disney->tourtype=='multipletour')
                                <div><strong>Journey type :</strong> Multiple Tour</div>
                                <div><strong>Pickup date & time 1:</strong> {{$mailData->pickup_date1}} {{$mailData->pickup_time1}}</div>
                                <div><strong>Pick Up From 1:</strong> {{$mailData->pickupFrom1->name}} {{$mailData->pickupHotel1->name??''}}</div>
                                <div><strong>Destination 1:</strong> {{$mailData->destinationName1->name}} {{$mailData->dropHotel1->name??''}}</div>
                                <br>
                                <div><strong>Pickup date & time 2:</strong> {{$mailData->pickup_date2}} {{$mailData->pickup_time2}}</div>
                                <div><strong>Pick Up From 2:</strong> {{$mailData->pickupFrom2->name}} {{$mailData->pickupHotel2->name??''}}</div>
                                <div><strong>Destination 2:</strong> {{$mailData->destinationName2->name}} {{$mailData->dropHotel2->name??''}}</div>
                                <br>
                                <div><strong>Pickup date & time 3:</strong> {{$mailData->pickup_date3}} {{$mailData->pickup_time3}}</div>
                                <div><strong>Pick Up From 3:</strong> {{$mailData->pickupFrom3->name}} {{$mailData->pickupHotel3->name??''}}</div>
                                <div><strong>Destination 3:</strong> {{$mailData->destinationName3->name}} {{$mailData->dropHotel3->name??''}}</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px 30px 40px">
                            <div><strong>No of Passangers :</strong> {{$mailData->disney->passengers}}</div>
                            <div><strong>Flight / Train no :</strong> {{$mailData->disney->flight_no}}</div>
                            <div><strong>Luggage :</strong> {{$mailData->disney->luggages??'N/A'}}</div>
                            <div><strong>Vehicle type :</strong>
                                @if($mailData->disney->passengers>=5 && $mailData->disney->passengers <8 && $mailData->disney->vehicle_type=='car')
                                    Economy Class Van
                                @elseif($mailData->disney->passengers>=5 && $mailData->disney->passengers <8 && $mailData->disney->vehicle_type=='van')
                                    Business Class Van
                                @else
                                    {{strtoupper($mailData->disney->vehicle_type??'N/A')}}</div>
                            @endif
                            </div>

                            <hr>
                            <div><strong>Baby seats : </strong>{{$mailData->disney->child_seats??'N/A'}}</div>
                            <div><strong>Booster seats :</strong> {{$mailData->disney->booster??'N/A'}}</div>
                            <div><strong>Additional notes : </strong>{{$mailData->disney->notes??'N/A'}}</div>
                            <hr>
                            <h4>TOTAL FARE : {{$mailData->disney->total}} €</h4>
                            <strong>Payment option : </strong>{{$mailData->disney->paymentMethod->name}}

                        </td>
                    </tr>
                    </tbody>
                </table>
                <table style="width:100%;max-width:620px;margin:0 auto;">
                    <tbody>
                    <tr>
                        <td style="text-align: center; padding:25px 20px 0;">
                            <p style="font-size: 13px;">Copyright © 2023 Disneycab. All rights reserved.</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</center>
</body>
</html>
