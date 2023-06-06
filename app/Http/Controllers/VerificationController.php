<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetails;
use App\Models\PhoneNumbers;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function showVerificationForm()
    {
        $phone_number = PersonalDetails::where('userid', Auth::id())->first();
        return view('auth/verify-phone',[
            'phone_number' => $phone_number
        ]);
    }

    public function handleVerification(Request $request)
    {

        // Validate the request data
        $request->validate([
            'contact_number' => 'required',
        ]);


        // Generate verification code
        $verificationCode = mt_rand(100000, 999999);

        // Send verification code to the user's phone number
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        $twilio->messages->create(
        $request->contact_number,
        // $request->input('contact_number'),
        [
            'from' => env('TWILIO_PHONE_NUMBER'),
            'body' => "Your verification code is: $verificationCode"
        ]
        );

        // Associate verification code with the user
        $phone = new PhoneNumbers();
        $phone->user_id = Auth::id();
        $phone->phone_number = $request->contact_number;
        $phone->code = $verificationCode;
        $phone->is_verified = false;
        $phone->save();

        // Redirect the user to the verify-code named route
        return redirect()->route('verify.code');

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
