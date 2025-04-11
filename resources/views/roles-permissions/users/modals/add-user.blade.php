<div x-data="{ open: false }" @open-modal.window="if ($event.detail.modal === 'add-user') open = true" x-cloak>

    <!-- Modal Overlay -->
    <div x-show="open"
        class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-2 transition-opacity duration-300"
        x-transition.opacity>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-md transform transition-all duration-300 scale-95"
            x-show="open" x-transition.scale.90>

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 py-1 bg-indigo-600 text-white rounded-t-lg">
                <h2 class="text-lg font-semibold flex items-center gap-1">
                    <i class="fas fa-user-plus text-sm mr-1"></i> Add New User
                </h2>
                <button @click="open = false" class="text-white hover:text-gray-300 transition-colors duration-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form method="POST" action="{{ route('users.store') }}" class="p-4 space-y-4">
                @csrf

                <p class="text-sm text-gray-700">
                    Fill in the details to create a new system user.
                </p>

                <!-- Grid for Name, Email, Telephone, and Password -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" />
                        <x-text-input id="name" name="name" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required autofocus placeholder="John Doe" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required placeholder="user@example.com" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <!-- Telephone Number -->
                    <div>
                        <x-input-label for="telephone" :value="__('Telephone Number')" />
                        <x-text-input id="telephone" name="telephone" type="text"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="e.g. +2541234 / 071234" />
                        <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" name="password" type="password"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required placeholder="••••••••" />
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>

                </div>

                <!-- Role Selection (optional if using roles) -->
                @if (isset($roles) && count($roles))
                    <div>
                        <x-input-label for="role" :value="__('Assign Role')" />
                        <select id="role" name="role"
                            class="block w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">-- Select Role --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('role')" />
                    </div>
                @endif

                <!-- Modal Footer -->
                <div class="mt-5 flex justify-end space-x-4">
                    <button type="button" @click="open = false"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition">
                        <i class="fas fa-save"></i> Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
