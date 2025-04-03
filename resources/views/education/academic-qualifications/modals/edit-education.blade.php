<!-- Edit Education Modal -->
<div x-data="{
    open: false,
    education: {},
    fileName: '',
    existingFile: ''
}"
@open-modal.window="if ($event.detail.modal === 'edit-education') {
    open = true;
    education = $event.detail.education;
    existingFile = education.academic_document ?? '';
    fileName = existingFile ? existingFile.split('/').pop() : '';
}"
x-cloak>

<!-- Modal Overlay -->
<div x-show="open"
    class="fixed inset-0 mt-4 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 transition-opacity duration-300"
    x-transition.opacity>

    <!-- Modal Content -->
    <div class="bg-white rounded-lg shadow-2xl w-full max-w-xl transform transition-all duration-300 scale-95"
        x-show="open" x-transition.scale.90>

        <!-- Modal Header -->
        <div class="flex justify-between items-center px-5 py-1.5 bg-indigo-600 text-white rounded-t-lg">
            <h2 class="text-lg font-semibold flex items-center gap-2">
                <i class="fas fa-edit"></i> Edit Academic Qualifications
            </h2>
            <button @click="open = false" class="text-white hover:text-gray-300 transition-colors duration-200">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Modal Form -->
        <form method="POST" :action="'/education/' + education.id" class="p-5 space-y-4">
            @csrf
            @method('PUT')

            <p class="text-sm text-gray-700">Update your educational details below.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                <!-- Institution -->
                <div>
                    <x-input-label for="institution" :value="__('Institution')" />
                    <x-text-input id="institution" name="institution" type="text"
                        class="block w-full text-sm border-gray-300 rounded-lg" x-model="education.institution"
                        required />
                </div>

                <!-- Level of Study -->
                <div>
                    <x-input-label for="level_of_study" :value="__('Qualification')" />
                    <select id="level_of_study" name="level_of_study" required class="w-full text-sm border-gray-300 rounded-lg"
                        x-model="education.level_of_study">
                        <option value="">Select Level</option>
                        <option value="PhD">PhD</option>
                        <option value="Masters">Masters</option>
                        <option value="Degree">Degree</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Certificate">Certificate</option>
                        <option value="KCSE">KCSE</option>
                    </select>
                </div>

                <!-- Course -->
                <div>
                    <x-input-label for="field_of_study" :value="__('Course')" />
                    <x-text-input id="field_of_study" name="field_of_study" type="text"
                        class="block w-full text-sm border-gray-300 rounded-lg" x-model="education.field_of_study"
                        required />
                </div>

                <!-- Award -->
                <div>
                    <x-input-label for="award" :value="__('Award')" />
                    <select id="award" name="award" required class="w-full text-sm border-gray-300 rounded-lg"
                        x-model="education.award">
                        <option value="">Select Award</option>
                        <option value="First Class">First Class</option>
                        <option value="Second Class hnr(Upper)">Second Class hnr(Upper)</option>
                        <option value="Second Class hnr(Lower)">Second Class hnr(Lower)</option>
                        <option value="Pass">Pass</option>
                        <option value="Distinction">Distinction</option>
                        <option value="Credit">Credit</option>
                    </select>
                </div>

                <!-- Start Date -->
                <div>
                    <x-input-label for="start_date" :value="__('Start Date')" />
                    <x-text-input id="start_date" name="start_date" type="date"
                        class="block w-full text-sm border-gray-300 rounded-lg" x-model="education.start_date"
                        required />
                </div>

                <!-- End Date -->
                <div>
                    <x-input-label for="end_date" :value="__('End Date')" />
                    <x-text-input id="end_date" name="end_date" type="date"
                        class="block w-full text-sm border-gray-300 rounded-lg" x-model="education.end_date"
                        required />
                </div>
            </div>

            <!-- View Certificate -->
            <div class="border border-gray-300 p-3 rounded-lg shadow-sm bg-white">
                <div x-show="existingFile" class="mt-2">
                    <p class="text-xs text-gray-500">Current File:</p>
                    <a :href="'/storage/' + existingFile" target="_blank"
                        class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                        <i class="fas fa-file-pdf"></i> View Current Certificate
                    </a>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="mt-5 flex justify-end space-x-4">
                <button type="button" @click="open = false"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 text-sm rounded-md">Cancel</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 text-sm rounded-md">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
