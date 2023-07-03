<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galy extends Model
{
    protected $fillable = [
        'id',
        'term',
        'degree',
        'batch',
        'centre',
        'subject',
        'subcode',
        'reg_no',
        'graduate',
    ];
}
