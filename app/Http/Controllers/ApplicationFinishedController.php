<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationFinishedController extends Controller
{
    //
    public function index()
    {
        $applied = Application::where('userid',Auth::id())->first();
        if(is_null($applied)){
            $newApplication = new Application();
            $newApplication->userid=Auth::id();
            $newApplication->status=0;

            $newApplication->save();
        }
        return view('academics.applicationFinished');
    }
}
