<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmploymentHistory;
use Illuminate\Support\Facades\Auth;

class EmploymentHistoryController extends Controller
{
    /**
     * Display the list of employment records.
     */
    public function index()
    {
        $employments = EmploymentHistory::where('user_id', Auth::id())
            ->orderBy('start_date', 'desc')->get();

        return view('employment.lists.list-employment', compact('employments'));
    }

    /**
     * Store a new employment record.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'responsibilities' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Attach user_id automatically
        $validated['user_id'] = Auth::id();

        EmploymentHistory::create($validated);

        return redirect()->route('employment.index')->with('success', 'Employment record added successfully.');
    }

    /**
     * Fetch an employment record for editing.
     */
    public function edit($id)
    {
        $employment = EmploymentHistory::where('user_id', Auth::id())->findOrFail($id);

        return response()->json($employment);
    }

    /**
     * Update an existing employment record.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'responsibilities' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $employment = EmploymentHistory::where('user_id', Auth::id())->findOrFail($id);
        $employment->update($validated);

        return redirect()->route('employment.index')->with('success', 'Employment record updated successfully.');
    }

    /**
     * Delete an employment record.
     */
    public function destroy($id)
    {
        $employment = EmploymentHistory::where('user_id', Auth::id())->findOrFail($id);
        $employment->delete();

        return redirect()->route('employment.index')->with('success', 'Employment record deleted successfully.');
    }
}
