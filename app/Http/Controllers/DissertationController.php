<?php

namespace App\Http\Controllers;

use App\Models\Dissertation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DissertationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $exist = Dissertation::where('userid', Auth::user()->id)->first();
        if(!is_null($exist))
        {
            return redirect()->route('referees.index');
        }
        return view('academics.dissertation');
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
            //'userid' => 'required|integer',
            'description' => 'required|string',
        ]);

       $dissertation = new Dissertation();
       $dissertation->userid = auth()->user()->id;
       $dissertation->description = $request->description;


        $dissertation->save();

        return redirect()->route('referees.index')->with('Success', 'Dissertation details saved successfully.');


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
