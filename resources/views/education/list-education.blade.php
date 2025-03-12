<x-app-layout>
    @include('education.modals.add-education')
    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">

            <!-- Section Title -->
            <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
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
                            <th class="p-3 text-sm font-semibold text-left">Institution</th>
                            <th class="p-3 text-sm font-semibold text-left">Degree</th>
                            <th class="p-3 text-sm font-semibold text-left">Field of Study</th>
                            <th class="p-3 text-sm font-semibold text-left">Award</th>
                            <th class="p-3 text-sm font-semibold text-left">Start Date</th>
                            <th class="p-3 text-sm font-semibold text-left">End Date</th>
                            <th class="p-3 text-sm font-semibold text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Hardcoded Data -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <i class="fas fa-school text-gray-500"></i> JKUAT
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <i class="fas fa-graduation-cap text-gray-500"></i> Diploma
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <i class="fas fa-book text-gray-500"></i> Information Technology
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Distinction</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2019-09-01</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2022-12-15</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap flex items-center gap-3">
                                <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                    onclick="return confirm('Are you sure you want to delete this education?');">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <i class="fas fa-school text-gray-500"></i> Moi University
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <i class="fas fa-graduation-cap text-gray-500"></i> Bachelor’s Degree
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <i class="fas fa-book text-gray-500"></i> Computer Science
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Second Class Upper</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2023-01-15</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2026-12-10</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap flex items-center gap-3">
                                <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                    onclick="return confirm('Are you sure you want to delete this education?');">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Mobile View (Stacked Cards) -->
            <div class="mt-4 space-y-4 md:hidden">
                <!-- Hardcoded Data for Mobile -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                    <h3 class="text-md font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-school text-blue-500"></i> JKUAT
                    </h3>
                    <p class="text-sm text-gray-600"><i class="fas fa-graduation-cap text-gray-500"></i> Diploma</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-book text-gray-500"></i> Information Technology</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-award text-gray-500"></i> Distinction</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-calendar-alt text-gray-500"></i> 2019-09-01 - 2022-12-15</p>

                    <div class="flex justify-between items-center mt-3">
                        <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button class="text-red-500 hover:text-red-700 flex items-center gap-1"
                            onclick="return confirm('Are you sure you want to delete this education?');">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                    <h3 class="text-md font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-school text-blue-500"></i> Moi University
                    </h3>
                    <p class="text-sm text-gray-600"><i class="fas fa-graduation-cap text-gray-500"></i> Bachelor’s Degree</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-book text-gray-500"></i> Computer Science</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-award text-gray-500"></i> Second Class Upper</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-calendar-alt text-gray-500"></i> 2023-01-15 - 2026-12-10</p>

                    <div class="flex justify-between items-center mt-3">
                        <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button class="text-red-500 hover:text-red-700 flex items-center gap-1"
                            onclick="return confirm('Are you sure you want to delete this education?');">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Add Education Button -->
            <div class="mt-4 flex justify-end">
                <button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-education')"
                class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-sm hover:shadow-md transition-all duration-200 ease-in-out"
            >
                <i class="fas fa-plus-circle text-xs"></i> {{ __('Add Education Qualification') }}
            </button>
            </div>

        </div>
    </div>


    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">

            <!-- Section Title -->
            <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                <i class="fas fa-certificate text-blue-600 text-xl"></i>
                {{ __('Professional Qualifications') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Add professional certifications such as CISA, CPA, etc.') }}
            </p>

            <!-- Desktop Table View -->
            <div class="overflow-auto rounded-lg shadow-md mt-4 hidden md:block">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-blue-50 border-b-2 border-gray-200">
                        <tr class="text-gray-700">
                            <th class="p-3 text-sm font-semibold text-left">ID</th>
                            <th class="p-3 text-sm font-semibold text-left">Institution</th>
                            <th class="p-3 text-sm font-semibold text-left">Certification</th>
                            <th class="p-3 text-sm font-semibold text-left">Award</th>
                            <th class="p-3 text-sm font-semibold text-left">Start Date</th>
                            <th class="p-3 text-sm font-semibold text-left">End Date</th>
                            <th class="p-3 text-sm font-semibold text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Hardcoded Data -->
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">1</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <i class="fas fa-school text-gray-500"></i> JKUAT
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <i class="fas fa-user-graduate text-gray-500"></i> CISA
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Certified</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2021-02-20</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2024-08-21</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap flex items-center gap-3">
                                <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                    onclick="return confirm('Are you sure you want to delete this qualification?');">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <i class="fas fa-school text-gray-500"></i> KCA University
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <i class="fas fa-user-graduate text-gray-500"></i> CPA
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">Part II</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2022-06-15</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">2025-12-10</td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap flex items-center gap-3">
                                <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                    onclick="return confirm('Are you sure you want to delete this qualification?');">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Mobile View (Stacked Cards) -->
            <div class="mt-4 space-y-4 md:hidden">
                <!-- Hardcoded Data for Mobile -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                    <h3 class="text-md font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-school text-blue-500"></i> JKUAT
                    </h3>
                    <p class="text-sm text-gray-600"><i class="fas fa-user-graduate text-gray-500"></i> CISA</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-award text-gray-500"></i> Certified</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-calendar-alt text-gray-500"></i> 2021-02-20 - 2024-08-21</p>

                    <div class="flex justify-between items-center mt-3">
                        <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button class="text-red-500 hover:text-red-700 flex items-center gap-1"
                            onclick="return confirm('Are you sure you want to delete this qualification?');">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                    <h3 class="text-md font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-school text-blue-500"></i> KCA University
                    </h3>
                    <p class="text-sm text-gray-600"><i class="fas fa-user-graduate text-gray-500"></i> CPA</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-award text-gray-500"></i> Part II</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-calendar-alt text-gray-500"></i> 2022-06-15 - 2025-12-10</p>

                    <div class="flex justify-between items-center mt-3">
                        <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button class="text-red-500 hover:text-red-700 flex items-center gap-1"
                            onclick="return confirm('Are you sure you want to delete this qualification?');">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Add Qualification Button -->
            <div class="mt-4 flex justify-end">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-1
                    shadow-sm hover:shadow-md transition-all duration-200 ease-in-out">
                    <i class="fas fa-plus text-xs"></i> {{ __('Add Professional Certification') }}
                </button>
            </div>

        </div>
    </div>


    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-x-auto">
        <div class="p-2 bg-white border-b border-gray-100 rounded-lg overflow-x-auto">

            <h2 class="text-lg font-medium text-gray-900">
                <i class="fas fa-landmark text-blue-500 text-lg"></i>
                {{ __('Membership to Professional Bodies') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Professional Membership.') }}
            </p>

            <!-- Mobile View: Card Layout -->
            <div class="sm:block md:hidden">
                <div class="space-y-4">
                    <div class="p-4 border rounded-lg shadow">
                        <p class="font-semibold"><i class="fas fa-school mr-1"></i> IEEE</p>
                        <p class="text-sm text-gray-700"><i class="fas fa-user-tag mr-1"></i> Professional</p>
                        <p class="text-sm text-gray-700"><i class="fas fa-award mr-1"></i> Senior Member</p>
                        <p class="text-sm text-gray-700"><i class="fas fa-calendar mr-1"></i> 15/01/2020 - 15/01/2025</p>
                        <div class="mt-2 flex space-x-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                            <button type="button" class="text-red-500 hover:text-red-700"
                                onclick="return confirm('Are you sure you want to delete this membership?');">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Desktop View: Table -->
            <div class="overflow-auto rounded-lg shadow hidden md:block">
                <table class="mt-4 min-w-full bg-white border-gray-300 shadow-lg rounded-lg overflow-auto">
                    <thead class="bg-gray-50 border-b-2 border-gray-100">
                        <tr>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">ID</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Organization</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Membership Type</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Membership Level</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Start Date</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">End Date</th>
                            <th class="p-2 text-sm font-semibold tracking-wide text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">1</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">IEEE</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">Professional</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">Senior Member</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">15/01/2020</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">15/01/2025</td>
                            <td class="p-2 text-sm text-gray-700 whitespace-nowrap">
                                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i> Edit</a>
                                <button type="button" class="text-red-500 hover:text-red-700 ml-2"
                                    onclick="return confirm('Are you sure you want to delete this membership?');">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Add Membership Button -->

            <div class="mt-4 flex justify-end">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-1
                    shadow-sm hover:shadow-md transition-all duration-200 ease-in-out">
                    <i class="fas fa-plus text-xs"></i> {{ __('Add Membership') }}
                </button>
            </div>
        </div>
    </div>

</x-app-layout>
