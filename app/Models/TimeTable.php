<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    protected $fillable = [
        'id',
        'date',
        'day',
        'session',
        'subcode',
        'graduate',
        'title_of_the_paper',    
    ];
}
