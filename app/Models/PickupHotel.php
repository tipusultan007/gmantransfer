<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PickupHotel extends Model
{
    use HasFactory;


    protected $fillable = ['pickup_from_id','name'];



    protected $table = 'pickup_hotels';

    public function pickupFrom()
    {
        return $this->belongsTo(PickupFrom::class);
    }
}
