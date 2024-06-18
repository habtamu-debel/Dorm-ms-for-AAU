<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeanFeedback extends Model
{
    use HasFactory;
    protected $table = 'dean_feedbacks';
    protected $fillable = [
        'campus',
        'comment',
    ];
}
