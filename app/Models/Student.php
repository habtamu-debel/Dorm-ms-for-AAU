<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'student_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'student_id',
        'password',
        'firstname',
        'lastname',
        'department',
        'year',
        'status',
        'region',
        'disability',
        'zone',
        'wereda',
        'pmstatus',
    ];
    protected $casts = [
        'disability' => 'boolean',
    ];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'student_id');
    }

    public function room_maintenances()
    {
        return $this->hasMany(RoomMaintenance::class, 'student_id');
    }
}
