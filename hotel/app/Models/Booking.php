<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room; // If you want to reference the Room model in Booking

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',      
        'guest_id',
        'status',  
        'start_date',    
        'end_date', 
        'price',       
        'guest_name',   
        'guest_email',   
        'guest_phone',   
    ];

    public function room()
    {
        return $this->belongsTo(Room::class); // A booking belongs to a room
    }

    public function guest()
    {
        return $this->belongsTo(User::class, 'guest_id'); // A booking belongs to a user (guest)
    }
}
