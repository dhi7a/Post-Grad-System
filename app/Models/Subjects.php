<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'grade',
        'exam_board',
        'date',
        'level',
    ];
}
