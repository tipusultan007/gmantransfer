<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;
use App\Mail\Admin\AdminEmail;
use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\PaymentMethod;
use App\Models\PickupDestination;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //$this->authorize('view-any', Booking::class);

        //$search = $request->get('search', '');

        $bookings = Booking::all();

        return view('bookings.index', compact('bookings', ));
    }

    public function allBookings(Request $request)
    {
        $totalData = Booking::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        //$order = $columns[$request->input('order.0.column')];
        //$dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            $posts = Booking::offset($start)
                ->limit($limit)
                ->orderBy('created_at','desc')
                ->get();
        }
        else {
            $search = $request->input('search.value');

            $posts =  Booking::where('uid','LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy('created_at','desc')
                ->get();

            $totalFiltered = Booking::where('uid','LIKE',"%{$search}%")
                ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $pickupdestination = PickupDestination::where('booking_id',$post->id)->first();
                $nestedData['id'] = $post->id;
                $nestedData['uid'] = $post->uid;
                $nestedData['name'] = $post->first_name.' '.$post->last_name;
                $nestedData['email'] = $post->email;
                $nestedData['status'] = $post->status;
                $nestedData['phone'] = $post->phone;
                $nestedData['tourtype'] = $post->tourtype;
                $nestedData['pickup_from'] = $pickupdestination->pickup_from1??'';
                $nestedData['destination'] = $pickupdestination->destination1??'';
                $nestedData['total'] = $post->total." €";
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($post->created_at));
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
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Booking::class);

        $paymentMethods = PaymentMethod::pluck('name', 'id');

        return view('app.bookings.create', compact('paymentMethods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $booking = Booking::create($data);
        //$data['uid'] = 'GT'.$booking->id;
        $booking->uid = 'GT'.$booking->id;
        $booking->save();
        $data['booking_id'] = $booking->id;
        $pickup = PickupDestination::create($data);
        $subject = $booking->uid;
        Mail::to($request->email)->send(new BookingMail($pickup,$subject));
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new AdminEmail($pickup));
        //dd('success');
        return redirect('/success');
    }
    public function details($id)
    {
        $details = PickupDestination::where('booking_id',$id)->first();
        //return json_encode($details->booking->first_name);
        $data = [];
        $data['name'] = $details->booking->first_name." ".$details->booking->last_name;
        $data['email'] = $details->booking->email;
        $data['created_at'] = date('j M Y h:i a',strtotime($details->booking->created_at));
        $data['phone'] = $details->booking->phone;
        $data['uid'] = $details->booking->uid;

        $data['tourtype'] = $details->booking->tourtype;


        if ($details->booking->tourtype == "oneway")
        {
            $data['pickup_from'] = $details->pickupFrom1->name;
            $data['pickup_hotel'] = $details->pickupHotel1->name??'';
            $data['pickup_address'] = $details->pickup_address1??'';
            $data['pickup_time'] = $details->pickup_date1." ".$details->pickup_time1;

            $data['destination'] = $details->destinationName1->name;
            $data['dropoff_hotel'] = $details->dropHotel1->name??'';
            $data['dropoff_address'] = $details->dropoff_address1??'';
        }elseif ($details->booking->tourtype == "roundtour")
        {
            $data['pickup_from1'] = $details->pickupFrom1->name;
            $data['pickup_hotel1'] = $details->pickupHotel1->name??'';
            $data['pickup_address1'] = $details->pickup_address1??'';
            $data['pickup_time1'] = $details->pickup_date1." ".$details->pickup_time1;

            $data['destination1'] = $details->destinationName1->name;
            $data['dropoff_hotel1'] = $details->dropHotel1->name??'';
            $data['dropoff_address1'] = $details->dropoff_address1??'';

            $data['pickup_from2'] = $details->pickupFrom2->name;
            $data['pickup_hotel2'] = $details->pickupHotel2->name??'';
            $data['pickup_address2'] = $details->pickup_address2??'';
            $data['pickup_time2'] = $details->pickup_date2." ".$details->pickup_time2;

            $data['destination2'] = $details->destinationName2->name;
            $data['dropoff_hotel2'] = $details->dropHotel2->name??'';
            $data['dropoff_address2'] = $details->dropoff_address2??'';

        }else{
            $data['pickup_from1'] = $details->pickupFrom1->name;
            $data['pickup_hotel1'] = $details->pickupHotel1->name??'';
            $data['pickup_address1'] = $details->pickup_address1??'';
            $data['pickup_time1'] = $details->pickup_date1." ".$details->pickup_time1;

            $data['destination1'] = $details->destinationName1->name;
            $data['dropoff_hotel1'] = $details->dropHotel1->name??'';
            $data['dropoff_address1'] = $details->dropoff_address1??'';


            $data['pickup_from2'] = $details->pickupFrom2->name;
            $data['pickup_hotel2'] = $details->pickupHotel2->name??'';
            $data['pickup_address2'] = $details->pickup_address2??'';
            $data['pickup_time2'] = $details->pickup_date2." ".$details->pickup_time2;

            $data['destination2'] = $details->destinationName2->name;
            $data['dropoff_hotel2'] = $details->dropHotel2->name??'';
            $data['dropoff_address2'] = $details->dropoff_address2??'';

            $data['pickup_from3'] = $details->pickupFrom3->name;
            $data['pickup_hotel3'] = $details->pickupHotel3->name??'';
            $data['pickup_address3'] = $details->pickup_address3??'';
            $data['pickup_time3'] = $details->pickup_date3." ".$details->pickup_time3;

            $data['destination3'] = $details->destinationName3->name;
            $data['dropoff_hotel3'] = $details->dropHotel3->name??'';
            $data['dropoff_address3'] = $details->dropoff_address3??'';
        }

        $data['passengers'] = $details->booking->passengers;
        $data['flight_no'] = $details->booking->flight_no;
        if($details->booking->passengers>=5 && $details->booking->passengers <8 && $details->booking->vehicle_type=='car')
        {
            $data['vehicle_type'] = 'Economy Class Van';
        }
        elseif($details->booking->passengers>=5 && $details->booking->passengers <8 && $details->booking->vehicle_type=='van') {
            $data['vehicle_type'] = 'Business Class Van';
        }
        else {
            $data['vehicle_type'] = strtoupper($details->booking->vehicle_type);
        }

        $data['vehicle_type'] = $details->booking->vehicle_type;
        $data['luggages'] = $details->booking->luggages??'';
        $data['payment'] = $details->booking->paymentMethod->name??'';

        $data['child_seats'] = $details->booking->child_seat??'n/a';
        $data['booster'] = $details->booking->booster??'n/a';

        $data['total'] = $details->booking->total;
        $data['status'] = $details->booking->status;
        $data['modifications'] = $details->booking->modifications??'';
        $data['cancelled_reason'] = $details->booking->cancelled_reason??'';
        $data['notes'] = $details->booking->notes??'n/a';

        return json_encode($data);
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, Booking $booking): View
    {
        $this->authorize('view', $booking);
        return view('app.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Booking $booking): View
    {
        $this->authorize('update', $booking);

        $paymentMethods = PaymentMethod::pluck('name', 'id');

        return view('app.bookings.edit', compact('booking', 'paymentMethods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BookingUpdateRequest $request,
        Booking $booking
    ): RedirectResponse {
        $this->authorize('update', $booking);

        $validated = $request->validated();

        $booking->update($validated);

        return redirect()
            ->route('bookings.edit', $booking)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Booking $booking
    ): RedirectResponse {
        $this->authorize('delete', $booking);

        $booking->delete();

        return redirect()
            ->route('bookings.index')
            ->withSuccess(__('crud.common.removed'));
    }

    public function sendMail()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('tipusultan.ctg@gmail.com')->send(new BookingMail($mailData));

        dd("Email is sent successfully.");
    }
}
