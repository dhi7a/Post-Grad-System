<?php

namespace App\Http\Controllers;

use App\Models\PhdEnrollment;
use App\Models\Application;
use App\Models\Diploma;
use App\Models\Dissertation;
use App\Models\Documents;
use App\Models\EmploymentExperience;
use App\Models\ProposedFieldStudy;
use App\Models\Referees;
use App\Models\RelevantPublications;
use App\Models\ResearchExperience;
use App\Models\Subjects;
use App\Models\UniversityStudies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        // $exist1 = Application::where('userid', Auth::user()->id)->first();
        $exist2 = Diploma::where('userid', Auth::user()->id)->first();
        $exist3 = Dissertation::where('userid', Auth::user()->id)->first();
        $exist4 = Documents::where('userid', Auth::user()->id)->first();
        $exist5 = EmploymentExperience::where('userid', Auth::user()->id)->first();
        $exist6 = ProposedFieldStudy::where('userid', Auth::user()->id)->first();
        $exist7 = Referees::where('userid', Auth::user()->id)->first();
        $exist8 = RelevantPublications::where('userid', Auth::user()->id)->first();
        $exist9 = ResearchExperience::where('userid', Auth::user()->id)->first();
        $exist10 = Subjects::where('userid', Auth::user()->id)->first();
        $exist11 = UniversityStudies::where('userid', Auth::user()->id)->first();
        // !is_null($exist1) &&
        if(!is_null($exist2) && !is_null($exist3) && !is_null($exist4) && !is_null($exist5) && !is_null($exist6) && !is_null($exist7) && !is_null($exist8) && !is_null($exist9) && !is_null($exist10) && !is_null($exist11))
        {
            return redirect()->route('finished.index');
        }
        
        return view('student.index');

        // return view('apply');
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
        return redirect()->route('subjects.index')->with('success', 'Personal details submitted successfully!');
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
