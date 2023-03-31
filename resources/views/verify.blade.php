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
    <title>Gmantransfer - Booking Confirmation</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

    <style>
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
                            <form action="{{ url('updateBooking') }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="{{ $details->booking_id }}">
                                <div class="form-group">
                                    <label class="form-label" for="">Booking Reference No</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="ref" value="{{ 'GT'.$details->booking_id }}" readonly>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="">Email <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" name="email" value="{{ $details->booking->email }}" readonly>
                                    </div>

                                </div>
                                <div class="form-group clearfix">
                                    <label class="form-label">Please Select <span class="text-danger">*</span></label>
                                    <ul
                                        class="custom-control-group custom-control-horizontal  w-100">
                                        <li>
                                            <div
                                                class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                <input type="radio" class="custom-control-input"
                                                       id="confirmed" value="confirmed"
                                                       name="status" required>
                                                <label class="custom-control-label"
                                                       for="confirmed">
                                                                        <span class="d-flex align-center">
                                                                            <span class="ms-1">
                                                                                <span class="lead-text">Confirm</span>
                                                                            </span>
                                                                        </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                <input type="radio" class="custom-control-input"
                                                       id="modified" value="modified"
                                                       name="status" required>
                                                <label class="custom-control-label"
                                                       for="modified">
                                                                        <span class="d-flex align-center">
                                                                            <span class="ms-1">
                                                                                <span class="lead-text">Modify</span>
                                                                            </span>
                                                                        </span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                <input type="radio" class="custom-control-input"
                                                       id="cancelled" value="cancelled"
                                                       name="status" required>
                                                <label class="custom-control-label"
                                                       for="cancelled">
                                                                        <span class="d-flex align-center">
                                                                            <span class="ms-1">
                                                                                <span class="lead-text">Cancel</span>

                                                                            </span>
                                                                        </span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group modifications">
                                    <label for="">IF ANY OF THE BOOKING INFORMATION IS WRONG PLEASE SPECIFY BELOW <span class="text-danger">*</span></label>
                                    <textarea name="modifications" id="modifications" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group cancel_reason">
                                    <label for="">PLEASE SPECIFY THE REASON BELOW <span class="text-danger">*</span></label>
                                    <textarea name="cancelled_reason" id="cancel_reason" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success">Submit</button>
                                </div>
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
<script src="{{asset('assets/js/bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<!-- select region modal -->

<script>
    $(".modifications").hide();
    $(".cancel_reason").hide();
    $("input[name='status']").on('change',function () {
        let value = $(this).val();

        switch (value) {
            case "confirmed":
                $(".modifications").hide();
                $(".cancel_reason").hide();
                $("#modifications").val("");
                $("#cancel_reason").val("");
                $("#modifications").prop('required',false);
                $("#cancel_reason").prop('required',false);
                break;
            case "modified":
                $(".modifications").show();
                $("#modifications").prop('required',true);
                $(".cancel_reason").hide();
                $("#cancel_reason").val("");
                $("#cancel_reason").prop('required',false);
                break;

            case "cancelled":
                $(".modifications").hide();
                $("#modifications").prop('required',false);
                $(".cancel_reason").show();
                $("#modifications").val("");
                $("#cancel_reason").prop('required',true);
                break;
            default:
        }
    })

</script>
</body>
</html>
