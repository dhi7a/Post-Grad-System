<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    protected $fillable = [
        'userid',
        'programme',
        // 'status',
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

    protected $dates = [
        'date_of_birth',
    ];

    public function personalDetails()
    {
        return $this->hasOne(PersonalDetails::class);
    }

}
