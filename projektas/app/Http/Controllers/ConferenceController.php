<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use Illuminate\Support\Facades\View;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferences = Conference::all();
        return view('conference', ['conferences' => $conferences]);
    }


    /**Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-conference');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation...

        // Create the conference...

        // Redirect back to the conference index page
        return redirect()->route('conferences.index')->with('success', 'Conference created successfully!');
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
    public function edit($id)
    {
        $conference = Conference::findOrFail($id);
        return view('create-conference', compact('conference'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation...

        // Find the conference...
        $conference = Conference::findOrFail($id);

        // Update the conference...
        $conference->update($request->all());

        // Redirect back to the conference index page
        return redirect()->route('conferences.index')->with('success', 'Conference updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        // Find the conference
        $conference = Conference::findOrFail($id);

        // Delete the conference
        $conference->delete();

        // Redirect back to the conference index page
        return redirect()->route('conferences.index')->with('success', 'Conference deleted successfully!');
    }
}
