<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Update Profile Information -->
            <div class="bg-white shadow-lg rounded-lg p-6 sm:p-8 border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-700 flex items-center gap-3 mb-6">
                    <i class="fas fa-user-edit text-blue-600 text-2xl"></i>
                    <span>{{ __('Update Profile Information') }}</span>
                </h3>
                <div class="max-w-3xl mx-auto">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white shadow-lg rounded-lg p-6 sm:p-8 border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-700 flex items-center gap-3 mb-6">
                    <i class="fas fa-lock text-green-600 text-2xl"></i>
                    <span>{{ __('Update Password') }}</span>
                </h3>
                <div class="max-w-3xl mx-auto">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Account -->
            <div class="bg-white shadow-lg rounded-lg p-6 sm:p-8 border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-700 flex items-center gap-3 mb-6">
                    <i class="fas fa-user-slash text-red-600 text-2xl"></i>
                    <span>{{ __('Delete Account') }}</span>
                </h3>
                <div class="max-w-3xl mx-auto">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

