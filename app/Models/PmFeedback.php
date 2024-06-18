<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmFeedback extends Model
{
    use HasFactory;
    protected $table = 'pmfeedbacks';

    protected $fillable = [
        'staff_id',
        'comment',
    ];
   
}
