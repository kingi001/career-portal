<x-app-layout>
    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">

            <!-- Section Title -->
            <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                <i class="fas fa-graduation-cap text-blue-500 text-xl"></i>
                {{ __('Academic Qualifications') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Please provide your educational information with the most recent.') }}
            </p>

            <!-- Desktop Table View -->
            <div class="overflow-auto rounded-lg shadow-md mt-4 hidden md:block">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-blue-50 border-b-2 border-gray-200">
                        <tr class="text-gray-700">
                            <th class="p-3 text-sm font-semibold text-left">Institution</th>
                            <th class="p-3 text-sm font-semibold text-left">Level of Study</th>
                            <th class="p-3 text-sm font-semibold text-left">Field of Study</th>
                            <th class="p-3 text-sm font-semibold text-left">Award</th>
                            <th class="p-3 text-sm font-semibold text-left">Start Date</th>
                            <th class="p-3 text-sm font-semibold text-left">End Date</th>
                            <th class="p-3 text-sm font-semibold text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($educations as $education)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-school text-gray-500"></i> {{ $education->institution }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-graduation-cap text-gray-500"></i> {{ $education->level_of_study }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-book text-gray-500"></i> {{ $education->field_of_study }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $education->award }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $education->start_date }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $education->end_date }}</td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap flex items-center gap-3">
                                    <button @click="$dispatch('open-modal', { modal: 'edit-education', education: {{ json_encode($education) }} })"
                                        class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <form id="delete-form-{{ $education->id }}" action="{{ route('education.destroy', $education->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                                onclick="confirmDelete({{ $education->id }})">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>


                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-4 text-center text-gray-500">
                                    No education details found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile View (Stacked Cards) -->
            <div class="mt-4 space-y-4 md:hidden">
                @forelse ($educations as $education)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                        <h3 class="text-md font-semibold text-gray-900 flex items-center gap-2">
                            <i class="fas fa-school text-blue-500"></i> {{ $education->institution }}
                        </h3>
                        <p class="text-sm text-gray-600 flex items-center gap-2">
                            <i class="fas fa-graduation-cap text-gray-500"></i> {{ $education->level_of_study }}
                        </p>
                        <p class="text-sm text-gray-600 flex items-center gap-2">
                            <i class="fas fa-book text-gray-500"></i> {{ $education->field_of_study }}
                        </p>
                        <p class="text-sm text-gray-600 flex items-center gap-2">
                            <i class="fas fa-award text-gray-500"></i> {{ $education->award }}
                        </p>
                        <p class="text-sm text-gray-600 flex items-center gap-2">
                            <i class="fas fa-calendar-alt text-gray-500"></i>
                            {{ $education->start_date }} - {{ $education->end_date }}
                        </p>

                        <div class="flex justify-between items-center mt-3 space-x-4">
                            <button @click="$dispatch('open-modal', { modal: 'edit-education', education: {{ json_encode($education) }} })"
                                class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form id="delete-form-{{ $education->id }}" action="{{ route('education.destroy', $education->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                        onclick="confirmDelete({{ $education->id }})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-4 bg-gray-100 rounded-lg text-center text-gray-500">
                        No education details found.
                    </div>
                @endforelse
            </div>

            <!-- Add Education Button -->
            @include('education.academic-qualifications.modals.add-education')
            @include('education.academic-qualifications.modals.edit-education')

        </div>
    </div>
</x-app-layout>



