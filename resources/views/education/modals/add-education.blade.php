<x-modal name="add-education" focusable>
    <form method="POST" action="{{ route('education.store') }}" class="p-6">
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



<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
    }
</script>
