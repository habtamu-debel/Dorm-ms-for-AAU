<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorAnnouncement extends Model
{
    use HasFactory;
    protected $table = 'director_announcements';
    
    protected $fillable = [
        'title',
        'content',
        'type',
        'attachment',
    ];
}
