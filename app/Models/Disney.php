<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disney extends Model
{
    use HasFactory;

    protected $fillable = [
        'passengers',
        'flight_no',
        'status',
        'luggages',
        'child_seat',
        'booster',
        'notes',
        'first_name',
        'last_name',
        'email',
        'phone',
        'payment_method_id',
        'total',
        'vehicle_type',
        'tourtype',
        'modifications',
        'cancelled_reason',
        'uid'
    ];


    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function pickupDestinations()
    {
        return $this->hasMany(PickupDestination::class);
    }
}
