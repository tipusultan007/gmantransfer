<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>GmanTransfer</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{asset('intlTelInput.css')}}">

    <style>
        .iti.iti--allow-dropdown {
            width: 100%;
        }
        .vehicleType img {
            height: 100%;
            width: 50%;
            cursor: pointer;
            transition: transform 1s;
        }

        .vehicleType label {
            overflow: hidden;
            position: relative;
        }

        .imgbgchk:checked + label > .tick_container {
            opacity: 1;
        }

        /*         aNIMATION */
        .imgbgchk:checked + label > img {
            opacity: 0.3;
            border: 2px solid #007BFF;
            border-radius: 10px;
        }

        .tick_container {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
        }

        .tick {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 6px 12px;
            height: 40px;
            width: 40px;
            border-radius: 100%;
        }

        @media (max-width: 480px) {
            .vehicleType .col-sm-6 {
                width: 50% !important;
            }
        }
    </style>
</head>

<body class="nk-body bg-white npc-general pg-survey">
@php
    $pickups = \App\Models\PickupFrom::all();
    $pickupHotels = \App\Models\PickupHotel::where('pickup_from_id',4)->get();
    $dropoffHotels = \App\Models\DropoffHotel::where('destination_id',4)->get();
@endphp
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-split nk-split-page nk-split-lg">
                    <!-- .nk-split-content -->
                    <div
                        class="nk-split-content nk-split-stretch bg-white p-5 d-flex justify-center align-center flex-column">
                        <div class="wide-xs-fix">
                            <form class="nk-stepper stepper-init is-alter" id="stepper-survey-v2">
                                @csrf
                                <div class="nk-stepper-content">
                                    <div class="nk-stepper-progress stepper-progress mb-4">
                                        <div class="stepper-progress-count mb-2"></div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar stepper-progress-bar"></div>
                                        </div>
                                    </div>
                                    <div class="nk-stepper-steps stepper-steps">
                                        <div class="nk-stepper-step">
                                            <div class="row g-4">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label text-uppercase">Choose Your Tour
                                                            Type</label>
                                                        <ul
                                                            class="custom-control-group custom-control-horizontal  w-100">
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                    <input type="radio" class="custom-control-input"
                                                                           id="typeOneway" value="oneway"
                                                                           name="tourtype" checked required>
                                                                    <label class="custom-control-label"
                                                                           for="typeOneway">
                                                                        <span class="d-flex align-center">
                                                                            <span class="ms-1">
                                                                                <span class="lead-text">One
                                                                                    Way</span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                    <input type="radio" class="custom-control-input"
                                                                           id="typeRoundTour" value="roundtour"
                                                                           name="tourtype" required>
                                                                    <label class="custom-control-label"
                                                                           for="typeRoundTour">
                                                                        <span class="d-flex align-center">
                                                                            <span class="ms-1">
                                                                                <span class="lead-text">Round
                                                                                    Tour</span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                    <input type="radio" class="custom-control-input"
                                                                           id="typeMultipleTour" value="multipletour"
                                                                           name="tourtype" required>
                                                                    <label class="custom-control-label"
                                                                           for="typeMultipleTour">
                                                                        <span class="d-flex align-center">
                                                                            <span class="ms-1">
                                                                                <span class="lead-text">Multiple
                                                                                    Tour</span>

                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label text-uppercase"
                                                               for="sv2-select-position">
                                                            Pick Up From</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2"
                                                                    id="pickup_from1" name="pickup_from1"
                                                                    data-placeholder="Select Location"
                                                                    data-allow-clear="on" required>
                                                                <option value=""></option>
                                                                @foreach($pickups as $pickup)
                                                                    <option value="{{ $pickup->id }}">{{
                                                                            $pickup->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pickup_hotel1">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="phone">Pickup
                                                            Hotels</label>
                                                        <div class="form-control-wrap">
                                                            <select
                                                                class="required form-select js-select2 form-control activehotel"
                                                                id="pickup_hotel1" name="pickup_hotel1"
                                                                onchange=""
                                                                data-placeholder="Please Select a hotel"
                                                                data-allow-clear="true" required>
                                                                <option value="">Please Select a hotel</option>
                                                                @foreach($pickupHotels as $pickupHotel)
                                                                    <option value="{{ $pickupHotel->id }}">{{
                                                                            $pickupHotel->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12 pickup_address1">
                                                    <div class="form-group ">
                                                        <label class="form-label text-uppercase" for="pickup_address1">Pick
                                                            Up Address</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="pickup_address1"
                                                                   class="form-control" id="pickup_address1"
                                                                   placeholder="Pick up address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 destination1">
                                                    <div class="form-group ">
                                                        <label class="form-label"
                                                               for="fullname">Destination</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2 required"
                                                                    name="destination1" id="destination1"
                                                                    data-placeholder="Choose Location"
                                                                    data-allow-clear="true" required>
                                                                <option value="">Choose Location</option>
                                                                @foreach($pickups as $pickup)
                                                                    <option value="{{ $pickup->id }}">{{
                                                                            $pickup->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 dropoff_address1">
                                                    <div class="form-group">
                                                        <label class="form-label" for="dropoff_address2">Drop Off
                                                            Address</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="dropoff_address1"
                                                                   class="form-control" id="dropoff_address1">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12 drop_hotel1">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="phone">Drop Off
                                                            Place</label>
                                                        <div class="form-control-wrap">
                                                            <select
                                                                class="required form-select js-select2 form-control activehotel"
                                                                name="drop_hotel1" id="drop_hotel1" onchange=""
                                                                data-placeholder="Please Select a hotel"
                                                                data-allow-clear="true">
                                                                <option value="">Please Select a hotel</option>
                                                                @foreach($dropoffHotels as $dropHotel)
                                                                    <option value="{{ $dropHotel->id }}">{{
                                                                            $dropHotel->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pickup_from2">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="fullname">Pick Up
                                                            Location</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2 required"
                                                                    name="pickup_from2" id="pickup_from2"
                                                                    data-placeholder="Choose Location"
                                                                    data-allow-clear="true">
                                                                <option value="">Choose Location</option>
                                                                @foreach($pickups as $pickup)
                                                                    <option value="{{ $pickup->id }}">{{
                                                                            $pickup->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pickup_hotel2">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="phone">Pickup
                                                            Hotels</label>
                                                        <div class="form-control-wrap">
                                                            <select
                                                                class="required form-select js-select2 form-control activehotel"
                                                                name="pickup_hotel2" id="pickup_hotel2"
                                                                onchange=""
                                                                data-placeholder="Please Select a hotel"
                                                                data-allow-clear="true">
                                                                <option value="">Please Select a hotel</option>
                                                                @foreach($pickupHotels as $pickupHotel)
                                                                    <option value="{{ $pickupHotel->id }}">{{
                                                                            $pickupHotel->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pickup_address2">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="pickup_address2">Pick Up
                                                            Address</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="pickup_address2"
                                                                   class="form-control" id="pickup_address2">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 destination2">
                                                    <div class="form-group ">
                                                        <label class="form-label"
                                                               for="fullname">Destination</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2 required"
                                                                    name="destination2" id="destination2"
                                                                    data-placeholder="Choose Location"
                                                                    data-allow-clear="true">
                                                                <option value="">Choose Location</option>
                                                                @foreach($pickups as $pickup)
                                                                    <option value="{{ $pickup->id }}">{{
                                                                            $pickup->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-12 dropoff_address2">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="dropoff_address2">Drop Off
                                                            Address</label>
                                                        <input type="text" name="dropoff_address2"
                                                               class="form-control" id="dropoff_address2">
                                                    </div>
                                                </div>
                                                <div class="col-12 drop_hotel2">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="phone">Drop Off
                                                            Place</label>
                                                        <div class="form-control-wrap">
                                                            <select
                                                                class="required form-select js-select2 form-control activehotel"
                                                                name="drop_hotel2" id="drop_hotel2" onchange=""
                                                                data-placeholder="Please Select a hotel"
                                                                data-allow-clear="true">
                                                                <option value="">Please Select a hotel</option>
                                                                @foreach($dropoffHotels as $dropHotel)
                                                                    <option value="{{ $dropHotel->id }}">{{
                                                                            $dropHotel->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-12 pickup_from3">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="fullname">Pick Up
                                                            Location</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2 required"
                                                                    name="pickup_from3" id="pickup_from3"
                                                                    data-placeholder="Choose Location"
                                                                    data-allow-clear="true">
                                                                <option value="">Choose Location</option>
                                                                @foreach($pickups as $pickup)
                                                                    <option value="{{ $pickup->id }}">{{
                                                                            $pickup->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-12 pickup_address3">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="pickup_address3">Pick Up
                                                            Address</label>
                                                        <input type="text" name="pickup_address3"
                                                               class="form-control" id="pickup_address3">
                                                    </div>
                                                </div>
                                                <div class="col-12 pickup_hotel3">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="phone">Pickup
                                                            Hotels</label>
                                                        <div class="form-control-wrap">
                                                            <select
                                                                class="required form-select js-select2 form-control activehotel"
                                                                name="pickup_hotel3" onchange=""
                                                                data-placeholder="Please Select a hotel"
                                                                id="pickup_hotel3" data-allow-clear="true">
                                                                <option value="">Please Select a hotel</option>
                                                                @foreach($pickupHotels as $pickupHotel)
                                                                    <option value="{{ $pickupHotel->id }}">{{
                                                                            $pickupHotel->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-12 destination3">
                                                    <div class="form-group ">
                                                        <label class="form-label"
                                                               for="fullname">Destination</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2 required"
                                                                    name="destination3" id="destination3"
                                                                    data-placeholder="Choose Location"
                                                                    data-allow-clear="true">
                                                                <option value="">Choose Location</option>
                                                                @foreach($pickups as $pickup)
                                                                    <option value="{{ $pickup->id }}">{{
                                                                            $pickup->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-12 dropoff_address3">
                                                    <div class="form-group ">
                                                        <label class="form-label text-uppercase" for="dropoff_address3">Drop
                                                            Off
                                                            Address</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="dropoff_address3"
                                                                   class="form-control" id="dropoff_address3">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 drop_hotel3">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="phone">Drop Off
                                                            Place</label>
                                                        <div class="form-control-wrap">
                                                            <select
                                                                class="required form-select js-select2 form-control activehotel"
                                                                name="drop_hotel3" id="drop_hotel3" onchange=""
                                                                data-placeholder="Please Select a hotel"
                                                                data-allow-clear="true">
                                                                <option value="">Please Select a hotel</option>
                                                                @foreach($dropoffHotels as $dropHotel)
                                                                    <option value="{{ $dropHotel->id }}">{{
                                                                            $dropHotel->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-12 passenger">
                                                    <div class="form-group ">
                                                        <label class="form-label" for="passengers">Passengers</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control js-select2" name="passengers"
                                                                    id="passengers"
                                                                    data-placeholder="Select Passengers"
                                                                    data-allow-clear="on" required>
                                                                <option value="">Select Passengers</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                                <option value="17">17</option>
                                                                <option value="18">18</option>
                                                                <option value="19">19</option>
                                                                <option value="20">20</option>
                                                                <option value="21">21</option>

                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-12 vehicleType">
                                                    <span class="preview-title overline-title">Vehicle Type</span>
                                                    <ul class="row g-3">
                                                        <li class="col-6 car">
                                                            <div
                                                                class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                                                                <input type="radio" class="custom-control-input"
                                                                       name="vehicle_type" id="vehicleTypeCar"
                                                                       value="car" checked required="">
                                                                <label class="custom-control-label"
                                                                       for="vehicleTypeCar">
                                                                <span
                                                                    class="d-flex flex-column text-center py-1 py-sm-2">
                                                                    <span class="icon-wrap xl">
                                                                        <img class="img"
                                                                             src="{{ asset('assets/images/car.jpg') }}"
                                                                             alt="">
                                                                    </span>
                                                                    <span class="lead-text mb-1 mt-3">Car</span>

                                                                </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li class="col-6 van">
                                                            <div
                                                                class="custom-control custom-control-sm custom-radio pro-control custom-control-full checked">
                                                                <input type="radio" class="custom-control-input"
                                                                       name="vehicle_type" id="vehicleTypeVan"
                                                                       value="van" required="">
                                                                <label class="custom-control-label"
                                                                       for="vehicleTypeVan">
                                                                <span
                                                                    class="d-flex flex-column text-center py-1 py-sm-2">
                                                                    <span class="icon-wrap xl">
                                                                        <img class="img"
                                                                             src="{{ asset('assets/images/van.jpg') }}"
                                                                             alt="">
                                                                    </span>
                                                                    <span class="lead-text mb-1 mt-3">Van</span>
                                                                </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li class="col-6 economy">
                                                            <div
                                                                class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                                                                <input type="radio" class="custom-control-input"
                                                                       name="vehicle_type" id="vehicleTypeEconomy"
                                                                       value="car" required="">
                                                                <label class="custom-control-label"
                                                                       for="vehicleTypeEconomy">
                                                                <span
                                                                    class="d-flex flex-column text-center py-1 py-sm-2">
                                                                    <span class="icon-wrap xl">
                                                                        <img class="img"
                                                                             src="{{ asset('assets/images/Economy.jpg') }}"
                                                                             alt="">
                                                                    </span>
                                                                    <span class="lead-text mb-1 mt-3">Economy Class Van</span>

                                                                </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li class="col-6 business">
                                                            <div
                                                                class="custom-control custom-control-sm custom-radio pro-control custom-control-full checked">
                                                                <input type="radio" class="custom-control-input"
                                                                       name="vehicle_type" id="vehicleTypeBusiness"
                                                                       value="van" required="">
                                                                <label class="custom-control-label"
                                                                       for="vehicleTypeBusiness">
                                                                <span
                                                                    class="d-flex flex-column text-center py-1 py-sm-2">
                                                                    <span class="icon-wrap xl">
                                                                        <img class="img"
                                                                             src="{{ asset('assets/images/business.jpg') }}"
                                                                             alt="">
                                                                    </span>
                                                                    <span class="lead-text mb-1 mt-3">Business Class Van</span>
                                                                </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mt-4 mb-2">
                                                        <h4>Total Fare: <span class="text-danger total_fare">0</span>
                                                            €</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-stepper-step">
                                            <div class="row pickuptime1">
                                                <div class="form-group col-sm-6">
                                                    <label for="pickupdate1" class="form-label">Pickup Date</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="pickup_date1"
                                                               class="form-control date-picker required" data-date-format="yyyy-mm-dd" id="pickupdate1"
                                                               autocomplete="off" required>
                                                    </div>

                                                </div>

                                                <div class="form-group timepicker1 col-sm-6">
                                                    <label for="timepicker1" class="form-label">Pickup Time</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="pickup_time1"
                                                               class="form-control timepicker required" id="timepicker1"
                                                               autocomplete="off" required>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row pickuptime2">
                                                <div class="form-group col-sm-6">
                                                    <label for="pickupdate2" class="form-label">Pickup Date</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="pickup_date2"
                                                               class="form-control date-picker" id="pickupdate2"
                                                               autocomplete="off">
                                                    </div>

                                                </div>

                                                <div class="form-group timepicker2 col-sm-6">
                                                    <label for="timepicker2" class="form-label">Pickup Time</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="pickup_time2"
                                                               class="form-control timepicker" id="timepicker2"
                                                               autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pickuptime3">
                                                <div class="form-group col-sm-6">
                                                    <label for="pickupdate2" class="form-label">Pickup Date</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="pickup_date2"
                                                               class="form-control date-picker" id="pickupdate2"
                                                               autocomplete="off">
                                                    </div>

                                                </div>

                                                <div class="form-group timepicker1 col-sm-6">
                                                    <label for="timepicker3" class="form-label">Pickup Time</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="pickup_time3"
                                                               class="form-control timepicker" id="timepicker3"
                                                               autocomplete="off">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label class="form-label" for="">Arrival Flight Number</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="flight_no"
                                                               placeholder="EX: EZY6235" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label class="form-label" for="luggages">Luggages</label>
                                                    <div class="form-control-wrap">
                                                        <select class="js-select2 form-control"
                                                                name="luggages" data-placeholder="Choose Luggages">
                                                            <option value="">Choose Luggages</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15+">15+</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <ul class="custom-control-group g-3 align-center">
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="addChildSeats"
                                                                       class="custom-control-input" value="yes"
                                                                       id="addChildSeats">
                                                                <label class="custom-control-label" for="addChildSeats">Add
                                                                    Child Seats</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="addNotes" value="yes"
                                                                       class="custom-control-input" id="addNotes">
                                                                <label class="custom-control-label" for="addNotes">Add
                                                                    Notes</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row mt-2 extraseats">
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label class="form-label" for="childSeat">Child Seat</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" min="0" class="form-control"
                                                               name="child_seat" id="child_seat">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-6">
                                                    <label class="form-label" for="childSeat">Booster</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" min="0" class="form-control" name="booster"
                                                               id="booster">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group notes">
                                                <label class="form-label" for="">Additional Notes</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="notes" class="form-control"
                                                           placeholder="EX: Bulky luggage, Wheel chair, etc">
                                                </div>
                                            </div>

                                            <div class="mt-4 mb-2">
                                                <h4>Total Fare: <span class="text-danger total_fare">0</span> €</h4>
                                            </div>
                                        </div>
                                        <div class="nk-stepper-step">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label class="form-label" for="firstName">First Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="first_name" id="first_name"
                                                               class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-label" for="lastName">Last Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="last_name" id="last_name"
                                                               class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group col-6">
                                                    <label class="form-label" for="email">Email</label>
                                                    <div class="form-control-wrap">
                                                        <input type="email" name="email" id="email" class="form-control"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-label" for="phone">Phone</label>
                                                    <div class="form-control-wrap">
                                                        <input type="tel" name="phone" id="phone" class="form-control"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Payment Method</label>
                                                    <ul class="custom-control-group custom-control-horizontal w-100">
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                <input type="radio" class="custom-control-input" name="payment_method_id" value="1" id="cashPayment">
                                                                <label class="custom-control-label" for="cashPayment">
                                                                    <span>Cash to the driver</span>
                                                                </label>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                <input type="radio" class="custom-control-input" name="payment_method_id" value="3" id="cardPayment">
                                                                <label class="custom-control-label" for="cardPayment">
                                                                    <span>Card</span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                <input type="radio" class="custom-control-input" name="payment_method_id" value="4" id="bankPayment">
                                                                <label class="custom-control-label" for="bankPayment">
                                                                    <span>Bank</span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-radio custom-control-pro checked">
                                                                <input type="radio" class="custom-control-input" name="payment_method_id" value="2" id="cardToTheDriver">
                                                                <label class="custom-control-label" for="cardToTheDriver">
                                                                    <span>Card to the driver (+5€)</span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="mt-4 mb-2">
                                                <h4>Total Fare: <span class="text-danger total_fare">0,00</span> €</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nk-stepper-pagination pt-4 gx-4 gy-2 stepper-pagination">
                                    <li class="step-prev">
                                        <button class="btn btn-dim btn-primary">Back</button>
                                    </li>
                                    <li class="step-next">
                                        <button class="btn btn-primary">Continue</button>
                                    </li>
                                    <li class="step-submit">
                                        <button class="btn btn-primary" id="submit">Submit</button>
                                    </li>
                                </ul>
                                <input type="hidden" name="total" id="total" class="total_fare">
                        </form>
                    </div>
                </div><!-- .nk-split-content -->
            </div><!-- .nk-split -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- content @e -->
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{ asset('assets/js/bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('intlTelInput.js') }}"></script>

<!-- select region modal -->
<script>
    var stepperForm;
    var pickup_from1 = "";
    var pickup_from2 = "";
    var pickup_from3 = "";
    var destination1 = "";
    var destination2 = "";
    var destination3 = "";
    var passengers = "";
    var vehicleType = "car";
    var tourtype = "oneway";
    var totalFare;
    var temp;
    var onewayPrice = 0;
    var roundtourPrice = 0;
    var multipletourPrice = 0;

    $('.timepicker').timepicker();
    $('.date-picker').datepicker({
        startDate: new Date(),
        autoclose: true,
    });
    //Start Step 01
    $(".passenger").hide();
    $(".extraseats,.notes").hide();
    $(".vehicleType").hide();
    $(".pickup_from2,.pickup_from3").hide();
    $(".destination2,.destination3").hide();
    $(".pickup_hotel1,.pickup_hotel2,.pickup_hotel3").hide();
    $(".pickuptime2,.pickuptime3").hide();
    $(".drop_hotel1,.drop_hotel2,.drop_hotel3").hide();
    $(".pickup_address1, .pickup_address2, .pickup_address3, .dropoff_address1, .dropoff_address2, .dropoff_address3").hide();

    $(".economy,.business").hide();

    $("input[name='tourtype']").on('change', function () {
        let value = $("input[name='tourtype']:checked").val();
        tourtype = value;
        switch (value) {
            case "oneway":
                pickup_from1 = "";
                pickup_from2 = "";
                pickup_from3 = "";
                destination1 = "";
                destination2 = "";
                destination3 = "";
                passengers = "";
                vehicleType = "car";
                temp = 0;
                $(".pickup_from1").show();
                $(".pickuptime1").show();
                $(".pickup_from2").hide();
                $(".pickup_from3").hide();
                $(".passenger").hide();
                $(".js-select2").val("").trigger("change");
                $(".pickup_hotel1,.pickup_hotel2,.pickup_hotel3").hide();
                $(".pickup_address1,.pickup_address2,.pickup_address3").hide();
                $(".dropoff_address1,.dropoff_address2,.dropoff_address3").hide();
                $(".drop_hotel1,.drop_hotel2,.drop_hotel3").hide();
                $(".destination2,.destination3").hide();
                $("#destination2,#destination3").prop("required", false);
                $("#pickup_from2,#pickup_from3").prop("required", false);
                $(".pickuptime2,.pickuptime3").hide();
                $(".vehicleType").hide();
                $("#vehicleTypeCar").prop("checked", true);
                $(".total_fare").text("0,00");
                $("#total").val("0");

                //$("#pickup_from1,#destination1").prop('required',true);
                break;
            case "roundtour":
                pickup_from1 = "";
                pickup_from2 = "";
                pickup_from3 = "";
                destination1 = "";
                destination2 = "";
                destination3 = "";
                passengers = "";
                vehicleType = "car";
                temp = 0;
                $(".pickup_from1").show();
                $(".pickup_from2").show();
                $(".pickuptime1").show();
                $(".pickuptime2").show();
                $(".pickuptime3").hide();
                $(".pickup_from3").hide();
                $(".destination1,.destination2").show();
                $(".destination3").hide();
                $(".passenger").hide();
                $(".js-select2").val("").trigger("change");
                $(".pickup_hotel1,.pickup_hotel2,.pickup_hotel3").hide();
                $(".drop_hotel1,.drop_hotel2,.drop_hotel3").hide();
                $(".pickup_address1,.pickup_address2,.pickup_address3").hide();
                $(".dropoff_address1,.dropoff_address2,.dropoff_address3").hide();
                $(".vehicleType").hide();
                $("#vehicleTypeCar").prop("checked", true);
                $(".total_fare").text("0,00");
                $("#total").val("0");
                $("#destination2").prop("required", true);
                $("#pickup_from2").prop("required", true);
                $("#destination3").prop("required", false);
                $("#pickup_from3").prop("required", false);
                break;
            case "multipletour":
                pickup_from1 = "";
                pickup_from2 = "";
                pickup_from3 = "";
                destination1 = "";
                destination2 = "";
                destination3 = "";
                passengers = "";
                vehicleType = "car";
                temp = 0;
                $(".pickup_from1").show();
                $(".pickup_from2").show();
                $(".pickup_from3").show();
                $(".pickuptime1").show();
                $(".pickuptime2").show();
                $(".pickuptime3").show();
                $(".passenger").hide();
                $(".js-select2").val("").trigger("change");
                $(".pickup_hotel1,.pickup_hotel2,.pickup_hotel3").hide();
                $(".drop_hotel1,.drop_hotel2,.drop_hotel3").hide();
                $(".vehicleType").hide();
                $("#vehicleTypeCar").prop("checked", true);
                $(".destination1,.destination2,.destination3").show();
                $(".pickup_address1,.pickup_address2,.pickup_address3").hide();
                $(".dropoff_address1,.dropoff_address2,.dropoff_address3").hide();
                $(".total_fare").text("0,00");
                $("#total").val("0");
                $("#destination2,#destination3").prop("required", true);
                $("#pickup_from2,#pickup_from3").prop("required", true);
                break;

            default:
        }
    })

    $("#pickup_from1").on("select2:select", function (e) {
        let value = e.params.data.id;
        pickup_from1 = value;
        if (value == 4) {
            $(".pickup_hotel1").show();
        } else {
            $(".pickup_hotel1").hide();
        }
        if (value == 5) {
            $(".pickup_address1").show();
        } else {
            $(".pickup_address1").hide();
        }
        showPassenger();
        if (pickup_from1 !="" && destination1 !="" && passengers !="")
        {
            onewayPrice(pickup_from1, destination1,passengers,vehicleType);
        }
        //getPrice();
    })
    $("#pickup_from2").on("select2:select", function (e) {
        let value = e.params.data.id;
        pickup_from2 = value;
        if (value == 4) {
            $(".pickup_hotel2").show();
        } else {
            $(".pickup_hotel2").hide();
        }

        if (value == 5) {
            $(".pickup_address2").show();
        } else {
            $(".pickup_address2").hide();
        }
        showPassenger();
        //getPrice();
        if (pickup_from2 !="" && destination2 !="" && passengers !="")
        {
            onewayPrice(pickup_from2, destination2,passengers,vehicleType);
        }
    })
    $("#pickup_from3").on("select2:select", function (e) {
        let value = e.params.data.id;
        pickup_from3 = value;
        if (value == 4) {
            $(".pickup_hotel3").show();
        } else {
            $(".pickup_hotel3").hide();
        }
        if (value == 5) {
            $(".pickup_address3").show();
        } else {
            $(".pickup_address3").hide();
        }
        showPassenger();
        //getPrice();
    })
    $("#destination1").on("select2:select", function (e) {
        let value = e.params.data.id;
        destination1 = value;
        if (value == 4) {
            $(".drop_hotel1").show();
        } else {
            $(".drop_hotel1").hide();
        }
        if (value == 5) {
            $(".dropoff_address1").show();
        } else {
            $(".dropoff_address1").hide();
        }
        showPassenger();
        //getPrice();
    })
    $("#destination2").on("select2:select", function (e) {
        let value = e.params.data.id;
        destination2 = value;
        if (value == 4) {
            $(".drop_hotel2").show();
        } else {
            $(".drop_hotel2").hide();
        }
        if (value == 5) {
            $(".dropoff_address2").show();
        } else {
            $(".dropoff_address2").hide();
        }
        showPassenger();
        //getPrice();
    })
    $("#destination3").on("select2:select", function (e) {
        let value = e.params.data.id;
        destination3 = value;
        if (value == 4) {
            $(".drop_hotel3").show();
        } else {
            $(".drop_hotel3").hide();
        }
        if (value == 5) {
            $(".dropoff_address3").show();
        } else {
            $(".dropoff_address3").hide();
        }
        showPassenger();
        //getPrice();
    })
    $("#passengers").on("select2:select", function (e) {
        passengers = e.params.data.id;
        //let pickup = $("#pickup_from1 option:selected").val();
        //let destination = $("#destination1 option:selected").val();

        if (passengers<8) {
            $(".vehicleType").show();
            if (passengers>=5 && passengers <8){
                $(".car,.van").hide();
                $(".economy,.business").show();
                $("#vehicleTypeEconomy").prop("checked",true)
            }else {
                $(".economy,.business").hide();
                $(".car,.van").show();
                $("#vehicleTypeCar").prop("checked",true)
            }
            getPrice();
        } else {
            $(".vehicleType").hide();
            vehicleType = "car";
            getPrice();
        }

    })

    function showPassenger() {
        if (tourtype == "oneway" && pickup_from1 != "" && destination1 != "") {
            $(".passenger").show();
        } else if (tourtype == "roundtour" && pickup_from1 != "" && destination1 != "" && pickup_from2 != "" && destination2 != "") {
            $(".passenger").show();
        } else if (tourtype == "multipletour" && pickup_from1 != "" && destination1 != "" && pickup_from2 != "" && destination2 != "" && pickup_from3 != "" && destination3 != "") {
            $(".passenger").show();
        } else {
            $(".passenger").hide();
        }

        $("#passengers").val("").trigger("change");
    }function showPassenger()
    {
        if (tourtype == "oneway" && pickup_from1 != "" && destination1 != "") {
            $(".passenger").show();
        } else if (tourtype == "roundtour" && pickup_from1 != "" && destination1 != "" && pickup_from2 != "" && destination2 != "") {
            $(".passenger").show();
        } else if (tourtype == "multipletour" && pickup_from1 != "" && destination1 != "" && pickup_from2 != "" && destination2 != "" && pickup_from3 != "" && destination3 != "") {
            $(".passenger").show();
        } else {
            $(".passenger").hide();
        }

        $("#passengers").val("").trigger("change");
    }
    $("input[name='vehicle_type']").on("change", function () {
        let value = $(this).val();
        vehicleType = $(this).val();
        getPrice();
    })

    function getPrice() {
        temp = 0;
        if (passengers >= 1 && passengers <= 3) {
            passengers = 3;
        } else if (passengers >= 5 && passengers <= 7) {
            passengers = 7;
        }
        if ( pickup_from1 != "" && destination1 != "") {
            $.ajax({
                url: "{{ url('oneway-price') }}",
                dataType: "JSON",
                data: {
                    pickup_from: pickup_from1,
                    destination: destination1,
                    passengers: passengers,
                    vehicle: vehicleType
                },
                success: function (data) {
                    //console.log(data)
                    temp += data;
                    console.log(temp)
                    $(".total_fare").text(temp);
                    $("#total").val(temp);
                }
            })
        }
        if ( pickup_from2 != "" && destination2 != "") {
            $.ajax({
                url: "{{ url('round-price') }}",
                dataType: "JSON",
                data: {pickup_from: pickup_from2, destination: destination2, passengers: passengers,vehicle: vehicleType},
                success: function (data) {
                    temp += data;
                    //console.log(data)
                    $(".total_fare").text(temp);
                    $("#total").val(temp);
                    // temp += data.price;
                    // $(".total_fare").text(temp);
                   /* if (vehicleType == "van") {
                        temp += data.class5_price;
                        $(".total_fare").text(temp);
                        $("#total").val(temp);
                    } else if (vehicleType == "car") {
                        temp += data.price;
                        $(".total_fare").text(temp);
                        $("#total").val(temp);
                    }*/
                }
            })
        }
        if (pickup_from3 != "" && destination3 != "") {
            $.ajax({
                url: "{{ url('multiple-price') }}",
                dataType: "JSON",
                data: {pickup_from: pickup_from3, destination: destination3, passengers: passengers,vehicle: vehicleType},
                success: function (data) {
                    // temp += data.price;
                    // $(".total_fare").text(temp);
                    temp += data;
                    let discount = temp * 0.1;
                    $(".total_fare").text(temp - discount);
                    $("#total").val(temp - discount);

                    /*if (vehicleType == "van") {
                        temp += data.class5_price;
                        let discount = temp * 0.1;
                        $(".total_fare").text(temp - discount);
                        $("#total").val(temp - discount);
                    } else if (vehicleType == "car") {
                        temp += data.price;
                        let discount = temp * 0.1;
                        $(".total_fare").text(temp - discount);
                        $("#total").val(temp - discount);
                    }*/
                }
            })

        }

    }
    //End Step 01
    //Form Submit
    $(document).on("click", "#submit", function () {
        var $this = $("#submit"); //submit button selector using ID
        var $caption = $this.html();// We store the html content of the submit button
        $.ajax({
            url: "{{ route('bookings.store') }}",
            method: "POST",
            data: $("form").serialize(),
            beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click
                $this.attr('disabled', true).html("Processing...");
            },
            success: function (data) {
                $this.attr('disabled', false).html($caption);
                //console.log(data)
                window.location = "https://gmantransfer.com/booking-confirmation";
            },
            error: function (data) {
                $this.attr('disabled', false).html($caption);
                //console.log(data)
            }
        })
    })
</script>
<script>
    // Vanilla Javascript
    var input = document.querySelector("#phone");
    window.intlTelInput(input,({
        // options here
    }));

    $(document).ready(function() {
        $('.iti__flag-container').click(function() {
            var countryCode = $('.iti__selected-flag').attr('title');
            var countryCode = countryCode.replace(/[^0-9]/g,'')
            $('#phone').val("");
            $('#phone').val("+"+countryCode+" "+ $('#phone').val());
        });
    });
</script>
</body>
</html>
