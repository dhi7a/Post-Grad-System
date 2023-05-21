<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityStudies extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme',
        'class',
        'institution',
        'date',
    ];
}
