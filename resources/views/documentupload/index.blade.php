<x-app-layout>
    <div class="py-6 container max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
            <!-- Section Header -->
            <h2 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                <i class="fas fa-upload text-blue-500"></i> {{ __('Upload Documents') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">{{ __('Upload required documents for your application.') }}</p>

            <div class="mt-4" x-data="fileUpload()">
                <!-- File Upload Section -->
                <div class="grid gap-6 md:grid-cols-2">
                    <template x-for="(doc, index) in documents" :key="index">
                        <div class="border p-4 rounded-lg shadow-sm bg-gray-50">
                            <label class="text-sm font-medium text-gray-700 block mb-2">
                                <i class="fas fa-file-alt text-gray-600"></i> <span x-text="doc.label"></span>
                            </label>

                            <!-- Drag & Drop & Click Area -->
                            <div
                                class="border-2 border-dashed border-gray-400 rounded-md p-4 relative bg-white cursor-pointer"
                                @dragover.prevent="doc.dragging = true"
                                @dragleave.prevent="doc.dragging = false"
                                @drop.prevent="handleDrop($event, index)">

                                <!-- Hidden File Input -->
                                <input type="file"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                    @change="handleFileUpload($event, index)"
                                    accept=".pdf,.jpg,.png,.docx"
                                />

                                <div class="text-center text-gray-500" x-show="!doc.file">
                                    <i class="fas fa-cloud-upload-alt text-2xl text-blue-600"></i>
                                    <p class="text-sm">Drag & drop or <span class="text-blue-500 font-semibold">click to upload</span></p>
                                </div>

                                <!-- File Preview & Upload Progress -->
                                <template x-if="doc.file">
                                    <div class="flex flex-col gap-2 mt-2">
                                        <div class="flex items-center justify-between p-2 bg-blue-100 rounded-md">
                                            <span class="text-sm truncate w-40" x-text="doc.file.name"></span>
                                            <i class="fas fa-times text-red-500 cursor-pointer"
                                                @click="removeFile(index)"></i>
                                        </div>

                                        <!-- Progress Bar -->
                                        <div class="w-full bg-gray-200 rounded-md h-2" x-show="doc.uploading">
                                            <div class="bg-blue-500 h-2 rounded-md transition-all duration-500 ease-in-out"
                                                 x-bind:style="'width:' + doc.progress + '%'">
                                            </div>
                                        </div>

                                        <!-- Cancel Button -->
                                        <button class="text-xs text-red-600 hover:underline"
                                            x-show="doc.uploading"
                                            @click="cancelUpload(index)">
                                            Cancel Upload
                                        </button>
                                    </div>
                                </template>
                            </div>

                            <!-- Status Message -->
                            <p class="text-xs mt-1" x-text="doc.statusMessage" :class="doc.statusClass"></p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fileUpload() {
            return {
                documents: [
                    { label: 'Application Letter', file: null, dragging: false, uploading: false, progress: 0, statusMessage: '', statusClass: '', cancel: null },
                    { label: 'Academic Certificates', file: null, dragging: false, uploading: false, progress: 0, statusMessage: '', statusClass: '', cancel: null },
                    { label: 'ID / Passport', file: null, dragging: false, uploading: false, progress: 0, statusMessage: '', statusClass: '', cancel: null },
                    { label: 'Additional Documents (Optional)', file: null, dragging: false, uploading: false, progress: 0, statusMessage: '', statusClass: '', cancel: null }
                ],
                handleFileUpload(event, index) {
                    const file = event.target.files[0];
                    if (file) this.uploadFile(file, index);
                },
                handleDrop(event, index) {
                    event.preventDefault();
                    const file = event.dataTransfer.files[0];
                    if (file) this.uploadFile(file, index);
                },
                uploadFile(file, index) {
                    const validTypes = ['application/pdf', 'image/jpeg', 'image/png', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

                    if (!validTypes.includes(file.type)) {
                        this.documents[index].statusMessage = 'Invalid file type';
                        this.documents[index].statusClass = 'text-red-500';
                        return;
                    }
                    if (file.size > 5 * 1024 * 1024) {
                        this.documents[index].statusMessage = 'File too large (max 5MB)';
                        this.documents[index].statusClass = 'text-red-500';
                        return;
                    }

                    // Assign the file
                    this.documents[index].file = file;
                    this.documents[index].statusMessage = 'Uploading...';
                    this.documents[index].statusClass = 'text-blue-500';
                    this.documents[index].uploading = true;
                    this.documents[index].progress = 0;

                    // Simulating upload progress
                    this.simulateUpload(index);
                },
                simulateUpload(index) {
                    let progress = 0;
                    this.documents[index].cancel = setInterval(() => {
                        if (progress >= 100) {
                            clearInterval(this.documents[index].cancel);
                            this.documents[index].uploading = false;
                            this.documents[index].statusMessage = 'Upload complete';
                            this.documents[index].statusClass = 'text-green-500';
                        } else {
                            progress += 10;
                            this.documents[index].progress = progress;
                        }
                    }, 500);
                },
                cancelUpload(index) {
                    if (this.documents[index].cancel) {
                        clearInterval(this.documents[index].cancel);
                        this.documents[index].uploading = false;
                        this.documents[index].progress = 0;
                        this.documents[index].statusMessage = 'Upload canceled';
                        this.documents[index].statusClass = 'text-red-500';
                    }
                },
                removeFile(index) {
                    if (this.documents[index].uploading) {
                        this.cancelUpload(index);
                    }
                    this.documents[index].file = null;
                    this.documents[index].statusMessage = '';
                    this.documents[index].statusClass = '';
                }
            };
        }
    </script>
</x-app-layout>
