<div x-data="{ open: false, role: {} }"
     @open-modal.window="if ($event.detail.modal === 'edit-role') { open = true; role = $event.detail.role; }"
     x-cloak>

    <!-- Modal Overlay -->
    <div x-show="open" class="fixed inset-0 mt-4 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 transition-opacity duration-300"
         x-transition.opacity>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-lg transform transition-all duration-300 scale-95"
             x-show="open" x-transition.scale.90>

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-2 bg-indigo-600 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-users-cog"></i> Edit Role
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-300 transition-colors duration-200">
                    <i class="fas fa-times text-xl text-blue-400"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" :action="'/roles/' + role.id" class="p-5 space-y-4">
                @csrf
                @method('PUT')

                <p class="text-sm text-gray-700 flex items-center gap-2">
                    <i class="fas fa-info-circle text-blue-400"></i> Update the role details below.
                </p>

                <div>
                    <x-input-label for="name" :value="__('Role Name')" />
                    <div class="relative">
                        <i class="fas fa-tag absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                        <x-text-input id="name" name="name" type="text"
                                      class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10"
                                      x-model="role.name" required />
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                {{-- <div>
                    <x-input-label for="permissions" :value="__('Permissions')" />
                    <div class="relative">
                        <i class="fas fa-check-square absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                        <select id="permissions" name="permissions[]" multiple
                                class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}"
                                        x-bind:selected="role.permissions.includes({{ $permission->id }})">
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('permissions')" />
                </div> --}}

                <!-- Modal Footer (Buttons) -->
                <div class="mt-5 flex justify-end space-x-4">
                    <button type="button" @click="open = false"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-times"></i> {{ __('Cancel') }}
                    </button>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-save"></i> {{ __('Update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
