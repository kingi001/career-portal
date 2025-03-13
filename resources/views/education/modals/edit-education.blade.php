<!-- Edit Education Modal -->
<div x-data="{ open: false, education: {} }"
     @open-modal.window="if ($event.detail.modal === 'edit-education') { open = true; education = $event.detail.education }"
     x-cloak>

    <div x-show="open" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4" x-transition>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg transform transition-all duration-300" x-show="open" x-transition.scale>
            <div class="flex justify-between items-center px-6 py-4 bg-blue-500 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-edit"></i> Edit Academic Qualifications
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-300">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <form method="POST" :action="'/education/' + education.id" class="p-6 space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="institution" :value="__('Institution')" />
                        <x-text-input id="institution" name="institution" type="text" x-model="education.institution"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required autofocus />
                    </div>

                    <div>
                        <x-input-label for="level_of_study" :value="__('Level of Study')" />
                        <select id="level_of_study" name="level_of_study" required x-model="education.level_of_study"
                            class="w-full text-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm">
                            <option value="PhD">PhD</option>
                            <option value="Masters">Masters</option>
                            <option value="Degree">Degree</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Certificate">Certificate</option>
                            <option value="KCSE">KCSE</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="field_of_study" :value="__('Field of Study')" />
                        <x-text-input id="field_of_study" name="field_of_study" type="text" x-model="education.field_of_study"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
                    </div>

                    <div>
                        <x-input-label for="award" :value="__('Award')" />
                        <select id="award" name="award" required x-model="education.award"
                            class="w-full text-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm">
                            <option value="First Class">First Class</option>
                            <option value="Second Class hnr(Upper)">Second Class hnr(Upper)</option>
                            <option value="Second Class hnr(Lower)">Second Class hnr(Lower)</option>
                            <option value="Pass">Pass</option>
                            <option value="Distinction">Distinction</option>
                            <option value="Credit">Credit</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="start_date" :value="__('Start Date')" />
                        <x-text-input id="start_date" name="start_date" type="date" x-model="education.start_date"
                            class="block text-sm w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
                    </div>

                    <div>
                        <x-input-label for="end_date" :value="__('End Date')" />
                        <x-text-input id="end_date" name="end_date" type="date" x-model="education.end_date"
                            class="block text-sm w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
                    </div>
                </div>

                <div class="mt-4 flex justify-end space-x-4">
                    <button type="button" @click="open = false"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-sm hover:shadow-md transition-all duration-200 ease-in-out">
                        <i class="fas fa-times"></i> Cancel
                    </button>

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-sm hover:shadow-md transition-all duration-200 ease-in-out">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
