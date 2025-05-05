<!-- ADD Vacancy Modal -->
<div x-data="{ open: false }" @open-modal.window="if ($event.detail.modal === 'add-vacancy') open = true" x-cloak>
    <!-- Modal Overlay -->
    <div x-show="open"
         class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50  flex items-center justify-center p-4 transition-opacity duration-300"
         x-transition.opacity>

         {{-- backdrop-blur-sm --}}

        <!-- Modal Content -->
        <div class="bg-white rounded-2xl shadow-2xl w-full text-sm max-w-3xl transform transition-all duration-300 scale-95 border border-gray-200"
             x-show="open" x-transition.scale.90>

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-1 bg-indigo-600 text-white rounded-t-2xl">
                <h2 class="text-base font-medium flex items-center gap-2">
                    <i class="fas fa-briefcase text-white"></i> Add Vacancy
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-200 transition">
                    <i class="fas fa-times text-base"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" action="{{ route('vacancies.store') }}" class="p-4 space-y-2">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <p class="text-sm text-gray-700">
                    Fill out the details below to post a new vacancy.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div>
                        <x-input-label for="refno" :value="__('Reference No.')" />
                        <x-text-input id="refno" name="refno" type="text"
                            class="w-full text-sm" :value="old('refno')" required placeholder="e.g. BMA/VAC/001/2025" />
                        <x-input-error class="mt-2" :messages="$errors->get('refno')" />
                    </div>

                    <div>
                        <x-input-label for="position" :value="__('Position')" />
                        <x-text-input id="position" name="position" type="text"
                            class="w-full text-sm" :value="old('position')" required placeholder="e.g. Finance Officer" />
                        <x-input-error class="mt-2" :messages="$errors->get('position')" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-input-label for="job_grade" :value="__('Job Grade')" />
                        <select id="job_grade" name="job_grade"
                            class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                            <option value="">-- Select Grade --</option>
                            @foreach (['BMA1', 'BMA2', 'BMA3', 'BMA4', 'BMA5', 'BMA6', 'BMA7', 'BMA8', 'BMA9', 'BMA10', 'BMA11', 'BMA12'] as $grade)
                                <option value="{{ $grade }}" {{ old('job_grade') === $grade ? 'selected' : '' }}>
                                    {{ $grade }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-1" :messages="$errors->get('job_grade')" />
                    </div>
                </div>

                <div class="pt-1 space-y-4">
                    <div>
                        <x-input-label for="requirements" :value="__('Job Requirements')" />
                        <textarea id="requirements" name="requirements"
                            class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            rows="5" required>{{ old('requirements') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('requirements')" />
                    </div>

                    <div>
                        <x-input-label for="duties" :value="__('Job Duties')" />
                        <textarea id="duties" name="duties"
                            class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            rows="5" required>{{ old('duties') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('duties')" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-2">
                    <div>
                        <x-input-label for="application_deadline" :value="__('Application Deadline')" />
                        <x-text-input id="application_deadline" name="application_deadline" type="date"
                            class="w-full text-sm" :value="old('application_deadline')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('application_deadline')" />
                    </div>

                    <div>
                        <x-input-label for="status" :value="__('Status')" />
                        <select id="status" name="status"
                            class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                            <option value="open" {{ old('status') === 'open' ? 'selected' : '' }}>Open</option>
                            <option value="closed" {{ old('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" @click="open = false"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-2 py-1 rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-2 py-1 rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END ADD Vacancy Modal -->
