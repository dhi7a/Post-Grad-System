<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('academics.subjects');
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
            'subject' => 'required|string',
            'grade' => 'required|string',
            'exam_board' => 'required|string',
            'date' => 'required',
            'level' => 'required|string',
        ]);

       $subjects = new Subjects();
       $subjects->userid = auth()->user()->id;
       $subjects->subject = $request->subject;
       $subjects->grade = $request->grade;
       $subjects->exam_board = $request->exam_board;
       $subjects->date = $request->date;
       $subjects->level = $request->level;

        $subjects->save();

        return redirect()->route('diploma.index')->with('Success', 'Subjects details saved successfully.');


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
