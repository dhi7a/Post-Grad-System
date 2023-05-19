<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PersonalDetails;
use Illuminate\Http\Request;

class PersonalDetailsController extends Controller
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

        //
        public function store(Request $request)
        {
            $userId = auth()->user()->id;

            $validatedData = $request->validate([
                'userid' => 'required|integer',
                'programme' => 'required|string',
                // 'status' => 'required|in:full-time,part-time',
                'title' => 'required|string',
                'surname' => 'required|string',
                'forenames' => 'required|string',
                'marital_status' => 'required|string',
                'nationality' => 'required|string',
                'national_id' => 'required|string',
                'permanent_residence' => 'required|string',
                'passport_no' => 'required|string',
                'date_of_birth' => 'required|date',
                'place_of_birth' => 'required|string',
                'disabilities' => 'nullable|string',
                'contact_address' => 'required|string',
                'home_phone' => 'nullable|string',
                'contact_number' => 'required|string',
                'email' => 'required|email',
                'fax' => 'nullable|string',
                'prospective_sponsors' => 'nullable|string',
                'msu_staff_dependant' => 'required',
                'msu_staff_member' => 'required',
            ]);

            $msu_staff_dependant = false;
            $msu_staff_member = false;

            if($request->msu_staff_dependant == "on")
            {
                $msu_staff_dependant = true;
            }

            if($request->msu_staff_member == "on")
            {
                $msu_staff_member = true;
            }

            // Create a new PersonalDetails instance with the validated data
            //$personalDetails = PersonalDetails::create($validatedData);
            $personalDetails = new PersonalDetails();
            $personalDetails->userid = auth()->user()->id;
            $personalDetails->programme = $request->programme;
            $personalDetails->title = $request->title;
            $personalDetails->surname = $request->surname;
            $personalDetails->forenames = $request->forenames;
            $personalDetails->marital_status = $request->marital_status;
            $personalDetails->nationality = $request->nationality;
            $personalDetails->national_id = $request->national_id;
            $personalDetails->permanent_residence = $request->permanent_residence;
            $personalDetails->passport_no = $request->passport_no;
            $personalDetails->date_of_birth = $request->date_of_birth;
            $personalDetails->place_of_birth = $request->place_of_birth;
            $personalDetails->disabilities = $request->disabilities;
            $personalDetails->contact_address = $request->contact_address;
            $personalDetails->home_phone = $request->home_phone;
            $personalDetails->contact_number = $request->contact_number;
            $personalDetails->email = $request->email;
            $personalDetails->fax = $request->fax;
            $personalDetails->prospective_sponsors = $request->prospective_sponsors;
            $personalDetails->msu_staff_dependant = $msu_staff_dependant;
            $personalDetails->msu_staff_member = $msu_staff_member;

            $personalDetails->save();

            // Perform any additional operations or redirect as needed

            return redirect()->back()->with('success', 'Personal details saved successfully.');
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
