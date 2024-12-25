<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking; 

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'host_id',
        'beds',
        'washrooms',
        'guests',
        'address',
        'price',
        'amenities',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class); 
    }
}
