<x-app-layout>
    <div class="py-4 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">

            @include('roles-permissions.nav-links')

            <!-- Page Heading -->
            <div class="flex items-center justify-between mb-1 pb-1 border-b border-gray-200">
                <h3 class="text-base font-semibold text-indigo-700 flex items-center gap-2">
                    <i class="fas fa-users-cog text-blue-600 text-xl"></i>
                    {{ __('System Users') }}
                </h3>
            </div>
            <div x-data="{ showForm: false }" class="w-full">

                <!-- Search Button Justified at the End -->
                <div class="flex justify-end mt-1">
                    <button @click="showForm = !showForm"
                        class="bg-gray-600 text-white text-sm py-1 px-4 rounded-md hover:bg-gray-700 transition duration-200">
                        <i class="fa fa-search mr-1"></i> Search
                    </button>
                </div>

                <!-- Search Form with Smooth Transition -->
                <div x-show="showForm" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="mx-auto max-w-3xl bg-white p-2 rounded-lg mt-1">

                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <form method="GET" action="{{ url('users') }}" id="search-form"
                            class="space-y-2 space-x-1 text-sm">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 items-center">
                                <!-- User Role -->
                                <div>
                                    <x-input-label for="user_role_id" :value="__('User Role')" />
                                    <select id="user_role_id" name="user_role_id" aria-label="Select User Role"
                                        class="form-control w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">--Select roles--</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Status -->
                                <div>
                                    <x-input-label for="data-opt" :value="__('Status')" />
                                    <select id="data-opt" name="data-opt" aria-label="Select User Status"
                                        class="form-control w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">--Select status--</option>
                                        <option value="active">Active</option>
                                        <option value="deleted">Deleted</option>
                                    </select>
                                </div>

                                <!-- Email -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <input type="email" id="email" name="email"
                                        value="{{ request()->get('email') }}"
                                        class="form-control w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        placeholder="Enter email" />
                                </div>

                                <!-- Phone Number -->
                                <div>
                                    <x-input-label for="phone" :value="__('Phone Number')" />
                                    <input type="text" id="phone" name="phone"
                                        value="{{ request()->get('phone') }}"
                                        class="form-control w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        placeholder="Enter phone number" />
                                </div>
                            </div>

                            <!-- Search and Reset Buttons -->
                            <div class="flex justify-end mt-4 space-x-4">
                                <div class="flex space-x-4">
                                    <!-- Reset Button -->
                                    <button type="button"
                                        class="bg-gray-400 text-white py-1 px-4 rounded-md text-sm hover:bg-gray-500 transition duration-200 flex items-center"
                                        @click="showForm = false">
                                        <i class="fa fa-repeat text-sm mr-1"></i>
                                        <span>Reset</span>
                                    </button>

                                    <!-- Submit Button -->
                                    <button type="submit"
                                        class="bg-blue-600 text-white py-1 px-4 rounded-md text-sm hover:bg-blue-700 transition duration-200 flex items-center">
                                        <i class="fa fa-search text-sm mr-1"></i>
                                        <span>Search</span>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Desktop Table -->
            <div class="overflow-auto rounded-lg shadow mt-1 hidden md:block">
                <table class="w-full border-collapse text-sm bg-white rounded-lg overflow-hidden shadow-sm">
                    <thead class="bg-indigo-50 text-indigo-800 uppercase text-xs font-medium tracking-wider">
                        <tr>
                            <th class="p-3 text-center"><i class="fas fa-hashtag"></i></th>
                            <th class="p-3 text-left"><i class="fas fa-user mr-1 text-gray-500"></i>Name</th>
                            <th class="p-3 text-left"><i class="fas fa-envelope mr-1 text-gray-500"></i>Email</th>
                            <th class="p-3 text-left"><i class="fas fa-phone-alt mr-1 text-gray-500"></i>Telephone</th>
                            <th class="p-3 text-center"><i class="fas fa-user-shield mr-1 text-gray-500"></i>User Role
                            </th>
                            <th class="p-3 text-center"><i class="fas fa-toggle-on mr-1 text-gray-500"></i>Status</th>
                            <th class="p-3 text-center"><i class="fas fa-cogs mr-1 text-gray-500"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($users as $key => $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-3 text-center text-gray-800">{{ $key + 1 }}</td>
                                <td class="p-3 text-gray-700 whitespace-nowrap">
                                    {{ $user->name }}
                                </td>
                                <td class="p-3 text-gray-700 whitespace-nowrap">
                                    {{ $user->email ?? 'N/A' }}
                                </td>
                                <td class="p-3 text-gray-700 whitespace-nowrap">
                                    {{ $user->phone ?? 'N/A' }}
                                </td>
                                <td class="p-3 text-center">
                                    <span
                                        class="inline-flex items-center px-2 py-1 text-xs font-semibold text-white bg-blue-600 rounded-full">
                                        {{ $user->roles->first()->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="p-3 text-center">
                                    @if (is_null($user->deleted_at))
                                        <span
                                            class="bg-green-600 rounded-full text-xs font-semibold px-2 py-1 text-white inline-flex gap-1 items-center">
                                            <i class="fa fa-check"></i> Active
                                        </span>
                                    @else
                                        <span
                                            class="bg-red-600 rounded-full text-xs font-semibold px-2 py-1 text-white inline-flex gap-1 items-center">
                                            <i class="fa fa-times"></i> Deleted
                                        </span>
                                    @endif
                                </td>
                                <td class="p-3 text-center">
                                    <div class="flex justify-center gap-4 flex-wrap">
                                        <!-- Edit Button -->
                                        <button
                                            @click="$dispatch('open-modal', { modal: 'edit-user', user: {{ json_encode($user) }} })"
                                            class="text-yellow-500 hover:text-yellow-600 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                            <i class="fas fa-edit"></i> {{ __('Edit') }}
                                        </button>

                                        <!-- Delete Button -->
                                        <form id="delete-form-{{ $user->id }}"
                                            action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $user->id }})"
                                                class="text-red-500 hover:text-red-700 flex items-center gap-1">
                                                <i class="fas fa-trash-alt"></i> {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-4 text-center">
                                    <div
                                        class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-3 rounded-lg shadow-sm">
                                        <h4 class="text-md font-semibold flex items-center justify-center gap-2">
                                            <i class="fas fa-info-circle"></i>
                                            <span>Information</span>
                                        </h4>
                                        <p class="mt-1 text-sm">No user records found in the system.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


                @include('roles-permissions.users.modals.add-user')
                @include('roles-permissions.users.modals.edit-user')
            </div>

            <div class="mt-2 flex justify-between items-center gap-1">
                <div class="mt-2 flex flex-wrap justify-between items-center gap-4">
                    <!-- Export Dropdown -->
                    <div x-data="{ exportOpen: false }" class="relative">
                        <button @click="exportOpen = !exportOpen" type="button"
                            class="inline-flex items-center px-4 py-1 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700 transition">
                            <i class="fas fa-download mr-2"></i> Export
                            <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="exportOpen" @click.away="exportOpen = false" x-transition
                            class="absolute mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-20">
                            <a href="{{ route('export-users-pdf') }}"
                                class="flex items-center px-4 py-1 text-sm text-gray-600 hover:bg-gray-50 transition rounded-md"
                                target="_blank" download>
                                <i class="fas fa-file-pdf mr-2"></i> Export as PDF
                            </a>
                            <a href="{{ route('export-users-csv') }}"
                                class="flex items-center px-4 py-1 text-sm text-blue-600 hover:bg-blue-50 transition rounded-md">
                                <i class="fas fa-file-csv mr-2"></i> Export as CSV
                            </a>
                            <a href="{{ route('export-users-excel') }}"
                                class="flex items-center px-4 py-1 text-sm text-green-600 hover:bg-green-50 transition rounded-md">
                                <i class="fas fa-file-excel mr-2"></i> Export as Excel
                            </a>

                        </div>

                    </div>

                    <!-- Print and Import Buttons -->
                    <div class="flex gap-2">
                        <a href="{{ route('users.print') }}"
                            class="inline-flex items-center px-4 py-1 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                            <i class="fas fa-print mr-2"></i> Print
                        </a>

                        <a href="#"
                            class="inline-flex items-center px-4 py-1 bg-yellow-500 text-white text-sm font-medium rounded hover:bg-yellow-600 transition">
                            <i class="fas fa-upload mr-2"></i> Import
                        </a>
                    </div>
                </div>
                @can('create user')
                    <button @click="$dispatch('open-modal', { modal: 'add-user' })"
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-user-plus text-sm"></i>
                        {{ __('Add System User') }}
                    </button>
                @endcan

            </div>



            <!-- Mobile View -->
            <div class="md:hidden">
                <!-- Loop through the users and display them on mobile -->
                @forelse ($users as $key => $user)
                    <div class="border rounded-lg p-4 mb-4 shadow-sm bg-white space-y-2">
                        <div class="text-sm text-gray-500">#{{ $key + 1 }}</div>
                        <div class="text-base font-semibold text-indigo-700">{{ $user->name }}</div>
                        <div class="text-sm text-gray-600"><strong>Email:</strong> {{ $user->email ?? 'N/A' }}</div>
                        <div class="text-sm text-gray-600"><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</div>
                        <div class="text-sm text-gray-600"><strong>Role:</strong>
                            {{ $user->roles->first()->name ?? 'N/A' }}</div>

                        <!-- User Status -->
                        <div>
                            <span
                                class="inline-flex items-center px-2 py-1 text-xs font-semibold text-white bg-green-600 rounded-full">
                                <i class="fa fa-check mr-1 text-xs"></i>
                                {{ $user->status == 'active' ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-wrap gap-4 mt-2">
                            <!-- Edit -->
                            <button class="text-yellow-500 hover:text-yellow-600 text-sm flex items-center gap-1"
                                @click="fetchUser({{ $user->id }})">
                                <i class="fas fa-edit"></i> Edit
                            </button>

                            <!-- Delete -->
                            <form id="delete-form-mobile-{{ $user->id }}"
                                action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="text-red-500 hover:text-red-600 text-sm flex items-center gap-1"
                                    onclick="confirmDelete({{ $user->id }})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 text-sm mt-4">No users found.</p>
                @endforelse
            </div>

</x-app-layout>
