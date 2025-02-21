<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Left Section: Logo and Navigation Links -->
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    
                    <x-application-logo class="h-4 w-auto text-gray-800" />
                    <span class="text-lg font-semibold text-gray-800">CAREER PORTAL</span>
                    
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


                <!-- Mobile Navigation Menu -->
   <div x-data="{ open: false }">
    <!-- Hamburger Button -->
    <button @click="open = true" class="md:hidden p-2 focus:outline-none">
        <i class="fas fa-bars text-xl text-gray-800"></i>
    </button>

    <!-- Mobile Nav -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 -translate-x-full scale-95"
         x-transition:enter-end="opacity-100 translate-x-0 scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 translate-x-0 scale-100"
         x-transition:leave-end="opacity-0 -translate-x-full scale-95"
         @click.away="open = false"
         class="fixed inset-y-0 left-0 w-72 bg-white/80 dark:bg-gray-900/90 backdrop-blur-lg shadow-2xl rounded-r-2xl z-50 md:hidden">

        <!-- Logo and Portal Title -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white text-center py-3 px-4 rounded-t-2xl shadow-md">
            <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo" 
                 class="w-16 h-16 mx-auto mb-2 rounded-full border-2 border-white shadow-lg">
            <h1 class="text-lg font-semibold">Bandari Maritime Academy</h1>
            <p class="text-xs text-gray-200">Career Portal</p>
        </div>

        <!-- User Info -->
        <div class="px-5 py-4 flex items-center justify-between border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center space-x-3">
               
                <div>
                    <span class="block font-semibold text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</span>
                </div>
            </div>
            <!-- Close Button -->
            <button @click="open = false" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Navigation Links -->
        <div class="pt-3 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fas fa-home text-blue-600"></i> <span class="ml-2">Dashboard</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('personal-info')" :active="request()->routeIs('personal-info')">
                <i class="fas fa-user text-blue-600"></i> <span class="ml-2">Personal Info</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('education.index')" :active="request()->routeIs('education.index')">
                <i class="fas fa-graduation-cap text-blue-600"></i> <span class="ml-2">Education</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('career')">
                <i class="fas fa-briefcase text-blue-600"></i> <span class="ml-2">Experience</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('referee')">
                <i class="fas fa-users text-blue-600"></i> <span class="ml-2">Referees</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('career')">
                <i class="fas fa-file-upload text-blue-600"></i> <span class="ml-2">Documents</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('career')">
                <i class="fas fa-paper-plane text-blue-600"></i> <span class="ml-2">Application</span>
            </x-responsive-nav-link>
        </div>

        <!-- Profile & Logout -->
        <div class="absolute bottom-0 left-0 w-full bg-gray-100 dark:bg-gray-800 border-t border-gray-300 dark:border-gray-700 py-3 px-5 rounded-br-2xl">
            <x-responsive-nav-link :href="route('profile.edit')" class="hover:bg-gray-300 dark:hover:bg-gray-700 transition-all rounded-md p-2">
                <i class="fas fa-user-cog text-blue-600"></i> <span class="ml-2">Profile Settings</span>
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="hover:bg-red-100 dark:hover:bg-red-800 transition-all rounded-md p-2 text-red-600">
                    <i class="fas fa-sign-out-alt text-blue-600"></i> <span class="ml-2">Logout</span>
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</div>

           

            <!-- Mobile Menu Button -->
            {{-- <div class="md:hidden flex items-center">
                <button @click="open = ! open" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'block': !open }" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'block': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> --}}
        </div>
    </div>

   <div class="bg-gray-100 dark:bg-gray-800 py-2 pl-7">
    <div class="max-w-7xl mx-auto flex items-center text-sm text-gray-600 dark:text-gray-400">
        <a href="{{ route('dashboard') }}" class="text-blue-600 dark:text-blue-400 hover:underline ml-7">
            <i class="fas fa-home"></i> Home
        </a>
        <span class="mx-2">/</span>
        <span class="text-gray-700 dark:text-gray-300">{{ ucwords(str_replace('-', ' ', request()->route()->getName())) }}</span>
    </div>
</div>

    
    
    



</nav>
