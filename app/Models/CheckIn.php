<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'room_number',
        'bed',
        'table',
        'locker',
        'light',
        'charger',
        'mirror',
        'trash',
        'toilet',
        'bath',
    ];

    // Define the relationship with dorm
    public function Room()
    {
        return $this->belongsTo(Room::class, 'room_number');
    }
    public function resources()
{
    return $this->hasMany(Resource::class);
}
}
