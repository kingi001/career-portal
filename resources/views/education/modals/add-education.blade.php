<x-modal name="add-education" focusable>
    <form method="post" action="#" class="p-6">
        @csrf


        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Education') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Please provide your educational information with the most recent..') }}
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-1 pt-3">

            <div>
                <x-input-label for="name" :value="__('Institution')" />
                <x-text-input id="name" name="name" type="text" class=" block w-full text-sm"
                    :value="old('name')" required autofocus autocomplete="name"
                    placeholder="Name of Institution" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="name" :value="__('Level of Study')" />
                <select
                    class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    id="assignedSocialWorker" name="assignedSocialWorker" required>
                    <option value="" class="text-sm">Select Level</option>

                    <option value="">PhD</option>
                    <option value="">Masters</option>
                    <option value="">Degree</option>
                    <option value="">Diploma</option>
                    <option value="">Certificate</option>
                    <option value="">KCSE</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="name" :value="__('Field of Study')" />
                <x-text-input id="name" name="name" type="text" class=" block w-full text-sm"
                    :value="old('name')" required autofocus autocomplete="name"
                    placeholder="Field of Study i.e Computer Science" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div>
                <x-input-label for="name" :value="__('Award')" />
                <select
                    class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                    id="assignedSocialWorker" name="assignedSocialWorker" required>
                    <option value="" class="text-sm">Select Award</option>

                    <option value="">First Class</option>
                    <option value="">Second Class hnr(Upper)</option>
                    <option value="">Second Class hnr(Lower)</option>
                    <option value="">Pass</option>
                    <option value="">Distinction</option>
                    <option value="">Credit</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div>
                <x-input-label for="name" :value="__('Start Date')" />
                <x-text-input id="name" name="name" type="date" class="mt-1 block text-sm w-full"
                    :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div>
                <x-input-label for="name" :value="__('End Date')" />
                <x-text-input id="name" name="name" type="date" class="mt-1 block text-sm w-full"
                    :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>


        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')" class="h-7">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="bg-blue-900 h-7  ms-3">
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
                <h3 class="text-lg font-medium leading-6 text-gray-900">Add Education</h3>
                <div class="mt-2">
                    <form id="educationForm" action=" " method="POST">
                        @csrf
                        <!-- Education Level -->
                        <div class="mt-4">
                            <label for="level" class="block text-sm font-medium text-gray-700">Education
                                Level</label>
                            <input type="text" name="level" id="level"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <!-- Institution Name -->
                        <div class="mt-4">
                            <label for="institution" class="block text-sm font-medium text-gray-700">Institution
                                Name</label>
                            <input type="text" name="institution" id="institution"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <!-- Year of Graduation -->
                        <div class="mt-4">
                            <label for="graduation_year" class="block text-sm font-medium text-gray-700">Year of
                                Graduation</label>
                            <input type="number" name="graduation_year" id="graduation_year"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <!-- Submit Button -->
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Save</button>
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

