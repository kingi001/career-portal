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

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 py-2">
                    <div>
                        <x-input-label for="Salutation" :value="__('Salutation')" class="px-6" />
                        <div class="flex items-center text-sm ">
                            <span class="mr-2 text-gray-500"><i class="fas fa-handshake"></i></span>
                            <select id="gender" name="gender"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm"
                                required>
                                <option value="" class="text-sm">Select Salutation</option>
                                <option value="Mr" {{ old('gender') == 'Mr' ? 'selected' : '' }}>Mr</option>
                                <option value="Miss" {{ old('gender') == 'Miss' ? 'selected' : '' }}>Miss
                                </option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <x-input-label for="full names" :value="__('Full Names')" class="px-6" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-address-card"></i></span>
                            <x-text-input id="full names" name="full names" type="text" class="mt-1 block w-full"
                                :value="old('full names')" required placeholder="Enter your full names" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('full names')" />
                    </div>
                    <div>
                        <x-input-label for="ID No" :value="__('ID NUMBER')" class="px-6" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-user-plus"></i></span>
                            <x-text-input id="ID No" name="ID No" type="number" class="mt-1 block w-full"
                                :value="old('ID No')" required placeholder="Enter ID No" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('ID No')" />
                    </div>



                </div>
                <!----------------------------------------------------------Second Row------------------------------------------------------------------------------------>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 py-2">
                    <div>
                        <x-input-label for="Nationality" :value="__('Nationality')" class="px-6" />
                        <div class="flex items-center text-sm ">
                            <span class="mr-2 text-gray-500"><i class="fas fa-flag"></i></span>
                            <select id="gender" name="gender"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm"
                                required>
                                <option value="" class="text-sm">Select Nationality</option>
                                <option value="Kenya" {{ old('gender') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                <option value="Miss" {{ old('gender') == 'Miss' ? 'selected' : '' }}>Miss</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <x-input-label for="County" :value="__('County')" class="px-6" />
                        <div class="flex items-center text-sm ">
                            <span class="mr-2 text-gray-500"><i class="fas fa-landmark"></i></span>
                            <select id="gender" name="gender"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm"
                                required>
                                <option value="" class="text-sm">Select County</option>
                                <option value="kilifi" {{ old('gender') == 'kilifi' ? 'selected' : '' }}>kilifi
                                </option>
                                <option value="Mombasa" {{ old('gender') == 'Mombasa' ? 'selected' : '' }}>Mombasa
                                </option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <x-input-label for="Constituency" :value="__('Constituency')" class="px-6" />
                        <div class="flex items-center text-sm ">
                            <span class="mr-2 text-gray-500"><i class="fas fa-city"></i></span>
                            <select id="gender" name="gender"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm"
                                required>
                                <option value="" class="text-sm">Select Constituency</option>
                                <option value="likoni" {{ old('gender') == 'likon' ? 'selected' : '' }}>likon</option>
                                <option value="jomvu" {{ old('gender') == 'jomvu' ? 'selected' : '' }}>jomvu</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <x-input-label for="Ward" :value="__('Ward')" class="px-6" />
                        <div class="flex items-center text-sm ">
                            <span class="mr-2 text-gray-500"><i class="fas fa-map-marker-alt"></i></span>
                            <select id="gender" name="gender"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-sm"
                                required>
                                <option value="" class="text-sm">Select Ward</option>
                                <option value="mtongwe" {{ old('gender') == 'mtongwe' ? 'selected' : '' }}>mtongwe
                                </option>
                                <option value="mikindani" {{ old('gender') == 'mikindani' ? 'selected' : '' }}>
                                    mikindani</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!---------------------------------------------------------------------third row----------------------------------------------------------------------->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                    <div>
                        <x-input-label for="date_of_birth" :value="__('Date Of Birth')" class="px-6" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-calendar-alt"></i></span>
                            <x-text-input id="date_of_birth" name="date_of_birth" type="date"
                                class="mt-1 block w-full text-sm" :value="old('date_of_birth')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
                    </div>

                    <div class="px-20">
                        <x-input-label for="gender" :value="__('Gender')" />
                        <div class="flex items-center text-sm space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="male"
                                    class="form-radio  text-indigo-600 focus:ring-indigo-500"
                                    {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                <span class="ml-2 ">Male</span>
                            </label>

                            <label class="flex items-center">
                                <input type="radio" name="gender" value="female"
                                    class="form-radio  text-indigo-600 focus:ring-indigo-500"
                                    {{ old('gender') == 'female' ? 'checked' : '' }} required>
                                <span class="ml-2">Female</span>
                            </label>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                    </div>

                    <div>
                        <x-input-label for="KRA" :value="__('KRA PIN')" class="px-6" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-address-card"></i></span>
                            <x-text-input id="KRA PIN" name="KRA PIN" type="text" class="mt-1 block w-full"
                                :value="old('KRA PIN')" required placeholder="Enter your KRA PIN" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('KRA PIN')" />
                    </div>


                </div>
                <!---------------------------------------------------------------------------4th row----------------------------------------------------------------->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 py-2">
                    <div>
                        <x-input-label for="Postal Code" :value="__('Postal Code')" class="px-6" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-mail-bulk"></i></span>
                            <x-text-input id="Postal Code" name="Postal Code" type="number"
                                class="mt-1 block w-full" :value="old('Postal Code')" required
                                placeholder="Enter Postal Code" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('ID No')" />
                    </div>
                    <div>
                        <x-input-label for="Email Address" :value="__('Email Address')" class="px-6" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-envelope"></i></span>
                            <x-text-input id="Email Address" name="Email Address" type="email"
                                class="mt-1 block w-full" :value="old('Email Address')" required
                                placeholder="Enter your Email Address" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('full names')" />
                    </div>



                    <div>
                        <x-input-label for="Phone No" :value="__('Mobile Number')" class="px-6" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-phone"></i></span>
                            <x-text-input id="Phone No" name="Phone No" type="number" class="mt-1 block w-full"
                                :value="old('Phone No')" required placeholder="Enter Phone No" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('Phone No')" />
                    </div>



                </div>

                <!---------------------------------------------------------------------5th Row----------------------------------------------------------------------->

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center py-2" x-data="{ hasDisability: '{{ old('disability_status') == 'yes' ? 'yes' : 'no' }}' }">

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
                    <div x-show="hasDisability === 'yes'" class="w-full">
                        <select name="disability_type" id="disability_type"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                            required>
                            <option value="">Select Disability Type</option>
                            <option value="visual" {{ old('disability_type') == 'visual' ? 'selected' : '' }}>Visual
                                Impairment</option>
                            <option value="hearing" {{ old('disability_type') == 'hearing' ? 'selected' : '' }}>
                                Hearing Impairment</option>
                            <option value="physical" {{ old('disability_type') == 'physical' ? 'selected' : '' }}>
                                Physical Disability</option>
                            <option value="mental" {{ old('disability_type') == 'mental' ? 'selected' : '' }}>Mental
                                Disability</option>
                            <option value="other" {{ old('disability_type') == 'other' ? 'selected' : '' }}>Other
                            </option>
                        </select>
                    </div>

                    <!-- Full Names Input (Visible if Yes is selected) -->
                    <div x-show="hasDisability === 'yes'" class="w-full">
                        <x-input-label for="Registration No" :value="__('Registration No')" />
                        <div class="flex items-center">
                            <span class="mr-2 text-gray-500"><i class="fas fa-address-card"></i></span>
                            <x-text-input id="Registration No" name="Registration No" type="text"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('Registration No')" required placeholder="Enter your Registration No" />
                        </div>
                    </div>

                    <!-- Validation Errors -->
                    <x-input-error class="mt-2" :messages="$errors->get('disability_status')" />
                    <x-input-error class="mt-2" :messages="$errors->get('disability_type')" />
                    <x-input-error class="mt-2" :messages="$errors->get('Registration No')" />

                </div>

                <!-- Alpine.js (Required for toggling visibility) -->
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>


                <!----------------------------------------------------------Section 2----------------------------------------------------------------------->
                <hr>
                <div class="p-5 bg-white border-b border-gray-100 rounded-lg">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Section 2 :') }}

                        <i class="fas fa-briefcase text-blue-500 text-lg"></i>
                        {{ __('Current Employment Details') }}
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-2" x-data="{ isApplicant: '{{ old('bma_applicant') == 'yes' ? 'yes' : 'no' }}' }">

                        <!-- Are you an applicant in BMA? -->
                        <div class="flex items-center space-x-4">
                            <x-input-label for="bma_applicant" :value="__('Are you an applicant in Bandari Maritime Academy?')" />

                            <!-- Yes Option -->
                            <label class="flex items-center">
                                <input type="radio" name="bma_applicant" value="yes"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="isApplicant"
                                    {{ old('bma_applicant') == 'yes' ? 'checked' : '' }} required>
                                <span class="ml-2">Yes</span>
                            </label>

                            <!-- No Option -->
                            <label class="flex items-center">
                                <input type="radio" name="bma_applicant" value="no"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="isApplicant"
                                    {{ old('bma_applicant') == 'no' ? 'checked' : '' }} required>
                                <span class="ml-2">No</span>
                            </label>
                        </div>

                        <!-- Department Selection -->
                        <div x-show="isApplicant === 'yes'" class="w-full">
                            <x-input-label for="department" :value="__('Department')" />
                            <select name="department" id="department"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                required>
                                <option value="">Select Department</option>
                                <option value="ICT" {{ old('department') == 'ICT' ? 'selected' : '' }}>ICT
                                </option>
                                <option value="maritime_affairs"
                                    {{ old('department') == 'maritime_affairs' ? 'selected' : '' }}>Maritime Affairs
                                </option>
                                <option value="port_operations"
                                    {{ old('department') == 'port_operations' ? 'selected' : '' }}>Port Operations
                                </option>
                                <option value="finance" {{ old('department') == 'finance' ? 'selected' : '' }}>Finance
                                </option>
                                <option value="hr" {{ old('department') == 'hr' ? 'selected' : '' }}>Human
                                    Resources</option>
                                <option value="other" {{ old('department') == 'other' ? 'selected' : '' }}>Other
                                </option>
                            </select>
                        </div>

                        <!-- Designation Input -->
                        <div x-show="isApplicant === 'yes'" class="w-full">
                            <x-input-label for="designation" :value="__('Designation')" />
                            <x-text-input id="designation" name="designation" type="text"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('designation')" required placeholder="Enter your designation" />
                        </div>

                        <!-- Terms of Service -->
                        <div x-show="isApplicant === 'yes'" class="w-full">
                            <x-input-label for="terms_of_service" :value="__('Terms of Service')" />
                            <select name="terms_of_service" id="terms_of_service"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                required>
                                <option value="">Select Terms of Service</option>
                                <option value="permanent"
                                    {{ old('terms_of_service') == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                <option value="contract"
                                    {{ old('terms_of_service') == 'contract' ? 'selected' : '' }}>Contract</option>
                                <option value="internship"
                                    {{ old('terms_of_service') == 'internship' ? 'selected' : '' }}>Internship</option>
                                <option value="casual" {{ old('terms_of_service') == 'casual' ? 'selected' : '' }}>
                                    Casual</option>
                            </select>
                        </div>

                        <!-- Job Scale Selection -->
                        <div x-show="isApplicant === 'yes'" class="w-full">
                            <x-input-label for="job_scale" :value="__('Job Scale')" />
                            <select name="job_scale" id="job_scale"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                required>
                                <option value="">Select Job Scale</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="bma{{ $i }}"
                                        {{ old('job_scale') == "bma$i" ? 'selected' : '' }}>BMA{{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Date of Appointment -->
                        <div x-show="isApplicant === 'yes'" class="w-full">
                            <x-input-label for="date_of_appointment" :value="__('Date of Appointment')" />
                            <x-text-input id="date_of_appointment" name="date_of_appointment" type="date"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                :value="old('date_of_appointment')" required />
                        </div>

                    </div>


                </div>


                <hr>
                <!-----------------------------------------------Section 3--------------------------------------------------------------->

                <div class="p-5 bg-white border-b border-gray-100 rounded-lg">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Section 3 :') }}

                        <i class="fas fa-id-badge text-blue-500 text-lg"></i>
                        {{ __('Other Personal Details') }}
                    </h2>
                    <!-- Have you ever been convicted of any criminal offence or a subject of probation order?' -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-2" x-data="{ crimminal_offense: '{{ old('bma_applicant') == 'yes' ? 'yes' : 'no' }}' }">

                        <div class="flex items-center space-x-4">
                            <x-input-label for="crimminal_offense" :value="__(
                                'Have you ever been convicted of any criminal offence or a subject of probation order?',
                            )" />

                            <!-- Yes Option -->
                            <label class="flex items-center">
                                <input type="radio" name="crimminal_offense" value="yes"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500"
                                    x-model="crimminal_offense"
                                    {{ old('crimminal_offense') == 'yes' ? 'checked' : '' }} required>
                                <span class="ml-2">Yes</span>
                            </label>

                            <!-- No Option -->
                            <label class="flex items-center">
                                <input type="radio" name="crimminal_offense" value="no"
                                    class="form-radio text-indigo-600 focus:ring-indigo-500"
                                    x-model="crimminal_offense"
                                    {{ old('crimminal_offense') == 'no' ? 'checked' : '' }} required>
                                <span class="ml-2">No</span>
                            </label>
                        </div>


                        <div x-show="crimminal_offense === 'yes'" x-cloak class="w-full col-span-2">
                            <x-input-label for="criminal_details" :value="__('If Yes, state nature of the offence, the year, and duration of conviction')" />
                            <textarea id="criminal_details" name="criminal_details"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm h-24"
                                x-bind:required="convicted === 'yes'"></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('criminal_offense')" />
                        </div>
                    </div>


                </div>
                <div class="mt-5 flex items-center text-sm gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
