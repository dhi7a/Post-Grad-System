<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumbers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'code',
        'is_verified',
        // Add more fields here
    ];
}
