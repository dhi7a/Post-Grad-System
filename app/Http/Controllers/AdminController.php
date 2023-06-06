<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhdEnrollment;
use App\Models\PersonalDetails;

class AdminController extends Controller
{
    //

    public function index()
    {
        // code to show dashboard for administrator role
        $applications = phdEnrollment::all();
        return view('admin.index',[
            'applications' => $applications
            // 'personalDetails' => $personalDetails
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
