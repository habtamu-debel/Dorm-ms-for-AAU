<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'student_id',
        'student_first_name',
        'student_last_name',
        'year',
        'department',
        'items_exit',
        'date_of_submission',
    ];
}
