<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $vacancies = Vacancy::withCount('applications')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('admin.vacancies.lists.index', compact('vacancies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'refno' => 'required|string|unique:vacancies,refno',
            'position' => 'required|string|max:255',
            'job_grade' => 'required|in:BMA1,BMA2,BMA3,BMA4,BMA5,BMA6,BMA7,BMA8,BMA9,BMA10,BMA11,BMA12',
            'requirements' => 'required|string',
            'duties' => 'required|string',
            'application_deadline' => 'required|date|after:today',
            'status' => 'required|in:open,closed',
        ]);

        // Create a new vacancy
        Vacancy::create([
            'user_id' => Auth::id(),
            'refno' => $request->refno,
            'position' => $request->position,
            'job_grade' => $request->job_grade,
            'requirements' => $request->requirements,
            'duties' => $request->duties,
            'application_deadline' => $request->application_deadline,
            'status' => $request->status,
        ]);
        // Log the creation of the vacancy
        Log::info('Vacancy created by user ID: ' . Auth::id(), [
            'refno' => $request->refno,
            'position' => $request->position,
            'job_grade' => $request->job_grade,
            'application_deadline' => $request->application_deadline,
        ]);
        // // Optional: send notification to admin or relevant parties
        //   Notification::send($admin, new VacancyCreatedNotification($vacancy));
        // // Redirect back with success message

        return redirect()->back()->with('success', 'Vacancy created successfully.');
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
        $vacancy = Vacancy::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($vacancy);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'refno' => 'required|string|unique:vacancies,refno,' . $id,
            'position' => 'required|string|max:255',
            'job_grade' => 'required|in:BMA1,BMA2,BMA3,BMA4,BMA5,BMA6,BMA7,BMA8,BMA9,BMA10,BMA11,BMA12',
            'requirements' => 'required|string',
            'duties' => 'required|string',
            'application_deadline' => 'required|date|after:today',
            'status' => 'required|in:open,closed',
        ]);

        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->all());

        return redirect()->back()->with('success', 'Vacancy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        // Optional: authorize ownership
        if ($vacancy->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this vacancy.');
        }

        $vacancy->delete();

        return redirect()->route('vacancies.index')->with('success', 'Vacancy deleted successfully.');
    }
}
