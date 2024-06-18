<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DormChange extends Model
{
    use HasFactory;
    
    protected $table = 'dorm_changes';
    protected $fillable = [
        'student_id',
        'student_name',
        'current_dorm_duration',
        'reason',
        'description',
        'room_number_features',
        'special_needs',
        'supporting_file',
        'date_of_submission',
        'contact_details',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
