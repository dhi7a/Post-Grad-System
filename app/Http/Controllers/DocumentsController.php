<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DocumentsController extends Controller
{
    //

    public function index()
    {
        $exist = Documents::where('userid', Auth::user()->id)->first();
        if(!is_null($exist))
        {
            return redirect()->route('finished.index');
        }
        return view('academics.documents');
    }

    public function store(Request $request)
    {
        $userId = auth ()->user()->id;

        $validatedData = $request->validate([
            'id_documents' => 'required',
            'certificates' => 'required',
            'dissertation_proposal' => 'required',
        ]);

        // create a new record in the database


        // save data to database
        $documents = new Documents();
        $documents-> userid = auth()->id();
        $documents->id_documents = $request->id_documents;
        $documents->certificates = $request->certificates;
        $documents->dissertation_proposal = $request->dissertation_proposal;

        $documents->save();

            return redirect()->route('finished.index')->with('Message', 'Thank you for applying with Midlands State University');
    }

}
