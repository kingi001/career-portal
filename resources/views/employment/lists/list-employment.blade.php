<x-app-layout>
    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg">

            <div class="flex justify-between items-center">
                <h2 class="text-base font-medium text-indigo-700 flex items-center gap-1">
                    <i class="fas fa-briefcase text-blue-600"></i> {{ __('Employment History') }}
                </h2>
            </div>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Please provide your job history starting with the most recent.') }}
            </p>

            <div class="mt-6">
                <!-- Desktop View -->
                <div class="hidden md:block overflow-x-auto rounded-lg shadow">
                    <table class="w-full bg-white border border-gray-300 rounded-lg">
                        <thead class="bg-blue-100 text-gray-700">
                            <tr class="text-left">
                                <th class="p-3 text-sm font-semibold">#</th>
                                <th class="p-3 text-sm font-semibold">Company</th>
                                <th class="p-3 text-sm font-semibold">Designation</th>
                                <th class="p-3 text-sm font-semibold">Salary (KSh)</th>
                                <th class="p-3 text-sm font-semibold">Start Date</th>
                                <th class="p-3 text-sm font-semibold">End Date</th>
                                <th class="p-3 text-sm font-semibold">Responsibilities</th>
                                <th class="p-3 text-sm font-semibold text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($employments as $employment)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-3 text-sm">{{ $loop->iteration }}</td>
                                    <td class="p-3 text-sm font-medium text-gray-800">{{ $employment->company }}</td>
                                    <td class="p-3 text-sm text-gray-700 ">{{ $employment->designation }}</td>
                                    <td class="p-3 text-sm text-gray-700">KSh {{ number_format($employment->salary) }}</td>
                                    <td class="p-3 text-sm text-gray-600">{{ \Carbon\Carbon::parse($employment->start_date)->format('M Y') }}</td>
                                    <td class="p-3 text-sm text-gray-600">{{ $employment->end_date ? \Carbon\Carbon::parse($employment->end_date)->format('M Y') : 'Present' }}</td>
                                    <td class="p-3 text-sm text-gray-700">{{ Str::limit($employment->responsibilities, 5) }}</td>
                                    <td class="p-3 text-sm flex justify-center space-x-3">
                                        <button @click="$dispatch('open-modal', { modal: 'edit-employment', employment: {{ json_encode($employment) }} })"
                                class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form id="delete-form-{{ $employment->id }}" action="{{ route('employment.destroy', $employment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                        onclick="confirmDelete({{ $employment->id }})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="p-4 text-center">
                                    <div class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-3 rounded-lg shadow-md">
                                        <h4 class="text-md font-semibold flex items-center justify-center space-x-2">
                                            <i class="fas fa-info-circle"></i>
                                            <span>Information</span>
                                        </h4>
                                        <p class="mt-1 text-sm">No Employment History Added Yet. Click <strong>Add Employment</strong></p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>


                </div>

                <!-- Mobile View -->
                <div class="md:hidden space-y-4 mt-4">
                    @forelse ($employments as $employment)
                        <div class="bg-white p-4 shadow-lg rounded-lg border border-gray-200">
                            <div>
                                <p class="text-sm font-semibold text-gray-800 flex items-center gap-1">
                                    <i class="fas fa-building text-blue-600"></i> {{ $employment->company }}
                                </p>
                                <p class="text-sm text-gray-700 flex items-center gap-1">
                                    <i class="fas fa-user-tie text-gray-500"></i> {{ $employment->designation }}
                                </p>
                                <p class="text-sm text-gray-700 flex items-center gap-1">
                                    <i class="fas fa-money-bill-wave text-green-500"></i> KSh {{ number_format($employment->salary) }}
                                </p>
                                <p class="text-xs text-gray-600 flex items-center gap-1">
                                    <i class="fas fa-calendar-alt text-gray-400"></i>
                                    {{ \Carbon\Carbon::parse($employment->start_date)->format('M Y') }} -
                                    {{ $employment->end_date ? \Carbon\Carbon::parse($employment->end_date)->format('M Y') : 'Present' }}
                                </p>
                            </div>

                            <!-- Buttons Moved to Bottom -->
                            <div class="mt-4 flex justify-between border-t pt-3">
                                <button @click="$dispatch('open-modal', { modal: 'edit-employment', employment: {{ json_encode($employment) }} })"
                                class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form id="delete-form-{{ $employment->id }}" action="{{ route('employment.destroy', $employment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                        onclick="confirmDelete({{ $employment->id }})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                            </div>
                        </div>
                    @empty
                    <div class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-3 rounded-lg shadow-md">
                        <h4 class="text-md font-semibold flex items-center space-x-2">
                            <i class="fas fa-info-circle"></i>
                            <span>Information</span>
                        </h4>
                        <p class="mt-5 text-sm items-center text-center">{{ __('No employment history added yet.Click Add') }} </p>
                    </div>
                    @endforelse
                </div>

                <div class="mt-6 flex justify-end">
                    <button @click="$dispatch('open-modal', { modal: 'add-employment' })"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 text-sm rounded-md flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-plus-circle text-xs"></i> {{ __('Add Employment') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('employment.modals.add-employment')
    @include('employment.modals.edit-employment')

</x-app-layout>
