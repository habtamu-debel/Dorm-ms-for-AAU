<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProctorRequest extends Model
{
    use HasFactory;
    protected $table = 'proctor_requests';
    protected $primaryKey = 'requestId';
    protected $fillable = [
        'requestId',
        'category',
        'occurrence',
        'media',
        'impact',
        'urgency',
        'room',
        'description',
        'contact',
    ];

    public function getAttachmentUrlAttribute()
    {
        if ($this->media) {
            // Assuming the 'attachments' folder is used to store the files
            return asset('media/' . $this->media);
        }
        return null;
    }
}
