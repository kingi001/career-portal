
<x-app-layout>
    <div class="py-4 container max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="p-3 bg-white border-b border-gray-100 rounded-lg">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-2  pb-1">

            <h2 class="text-base font-medium text-indigo-700">
                <i class="fas fa-shield-alt text-blue-600 text-lg"></i>
                {{ __('Manage Permissions') }}
            </h2>
        </div>

        <!-- Search & Filter -->
        <div class="mb-2 flex justify-between items-center text-sm">
            <div class="relative w-full sm:w-1/3">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 text-sm">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="search" placeholder="Search permissions..."
                    class="w-full text-sm p-2 pl-10 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400">
            </div>
        </div>


        <!-- Permissions Table -->
        <div class="overflow-auto rounded-lg shadow-md mt-4 hidden md:block">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-blue-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-2 text-sm font-semibold text-left">#</th>
                        <th class="p-2 text-sm font-semibold text-left">Permission Name</th>
                        <th class="p-2 text-sm text-gray-700 whitespace-nowrap text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @php
                        $permissions = [
                            ['id' => 1, 'name' => 'View Users'],
                            ['id' => 2, 'name' => 'Edit Users'],
                            ['id' => 3, 'name' => 'Delete Users'],
                            ['id' => 4, 'name' => 'Manage Roles'],
                            ['id' => 5, 'name' => 'Assign Permissions'],
                        ];
                    @endphp

                    @foreach ($permissions as $key => $permission)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-2 text-sm text-gray-700 whitespace-nowrap">{{ $key + 1 }}</td>
                        <td class="p-2 text-sm text-gray-700 whitespace-nowrap">{{ $permission['name'] }}</td>
                        <td class="p-2 text-sm text-gray-700 whitespace-nowrap flex justify-center gap-3">
                            <button class="text-yellow-500 hover:text-yellow-600 transition">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="text-red-500 hover:text-red-600 transition" onclick="confirmDelete({{ $permission['id'] }})">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('roles-permissions.permissions.modals.add-permission')


        </div>

        <!-- No Permissions Message -->
        @if (empty($permissions))
        <div class="text-center py-6 text-gray-500">
            <i class="fas fa-exclamation-circle text-3xl"></i>
            <p class="mt-2">No permissions found.</p>
        </div>
        @endif
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this permission?')) {
                alert('Permission with ID ' + id + ' deleted (not really, just a demo).');
            }
        }
    </script>
</x-app-layout>
