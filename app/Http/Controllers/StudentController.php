<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
   
    public function index()
    {
        
        return view('student.index');
    }

    public function editProfile()
    {
        // code to edit profile for student role
    }

    public function downloads()
    {
        return view('student.downloads');
    }
}
