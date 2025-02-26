<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
            <i class="fas fa-user-circle"></i> {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Update Profile Information -->
            <div class="p-6 sm:p-8 bg-white shadow-md rounded-lg">
                <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2 mb-4">
                    <i class="fas fa-user-edit text-blue-500"></i> {{ __('Update Profile Information') }}
                </h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 sm:p-8 bg-white shadow-md rounded-lg">
                <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2 mb-4">
                    <i class="fas fa-lock text-green-500"></i> {{ __('Update Password') }}
                </h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Account -->
            <div class="p-6 sm:p-8 bg-white shadow-md rounded-lg">
                <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-2 mb-4">
                    <i class="fas fa-user-slash text-red-500"></i> {{ __('Delete Account') }}
                </h3>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
