<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


   

class Post extends Model
{
    protected $fillable = [
        'item_status',
        'item_name',
        'location_found',
        'date_found',
        'additional_details',
    ];

    // Define relationships or add any other methods as needed
}

