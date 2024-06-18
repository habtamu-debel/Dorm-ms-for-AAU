<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LostAndFoundRequest extends Model
{
    use HasFactory;
    protected $table = 'lost_and_found';

    protected $fillable = [
        'student_id',
        'item_status',
        'item_name',
        'location_found',
        'date_found',
        'additional_details',
        'claimant_contact',
        'photo',
    ];

    protected $dates = [
        'date_found',
    ];

    public function student()
    {
        return $this->belongsTo(Account::class, 'student_id');
    }
}

