<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMannouncement extends Model
{
   

    protected $fillable = ['title', 'content', 'type','attachment'];

    public function getAttachmentUrlAttribute()
{
    if ($this->attachment) {
        // Assuming the 'attachments' folder is used to store the files
        return asset('attachments/' . $this->attachment);
    }
    return null;
}
}
