<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomMaintenance extends Model
{
    use HasFactory;
    protected $table = 'room_maintenances';

    protected $fillable = [
        'student_id',
        'room_number',
        'maintenance_type',
        'urgency',
        'attachment',
        'date',
        'description',
        'contact',
        'status',
        'response',
    ];

    public function getAttachmentUrlAttribute()
{
    if ($this->attachment) {
        // Assuming the 'attachments' folder is used to store the files
        return asset('attachments/' . $this->attachment);
    }
    return null;
}

public function student()
{
    return $this->belongsTo(Student::class, 'student_id', 'student_id');
}
}
