@extends('layouts.master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Pick Up Hotels </h4>
                            <div class="nk-block-des">

                            </div>
                        </div>
                    </div>
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <table class="datatable-init table" data-auto-responsive="false">
                                <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col nk-tb-col-check">
                                        #
                                    </th>
                                    <th class="nk-tb-col"><span class="sub-text">Pick Up From</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Action</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse($pickupHotels as $pickupHotel)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $pickupHotel->name }}</td>
                                        <td>Action</td>
                                    </tr>

                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
@endsection
