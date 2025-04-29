<x-app-layout>
    @if (session('verification_success'))
        <div id="toast-success"
            class="fixed top-0 right-0 flex flex-col w-full max-w-xs p-2 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800 z-50"
            role="alert">

            <div class="flex items-center mb-2">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                    <svg class="w-5 h-5 animate-check" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">Verification Successful.</div>
            </div>

            <!-- Progress Bar Below Content -->
            <div id="progress-bar" class="w-full h-1 bg-blue-200 rounded-lg mt-2">
                <div id="progress" class="h-full bg-blue-500 rounded-lg" style="width: 0;"></div>
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
            animation: checkAnimation 1s ease-out forwards;
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
    <div class="py-3 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Main Content -->
            <main class="col-span-4 bg-white p-4 rounded-lg shadow-md">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <!-- Active Applications -->
                    <div
                        class="p-5 bg-blue-100 rounded-lg shadow-md flex items-center gap-3 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <i class="fas fa-check-circle text-blue-600 text-2xl"></i>
                        <div>
                            <h3 class="font-bold text-blue-900 text-lg">Active Applications</h3>
                            <p class="text-sm text-gray-700 mt-1">There are <span class="font-semibold">3</span>
                                active/open
                                applications.</p>
                        </div>
                    </div>
                    <!-- Jobs Applied -->
                    <div
                        class="p-5 bg-green-100 rounded-lg shadow-md flex items-center gap-3 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <i class="fas fa-clipboard-check text-green-600 text-2xl"></i>
                        <div>
                            <h3 class="font-bold text-green-900 text-lg">Jobs Applied</h3>
                            <p class="text-sm text-gray-700 mt-1">You have <span class="font-semibold">1</span> applied
                                job.</p>
                        </div>
                    </div>

                    <!-- Application Status -->
                    <div
                        class="p-5 bg-yellow-100 rounded-lg shadow-md flex items-center gap-3 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <i class="fas fa-paper-plane text-yellow-600 text-2xl"></i>
                        <div>
                            <h3 class="font-bold text-yellow-900 text-lg">Application Status</h3>
                            <p class="text-sm text-gray-700 mt-1">Application received.</p>
                        </div>
                    </div>
                </div>
                <!-- Main Dashboard -->
                <main class="max-w-7xl mx-auto px-4 mt-6">
                    <!-- Stats Overview -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white shadow rounded-xl p-4 border-l-4 border-blue-600">
                            <h3 class="text-sm text-gray-500">Total Applications</h3>
                            <p class="text-2xl font-bold text-blue-800">1</p>
                        </div>
                        <div class="bg-white shadow rounded-xl p-4 border-l-4 border-yellow-500">
                            <h3 class="text-sm text-gray-500">Pending</h3>
                            <p class="text-2xl font-bold text-yellow-600">1</p>
                        </div>
                        <div class="bg-white shadow rounded-xl p-4 border-l-4 border-green-500">
                            <h3 class="text-sm text-gray-500">Shortlisted</h3>
                            <p class="text-2xl font-bold text-green-600">0</p>
                        </div>
                        <div class="bg-white shadow rounded-xl p-4 border-l-4 border-red-500">
                            <h3 class="text-sm text-gray-500">Rejected</h3>
                            <p class="text-2xl font-bold text-red-600">0</p>
                        </div>
                    </div>

                </main>
        </div>
    </div>
    <!---------------------------------------------------job listings-------------------------------------->
    <div class="py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <!-- Header -->
                <div class="p-2 text-base font-semibold text-indigo-700 border-b border-gray-100 flex items-center">
                    <i class="fas fa-briefcase text-blue-600 mr-2"></i>
                    {{ __('Job Listings') }}
                </div>

                <!-- Desktop Table View -->
                <div class="overflow-x-auto hidden md:block">
                    <table class="w-full border-collapse text-sm">
                        <thead class="bg-indigo-50 text-indigo-800 uppercase text-xs font-semibold tracking-wider">
                            <tr>
                                <th class="text-left px-4 py-3">Ref No</th>
                                <th class="text-left px-4 py-3">Position</th>
                                <th class="text-left px-4 py-3">Description</th>
                                <th class="text-left px-4 py-3">Posted</th>
                                <th class="text-left px-4 py-3">Deadline</th>
                                <th class="text-left px-4 py-3">Status</th>
                                <th class="text-left px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            <!-- Open Job Row -->
                            <tr class="hover:bg-gray-50 transition duration-200">
                                <td class="px-4 py-3 font-semibold text-blue-600 whitespace-nowrap">
                                    <a href="#">BMA/ICT_II</a>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">ICT Officer II</td>
                                <td class="px-4 py-3">BSc in IT, Computer Science & 2 years experience.</td>
                                <td class="px-4 py-3 whitespace-nowrap">02/03/2025</td>
                                <td class="px-4 py-3 whitespace-nowrap">15/05/2025</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-bold text-green-700 bg-green-100 rounded-full border border-green-300">
                                        Open
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <a href="#"
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow hover:from-blue-700 hover:to-blue-900 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <i class="fas fa-paper-plane mr-2"></i> Apply
                                    </a>
                                </td>
                            </tr>

                            <!-- Closed Job Row -->
                            <tr class="bg-gray-50 hover:bg-gray-100 transition duration-200">
                                <td class="px-4 py-3 font-semibold text-blue-600 whitespace-nowrap">
                                    <a href="#">BMA/SNCLOUD_ENG</a>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">Senior Cloud Engineer</td>
                                <td class="px-4 py-3">MSc in IT, 5 years in Cloud Infrastructure.</td>
                                <td class="px-4 py-3 whitespace-nowrap">16/01/2025</td>
                                <td class="px-4 py-3 whitespace-nowrap">16/02/2025</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-bold text-red-800 bg-red-100 border border-red-300 rounded-full">
                                        Closed
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-blue-600 font-semibold hover:underline whitespace-nowrap">
                                    <a href="#">View Details →</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Cards View -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 md:hidden p-4">
                    <!-- Job Card: Open -->
                    <div
                        class="bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition transform hover:scale-[1.02] border border-gray-100">
                        <div class="flex items-center justify-between text-sm mb-2">
                            <a href="#" class="font-bold text-blue-600 hover:underline">BMA/ICT_II</a>
                            <span class="text-gray-500">ICT Officer</span>
                            <span
                                class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-md">Open</span>
                        </div>
                        <p class="text-sm text-gray-700 mb-2">BSc in IT, Computer Science & 2 years experience.</p>
                        <p class="text-xs text-gray-500 font-medium">Deadline: 15/05/2025</p>
                        <div class="mt-3">
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg shadow-sm transition duration-300">
                                <i class="fas fa-paper-plane mr-2"></i> Apply Now
                            </a>
                        </div>
                    </div>

                    <!-- Job Card: Closed -->
                    <div
                        class="bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition transform hover:scale-[1.02] border border-gray-100">
                        <div class="flex items-center justify-between text-sm mb-2">
                            <a href="#" class="font-bold text-blue-600 hover:underline">BMA/SNCLOUD_ENG</a>
                            <span class="text-gray-500">Cloud Engineer</span>
                            <span
                                class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-md">Closed</span>
                        </div>
                        <p class="text-sm text-gray-700 mb-2">MSc in IT, Computer Science & 5 years in Cloud Infra.</p>
                        <p class="text-xs text-gray-500 font-medium">Deadline: 15/02/2025</p>
                        <div class="mt-3">
                            <span
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold text-red-700 bg-gray-100 rounded-lg shadow-sm">
                                <i class="fas fa-ban mr-2"></i> Application Closed
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!----Responsive Mobile view for Job Applied------------------------------------------->
    <div class="py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-xl overflow-hidden">

                <!-- Header -->
                <div class="px-4 py-2 border-b flex items-center text-indigo-700 font-semibold text-base">
                    <i class="fas fa-check-circle text-green-600 mr-2"></i>
                    {{ __('My Job Applications') }}
                </div>

                <!-- Desktop Table View -->
                <div class="overflow-x-auto hidden md:block">
                    <table class="min-w-full text-sm text-left border-collapse">
                        <thead class="bg-indigo-50 text-indigo-800 uppercase text-xs font-semibold tracking-wider">
                            <tr>
                                <th class="p-4">Ref No</th>
                                <th class="p-4">Position</th>
                                <th class="p-4">Description</th>
                                <th class="p-4">Posted</th>
                                <th class="p-4">Deadline</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-semibold text-blue-600 whitespace-nowrap">
                                    <a href="#" class="hover:underline">BMA/NET_ADMN</a>
                                </td>
                                <td class="p-4 text-gray-800 whitespace-nowrap">Network Administrator</td>
                                <td class="p-4 text-gray-600">
                                    Bachelor's Degree in IT, CCNA, and 2+ years experience in networking.
                                </td>
                                <td class="p-4 text-gray-500 whitespace-nowrap">16/02/2025</td>
                                <td class="p-4 text-gray-500 whitespace-nowrap">16/03/2025</td>
                                <td class="p-4 whitespace-nowrap">
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Applied</span>
                                </td>
                                <td class="p-4 whitespace-nowrap">
                                    <a href="#"
                                        class="text-blue-600 hover:underline font-medium flex items-center space-x-1">
                                        <span>View Details</span>
                                        <i class="fas fa-arrow-right text-sm"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View -->
                <div class="md:hidden p-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg shadow hover:shadow-md border transition">
                        <div class="flex items-center justify-between text-sm mb-2">
                            <a href="#" class="text-blue-600 font-bold hover:underline">BMA/ICT_II</a>
                            <span
                                class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full">Applied</span>
                        </div>
                        <div class="text-sm font-semibold text-gray-800 mb-1">ICT Officer</div>
                        <div class="text-sm text-gray-600 mb-2">
                            Bachelor's Degree in IT and 2+ years in a busy ICT environment.
                        </div>
                        <div class="text-sm text-gray-500 mb-3">Deadline: <span class="font-medium">15/03/2025</span>
                        </div>
                        <a href="#" class="flex items-center text-blue-600 font-medium hover:underline text-sm">
                            <span>View Details</span>
                            <i class="fas fa-eye ml-1"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--End of Job Applied Responsive Mobile View-->


    <!-- Application Status Tracker -->
    <div class="py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-2 text-base font-medium text-indigo-700 flex items-center">
                    <i class="fas fa-tasks text-blue-500 mr-2"></i>
                    {{ __('Application Status Tracker') }}
                </div>

                <!-- Desktop View -->
                <div class="overflow-auto rounded-lg shadow hidden md:block">
                    <table class="w-full border-collapse">
                        <thead class="bg-indigo-50 text-indigo-800 uppercase text-xs font-semibold tracking-wider">
                            <tr>
                                <th class="text-left px-3 py-2 whitespace-nowrap">Reference No</th>
                                <th class="text-left px-3 py-2 whitespace-nowrap">Position</th>
                                <th class="text-left px-3 py-2 whitespace-nowrap">Status</th>
                                <th class="text-left px-3 py-2 whitespace-nowrap">Progress</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                            <!-- Job 1 -->
                            <tr class="bg-white hover:bg-gray-50 transition duration-200">
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <a href="#" class="font-bold text-blue-500 hover:underline">BMA/ICT_II</a>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">ICT OFFICER II</td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg">
                                        Interviewed
                                    </span>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-500 h-2 rounded-full transition-all duration-500"
                                            style="width: 75%;"></div>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1">75%</div>
                                </td>
                            </tr>

                            <!-- Job 2 -->
                            <tr class="bg-gray-50 hover:bg-gray-100 transition duration-200">
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <a href="#" class="font-bold text-blue-500 hover:underline">BMA/NET_ADMN</a>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">Network Administrator</td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg">
                                        Applied
                                    </span>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-yellow-500 h-2 rounded-full transition-all duration-500"
                                            style="width: 25%;"></div>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1">25%</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden p-4">
                    <!-- Card 1 -->
                    <div
                        class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition transform hover:scale-105">
                        <div class="flex items-center justify-between mb-2">
                            <div class="text-sm font-bold text-blue-600">BMA/ICT_II</div>
                            <span
                                class="px-2 py-1 text-xs font-medium text-green-800 bg-green-200 rounded-md">Interviewed</span>
                        </div>
                        <p class="text-sm text-gray-700 mb-1">ICT OFFICER II</p>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                            <div class="bg-green-500 h-2 rounded-full transition-all duration-500"
                                style="width: 75%;"></div>
                        </div>
                        <div class="text-xs text-gray-500 mt-1">Progress: 75%</div>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition transform hover:scale-105">
                        <div class="flex items-center justify-between mb-2">
                            <div class="text-sm font-bold text-blue-600">BMA/NET_ADMN</div>
                            <span
                                class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-200 rounded-md">Applied</span>
                        </div>
                        <p class="text-sm text-gray-700 mb-1">Network Administrator</p>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                            <div class="bg-yellow-500 h-2 rounded-full transition-all duration-500"
                                style="width: 25%;"></div>
                        </div>
                        <div class="text-xs text-gray-500 mt-1">Progress: 25%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-xl p-6">
                <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                    <div class="p-2 text-base font-medium text-indigo-700 flex items-center">
                        <i class="fas fa-file-upload text-blue-500 mr-2"></i>
                        {{ __('Uploaded Documents') }}
                    </div>

                    <!-- Responsive grid for document list -->
                    <ul
                        class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-800 mt-4 ml-4 list-disc list-inside">
                        <li>
                            Application Letter -
                            <span class="inline-flex items-center gap-1 text-green-600 font-semibold">
                                <i class="fas fa-check-circle"></i> Uploaded
                            </span>
                        </li>
                        <li>
                            Academic Certificates -
                            <span class="inline-flex items-center gap-1 text-green-600 font-semibold">
                                <i class="fas fa-check-circle"></i> Uploaded
                            </span>
                        </li>
                        <li>
                            ID/Passport -
                            <span class="inline-flex items-center gap-1 text-green-600 font-semibold">
                                <i class="fas fa-check-circle"></i> Uploaded
                            </span>
                        </li>
                        <li>
                            Professional Certificates -
                            <span class="inline-flex items-center gap-1 text-yellow-600 font-semibold">
                                <i class="fas fa-exclamation-circle"></i> Missing
                            </span>
                        </li>
                        <li>
                            Referees -
                            <span class="inline-flex items-center gap-1 text-yellow-600 font-semibold">
                                <i class="fas fa-exclamation-circle"></i> Missing
                            </span>
                        </li>
                        <li>
                            Membership to Professional Bodies -
                            <span class="inline-flex items-center gap-1 text-green-600 font-semibold">
                                <i class="fas fa-check-circle"></i> Uploaded
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
