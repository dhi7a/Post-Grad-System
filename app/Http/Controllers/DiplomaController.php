<?php

namespace App\Http\Controllers;

use App\Models\Diploma;

use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'institution' => 'nullable|string',
        ]);

       $diploma = new Diploma();
       $diploma->userid = auth()->user()->id;
       $diploma->programme = $request->programme;
       $diploma->result = $request->result;
       $diploma->level = $request->level;
       $diploma->date = $request->date;
       $diploma->institution = $request->institution;

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
}
