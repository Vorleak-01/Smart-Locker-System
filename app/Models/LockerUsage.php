<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LockerUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'locker_id',
        'user_id',
        'access_code',
        'status',
        'started_at',
        'ended_at',
    ];

    public function locker()
    {
        return $this->belongsTo(Locker::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}