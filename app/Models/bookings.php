<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $primaryKey = 'bookings_id';

    protected $fillable = [
        'booking_name',
        'booking_description',
    ];
}
