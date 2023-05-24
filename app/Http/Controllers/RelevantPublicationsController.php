<?php

namespace App\Http\Controllers;

use App\Models\RelevantPublications;
use Illuminate\Http\Request;

class RelevantPublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('academics.relevantPublications');

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
        //
        $userId = auth()->user()->id;
        //
        $validatedData = $request->validate([
            // 'userid' => 'required|integer',
            'description' => 'required|string',
        ]);

       $relevantPublications = new RelevantPublications();
       $relevantPublications->userid = auth()->user()->id;
       $relevantPublications->description = $request->description;


        $relevantPublications->save();

        return redirect()->route('employment-experience.index')->with('Success', 'Publication details saved successfully.');


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
