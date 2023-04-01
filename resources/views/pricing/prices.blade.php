@extends('layouts.master')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Price Lists </h4>
                            <div class="nk-block-des">

                            </div>
                        </div>
                    </div>
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <table class="datatables table" data-auto-responsive="false">
                                <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col"><span class="sub-text">Pick Up From</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Destnation</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Passengers</span></th>
                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Price</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Class V Price</span></th>
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
                "url": "{{ url('allPrices') }}",
                "dataType": "json"
            },
            "columns": [

                {"data": "pickup"},
                {"data": "destination"},
                {"data": "passengers"},
                {"data": "price"},
                {"data": "price2"},
                {"data": "action"},
            ],
            columnDefs: [
                {
                    // User full name and username
                    targets: 5,
                    render: function (data, type, full, meta) {
                        //var $name = full['name'];
                        var $row_output = '<button class="btn btn-round btn-sm btn-secondary btn-details" data-id="' + full['id'] + '">Details</button>';
                        return $row_output;
                    }
                }
            ],
        });

    </script>
@endsection

