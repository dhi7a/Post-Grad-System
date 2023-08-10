<?php

namespace App\Http\Controllers;

use App\Models\Diploma;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $exist = Diploma::where('userid', Auth::user()->id)->first();
        if(!is_null($exist))
        {
            return redirect()->route('university-studies.index');
        }
        return view('academics.diploma');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        //
        $validatedData = $request->validate([
            'programme' => 'nullable|string',
            'result' => 'nullable|string',
            'level' => 'nullable|string',
            'date' => 'nullable|string',
            'year' => 'nullable|string',
            'institution' => 'nullable|string',
        ]);

        // $selectedDate = $request->input('date');
        // $year = date('Y', strtotime($selectedDate));

        $diploma = new Diploma();
        $diploma->userid = auth()->user()->id;
        $diploma->programme = $request->input('programme');
        $diploma->result = $request->input('result');
        $diploma->level = $request->input('level');
        $diploma->institution = $request->input('institution');
        $diploma->date = $request->input('date'); // Save the complete date value in the 'date' field if needed.
        // $diploma->date =  $request->input('year'); // Store the extracted year value
        $diploma->save();

        // return redirect()->next()->with('Success', 'diploma details saved successfully.');
        return redirect()->route('university-studies.index')->with('Success', 'Dipolma details submitted successfully.');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function skip(Request $request)
    {
        // Store "None" in the database for the required fields.
        $diploma = new Diploma();
        $diploma->programme = 'None';
        $diploma->result = 'None';
        $diploma->level = 'None';
        $diploma->date = null;
        $diploma->institution = 'None';
        $diploma->save();

        // You can also set a success message if needed.
        // session()->flash('success', 'Skipped successfully.');

        // Redirect to the next page or wherever you want after skipping.
        return redirect()->route('university-studies.index')->with('Success', 'Dipolma details skipped.');
    }

}
