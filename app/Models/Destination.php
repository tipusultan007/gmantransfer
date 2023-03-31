<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;


    protected $fillable = ['name'];



    public function dropoffHotels()
    {
        return $this->hasMany(DropoffHotel::class);
    }
}
