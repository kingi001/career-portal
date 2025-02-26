<x-app-layout>
    <div class="py-3 container max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="p-3 bg-white border-b border-gray-100 rounded-lg">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Section 1 :') }}

                <i class="fas fa-user text-blue-500 text-lg"></i>

                {{ __('Personal Information') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                {{ __('Please provide your personal information with accuracy.') }}
            </p>

            <form method="POST" action="" class="rounded-lg">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <!-------------------------------------------------------First Row---------------------------------------------------------------------------------->

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-4">
                    <!-- Salutation -->
                    <div>
                        <x-input-label for="salutation" :value="__('Salutation')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-handshake"></i>
                            </span>
                            <select id="salutation" name="salutation"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2"
                                required>
                                <option value="" disabled selected>Select Salutation</option>
                                <option value="Mr" {{ old('salutation') == 'Mr' ? 'selected' : '' }}>Mr</option>
                                <option value="Miss" {{ old('salutation') == 'Miss' ? 'selected' : '' }}>Miss</option>
                                <option value="Mrs" {{ old('salutation') == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                <option value="Dr" {{ old('salutation') == 'Dr' ? 'selected' : '' }}>Dr</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('salutation')" />
                    </div>

                    <!-- Full Names -->
                    <div>
                        <x-input-label for="full_names" :value="__('Full Names')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-user"></i>
                            </span>
                            <x-text-input id="full_names" name="full_names" type="text"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2"
                                :value="old('full_names')" required placeholder="Enter your full name" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('full_names')" />
                    </div>

                    <!-- ID Number -->
                    <div>
                        <x-input-label for="id_number" :value="__('ID Number')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-id-card"></i>
                            </span>
                            <x-text-input id="id_number" name="id_number" type="number"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2"
                                :value="old('id_number')" required placeholder="Enter your ID number" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('id_number')" />
                    </div>
                </div>

                <!----------------------------------------------------------Second Row------------------------------------------------------------------------------------>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 py-4">
                    <!-- Nationality -->
                    <div>
                        <x-input-label for="nationality" :value="__('Nationality')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-flag"></i>
                            </span>
                            <select id="nationality" name="nationality"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2"
                                required>
                                <option value="" disabled selected>Select Nationality</option>
                                <option value="Kenya" {{ old('nationality') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                <option value="Tanzania" {{ old('nationality') == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
                                <option value="Uganda" {{ old('nationality') == 'Uganda' ? 'selected' : '' }}>Uganda</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('nationality')" />
                    </div>

                    <!-- County -->
                    <div>
                        <x-input-label for="county" :value="__('County')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-landmark"></i>
                            </span>
                            <select id="county" name="county"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2"
                                required>
                                <option value="" disabled selected>Select County</option>
                                <option value="Kilifi" {{ old('county') == 'Kilifi' ? 'selected' : '' }}>Kilifi</option>
                                <option value="Mombasa" {{ old('county') == 'Mombasa' ? 'selected' : '' }}>Mombasa</option>
                                <option value="Nairobi" {{ old('county') == 'Nairobi' ? 'selected' : '' }}>Nairobi</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('county')" />
                    </div>

                    <!-- Constituency -->
                    <div>
                        <x-input-label for="constituency" :value="__('Constituency')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-city"></i>
                            </span>
                            <select id="constituency" name="constituency"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2"
                                required>
                                <option value="" disabled selected>Select Constituency</option>
                                <option value="Likoni" {{ old('constituency') == 'Likoni' ? 'selected' : '' }}>Likoni</option>
                                <option value="Jomvu" {{ old('constituency') == 'Jomvu' ? 'selected' : '' }}>Jomvu</option>
                                <option value="Changamwe" {{ old('constituency') == 'Changamwe' ? 'selected' : '' }}>Changamwe</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('constituency')" />
                    </div>

                    <!-- Ward -->
                    <div>
                        <x-input-label for="ward" :value="__('Ward')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <select id="ward" name="ward"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm pl-10 py-2"
                                required>
                                <option value="" disabled selected>Select Ward</option>
                                <option value="Mtongwe" {{ old('ward') == 'Mtongwe' ? 'selected' : '' }}>Mtongwe</option>
                                <option value="Mikindani" {{ old('ward') == 'Mikindani' ? 'selected' : '' }}>Mikindani</option>
                                <option value="Kisauni" {{ old('ward') == 'Kisauni' ? 'selected' : '' }}>Kisauni</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('ward')" />
                    </div>
                </div>

                <!---------------------------------------------------------------------third row----------------------------------------------------------------------->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4">
                    <!-- Date of Birth -->
                    <div>
                        <x-input-label for="date_of_birth" :value="__('Date of Birth')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <x-text-input id="date_of_birth" name="date_of_birth" type="date"
                                class="mt-1 block w-full text-sm pl-10 py-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('date_of_birth')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
                    </div>

                    <!-- Gender -->
                    <div>
                        <x-input-label for="gender" :value="__('Gender')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="flex items-center space-x-6 mt-1">
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="male"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500"
                                    {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                <span class="ml-2">Male</span>
                            </label>

                            <label class="flex items-center">
                                <input type="radio" name="gender" value="female"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500"
                                    {{ old('gender') == 'female' ? 'checked' : '' }} required>
                                <span class="ml-2">Female</span>
                            </label>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                    </div>

                    <!-- KRA PIN -->
                    <div>
                        <x-input-label for="kra_pin" :value="__('KRA PIN')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-address-card"></i>
                            </span>
                            <x-text-input id="kra_pin" name="kra_pin" type="text"
                                class="mt-1 block w-full text-sm pl-10 py-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('kra_pin')" required placeholder="Enter your KRA PIN" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('kra_pin')" />
                    </div>
                </div>

                <!---------------------------------------------------------------------------4th row----------------------------------------------------------------->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-4">
                    <!-- Postal Code -->
                    <div>
                        <x-input-label for="postal_code" :value="__('Postal Code')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-mail-bulk"></i>
                            </span>
                            <x-text-input id="postal_code" name="postal_code" type="number"
                                class="mt-1 block w-full text-sm pl-10 py-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('postal_code')" required placeholder="Enter Postal Code" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <x-text-input id="email" name="email" type="email"
                                class="mt-1 block w-full text-sm pl-10 py-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('email')" required placeholder="Enter your Email Address" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <!-- Mobile Number -->
                    <div>
                        <x-input-label for="phone_number" :value="__('Mobile Number')" class="px-2 text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                                <i class="fas fa-phone"></i>
                            </span>
                            <x-text-input id="phone_number" name="phone_number" type="number"
                                class="mt-1 block w-full text-sm pl-10 py-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('phone_number')" required placeholder="Enter Phone No" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                    </div>
                </div>


                <!---------------------------------------------------------------------5th Row----------------------------------------------------------------------->

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center py-2"
                x-data="{ hasDisability: '{{ old('disability_status', 'no') }}' }">

                <!-- Disability Status (Radio Buttons) -->
                <div class="flex items-center space-x-4">
                    <x-input-label for="disability_status" :value="__('Person with Disability')" />

                    <label class="flex items-center">
                        <input type="radio" name="disability_status" value="yes"
                            class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="hasDisability"
                            {{ old('disability_status') == 'yes' ? 'checked' : '' }} required>
                        <span class="ml-2">Yes</span>
                    </label>

                    <label class="flex items-center">
                        <input type="radio" name="disability_status" value="no"
                            class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="hasDisability"
                            {{ old('disability_status') == 'no' ? 'checked' : '' }} required>
                        <span class="ml-2">No</span>
                    </label>
                </div>

                <!-- Disability Type Dropdown (Visible if Yes is selected) -->
                <div x-show="hasDisability === 'yes'" class="w-full" x-cloak>
                    <x-input-label for="disability_type" :value="__('Disability Type')" />
                    <select name="disability_type" id="disability_type"
                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                        required>
                        <option value="">Select Disability Type</option>
                        <option value="visual" {{ old('disability_type') == 'visual' ? 'selected' : '' }}>Visual Impairment</option>
                        <option value="hearing" {{ old('disability_type') == 'hearing' ? 'selected' : '' }}>Hearing Impairment</option>
                        <option value="physical" {{ old('disability_type') == 'physical' ? 'selected' : '' }}>Physical Disability</option>
                        <option value="mental" {{ old('disability_type') == 'mental' ? 'selected' : '' }}>Mental Disability</option>
                        <option value="other" {{ old('disability_type') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Registration No (Visible if Yes is selected) -->
                <div x-show="hasDisability === 'yes'" class="w-full" x-cloak>
                    <x-input-label for="registration_no" :value="__('Registration No')" class="flex items-center gap-2 text-gray-700 font-semibold">
                        <i class="fas fa-id-card text-blue-500 text-base"></i> {{ __('Registration No') }}
                    </x-input-label>

                    <div class="flex items-center border border-gray-300 focus-within:border-indigo-500 focus-within:ring-indigo-500 rounded-lg shadow-sm px-3 py-2 transition duration-300">
                        <span class="text-gray-500"><i class="fas fa-address-card text-sm"></i></span>
                        <x-text-input id="registration_no" name="registration_no" type="text"
                            class="w-full outline-none border-none focus:ring-0 px-2 py-1 text-sm"
                            :value="old('registration_no')" required placeholder="Enter your Registration No" />
                    </div>
                </div>



                <!-- Validation Errors -->
                <x-input-error class="mt-2" :messages="$errors->get('disability_status')" />
                <x-input-error class="mt-2" :messages="$errors->get('disability_type')" />
                <x-input-error class="mt-2" :messages="$errors->get('registration_no')" />

            </div>


                {{-- <!-- Alpine.js (Required for toggling visibility) -->
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script> --}}


                <!----------------------------------------------------------Section 2----------------------------------------------------------------------->
                <hr>
                <div class="p-5 bg-white border-b border-gray-100 rounded-lg">
                    <h2 class="text-lg font-medium text-gray-900 flex items-center">
                        <i class="fas fa-briefcase text-blue-500 text-lg mr-2"></i>
                        {{ __('Section 2: Current Employment Details') }}
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-2" x-data="{ isApplicant: '{{ old('bma_applicant') == 'yes' ? 'yes' : 'no' }}' }">
                        <!-- Are you an applicant in BMA? -->
                        <div class="flex items-center space-x-4">
                            <x-input-label for="bma_applicant" :value="__('Are you an applicant in Bandari Maritime Academy?')" />
                            <label class="flex items-center">
                                <input type="radio" name="bma_applicant" value="yes"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="isApplicant"
                                    {{ old('bma_applicant') == 'yes' ? 'checked' : '' }} required>
                                </i>
                                <span class="ml-1">Yes</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="bma_applicant" value="no"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="isApplicant"
                                    {{ old('bma_applicant') == 'no' ? 'checked' : '' }} required>
                                </i>
                                <span class="ml-1">No</span>
                            </label>
                        </div>

                        <!-- Department Selection -->
                        <div x-show="isApplicant === 'yes'" class="w-full">
                            <x-input-label for="department" :value="__('Department')" />
                            <div class="relative">
                                <i class="fas fa-building text-gray-400 absolute left-3 top-3"></i>
                                <select name="department" id="department"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm pl-10" required>
                                    <option value="">Select Department</option>
                                    <option value="ICT" {{ old('department') == 'ICT' ? 'selected' : '' }}>ICT</option>
                                    <option value="maritime_affairs" {{ old('department') == 'maritime_affairs' ? 'selected' : '' }}>Maritime Affairs</option>
                                    <option value="port_operations" {{ old('department') == 'port_operations' ? 'selected' : '' }}>Port Operations</option>
                                    <option value="finance" {{ old('department') == 'finance' ? 'selected' : '' }}>Finance</option>
                                    <option value="hr" {{ old('department') == 'hr' ? 'selected' : '' }}>Human Resources</option>
                                    <option value="other" {{ old('department') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- Designation Input -->
                        <div x-show="isApplicant === 'yes'" class="w-full">
                            <x-input-label for="designation" :value="__('Designation')" />
                            <div class="relative">
                                <i class="fas fa-user-tie text-gray-400 absolute left-3 top-3"></i>
                                <x-text-input id="designation" name="designation" type="text"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm pl-10"
                                    :value="old('designation')" required placeholder="Enter your designation" />
                            </div>
                        </div>

                        <!-- Terms of Service -->
                        <div x-show="isApplicant === 'yes'" class="w-full">
                            <x-input-label for="terms_of_service" :value="__('Terms of Service')" />
                            <div class="relative">
                                <i class="fas fa-file-contract text-gray-400 absolute left-3 top-3"></i>
                                <select name="terms_of_service" id="terms_of_service"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm pl-10" required>
                                    <option value="">Select Terms of Service</option>
                                    <option value="permanent" {{ old('terms_of_service') == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                    <option value="contract" {{ old('terms_of_service') == 'contract' ? 'selected' : '' }}>Contract</option>
                                    <option value="internship" {{ old('terms_of_service') == 'internship' ? 'selected' : '' }}>Internship</option>
                                    <option value="casual" {{ old('terms_of_service') == 'casual' ? 'selected' : '' }}>Casual</option>
                                </select>
                            </div>
                        </div>

                        <!-- Job Scale Selection -->
                        <div x-show="isApplicant === 'yes'" class="w-full">
                            <x-input-label for="job_scale" :value="__('Job Scale')" />
                            <div class="relative">
                                <i class="fas fa-chart-line text-gray-400 absolute left-3 top-3"></i>
                                <select name="job_scale" id="job_scale"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm pl-10" required>
                                    <option value="">Select Job Scale</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="bma{{ $i }}" {{ old('job_scale') == "bma$i" ? 'selected' : '' }}>BMA{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <!-- Date of Appointment -->
                        <div x-show="isApplicant === 'yes'" class="w-full">
                            <x-input-label for="date_of_appointment" :value="__('Date of Appointment')" />
                            <div class="relative">
                                <i class="fas fa-calendar-alt text-gray-400 absolute left-3 top-3"></i>
                                <x-text-input id="date_of_appointment" name="date_of_appointment" type="date"
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm pl-10"
                                    :value="old('date_of_appointment')" required />
                            </div>
                        </div>
                    </div>
                </div>




                <hr>
                <!-----------------------------------------------Section 3--------------------------------------------------------------->

                <div class="p-5 bg-white border-b border-gray-100 rounded-lg">
                    <h2 class="text-lg font-medium text-gray-900 flex items-center space-x-2">
                        <i class="fas fa-id-badge text-blue-500 text-xl"></i>
                        <span>{{ __('Section 3 : Other Personal Details') }}</span>
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-4" x-data="{ criminal_offense: '{{ old('crimminal_offense') == 'yes' ? 'yes' : 'no' }}' }">
                        <!-- Criminal Offense Question -->
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-gavel text-red-500 text-lg"></i>
                            <x-input-label for="criminal_offense" :value="__('Have you ever been convicted of any criminal offence or a subject of probation order?')" />
                        </div>

                        <!-- Yes Option -->
                        <div class="flex items-center space-x-2">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="criminal_offense" value="yes" class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="criminal_offense" {{ old('criminal_offense') == 'yes' ? 'checked' : '' }} required>
                                <span>Yes</span>
                            </label>
                        </div>

                        <!-- No Option -->
                        <div class="flex items-center space-x-2">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="criminal_offense" value="no" class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="criminal_offense" {{ old('criminal_offense') == 'no' ? 'checked' : '' }} required>
                                <span>No</span>
                            </label>
                        </div>

                        <!-- Criminal Details -->
                        <div x-show="criminal_offense === 'yes'" x-cloak class="w-full col-span-3">
                            <x-input-label for="criminal_details" :value="__('If Yes, state nature of the offence, the year, and duration of conviction')" />
                            <textarea id="criminal_details" name="criminal_details" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm h-24 p-2" x-bind:required="criminal_offense === 'yes'"></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('criminal_offense')" />
                        </div>
                    </div>
                </div>

                <div class="mt-5 flex items-center text-sm gap-4">
                    <x-primary-button class="flex items-center gap-2 px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition duration-300">
                        <i class="fas fa-save"></i> {{ __('Save') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
