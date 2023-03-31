<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    use HasFactory;

    protected $fillable = ['pickup_from_id',
        'destination_id',
        'passengers',
        'price',
        'class5_price'];

    public function pickup()
    {
        return $this->belongsTo(PickupFrom::class);
    }
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
