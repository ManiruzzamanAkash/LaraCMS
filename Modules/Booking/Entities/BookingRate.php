<?php

namespace Modules\Booking\Entities;

use Illuminate\Database\Eloquent\Model;

class BookingRate extends Model
{
    protected $fillable = [
        'name',
        'rate'
    ];
}
