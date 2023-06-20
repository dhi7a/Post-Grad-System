<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PhoneNumbers;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $phone = PhoneNumbers::where('user_id', Auth::id())->first();

        if(is_null($phone))
        {
            return view('auth.verify-phone');
        }

        if($phone->is_verified)
        {

            if(Auth::user()->hasRole('administrator'))
            {
                return redirect()->route('admin-dashboard');
            }
            elseif(Auth::user()->hasRole('user'))
            {
                return redirect()->route('user-dashboard');
            }
            elseif(Auth::user()->hasRole('student'))
            {
                return redirect()->route('student-dashboard');
            }
            elseif(Auth::user()->hasRole('faculty'))
            {
                return redirect()->route('faculty-dashboard');
            }
            elseif(Auth::user()->hasRole('supervisor'))
            {
                return redirect()->route('supervisor-dashboard');
            }
        }else{
            return view('auth.verify-phone');
        }
    }
}
