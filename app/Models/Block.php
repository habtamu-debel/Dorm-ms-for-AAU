<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $table = 'blocks';
    protected $primaryKey = 'blockName';
    protected $keyType = 'string';
    protected $fillable = [
        'staffid',
        'blockName',
        'capacity',
        'floor',
        'numRooms',
        'light',
        'lightNumber',
        'bathroom',
        'bathroomNumber',
        'fireHydrant',
        'fireHydrantNumber',
        'specialFacility',
        'specialFacilityNumber',
        'toilet',
        'toiletNumber',
        'mirror',
        'mirrorNumber',
    ];

    public function staff()
{
    return $this->belongsTo(Staff::class, 'staffid', 'staffid');
}
}


