<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    /**
     * Display the list of education records.
     */
    public function index()
    {
        $educations = Education::where('user_id', Auth::id())->orderBy('start_date', 'desc')->get();
        return view('education.list-education', compact('educations'));
    }

    /**
     * Store a new education qualification.
     */
    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'level_of_study' => 'required|string',
            'field_of_study' => 'required|string|max:255',
            'award' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Education::create([
            'user_id' => Auth::id(),
            'institution' => $request->institution,
            'level_of_study' => $request->level_of_study,
            'field_of_study' => $request->field_of_study,
            'award' => $request->award,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->back()->with('success', 'Education added successfully.');
    }

    /**
     * Fetch an education record for editing.
     */
    public function edit($id)
    {
        $education = Education::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($education);
    }
    /**
     * Update an existing education qualification.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'level_of_study' => 'required|string',
            'field_of_study' => 'required|string|max:255',
            'award' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $education = Education::where('user_id', Auth::id())->findOrFail($id);
        $education->update([
            'institution' => $request->institution,
            'level_of_study' => $request->level_of_study,
            'field_of_study' => $request->field_of_study,
            'award' => $request->award,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->back()->with('success', 'Education updated successfully.');
    }

    /**
     * Delete an education qualification.
     */
    public function destroy($id)
    {
        $education = Education::where('user_id', Auth::id())->findOrFail($id);
        $education->delete();

        return redirect()->back()->with('success', 'Education deleted successfully.');
    }
}
