<?php

namespace App\Http\Controllers;
use App\Models\UserInformation;
use App\Models\Education;
use App\Models\ProfessionalQualification;
use App\Models\Membership;
use App\Models\Referee;
use App\Models\EmploymentHistory;
use Barryvdh\DomPDF\Facade\Pdf; // Ensure you have this line to use the PDF facade
use Illuminate\Support\Facades\Auth;

class CvGeneratorController extends Controller
{
    public function generate()
    {
        // ✅ Get currently logged-in user ID
        $userId = Auth::id();

        // ✅ Fetch related data
        $personal = UserInformation::where('user_id', $userId)->first();
        $education = Education::where('user_id', $userId)->get();
        $qualifications = ProfessionalQualification::where('user_id', $userId)->get();
        $memberships = Membership::where('user_id', $userId)->get();
        $experiences = EmploymentHistory::where('user_id', $userId)->get();
        $referees = Referee::where('user_id', $userId)->get();

        // ✅ Load Blade view and generate PDF
        $pdf = PDF::loadView('pdfs.cv', compact(
            'personal',
            'education',
            'qualifications',
            'memberships',
            'referees',
            'experiences'
        ));

        // ✅ Return PDF download
        // return $pdf->download(Auth::user()->name . '.cv.pdf');


        return $pdf->stream(Auth::user()->name . '_CV.pdf'); // opens in new tab
    }
}
