<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupConfirmation extends Model
{
    use HasFactory;

    protected $fillable = ['reservation_id', 'pickup_time', 'pickup_state'];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
