<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhdEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'research_interests',
        'id_documents',
        'certificates',
        'dissertation_proposal',
        'intake',
        // Add more fields here
    ];
}

