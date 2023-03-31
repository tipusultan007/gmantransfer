<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DropoffHotel extends Model
{
    use HasFactory;


    protected $fillable = ['destination_id', 'name'];



    protected $table = 'dropoff_hotels';

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
