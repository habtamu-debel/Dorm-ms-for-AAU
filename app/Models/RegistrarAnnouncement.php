<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrarAnnouncement extends Model
{
    use HasFactory;
    protected $table = 'registrar_announcements';
    
    protected $fillable = [
        'title',
        'content',
        'type',
        'attachment',
    ];
}
