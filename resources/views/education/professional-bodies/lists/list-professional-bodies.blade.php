<x-app-layout>
    <div class="py-2 container max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">

            <!-- Section Title -->
            <h2 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                <i class="fas fa-award text-blue-500 text-xl mr-1"></i>
                {{ __('Memberships to Professional Bodies') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Please provide details of your professional memberships with the most recent.') }}
            </p>

            <!-- Desktop Table View -->
            <div class="overflow-auto rounded-lg shadow-md mt-4 hidden md:block">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-gray-100 border-b-2 border-gray-200">
                        <tr class="text-gray-700">
                            <th class="p-3 text-sm font-semibold text-left">Professional Body</th>
                            <th class="p-3 text-sm font-semibold text-left">Membership No</th>
                            <th class="p-3 text-sm font-semibold text-left">Date Renewed</th>
                            <th class="p-3 text-sm font-semibold text-left">Next Renewal Date</th>
                            <th class="p-3 text-sm font-semibold text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($memberships as $membership)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-building text-gray-500"></i> {{ $membership->professional_body }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-id-badge text-gray-500"></i> {{ $membership->membership_no }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-calendar-check text-gray-500"></i> {{ $membership->date_renewed }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-calendar-alt text-gray-500"></i> {{ $membership->expiry_date }}
                                </td>
                                <td class="p-3 text-sm text-gray-700 whitespace-nowrap flex items-center gap-3">
                                    <button @click="$dispatch('open-modal', { modal: 'edit-membership', membership: {{ json_encode($membership) }} })"
                                        class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <form id="delete-form-{{ $membership->id }}" action="{{ route('memberships.destroy', $membership->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                                onclick="confirmDelete({{ $membership->id }})">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center">
                                    <div class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-3 rounded-lg shadow-md">
                                        <h4 class="text-md font-semibold flex items-center space-x-2">
                                            <i class="fas fa-info-circle"></i>
                                            <span>Information</span>
                                        </h4>
                                        <p class="mt-1 text-sm">No Membership to Professional Bodies Found.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile View (Stacked Cards) -->
            <div class="mt-4 space-y-4 md:hidden">
                @forelse ($memberships as $membership)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                        <h3 class="text-md font-semibold text-gray-900 flex items-center gap-2">
                            <i class="fas fa-building text-blue-500"></i> {{ $membership->professional_body }}
                        </h3>
                        <p class="text-sm text-gray-600 flex items-center gap-2">
                            <i class="fas fa-id-badge text-gray-500"></i>Membership No: {{ $membership->membership_no }}
                        </p>
                        <p class="text-sm text-gray-600 flex items-center gap-2">
                            <i class="fas fa-calendar-check text-gray-500"></i>Date Renewed : {{ $membership->date_renewed }}
                        </p>
                        <p class="text-sm text-gray-600 flex items-center gap-2">
                            <i class="fas fa-calendar-alt text-gray-500"></i>Expiry Date : {{ $membership->expiry_date }}
                        </p>

                        <div class="flex justify-between items-center mt-3 space-x-4">
                            <button @click="$dispatch('open-modal', { modal: 'edit-membership', membership: {{ json_encode($membership) }} })"
                                class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form id="delete-form-{{ $membership->id }}" action="{{ route('memberships.destroy', $membership->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                        onclick="confirmDelete({{ $membership->id }})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-4 bg-gray-100 rounded-lg text-center text-gray-500">
                        No professional memberships found.
                    </div>
                @endforelse
            </div>

            <!-- Add Membership Button -->
            @include('education.professional-bodies.modals.add-professional-body')
            @include('education.professional-bodies.modals.edit-professional-body')


        </div>
    </div>
</x-app-layout>
