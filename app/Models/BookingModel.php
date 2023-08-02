<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id_booking';
    protected $allowedFields = ['hotel_id', 'user_id', 'created_at'];

    // Set up the relationship with the hotels table using the custom foreign key
    public function hotel()
    {
        return $this->belongsTo('App\Models\HotelModel', 'hotel_id');
    }
}
