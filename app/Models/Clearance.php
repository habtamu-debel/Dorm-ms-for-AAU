<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clearance extends Model
{
    use HasFactory;
    protected $table = 'clearances';
    protected $fillable = [
        'student_id',
        'student_name',
        'department',
        'reason',
        'supporting_documents',
        'contact_details',
    ];
}
