<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorReport extends Model
{
    use HasFactory;
    protected $table = 'director_reports';

    protected $fillable = [
            'numStudentsAccepted',
            'numStudentsAllocated',
            'numStudentClearanced',
            'numFreeDorms',
      
    ];
}
