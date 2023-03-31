<?php

namespace App\Http\Controllers;

use App\Mail\Disney\Admin\AdminEmail;
use App\Mail\Disney\BookingMail;
use App\Models\Disney;
use App\Models\PickupDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DisneyController extends Controller
{
    public function index()
    {
        return view('disney');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['uid'] = Str::uuid();
        $booking = Disney::create($data);
        $data['disney_id'] = $booking->id;
        $pickup = PickupDestination::create($data);
        $subject = 'DC'.$booking->id;
        Mail::to($request->email)->send(new BookingMail($pickup,$subject));
        Mail::to('info@disneycab.com')->send(new AdminEmail($pickup));
        //dd('success');
        return redirect('/success');
    }
}
