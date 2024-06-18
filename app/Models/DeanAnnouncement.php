<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeanAnnouncement extends Model
{
    use HasFactory;
    protected $table = 'dean_announcements';
    
    protected $fillable = [
        'title',
        'content',
        'type',
        'attachment',
    ];
}
