<x-app-layout>
    <div class="py-6 container max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
            <!-- Section Header -->
            <h2 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                <i class="fas fa-upload text-blue-500"></i> {{ __('Upload Documents') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">{{ __('Upload required documents for your application.') }}</p>

            <div class="mt-4" x-data="fileUpload()" @submit.prevent="submitForm">
                <form id="document-upload-form" enctype="multipart/form-data">
                    <!-- File Upload Section -->
                    <div class="grid gap-6 md:grid-cols-2">
                        <template x-for="(doc, index) in documents" :key="index">
                            <div class="border p-4 rounded-lg shadow-sm bg-gray-50">
                                <label class="text-sm font-medium text-gray-700 block mb-2">
                                    <i class="fas fa-file-alt text-gray-600"></i> <span x-text="doc.label"></span>
                                </label>

                                <!-- Academic Certificate Type Selector -->
                                <template x-if="doc.category === 'academic'">
                                    <div class="mb-2">
                                        <label class="text-xs text-gray-700">Select Certificate Type</label>
                                        <select class="w-full border rounded-md p-2 text-sm" x-model="doc.certificateType">
                                            <option value="">Select Type</option>
                                            <option value="Masters">Phd</option>
                                            <option value="Masters">Masters</option>
                                            <option value="Degree">Degree</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Certificate">Certificate</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </template>

                                <!-- Drag & Drop & Click Area -->
                                <div class="border-2 border-dashed border-gray-400 rounded-md p-4 relative bg-white cursor-pointer"
                                    @dragover.prevent="doc.dragging = true"
                                    @dragleave.prevent="doc.dragging = false"
                                    @drop.prevent="handleDrop($event, index)">

                                    <!-- Hidden File Input -->
                                    <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        @change="handleFileUpload($event, index)" accept=".pdf,.jpg,.png,.docx"
                                        :name="'documents['+index+']'"/>

                                    <div class="text-center text-gray-500" x-show="!doc.file">
                                        <i class="fas fa-cloud-upload-alt text-2xl text-blue-600"></i>
                                        <p class="text-sm">Drag & drop or <span class="text-blue-500 font-semibold">click to upload</span></p>
                                    </div>

                                    <!-- File Preview -->
                                    <template x-if="doc.file">
                                        <div class="flex flex-col gap-2 mt-2">
                                            <div class="flex items-center justify-between p-2 bg-blue-100 rounded-md">
                                                <span class="text-sm truncate w-40" x-text="doc.file.name"></span>
                                                <i class="fas fa-times text-red-500 cursor-pointer" @click="removeFile(index)"></i>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Buttons to Add More Certificates -->
                    <div class="mt-4 flex gap-4">
                        <button type="button" @click="addDocument('academic')" class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
                            Add Academic Certificate
                        </button>
                        <button type="button" @click="addDocument('professional')" class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded hover:bg-green-700">
                            Add Professional Certificate
                        </button>
                        <button type="button" @click="addDocument('membership')" class="px-4 py-2 text-sm font-semibold text-white bg-purple-600 rounded hover:bg-purple-700">
                            Add Membership Certificate
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
                documents: [
                    { label: 'Application Letter', category: 'other', file: null },
                    { label: 'ID / Passport', category: 'other', file: null },
                    { label: 'Academic Certificate', category: 'academic', file: null, certificateType: '' },
                    { label: 'Professional Certificate', category: 'professional', file: null },
                    { label: 'Membership Certificate', category: 'membership', file: null }
                ],
                addDocument(type) {
                    let label = type === 'academic' ? 'Academic Certificate' :
                                type === 'professional' ? 'Professional Certificate' :
                                'Membership Certificate';

                    this.documents.push({ label, category: type, file: null, certificateType: type === 'academic' ? '' : undefined });
                },
                handleFileUpload(event, index) {
                    const file = event.target.files[0];
                    if (file) this.documents[index].file = file;
                },
                handleDrop(event, index) {
                    event.preventDefault();
                    const file = event.dataTransfer.files[0];
                    if (file) this.documents[index].file = file;
                },
                removeFile(index) {
                    this.documents.splice(index, 1);
                },
                submitForm() {
                    let formData = new FormData(document.getElementById('document-upload-form'));

                    // Add dynamically uploaded files
                    this.documents.forEach((doc, index) => {
                        if (doc.file) {
                            formData.append(`documents[${index}]`, doc.file);
                            if (doc.category === 'academic') {
                                formData.append(`certificateType[${index}]`, doc.certificateType);
                            }
                        }
                    });

                    fetch(" ", {
                        method: "POST",
                        body: formData,
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    }).then(response => response.json())
                      .then(data => {
                          alert("Documents uploaded successfully!");
                          location.reload();
                      })
                      .catch(error => console.error("Error:", error));
                }
            };
        }
    </script>
</x-app-layout>
