<div x-data="{ open: false, employment: {} }" @open-modal.window="if ($event.detail.modal === 'edit-employment') { open = true; employment = $event.detail.employment; }" x-cloak>
    <div x-show="open" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 transition-opacity duration-300" x-transition.opacity>
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-xl transform transition-all duration-300 scale-95" x-show="open" x-transition.scale.90>
            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-2 bg-indigo-600 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-briefcase"></i> Edit Employment History
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-300 transition-colors duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" :action="'/employment/' + employment.id" class="p-5 space-y-4">
                @csrf
                @method('PUT')

                <p class="text-sm text-gray-700">
                    Update your employment details below.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div>
                        <x-input-label for="company" :value="__('Company')" />
                        <x-text-input id="company" name="company" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            x-model="employment.company" required />
                        <x-input-error class="mt-2" :messages="$errors->get('company')" />
                    </div>

                    <div>
                        <x-input-label for="designation" :value="__('Designation')" />
                        <x-text-input id="designation" name="designation" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            x-model="employment.designation" required />
                        <x-input-error class="mt-2" :messages="$errors->get('designation')" />
                    </div>

                    <div>
                        <x-input-label for="salary" :value="__('Monthly Salary / Gross Pay')" />
                        <x-text-input id="salary" name="salary" type="number" step="0.01"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            x-model="employment.salary" required />
                        <x-input-error class="mt-2" :messages="$errors->get('salary')" />
                    </div>

                    <div>
                        <x-input-label for="start_date" :value="__('Start Date')" />
                        <x-text-input id="start_date" name="start_date" type="date"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            x-model="employment.start_date" required />
                        <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                    </div>

                    <div>
                        <x-input-label for="end_date" :value="__('End Date (or leave blank if current)')" />
                        <x-text-input id="end_date" name="end_date" type="date"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            x-model="employment.end_date" />
                        <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                    </div>
                </div>

                <div>
                    <x-input-label for="responsibilities" :value="__('Key Responsibilities')" />
                    <textarea id="responsibilities" name="responsibilities" rows="5"
                        class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        x-model="employment.responsibilities" required></textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('responsibilities')" />
                </div>

                <!-- Modal Footer (Buttons) -->
                <div class="mt-5 flex justify-end space-x-4">
                    <button type="button" @click="open = false"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-times"></i> {{ __('Cancel') }}
                    </button>

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-save"></i> {{ __('Update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
