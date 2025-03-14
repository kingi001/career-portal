<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    /**
     * Display the list of memberships.
     */
    public function index()
    {
        $memberships = Membership::where('user_id', Auth::id())
            ->orderBy('date_renewed', 'desc')->get();

        return view('education.professional-bodies.lists.list-professional-bodies', compact('memberships'));
    }

    /**
     * Store a new membership.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'professional_body' => 'required|string|max:255',
            'membership_no' => 'required|string|max:255|unique:memberships',
            'date_renewed' => 'required|date',
            'next_renewal_date' => 'required|date|after_or_equal:date_renewed',
        ]);

        // Attach user_id automatically
        $validated['user_id'] = Auth::id();

        Membership::create($validated);

        return redirect()->route('memberships.index')->with('success', 'Membership added successfully.');
    }

    /**
     * Fetch a membership for editing.
     */
    public function edit($id)
    {
        $membership = Membership::where('user_id', Auth::id())->findOrFail($id);

        return response()->json($membership);
    }

    /**
     * Update an existing membership.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'professional_body' => 'required|string|max:255',
            'membership_no' => 'required|string|max:255|unique:memberships,membership_no,' . $id,
            'date_renewed' => 'required|date',
            'next_renewal_date' => 'required|date|after_or_equal:date_renewed',
        ]);

        $membership = Membership::where('user_id', Auth::id())->findOrFail($id);
        $membership->update($validated);

        return redirect()->route('memberships.index')->with('success', 'Membership updated successfully.');
    }

    /**
     * Delete a membership.
     */
    public function destroy($id)
    {
        $membership = Membership::where('user_id', Auth::id())->findOrFail($id);
        $membership->delete();

        return redirect()->route('memberships.index')->with('success', 'Membership deleted successfully.');
    }
}
