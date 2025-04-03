<x-app-layout>
    @if (session('education_update_success'))
        <div id="toast-success"
            class="fixed top-0 right-0 flex flex-col w-full max-w-xs p-2 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800 z-50"
            role="alert">

            <div class="flex items-center mb-2">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5 animate-check" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">Academic Qualification Updated Successfully.</div>
            </div>

            <!-- Progress Bar Below Content -->
            <div id="progress-bar" class="w-full h-1 bg-green-200 rounded-lg mt-2">
                <div id="progress" class="h-full bg-green-500 rounded-lg" style="width: 0;"></div>
            </div>

            <button type="button" id="close-toast-btn"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <style>
        @keyframes checkAnimation {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            50% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .animate-check {
            animation: checkAnimation 2s ease-out forwards;
        }

        #toast-success {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        #toast-success.hidden {
            opacity: 0;
            transform: translateY(-10px);
        }
    </style>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const closeToastButton = document.getElementById("close-toast-btn");
            const toast = document.getElementById("toast-success");
            const progressBar = document.getElementById("progress");

            if (toast) {
                let progress = 0;
                const duration = 500; // 500ms (half a second)
                const intervalTime = 1; // Faster interval (2ms)
                const totalSteps = duration / intervalTime;

                const interval = setInterval(() => {
                    if (progress >= 100) {
                        clearInterval(interval);
                        setTimeout(() => {
                            toast.classList.add(
                            "hidden"); // Hide the toast after progress bar finishes
                        }, 200); // Allow some delay to see the complete progress
                    } else {
                        progress += 100 / totalSteps;
                        progressBar.style.width = progress + "%";
                    }
                }, intervalTime);

                if (closeToastButton) {
                    closeToastButton.addEventListener("click", function() {
                        toast.classList.add("hidden"); // Hide the toast when close button is clicked
                    });
                }
            }
        });
    </script>








    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">

            <!-- Section Title -->
            <h2 class="text-base font-medium text-indigo-700 flex items-center gap-1">
                <i class="fas fa-graduation-cap text-blue-500 text-xl"></i>
                {{ __('Academic Qualifications') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Please provide your educational information with the most recent.') }}
            </p>



            <!-- Desktop Table View -->
            <div class="overflow-auto rounded-lg shadow-md mt-4 hidden md:block">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-blue-50 border-b-2 border-gray-200">
                        <tr class="text-gray-700">
                            <th class="p-3 text-sm font-medium text-center">
                                <i class="fas fa-hashtag"></i>
                            </th>
                            <th class="p-3 text-sm font-semibold text-left">Institution</th>
                            <th class="p-3 text-sm font-semibold text-left">Qualification</th>
                            <th class="p-3 text-sm font-semibold text-left">Course</th>
                            <th class="p-3 text-sm font-semibold text-left">Award</th>
                            <th class="p-3 text-sm font-semibold text-left">Duration</th>
                            <th class="p-3 text-sm font-semibold text-left">Certificate</th>
                            <th class="p-3 text-sm font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($educations as $education)
                            <tr class="hover:bg-gray-50 transition-colors border-b">
                                <td class="p-3 text-sm text-gray-800 text-center">{{ $loop->iteration }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-school text-gray-500"></i> {{ $education->institution }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-graduation-cap text-gray-500"></i> {{ $education->level_of_study }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-book text-gray-500"></i> {{ $education->field_of_study }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $education->award }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($education->start_date)->format('m/Y') }} -
                                    {{ \Carbon\Carbon::parse($education->end_date)->format('m/Y') }}
                                </td>

                                <!-- Certificate Column -->
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    @if ($education->academic_document)
                                        <a href="{{ asset('storage/' . $education->academic_document) }}"
                                            target="_blank"
                                            class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                            <i class="fas fa-file-pdf"></i> View
                                        </a>
                                    @else
                                        <span class="text-gray-400">No file</span>
                                    @endif
                                </td>

                                <td
                                    class="p-3 text-sm text-gray-700 whitespace-nowrap flex items-center gap-3 justify-center">
                                    <!-- Edit Button -->
                                    <button
                                        @click="$dispatch('open-modal', { modal: 'edit-education', education: {{ json_encode($education) }} })"
                                        class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- Delete Button -->
                                    <form id="delete-form-{{ $education->id }}"
                                        action="{{ route('education.destroy', $education->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                            onclick="confirmDelete({{ $education->id }})">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-4 text-center">
                                    <div
                                        class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-3 rounded-lg shadow-md">
                                        <h4 class="text-md font-semibold flex items-center justify-center space-x-2">
                                            <i class="fas fa-info-circle"></i>
                                            <span>Information</span>
                                        </h4>
                                        <p class="mt-1 text-sm">No Academic Qualification Details Found.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>



            <!-- Mobile View (Stacked Cards) -->
            <div class="mt-4 space-y-4 md:hidden">
                @forelse ($educations as $education)
                    <div
                        class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <h3 class="text-md font-semibold text-gray-900 flex items-center gap-2">
                                <i class="fas fa-school text-blue-500"></i> {{ $education->institution }}
                            </h3>
                            @if ($education->academic_document)
                                <a href="{{ asset('storage/' . $education->academic_document) }}" target="_blank"
                                    class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out text-sm">
                                    <i class="fas fa-file-pdf"></i> View
                                </a>
                            @endif
                        </div>

                        <div class="mt-2 text-sm text-gray-600 space-y-1">
                            <p class="flex items-center gap-2">
                                <i class="fas fa-graduation-cap text-gray-500"></i> <span
                                    class="font-medium">{{ $education->level_of_study }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <i class="fas fa-book text-gray-500"></i> <span>{{ $education->field_of_study }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <i class="fas fa-award text-gray-500"></i> <span>{{ $education->award }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <i class="fas fa-calendar-alt text-gray-500"></i>
                                <span>
                                    {{ \Carbon\Carbon::parse($education->start_date)->format('Y') }} -
                                    {{ \Carbon\Carbon::parse($education->end_date)->format('Y') }}
                                </span>
                            </p>
                        </div>
                        <div class="flex justify-between items-center mt-3 space-x-4">
                            <button
                                @click="$dispatch('open-modal', { modal: 'edit-education', education: {{ json_encode($education) }} })"
                                class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form id="delete-form-{{ $education->id }}"
                                action="{{ route('education.destroy', $education->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                    onclick="confirmDelete({{ $education->id }})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-3 rounded-lg shadow-md">
                        <h4 class="text-md font-semibold flex items-center space-x-2">
                            <i class="fas fa-info-circle"></i>
                            <span>Information</span>
                        </h4>
                        <p class="mt-5 text-sm items-center text-center">
                            {{ __('No Academic Qualification Details.Click Add') }} </p>
                    </div>
                @endforelse
            </div>
            <!-- Add Education Button -->
            @include('education.academic-qualifications.modals.add-education')
            @include('education.academic-qualifications.modals.edit-education')
        </div>
    </div>
</x-app-layout>
