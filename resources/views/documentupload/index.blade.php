<x-app-layout>
    <div class="py-6 container max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
            <h2 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                <i class="fas fa-upload text-blue-500"></i> {{ __('Upload Documents') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">{{ __('Upload required documents for your application (PDF only).') }}
            </p>

            <div class="mt-4" x-data="fileUpload()" @submit.prevent="submitForm">
                <form id="document-upload-form" enctype="multipart/form-data">
                    <div class="grid gap-6 md:grid-cols-2">
                        <template x-for="(doc, index) in documents" :key="index">
                            <div class="border p-4 rounded-lg shadow-sm bg-gray-50 relative">
                                <!-- Remove Button -->
                                <template x-if="doc.removable">
                                    <button type="button" @click="removeFile(index)"
                                        class="absolute top-2 right-2 text-red-500 hover:text-red-700 text-lg font-bold">✖</button>
                                </template>

                                <label class="text-sm font-medium text-gray-700 block mb-2">
                                    <i class="fas fa-file-alt text-gray-600"></i>
                                    <span x-text="doc.label"></span> (PDF Only)
                                </label>

                                <!-- Academic Certificate Type Dropdown -->
                                <template x-if="doc.category === 'academic'">
                                    <select x-model="doc.certificateType"
                                        class="w-full border-gray-300 rounded-md text-sm shadow-sm p-2 mb-2 focus:ring focus:ring-blue-200">
                                        <option value="" class="text-gray-500 text-sm font-medium">Select
                                            Certificate Type</option>
                                        <option value="PhD">PhD</option>
                                        <option value="Masters">Masters</option>
                                        <option value="Degree">Degree</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="KCSE">KCSE</option>
                                        <option value="KCSE">KCPE</option>




                                    </select>
                                </template>

                                <!-- File Upload Section -->
                                <div class="border-2 border-dashed border-gray-400 rounded-md p-4 relative bg-white cursor-pointer"
                                    @dragover.prevent="doc.dragging = true" @dragleave.prevent="doc.dragging = false"
                                    @drop.prevent="handleDrop($event, index)">

                                    <input type="file"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        @change="handleFileUpload($event, index)" accept=".pdf"
                                        :name="'documents[' + index + ']'" />

                                    <div class="text-center text-gray-500" x-show="!doc.file">
                                        <i class="fas fa-cloud-upload-alt text-2xl text-blue-600"></i>
                                        <p class="text-sm">Drag & drop or <span
                                                class="text-blue-500 font-semibold">click to upload</span></p>
                                    </div>

                                    <!-- File Preview -->
                                    <template x-if="doc.file">
                                        <div class="mt-2">
                                            <div class="flex items-center justify-between p-2 bg-blue-100 rounded-md">
                                                <span class="text-sm truncate w-40" x-text="doc.file.name"></span>
                                                <i class="fas fa-times text-red-500 cursor-pointer"
                                                    @click="removeFile(index)"></i>
                                            </div>

                                            <!-- Upload Progress Bar -->
                                            <div class="mt-2">
                                                <div class="w-full bg-gray-200 rounded-full h-2">
                                                    <div class="bg-blue-500 h-2 rounded-full transition-all duration-300"
                                                        :style="'width: ' + doc.progress + '%'"></div>
                                                </div>
                                                <p class="text-xs text-gray-600 mt-1" x-text="doc.progress + '%'"></p>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <!-- Error Message -->
                                <p class="text-red-500 text-xs mt-2" x-show="doc.error" x-text="doc.error"></p>
                            </div>
                        </template>
                    </div>

                    <!-- Buttons to Add More Certificates -->
                    <!-- Buttons to Add More Certificates -->
                    <div class="mt-4 flex flex-col md:flex-row justify-center gap-4 md:gap-6">
                        <button type="button" @click="addDocument('academic')"
                            class="flex items-center justify-center gap-2 w-full md:w-auto px-5 py-3 text-sm font-semibold text-white
               bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg shadow-md
               hover:from-blue-600 hover:to-blue-800 transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-graduation-cap"></i> Add Academic Certificate
                        </button>

                        <button type="button" @click="addDocument('professional')"
                            class="flex items-center justify-center gap-2 w-full md:w-auto px-5 py-3 text-sm font-semibold text-white
               bg-gradient-to-r from-green-500 to-green-700 rounded-lg shadow-md
               hover:from-green-600 hover:to-green-800 transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-briefcase"></i> Add Professional Certificate
                        </button>

                        <button type="button" @click="addDocument('membership')"
                            class="flex items-center justify-center gap-2 w-full md:w-auto px-5 py-3 text-sm font-semibold text-white
               bg-gradient-to-r from-purple-500 to-purple-700 rounded-lg shadow-md
               hover:from-purple-600 hover:to-purple-800 transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-id-card"></i> Add Membership Certificate
                        </button>
                    </div>


                    <!-- Submit Button -->
                    <div class="mt-6 flex justify-center">
                        <button type="submit"
                            class="px-8 py-3 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-800
                                   hover:from-blue-700 hover:to-blue-900 shadow-lg rounded-full transition-all duration-300
                                   transform hover:scale-105">
                            <i class="fas fa-save mr-2"></i> Save Documents
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function fileUpload() {
            return {
                documents: [{
                        label: 'Application Letter',
                        category: 'other',
                        file: null,
                        progress: 0,
                        removable: false,
                        error: ''
                    },
                    {
                        label: 'ID / Passport',
                        category: 'other',
                        file: null,
                        progress: 0,
                        removable: false,
                        error: ''
                    },
                    {
                        label: 'Academic Certificate',
                        category: 'academic',
                        file: null,
                        progress: 0,
                        removable: false,
                        error: '',
                        certificateType: ''
                    },
                    {
                        label: 'Professional Certificate',
                        category: 'professional',
                        file: null,
                        progress: 0,
                        removable: false,
                        error: ''
                    },
                    {
                        label: 'Membership Certificate',
                        category: 'membership',
                        file: null,
                        progress: 0,
                        removable: false,
                        error: ''
                    }
                ],
                addDocument(type) {
                    let label = type === 'academic' ? 'Academic Certificate' :
                        type === 'professional' ? 'Professional Certificate' :
                        'Membership Certificate';

                    this.documents.push({
                        label,
                        category: type,
                        file: null,
                        progress: 0,
                        removable: true,
                        error: '',
                        certificateType: type === 'academic' ? '' : undefined
                    });
                },
                handleFileUpload(event, index) {
                    const file = event.target.files[0];
                    if (!this.validateFile(file, index)) return;

                    this.documents[index].file = file;
                    this.uploadFile(index);
                },
                handleDrop(event, index) {
                    event.preventDefault();
                    const file = event.dataTransfer.files[0];
                    if (!this.validateFile(file, index)) return;

                    this.documents[index].file = file;
                    this.uploadFile(index);
                },
                validateFile(file, index) {
                    if (file.type !== "application/pdf") {
                        this.documents[index].error = "Only PDF files are allowed.";
                        this.documents[index].file = null;
                        return false;
                    }
                    this.documents[index].error = "";
                    return true;
                },
                uploadFile(index) {
                    let progress = 0;
                    const interval = setInterval(() => {
                        if (progress >= 100) {
                            clearInterval(interval);
                        }
                        this.documents[index].progress = progress;
                        progress += 10;
                    }, 300);
                },
                removeFile(index) {
                    this.documents.splice(index, 1);
                },
                submitForm() {
                    alert("Documents uploaded successfully!");
                }
            };
        }
    </script>
</x-app-layout>
