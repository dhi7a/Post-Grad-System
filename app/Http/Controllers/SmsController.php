<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Twilio\Jwt\ClientToken;
use GuzzleHttp\Exception\GuzzleException;
use App\Models\SmsVerification;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected $smsVerification;

    public function __construct()
    {
        $this->smsVerification = new SmsVerification();
    }

    public function store(Request $request)
    {
        $code = rand(1000, 9999); // Generate random code
        $request->merge(['code' => $code]); // Add code to the request

        $response = $this->smsVerification->store($request);

        return response()->json($response, 200);
    }

    public function sendSms(Request $request)
    {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];

        try {
            $client = new Client(['auth' => [$accountSid, $authToken]]);
            $result = $client->post(
                'https://api.twilio.com/2010-04-01/Accounts/'.$accountSid.'/Messages.json',
                [
                    'body' => json_encode([
                        'Body' => 'CODE: '.$request->code,
                        'To' => $request->contact_number,
                        'From' => '+13613094343' // Your Twilio number

                    ])
                ]
            );

            return $result;
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function verifyContact(Request $request)
    {
        $smsVerification = SmsVerification::where('contact_number', $request->contact_number)
            ->latest()
            ->first();

        if ($smsVerification && $request->code == $smsVerification->code) {
            $smsVerification->is_verified = True;
            $smsVerification->save();

            return response()->json(['message' => 'verified'], 200);
        } else {
            return response()->json(['message' => 'not verified'], 200);
        }
    }
}
