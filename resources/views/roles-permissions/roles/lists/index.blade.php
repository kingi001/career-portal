<x-app-layout>
    <div class="py-4 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
            <!-- Header Section -->
            @include('roles-permissions.nav-links')
            <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-200">
                <h3 class="text-base font-medium text-indigo-700 flex items-center gap-2">
                    <i class="fas fa-users-cog text-blue-600 text-xl"></i>
                    {{ __('Manage Roles') }}
                </h3>
            </div>

            <!-- Roles Table -->
            <div class="overflow-auto rounded-lg shadow mt-4 hidden md:block">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-indigo-50 text-indigo-800 uppercase text-xs font-semibold tracking-wider">
                        <tr>
                            <th class="p-3 text-center"><i class="fas fa-hashtag"></i></th>
                            <th class="p-3 text-left">Role Name</th>
                            <th class="p-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($roles as $key => $role)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-3 text-center text-gray-800">{{ $key + 1 }}</td>
                                <td class="p-3 text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-user-shield text-gray-500 mr-1"></i>{{ $role->name }}
                                </td>
                                <td class="p-3 text-center">
                                    <div class="flex justify-center gap-4 flex-wrap">
                                        <!-- Permissions -->
                                        <button
                                            onclick="window.location.href='{{ route('roles.givePermissions', $role->id) }}'"
                                            class="text-indigo-600 hover:text-indigo-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                            <i class="fas fa-lock"></i> Permissions
                                        </button>

                                        <!-- Edit Role -->
                                        <button
                                            @click="fetchRole(@json($role->id))"
                                            class="text-yellow-500 hover:text-yellow-600 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>

                                        <!-- Delete Role -->
                                        <form id="delete-form-{{ $role->id }}"
                                            action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                onclick="confirmDelete({{ $role->id }})"
                                                class="text-red-500 hover:text-red-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center">
                                    <div
                                        class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-3 rounded-lg shadow-sm">
                                        <h4 class="text-md font-semibold flex items-center justify-center gap-2">
                                            <i class="fas fa-info-circle"></i>
                                            <span>No roles found.</span>
                                        </h4>
                                    </div>
                                </td>
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
