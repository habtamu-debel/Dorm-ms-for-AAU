<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'clearance_id',
        'requester_name',
        'department',
        'issue_description',
        'supporting_documents',
        'contact_details',
    ];

    public function clearance()
    {
        return $this->belongsTo(Clearance::class);
    }
}