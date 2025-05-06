<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        // Fetch all applications for the authenticated user

    }
    public function store(Request $request, $vacancyId)
    {


        $vacancy = Vacancy::findOrFail($vacancyId);

        // Optional: check if already applied
        if ($vacancy->applications()->where('user_id', Auth::id())->exists()) {
            return back()->with('error', 'You have already applied for this vacancy.');
        }

        Application::create([
            'user_id' => Auth::id(),
            'vacancy_id' => $vacancy->id,
            'status' => 'pending',

        ]);
        return back()->with('success', 'Application submitted successfully.');
    }
}
