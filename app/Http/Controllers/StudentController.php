<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Diploma;
use App\Models\Dissertation;
use App\Models\Documents;
use App\Models\EmploymentExperience;
use App\Models\PersonalDetails;
use App\Models\ProposedFieldStudy;
use App\Models\Referees;
use App\Models\RelevantPublications;
use App\Models\ResearchExperience;
use App\Models\Subjects;
use App\Models\UniversityStudies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    //

    public function index()
    {
        $exist1 = PersonalDetails::where('userid', Auth::user()->id)->first();
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
        //dd($exist1, $exist2, $exist3, $exist4, $exist5, $exist6, $exist7, $exist8, $exist9, $exist10, $exist11);
        if(!is_null($exist1) && !is_null($exist2) && !is_null($exist3) && !is_null($exist4) && !is_null($exist5) && !is_null($exist6) && !is_null($exist7) && !is_null($exist8) && !is_null($exist9) && !is_null($exist10) && !is_null($exist11))
        {
            return redirect()->route('finished.index');
        }

        return view('student.index');
    }

    public function viewApplication($id)
        {
            // Retrieve the application by the given ID and belonging to the authenticated user
            $application = Application::where('userid', Auth::id())->find($id);


            // Check if the application exists and belongs to the authenticated user
            if ($application) {
                // Retrieve the associated personal details and other related data
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


                // Return a view with the application and related data
                return view('student.viewApplication', [
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
                    // ... Add other related data to the view
                ]);
            }

            // Redirect to a page with an error message
            return redirect()->route('dashboard')->with('error', 'Application not found.');
        }

    public function editApplication($id)
        {
            // Retrieve the application by the given ID and belonging to the authenticated user
            $application = Application::where('userid', Auth::id())->find($id);

            // Check if the application exists and belongs to the authenticated user
            if ($application) {
                // Retrieve the associated personal details and other related data
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
                // ... Retrieve other related data

                // Return a view with the application and related data for editing
                return view('student.editApplication', [
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
                    // 'rejectionMessage' => $rejectionMessage,
                    // 'revisionMessages' => $revisionMessages,
                    // ... Include other related data for editing
                ]);
            }

            // Redirect to a page with an error message
            return redirect()->route('dashboard')->with('error', 'Application not found.');
        }

    public function updateApplication(Request $request, $id)
        {
            // Retrieve the application by the given ID and belonging to the authenticated user
            $application = Application::where('userid', Auth::id())->find($id);

            // Check if the application exists and belongs to the authenticated user
            if ($application) {
                // Update application data based on the submitted form data in $request
                // Save updated data to the database

                // Redirect back to the application view or dashboard with a success message
                return redirect()->route('viewApplication', $id)->with('success', 'Application updated successfully.');
            }

            // Redirect to a page with an error message
            return redirect()->route('dashboard')->with('error', 'Application not found.');
        }




    public function editProfile()
    {
        // code to edit profile for student role
    }

    public function downloads()
    {
        return view('finished.index');
    }
}
