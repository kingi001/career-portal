<x-app-layout>
    <div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">

            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-briefcase text-blue-600"></i> {{ __('Employment History') }}
                </h2>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm font-medium rounded-lg flex items-center gap-2
                            shadow-md hover:shadow-lg transition-all duration-200 ease-in-out"
                    x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-career')">
                    <i class="fas fa-plus-circle"></i> {{ __('Add Job') }}
                </button>
            </div>

            <p class="mt-2 text-sm text-gray-600">
                {{ __('Please provide your job history starting with the most recent.') }}
            </p>

            <div class="mt-6">
                <!-- Desktop View -->
                <div class="hidden md:block overflow-x-auto rounded-lg shadow">
                    <table class="w-full bg-white border border-gray-300 rounded-lg">
                        <thead class="bg-blue-100 text-gray-700">
                            <tr class="text-left">
                                <th class="p-3 text-sm font-semibold">#</th>
                                <th class="p-3 text-sm font-semibold">Company</th>
                                <th class="p-3 text-sm font-semibold">Designation</th>
                                <th class="p-3 text-sm font-semibold">Monthly Salary/Gross Pay</th>
                                <th class="p-3 text-sm font-semibold">Start Date</th>
                                <th class="p-3 text-sm font-semibold">End Date</th>
                                <th class="p-3 text-sm font-semibold">Responsibilities</th>
                                <th class="p-3 text-sm font-semibold text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 text-sm">1</td>
                                <td class="p-3 text-sm font-medium text-gray-800">iMedia Africa</td>
                                <td class="p-3 text-sm text-gray-700">ICT Technician</td>
                                <td class="p-3 text-sm text-gray-700">KSh 50,000</td>
                                <td class="p-3 text-sm text-gray-600">Jan 2020</td>
                                <td class="p-3 text-sm text-gray-600">Dec 2021</td>
                                <td class="p-3 text-sm text-gray-700">Managed IT infrastructure and trained staff on new systems.</td>
                                <td class="p-3 text-sm flex justify-center space-x-3">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 flex items-center gap-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button onclick="return confirm('Are you sure you want to delete this job?');"
                                        class="text-red-600 hover:text-red-800 flex items-center gap-1">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View -->
                <div class="md:hidden space-y-4 mt-4">
                    <div class="bg-white p-4 shadow-lg rounded-lg border border-gray-200">
                        <div>
                            <p class="text-sm font-semibold text-gray-800 flex items-center gap-1">
                                <i class="fas fa-building text-blue-600"></i> iMedia Africa
                            </p>
                            <p class="text-sm text-gray-700 flex items-center gap-1">
                                <i class="fas fa-user-tie text-gray-500"></i> ICT Technician
                            </p>
                            <p class="text-sm text-gray-700 flex items-center gap-1">
                                <i class="fas fa-money-bill-wave text-green-500"></i> KSh 50,000
                            </p>
                            <p class="text-xs text-gray-600 flex items-center gap-1">
                                <i class="fas fa-calendar-alt text-gray-400"></i> Jan 2020 - Dec 2021
                            </p>
                        </div>

                        <!-- Buttons Moved to Bottom -->
                        <div class="mt-4 flex justify-between border-t pt-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm flex items-center gap-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button onclick="return confirm('Are you sure you want to delete this job?');"
                                class="text-red-600 hover:text-red-800 text-sm flex items-center gap-1">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
