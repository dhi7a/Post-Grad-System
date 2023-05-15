<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhdEnrollment;

class UserController extends Controller
{
    //

    public function index()
    {
        return view('user.index');
    }

    public function editProfile()
    {
        // code to edit profile for student role
    }
}
