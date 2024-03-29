<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\PersonalDetails;
use App\Models\Diploma;
use App\Models\Dissertation;
use App\Models\Documents;
use App\Models\Department;
use App\Models\EmploymentExperience;
use App\Models\Faculty;
use App\Models\ProposedFieldStudy;
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
use Illuminate\Support\Facades\View;


class DepartmentController extends Controller
{
    public function index()
    {

        $acceptedApplications = DB::table('applications')
        ->join('personal_details', 'personal_details.userid', '=', 'applications.userid')
        ->join('proposed_field_studies', 'proposed_field_studies.userid', '=', 'applications.userid')
        ->select('applications.id as id', 'personal_details.forenames', 'personal_details.surname', 'proposed_field_studies.description','applications.status')
        ->where('applications.flagid', '1')
        // ->where('applications.status', 'Accepted')
        ->get();



        return view('department.index', ['acceptedApplications' => $acceptedApplications]);
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
            $rejectionMessage = DB::table('rejections')->get();
            $revisionMessages = DB::table('revisions')->get();



            // Check if personal details exist
            if ($personalDetails) {
                // Return a view with the application and personal details data
                return view('department.show', [
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
                    'rejectionMessage' => $rejectionMessage,
                    'revisionMessages' => $revisionMessages,
                ]);
            }
        }

        // Redirect to a page with an error message
        return redirect()->route('dashboard')->with('error', 'Application not found.');
    }


    public function accept($id)
    {
        // Find the application by ID
        $acceptedApplications = Application::findOrFail($id);

        // Perform actions to accept the application
        // For example, update the application status, notify the applicant, etc.
        $acceptedApplications->status = 'Accepted';
         DB::table('applications')->where('id', $id)->increment('flagid');
        //$acceptedApplications->flagid += 1;
        $acceptedApplications->save();


        return redirect()->back()->with('success', 'Application accepted successfully.');

        // Redirect back or to a specific page

    }

    public function proceed($id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        $application->status = 'Proceed';
        $application->flagid = 3; // Set the flagid to 3

        $application->save();

        // Redirect back or to a specific page
        // return redirect()->back()->with('success', 'Application forwarded successfully.');
        return redirect()->route('dashboard');
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
        // return redirect()->back()->with('success', 'Application recommended successfully.');
        return redirect()->route('dashboard');
    }


    public function revise(Request $request, $id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        $application->status = 'Revise and resubmit';
        DB::table('applications')->where('id', $id)->decrement('flagid');
        //$acceptedApplications->flagid += 1;
        $application->save();

        // Save the revision message
        $message = $request->input('message');
        $userName = $request->user()->name;
        $userRole = $request->user()->role;

        $revision = new Revision();
        $revision->application_id = $application->id;
        $revision->message = $message;
        $revision->user_name = $userName;
        $revision->user_role = $userRole;
        $revision->save();

        // Retrieve the revision messages
        $revisionMessages = DB::table('revisions')->get();

        // Redirect back or to a specific page
        return redirect()->back()->with([
            'success' => 'Application recommended successfully.',
            'revisionMessages' => $revisionMessages
        ]);
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
        $userName = $request->user()->name;
        $userRole = $request->user()->role;

        $reject = new Rejections();
        $reject->application_id = $application->id;
        $reject->message = $message;
        $reject->user_name = $userName;
        $reject->user_role = $userRole;
        $reject->save();

        // Retrieve the rejection message
        $rejectionMessage = DB::table('rejections')->get();

        return redirect()->back()->with([
            'success' => 'Application rejected.',
            'rejectionMessage' => $rejectionMessage
        ]);

    }

    public function departments()
    {
        $departments = Department::with('faculty')->get();
        $faculties = Faculty::all();
        return view('admin.departments', compact('departments', 'faculties'));

    }



public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|unique:departments|max:255',
        'facultyid' => 'required|exists:faculties,id', // Make sure the faculty_id exists in the faculties table
    ]);

    Department::create([
        'name' => $validatedData['name'],
        'facultyid' => $validatedData['facultyid'],
    ]);

    return redirect()->route('departments.index')->with('success', 'Department added successfully.');
}






}




