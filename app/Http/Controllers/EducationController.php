<?php

namespace App\Http\Controllers;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {   
        $educations = Auth::user()->educations;
        return view('education.list-education',compact('educations'));    
    }

    public function create()
    {
        return view('education.modals.add-education');
    }
    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'level_of_study' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'award' => 'required|string|max:255',
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

        return redirect()->route('education.list-education')->toast('success', 'Education added successfully.');
    }

    public function edit(Education $education)
    {
        return view('education.modals.edit-education', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'level_of_study' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'award' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $education->update($request->all());

        return redirect()->route('education.list-education')->toast('success', 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('education.list-education')->toast('success', 'Education deleted successfully.');
    }
}
