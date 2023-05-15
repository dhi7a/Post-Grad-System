<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\PhdEnrollment;
use App\Models\Application;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('apply');
    }

    public function store(Request $request)
    {
        // Validation rules go here
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'research_interests' => 'required',
            'id_documents' => 'required',
            'certificates' => 'required',
            'dissertation_proposal' => 'required',
            'intake' => 'required',
            // Add more validation rules here
        ]);

        // Save data to database
        // Modify this code to fit your database structure
        $phdEnrollment = new PhdEnrollment();
        $phdEnrollment->userid = auth()->id();
        $phdEnrollment->name = $request->name;
        $phdEnrollment->email = $request->email;
        $phdEnrollment->research_interests = $request->research_interests;
        $phdEnrollment->id_documents = $request->id_documents;
        $phdEnrollment->certificates = $request->certificates;
        $phdEnrollment->dissertation_proposal = $request->dissertation_proposal;
        $phdEnrollment->intakeid = $request->intake;
        $phdEnrollment->status = 1;
        
        // Add more fields to save to database
        $phdEnrollment->save();

        //return redirect('/apply')->with('success', 'Your application has been submitted successfully!');

        return back()->with('success', 'Your application has been submitted successfully!');
    }




    public function show()
    {
        // Retrieve the application by the authenticated user ID
        $application = PhdEnrollment::where('user_id', Auth::id())->first();

        // Check if the application exists
        if ($application) {
            // Return a view with the application data
            return view('user.application.show', ['application' => $application]);
        } else {
            // Redirect to a page with an error message
            return redirect()->route('dashboard')->with('error', 'Application not found.');
        }
    }
}