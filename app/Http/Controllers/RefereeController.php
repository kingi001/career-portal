<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referee;
use Illuminate\Support\Facades\Auth;

class RefereeController extends Controller
{
    /**
     * Display the list of referees.
     */
    public function index()
    {
        $referees = Referee::where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        return view('referee.lists.list-referees', compact('referees'));
    }

    /**
     * Store a new referee.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        // Attach user_id automatically
        $validated['user_id'] = Auth::id();

        Referee::create($validated);

        return redirect()->route('referees.index')->with('success', 'Referee added successfully.');
    }

    /**
     * Fetch a referee for editing.
     */
    public function edit($id)
    {
        $referee = Referee::where('user_id', Auth::id())->findOrFail($id);

        return response()->json($referee);
    }

    /**
     * Update an existing referee.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $referee = Referee::where('user_id', Auth::id())->findOrFail($id);
        $referee->update($validated);

        return redirect()->route('referees.index')->with('success', 'Referee updated successfully.');
    }

    /**
     * Delete a referee.
     */
    public function destroy($id)
    {
        $referee = Referee::where('user_id', Auth::id())->findOrFail($id);
        $referee->delete();

        return redirect()->route('referees.index')->with('success', 'Referee deleted successfully.');
    }
}

