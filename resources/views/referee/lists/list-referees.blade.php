<x-app-layout>
    <div class="py-6 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">

            <!-- Section Header -->
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-user-tie text-blue-900"></i> {{ __('Referees') }}
                    </h2>
                    <p class="text-sm text-gray-600">
                        {{ __('Add referees who can vouch for your professional experience.') }}
                    </p>
                </div>
            </div>

            <!-- Referee Table for Desktop -->
            <div class="hidden md:block overflow-x-auto rounded-lg shadow">
                <table class="w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-gray-100">
                        <tr class="text-left text-gray-700">
                            <th class="p-3 text-sm font-semibold w-8">
                                <i class="fas fa-hashtag text-blue-400"></i>
                            </th>
                            <th class="p-3 text-sm font-semibold">
                                <i class="fas fa-user text-blue-400"></i> Full Name
                            </th>
                            <th class="p-3 text-sm font-semibold">
                                <i class="fas fa-briefcase text-blue-400"></i> Job Title
                            </th>
                            <th class="p-3 text-sm font-semibold">
                                <i class="fas fa-building text-blue-400"></i> Company
                            </th>
                            <th class="p-3 text-sm font-semibold">
                                <i class="fas fa-phone text-blue-400"></i> Phone
                            </th>
                            <th class="p-3 text-sm font-semibold">
                                <i class="fas fa-envelope text-blue-400"></i> Email
                            </th>
                            <th class="p-3 text-sm font-semibold text-center w-28">
                                <i class="fas fa-cogs text-blue-400"></i> Actions
                            </th>
                        </tr>

                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($referees as $referee)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-3 text-sm text-gray-800">{{ $loop->iteration }}</td>
                                <td class="p-3 text-sm font-medium text-gray-900">{{ $referee->full_name }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $referee->job_title }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $referee->company }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $referee->phone }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $referee->email }}</td>
                                <td class="p-3 text-sm text-center flex justify-center space-x-3">
                                    <button
                                        @click="$dispatch('open-modal', { modal: 'edit-referee', referee: {{ json_encode($referee) }} })"
                                        class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form id="delete-form-{{ $referee->id }}"
                                        action="{{ route('referees.destroy', $referee->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                            onclick="confirmDelete({{ $referee->id }})">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-4 text-center text-gray-500">
                                    <i class="fas fa-exclamation-circle"></i> No referees added yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile View -->
            <div class="md:hidden space-y-3 mt-3">
                @forelse ($referees as $referee)
                    <div class="bg-white p-4 shadow-lg rounded-lg border border-gray-200">
                        <div>
                            <p class="text-sm font-semibold text-gray-800 flex items-center gap-1">
                                <i class="fas fa-user text-blue-500"></i> {{ $referee->full_name }}
                            </p>
                            <p class="text-sm text-gray-600 flex items-center gap-1">
                                <i class="fas fa-briefcase text-gray-400"></i> {{ $referee->job_title }}
                            </p>
                            <p class="text-sm text-gray-600 flex items-center gap-1">
                                <i class="fas fa-building text-gray-400"></i> {{ $referee->company }}
                            </p>
                            <p class="text-xs text-gray-500 flex items-center gap-1">
                                <i class="fas fa-phone-alt text-gray-400"></i> {{ $referee->phone }}
                            </p>
                            <p class="text-xs text-gray-500 flex items-center gap-1">
                                <i class="fas fa-envelope text-gray-400"></i> {{ $referee->email }}
                            </p>
                        </div>

                        <!-- Buttons Section -->
                        <div class="mt-3 flex justify-end space-x-3">
                            <button
                                @click="$dispatch('open-modal', { modal: 'edit-referee', referee: {{ json_encode($referee) }} })"
                                class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form id="delete-form-{{ $referee->id }}"
                                action="{{ route('referees.destroy', $referee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                    onclick="confirmDelete({{ $referee->id }})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm text-center">
                        <i class="fas fa-exclamation-circle"></i> No referees added yet.
                    </p>
                @endforelse
            </div>
            <div class="mt-6 flex justify-end">
                <button @click="$dispatch('open-modal', { modal: 'add-referee' })"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-plus-circle text-xs"></i> {{ __('Add Referee') }}
                </button>
            </div>

        </div>
    </div>

    @include('referee.modals.add-referee')
    @include('referee.modals.edit-referee')

</x-app-layout>
