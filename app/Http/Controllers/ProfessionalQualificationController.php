<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessionalQualification;
use Illuminate\Support\Facades\Auth;

class ProfessionalQualificationController extends Controller
{

    /**
     * Display the list of professional qualifications.
     */
    public function index()
    {
        $qualifications = ProfessionalQualification::where('user_id', Auth::id())->get();


        return view('education.professional-qualifications.lists.list-professional-qualification', compact('qualifications'));
    }

    /**
     * Store a new professional qualification.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'certification' => 'required|string|max:255',
            'award' => 'nullable|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Attach user_id automatically
        $validated['user_id'] = Auth::id();

        ProfessionalQualification::create($validated);

        return redirect()->route('qualifications.index')->with('success', 'Professional qualification added successfully.');
    }

    /**
     * Fetch a professional qualification for editing.
     */
    public function edit($id)
    {
        $qualification = ProfessionalQualification::where('user_id', Auth::id())->findOrFail($id);

        return response()->json($qualification);
    }

    /**
     * Update an existing professional qualification.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'certification' => 'required|string|max:255',
            'award' => 'nullable|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $qualification = ProfessionalQualification::where('user_id', Auth::id())->findOrFail($id);
        $qualification->update($validated);

        return redirect()->route('qualifications.index')->with('success', 'Professional qualification updated successfully.');
    }

    /**
     * Delete a professional qualification.
     */
    public function destroy($id)
    {
        $qualification = ProfessionalQualification::where('user_id', Auth::id())->findOrFail($id);
        $qualification->delete();

        return redirect()->route('qualifications.index')->with('success', 'Professional qualification deleted successfully.');
    }
}
