<?php

namespace App\Http\Middleware;

use App\Models\PhoneNumbers;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NumberVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = PhoneNumbers::where('userid', 46)->first();

        // Check if the user is authenticated and has a phone number
        if (!$user->is_verified) {
            return redirect()->route('verify.phone');
        }

        // If the user is not authenticated or does not have a phone number,
        // proceed with the next middleware or request handling
        return $next($request);
    }
}

