<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    protected $fillable = ['location_id', 'locker_number', 'status'];
}