<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentAccount extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id',
        'password',
    ];

    /**
     * Get the student associated with the student account.
     */
    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }
}
