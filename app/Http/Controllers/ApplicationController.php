<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetails;
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
        $application = Application::find($id);

        // Check if the application exists
        if ($application) {
            // Retrieve the associated personal details
            $personalDetails = PersonalDetails::where('userid', $application->userid)->first();
            $subjects = Subjects::where('userid', $application->userid)->get();
            $diplomas = Diploma::where('userid', $application->userid)->first();
            $dissertations = Dissertation::where('userid', $application->userid)->first();
            $universityStudies = UniversityStudies::where('userid', $application->userid)->first();
            $researchExperiences = ResearchExperience::where('userid', $application->userid)->first();
            $relevantPublications = RelevantPublications::where('userid', $application->userid)->first();
            $employmentExperiences = EmploymentExperience::where('userid', $application->userid)->first();
            $proposedFieldStudies = ProposedFieldStudy::where('userid', $application->userid)->first();
            $referees = Referees::where('userid', $application->userid)->get();

            // Check if personal details exist
            if ($personalDetails) {
                // Return a view with the application and personal details data
                return view('application.show', [
                    'application' => $application,
                    'personalDetails' => $personalDetails,
                    'subjects' => $subjects,
                    'diplomas' => $diplomas,
                    'dissertations' => $dissertations,
                    'universityStudies' => $universityStudies,
                    'researchExperiences' => $researchExperiences,
                    'relevantPublications' => $relevantPublications,
                    'employmentExperiences' => $employmentExperiences,
                    'proposedFieldStudies' => $proposedFieldStudies,
                    'referees' => $referees,
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

    public function accept($id)
    {
       // Find the application by ID
    $application = Application::findOrFail($id);

    // Perform actions to accept the application
    // For example, update the application status, notify the applicant, etc.
    $application->status = 'Accepted';
    $application->save();

    // Redirect back or to a specific page
    return redirect()->back()->with('success', 'Application accepted successfully.');
}

    public function recommend($id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        // Perform actions to recommend the application
        // For example, update the application status, notify the applicant, etc.

        // Redirect back or to a specific page
        return redirect()->back()->with('success', 'Application recommended successfully.');
    }

    public function reject($id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        // Perform actions to reject the application
        // For example, update the application status, notify the applicant, etc.

        // Redirect back or to a specific page
        return redirect()->back()->with('success', 'Application rejected successfully.');
    }

    public function sendRecommendation(Request $request)
{
    // Retrieve the recommendation from the request
    $recommendation = $request->input('recommendation');

    // Send the recommendation to the applicant (you can use email, notifications, etc.)

    // Return a response indicating the recommendation was sent successfully
    return response()->json(['message' => 'Recommendation sent'], 200);
}

}
