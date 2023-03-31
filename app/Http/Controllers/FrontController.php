<?php

namespace App\Http\Controllers;

use App\Mail\Admin\AdminCancelMail;
use App\Mail\Admin\AdminConfirmEmail;
use App\Mail\Admin\AdminModifyMail;
use App\Mail\CancelMail;
use App\Mail\ConfirmationMail;
use App\Mail\ModifyMail;
use App\Models\Booking;
use App\Models\PickupDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function verify()
    {
        $decrypt = Crypt::decryptString(request()->query('key'));
        $details = PickupDestination::where('booking_id',$decrypt)->first();
        return view('verify',compact('details'));
    }

    public function disneyVerify()
    {
        $decrypt = Crypt::decryptString(request()->query('key'));
        $details = PickupDestination::where('disney_id',$decrypt)->first();
        return view('disney_verify',compact('details'));
    }

    public function updateBooking(Request $request)
    {
        $booking = Booking::find($request->id);
        $booking->update($request->all());
        $ref = 'GT'.$booking->id;
        if ($request->status == 'confirmed')
        {
            Mail::to($booking->email)->send(new ConfirmationMail($booking,$ref));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new AdminConfirmEmail($ref));
            return redirect('https://gmantransfer.com/booking-confirmation');
        }elseif ($request->status == 'cancelled')
        {
            Mail::to($booking->email)->send(new CancelMail($booking,$ref));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new AdminCancelMail($ref,$booking));
            return redirect('https://gmantransfer.com/cancel-message');
        }elseif ($request->status == 'modified')
        {
            Mail::to($booking->email)->send(new ModifyMail($booking,$ref));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new AdminModifyMail($ref,$booking));
            return redirect('https://gmantransfer.com/booking-confirmation/');
        }
    }
    public function updateBookingDisney(Request $request)
    {
        $booking = Booking::find($request->id);
        $booking->update($request->all());
        $ref = 'DC'.$booking->id;
        if ($request->status == 'confirmed')
        {
            Mail::to($booking->email)->send(new \App\Mail\Disney\ConfirmationMail($booking,$ref));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new \App\Mail\Disney\Admin\AdminConfirmEmail($ref));
            return redirect('https://disneycab.com/booking-confirmation');
        }elseif ($request->status == 'cancelled')
        {
            Mail::to($booking->email)->send(new \App\Mail\Disney\CancelMail($booking,$ref));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new \App\Mail\Disney\Admin\AdminCancelMail($ref,$booking));
            return redirect('https://disneycab.com/cancel-message');
        }elseif ($request->status == 'modified')
        {
            Mail::to($booking->email)->send(new \App\Mail\Disney\ModifyMail($booking,$ref));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new \App\Mail\Disney\Admin\AdminModifyMail($ref,$booking));
            return redirect('https://disneycab.com/booking-confirmation/');
        }
    }
}
