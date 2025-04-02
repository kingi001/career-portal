<div class="flex items-center space-x-6 mb-4 text-indigo-700">
    <!-- Roles Link -->
    <x-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')">
        <i class="fas fa-users-cog mr-1"></i> {{ __('Roles') }}
    </x-nav-link>

    <!-- Permissions Link -->
    <x-nav-link href="{{ route('permissions.index') }}" :active="request()->routeIs('permissions.index')">
        <i class="fas fa-shield-alt mr-1"></i> {{ __('Permissions') }}
    </x-nav-link>

    <!-- Users Link -->
    <x-nav-link href="#" :active="request()->routeIs('users.index')">
        <i class="fas fa-users mr-1"></i> {{ __('Users') }}
    </x-nav-link>
</div>
