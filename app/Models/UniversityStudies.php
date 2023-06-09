<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityStudies extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'programme',
        'class',
        'institution',
        'date',
    ];
}
