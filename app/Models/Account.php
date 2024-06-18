<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staffid', 'password',
    ];

    /**
     * Get the staff record associated with the account.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staffid', 'staffid');
    }
}