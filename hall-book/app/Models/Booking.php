<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'student_no', 'userID','nic_no', 'phone', 'email', 'faculty', 'society', 'institution', 'post', 'category', 'event_type', 'event_description', 'booking_dates', 'facilities', 'documents','department','division','address'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'booking_dates' => 'json', // Cast 'booking_dates' attribute to JSON format
        'facilities' => 'json',    // Cast 'facilities' attribute to JSON format
        'documents' => 'json',     // Cast 'documents' attribute to JSON format
    ];
}