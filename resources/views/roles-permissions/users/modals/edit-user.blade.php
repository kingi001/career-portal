<div x-data="{ open: false, user: {} }"
    @open-modal.window="if ($event.detail.modal === 'edit-user') { open = true; user = $event.detail.user; }" x-cloak>
    <!-- Modal Overlay -->
    <div x-show="open"
        class="fixed inset-0 mt-4 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 transition-opacity duration-300"
        x-transition.opacity>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-xl transform transition-all duration-300 scale-95"
            x-show="open" x-transition.scale.90>

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-2 bg-indigo-600 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-user-tie"></i> Edit User
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-300 transition-colors duration-200">
                    <i class="fas fa-times text-xl text-blue-400"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" :action="'/users/' + user.id" class="p-5 space-y-4">
                @csrf
                @method('PUT')

                <p class="text-sm text-gray-700 flex items-center gap-2">
                    <i class="fas fa-info-circle text-blue-400"></i> Update the user details below.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Full Name -->
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" />
                        <div class="relative">
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            <x-text-input id="name" name="name" type="text"
                                class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10"
                                x-model="user.name" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" />
                        <div class="relative">
                            <i
                                class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            <x-text-input id="email" name="email" type="email"
                                class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10"
                                x-model="user.email" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <x-input-label for="phone" :value="__('Phone Number')" />
                        <div class="relative">
                            <i
                                class="fas fa-phone-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            <x-text-input id="phone" name="phone" type="text"
                                class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10"
                                x-model="user.phone" required />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password  *leave blank to keep current* ')" />
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            <x-text-input id="password" name="password" type="password" placeholder="••••••••"
                                class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>

                    <!-- Role -->
                    <div>
                        <x-input-label for="role" :value="__('Role')" />
                        <div class="relative">
                            <i
                                class="fas fa-user-shield absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                            <select id="roles" name="roles" x-model="user.roles"
                                class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10">
                                <option value="">-- Select Role --</option>
                                @foreach ($roles as $role)
                                    <option :value="'{{ $role->name }}'"
                                        x-bind:selected="user.role === '{{ $role->name }}'">{{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('roles')" />
                    </div>
                </div>




                <!-- Modal Footer (Buttons) -->
                <div class="mt-5 flex justify-end flex-wrap gap-3">

                    <!-- Cancel Button -->
                    <button type="button" @click="open = false"
                        class="min-w-[140px] bg-gray-500 hover:bg-gray-600 text-white px-2 py-1 text-sm rounded-md flex items-center justify-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-times"></i> {{ __('Cancel') }}
                    </button>

                    <!-- Update Button -->
                    <div x-show="!user.deleted_at">
                        <button type="submit"
                            class="min-w-[140px] bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 text-sm rounded-md flex items-center justify-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                            <i class="fas fa-save"></i> {{ __('Update') }}
                        </button>
                    </div>

                    <!-- Restore Button -->
                    <div x-show="user.deleted_at">
                        <form :action="'/users/' + user.id + '/restore'" method="POST" x-data @submit.stop>
                            @csrf
                            <button type="submit"
                                class="min-w-[140px] bg-green-600 hover:bg-green-700 text-white px-2 py-1 text-sm rounded-md flex items-center justify-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                                <i class="fas fa-undo-alt"></i> {{ __('Restore') }}
                            </button>
                        </form>
                    </div>

                    <!-- Force Delete Button -->
                    <div x-show="user.deleted_at">
                        <form :action="'/users/' + user.id + '/force-delete'" method="POST" x-data
                            @submit.prevent="if(confirm('Are you sure you want to permanently delete this user? This action cannot be undone.')) { $el.submit(); }">
                            @csrf
                            <button type="submit"
                                class="min-w-[140px] bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-sm rounded-md flex items-center justify-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                                <i class="fas fa-trash-alt"></i> {{ __('Delete') }}
                            </button>
                        </form>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
