<x-app-layout>
    <div class="py-4 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-3 bg-white border-b border-gray-100 rounded-lg">
            <!-- Header Section -->
            <div class="flex items-center justify-between mb-2 pb-1">
                <h3 class="text-base font-medium text-indigo-700">
                    <i class="fas fa-users-cog text-blue-600 text-lg"></i>
                    {{ __('Manage Roles') }}
                </h3>
            </div>

            <!-- Search & Filter -->
            <div class="mb-2 flex justify-between items-center text-sm">
                <div class="relative w-full sm:w-1/3">
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 text-sm">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" id="search" placeholder="Search roles..."
                        class="w-full text-sm p-2 pl-10 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400">
                </div>
            </div>

            <!-- Roles Table -->
            <div class="overflow-auto rounded-lg shadow-md mt-4 hidden md:block">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-blue-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-2 text-sm font-semibold text-left">#</th>
                            <th class="p-2 text-sm font-semibold text-left">Role Name</th>
                            <th class="p-2 text-sm text-gray-700 whitespace-nowrap text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($roles as $key => $role)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-2 text-sm text-gray-700 whitespace-nowrap">{{ $key + 1 }}</td>
                                <td class="p-2 text-sm text-gray-700 whitespace-nowrap">{{ $role->name }}</td>
                                <td class="p-2 text-sm text-gray-700 whitespace-nowrap flex justify-center gap-3">
                                    <!-- Edit Button -->
                                    <button class="text-yellow-500 hover:text-yellow-600 transition"
                                        @click="fetchRole({{ $role->id }})">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                                onclick="confirmDelete({{ $role->id }})">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center text-gray-500">No roles found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @include('roles-permissions.roles.modals.add-role')
            @include('roles-permissions.roles.modals.edit-role')
        </div>
    </div>

    <!-- JavaScript for Fetching Role Data -->
    <script>
        function fetchRole(id) {
            fetch(`/roles/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    window.dispatchEvent(new CustomEvent('open-modal', {
                        detail: {
                            modal: 'edit-role',
                            role: data
                        }
                    }));
                })
                .catch(error => console.error('Error fetching role:', error));
        }
    </script>

    <!-- JavaScript for Search Functionality -->
    <script>
        document.getElementById('search').addEventListener('keyup', function() {
            let searchQuery = this.value.toLowerCase();
            let rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                let roleName = row.cells[1]?.textContent.toLowerCase() || ''; // Get Role Name
                if (roleName.includes(searchQuery)) {
                    row.style.display = ''; // Show row
                } else {
                    row.style.display = 'none'; // Hide row
                }
            });
        });
    </script>


</x-app-layout>
