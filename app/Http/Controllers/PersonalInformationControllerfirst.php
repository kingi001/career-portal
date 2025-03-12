<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInformation;
use App\Models\Country;
use App\Models\County;
use App\Models\Constituency;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;

class PersonalInformationControllerfirst extends Controller
{
    /**
     * Display the user's personal information.
     */
    // public function show()
    // {
    //     $user = Auth::user();
    //     $personalInformation = PersonalInformation::where('user_id', $user->id)->first();
    //     // Fetch necessary data for dropdowns
    //     // $countries = Country::all();
    //     // $counties = County::all();
    //     // $constituencies = Constituency::all();
    //     // $wards = Ward::all();

    //     return view('personal-info.personal-info', compact('personalInformation'));
    // }

    /**
     * Store or update personal information.
     */
    public function storeOrUpdate(Request $request)
    {
        $validatedData = $request->validate([
            // Section 1: Basic Information
            'salutation'        => 'nullable|string',
            'full_names'        => 'required|string|max:255',
            'id_number'         => 'required|integer|unique:personal_information,id_number,' . Auth::id() . ',user_id',
            'country_id'        => 'required|exists:countries,id',
            'county_id'         => 'required|exists:counties,id',
            'constituency_id'   => 'required|exists:constituencies,id',
            'ward_id'           => 'required|exists:wards,id',
            'date_of_birth'     => 'required|date',
            'gender'            => 'required|in:male,female,other',
            'kra_pin'           => 'nullable|string|unique:personal_information,kra_pin,' . Auth::id() . ',user_id',
            'postal_code'       => 'nullable|string|max:10',
            'email'             => 'required|email|unique:personal_information,email,' . Auth::id() . ',user_id',
            'mobile_number'     => 'required|integer|unique:personal_information,mobile_number,' . Auth::id() . ',user_id',
            'is_pwd'            => 'boolean',
            'pwd_type'          => 'nullable|string|required_if:is_pwd,true',
            'ncpwd_number'      => 'nullable|string|required_if:is_pwd,true',

            // Section 2: Current Employment Details
            'bma_applicant'     => 'nullable|in:yes,no',
            'department'        => 'nullable|string|required_if:bma_applicant,yes',
            'designation'       => 'nullable|string|required_if:bma_applicant,yes',
            'terms_of_service'  => 'nullable|in:permanent,contract,internship,casual|required_if:bma_applicant,yes',
            'job_scale'         => 'nullable|string|required_if:bma_applicant,yes',
            'date_of_appointment' => 'nullable|date|required_if:bma_applicant,yes',

            // Section 3: Other Personal Details
            'criminal_offense'  => 'nullable|in:yes,no',
            'criminal_details'  => 'nullable|string|required_if:criminal_offense,yes',
        ]);

        $user = Auth::user();

        $personalInfo = PersonalInformation::updateOrCreate(
            ['user_id' => $user->id], // Ensure each user has only one record
            $validatedData
        );

        return redirect()->back()->with('success', 'Personal information saved successfully!');
    }
 /**
 * Fetch counties based on the selected country.
  */
 public function getCounties($country_id)
 {
     $counties = County::where('country_id', $country_id)->get();
     return response()->json($counties);
 }

 /**
  * Fetch constituencies based on the selected county.
  */
 public function getConstituencies($county_id)
 {
     $constituencies = Constituency::where('county_id', $county_id)->get();
     return response()->json($constituencies);
 }

 /**
  * Fetch wards based on the selected constituency.
  */
 public function getWards($constituency_id)
 {
     $wards = Ward::where('constituency_id', $constituency_id)->get();
     return response()->json($wards);
 }


}

