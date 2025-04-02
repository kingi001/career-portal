<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Update Profile Information -->
            <div class="bg-white shadow rounded-lg p-4 border border-gray-200">
                <h3 class="text-base font-medium text-indigo-700 flex items-center gap-2 mb-4">
                    <i class="fas fa-user-edit text-blue-500"></i>
                    <span>{{ __('Update Profile') }}</span>
                </h3>
                <div class="text-sm">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white shadow rounded-lg p-4 border border-gray-200">
                <h3 class="text-base font-medium text-indigo-700 flex items-center gap-2 mb-4">
                    <i class="fas fa-lock text-green-600"></i>
                    <span>{{ __('Update Password') }}</span>
                </h3>
                <div class="text-sm">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Account -->
            <div class="bg-white shadow rounded-lg p-4 border border-gray-200">
                <h3 class="text-base font-medium text-indigo-700 flex items-center gap-2 mb-4">
                    <i class="fas fa-user-slash text-red-600"></i>
                    <span>{{ __('Delete Account') }}</span>
                </h3>
                <div class="text-sm">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>


