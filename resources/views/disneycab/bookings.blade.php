@extends('layouts.master')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">DisneyCab Bookings</h4>
                            <div class="nk-block-des">

                            </div>
                        </div>
                    </div>
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <table class="datatables table" data-auto-responsive="false">
                                <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col nk-tb-col-check">
                                        Ref.
                                    </th>
                                    <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Phone</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Tour Type</span></th>
                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Total</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Created At</span></th>
                                    <th class="nk-tb-col nk-tb-col-tools text-end">
                                        Action
                                    </th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modalDetails">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Booking Details</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="details"></div>
                </div>
                {{--<div class="modal-footer bg-light">
                    <span class="sub-text">Modal Footer Text</span>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        NioApp.DataTable('.datatables', {
            "proccessing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ url('disneyBookings') }}",
                "dataType": "json"
            },
            "columns": [

                {"data": "uid"},
                {"data": "name"},
                {"data": "phone"},
                {"data": "tourtype"},
                {"data": "total"},
                {"data": "status"},
                {"data": "created_at"},
                {"data": "action"},
            ],
            columnDefs: [
                {
                    // User full name and username
                    targets: 0,
                    render: function (data, type, full, meta) {
                        var $name = full['uid'];
                        var $row_output =
                            '<span class="fw-bolder text-primary">' +
                            $name +
                            '</span>';
                        return $row_output;
                    }
                }, {
                    // User full name and username
                    targets: 1,
                    render: function (data, type, full, meta) {
                        var $name = full['name'];
                        var $row_output =
                            '<div class="d-flex justify-content-left align-items-center">' +
                            '<div class="d-flex flex-column">' +
                            '<span class="fw-bolder">' +
                            $name +
                            '</span>' +
                            '<small class="emp_post text-muted">' +
                            full['email'] +
                            '</small>' +
                            '</div>' +
                            '</div>';
                        return $row_output;
                    }
                }, {
                    // Label
                    targets: 3,
                    render: function (data, type, full, meta) {
                        var $status_number = full['tourtype'];
                        var $status = {
                            oneway: {title: 'Oneway', class: 'rounded-pill bg-info'},
                            roundtour: {title: 'Round Tour', class: 'rounded-pill bg-danger'},
                            multipletour: {title: 'Multiple Tour', class: ' rounded-pill bg-warning'}
                        };
                        if (typeof $status[$status_number] === 'undefined') {
                            return data;
                        }
                        return (
                            '<span class="badge ' +
                            $status[$status_number].class +
                            '">' +
                            $status[$status_number].title +
                            '</span>'
                        );
                    }
                }, {
                    // Label
                    targets: 5,
                    render: function (data, type, full, meta) {
                        var $status_number = full['status'];
                        var $status = {
                            pending: {title: 'Pending', class: 'badge-dim bg-primary'},
                            cancelled: {title: 'Cancelled', class: 'badge-dim bg-danger'},
                            modified: {title: 'Modified', class: ' badge-dim bg-warning'},
                            confirmed: {title: 'Confirmed', class: 'badge-dim bg-success'}
                        };
                        if (typeof $status[$status_number] === 'undefined') {
                            return data;
                        }
                        return (
                            '<span class="badge ' +
                            $status[$status_number].class +
                            '">' +
                            $status[$status_number].title +
                            '</span>'
                        );
                    }
                },
                {
                    // User full name and username
                    targets: 7,
                    render: function (data, type, full, meta) {
                        //var $name = full['name'];
                        var $row_output = '<button class="btn btn-round btn-sm btn-secondary btn-details" data-id="' + full['id'] + '">Details</button>';
                        return $row_output;
                    }
                }
            ],
        });
        $(document).on("click", ".btn-details", function () {
            let id = $(this).data('id');
            $(".details").empty();
            $.ajax({
                url: "{{ url('disneyDetails') }}/" + id,
                dataType: "JSON",
                success: function (data) {
                    var table = '<table class="table table-bordered table-sm table-condensed">';
                    table += '<tr><th>Booking No</th><td>'+data.uid+'</td></tr>';
                    table += '<tr><th>Name</th><td>'+data.name+'</td></tr>';
                    table += '<tr><th>Phone</th><td>'+data.phone+'</td></tr>';
                    table += '<tr><th>Email</th><td>'+data.email+'</td></tr>';
                    table += '<tr><th>Booking Time</th><td>'+data.created_at+'</td></tr>';
                    table += '<tr><th colspan="2" class="text-center text-uppercase">Location Details</th></tr>';
                    if (data.tourtype==='oneway') {
                        table += '<tr><th>Tour Type</th><td>One Way</td></tr>';
                        table += '<tr><th>Pick Up From</th><td class="pickup">' + data.pickup_from + '</td></tr>';
                        if (data.pickup_hotel !="")
                        {
                            table += '<tr><th>Pick Up Hotel </th><td>' + data.pickup_hotel + '</td></tr>';
                        }
                        if (data.pickup_address !="")
                        {
                            table += '<tr><th>Pick Up Address </th><td>' + data.pickup_address + '</td></tr>';
                        }
                        table += '<tr><th>Destination </th><td class="destination2">' + data.destination + '</td></tr>';
                        if (data.dropoff_hotel !="")
                        {
                            table += '<tr><th>Drop Off Hotel </th><td>' + data.dropoff_hotel + '</td></tr>';
                        }
                        if (data.dropoff_address !="")
                        {
                            table += '<tr><th>Drop Off Address </th><td>' + data.dropoff_address + '</td></tr>';
                        }
                        table += '<tr><th>Pick Up Time </th><td>' + data.pickup_time + '</td></tr>';
                    }else if (data.tourtype==='roundtour')
                    {
                        table += '<tr><th>Tour Type</th><td>Round Tour</td></tr>';
                        table += '<tr><th>Pick Up From 1</th><td class="pickup21">' + data.pickup_from1 + '</td></tr>';
                        if (data.pickup_hotel1 !="")
                        {
                            table += '<tr><th>Pick Up Hotel 1</th><td>' + data.pickup_hotel1 + '</td></tr>';
                        }
                        if (data.pickup_address1 !="")
                        {
                            table += '<tr><th>Pick Up Address 1</th><td>' + data.pickup_address1 + '</td></tr>';
                        }
                        table += '<tr><th>Destination 1</th><td class="destination21">' + data.destination1 + '</td></tr>';
                        if (data.dropoff_hotel1 !="")
                        {
                            table += '<tr><th>Drop Off Hotel 1</th><td>' + data.dropoff_hotel1 + '</td></tr>';
                        }
                        if (data.dropoff_address1 !="")
                        {
                            table += '<tr><th>Drop Off Address 1</th><td>' + data.dropoff_address1 + '</td></tr>';
                        }
                        table += '<tr><th>Pick Up Time 1</th><td class="destination21">' + data.pickup_time1 + '</td></tr>';

                        // 2

                        table += '<tr><td colspan="2"><br></td></tr>';
                        table += '<tr><th>Pick Up From 2</th><td class="pickup22">' + data.pickup_from2 + '</td></tr>';
                        if (data.pickup_hotel2 !="")
                        {
                            table += '<tr><th>Pick Up Hotel 2</th><td>' + data.pickup_hotel2 + '</td></tr>';
                        }
                        if (data.pickup_address2 !="")
                        {
                            table += '<tr><th>Pick Up Address 2</th><td>' + data.pickup_address2 + '</td></tr>';
                        }
                        table += '<tr><th>Destination 2</th><td>' + data.destination2 + '</td></tr>';
                        if (data.dropoff_hotel2 !="")
                        {
                            table += '<tr><th>Drop Off Hotel 2</th><td>' + data.dropoff_hotel2 + '</td></tr>';
                        }
                        if (data.dropoff_address2 !="")
                        {
                            table += '<tr><th>Drop Off Address 2</th><td>' + data.dropoff_address2 + '</td></tr>';
                        }
                        table += '<tr><th>Pick Up Time 2</th><td>' + data.pickup_time2 + '</td></tr>';
                    }else if (data.tourtype==='multipletour'){
                        // 1
                        table += '<tr><th>Tour Type</th><td>Multiple Tour</td></tr>';
                        table += '<tr><th>Pick Up From 1</th><td class="pickup21">' + data.pickup_from1 + '</td></tr>';
                        if (data.pickup_hotel1 !="")
                        {
                            table += '<tr><th>Pick Up Hotel 1</th><td>' + data.pickup_hotel1 + '</td></tr>';
                        }
                        if (data.pickup_address1 !="")
                        {
                            table += '<tr><th>Pick Up Address 1</th><td>' + data.pickup_address1 + '</td></tr>';
                        }
                        table += '<tr><th>Destination 1</th><td class="destination21">' + data.destination1 + '</td></tr>';
                        if (data.dropoff_hotel1 !="")
                        {
                            table += '<tr><th>Drop Off Hotel 1</th><td>' + data.dropoff_hotel1 + '</td></tr>';
                        }
                        if (data.dropoff_address1 !="")
                        {
                            table += '<tr><th>Drop Off Address 1</th><td>' + data.dropoff_address1 + '</td></tr>';
                        }
                        table += '<tr><th>Pick Up Time 1</th><td class="destination21">' + data.pickup_time1 + '</td></tr>';

                        // 2
                        table += '<tr><td colspan="2"><br></td></tr>';
                        table += '<tr><th>Pick Up From 2</th><td class="pickup22">' + data.pickup_from2 + '</td></tr>';
                        if (data.pickup_hotel2 !="")
                        {
                            table += '<tr><th>Pick Up Hotel 2</th><td>' + data.pickup_hotel2 + '</td></tr>';
                        }
                        if (data.pickup_address2 !="")
                        {
                            table += '<tr><th>Pick Up Address 2</th><td>' + data.pickup_address2 + '</td></tr>';
                        }
                        table += '<tr><th>Destination 2</th><td">' + data.destination2 + '</td></tr>';
                        if (data.dropoff_hotel2 !="")
                        {
                            table += '<tr><th>Drop Off Hotel 2</th><td>' + data.dropoff_hotel2 + '</td></tr>';
                        }
                        if (data.dropoff_address2 !="")
                        {
                            table += '<tr><th>Drop Off Address 2</th><td>' + data.dropoff_address2 + '</td></tr>';
                        }
                        table += '<tr><th>Pick Up Time 2</th><td>' + data.pickup_time2 + '</td></tr>';

                        //3
                        table += '<tr><td colspan="2"><br></td></tr>';
                        table += '<tr><th>Pick Up From 3</th><td class="pickup33">' + data.pickup_from3 + '</td></tr>';
                        if (data.pickup_hotel3 !="")
                        {
                            table += '<tr><th>Pick Up Hotel 3</th><td>' + data.pickup_hotel3 + '</td></tr>';
                        }
                        if (data.pickup_address3 !="")
                        {
                            table += '<tr><th>Pick Up Address 3</th><td>' + data.pickup_address3 + '</td></tr>';
                        }
                        table += '<tr><th>Destination 3</th><td">' + data.destination3 + '</td></tr>';
                        if (data.dropoff_hotel3 !="")
                        {
                            table += '<tr><th>Drop Off Hotel 3</th><td>' + data.dropoff_hotel3 + '</td></tr>';
                        }
                        if (data.dropoff_address3 !="")
                        {
                            table += '<tr><th>Drop Off Address 3</th><td>' + data.dropoff_address3 + '</td></tr>';
                        }
                        table += '<tr><th>Pick Up Time 3</th><td class="destination31">' + data.pickup_time3 + '</td></tr>';
                    }
                    table += '<tr><td colspan="2"><br></td></tr>';
                    table += '<tr><th>Passengers</th><td>' + data.passengers + '</td></tr>';
                    table += '<tr><th>Flight / Train No</th><td>' + data.flight_no + '</td></tr>';
                    table += '<tr><th>Luggages</th><td>' + data.luggages + '</td></tr>';
                    table += '<tr><th>Vehicle Type</th><td>' + data.vehicle_type + '</td></tr>';
                    table += '<tr><td colspan="2"><br></td></tr>';
                    table += '<tr><th>Total Fare</th><td>' + data.total + ' €</td></tr>';
                    table += '<tr><th>Payment</th><td>' + data.payment + '</td></tr>';
                    table += '</table>';
                    $(".details").append(table);
                }
            });

            $("#modalDetails").modal("show");
        })
    </script>
@endsection

