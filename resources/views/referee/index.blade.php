<x-app-layout>
    <div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">

            <!-- Section Header -->
            <h2 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                <i class="fas fa-user-tie text-blue-900"></i> {{ __('Referees') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Add referees who can vouch for your professional experience.') }}
            </p>

            <!-- Add Referee Button -->
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-sm hover:shadow-md transition-all duration-200 ease-in-out mt-3"
                x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-referee')">
                <i class="fas fa-plus"></i> {{ __('Add Referee') }}
            </button>

            <div class="mt-4">
                <!-- Desktop View -->
                <div class="hidden md:block overflow-x-auto rounded-lg shadow">
                    <table class="w-full bg-white border border-gray-300 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr class="text-left">
                                <th class="p-3 text-sm font-semibold"><i class="fas fa-hashtag"></i> ID</th>
                                <th class="p-3 text-sm font-semibold"><i class="fas fa-user"></i> Full Name</th>
                                <th class="p-3 text-sm font-semibold"><i class="fas fa-briefcase"></i> Job Title</th>
                                <th class="p-3 text-sm font-semibold"><i class="fas fa-building"></i> Company</th>
                                <th class="p-3 text-sm font-semibold"><i class="fas fa-phone"></i> Phone</th>
                                <th class="p-3 text-sm font-semibold"><i class="fas fa-envelope"></i> Email</th>
                                <th class="p-3 text-sm font-semibold"><i class="fas fa-cogs"></i> Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 text-sm">1</td>
                                <td class="p-3 text-sm">John Doe</td>
                                <td class="p-3 text-sm">Senior IT Manager</td>
                                <td class="p-3 text-sm">Tech Corp</td>
                                <td class="p-3 text-sm"><i class="fas fa-phone-alt text-gray-400"></i> +254 712 345 678</td>
                                <td class="p-3 text-sm"><i class="fas fa-envelope text-gray-400"></i> john.doe@example.com</td>
                                <td class="p-3 text-sm flex space-x-2">
                                    <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button onclick="return confirm('Are you sure?');"
                                        class="text-red-500 hover:text-red-700 flex items-center gap-1">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 text-sm">2</td>
                                <td class="p-3 text-sm">Jane Smith</td>
                                <td class="p-3 text-sm">HR Director</td>
                                <td class="p-3 text-sm">Global Solutions</td>
                                <td class="p-3 text-sm"><i class="fas fa-phone-alt text-gray-400"></i> +254 798 654 321</td>
                                <td class="p-3 text-sm"><i class="fas fa-envelope text-gray-400"></i> jane.smith@example.com</td>
                                <td class="p-3 text-sm flex space-x-2">
                                    <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button onclick="return confirm('Are you sure?');"
                                        class="text-red-500 hover:text-red-700 flex items-center gap-1">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 text-sm">3</td>
                                <td class="p-3 text-sm">Michael Brown</td>
                                <td class="p-3 text-sm">Operations Manager</td>
                                <td class="p-3 text-sm">Logistics Ltd</td>
                                <td class="p-3 text-sm"><i class="fas fa-phone-alt text-gray-400"></i> +254 723 987 654</td>
                                <td class="p-3 text-sm"><i class="fas fa-envelope text-gray-400"></i> michael.brown@example.com</td>
                                <td class="p-3 text-sm flex space-x-2">
                                    <a href="#" class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button onclick="return confirm('Are you sure?');"
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
                    @foreach ([['John Doe', 'Senior IT Manager', 'Tech Corp', '+254 712 345 678', 'john.doe@example.com'],
                               ['Jane Smith', 'HR Director', 'Global Solutions', '+254 798 654 321', 'jane.smith@example.com'],
                               ['Michael Brown', 'Operations Manager', 'Logistics Ltd', '+254 723 987 654', 'michael.brown@example.com']] as $referee)
                        <div class="bg-white p-4 shadow-lg rounded-lg border border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800 flex items-center gap-1">
                                        <i class="fas fa-user text-blue-500"></i> {{ $referee[0] }}
                                    </p>
                                    <p class="text-sm text-gray-600 flex items-center gap-1">
                                        <i class="fas fa-briefcase text-gray-400"></i> {{ $referee[1] }}
                                    </p>
                                    <p class="text-sm text-gray-600 flex items-center gap-1">
                                        <i class="fas fa-building text-gray-400"></i> {{ $referee[2] }}
                                    </p>
                                    <p class="text-xs text-gray-500 flex items-center gap-1">
                                        <i class="fas fa-phone-alt text-gray-400"></i> {{ $referee[3] }}
                                    </p>
                                    <p class="text-xs text-gray-500 flex items-center gap-1">
                                        <i class="fas fa-envelope text-gray-400"></i> {{ $referee[4] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
