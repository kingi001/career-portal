<?php

namespace App\Http\Controllers;

use App\Models\UserInformation;
use App\Models\County;
use App\Models\SubCounty;
use App\Models\Ward;
use App\Models\Ethnicity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInformationController extends Controller
{
    /**
     * Show the form for creating or editing personal information.
     */
    public function create()
    {
        $user = Auth::user();
        $personalInformation = UserInformation::firstOrNew(['user_id' => $user->id]);
        $counties = County::all();
        $subcounties = SubCounty::all();
        $wards = Ward::all();
        $ethnicities = Ethnicity::all();
        $salutations = ['Mr.', 'Mrs.', 'Miss', 'Dr.', 'Prof.', 'Eng.', 'Hon.', 'Rev.'];


        return view('personal-info.personal-info', compact(
            'user', 'personalInformation', 'counties', 'subcounties', 'wards', 'ethnicities','salutations'
        ));
    }

    /**
     * Store or update the user's personal information.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();

        $validatedData = $request->validate([
            'salutation'        => 'nullable|string|max:10',
            'surname'           => 'required|string|max:100',
            'other_names'       => 'required|string|max:150',
            'national_id_number' => "required|string|max:20|unique:user_information,national_id_number,{$userId},user_id",
            'ethnicity_id'      => 'required|exists:ethnicities,id',
            'county_id'         => 'required|exists:counties,id',
            'sub_county_id'     => 'required|exists:sub_counties,id',
            'ward_id'           => 'required|exists:wards,id',
            'date_of_birth'     => 'required|date|before:today',
            'gender'            => 'required|in:Male,Female,Other',
            'mobile_number'     => "required|string|max:12|unique:user_information,mobile_number,{$userId},user_id",
            'postal_code'       => 'nullable|string|max:10',
            'is_pwd'            => 'nullable|boolean',
            'pwd_type'          => 'nullable|string|max:255|required_if:is_pwd,1',
            'ncpwd_number'      => "nullable|string|max:255|unique:user_information,ncpwd_number,{$userId},user_id",
            'bma_applicant'     => 'nullable|in:yes,no',
            'department'        => 'nullable|string|max:255',
            'designation'       => 'nullable|string|max:255',
            'terms_of_service'  => 'nullable|in:permanent,contract,internship,casual',
            'job_scale'         => 'nullable|string|max:255',
            'date_of_appointment' => 'nullable|date',
            'criminal_offense'  => 'nullable|in:yes,no',
            'criminal_details'  => 'nullable|string|required_if:criminal_offense,yes',
        ]);

        UserInformation::updateOrCreate(['user_id' => $userId], $validatedData);

        return redirect()->route('personal-info.show')->with('success', 'Personal information updated successfully.');
    }

    /**
     * Display the user's personal information.
     */
    public function show()
    {
        $user = Auth::user();
        $personalInfo = UserInformation::where('user_id', $user->id)->first();

        if (!$personalInfo) {
            return redirect()->route('personal-info.show')->with('warning', 'Please complete your personal information.');
        }

        return view('personal-info.personal-info', compact('user', 'personalInfo'));
    }

     // Get all counties
     public function getCounties()
    {
        return response()->json(County::all());
    }

    public function getSubcounties($countyId)
    {
        return response()->json(Subcounty::where('county_id', $countyId)->get());
    }

    public function getWards($subCountyId)
    {
        return response()->json(Ward::where('sub_county_id', $subCountyId)->get());
    }
}
