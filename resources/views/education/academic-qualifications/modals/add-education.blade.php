<!-- ADD Education Modal -->
<div x-data="{ open: false }" @open-modal.window="if ($event.detail.modal === 'add-education') open = true" x-cloak>
    <div class="mt-4 flex justify-end">
        <button @click="open = true"
            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
            <i class="fas fa-plus-circle text-xs"></i> {{ __('Add Education Qualification') }}
        </button>
    </div>

    <!-- Modal Overlay -->
    <div x-show="open"
        class="fixed inset-0 mt-4 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 transition-opacity duration-300"
        x-transition.opacity>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-xl transform transition-all duration-300 scale-95"
            x-show="open" x-transition.scale.90>

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-2 bg-indigo-600 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-graduation-cap"></i> Add Academic Qualifications
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-300 transition-colors duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" action="{{ route('education.store') }}" enctype="multipart/form-data"
                class="p-5 space-y-4">
                @csrf

                <p class="text-sm text-gray-700">
                    Please provide your educational information, starting with the most recent.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="institution" :value="__('Institution')" />
                        <x-text-input id="institution" name="institution" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('institution')" required autofocus placeholder="e.g. University of Nairobi" />
                        <x-input-error class="mt-2" :messages="$errors->get('institution')" />
                    </div>

                    <div>
                        <x-input-label for="level_of_study" :value="__('Qualification')" />
                        <select id="level_of_study" name="level_of_study" required
                            class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm">
                            <option value="">Select Level</option>
                            @foreach (['PhD', 'Masters', 'Degree', 'Diploma', 'Certificate', 'KCSE'] as $level)
                                <option value="{{ $level }}" @selected(old('level_of_study') === $level)>{{ $level }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('level_of_study')" />
                    </div>

                    <div>
                        <x-input-label for="field_of_study" :value="__('Course')" />
                        <x-text-input id="field_of_study" name="field_of_study" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('field_of_study')" required placeholder="e.g. Computer Science" />
                        <x-input-error class="mt-2" :messages="$errors->get('field_of_study')" />
                    </div>

                    <div>
                        <x-input-label for="award" :value="__('Award')" />
                        <select id="award" name="award" required
                            class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm">
                            <option value="">Select Award</option>
                            @foreach (['First Class', 'Second Class hnr(Upper)', 'Second Class hnr(Lower)', 'Pass', 'Distinction', 'Credit'] as $award)
                                <option value="{{ $award }}" @selected(old('award') === $award)>{{ $award }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('award')" />
                    </div>

                    <div>
                        <x-input-label for="start_date" :value="__('Start Date')" />
                        <x-text-input id="start_date" name="start_date" type="date"
                            class="block text-sm w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('start_date')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                    </div>

                    <div>
                        <x-input-label for="end_date" :value="__('End Date')" />
                        <x-text-input id="end_date" name="end_date" type="date"
                            class="block text-sm w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            :value="old('end_date')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                    </div>


                    <!-- File Upload Section with Progress, Preview & Clear -->
                    <div class="sm:col-span-2"
                    x-data="{ fileName: '', fileSize: 0, progress: 0, fileInput: null, filePreview: '', isImage: false }">

                    <x-input-label for="academic_document" :value="__('Upload Certificate (PDF or Image)')" />

                    <div class="border border-gray-300 p-3 rounded-lg shadow-sm bg-white">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-file-upload text-blue-600"></i>

                            <!-- Hidden Input -->
                            <input id="academic_document" name="academic_document" type="file" accept=".pdf,.jpg,.png" class="hidden"
                                x-ref="fileInput"
                                @change="
                                    let file = $event.target.files[0];
                                    if (file) {
                                        fileName = file.name;
                                        fileSize = file.size;
                                        progress = 100;

                                        if (file.size > 2097152) {
                                            fileName = 'File too large!';
                                            progress = 0;
                                        } else {
                                            let reader = new FileReader();
                                            reader.onload = e => {
                                                filePreview = e.target.result;
                                                isImage = file.type.startsWith('image/');
                                            };
                                            reader.readAsDataURL(file);
                                        }
                                    } else {
                                        fileName = '';
                                        fileSize = 0;
                                        progress = 0;
                                        filePreview = '';
                                        isImage = false;
                                    }
                                ">

                            <!-- Upload Button -->
                            <label for="academic_document"
                                class="cursor-pointer bg-blue-600 text-white px-3 py-2 text-sm rounded-md hover:bg-blue-700">
                                Choose File
                            </label>

                            <!-- File Name Display -->
                            <span x-text="fileName" class="text-sm text-gray-700"></span>

                            <!-- Clear/Cancel Button -->
                            <button type="button" x-show="fileName"
                                @click="
                                    fileName = '';
                                    fileSize = 0;
                                    progress = 0;
                                    filePreview = '';
                                    isImage = false;
                                    $refs.fileInput.value = ''"
                                class="ml-2 bg-red-600 text-white px-2 py-1 text-xs rounded-md hover:bg-red-700">
                                Clear
                            </button>
                        </div>

                        <!-- File Size Warning -->
                        <p x-show="fileSize > 2097152" class="text-red-500 text-xs mt-2">
                            File is too large. Max size is 2MB.
                        </p>

                        <!-- File Preview for Images -->
                        <div x-show="isImage" class="mt-3">
                            <p class="text-xs text-gray-500">Preview:</p>
                            <img :src="filePreview" alt="Preview" class="w-40 h-auto rounded-lg shadow">
                        </div>

                        <!-- Progress Bar -->
                        <div x-show="fileName && fileSize <= 2097152" class="mt-3">
                            <p class="text-xs text-gray-500">Uploaded Successfully...</p>
                            <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                                <div class="bg-blue-500 h-2 transition-all duration-300" :style="'width:' + progress + '%'"></div>
                            </div>
                        </div>
                    </div>

                    <x-input-error class="mt-2" :messages="$errors->get('academic_document')" />
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
