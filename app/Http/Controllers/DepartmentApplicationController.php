<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentApplicationController extends Controller
{
    // public function index()
    // {
    //     // Retrieve all accepted applications
    //     // $acceptedApplications = Application::where('status', 'Accepted')->get();

    //     // return view('department.index', compact('acceptedApplications'));

    //     $acceptedApplications = Application::join('personal_details','personal_details.userid','=','applications.userid')
    //     ->join('proposed_field_studies','proposed_field_studies.userid','=','applications.userid')
    //     ->select('applications.id as id','personal_details.forenames','personal_details.surname','proposed_field_studies.description')
    //     ->get();
    //     // dd($applications);
    //     // return view('admin.index',['applications' => $applications]);
    //     // return view('department.index', compact('acceptedApplications'));
    //     return view('department.index', ['acceptedApplications' =>$acceptedApplications]);

    // }

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

    public function proceed($id)
    {
    // Find the application by ID
    $application = Application::findOrFail($id);

    $application->status = 'Proceed';
    DB::table('applications')->where('id', $id)->increment('flagid');
    //$acceptedApplications->flagid += 1;
    $application->save();

    // Redirect back or to a specific page
    return redirect()->back()->with('success', 'Application fowarded successfully.');
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

    public function reject($id)
    {
        // Find the application by ID
        $application = Application::findOrFail($id);

        // Perform actions to reject the application
        // For example, update the application status, notify the applicant, etc.
        $application->status = 'Rejected';
        $application->save();

        // Redirect back or to a specific page
        return redirect()->back()->with('success', 'Application rejected successfully.');
    }
}
