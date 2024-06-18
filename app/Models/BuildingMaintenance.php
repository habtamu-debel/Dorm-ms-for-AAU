<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingMaintenance extends Model
{
    use HasFactory;
    protected $table = 'building_maintenances';
    protected $fillable = [
        'block',
        'floor',
        'category',
        'occurrence',
        'impact',
        'urgency',
        'room',
        'description',
        'contact',
    ];
}
