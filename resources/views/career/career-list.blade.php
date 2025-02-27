<x-app-layout>
    <div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">

            <h2 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                <i class="fas fa-briefcase text-blue-500"></i>
                {{ __('Career Background') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Please provide your job history starting with the most recent.') }}
            </p>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2
                        shadow-sm hover:shadow-md transition-all duration-200 ease-in-out mt-3"
                x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-career')">
                <i class="fas fa-plus"></i> {{ __('Add Job History') }}
            </button>

            <div class="mt-4">
                <!-- Desktop View -->
                <div class="hidden md:block overflow-x-auto rounded-lg shadow">
                    <table class="w-full bg-white border border-gray-300 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr class="text-left">
                                <th class="p-3 text-sm font-semibold">ID</th>
                                <th class="p-3 text-sm font-semibold">Company</th>
                                <th class="p-3 text-sm font-semibold">Position</th>
                                <th class="p-3 text-sm font-semibold">Start Date</th>
                                <th class="p-3 text-sm font-semibold">End Date</th>
                                <th class="p-3 text-sm font-semibold">Responsibilities</th>
                                <th class="p-3 text-sm font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 text-sm">1</td>
                                <td class="p-3 text-sm">iMedia Africa</td>
                                <td class="p-3 text-sm">ICT Technician</td>
                                <td class="p-3 text-sm">Jan 2020</td>
                                <td class="p-3 text-sm">Dec 2021</td>
                                <td class="p-3 text-sm">Managed IT infrastructure and trained staff on new systems.</td>
                                <td class="p-3 text-sm flex space-x-2">
                                    <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button onclick="return confirm('Are you sure you want to delete this job?');"
                                        class="text-red-500 hover:text-red-700 flex items-center gap-1">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View -->
                <div class="md:hidden space-y-3 mt-3">
                    <div class="bg-white p-4 shadow-lg rounded-lg border border-gray-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-semibold text-gray-800 flex items-center gap-1">
                                    <i class="fas fa-building text-blue-500"></i> iMedia Africa
                                </p>
                                <p class="text-sm text-gray-600 flex items-center gap-1">
                                    <i class="fas fa-user-tie text-gray-400"></i> ICT Technician
                                </p>
                                <p class="text-xs text-gray-500 flex items-center gap-1">
                                    <i class="fas fa-calendar-alt text-gray-400"></i> Jan 2020 - Dec 2021
                                </p>
                            </div>
                            <div class="flex space-x-3">
                                <a href="#" class="text-blue-500 hover:text-blue-700 text-sm flex items-center gap-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button onclick="return confirm('Are you sure you want to delete this job?');"
                                    class="text-red-500 hover:text-red-700 text-sm flex items-center gap-1">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
