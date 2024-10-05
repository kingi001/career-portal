<x-app-layout>
    <div class="py-3 container max-w-5xl mx-auto sm:px-6 lg:px-8 ">
        <div class="p-3 bg-white border-b border-gray-100 rounded-lg">
            <h2 class="text-lg font-medium text-gray-900">
                <i class="fas fa-user"></i>

                {{ __('Personal Information') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                {{ __("Please provide your personal information with accuracy.") }}
            </p>

            <form method="POST" action="" class="rounded-lg">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-1">
                    <div>
                        <x-input-label for="surname" :value="__('Sir Name')" />
                        <div class="flex items-center text-sm ">
                            <span class="mr-2 text-gray-500"><i class="fas fa-user"></i></span>
                            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full text-sm" :value="old('surname')" required autofocus placeholder="Enter Sir Name" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('surname')" />
                    </div>

                    <div>
                        <x-input-label for="other_names" :value="__('Other Names')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-user-plus"></i></span>
                            <x-text-input id="other_names" name="other_names" type="text" class="mt-1 block w-full" :value="old('other_names')" required placeholder="Other Names" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('other_names')" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-envelope"></i></span>
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required placeholder="user@gmail.com" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div>
                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-phone"></i></span>
                            <x-text-input id="phone_number" name="phone_number" type="tel" class="mt-1 block w-full" :value="old('phone_number')" required placeholder="0712123654" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div>
                        <x-input-label for="date_of_birth" :value="__('Date Of Birth')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-calendar-alt"></i></span>
                            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full text-sm" :value="old('date_of_birth')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
                    </div>

                    <div>
                        <x-input-label for="gender" :value="__('Gender')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-venus-mars"></i></span>
                            <select id="gender" name="gender" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" required>
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
                            <select id="marital_status" name="marital_status" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" required>
                                <option value="" class="text-sm">Select Marital Status</option>
                                <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                                <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('marital_status')" />
                    </div>

                    <div>
                        <x-input-label for="national_id" :value="__('National ID Number')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-id-card"></i></span>
                            <x-text-input id="national_id" name="national_id" type="number" class="mt-1 block w-full" :value="old('national_id')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('national_id')" />
                    </div>
                </div>

                <p class="mt-5 text-sm text-gray-600">
                    {{ __("Please provide your physical address information with accuracy.") }}
                <hr>
                            </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div>
                        <x-input-label for="nationality" :value="__('Nationality')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-flag"></i></span>
                            <x-text-input id="nationality" name="nationality" type="text" class="mt-1 block w-full" :value="old('nationality')" required placeholder="i.e Kenyan" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('nationality')" />
                    </div>
                    

                    <div>
                        <x-input-label for="county" :value="__('County')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-map"></i></span>
                            <x-text-input id="county" name="county" type="text" class="mt-1 block w-full" :value="old('county')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('county')" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div>
                        <x-input-label for="sub_county" :value="__('Sub-county')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-map-signs"></i></span>
                            <x-text-input id="sub_county" name="sub_county" type="text" class="mt-1 block w-full" :value="old('sub_county')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('sub_county')" />
                    </div>
                    <div>
                        <x-input-label for="sub_county" :value="__('Ward')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-map-signs"></i></span>
                            <x-text-input id="sub_county" name="sub_county" type="text" class="mt-1 block w-full" :value="old('sub_county')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('ward')" />
                    </div>

                   
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div>
                        <x-input-label for="nationality" :value="__('Address')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-flag"></i></span>
                            <x-text-input id="nationality" name="nationality" type="text" class="mt-1 block w-full" :value="old('nationality')" required placeholder="i.e Kenyan" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('nationality')" />
                    </div>
                    

                    <div>
                        <x-input-label for="ethnicity" :value="__('Ethnicity')" />
                        <div class="flex items-center text-sm">
                            <span class="mr-2 text-gray-500"><i class="fas fa-users"></i></span>
                            <x-text-input id="ethnicity" name="ethnicity" type="text" class="mt-1 block w-full" :value="old('ethnicity')" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('ethnicity')" />
                    </div>
                </div>

                <div class="mt-5 flex items-center text-sm gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
