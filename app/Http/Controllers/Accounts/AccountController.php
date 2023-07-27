<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LinkRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = User::all();
        return view('accounts.accounts',[
            'accounts' => $accounts,
        ]);
    }

    public function add(Request $request)
    {
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'role' => ['required', 'string'],
                'facultyid' => ['required_if:role,faculty', 'integer'],
                'departmentid' => ['required_if:role,department', 'integer']
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if($request->role == 'faculty')
            {
                $faculty = new LinkRole();
                $faculty->userid = $user->id;
                $faculty->facultyid = $request->facultyid;
                $faculty->save();
            }elseif($request->role == 'department')
            {
                $faculty = new LinkRole();
                $faculty->userid = $user->id;
                $faculty->departmentid = $request->departmentid;
                $faculty->save();
            }
            // Assign the 'user' role to the new user
            $user->addRole($request->role);
            event(new Registered($user));



            return redirect()->back()->with('success', 'User account added successfully');
        }catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
