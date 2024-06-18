<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeanReports extends Model
{
    use HasFactory;
    protected $table = 'dean_reports';

    protected $fillable = [
        
            'numStudentsAllocated',
            'numStudentClearanced',
            'numMaintenances',
            'numSevereMaintenances',
            'DormsCleaning',
            'statusOfServices',
            'numFreeDorms',
      
    ];
}
