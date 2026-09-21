<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['locker_id', 'reported_by', 'description', 'resolved'];
}
