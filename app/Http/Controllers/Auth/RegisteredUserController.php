<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Models\PhoneNumbers;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\VerifiesEmails;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign the 'user' role to the new user
        $user->addRole('student');


        event(new Registered($user));

        Profile::create([
            'userid' => $user->id,
            'firstnames' => $request->firstnames,
            'lastname' => $request->lastname,
            'phone_number' => $request->phone_number,
            'national_id' => $request->national_id,
            'address' => $request->address,
        ]);

        PhoneNumbers::create(
            [
                'userid' => $user->id,
                'phone_number' => $request->phone_number,
                'is_verified' => False
            ]
        );



        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

        return redirect()->route('verification.notice');

    }
}
