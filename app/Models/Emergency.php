<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;

  
    protected $table = 'emergencyy';
    protected $fillable = [
        'student_id',
        'student_name',
        'request_type',
        'description',
        'contact_phone',
        'urgency_level',
        'supporting_media',
        'location_of_emergency',
        'building_name',
        'room_number',
        'other_location',
    ];

   
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}