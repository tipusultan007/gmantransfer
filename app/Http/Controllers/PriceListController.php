<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPriceOneway(Request $request)
    {
        $price = 0;
            $details = PriceList::where('pickup_from_id', $request->pickup_from)
                ->where('destination_id', $request->destination)
                ->where('passengers', $request->passengers)
                ->first();
        if ($request->vehicle == "van") {
            $price = $details->class5_price;
        }else{
            $price = $details->price;
        }
        return json_encode($price);
    }
    public function getPriceRound(Request $request)
    {
        $price = 0;
        $details = PriceList::where('pickup_from_id', $request->pickup_from)
            ->where('destination_id', $request->destination)
            ->where('passengers', $request->passengers)
            ->first();
        if ($request->vehicle == "van") {
            $price = $details->class5_price;
        }else{
            $price = $details->price;
        }
        return json_encode($price);
    }
    public function getPriceMultiple(Request $request)
    {
        $price = 0;
        $details = PriceList::where('pickup_from_id', $request->pickup_from)
            ->where('destination_id', $request->destination)
            ->where('passengers', $request->passengers)
            ->first();
        if ($request->vehicle == "van") {
            $price = $details->class5_price;
        }else{
            $price = $details->price;
        }
        return json_encode($price);
    }
}
