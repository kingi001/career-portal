<x-app-layout>
    {{-- <div class="py-3 container max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="p-3 bg-white border-b border-gray-100 rounded-lg">
            <h2 class="text-lg font-medium text-gray-900">
                <i class="fas fa-user"></i>

                {{ __('Personal Information') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                {{ __('Please provide your personal information with accuracy.') }}
            </p>

            <form method="POST" action="" class="rounded-lg">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-1">
                    <div>
                        <x-input-label for="surname" :value="__('Sir Name')" />
                        <div class="flex items-center text-sm ">
                            <span class="mr-2 text-gray-500"><i class="fas fa-user"></i></span>
                            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full text-sm"
                                :value="old('surname')" required autofocus placeholder="Enter Sir Name" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('surname')" />
                    </div>

                    <div>
                        <x-input-label for="other_names" :value="__('Other Names')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-user-plus"></i></span>
                            <x-text-input id="other_names" name="other_names" type="text" class="mt-1 block w-full"
                                :value="old('other_names')" required placeholder="Other Names" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('other_names')" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-envelope"></i></span>
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                :value="old('email')" required placeholder="user@gmail.com" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div>
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-phone"></i></span>
                            <x-text-input id="phone_number" name="phone_number" type="tel" class="mt-1 block w-full"
                                :value="old('phone_number')" required placeholder="0712123654" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div>
                        <x-input-label for="date_of_birth" :value="__('Date Of Birth')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-calendar-alt"></i></span>
                            <x-text-input id="date_of_birth" name="date_of_birth" type="date"
                                class="mt-1 block w-full text-sm" :value="old('date_of_birth')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
                    </div>

                    <div>
                        <x-input-label for="gender" :value="__('Gender')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-venus-mars"></i></span>
                            <select id="gender" name="gender"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                required>
                                <option value="" class="text-sm">Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                    </div>

                    <div>
                        <x-input-label for="marital_status" :value="__('Marital Status')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-heart"></i></span>
                            <select id="marital_status" name="marital_status"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                required>
                                <option value="" class="text-sm">Select Marital Status</option>
                                <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single
                                </option>
                                <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>
                                    Married</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('marital_status')" />
                    </div>

                    <div>
                        <x-input-label for="national_id" :value="__('National ID Number')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-id-card"></i></span>
                            <x-text-input id="national_id" name="national_id" type="number" class="mt-1 block w-full"
                                :value="old('national_id')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('national_id')" />
                    </div>
                </div>

                <p class="mt-5 text-sm text-gray-600">
                    {{ __('Please provide your physical address information with accuracy.') }}
                    <hr>
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div>
                        <x-input-label for="nationality" :value="__('Nationality')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-flag"></i></span>
                            <x-text-input id="nationality" name="nationality" type="text"
                                class="mt-1 block w-full" :value="old('nationality')" required placeholder="i.e Kenyan" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('nationality')" />
                    </div>


                    <div>
                        <x-input-label for="county" :value="__('County')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-map"></i></span>
                            <x-text-input id="county" name="county" type="text" class="mt-1 block w-full"
                                :value="old('county')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('county')" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div>
                        <x-input-label for="sub_county" :value="__('Sub-county')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-map-signs"></i></span>
                            <x-text-input id="sub_county" name="sub_county" type="text" class="mt-1 block w-full"
                                :value="old('sub_county')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('sub_county')" />
                    </div>
                    <div>
                        <x-input-label for="sub_county" :value="__('Ward')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-map-signs"></i></span>
                            <x-text-input id="sub_county" name="sub_county" type="text" class="mt-1 block w-full"
                                :value="old('sub_county')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('ward')" />
                    </div>


                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div>
                        <x-input-label for="nationality" :value="__('Address')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-flag"></i></span>
                            <x-text-input id="nationality" name="nationality" type="text"
                                class="mt-1 block w-full" :value="old('nationality')" required placeholder="i.e Kenyan" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('nationality')" />
                    </div>


                    <div>
                        <x-input-label for="ethnicity" :value="__('Ethnicity')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-users"></i></span>
                            <x-text-input id="ethnicity" name="ethnicity" type="text" class="mt-1 block w-full"
                                :value="old('ethnicity')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('ethnicity')" />
                    </div>
                </div>

                <div class="mt-5 flex items-center text-sm gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div> --}}

    <div class="py-3 container max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="p-3 bg-white border-b border-gray-100 rounded-lg">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Section 1 :') }}

                <i class="fas fa-user"></i>

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
                        <x-input-label for="date_of_birth" :value="__('Date Of Birth')" class="px-6"  />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-calendar-alt"></i></span>
                            <x-text-input id="date_of_birth" name="date_of_birth" type="date"
                                class="mt-1 block w-full text-sm" :value="old('date_of_birth')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
                    </div>

                    <div class="px-20">
                        <x-input-label for="gender" :value="__('Gender')"/>  
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
                            <x-text-input id="Postal Code" name="Postal Code" type="number" class="mt-1 block w-full"
                                :value="old('Postal Code')" required placeholder="Enter Postal Code" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('ID No')" />
                    </div>
                    <div>
                        <x-input-label for="Email Address" :value="__('Email Address')" class="px-6" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-envelope"></i></span>
                            <x-text-input id="Email Address" name="Email Address" type="email" class="mt-1 block w-full"
                                :value="old('Email Address')" required placeholder="Enter your Email Address" />
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
                                class="form-radio text-indigo-600 focus:ring-indigo-500"
                                x-model="hasDisability"
                                {{ old('disability_status') == 'yes' ? 'checked' : '' }} required>
                            <span class="ml-2">Yes</span>
                        </label>
                
                        <label class="flex items-center">
                            <input type="radio" name="disability_status" value="no" 
                                class="form-radio text-indigo-600 focus:ring-indigo-500"
                                x-model="hasDisability"
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
                            <option value="visual" {{ old('disability_type') == 'visual' ? 'selected' : '' }}>Visual Impairment</option>
                            <option value="hearing" {{ old('disability_type') == 'hearing' ? 'selected' : '' }}>Hearing Impairment</option>
                            <option value="physical" {{ old('disability_type') == 'physical' ? 'selected' : '' }}>Physical Disability</option>
                            <option value="mental" {{ old('disability_type') == 'mental' ? 'selected' : '' }}>Mental Disability</option>
                            <option value="other" {{ old('disability_type') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                
                    <!-- Full Names Input (Visible if Yes is selected) -->
                    <div x-show="hasDisability === 'yes'" class="w-full">
                        <x-input-label for="Registration No" :value="__('Registration No')" />
                        <div class="flex items-center">
                            <span class="mr-2 text-gray-500"><i class="fas fa-address-card"></i></span>
                            <x-text-input id="Registration No" name="Registration No" type="text" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
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
                
                
               
















              

                <div class="mt-5 flex items-center text-sm gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
