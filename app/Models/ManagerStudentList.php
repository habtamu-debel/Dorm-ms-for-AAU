<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerStudentList extends Model
{
    use HasFactory;
    protected $table = 'manager_students_list';
    protected $fillable = [
        'student_id',
        'firstname',
        'lastname',
        'department',
        'year',
        'sex',
        'status',
       
    ];
}
