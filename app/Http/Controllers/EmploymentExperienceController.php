<?php

namespace App\Http\Controllers;

use App\Models\EmploymentExperience;
use Illuminate\Http\Request;

class EmploymentExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('academics.employmentExperience');
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
            'userid' => 'required|integer',
            'position' => 'required|string',
            'employer' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string',
        ]);

       $employmentExerience = new EmploymentExperience();
       $employmentExerience->userid = auth()->user()->id;
       $employmentExerience->position = $request->position;
       $employmentExerience->employer = $request->employer;
       $employmentExerience->from = $request->from;
       $employmentExerience->to = $request->to;

        $employmentExerience->save();

        return redirect()->next()->with('Success', 'Employment details saved successfully.');


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
