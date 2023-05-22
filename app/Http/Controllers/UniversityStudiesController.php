<?php

namespace App\Http\Controllers;

use App\Models\UniversityStudies;
use Illuminate\Http\Request;

class UniversityStudiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('academics.university_studies');
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
        //
        $userId = auth()->user()->id;
        //
        $validatedData = $request->validate([
            // 'userid' => 'required|integer',
            'programme' => 'required|string',
            'class' => 'required|string',
            'institution' => 'required|string',
            'date' => 'required',
        ]);

       $universityStudies = new UniversityStudies();
       $universityStudies->userid = auth()->user()->id;
       $universityStudies->programme = $request->programme;
       $universityStudies->class = $request->class;
       $universityStudies->institution = $request->institution;
       $universityStudies->date = $request->date;

        $universityStudies->save();

        return redirect()->route('research-experience.index')->with('Success', 'University study details saved successfully.');


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
}
