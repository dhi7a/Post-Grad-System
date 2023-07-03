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
        $user = Auth::user();

        if ($user->hasRole('student')) {
            $phone = PhoneNumbers::where('user_id', $user->id)->first();

            if (is_null($phone)) {
                return view('auth.verify-phone');
            }

            if ($phone->is_verified) {
                return redirect()->route('student-dashboard');
            } else {
                return view('auth.verify-phone');
            }
        }

        // Redirect to appropriate dashboard based on other roles
        if ($user->hasRole('administrator'))
        {
            return redirect()->route('admin-dashboard');
        }
        elseif ($user->hasRole('user'))
        {
            return redirect()->route('user-dashboard');
        }
         elseif ($user->hasRole('faculty'))
        {
            return redirect()->route('faculty-dashboard');
        }
        elseif ($user->hasRole('supervisor'))
        {
            return redirect()->route('supervisor-dashboard');
        }
        elseif ($user->hasRole('department'))
        {
            return redirect()->route('department-dashboard');
        }
    }

}
