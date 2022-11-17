<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bookable extends Model
{
    use HasFactory;

    public function Bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function availableFor($from, $to) : bool {
        return 0 === $this->bookings()->betweenDates($from, $to)->count();
    }
}
