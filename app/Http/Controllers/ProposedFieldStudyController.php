<?php

namespace App\Http\Controllers;

use App\Models\ProposedFieldStudy;
use Illuminate\Http\Request;

class ProposedFieldStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('academics.proposedFieldStudy');
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
            'description' => 'required|string',
        ]);

       $proposedFieldStudy = new ProposedFieldStudy();
       $proposedFieldStudy->userid = auth()->user()->id;
       $proposedFieldStudy->description = $request->description;

        $proposedFieldStudy->save();

        return redirect()->next()->with('Success', 'Proposed Field of Study has been saved successfully.');


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
