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
        $data['uid'] = Str::uuid();
        $booking = Booking::create($data);
        $data['booking_id'] = $booking->id;
        $pickup = PickupDestination::create($data);
        $subject = 'GT'.$booking->id;
        Mail::to($request->email)->send(new BookingMail($pickup,$subject));
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new AdminEmail($pickup));
        //dd('success');
        return redirect('/success');
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
