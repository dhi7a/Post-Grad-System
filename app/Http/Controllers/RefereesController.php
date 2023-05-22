<?php

namespace App\Http\Controllers;

use App\Models\Referees;
use Illuminate\Http\Request;

class RefereesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('academics.referees');

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
            // 'userid' => 'required',
            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'occupation' => 'required',
        ]);

       $referees = new Referees();
       $referees->userid = auth()->user()->id;
       $referees->full_name = $request->full_name;
       $referees->address = $request->address;
       $referees->phone = $request->phone;
       $referees->email = $request->email;
       $referees->occupation = $request->occupation;

        $referees->save();

        return redirect()->route('apply')->with('Success', 'Referee details saved successfully.');


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
