<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculty;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'facultyid',
        ];

        public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'facultyid', 'id');
    }
}
