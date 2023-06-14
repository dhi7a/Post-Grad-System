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
            $applied = Application::where('userid',Auth::id())->first();
            if(is_null($applied)){
                $newApplication = new Application();
                $newApplication->userid=Auth::id();
                $newApplication->status=0;

                $newApplication->save();
            }

            return redirect()->route('finished.index');
        }

        return view('student.index');

        // return view('apply');
    }


    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'userid' => 'required',
            'status' => 'required',

        ]);

        // Create a new application record in the database
        $application = Application::create($validatedData);

        // Redirect or return a response
        return redirect()->route('subjects.index')->with('success', 'Personal details submitted successfully!');
        // return redirect()->route('diploma.index')->with('success', 'details submitted succesfully.');


    }

    public function show($id)
{
    // Retrieve the application by the authenticated user ID
    $application = Application::where('userid', Auth::id())->first();

    // Check if the application exists
    if ($application) {
        // Retrieve the associated personal details
        $personalDetails = $application->personalDetails;

        // Check if personal details exist
        if ($personalDetails) {
            // Return a view with the application and personal details data
            return view('application.show', [
                'application' => $application,
                'personalDetails' => $personalDetails
            ]);
        }
    }

    // Redirect to a page with an error message
    return redirect()->route('dashboard')->with('error', 'Application not found.');
}




    public function create()
    {
        return view('application');
    }
}
