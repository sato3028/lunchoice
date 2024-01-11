<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'kitchen_id', 'image_data'];

    public function kitchen()
    {
        return $this->belongsTo(Kitchen::class);
    }

    public function reservationDetails()
    {
        return $this->hasMany(ReservationDetail::class);
    }
}
