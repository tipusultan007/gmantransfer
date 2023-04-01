<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PickupDestination extends Model
{
    use HasFactory;


    protected $fillable = [
        'pickup_from1',
        'pickup_from2',
        'pickup_from3',
        'pickup_hotel1',
        'pickup_hotel2',
        'pickup_hotel3',
        'destination1',
        'destination2',
        'destination3',
        'drop_hotel1',
        'drop_hotel2',
        'drop_hotel3',
        'pickup_date1',
        'pickup_date2',
        'pickup_date3',
        'pickup_time1',
        'pickup_time2',
        'pickup_time3',
        'booking_id',
        'disney_id',
        'pickup_address1',
        'pickup_address2',
        'pickup_address3',
        'dropoff_address1',
        'dropoff_address2',
        'dropoff_address3',
    ];



    protected $table = 'pickup_destinations';

    protected $casts = [
        'pickup_time1' => 'datetime',
        'pickup_time2' => 'datetime',
        'pickup_time3' => 'datetime',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function disney()
    {
        return $this->belongsTo(Disney::class);
    }
    public function pickupFrom1()
    {
        return $this->belongsTo(PickupFrom::class,'pickup_from1','id');
    }
    public function pickupFrom2()
    {
        return $this->belongsTo(PickupFrom::class,'pickup_from2','id');
    }

    public function pickupFrom3()
    {
        return $this->belongsTo(PickupFrom::class,'pickup_from3','id');
    }

    public function destinationName1()
    {
        return $this->belongsTo(Destination::class,'destination1','id');
    }
    public function destinationName2()
    {
        return $this->belongsTo(Destination::class,'destination2','id');
    }
    public function destinationName3()
    {
        return $this->belongsTo(Destination::class,'destination3','id');
    }
    public function dropHotel1()
    {
        return $this->belongsTo(DropoffHotel::class,'drop_hotel1','id');
    }

    public function dropHotel2()
    {
        return $this->belongsTo(DropoffHotel::class,'drop_hotel3','id');
    }
    public function dropHotel3()
    {
        return $this->belongsTo(DropoffHotel::class,'drop_hotel3','id');
    }
    public function pickupHotel1()
    {
        return $this->belongsTo(PickupHotel::class,'pickup_hotel1','id');
    }

    public function pickupHotel2()
    {
        return $this->belongsTo(PickupHotel::class,'pickup_hotel3','id');
    }
    public function pickupHotel3()
    {
        return $this->belongsTo(PickupHotel::class,'pickup_hotel3','id');
    }

    public function getPickupDate1Attribute($date)
    {
        return Carbon::parse($date)->format('j M Y');
    }

    public function getPickupDate2Attribute($date)
    {
        return Carbon::parse($date)->format('j M Y');
    }

    public function getPickupDate3Attribute($date)
    {
        return Carbon::parse($date)->format('j M Y');
    }

    public function getPickupTime1Attribute($date)
    {
        return Carbon::parse($date)->format('h:i a');
    }

    public function getPickupTime2Attribute($date)
    {
        return Carbon::parse($date)->format('h:i a');
    }

    public function getPickupTime3Attribute($date)
    {
        return Carbon::parse($date)->format('h:i a');
    }
}
