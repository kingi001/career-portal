<!-- Edit Professional Qualification Modal -->
<div x-data="{ open: false, qualification: {} }"
     @open-modal.window="if ($event.detail.modal === 'edit-professional-qualification') { open = true; qualification = $event.detail.qualification }"
     x-cloak>

    <div x-show="open" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4" x-transition>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg transform transition-all duration-300" x-show="open" x-transition.scale>

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-2 bg-indigo-600 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-certificate text-xl mr-1"></i> Edit Professional Qualification
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-300">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" :action="'/qualifications/' + qualification.id" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <p class="text-sm text-gray-700">
                    Update the details of your professional qualifications.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div>
                        <x-input-label for="certifying_body" :value="__('Certifying Body')" />
                        <x-text-input id="institution" name="institution" type="text" x-model="qualification.institution"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required autofocus />
                    </div>

                    <div>
                        <x-input-label for="certification" :value="__('Certification Name')" />
                        <x-text-input id="certification" name="certification" type="text" x-model="qualification.certification"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
                    </div>


                    <div>
                        <x-input-label for="award" :value="__('Award (Optional)')" />
                        <x-text-input id="award" name="award" type="text" x-model="qualification.award"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                        <x-input-error class="mt-2" :messages="$errors->get('award')" />
                    </div>

                    <div>
                        <x-input-label for="start_date" :value="__('Start Date')" />
                        <x-text-input id="start_date" name="start_date" type="date" x-model="qualification.start_date"
                            class="block text-sm w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" required />
                    </div>

                    <div>
                        <x-input-label for="end_date" :value="__('Expiry Date (if applicable)')" />
                        <x-text-input id="end_date" name="end_date" type="date" x-model="qualification.end_date"
                            class="block text-sm w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                    </div>
                </div>

                <!-- Modal Footer (Buttons) -->
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
