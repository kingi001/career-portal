<x-modal name="add-education" focusable>
    <form method="post" action="#" class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Education') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Please provide your educational information with the most recent.') }}
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-1 pt-3">

            <div>
                <x-input-label for="institution" :value="__('Institution')" />
                <x-text-input id="institution" name="institution" type="text" class="block w-full text-sm"
                    :value="old('institution')" required autofocus autocomplete="institution"
                    placeholder="Name of Institution" />
                <x-input-error class="mt-2" :messages="$errors->get('institution')" />
            </div>

            <div>
                <x-input-label for="level_of_study" :value="__('Level of Study')" />
                <select
                    class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    id="level_of_study" name="level_of_study" required>
                    <option value="" class="text-sm">Select Level</option>
                    <option value="PhD">PhD</option>
                    <option value="Masters">Masters</option>
                    <option value="Degree">Degree</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Certificate">Certificate</option>
                    <option value="KCSE">KCSE</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('level_of_study')" />
            </div>

            <div>
                <x-input-label for="field_of_study" :value="__('Field of Study')" />
                <x-text-input id="field_of_study" name="field_of_study" type="text" class="block w-full text-sm"
                    :value="old('field_of_study')" required autocomplete="field_of_study"
                    placeholder="Field of Study i.e Computer Science" />
                <x-input-error class="mt-2" :messages="$errors->get('field_of_study')" />
            </div>

            <div>
                <x-input-label for="award" :value="__('Award')" />
                <select
                    class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    id="award" name="award" required>
                    <option value="" class="text-sm">Select Award</option>
                    <option value="First Class">First Class</option>
                    <option value="Second Class hnr(Upper)">Second Class (Upper)</option>
                    <option value="Second Class hnr(Lower)">Second Class (Lower)</option>
                    <option value="Pass">Pass</option>
                    <option value="Distinction">Distinction</option>
                    <option value="Credit">Credit</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('award')" />
            </div>

            <div>
                <x-input-label for="start_date" :value="__('Start Date')" />
                <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block text-sm w-full"
                    :value="old('start_date')" required autocomplete="start_date" />
                <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
            </div>

            <div>
                <x-input-label for="end_date" :value="__('End Date')" />
                <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block text-sm w-full"
                    :value="old('end_date')" required autocomplete="end_date" />
                <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
            </div>

        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')" class="h-7">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="bg-blue-900 h-7 ms-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>

<!-- ADDING EDUCATION MODAL -->

<!-- Modal Structure -->
<div id="educationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg font-medium leading-6 text-gray-900"><i class="fas fa-graduation-cap mr-1"></i> Add Education</h3>
            <div class="mt-2">
                <form id="educationForm" action=" " method="POST">
                    @csrf
                    <!-- Education Level -->
                    <div class="mt-4">
                        <label for="level" class="block text-sm font-medium text-gray-700">Education Level</label>
                        <input type="text" name="level" id="level"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., Bachelor's, Master's">
                    </div>
                    <!-- Institution Name -->
                    <div class="mt-4">
                        <label for="institution" class="block text-sm font-medium text-gray-700">Institution Name</label>
                        <input type="text" name="institution" id="institution"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Name of Institution">
                    </div>
                    <!-- Year of Graduation -->
                    <div class="mt-4">
                        <label for="graduation_year" class="block text-sm font-medium text-gray-700">Year of Graduation</label>
                        <input type="number" name="graduation_year" id="graduation_year"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="e.g., 2024">
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                            <i class="fas fa-save mr-1"></i> Save
                        </button>
                        <button type="button" onclick="toggleModal('educationModal')"
                            class="bg-red-500 text-white px-4 py-2 rounded-md">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
    }
</script>
