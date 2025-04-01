<section class="space-y-5">
    <header>
        <h2 class="text-lg font-medium text-gray-900 flex items-center gap-2">
            <i class="fas fa-exclamation-triangle text-red-500"></i> {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Delete Account Button -->
    <x-danger-button
        x-data="{}"
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="w-full sm:w-auto flex items-center gap-2 py-2 text-sm"
    >
        <i class="fas fa-trash-alt"></i> {{ __('Delete Account') }}
    </x-danger-button>

    <!-- Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-4">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                <i class="fas fa-exclamation-circle text-red-500"></i> {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <!-- Password Input -->
            <div class="mt-4">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <div class="relative">
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-full pl-10 text-sm"
                        placeholder="{{ __('Enter your password to confirm') }}"
                    />
                    <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-sm" />
            </div>

            <!-- Action Buttons -->
            <div class="mt-5 flex justify-end gap-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="flex items-center gap-2 text-sm">
                    <i class="fas fa-times"></i> {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="flex items-center gap-2 text-sm">
                    <i class="fas fa-trash"></i> {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
