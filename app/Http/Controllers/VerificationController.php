<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function showVerificationForm()
    {
        return view('auth/verify-phone');
    }

    public function handleVerification(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'contact_number' => 'required',
        ]);


        // Perform the necessary actions (e.g., send verification code)

        // Redirect the user to a different page or provide feedback
        return redirect('/verify-code');
    }

    public function showVerificationCodeForm()
    {
        return view('auth/verify-code');
    }

    public function handleVerificationCode(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'verification_code' => 'required',
        ]);

        // Perform the necessary actions to verify the code

        // Redirect the user to a different page or provide feedback
        return redirect('/Student');
    }
}
