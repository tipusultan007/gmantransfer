<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PickupFrom extends Model
{
    use HasFactory;


    protected $fillable = ['name'];



    protected $table = 'pickup_froms';

    public function pickupHotels()
    {
        return $this->hasMany(PickupHotel::class);
    }
}
