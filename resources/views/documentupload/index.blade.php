<x-app-layout>
    <div class="py-6 container max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
            <h2 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                <i class="fas fa-upload text-blue-500"></i> {{ __('Upload Documents') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">{{ __('Upload required documents for your application (PDF only).') }}
            </p>
            <div class="mt-4" x-data="fileUpload()">
                <form id="document-upload-form" action="{{ route('documents.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-6 md:grid-cols-2">
                        <template x-for="(doc, index) in documents" :key="index">
                            <div class="border p-4 rounded-lg shadow-sm bg-gray-50 relative">
                                <button type="button" @click="removeFile(index)" x-show="doc.removable"
                                    class="absolute top-2 right-2 text-red-500 hover:text-red-700 text-lg font-bold">✖</button>

                                <label class="text-sm font-medium text-gray-700 block mb-2">
                                    <i class="fas fa-file-alt text-gray-600"></i>
                                    <span x-text="doc.label"></span> (PDF Only)
                                </label>

                                <input type="hidden" :name="'labels[' + index + ']'" x-model="doc.label">
                                <input type="hidden" :name="'categories[' + index + ']'" x-model="doc.category">

                                <select x-show="doc.category === 'academic'" :name="'certificate_types[' + index + ']'"
                                    x-model="doc.certificateType"
                                    class="w-full border-gray-300 rounded-md text-sm shadow-sm p-2 mb-2 focus:ring focus:ring-blue-200">
                                    <option value="">Select Certificate Type</option>
                                    <option value="PhD">PhD</option>
                                    <option value="Masters">Masters</option>
                                    <option value="Degree">Degree</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="KCSE">KCSE</option>
                                    <option value="KCPE">KCPE</option>
                                </select>

                                <div class="border-2 border-dashed border-gray-400 rounded-md p-4 bg-white cursor-pointer"
                                    @dragover.prevent="doc.dragging = true" @dragleave.prevent="doc.dragging = false"
                                    @drop.prevent="handleDrop($event, index)">

                                    <input type="file"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        @change="handleFileUpload($event, index)" accept=".pdf"
                                        :name="'documents[' + index + ']'" required>

                                    <div class="text-center text-gray-500" x-show="!doc.file">
                                        <i class="fas fa-cloud-upload-alt text-2xl text-blue-600"></i>
                                        <p class="text-sm">Drag & drop or <span
                                                class="text-blue-500 font-semibold">click to upload</span></p>
                                    </div>

                                    <template x-if="doc.file">
                                        <div class="mt-2">
                                            <div class="flex items-center justify-between p-2 bg-blue-100 rounded-md">
                                                <span class="text-sm truncate w-40" x-text="doc.file.name"></span>
                                                <i class="fas fa-times text-red-500 cursor-pointer"
                                                    @click="removeFile(index)"></i>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <p class="text-red-500 text-xs mt-2" x-show="doc.error" x-text="doc.error"></p>
                            </div>
                        </template>
                    </div>

                    <!---------------------------------------------------Add Buttons---------------------------------------------------------->

                    <div class="mt-6 flex flex-wrap gap-3 sm:gap-6 justify-center text-sm">
                        <button type="button" @click="addDocument('academic')"
                            class="flex items-center gap-2 px-5 py-2 rounded-lg text-white text-sm sm:text-sm font-medium transition
                                   bg-blue-600 hover:bg-blue-700 shadow-md hover:shadow-lg">
                            <i class="fas fa-graduation-cap text-sm"></i> Add Academic Certificate
                        </button>

                        <button type="button" @click="addDocument('professional')"
                            class="flex items-center gap-2 px-5 py-2 rounded-lg text-white text-sm sm:text-sm font-medium transition
                                   bg-green-600 hover:bg-green-700 shadow-md hover:shadow-lg">
                            <i class="fas fa-briefcase text-sm"></i> Add Professional Certificate
                        </button>

                        <button type="button" @click="addDocument('membership')"
                            class="flex items-center gap-2 px-5 py-2 rounded-lg text-white text-sm sm:text-sm font-medium transition
                                   bg-purple-600 hover:bg-purple-700 shadow-md hover:shadow-lg">
                            <i class="fas fa-id-card text-sm"></i> Add Membership Certificate
                        </button>
                    </div>

                    <div class="mt-7 flex justify-center text-sm">
                        <button type="submit"
                            class="flex items-center gap-2 px-5 py-2.5 rounded-lg text-white text-sm sm:text-sm font-medium transition
                                   bg-blue-600 hover:bg-blue-700 active:bg-blue-800 shadow-md hover:shadow-lg">
                            <i class="fas fa-save text-lg"></i> Save Documents
                        </button>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto mt-4 rounded-lg shadow-lg border border-gray-200">
                <table class="min-w-full bg-white rounded-lg hidden md:table">
                    <thead class="bg-blue-400 text-white text-sm sm:text-sm">
                        <tr>
                            <th class="p-3 text-sm text-left">#</th>
                            <th class="p-3 text-left">Document</th>
                            <th class="p-3 text-left">Category</th>
                            <th class="p-3 text-left">Size</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $index => $document)
                            <tr class="border-b text-sm sm:text-sm transition hover:bg-blue-50 even:bg-gray-50">
                                <td class="p-3 text-gray-700 font-semibold">{{ $index + 1 }}</td>
                                <td class="p-3 flex items-center gap-2">
                                    <i class="fas fa-file-pdf text-red-500"></i>
                                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank"
                                        class="text-blue-600 hover:underline truncate max-w-[150px] sm:max-w-none">
                                        {{ $document->label }}
                                    </a>
                                </td>
                                <td class="p-3 capitalize text-gray-700">{{ $document->category }}</td>
                                <td class="p-3 text-gray-700">
                                    100 KB
                                </td>
                                <td class="p-3 text-gray-700 font-semibold text-yellow-600"><span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                </td>
                                <td class="p-3">
                                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST"
                                        onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-800 bg-red-100 hover:bg-red-200 px-2 py-1 rounded-md transition">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Mobile Card View -->
                <div class="md:hidden">
                    @foreach ($documents as $index => $document)
                        <div class="bg-white rounded-lg shadow-md p-4 mb-4 border border-gray-200">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700 font-semibold">#{{ $index + 1 }}</span>
                                <span class="text-sm text-yellow-600 font-semibold">Pending</span>
                            </div>
                            <div class="mt-2">
                                <p class="text-sm text-gray-700"><strong>Document:</strong>
                                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        {{ $document->label }}
                                    </a>
                                </p>
                                <p class="text-sm text-gray-700"><strong>Category:</strong> {{ $document->category }}
                                </p>
                                <p class="text-sm text-gray-700"><strong>Size:</strong>
                                    {{-- {{ number_format(Storage::size($document->file_path) / 1024, 2) }} KB --}}
                                </p>
                            </div>
                            <div class="mt-3 flex justify-end">
                                <form action="{{ route('documents.destroy', $document->id) }}" method="POST"
                                    onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 bg-red-100 hover:bg-red-200 px-3 py-1 rounded-md transition">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <script>
        function fileUpload() {
            return {
                documents: [{
                        label: 'Application Letter',
                        category: 'Letter',
                        file: null,
                        removable: false,
                        error: ''
                    },
                    {
                        label: 'ID / Passport',
                        category: 'Identification',
                        file: null,
                        removable: false,
                        error: ''
                    }
                ],
                addDocument(type) {
                    let label = type.charAt(0).toUpperCase() + type.slice(1) + ' Certificate';
                    this.documents.push({
                        label,
                        category: type,
                        file: null,
                        removable: true,
                        error: '',
                        certificateType: type === 'academic' ? '' : undefined
                    });
                },
                handleFileUpload(event, index) {
                    const file = event.target.files[0];
                    if (file.type !== 'application/pdf') {
                        this.documents[index].error = 'Only PDF files are allowed.';
                        return;
                    }
                    this.documents[index].file = file;
                    this.documents[index].error = '';
                },
                handleDrop(event, index) {
                    event.preventDefault();
                    this.handleFileUpload({
                        target: {
                            files: event.dataTransfer.files
                        }
                    }, index);
                },
                removeFile(index) {
                    this.documents.splice(index, 1);
                }
            };
        }
    </script>
</x-app-layout>
