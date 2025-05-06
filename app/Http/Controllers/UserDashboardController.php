<?php

namespace App\Http\Controllers;

use App\Models\Application;

use App\Models\Vacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::where('user_id', Auth::id())->latest()->paginate(10);
        $totalApplications = Application::where('user_id', Auth::id())->count();
        $pendingApplications = Application::where('status', 'pending')->count();
        $shortlistedCount = Application::where('status', 'shortlisted')->count();
        $rejectedCount = Application::where('user_id', Auth::id())
            ->where('status', 'rejected')
            ->count();

        $openVacanciesCount = Vacancy::where('user_id', Auth::id())
            ->where('application_deadline', '>', Carbon::now())
            ->count();
        $latestApplication = Application::where('user_id', Auth::id())
            ->latest()
            ->with('vacancy') // optional, if you need vacancy details
            ->first();

        $applicationStatus = $latestApplication?->status ?? 'No Application Found';

        $vacancies = Vacancy::where('user_id', Auth::id())->latest()->paginate(10);
        $applications = Application::with('vacancy')->where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact(
            'vacancies',
            'totalApplications',
            'pendingApplications',
            'applications',
            'shortlistedCount',
            'openVacanciesCount',
            'applicationStatus',
            'rejectedCount',
        ));
    }
}
