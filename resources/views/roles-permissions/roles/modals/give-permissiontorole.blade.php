<div x-data="{ open: false, roleId: null, assignedPermissions: [] }"
    @open-modal.window="
        if ($event.detail.modal === 'give-permission-to-role') {
            open = true;
            roleId = $event.detail.roleId;
            assignedPermissions = $event.detail.permissions;
        }
    "
    x-cloak>

    <!-- Modal Overlay -->
    <div x-show="open"
        class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 transition-opacity duration-300"
        x-transition.opacity>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-md transform transition-all duration-300 scale-95"
            x-show="open" x-transition.scale.90>

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-3 bg-indigo-600 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-users-cog"></i> Assign Permissions to Role
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-300 transition-colors duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" :action="'/roles/' + roleId + '/give-permission'" class="p-5 space-y-4">
                @csrf
                <!-- Permissions List -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($permissions as $permission)
                        <label class="flex items-center space-x-2 text-sm text-gray-700">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                @if($role->hasPermissionTo($permission->name)) checked @endif>
                            <span>{{ $permission->name }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="mt-5 flex justify-end space-x-4">
                    <button type="button" @click="open = false" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-times"></i> {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-save"></i> {{ __('Save Changes') }}
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
