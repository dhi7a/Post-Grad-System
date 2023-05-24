<?php

namespace App\Http\Controllers;

use App\Models\ResearchExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ResearchExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $exist = ResearchExperience::where('userid', Auth::user()->id)->first();
        if(!is_null($exist))
        {
            return redirect()->route('publications.index');
        }
        return view('academics.researchExperience');
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
            'description' => 'nullable|string',
        ]);

       $researchExperience = new ResearchExperience();
       $researchExperience->userid = auth()->user()->id;
       $researchExperience->description = $request->description;


        $researchExperience->save();

        return redirect()->route('publications.index')->with('Success', 'Research details saved successfully.');

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
