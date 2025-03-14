<!-- ADD Professional Qualifications Modal -->
<div x-data="{ open: false }" @open-modal.window="if ($event.detail.modal === 'add-professional-qualification') open = true" x-cloak>
    <div class="mt-4 flex justify-end">
        <button @click="open = true"
            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
            <i class="fas fa-plus-circle text-xs"></i> {{ __('Add Professional Qualification') }}
        </button>
    </div>

    <!-- Modal Overlay -->
    <div x-show="open" class="fixed inset-0 mt-4 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 transition-opacity duration-300"
        x-transition.opacity>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-xl transform transition-all duration-300 scale-95"
            x-show="open" x-transition.scale.90>

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-2 bg-indigo-600 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-award"></i> {{ __('Add Professional Qualification') }}
                </h2>
                <button @click="open = false"
                    class="text-white hover:text-gray-300 transition-colors duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" action="{{ route('qualifications.store') }}" class="p-5 space-y-4">
                @csrf

                <p class="text-sm text-gray-700">
                    Please provide your professional qualification details.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Institution -->
                    <div>
                        <x-input-label for="institution" :value="__('Institution')" />
                        <x-text-input id="institution" name="institution" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('institution')" required autofocus placeholder="e.g. Cisco, Microsoft" />
                        <x-input-error class="mt-2" :messages="$errors->get('institution')" />
                    </div>

                    <!-- Certification -->
                    <div>
                        <x-input-label for="certification" :value="__('Certification')" />
                        <x-text-input id="certification" name="certification" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('certification')" required placeholder="e.g. CCNA, AWS Certified Developer" />
                        <x-input-error class="mt-2" :messages="$errors->get('certification')" />
                    </div>

                    <!-- Award -->
                    <div>
                        <x-input-label for="award" :value="__('Award (Optional)')" />
                        <x-text-input id="award" name="award" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('award')" placeholder="e.g. Certified Network Engineer" />
                        <x-input-error class="mt-2" :messages="$errors->get('award')" />
                    </div>

                    <!-- Start Date -->
                    <div>
                        <x-input-label for="start_date" :value="__('Start Date')" />
                        <x-text-input id="start_date" name="start_date" type="date"
                            class="block text-sm w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('start_date')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                    </div>

                    <!-- End Date -->
                    <div>
                        <x-input-label for="end_date" :value="__('End Date (if applicable)')" />
                        <x-text-input id="end_date" name="end_date" type="date"
                            class="block text-sm w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('end_date')" />
                        <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                    </div>
                </div>

                <!-- Modal Footer (Buttons) -->
                <div class="mt-5 flex justify-end space-x-4">
                    <button type="button" @click="open = false"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-times"></i> {{ __('Cancel') }}
                    </button>

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-save"></i> {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
