<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\PhdEnrollment;
use App\Models\PersonalDetails;

class AdminController extends Controller
{
    //

    public function index()
    {
        // code to show dashboard for administrator role

        $applications = Application::join('personal_details','personal_details.userid','=','applications.userid')
        ->join('proposed_field_studies','proposed_field_studies.userid','=','applications.userid')
        ->select('applications.id as id','personal_details.forenames','personal_details.surname','proposed_field_studies.description')
        ->get();
        //dd($applications);
        return view('admin.index',[
            'applications' => $applications


        ]);
    }

    public function manageUsers()
    {
        // code to show/manage users for administrator role
    }

    public function managePayments()
    {
        // code to show/manage payments for administrator role
    }

    public function editProfile()
    {
        // code to edit profile for administrator role
    }
}
