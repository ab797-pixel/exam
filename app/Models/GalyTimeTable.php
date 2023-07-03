<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalyTimeTable extends Model
{
    
    protected $fillable = [
        'id',
        'hall_number',
        'date',
        'session',
        'subcode',
        'degree',
        'subject',    
        'reg_no',
    ];
}
