<?php

namespace App\Http\Controllers;

use App\Models\PhdEnrollment;
use App\Models\Application;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('apply');
    }


    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'programme' => 'required',
            'status' => 'required',
            'title' => 'required',
            'surname' => 'required',
            'forenames' => 'required',
            'marital_status' => 'required',
            'nationality' => 'required',
            'national_id' => 'required',
            'permanent_residence' => 'required',
            'passport_no' => 'required',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required',
            'contact_address' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
        ]);

        // Create a new application record in the database
        $application = Application::create($validatedData);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Application submitted successfully!');
        // return redirect()->route('diploma.index')->with('success', 'details submitted succesfully.');


    }

    public function show()
    {
        // Retrieve the application by the authenticated user ID
        $application = Application::where('user_id', Auth::id())->first();

        // Check if the application exists
        if ($application) {
            // Return a view with the application data
            return view('user.application.show', ['application' => $application]);
        } else {
            // Redirect to a page with an error message
            return redirect()->route('dashboard')->with('error', 'Application not found.');
        }
    }

    public function create()
    {
        return view('application');
    }
}
