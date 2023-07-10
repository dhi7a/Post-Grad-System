<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    protected $table = 'revisions';

    protected $fillable = [
        'application_id',
        'message',
        'username',
        'role',
    ];

    // Define the relationship with the Application model
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}

