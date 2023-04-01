<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\PickupFrom;
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
        return view('pricing.prices');
    }

    public function allPrices(Request $request)
    {
        $totalData = PriceList::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        //$order = $columns[$request->input('order.0.column')];
        //$dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $posts = PriceList::with('pickup','destination')->offset($start)
                ->limit($limit)
                ->get();
        }


        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $pickup = PickupFrom::find($post->pickup_from_id);
                $destination = Destination::find($post->destination_id);
                $nestedData['id'] = $post->id;
                $nestedData['pickup'] = $pickup->name;
                $nestedData['destination'] = $destination->name;
                if ($post->passengers == 3)
                    $nestedData['passengers'] = '1-3';
                elseif ($post->passengers == 7)
                    $nestedData['passengers'] = '5-7';
                else
                    $nestedData['passengers'] = $post->passengers;

                $nestedData['price'] = $post->price." €";
                $nestedData['price2'] = $post->class5_price!=""?$post->class5_price." €":'-';

                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
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
