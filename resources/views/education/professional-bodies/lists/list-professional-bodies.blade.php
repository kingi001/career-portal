
<section>
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
                        <p class="text-sm text-gray-700"><i class="fas fa-calendar mr-1"></i> 15/01/2020 - 15/01/2025
                        </p>
                        <div class="mt-2 flex space-x-4">
                            <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i>
                                Edit</a>
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
                                <a href="#" class="text-blue-500 hover:text-blue-700"><i
                                        class="fas fa-edit"></i> Edit</a>
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
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-1
                    shadow-sm hover:shadow-md transition-all duration-200 ease-in-out">
                    <i class="fas fa-plus text-xs"></i> {{ __('Add Membership') }}
                </button>
            </div>
        </div>
    </div>


</section>
