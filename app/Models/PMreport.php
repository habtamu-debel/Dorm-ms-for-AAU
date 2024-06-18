<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMreport extends Model
{
    use HasFactory;

    protected $table = 'pm_reports';

    protected $fillable = [
        'numStudents',
        'numCases',
        'numMaintenances',
        'numSevereMaintenances',
        'numDormsCleaning',
    ];
}