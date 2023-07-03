<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PersonalDetails;


class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme',
        'status',
        'title',
        'surname',
        'forenames',
        'marital_status',
        'nationality',
        'national_id',
        'permanent_residence',
        'passport_no',
        'date_of_birth',
        'place_of_birth',
        'disabilities',
        'contact_address',
        'home_phone',
        'contact_number',
        'email',
        'fax',
        'prospective_sponsors',
        'msu_staff_dependant',
        'msu_staff_member',
        
    ];
}
