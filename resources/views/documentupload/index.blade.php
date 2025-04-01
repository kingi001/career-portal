<x-app-layout>
    <div class="py-6 container max-w-5xl mx-auto sm:px-6 lg:px-8">

        <!-- Upload Section -->
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                <i class="fas fa-upload text-blue-500"></i> {{ __('Upload Documents') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Upload the required documents for your application (PDF only, Max: 2MB).') }}
            </p>

            <!-- Upload Form -->
            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @php
                        $documentTypes = [
                            ['name' => 'application_letter', 'label' => 'Application Letter (Required)', 'required' => true],
                            ['name' => 'id_passport', 'label' => 'ID / Passport (Required)', 'required' => true],
                            // ['name' => 'testimonials', 'label' => 'Testimonials (Optional)', 'required' => true]
                        ];
                    @endphp

                    @foreach ($documentTypes as $doc)
                        <div class="relative border border-gray-300 rounded-lg shadow-sm p-3 hover:border-blue-400 transition">
                            <label class="block text-sm font-medium text-gray-700 flex items-center gap-2">
                                <i class="fas fa-file-alt text-blue-500"></i> {{ __($doc['label']) }}
                            </label>
                            <div class="mt-2 flex items-center space-x-3">
                                <input type="file"
                                    name="{{ $doc['name'] }}{{ $doc['multiple'] ?? false ? '[]' : '' }}"
                                    accept=".pdf" {{ $doc['required'] ?? false ? 'required' : '' }}
                                    class="hidden file-input"
                                    multiple="{{ $doc['multiple'] ?? false ? 'multiple' : '' }}"
                                    onchange="updateFileName(this, '{{ $doc['name'] }}Name')">

                                <!-- Upload Button -->
                                <button type="button"
                                    onclick="document.querySelector('[name={{ $doc['name'] }}{{ $doc['multiple'] ?? false ? '\[\]' : '' }}]').click()"
                                    class="px-4 py-1 text-sm bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 transition flex items-center gap-2">
                                    <i class="fas fa-cloud-upload-alt"></i> Choose File{{ $doc['multiple'] ?? false ? '(s)' : '' }}
                                </button>

                                <span id="{{ $doc['name'] }}Name" class="text-sm text-gray-600">No file selected</span>

                                <!-- Clear Button -->
                                <button type="button"
                                    onclick="clearFileInput('{{ $doc['name'] }}', '{{ $doc['name'] }}Name')"
                                    class="ml-2 text-red-500 hover:text-red-700 hidden clear-btn">
                                    <i class="fas fa-times-circle"></i>
                                </button>
                            </div>

                            @error($doc['name'])
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>

                <!-- Submit Button -->
                <div class="mt-6 flex justify-end">
                    <button type="submit"
                        class="px-5 py-1 text-sm bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 focus:ring focus:ring-blue-300 transition duration-200 flex items-center gap-2">
                        <i class="fas fa-save"></i> Upload Documents
                    </button>
                </div>
            </form>
        </div>

        <!-- Uploaded Documents -->
        <div class="mt-4 p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
            <h2 class="text-base font-semibold text-gray-900">{{ __('Uploaded Documents') }}</h2>

            <!-- Table for Desktop -->
            <div class="hidden md:block overflow-x-auto mt-4">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead class="bg-blue-50 border-gray-200">
                        <tr class="text-gray-700">
                            <th class="p-3 text-sm font-semibold text-left">Document Name</th>
                            <th class="p-3 text-sm font-semibold text-left">Category</th>
                            <th class="p-3 text-sm font-semibold text-left">Size</th>
                            <th class="p-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($documents as $document)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $document->label ?? 'Unknown' }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $document->category ?? 'N/A' }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ number_format(($document->size ?? 0) / 1024, 2) }} KB</td>
                                <td class="p-3 flex justify-center gap-4 text-sm text-gray-700 whitespace-nowrap">
                                    <a href="{{ Storage::url($document->file_path ?? '') }}" target="_blank" class="text-blue-600 hover:text-blue-700 flex items-center gap-1">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <form action="{{ route('documents.destroy', ['document' => $document->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this document?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 flex items-center gap-1">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="p-4 text-center text-gray-500"><div class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-3 rounded-lg shadow-md">
                                <h4 class="text-md font-semibold flex items-center space-x-2">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Information</span>
                                </h4>
                                <p class="mt-5 text-sm items-center text-center">{{ __('No Docuent Uploaded Yet. Please Upload') }} </p>
                            </div></td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Card View for Mobile -->
            <div class="md:hidden mt-4 space-y-4">
                @forelse($documents as $document)
                    <div class="p-4 border border-gray-300 rounded-lg shadow-sm bg-white">
                        <h3 class="text-sm font-semibold text-gray-900">{{ $document->label ?? 'Unknown' }}</h3>
                        <p class="text-xs text-gray-600">Category: {{ $document->category ?? 'N/A' }}</p>
                        <p class="text-xs text-gray-600">Size: {{ number_format(($document->size ?? 0) / 1024, 2) }} KB</p>
                        <div class="mt-2 flex justify-between text-sm">
                            <a href="{{ Storage::url($document->file_path ?? '') }}" target="_blank" class="text-blue-600 hover:text-blue-700 flex items-center gap-1">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <form action="{{ route('documents.destroy', ['document' => $document->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 flex items-center gap-1">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">No documents uploaded yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function updateFileName(input, displayId) {
        let fileNames = Array.from(input.files).map(file => file.name).join(", ");
        document.getElementById(displayId).textContent = fileNames || "No file selected";
    }
</script>
