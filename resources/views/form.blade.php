<!DOCTYPE html>
<html lang="zxx" class="js">

<head>

    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Taxi Booking</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
</head>

<body class="nk-body bg-white npc-general pg-error">
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
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="components-preview wide-md mx-auto">
                                <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h4 class="title nk-block-title">Taxi Booking</h4>
                                            <div class="nk-block-des">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <form class="nk-stepper stepper-init is-alter" action="#" id="stepper-survey-v2" data-step-current="first" novalidate="novalidate" style="display: block;">
                                                <div class="nk-stepper-content">
                                                    <div class="nk-stepper-progress stepper-progress mb-4">
                                                        <div class="stepper-progress-count mb-2">1 of 4</div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar stepper-progress-bar" style="width: 25%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-stepper-steps stepper-steps">
                                                        <div class="nk-stepper-step active">
                                                            <div class="nk-stepper-step-head mb-4">
                                                                <h5 class="title">What are you looking for ?</h5>
                                                                <p>Tation argumentum et usu, dicit viderer evertitur te has</p>
                                                            </div>
                                                            <ul class="row g-3">
                                                                <li class="col-6">
                                                                    <div class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                                                                        <input type="radio" class="custom-control-input" name="sv2-preference" id="sv2-preference-fedev" value="sv2-preference-fedev" required="">
                                                                        <label class="custom-control-label" for="sv2-preference-fedev">
                                                                <span class="d-flex flex-column text-center py-1 py-sm-2">
                                                                    <span class="icon-wrap xl">
                                                                        <img class="img" src="./images/icons/fornt-end-developer.svg" alt="">
                                                                    </span>
                                                                    <span class="lead-text mb-1 mt-3">Front End Developer</span>
                                                                    <span class="sub-text">Postea democritum mnesarchum ne nam, ad vim aperiri tractatos.</span>
                                                                </span>
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li class="col-6">
                                                                    <div class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                                                                        <input type="radio" class="custom-control-input" name="sv2-preference" id="sv2-preference-uxdis" value="sv2-preference-uxdis" required="">
                                                                        <label class="custom-control-label" for="sv2-preference-uxdis">
                                                                <span class="d-flex flex-column text-center py-1 py-sm-2">
                                                                    <span class="icon-wrap xl">
                                                                        <img class="img" src="./images/icons/ux-designer.svg" alt="">
                                                                    </span>
                                                                    <span class="lead-text mb-1 mt-3">Ux designer</span>
                                                                    <span class="sub-text">Prioritize and solve your tasks in short time cycles.</span>
                                                                </span>
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li class="col-12">
                                                                    <div class="custom-control custom-control-sm custom-radio pro-control custom-control-full">
                                                                        <input type="radio" class="custom-control-input" name="sv2-preference" id="sv2-preference-freelance" value="sv2-preference-freelance" required="">
                                                                        <label class="custom-control-label" for="sv2-preference-freelance">
                                                                <span class="d-flex flex-column text-center py-1 py-sm-2">
                                                                    <span class="icon-wrap xl">
                                                                        <img class="img" src="./images/icons/freelancing-service.svg" alt="">
                                                                    </span>
                                                                    <span class="lead-text mb-1 mt-3">Freelancing Serivces</span>
                                                                    <span class="sub-text">Prioritize and solve your tasks in short time cycles.</span>
                                                                </span>
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <div class="nk-stepper-step-head mb-4">
                                                                <h5 class="title">How much time you work ?</h5>
                                                                <p>Tation argumentum et usu, dicit viderer evertitur te has</p>
                                                            </div>
                                                            <div class="row g-4">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <ul class="custom-control-group flex-column align-start">
                                                                                <li>
                                                                                    <div class="custom-control custom-radio">
                                                                                        <input type="radio" class="custom-control-input" name="sv2-time-avilability" id="sv2-time-avilability-full" required="">
                                                                                        <label class="custom-control-label" for="sv2-time-avilability-full">Full time</label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="custom-control custom-radio">
                                                                                        <input type="radio" class="custom-control-input" name="sv2-time-avilability" id="sv2-time-avilability-part" required="">
                                                                                        <label class="custom-control-label" for="sv2-time-avilability-part">Part time</label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="custom-control custom-radio">
                                                                                        <input type="radio" class="custom-control-input" name="sv2-time-avilability" id="sv2-time-avilability-freelance" required="">
                                                                                        <label class="custom-control-label" for="sv2-time-avilability-freelance">Freelance / Contract</label>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <div class="nk-stepper-step-head mb-4">
                                                                <h5 class="title">what are your expected benefits ?</h5>
                                                                <p>Tation argumentum et usu, dicit viderer evertitur te has</p>
                                                            </div>
                                                            <div class="row g-4">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="sv2-select-position">Select Position</label>
                                                                        <div class="form-control-wrap">
                                                                            <select class="form-select js-select2 select2-hidden-accessible" id="sv2-select-position" name="sv2-select-position" data-placeholder="Select Position" required="" data-select2-id="sv2-select-position" tabindex="-1" aria-hidden="true">
                                                                                <option value="" data-select2-id="2"></option>
                                                                                <option value="junior-developer">Junior Developer</option>
                                                                                <option value="mid-level-developer">Mid Level Developer</option>
                                                                                <option value="senior-level-developer">Senior Developer</option>
                                                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-sv2-select-position-container"><span class="select2-selection__rendered" id="select2-sv2-select-position-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select Position</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="sv1-asking-salary">Asking Salary (monthly)</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="sv1-asking-salary" name="sv1-asking-salary" placeholder="eg:$1200" required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Workplace preference ? </label>
                                                                        <div class="form-control-wrap">
                                                                            <ul class="custom-control-group">
                                                                                <li>
                                                                                    <div class="custom-control custom-radio">
                                                                                        <input type="radio" class="custom-control-input" name="sv2-work-place" id="sv2-work-place-office" value="in-ofice" required="">
                                                                                        <label class="custom-control-label" for="sv2-work-place-office">In Office</label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="custom-control custom-radio">
                                                                                        <input type="radio" class="custom-control-input" name="sv2-work-place" id="sv2-work-place-remote" value="remote-home" required="">
                                                                                        <label class="custom-control-label" for="sv2-work-place-remote">Remote / Home office</label>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <div class="nk-stepper-step-head mb-4">
                                                                <h5 class="title">Lets learn about yourself</h5>
                                                                <p>Tation argumentum et usu, dicit viderer evertitur te has</p>
                                                            </div>
                                                            <div class="row g-3">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="sv1-first-name">First Name</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="sv1-first-name" name="sv1-first-name" placeholder="First name" required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="sv1-last-name">Last Name</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="sv1-last-name" name="sv1-last-name" placeholder="Last name" required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="sv1-email-address">Email Address</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="sv1-email-address" name="sv1-email-address" placeholder="Email Address" required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Gender </label>
                                                                        <div class="form-control-wrap">
                                                                            <ul class="custom-control-group">
                                                                                <li>
                                                                                    <div class="custom-control custom-radio">
                                                                                        <input type="radio" class="custom-control-input" name="sv2-gender" id="sv2-gender-male" value="gender-male" required="">
                                                                                        <label class="custom-control-label" for="sv2-gender-male">Male</label>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="custom-control custom-radio">
                                                                                        <input type="radio" class="custom-control-input" name="sv2-gender" id="sv2-gender-female" value="gender-female" required="">
                                                                                        <label class="custom-control-label" for="sv2-gender-female">Female</label>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Upload Documents</label>
                                                                        <span class="form-note mb-2">( Files accepted: .pdf. doc/docx - Max file size: 190k for demo limit )</span>
                                                                        <div class="form-control-wrap">
                                                                            <div class="form-file">
                                                                                <input type="file" multiple="" class="form-file-input" id="sv2-file-attachment">
                                                                                <label class="form-file-label" for="sv2-file-attachment">Choose files....</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="nk-stepper-pagination pt-4 gx-4 gy-2 stepper-pagination">
                                                        <li class="step-prev" style="display: none;"><button class="btn btn-dim btn-primary">Back</button></li>
                                                        <li class="step-next" style="display: block;"><button class="btn btn-primary">Continue</button></li>
                                                        <li class="step-submit" style="display: none;"><button class="btn btn-primary">Submit</button></li>
                                                    </ul>
                                                </div>
                                            </form>
                                            <form action="#" class="nk-wizard nk-wizard-simple is-alter"
                                                  id="wizard-01">
                                                <div class="nk-wizard-head">
                                                    <h5>Step 1</h5>
                                                </div>
                                                <div class="nk-wizard-content">
                                                    <div class="row gy-3">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Tour Type</label>
                                                                <div class="form-control-wrap">
                                                                    <ul class="custom-control-group">
                                                                        <li>
                                                                            <div
                                                                                class="custom-control custom-radio checked">
                                                                                <input type="radio"
                                                                                       class="custom-control-input"
                                                                                       name="tourtype" id="typeOneway"
                                                                                       value="oneway" required="" checked>
                                                                                <label class="custom-control-label"
                                                                                       for="typeOneway">One Way</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div
                                                                                class="custom-control custom-radio">
                                                                                <input type="radio"
                                                                                       class="custom-control-input"
                                                                                       name="tourtype"
                                                                                       id="typeRoundTour"
                                                                                       value="roundtour" required="">
                                                                                <label class="custom-control-label"
                                                                                       for="typeRoundTour">Round
                                                                                    Tour</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div
                                                                                class="custom-control custom-radio">
                                                                                <input type="radio"
                                                                                       class="custom-control-input"
                                                                                       name="tourtype"
                                                                                       id="typeMultipletour"
                                                                                       value="multipletour"
                                                                                       required="">
                                                                                <label class="custom-control-label"
                                                                                       for="typeMultipletour">Multiple
                                                                                    Tour</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fw-first-name">First
                                                                    Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" data-msg="Required"
                                                                        class="form-control required"
                                                                        id="fw-first-name" name="fw-first-name"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fw-last-name">Last
                                                                    Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" data-msg="Required"
                                                                        class="form-control required"
                                                                        id="fw-last-name" name="fw-last-name"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="fw-email-address">Email Address</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" data-msg="Required"
                                                                        data-msg-email="Wrong Email"
                                                                        class="form-control required email"
                                                                        id="fw-email-address"
                                                                        name="fw-email-address" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="fw-mobile-number">Mobile Number</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" data-msg="Required"
                                                                        class="form-control required"
                                                                        id="fw-mobile-number"
                                                                        name="fw-mobile-number" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="fw-nationality">Country</label>
                                                                <div class="form-control-wrap ">
                                                                    <div class="form-control-select">
                                                                        <select class="form-control required"
                                                                            data-msg="Required" id="fw-nationality"
                                                                            name="fw-nationality" required>
                                                                            <option value="">Select Country</option>
                                                                            <option value="us">United State</option>
                                                                            <option value="uk">United KingDom
                                                                            </option>
                                                                            <option value="fr">France</option>
                                                                            <option value="ch">China</option>
                                                                            <option value="cr">Czech Republic
                                                                            </option>
                                                                            <option value="cb">Colombia</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .col -->--}}
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="cp1-project-lead">Lead</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" id="cp1-project-lead" name="cp1-project-lead" data-placeholder="Select Lead" required>
                                                                        <option value=""></option>
                                                                        <option value="Keith_Jensen">Keith Jensen</option>
                                                                        <option value="Stefan_Zakrisson">Stefan Zakrisson</option>
                                                                        <option value="Daisy_Morgan">Daisy Morgan</option>
                                                                        <option value="Stefan_Harary">Stefan Harary</option>
                                                                        <option value="Michiel_Berende">Michiel Berende</option>
                                                                        <option value="Jonathan_Rios">Jonathan Rios</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group pickup_from1">
                                                                <label class="form-label" for="fullname">Pick Up
                                                                    Location</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2 required"
                                                                            name="pickup_from1" id="pickup_from1"
                                                                            data-placeholder="Choose Location"
                                                                            data-allow-clear="true" required>
                                                                        <option value="0">Choose Location</option>
                                                                        @foreach($pickups as $pickup)
                                                                            <option value="{{ $pickup->id }}">{{
                                                                            $pickup->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group pickup_address1">
                                                                <label for="pickup_address1">Pick Up Address</label>
                                                                <input type="text" name="pickup_address1"
                                                                       class="form-control" id="pickup_address1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group pickup_hotel1">
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
                                                        <div class="col-md-6">

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group dropoff_address1">
                                                                <label for="dropoff_address2">Drop Off
                                                                    Address</label>
                                                                <input type="text" name="dropoff_address1"
                                                                       class="form-control" id="dropoff_address1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group drop_hotel1">
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

                                                        <div class="col-md-6">
                                                            <div class="form-group pickup_from2">
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
                                                        <div class="col-md-6">
                                                            <div class="form-group pickup_address2">
                                                                <label for="pickup_address2">Pick Up Address</label>
                                                                <input type="text" name="pickup_address2"
                                                                       class="form-control" id="pickup_address2">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group pickup_hotel2">
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
                                                        <div class="col-md-6">
                                                            <div class="form-group destination2">
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
                                                        <div class="col-md-6">
                                                            <div class="form-group dropoff_address2">
                                                                <label for="dropoff_address2">Drop Off
                                                                    Address</label>
                                                                <input type="text" name="dropoff_address2"
                                                                       class="form-control" id="dropoff_address2">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group drop_hotel2">
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

                                                        <div class="col-md-6">
                                                            <div class="form-group pickup_from3">
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
                                                        <div class="col-md-6">
                                                            <div class="form-group pickup_address3">
                                                                <label for="pickup_address3">Pick Up Address</label>
                                                                <input type="text" name="pickup_address3"
                                                                       class="form-control" id="pickup_address3">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group pickup_hotel3">
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
                                                        <div class="col-md-6">
                                                            <div class="form-group destination3">
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
                                                        <div class="col-md-6">
                                                            <div class="form-group dropoff_address3">
                                                                <label class="form-label text-uppercase" for="dropoff_address3">Drop Off
                                                                    Address</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" name="dropoff_address3"
                                                                           class="form-control" id="dropoff_address3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group drop_hotel3">
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
                                                    </div>
                                                </div>
                                                <div class="nk-wizard-head">
                                                    <h5>Step 2</h5>
                                                </div>
                                                <div class="nk-wizard-content">
                                                    <div class="row gy-3">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                       for="fw-username">Username</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" data-msg="Required"
                                                                           class="form-control required"
                                                                           id="fw-username" name="fw-username"
                                                                           required>
                                                                </div>
                                                            </div>
                                                        </div><!-- .col -->
                                                    </div><!-- .row -->
                                                    <div class="row gy-3">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                       for="fw-password">Password</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="password" data-msg="Required"
                                                                           class="form-control required"
                                                                           id="fw-password" name="fw-password"
                                                                           required>
                                                                </div>
                                                            </div>
                                                        </div><!-- .col -->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                       for="fw-re-password">Re-Password</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="password" data-msg="Required"
                                                                           class="form-control required"
                                                                           id="fw-re-password" name="fw-re-password"
                                                                           required>
                                                                </div>
                                                            </div>
                                                        </div><!-- .col -->
                                                        <div class="col-md-12">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" data-msg="Required"
                                                                       class="custom-control-input required"
                                                                       name="fw-policy" id="fw-policy" required>
                                                                <label class="custom-control-label"
                                                                       for="fw-policy">I agreed Terms and
                                                                    policy</label>
                                                            </div>
                                                        </div>
                                                    </div><!-- .row -->
                                                </div>
                                                <div class="nk-wizard-head">
                                                    <h5>Step 3</h5>
                                                </div>
                                                <div class="nk-wizard-content">
                                                    <div class="row gy-2">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                       for="fw-token-address">Token Address</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" data-msg="Required"
                                                                           class="form-control required"
                                                                           id="fw-token-address"
                                                                           name="fw-token-address" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label">I want to contribute</label>
                                                            <ul class="d-flex flex-wrap g-2">
                                                                <li>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" data-msg="Required"
                                                                               class="custom-control-input required"
                                                                               name="fw-ethcount" id="fw-lt1eth"
                                                                               required>
                                                                        <label class="custom-control-label"
                                                                               for="fw-lt1eth">Less than 1 ETH</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" data-msg="Required"
                                                                               class="custom-control-input required"
                                                                               name="fw-ethcount" id="fw-ov1eth"
                                                                               required>
                                                                        <label class="custom-control-label"
                                                                               for="fw-ov1eth">Over than 1 ETH</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                       for="fw-telegram-username">Telegram
                                                                    Username</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" data-msg="Required"
                                                                           class="form-control required"
                                                                           id="fw-telegram-username"
                                                                           name="fw-telegram-username" required>
                                                                </div>
                                                            </div>
                                                        </div><!-- .col -->
                                                    </div><!-- .row -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->

                            </div><!-- .components-preview -->
                        </div>
                    </div>
                </div>
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
<!-- select region modal -->

<script>


    var stepperForm;
    var pickup_from1 = "";
    var pickup_from2 = "";
    var pickup_from3 = "";
    var destination1 ="";
    var destination2 ="";
    var destination3 ="";
    var passengers ="";
    var vehicleType ="car";
    var tourtype ="oneway";
    var totalFare;
    var temp;
    var onewayPrice = 0;
    var roundtourPrice = 0;
    var multipletourPrice = 0;
    //Initialize Select2 Elements
    //$('.select2').select2()


    $(function () {
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });

    $(".passenger").hide();
    $(".extraseats,.notes").hide();
    $(".vehicleType").hide();
    $(".pickup_from2,.pickup_from3").hide();
    $(".destination2,.destination3").hide();
    $(".pickup_hotel1,.pickup_hotel2,.pickup_hotel3").hide();
    $(".pickuptime2,.pickuptime3").hide();
    $(".drop_hotel1,.drop_hotel2,.drop_hotel3").hide();
    $(".pickup_address1, .pickup_address2, .pickup_address3, .dropoff_address1, .dropoff_address2, .dropoff_address3").hide();

    $("input[name='addChildSeats']").on("change",function () {
        let value = $(this).val();
        if ($("#addChildSeats").is(":checked")){
            $(".extraseats").show();
        }else{
            $(".extraseats").hide();
        }
    })

    $("input[name='addNotes']").on("change",function () {
        let value = $(this).val();
        if ($("#addNotes").is(":checked")){
            $(".notes").show();
        }else{
            $(".notes").hide();
        }
    })


    $('.timepicker').timepicker();


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
        getPrice();
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
        getPrice();
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
        getPrice();
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
        getPrice();
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
        getPrice();
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
        getPrice();
    })
    $("#passengers").on("select2:select", function (e) {
        passengers = e.params.data.id;
        //let pickup = $("#pickup_from1 option:selected").val();
        //let destination = $("#destination1 option:selected").val();

        if (passengers < 8) {
            $(".vehicleType").show();
            getPrice();
        } else {
            $(".vehicleType").hide();
            vehicleType = "car";
            getPrice();
        }

    })
    $("input[name='tourtype']").on('change', function () {
        let value = $("input[name='tourtype']:checked").val();
        tourtype = value;

        switch (value) {
            case "oneway":
                pickup_from1 = "";
                pickup_from2 = "";
                pickup_from3 = "";
                destination1 ="";
                destination2 ="";
                destination3 ="";
                passengers ="";
                vehicleType ="car";
                temp = 0;
                $(".pickup_from1").show();
                $(".pickuptime1").show();
                $(".pickup_from2").hide();
                $(".pickup_from3").hide();
                $(".passenger").hide();
                $(".select2").val("").trigger("change");
                $(".pickup_hotel1,.pickup_hotel2,.pickup_hotel3").hide();
                $(".drop_hotel1,.drop_hotel2,.drop_hotel3").hide();
                $(".destination2,.destination3").hide();
                $("#destination2,#destination3").prop("required",false);
                $("#pickup_from2,#pickup_from3").prop("required",false);
                $(".pickuptime2,.pickuptime3").hide();
                $(".vehicleType").hide();
                $("#vehicleTypeCar").prop("checked",true);
                $(".total_fare").text("0,00");
                $("#total").val("0");
                //$("#pickup_from1,#destination1").prop('required',true);
                break;
            case "roundtour":
                pickup_from1 = "";
                pickup_from2 = "";
                pickup_from3 = "";
                destination1 ="";
                destination2 ="";
                destination3 ="";
                passengers ="";
                vehicleType ="car";
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
                $(".select2").val("").trigger("change");
                $(".pickup_hotel1,.pickup_hotel2,.pickup_hotel3").hide();
                $(".drop_hotel1,.drop_hotel2,.drop_hotel3").hide();
                $(".vehicleType").hide();
                $("#vehicleTypeCar").prop("checked",true);
                $(".total_fare").text("0,00");
                $("#total").val("0");
                $("#destination2").prop("required",true);
                $("#pickup_from2").prop("required",true);
                $("#destination3").prop("required",false);
                $("#pickup_from3").prop("required",false);
                break;
            case "multipletour":
                pickup_from1 = "";
                pickup_from2 = "";
                pickup_from3 = "";
                destination1 ="";
                destination2 ="";
                destination3 ="";
                passengers ="";
                vehicleType ="car";
                temp = 0;
                $(".pickup_from1").show();
                $(".pickup_from2").show();
                $(".pickup_from3").show();
                $(".pickuptime1").show();
                $(".pickuptime2").show();
                $(".pickuptime3").show();
                $(".passenger").hide();
                $(".select2").val("").trigger("change");
                $(".pickup_hotel1,.pickup_hotel2,.pickup_hotel3").hide();
                $(".drop_hotel1,.drop_hotel2,.drop_hotel3").hide();
                $(".vehicleType").hide();
                $("#vehicleTypeCar").prop("checked",true);
                $(".destination1,.destination2,.destination3").show();
                $(".total_fare").text("0,00");
                $("#total").val("0");
                $("#destination2,#destination3").prop("required",true);
                $("#pickup_from2,#pickup_from3").prop("required",true);
                break;

            default:
        }
    })

    function showPassenger() {
        if (tourtype=="oneway" && pickup_from1 !="" && destination1!="")
        {
            $(".passenger").show();
        }else if (tourtype=="roundtour" && pickup_from1 !="" && destination1!="" && pickup_from2 !="" && destination2!="")
        {
            $(".passenger").show();
        }else if (tourtype=="multipletour" && pickup_from1 !="" && destination1!="" && pickup_from2 !="" && destination2!="" && pickup_from3 !="" && destination3!="")
        {
            $(".passenger").show();
        }else {
            $(".passenger").hide();
        }

        $("#passengers").val("").trigger("change");
    }
    function getPrice()
    {
        temp = 0;
        if (passengers>=1 && passengers<=3)
        {
            passengers=3;
        }else if(passengers>=5 && passengers<=7)
        {
            passengers=7;
        }

        $.ajax({
            url: "{{ url('getPrice') }}",
            dataType: "JSON",
            data: { pickup_from: pickup_from1, destination: destination1,passengers:passengers },
            success: function (data) {
                //temp = data.price;
                //$(".total_fare").text(temp);
                if (vehicleType == "van")
                {
                    temp = data.class5_price;
                    $(".total_fare").text(temp);
                    $("#total").val(temp);
                }else if (vehicleType == "car") {
                    temp = data.price;
                    $(".total_fare").text(temp);
                    $("#total").val(temp);
                }
            }
        })

        if (pickup_from2 !="" && destination2 !="")
        {
            $.ajax({
                url: "{{ url('getPrice') }}",
                dataType: "JSON",
                data: { pickup_from: pickup_from2, destination: destination2,passengers:passengers },
                success: function (data) {
                    // temp += data.price;
                    // $(".total_fare").text(temp);
                    if (vehicleType == "van")
                    {
                        temp += data.class5_price;
                        $(".total_fare").text(temp);
                        $("#total").val(temp);
                    }else if (vehicleType == "car"){
                        temp += data.price;
                        $(".total_fare").text(temp);
                        $("#total").val(temp);
                    }
                }
            })
        }
        if (pickup_from3 !="" && destination3 !="")
        {
            $.ajax({
                url: "{{ url('getPrice') }}",
                dataType: "JSON",
                data: { pickup_from: pickup_from3, destination: destination3,passengers:passengers },
                success: function (data) {
                    // temp += data.price;
                    // $(".total_fare").text(temp);
                    if (vehicleType == "van")
                    {
                        temp += data.class5_price;
                        let discount = temp*0.1;
                        $(".total_fare").text(temp-discount);
                        $("#total").val(temp-discount);
                    }else if (vehicleType == "car"){
                        temp += data.price;
                        let discount = temp*0.1;
                        $(".total_fare").text(temp-discount);
                        $("#total").val(temp-discount);
                    }
                }
            })
        }
    }

    $("input[name='vehicle_type']").on("change",function () {
        let value = $(this).val();
        vehicleType = $(this).val();
        getPrice();
        /*if(value=="van") {
            $.ajax({
                url: "{{ url('getPrice') }}",
                dataType: "JSON",
                data: { pickup_from: pickup_from1, destination: destination1,passengers:passengers },
                success: function (data) {
                    temp = data.class5_price;
                    $(".total_fare").text(temp);
                }
            })
        }else {
            $.ajax({
                url: "{{ url('getPrice') }}",
                dataType: "JSON",
                data: { pickup_from: pickup_from1, destination: destination1,passengers:passengers },
                success: function (data) {
                    temp = data.price;
                    $(".total_fare").text(temp);
                }
            })
        }*/
    })
</script>

</body>

</html>
