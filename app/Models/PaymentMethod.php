<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory;


    protected $fillable = ['name'];



    protected $table = 'payment_methods';

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
