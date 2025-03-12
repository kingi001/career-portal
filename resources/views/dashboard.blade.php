<x-app-layout>
    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Main Content -->
            <main class="col-span-4 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-6 uppercase flex items-center gap-2 text-gray-800">
                    <i class="fas fa-tachometer-alt text-blue-500 "></i>Welcome to your Dashboard!
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
    <div class="py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-4 font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-briefcase text-blue-500 mr-2"></i>
                    {{ __('Job Listings') }}
                </div>


                <!-- Desktop View -->
                <div class="overflow-auto rounded-lg shadow hidden md:block">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b-2 border-gray-100">
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
                                    <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 border border-green-300 rounded-full shadow-sm">
                                        Open
                                    </span>
                                </td>
                                <td class="p-4 text-sm">
                                    <a href="#"
                                    class="px-4 py-2 text-xs font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-md hover:from-blue-700 hover:to-blue-900 transition-all duration-300 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 inline-flex items-center">
                                    <svg class="w-2 h-2 text-white mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2h2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h2zm2-1a1 1 0 0 0-1 1v1h6V2a1 1 0 0 0-1-1H8zm9 4H3v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" clip-rule="evenodd"/>
                                    </svg>
                                    Apply
                                </a>                           </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition">
                                <td class="p-4 text-sm text-gray-700"><a href="#"
                                        class="font-bold text-blue-500 hover:underline">BMA/SNCLOUD_ENG</a></td>
                                <td class="p-4 text-sm text-gray-700">Senior Cloud Engineer</td>
                                <td class="p-4 text-sm text-gray-700">MSc in IT, Computer Science & 5 years in Cloud
                                    Infra.</td>
                                <td class="p-4 text-sm text-gray-700">16/01/2025</td>
                                <td class="p-4 text-sm text-gray-700">16/02/2025</td>
                                <td class="p-4 text-sm">
                                    <span class="px-3 py-1 text-xs font-bold text-red-800 bg-red-200 border border-red-300 rounded-md shadow-sm">
                                        Closed
                                    </span>
                                </td>
                                <td class="p-4 text-sm text-gray-400"><a href="#" class="text-blue-600 font-semibold hover:underline">View Details →</a>
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
                        <a href="#"
                        class="px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-md hover:from-blue-700 hover:to-blue-900 transition-all duration-300 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 inline-flex items-center">
                        <svg class="w-4 h-4 text-white mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2h2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h2zm2-1a1 1 0 0 0-1 1v1h6V2a1 1 0 0 0-1-1H8zm9 4H3v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" clip-rule="evenodd"/>
                        </svg>
                        Apply
                    </a>
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
                            <i class="fas fa-ban text-red-600"></i>
                            <span class="px-4 py-2 text-red-600 bg-gray-100 rounded-lg shadow-sm">Application
                                Closed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----------------------------------------------------------------------------Responsive Mobile view for Job Applied------------------------------------------->
    <div class="py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-4 font-semibold text-gray-900 flex items-center">
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
                                        <span class="underline"><a href="#" class="text-blue-600 font-semibold hover:underline">View Details →</a></span>
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
                                class="flex items-center space-x-1 font-semibold text-blue-500 hover:text-blue-600 transition duration-300">
                                <span>View Details</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-----------------------------------------------------------------------End of Job Applied Responsive Mobile View------------------------------------------>


    <!-- Application Status Tracker -->
    <div class="py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-4 font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-tasks text-blue-600 mr-2"></i>
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
                            <div class="bg-green-500 h-2 rounded-full transition-all duration-500"
                                style="width: 75%;"></div>
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
                            <div class="bg-yellow-500 h-2 rounded-full transition-all duration-500"
                                style="width: 25%;"></div>
                        </div>
                        <div class="text-xs text-gray-500">25%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
