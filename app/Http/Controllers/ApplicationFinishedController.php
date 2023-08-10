<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\PersonalDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationFinishedController extends Controller
{


    // working code
    // public function index()
    // {
    //     // Check if the user has an application
    //     $applied = Application::where('userid', Auth::id())->first();

    //     if (is_null($applied)) {
    //         // If the user doesn't have an application, create a new one
    //         $programme = PersonalDetails::where('userid', Auth::id())->first();
    //         $newApplication = new Application();
    //         $newApplication->userid = Auth::id();
    //         $newApplication->programmeid = $programme->programme;
    //         $newApplication->status = 0;

    //         $newApplication->save();

    //         $status = 'New'; // Set the default status for the newly created application
    //     } else {
    //         // If the user has an application, get the status
    //         $status = $applied->getStatus();
    //     }

    //     return view('academics.applicationFinished', ['status' => $status]);
    // }

    public function index()
    {
        // Check if the user has an application
        $applied = Application::where('userid', Auth::id())->first();

        if (is_null($applied)) {
            // If the user doesn't have an application, create a new one
            $programme = PersonalDetails::where('userid', Auth::id())->first();
            $newApplication = new Application();
            $newApplication->userid = Auth::id();
            $newApplication->programmeid = $programme->programme;
            $newApplication->status = 0;

            $newApplication->save();

            $status = 'New'; // Set the default status for the newly created application
        } else {
            // If the user has an application, get the status
            $status = $applied->getStatus();
        }

        // Calculate the progress percentage based on the current status
        $statuses = ['Admin side', 'Faculty', 'Department', 'DCCa (final stage)'];
        $progressPercentage = (array_search($status, $statuses) + 1) / count($statuses) * 100;

        // Retrieve the application by the authenticated user ID
        $application = Application::where('userid', Auth::id())->first();

        return view('academics.applicationFinished', [
            'status' => $status,
            'progressPercentage' => $progressPercentage,
            'application' => $application,
        ]);
    }



}
