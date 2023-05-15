<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    //


    public function index()
    {
        // code to show dashboard for faculty role
        return view('supervisor.index');
    }

    public function manageUsers()
    {
        // code to show/manage users for faculty role
    }

    public function editProfile()
    {
        // code to edit profile for faculty role
    }
}
