<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rejections extends Model
{
    use HasFactory;

    protected $table = 'rejections';

    protected $fillable = [
        'application_id',
        'message',
    ];

    // Define the relationship with the Application model
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
