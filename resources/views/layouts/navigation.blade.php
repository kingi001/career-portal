<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Left Section: Logo, Title, and Navigation Links -->
            <div class="flex items-center">
                <!-- Logo and Title -->
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="h-8 w-auto text-gray-800" />
                    <span class="ml-2 text-xl font-semibold text-blue-800">BMA CAREER PORTAL</span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-6 ml-10">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <i class="fas fa-home text-blue-600"></i>
                        <span class="ml-1 text-sm font-semibold text-gray-700">Dashboard</span>
                    </x-nav-link>

                    <x-nav-link :href="route('personal-info')" :active="request()->routeIs('personal-info')">
                        <i class="fas fa-user text-blue-600"></i>
                        <span class="ml-1 text-sm font-semibold text-gray-700">Personal Info</span>
                    </x-nav-link>

                    <x-nav-link :href="route('education.index')" :active="request()->routeIs('education.index')">
                        <i class="fas fa-graduation-cap text-blue-600"></i>
                        <span class="ml-1 text-sm font-semibold text-gray-700">Education</span>
                    </x-nav-link>

                    <x-nav-link :href="route('career')">
                        <i class="fas fa-briefcase text-blue-600"></i>
                        <span class="ml-1 text-sm font-semibold text-gray-700">Experience</span>
                    </x-nav-link>

                    <x-nav-link :href="route('referee')">
                        <i class="fas fa-users text-blue-600"></i>
                        <span class="ml-1 text-sm font-semibold text-gray-700">Referees</span>
                    </x-nav-link>

                    <x-nav-link :href="route('career')">
                        <i class="fas fa-file-upload text-blue-600"></i>
                        <span class="ml-1 text-sm font-semibold text-gray-700">Documents</span>
                    </x-nav-link>

                    <x-nav-link :href="route('career')">
                        <i class="fas fa-paper-plane text-blue-600"></i>
                        <span class="ml-1 text-sm font-semibold text-gray-700">Application</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Section: User Dropdown -->
            <div class="hidden md:flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-gray-700 hover:text-gray-900 focus:outline-none">
                            <i class="fas fa-user-circle text-xl"></i>
                            <span class="ml-2 text-sm font-medium">{{ Auth::user()->name }}</span>
                            <svg class="ml-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fas fa-user-edit"></i>
                            <span class="ml-2">Profile</span>
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="ml-2">Logout</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = ! open" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'block': !open }" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'block': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fas fa-home"></i> Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('personal-info')" :active="request()->routeIs('personal-info')">
                <i class="fas fa-user"></i> Personal Info
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('education.index')" :active="request()->routeIs('education.index')">
                <i class="fas fa-graduation-cap"></i> Education
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('career')">
                <i class="fas fa-briefcase"></i> Experience
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('referee')">
                <i class="fas fa-users"></i> Referees
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('career')">
                <i class="fas fa-file-upload"></i> Documents
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('career')">
                <i class="fas fa-paper-plane"></i> Application
            </x-responsive-nav-link>
        </div>

        <div class="border-t border-gray-200">
            <div class="px-4 py-3">
                <div class="font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="py-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    <i class="fas fa-user-edit"></i> Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>