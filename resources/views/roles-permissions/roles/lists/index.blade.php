<x-app-layout>
    <div class="py-4 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
            <!-- Header Section -->
            @include('roles-permissions.nav-links')
            <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-indigo-700 flex items-center gap-2">
                    <i class="fas fa-users-cog text-blue-600 text-xl"></i>
                    {{ __('Manage Roles') }}
                </h3>
            </div>

            <!-- Search & Filter -->
            <div class="mb-4 flex justify-between items-center text-sm">
                <div class="relative w-full sm:w-1/3">
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" id="search" placeholder="Search roles..."
                        class="w-full p-1 pl-10 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400">
                </div>
            </div>

            <!-- Roles Table -->
            <div class="overflow-auto rounded-lg shadow mt-4 hidden md:block">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-blue-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-sm font-semibold text-left">#</th>
                            <th class="p-3 text-sm font-semibold text-left">Role Name</th>
                            <th class="p-3 text-sm text-gray-700 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($roles as $key => $role)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 text-sm text-gray-700">{{ $key + 1 }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $role->name }}</td>
                                <td class="p-3 text-sm text-gray-700 flex justify-center gap-4">
                                    <!-- Add/Edit Role Permission Button -->
                                    <button class="text-indigo-600 hover:text-indigo-700 transition flex items-center gap-1"
                                        @click="window.dispatchEvent(new CustomEvent('open-modal', { detail: { modal: 'give-permission-to-role', roleId: @json($role->id) }}))">
                                        <i class="fas fa-lock"></i> {{ __('Permissions') }}
                                    </button>

                                    <!-- Edit Button -->
                                    <button class="text-yellow-500 hover:text-yellow-600 transition flex items-center gap-1"
                                        @click="fetchRole(@json($role->id))">
                                        <i class="fas fa-edit"></i> Edit Role
                                    </button>

                                    <!-- Delete Button -->
                                    <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                                onclick="confirmDelete(@json($role->id))">
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
            @include('roles-permissions.roles.modals.give-permissiontorole')
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

        function confirmDelete(roleId) {
            if (confirm('Are you sure you want to delete this role?')) {
                document.getElementById('delete-form-' + roleId).submit();
            }
        }

        document.getElementById('search').addEventListener('keyup', function() {
            let searchQuery = this.value.trim().toLowerCase();
            let rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                let roleName = row.cells[1]?.textContent.trim().toLowerCase() || '';
                row.style.display = roleName.includes(searchQuery) || searchQuery === '' ? '' : 'none';
            });
        });
    </script>
</x-app-layout>
