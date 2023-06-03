<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumbers;
use Illuminate\Http\Request;

class PhoneNumbersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'userid' => 'integer',
            'phone_number' => 'required|string',
            'is_verified' => 'required|string',
        ]);

       $phoneNumbers = new PhoneNumbers();
       $phoneNumbers->userid = auth()->user()->id;
       $phoneNumbers->phone_number = $request->phone_number;
       $phoneNumbers->is_verified = $request->is_verified;


        $phoneNumbers->save();

        return redirect()->route('student.index')->with('Success', 'Your Phone Number is verified');

    }

    /**
     * Display the specified resource.
     */
    public function show(PhoneNumbers $phoneNumbers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhoneNumbers $phoneNumbers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhoneNumbers $phoneNumbers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhoneNumbers $phoneNumbers)
    {
        //
    }
}
