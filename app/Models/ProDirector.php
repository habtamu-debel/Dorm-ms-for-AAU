<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProDirector extends Model
{
    protected $table = 'pro_directors'; // Specify the table name

    protected $fillable = [
        'student_id',
        'firstname',
        'lastname',
        'department',
        'year',
        'sent' // Add the 'sent' field if you want to track whether a student has been sent or not
    ];
}