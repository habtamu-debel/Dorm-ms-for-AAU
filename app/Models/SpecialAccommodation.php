<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialAccommodation extends Model
{
    use HasFactory;
    protected $table = 'special_accommodations';
    protected $fillable = [
        'student_id',
        'reason',
        'medical_documentation',
        'preferred_accommodation',
        'supporting_information',
        'contact_details',
    ];

    /**
     * Get the student associated with the special accommodation.
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}