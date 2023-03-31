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
    //Initialize Select2 Elements
    //$('.js-select2').js-select2()


    /* $(function () {
         $(".datepicker").datepicker({
             dateFormat: "yy-mm-dd"
         });
     });*/
    function onewayPrice(pickup,destination,passengers,vehicle) {
        let total = $(".total_fare").val();
        if (pickup !="" && destination!="") {
            $.ajax({
                url: "{{ url('getPrice') }}",
                dataType: "JSON",
                data: {pickup_from: pickup, destination: destination, passengers: passengers, vehicle: vehicle},
                success: function (data) {
                    total += data;
                    $(".total_fare").val(total);
                    $(".total_fare").text(total);
                }
            })
        }
    }

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
                console.log(data)
            },
            error: function (data) {
                $this.attr('disabled', false).html($caption);
                console.log(data)
            }
        })
    })

    $(".passenger").hide();
    $(".extraseats,.notes").hide();
    $(".vehicleType").hide();
    $(".pickup_from2,.pickup_from3").hide();
    $(".destination2,.destination3").hide();
    $(".pickup_hotel1,.pickup_hotel2,.pickup_hotel3").hide();
    $(".pickuptime2,.pickuptime3").hide();
    $(".drop_hotel1,.drop_hotel2,.drop_hotel3").hide();
    $(".pickup_address1, .pickup_address2, .pickup_address3, .dropoff_address1, .dropoff_address2, .dropoff_address3").hide();

    $("input[name='addChildSeats']").on("change", function () {
        let value = $(this).val();
        if ($("#addChildSeats").is(":checked")) {
            $(".extraseats").show();
        } else {
            $(".extraseats").hide();
        }
    })

    $("input[name='addNotes']").on("change", function () {
        let value = $(this).val();
        if ($("#addNotes").is(":checked")) {
            $(".notes").show();
        } else {
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

        if (passengers < 8) {
            $(".vehicleType").show();
            //getPrice();
        } else {
            $(".vehicleType").hide();
            vehicleType = "car";
            //getPrice();
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
    }

    function getPrice() {
        temp = 0;
        if (passengers >= 1 && passengers <= 3) {
            passengers = 3;
        } else if (passengers >= 5 && passengers <= 7) {
            passengers = 7;
        }

        $.ajax({
            url: "{{ url('getPrice') }}",
            dataType: "JSON",
            data: {pickup_from: pickup_from1, destination: destination1, passengers: passengers},
            success: function (data) {
                //temp = data.price;
                //$(".total_fare").text(temp);
                if (vehicleType == "van") {
                    temp = data.class5_price;
                    $(".total_fare").text(temp);
                    $("#total").val(temp);
                } else if (vehicleType == "car") {
                    temp = data.price;
                    $(".total_fare").text(temp);
                    $("#total").val(temp);
                }
            }
        })

        if (pickup_from2 != "" && destination2 != "") {
            $.ajax({
                url: "{{ url('getPrice') }}",
                dataType: "JSON",
                data: {pickup_from: pickup_from2, destination: destination2, passengers: passengers},
                success: function (data) {
                    // temp += data.price;
                    // $(".total_fare").text(temp);
                    if (vehicleType == "van") {
                        temp += data.class5_price;
                        $(".total_fare").text(temp);
                        $("#total").val(temp);
                    } else if (vehicleType == "car") {
                        temp += data.price;
                        $(".total_fare").text(temp);
                        $("#total").val(temp);
                    }
                }
            })
        }
        if (pickup_from3 != "" && destination3 != "") {
            $.ajax({
                url: "{{ url('getPrice') }}",
                dataType: "JSON",
                data: {pickup_from: pickup_from3, destination: destination3, passengers: passengers},
                success: function (data) {
                    // temp += data.price;
                    // $(".total_fare").text(temp);
                    if (vehicleType == "van") {
                        temp += data.class5_price;
                        let discount = temp * 0.1;
                        $(".total_fare").text(temp - discount);
                        $("#total").val(temp - discount);
                    } else if (vehicleType == "car") {
                        temp += data.price;
                        let discount = temp * 0.1;
                        $(".total_fare").text(temp - discount);
                        $("#total").val(temp - discount);
                    }
                }
            })
        }
    }

    $("input[name='vehicle_type']").on("change", function () {
        let value = $(this).val();
        vehicleType = $(this).val();
        getPrice();
    })
</script>
