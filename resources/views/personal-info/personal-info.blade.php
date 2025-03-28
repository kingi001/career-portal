<x-app-layout>
    <div class="py-3 container max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="p-3 bg-white border-b border-gray-100 rounded-lg">
            <h2 class="text-base font-medium underline text-indigo-700">
                <i class="fas fa-user text-blue-500 text-lg"></i>
                {{ __('Section 1 :') }}
                {{ __('Personal Information') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                {{ __('Please provide your personal information with accuracy.') }}
            </p>
            <form method="POST" action="{{ route('personal-info.store', $personalInformation->id ?? '') }}"
                class="rounded-lg">
                @csrf
                @method('POST')

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 py-4">
                    <!-- Salutation -->
                    <div>
                        <x-input-label for="salutation" :value="__('Salutation')"
                            class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-handshake"></i>
                            </span>
                            <select id="salutation" name="salutation"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2">
                                <option value="">Select Salutation</option>
                                @foreach ($salutations as $salutation)
                                    <option value="{{ $salutation }}"
                                        {{ old('salutation', $personalInformation->salutation ?? '') == $salutation ? 'selected' : '' }}>
                                        {{ $salutation }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('salutation')" />
                    </div>
                    <!-- Surname -->
                    <div>
                        <x-input-label for="surname" :value="__('Surname')"
                            class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fa-solid fa-id-card"></i>
                            </span>
                            <x-text-input id="surname" name="surname" type="text"
                                class="w-full border-gray-300 uppercase focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2"
                                value="{{ old('surname', $personalInformation->surname ?? '') }}" required
                                placeholder="Enter your Surname" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('surname')" />
                    </div>
                    <!-- Other Names -->
                    <div>
                        <x-input-label for="other_names" :value="__('Other Names')"
                            class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-user"></i>
                            </span>
                            <x-text-input id="other_names" name="other_names" type="text"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2"
                                value="{{ old('other_names', $personalInformation->other_names ?? '') }}" required
                                placeholder="Enter your Other Names" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('other_names')" />
                    </div>
                    <!-- National ID Number -->
                    <div>
                        <x-input-label for="national_id_number" :value="__('National ID Number')"
                            class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-id-card"></i>
                            </span>
                            <x-text-input id="national_id_number" name="national_id_number" type="text"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2"
                                value="{{ old('national_id_number', $personalInformation->national_id_number ?? '') }}"
                                required placeholder="Enter your ID Number" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('national_id_number')" />
                    </div>

                </div>
                <!----------------------------------------------------------Second Row------------------------------------------------------------------------------------>
                <div x-data="locationData()" x-init="fetchCounties()">
                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 py-4">
                        <!-- Ethnicity -->
                        <div>
                            <x-input-label for="ethnicity_id" :value="__('Ethnicity')"
                                class="px-2 text-sm font-medium text-gray-700" />
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                    <i class="fa-solid fa-users"></i>
                                </span>
                                <select id="ethnicity_id" name="ethnicity_id"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2">
                                    <option value="" enabled>Select Ethnicity</option>
                                    @foreach ($ethnicities as $ethnicity)
                                        <option value="{{ $ethnicity->id }}"
                                            {{ old('ethnicity_id', $personalInformation->ethnicity_id ?? '') == $ethnicity->id ? 'selected' : '' }}>
                                            {{ $ethnicity->ethnicity_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('ethnicity_id')" />
                        </div>
                        <!-- County -->
                        <div>
                            <x-input-label for="county_id" :value="__('County')"
                                class="px-2 text-sm font-medium text-gray-700" />
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                    <i class="fas fa-landmark"></i>
                                </span>
                                <select id="county_id" name="county_id" x-model="selectedCounty"
                                    @change="fetchSubcounties()"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2">
                                    <option value="" disabled>Select County</option>
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->id }}"
                                            {{ old('county_id', $personalInformation->county_id ?? '') == $county->id ? 'selected' : '' }}>
                                            {{ $county->county_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('county_id')" />
                        </div>
                        <!-- SubCounty -->
                        <div>
                            <x-input-label for="sub_county_id" :value="__('SubCounty')"
                                class="px-2 text-sm font-medium text-gray-700" />
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                    <i class="fas fa-city"></i>
                                </span>
                                <select id="sub_county_id" name="sub_county_id" x-model="selectedSubcounty"
                                    @change="fetchWards()"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2">
                                    <option value="" disabled>Select SubCounty</option>
                                    <template x-for="subcounty in subcounties" :key="subcounty.id">
                                        <option :value="subcounty.id" x-text="subcounty.subcounty_name"
                                            :selected="subcounty.id ==
                                                '{{ old('sub_county_id', $personalInformation->sub_county_id ?? '') }}'">
                                        </option>
                                    </template>
                                </select>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('sub_county_id')" />
                        </div>
                        <!-- Ward -->
                        <div>
                            <x-input-label for="ward_id" :value="__('Ward')"
                                class="px-2 text-sm font-medium text-gray-700" />
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <select id="ward_id" name="ward_id" x-model="selectedWard"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2">
                                    <option value="" disabled>Select Ward</option>
                                    <template x-for="ward in wards" :key="ward.id">
                                        <option :value="ward.id" x-text="ward.ward_name"
                                            :selected="ward.id == '{{ old('ward_id', $personalInformation->ward_id ?? '') }}'">
                                        </option>
                                    </template>
                                </select>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('ward_id')" />
                        </div>


                    </div>
                </div>
                <!---------------------------------------------------------------------third row-------------------------------------------------------------------->
                <div class="grid grid-cols-1 sm:grid-cols-5 gap-2 pt-1">
                    <!-- Date of Birth -->
                    <div>
                        <x-input-label for="date_of_birth" :value="__('Date of Birth')"
                            class="px-1 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <x-text-input id="date_of_birth" name="date_of_birth" type="date"
                                class="mt-1 block w-full text-sm pl-10 py-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('date_of_birth', $personalInformation->date_of_birth ?? '')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
                    </div>
                    <!-- Gender -->
                    <div>
                        <x-input-label for="gender" :value="__('Gender')"
                            class="px-1 text-sm font-medium text-gray-700" />
                        <div class="flex items-center space-x-6 mt-1">
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Male"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500"
                                    {{ old('gender', $personalInformation->gender ?? '') == 'Male' ? 'checked' : '' }}
                                    required>
                                <span class="ml-1">Male</span>
                            </label>

                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Female"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500"
                                    {{ old('gender', $personalInformation->gender ?? '') == 'Female' ? 'checked' : '' }}
                                    required>
                                <span class="ml-1">Female</span>
                            </label>

                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Other"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500"
                                    {{ old('gender', $personalInformation->gender ?? '') == 'Other' ? 'checked' : '' }}
                                    required>
                                <span class="ml-1">Other</span>
                            </label>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                    </div>

                    <!---religion---->
                    <div>
                        <x-input-label for="religion" :value="__('Religion')"
                            class="px-1 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-handshake"></i>
                            </span>
                            <select id="religion" name="religion"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm mt-1 text-sm pl-10 py-2">
                                <option value="">Select Religion</option>
                                @foreach ($religions as $religion)
                                    <option value="{{ $religion }}"
                                        {{ old('religion', $personalInformation->religion ?? '') == $religion ? 'selected' : '' }}>
                                        {{ $religion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('religion')" />
                    </div>
                    <!-- Mobile Number -->
                    <div>
                        <x-input-label for="mobile_number" :value="__('Mobile Number')"
                            class="px-1 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-phone"></i>
                            </span>
                            <x-text-input id="mobile_number" name="mobile_number" type="tel"
                                pattern="^(?:\+254|0)[17]\d{8}$"
                                class="mt-1 block w-full text-sm pl-10 py-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('mobile_number', $personalInformation->mobile_number ?? '')" required placeholder="e.g., 0712345678 or +254712345678" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('mobile_number')" />
                    </div>
                    <!-- Postal Code -->
                    <div>
                        <x-input-label for="postal_code" :value="__('Postal Code')"
                            class="px-1 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-mail-bulk"></i>
                            </span>
                            <x-text-input id="postal_code" name="postal_code" type="text" pattern="\d{5}"
                                class="mt-1 block w-full text-sm pl-10 py-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('postal_code', $personalInformation->postal_code ?? '')" required placeholder="e.g., 80100" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                    </div>
                </div>
                <!---------------------------------------------------------------------5th Row----------------------------------------------------------------------->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 items-center pt-4" x-data="{ hasDisability: '{{ old('is_pwd', $personalInformation->is_pwd ?? 0) }}' }"
                    x-init="hasDisability = '{{ old('is_pwd', $personalInformation->is_pwd ?? 0) }}'">

                    <!-- Disability Status (Radio Buttons) -->
                    <div class="flex items-center space-x-4">
                        <x-input-label for="is_pwd" :value="__('Person with Disability')" />

                        <label class="flex items-center">
                            <input type="radio" name="is_pwd" value="1"
                                class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="hasDisability"
                                required>
                            <span class="ml-2">Yes</span>
                        </label>

                        <label class="flex items-center">
                            <input type="radio" name="is_pwd" value="0"
                                class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="hasDisability"
                                required>
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                    <!-- Disability Type Dropdown (Visible if Yes is selected) -->
                    <div x-show="hasDisability == 1" x-transition x-cloak class="w-full">
                        <x-input-label for="pwd_type" :value="__('Disability Type')" />
                        <select name="pwd_type" id="pwd_type"
                            class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                            x-bind:required="hasDisability == 1">
                            <option value="">Select Disability Type</option>
                            <option value="visual"
                                {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'visual' ? 'selected' : '' }}>
                                Visual Impairment</option>
                            <option value="hearing"
                                {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'hearing' ? 'selected' : '' }}>
                                Hearing Impairment</option>
                            <option value="physical"
                                {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'physical' ? 'selected' : '' }}>
                                Physical Disability</option>
                            <option value="mental"
                                {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'mental' ? 'selected' : '' }}>
                                Mental Disability</option>
                            <option value="other"
                                {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'other' ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>
                    <!-- Registration No (Visible if Yes is selected) -->
                    <div x-show="hasDisability == 1" x-transition x-cloak class="w-full">
                        <x-input-label for="ncpwd_number" :value="__('NCPWD No')"
                            class="text-gray-700 font-semibold flex items-center gap-2">
                            <i class="fas fa-id-card text-blue-500 text-sm"></i> {{ __('NCPWD No') }}
                        </x-input-label>

                        <div
                            class="flex items-center border border-gray-300 focus-within:border-indigo-500 focus-within:ring-indigo-500 rounded-lg shadow-sm px-3 py-2 transition duration-300">
                            <span class="text-gray-500"><i class="fas fa-address-card text-sm"></i></span>
                            <x-text-input id="ncpwd_number" name="ncpwd_number" type="text"
                                class="w-full  outline-none border-none focus:ring-0 px-2 py-1 text-sm"
                                :value="old('ncpwd_number', $personalInformation->ncpwd_number ?? '')" x-bind:required="hasDisability == 1"
                                placeholder="Enter your NCPWD No" />
                        </div>
                    </div>

                    <!-- Validation Errors -->
                    <x-input-error class="mt-2" :messages="$errors->get('is_pwd')" />
                    <x-input-error class="mt-2" :messages="$errors->get('pwd_type')" />
                    <x-input-error class="mt-2" :messages="$errors->get('ncpwd_number')" />
                </div>

                <!----------------------------------------------------------Section 2----------------------------------------------------------------------->

                <div class="p-5 bg-white border-b border-gray-100 rounded-lg">
                    <h2 class="text-base font-medium underline text-indigo-700 flex items-center">
                        <i class="fas fa-briefcase text-blue-500 text-lg mr-2"></i>
                        {{ __('Section 2: Internal Applicant') }}
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 items-center py-2" x-data="{ isApplicant: '{{ old('bma_applicant', $personalInformation->bma_applicant ?? 'no') }}' }"
                        x-init="isApplicant = '{{ old('bma_applicant', $personalInformation->bma_applicant ?? 'no') }}'">

                        <!-- Are you an applicant in BMA? -->
                        <div class="flex items-center space-x-4">
                            <x-input-label for="bma_applicant" :value="__('Are you an applicant in Bandari Maritime Academy?')" />

                            <label class="flex items-center">
                                <input type="radio" name="bma_applicant" value="yes"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="isApplicant"
                                    required>
                                <span class="ml-2">Yes</span>
                            </label>

                            <label class="flex items-center">
                                <input type="radio" name="bma_applicant" value="no"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="isApplicant"
                                    required>
                                <span class="ml-2">No</span>
                            </label>
                        </div>

                        <!-- Department Selection -->
                        <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                            <x-input-label for="department" :value="__('Department')" />
                            <select name="department" id="department"
                                class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                x-bind:required="isApplicant === 'yes'">
                                <option value="">Select Department</option>
                                <option value="ICT"
                                    {{ old('department', $personalInformation->department ?? '') == 'ICT' ? 'selected' : '' }}>
                                    ICT</option>
                                <option value="maritime_affairs"
                                    {{ old('department', $personalInformation->department ?? '') == 'maritime_affairs' ? 'selected' : '' }}>
                                    Maritime Affairs</option>
                                <option value="port_operations"
                                    {{ old('department', $personalInformation->department ?? '') == 'port_operations' ? 'selected' : '' }}>
                                    Port Operations</option>
                                <option value="finance"
                                    {{ old('department', $personalInformation->department ?? '') == 'finance' ? 'selected' : '' }}>
                                    Finance</option>
                                <option value="hr"
                                    {{ old('department', $personalInformation->department ?? '') == 'hr' ? 'selected' : '' }}>
                                    Human Resources</option>
                                <option value="other"
                                    {{ old('department', $personalInformation->department ?? '') == 'other' ? 'selected' : '' }}>
                                    Other</option>
                            </select>
                        </div>

                        <!-- Designation Input -->
                        <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                            <x-input-label for="designation" :value="__('Designation')" />
                            <x-text-input id="designation" name="designation" type="text"
                                class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                value="{{ old('designation', $personalInformation->designation ?? '') }}"
                                x-bind:required="isApplicant === 'yes'" placeholder="Enter your designation" />
                        </div>

                        <!-- Terms of Service -->
                        <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                            <x-input-label for="terms_of_service" :value="__('Terms of Service')" />
                            <select name="terms_of_service" id="terms_of_service"
                                class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                x-bind:required="isApplicant === 'yes'">
                                <option value="">Select Terms of Service</option>
                                <option value="permanent"
                                    {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'permanent' ? 'selected' : '' }}>
                                    Permanent</option>
                                <option value="contract"
                                    {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'contract' ? 'selected' : '' }}>
                                    Contract</option>
                                <option value="internship"
                                    {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'internship' ? 'selected' : '' }}>
                                    Internship</option>
                                <option value="casual"
                                    {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'casual' ? 'selected' : '' }}>
                                    Casual</option>
                            </select>
                        </div>

                        <!-- Job Scale Selection -->
                        <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                            <x-input-label for="job_scale" :value="__('Job Scale')" />
                            <select name="job_scale" id="job_scale"
                                class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                x-bind:required="isApplicant === 'yes'">
                                <option value="">Select Job Scale</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="bma{{ $i }}"
                                        {{ old('job_scale', $personalInformation->job_scale ?? '') == "bma$i" ? 'selected' : '' }}>
                                        BMA {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Date of Appointment -->
                        <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                            <x-input-label for="date_of_appointment" :value="__('Date of Appointment')" />
                            <x-text-input id="date_of_appointment" name="date_of_appointment" type="date"
                                class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                value="{{ old('date_of_appointment', $personalInformation->date_of_appointment ?? '') }}"
                                x-bind:required="isApplicant === 'yes'" />
                        </div>

                    </div>
                </div>


                <!-----------------------------------------------------------Section 3----------------------------------------------------------------------->
                <div class="p-5 bg-white border-b border-gray-100 rounded-lg">
                    <h2 class="text-base font-medium underline text-indigo-700 flex items-center space-x-2">
                        <i class="fas fa-id-badge text-blue-500 text-xl"></i>
                        <span>{{ __('Section 3: Other Personal Details') }}</span>
                    </h2>

                    @php
                        $criminalOffense = old('criminal_offense', $personalInformation->criminal_offense ?? 'no');
                        $criminalDetails = old('criminal_details', $personalInformation->criminal_details ?? '');
                    @endphp

                    <div class="grid grid-cols-1 text-sm sm:grid-cols-3 gap-2 py-4" x-data="{ criminal_offense: '{{ $criminalOffense }}' }">

                        <!-- Criminal Offense Question -->
                        <div class="col-span-3 flex items-center space-x-4">
                            <i class="fas fa-gavel text-red-500 text-lg"></i>
                            <x-input-label for="criminal_offense" :value="__(
                                'Have you ever been convicted of any criminal offence or been subject to a probation order?',
                            )" />
                        </div>

                        <!-- Yes Option -->
                        <div class="flex items-center space-x-2">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="criminal_offense" value="yes"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500"
                                    x-model="criminal_offense" {{ $criminalOffense == 'yes' ? 'checked' : '' }}
                                    required>
                                <span>Yes</span>
                            </label>
                        </div>

                        <!-- No Option -->
                        <div class="flex items-center space-x-2">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="criminal_offense" value="no"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500"
                                    x-model="criminal_offense" {{ $criminalOffense == 'no' ? 'checked' : '' }}
                                    required>
                                <span>No</span>
                            </label>
                        </div>

                        <!-- Criminal Details (Only Show if 'Yes' is Selected) -->
                        <div x-show="criminal_offense === 'yes'" x-cloak class="w-full col-span-3">
                            <x-input-label for="criminal_details" :value="__(
                                'If Yes, state the nature of the offense, the year, and duration of conviction',
                            )" />
                            <textarea id="criminal_details" name="criminal_details"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm h-24 p-2"
                                x-bind:required="criminal_offense === 'yes'">{{ $criminalDetails }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('criminal_details')" />
                        </div>

                    </div>
                </div>
                <div class="mt-3 flex items-center text-sm gap-2 justify-end">
                    <button type="submit"
                        class="flex items-center gap-2 px-12 py-1 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 focus:ring-4 focus:ring-blue-300">
                        <i class="fas fa-save"></i> {{ isset($personalInformation) ? __('Update') : __('Save') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
    <script>
        function locationData() {
            return {
                // Retain previous values from old input or existing personal information
                selectedCounty: @json(old('county_id', $personalInformation->county_id ?? '')),
                selectedSubcounty: @json(old('sub_county_id', $personalInformation->sub_county_id ?? '')),
                selectedWard: @json(old('ward_id', $personalInformation->ward_id ?? '')),
                counties: [],
                subcounties: [],
                wards: [],

                init() {
                    this.fetchCounties();
                    if (this.selectedCounty) {
                        this.fetchSubcounties(this.selectedCounty, true);
                    }
                    if (this.selectedSubcounty) {
                        this.fetchWards(this.selectedSubcounty, true);
                    }
                },

                fetchCounties() {
                    fetch('/get-counties')
                        .then(response => response.json())
                        .then(data => {
                            console.log("Counties fetched:", data); // Debugging
                            this.counties = data;
                        })
                        .catch(error => console.error('Error fetching counties:', error));
                },

                fetchSubcounties(countyId = this.selectedCounty, isRetaining = false) {
                    if (!countyId) return;
                    fetch(`/get-subcounties/${countyId}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log("Subcounties fetched:", data); // Debugging
                            this.subcounties = data;

                            if (!isRetaining) {
                                this.selectedSubcounty = '';
                                this.wards = [];
                            } else if (this.selectedSubcounty) {
                                // Ensure selected subcounty exists in the fetched list
                                const exists = this.subcounties.some(sub => sub.id == this.selectedSubcounty);
                                if (!exists) this.selectedSubcounty = '';
                            }
                        })
                        .catch(error => console.error('Error fetching subcounties:', error));
                },

                fetchWards(subcountyId = this.selectedSubcounty, isRetaining = false) {
                    if (!subcountyId) return;
                    fetch(`/get-wards/${subcountyId}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log("Wards fetched:", data); // Debugging
                            this.wards = data;

                            if (!isRetaining) {
                                this.selectedWard = '';
                            } else if (this.selectedWard) {
                                // Ensure selected ward exists in the fetched list
                                const exists = this.wards.some(ward => ward.id == this.selectedWard);
                                if (!exists) this.selectedWard = '';
                            }
                        })
                        .catch(error => console.error('Error fetching wards:', error));
                }
            };
        }
    </script>
</x-app-layout>
