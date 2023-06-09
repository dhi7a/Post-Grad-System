<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\PhdEnrollment;
use App\Models\Diploma;
use App\Models\Dissertation;
use App\Models\Documents;
use App\Models\EmploymentExperience;
use App\Models\ProposedFieldStudy;
use App\Models\PersonalDetails;
use App\Models\Referees;
use App\Models\RelevantPublications;
use App\Models\ResearchExperience;
use App\Models\Revision;
use App\Models\Rejections;
use App\Models\Subjects;
use App\Models\UniversityStudies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //

    public function index()
    {
        // code to show dashboard for administrator role

        $applications = Application::join('personal_details','personal_details.userid','=','applications.userid')
        ->join('proposed_field_studies','proposed_field_studies.userid','=','applications.userid')
        ->select('applications.id as id','personal_details.forenames','personal_details.surname','proposed_field_studies.description')
        ->get();
        // dd($applications);
        return view('admin.index',[
            'applications' => $applications


        ]);
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
            $documents = Documents::where('userid', $application->userid)->get();

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
                    'documents' => $documents,
                ]);
            }
        }

        // Redirect to a page with an error message
        return redirect()->route('dashboard')->with('error', 'Application not found.');
    }


    public function accept($id)
    {
       // Find the application by ID
    $application = Application::findOrFail($id);

    // Perform actions to accept the application
    // For example, update the application status, notify the applicant, etc.
    // $application->status = 'Accepted';
    // $application->save();
    $application->status = '';
    DB::table('applications')->where('id', $id)->increment('flagid');
    //$acceptedApplications->flagid += 1;
    $application->save();

    // Redirect back or to a specific page
    return redirect()->back()->with('success', 'Application accepted successfully.');
    }


    public function proceed($id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        $application->status = 'Proceed';
        $application->flagid = 1; // Set the flagid to 2

        $application->save();

        // Redirect back or to a specific page
        return redirect()->back()->with('success', 'Application forwarded successfully.');
    }


    public function recommend($id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        $application->status = 'recommend';
        DB::table('applications')->where('id', $id)->decrement('flagid');
        //$acceptedApplications->flagid += 1;
        $application->save();

        // Redirect back or to a specific page
        return redirect()->back()->with('success', 'Application recommended successfully.');
    }

    public function revise(Request $request, $id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        $application->status = 'revise';
        DB::table('applications')->where('id', $id)->decrement('flagid');
        //$acceptedApplications->flagid += 1;
        $application->save();

        // Save the revision message
        $message = $request->input('message');

        $revision = new Revision();
        $revision->applicationid = $application->id;
        $revision->message = $message;
        $revision->save();

        // Redirect back or to a specific page
        return redirect()->back()->with('success', 'Application recommended successfully.');
    }

    public function reject(Request $request, $id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        $application->status = 'Rejected';
        DB::table('applications')->where('id', $id)->update(['flagid' => 0]);
        //$acceptedApplications->flagid += 1;
        $application->save();

        // Save the rejection message
        $message = $request->input('message');

        $reject = new Rejections();
        $reject->application_id = $application->id;
        $reject->message = $message;
        $reject->save();

        // Redirect back or to a specific page
        return redirect()->back()->with('success', 'Application rejected.');
    }


    public function manageUsers()
    {
        // code to show/manage users for administrator role
    }

    public function managePayments()
    {
        // code to show/manage payments for administrator role
    }

    public function editProfile()
    {
        // code to edit profile for administrator role
    }
}
