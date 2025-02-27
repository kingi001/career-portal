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

                            <!-- Drag & Drop Area -->
                            <div class="border-2 border-dashed border-gray-400 rounded-md p-4 relative cursor-pointer bg-white"
                                @dragover.prevent="doc.dragging = true" @dragleave.prevent="doc.dragging = false"
                                @drop.prevent="handleDrop($event, index)" @click="$refs['fileInput' + index].click()">
                                <input type="file" class="hidden" x-ref="fileInput"
                                    @change="handleFileUpload($event, index)" accept=".pdf,.jpg,.png,.docx" />
                                <div class="text-center text-gray-500" x-show="!doc.file">
                                    <i class="fas fa-cloud-upload-alt text-2xl text-blue-600"></i>
                                    <p class="text-sm">Drag & drop or <span class="text-blue-500 font-semibold">click to
                                            upload</span></p>
                                </div>
                                <template x-if="doc.file">
                                    <div class="flex items-center justify-between p-2 bg-blue-100 mt-2 rounded-md">
                                        <span class="text-sm truncate w-40" x-text="doc.file.name"></span>
                                        <i class="fas fa-times text-red-500 cursor-pointer"
                                            @click="removeFile(index)"></i>
                                    </div>
                                </template>
                            </div>

                            <!-- Progress Bar -->
                            <div class="w-full bg-gray-200 rounded-md mt-2 h-2" x-show="doc.uploading">
                                <div class="bg-blue-500 h-2 rounded-md" x-bind:style="'width:' + doc.progress + '%'">
                                </div>
                            </div>

                            <!-- Status Indicator -->
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
                documents: [{
                        label: 'Application Letter',
                        file: null,
                        dragging: false,
                        uploading: false,
                        progress: 0,
                        statusMessage: '',
                        statusClass: ''
                    },
                    {
                        label: 'Academic Certificates',
                        file: null,
                        dragging: false,
                        uploading: false,
                        progress: 0,
                        statusMessage: '',
                        statusClass: ''
                    },
                    {
                        label: 'ID / Passport',
                        file: null,
                        dragging: false,
                        uploading: false,
                        progress: 0,
                        statusMessage: '',
                        statusClass: ''
                    },
                    {
                        label: 'Additional Documents (Optional)',
                        file: null,
                        dragging: false,
                        uploading: false,
                        progress: 0,
                        statusMessage: '',
                        statusClass: ''
                    }
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
                    const validTypes = ['application/pdf', 'image/jpeg', 'image/png',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                    ];
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
                    this.documents[index].file = file;
                    this.documents[index].uploading = true;
                    this.documents[index].statusMessage = 'Uploading...';
                    this.documents[index].statusClass = 'text-blue-500';

                    let progressInterval = setInterval(() => {
                        if (this.documents[index].progress < 100) {
                            this.documents[index].progress += 10;
                        } else {
                            clearInterval(progressInterval);
                            this.documents[index].uploading = false;
                            this.documents[index].statusMessage = 'Upload successful';
                            this.documents[index].statusClass = 'text-green-500';
                        }
                    }, 300);
                },
                removeFile(index) {
                    this.documents[index].file = null;
                    this.documents[index].progress = 0;
                    this.documents[index].statusMessage = '';
                }
            };
        }
    </script>
</x-app-layout>
