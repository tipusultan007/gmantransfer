<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
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

    protected $searchableFields = ['*'];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function pickupDestinations()
    {
        return $this->hasMany(PickupDestination::class);
    }
}
