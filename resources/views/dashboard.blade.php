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
                <h2
                    class="text-sm md:text-base font-bold mb-4 uppercase flex items-center gap-3 text-gray-900 dark:text-gray-100 tracking-wide">
                    <svg class="w-4 h-4 me-2 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>
                    <span class="bg-gradient-to-r text-base from-blue-500 to-indigo-700 text-transparent bg-clip-text">
                        Welcome to your Dashboard!
                    </span>
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <!-- Active Applications -->
                    <div
                        class="p-5 bg-blue-100 rounded-lg shadow-md flex items-center gap-3 transition-transform transform hover:scale-105 hover:shadow-lg">
                        <i class="fas fa-check-circle text-blue-600 text-2xl"></i>
                        <div>
                            <h3 class="font-bold text-blue-900 text-lg">Active Applications</h3>
                            <p class="text-sm text-gray-700 mt-1">You have <span class="font-semibold">3</span> active
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
            </main>
        </div>
    </div>
    <!---------------------------------------------------job listings-------------------------------------->
    <div class="py-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-2 text-base font-medium text-indigo-700 flex items-center">
                    <i class="fas fa-briefcase text-blue-500 mr-2"></i>
                    {{ __('Job Listings') }}
                </div>
                <!-- Desktop View -->
                <div class="overflow-auto rounded-lg shadow hidden md:block">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="w-32 p-4 text-sm font-semibold text-gray-700 text-left">Reference No</th>
                                <th class="w-48 p-4 text-sm font-semibold text-gray-700 text-left">Position</th>
                                <th class="p-4 text-sm font-semibold text-gray-700 text-left">Description</th>
                                <th class="w-28 p-4 text-sm font-semibold text-gray-700 text-left">Date Posted</th>
                                <th class="w-28 p-4 text-sm font-semibold text-gray-700 text-left">Deadline</th>
                                <th class="w-24 p-4 text-sm font-semibold text-gray-700 text-left">Status</th>
                                <th class="w-32 p-4 text-sm font-semibold text-gray-700 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Job Row -->
                            <tr class="bg-white hover:bg-gray-50 transition">
                                <td class="p-4 text-sm text-gray-700"><a href="#"
                                        class="font-bold text-blue-500 hover:underline">BMA/ICT_II</a></td>
                                <td class="p-4 text-sm text-gray-700">ICT OFFICER II</td>
                                <td class="p-4 text-sm text-gray-700">BSc in IT, Computer Science & 2 years experience.
                                </td>
                                <td class="p-4 text-sm text-gray-700">02/03/2025</td>
                                <td class="p-4 text-sm text-gray-700">15/05/2025</td>
                                <td class="p-4 text-sm">
                                    <span
                                        class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 border border-green-300 rounded-full shadow-sm">
                                        Open
                                    </span>
                                </td>
                                <td class="p-4 text-sm">
                                    <a href="#"
                                        class="px-4 py-2 text-xs font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-md hover:from-blue-700 hover:to-blue-900 transition-all duration-300 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 inline-flex items-center">
                                        <svg class="w-2 h-2 text-white mr-2" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M6 2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2h2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h2zm2-1a1 1 0 0 0-1 1v1h6V2a1 1 0 0 0-1-1H8zm9 4H3v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Apply
                                    </a>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition">
                                <td class="p-4 text-sm text-gray-700"><a href="#"
                                        class="font-bold text-blue-500 hover:underline">BMA/SNCLOUD_ENG</a></td>
                                <td class="p-4 text-sm text-gray-700">Senior Cloud Engineer</td>
                                <td class="p-4 text-sm text-gray-700">MSc in IT, Computer Science & 5 years in Cloud
                                    Infrastructure.</td>
                                <td class="p-4 text-sm text-gray-700">16/01/2025</td>
                                <td class="p-4 text-sm text-gray-700">16/02/2025</td>
                                <td class="p-4 text-sm">
                                    <span
                                        class="px-3 py-1 text-xs font-bold text-red-800 bg-red-200 border border-red-300 rounded-md shadow-sm">
                                        Closed
                                    </span>
                                </td>
                                <td class="p-4 text-sm text-gray-400"><a href="#"
                                        class="text-blue-600 font-semibold hover:underline">View Details →</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 md:hidden p-4">
                    <!-- Job Card -->
                    <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition transform hover:scale-105">
                        <div class="flex items-center space-x-3 text-sm">
                            <a href="#" class="font-bold text-blue-500 hover:underline">BMA/ICT_II</a>
                            <span class="text-gray-500">ICT Officer</span>
                            <span
                                class="px-2 py-1 text-xs font-medium uppercase text-green-800 bg-green-200 rounded-md">Open</span>
                        </div>
                        <p class="text-sm text-gray-700 mt-2">BSc in IT, Computer Science & 2 years experience.</p>
                        <p class="text-xs font-medium text-gray-600 mt-2">Deadline: 15/05/2025</p>
                        <div class="text-sm font-medium text-gray-800 flex items-center space-x-2 mt-3">
                            <span
                                class="px-4 py-2 text-blue-600 bg-gray-100 rounded-lg shadow-sm cursor-pointer hover:bg-blue-200 transition">
                                <i class="fas fa-paper-plane text-blue-600"></i> Apply Now
                            </span>
                        </div>
                    </div>

                    <!-- Closed Job Card -->
                    <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition transform hover:scale-105">
                        <div class="flex items-center space-x-3 text-sm">
                            <a href="#" class="font-bold text-blue-500 hover:underline">BMA/SNCLOUD_ENG</a>
                            <span class="text-gray-500">Cloud Engineer</span>
                            <span
                                class="px-2 py-1 text-xs font-medium uppercase text-gray-800 bg-gray-200 rounded-md">Closed</span>
                        </div>
                        <p class="text-sm text-gray-700 mt-2">MSc in IT, Computer Science & 5 years in Cloud Infra.</p>
                        <p class="text-xs font-medium text-gray-600 mt-2">Deadline: 15/02/2025</p>
                        <div class="text-sm font-medium text-gray-800 flex items-center space-x-2 mt-3">
                            <span class="px-4 py-2 text-red-600 bg-gray-100 rounded-lg shadow-sm"><i
                                    class="fas fa-ban text-red-600"></i>Application
                                Closed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----Responsive Mobile view for Job Applied------------------------------------------->
    <div class="py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-2 text-base font-medium text-indigo-700 flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-2"></i>
                    {{ __('Job Applications') }}
                </div>

                <!-- Desktop View -->
                <div class="overflow-auto rounded-lg shadow hidden md:block">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Reference No</th>
                                <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Position</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">Description</th>
                                <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Date Posted</th>
                                <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Deadline</th>
                                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                                <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="bg-white hover:bg-gray-50 transition duration-200">
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <a href="#" class="font-bold text-blue-500 hover:underline">BMA/NET_ADMN</a>
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Network Administrator</td>
                                <td class="p-3 text-sm text-gray-700">
                                    Bachelor's Degree in IT, Computer Science, CCNA, and 2 years of networking
                                    experience.
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/02/2025</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">16/03/2025</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg">Applied</span>
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <a href="#"
                                        class="flex items-center space-x-2 font-medium text-blue-600 hover:text-blue-800 transition duration-300 ease-in-out">
                                        <span class="underline"><a href="#"
                                                class="text-blue-600 font-semibold hover:underline">View Details
                                                →</a></span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden p-4">
                    <div class="bg-white p-4 rounded-lg shadow space-y-3 border">
                        <div class="flex items-center space-x-2 text-sm">
                            <a href="#" class="font-bold text-blue-500 hover:underline">BMA/ICT_II</a>
                            <span class="text-gray-500">ICT Officer</span>
                            <span
                                class="px-2 py-1 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg">Applied</span>
                        </div>
                        <div class="text-sm text-gray-700">
                            Bachelor's Degree in IT, Computer Science, and 2 years of experience in a busy ICT
                            environment.
                        </div>
                        <div class="text-sm font-medium text-gray-600">
                            Deadline: 15/03/2025
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="#"
                                class="flex items-center space-x-1 text-blue-500 font-semibold hover:underline transition duration-300 text-sm">
                                <span>View Details</span>
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>

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
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Reference No</th>
                                <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Position</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                                <th class="w-36 p-3 text-sm font-semibold tracking-wide text-left">Progress</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <!-- Job 1 -->
                            <tr class="bg-white hover:bg-gray-50 transition duration-200">
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <a href="#" class="font-bold text-blue-500 hover:underline">BMA/ICT_II</a>
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">ICT OFFICER II</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg">
                                        Interviewed
                                    </span>
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-500 h-2 rounded-full transition-all duration-500"
                                            style="width: 75%;"></div>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1">75%</div>
                                </td>
                            </tr>
                            <!-- Job 2 -->
                            <tr class="bg-gray-50 hover:bg-gray-100 transition duration-200">
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <a href="#" class="font-bold text-blue-500 hover:underline">BMA/NET_ADMN</a>
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Network Administrator</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg">
                                        Applied
                                    </span>
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
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
            </div>
        </div>
    </div>


    <!-- Mobile View -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden p-4">
        <!-- Card 1 -->
        <div class="bg-white p-4 rounded-lg shadow space-y-3 border">
            <div class="flex items-center space-x-2 text-sm">
                <a href="#" class="font-bold text-blue-500 hover:underline">BMA/ICT_II</a>
                <span class="text-gray-500">ICT Officer II</span>
                <span
                    class="px-2 py-1 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg">Interviewed</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-green-500 h-2 rounded-full transition-all duration-500" style="width: 75%;"></div>
            </div>
            <div class="text-xs text-gray-500">75%</div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-4 rounded-lg shadow space-y-3 border">
            <div class="flex items-center space-x-2 text-sm">
                <a href="#" class="font-bold text-blue-500 hover:underline">BMA/NET_ADMN</a>
                <span class="text-gray-500">Network Administrator</span>
                <span
                    class="px-2 py-1 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg">Applied</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-yellow-500 h-2 rounded-full transition-all duration-500" style="width: 25%;"></div>
            </div>
            <div class="text-xs text-gray-500">25%</div>
        </div>
    </div>
</x-app-layout>
