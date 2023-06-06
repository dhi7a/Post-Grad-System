<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetails;
use App\Models\PhoneNumbers;
use App\Models\ProposedFieldStudy;
use App\Models\Referees;
use App\Models\RelevantPublications;
use App\Models\Subjects;
use App\Models\UniversityStudies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WizardController extends Controller
{
    public function submit(Request $request)
    {
        // Get the current step from the request
        $step = $request->input('step');

        // Determine the appropriate action based on the current step
        switch ($step) {
            case 'personal_details':
                return $this->processPersonalDetails($request);
            case 'proposed_field_study':
                return $this->processProposedFieldStudy($request);
            case 'referees':
                return $this->processReferees($request);
            case 'relevant_publications':
                return $this->processRelevantPublications($request);
            case 'subjects':
                return $this->processSubjects($request);
            case 'university_studies':
                return $this->processUniversityStudies($request);
            default:
                return redirect()->back()->with('error', 'Invalid step.');
        }
    }

    private function processPersonalDetails(Request $request)
    {
        // Validate the personal details form data
        $validatedData = $request->validate([
            // Add validation rules for personal details fields
        ]);

        // Store the personal details in the database
        $personalDetails = new PersonalDetails();
        // Set the values of personal details properties based on the validated data
        $personalDetails->save();

        // Advance to the next step
        return redirect()->route('wizard.step', ['step' => 'proposed_field_study']);
    }

    private function processProposedFieldStudy(Request $request)
    {
        // Validate the proposed field study form data
        $validatedData = $request->validate([
            // Add validation rules for proposed field study fields
        ]);

        // Store the proposed field study in the database
        $proposedFieldStudy = new ProposedFieldStudy();
        // Set the values of proposed field study properties based on the validated data
        $proposedFieldStudy->save();

        // Advance to the next step
        return redirect()->route('wizard.step', ['step' => 'referees']);
    }

    // Implement similar methods for the remaining steps

    // ...

    public function showStep(Request $request, $step)
    {
        // Render the view for the specified step
        return view('wizard.step', compact('step'));
    }
}
