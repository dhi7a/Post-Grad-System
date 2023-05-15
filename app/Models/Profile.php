<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'firstnames',
        'lastname',
        'phone_number',
        'national_id',
        'address',
    ];

}
