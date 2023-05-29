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

    public function editProfile()
    {
        // code to edit profile for student role
    }

    public function downloads()
    {
        return view('student.downloads');
    }
}
