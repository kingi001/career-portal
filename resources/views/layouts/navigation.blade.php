<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-12 items-center">
            <!-- Left Section: Logo and Navigation Links -->
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}"
                    class="flex items-center space-x-4 hover:text-blue-600 transition duration-300 ease-in-out">
                    <img src="{{ asset('images/logo.png') }}" alt="BMA Logo" class="h-8 w-auto mx-auto">
                    <!-- Show "BMA E-RECRUITMENT" on Mobile -->
                    <span
                        class="text-base font-semibold text-indigo-700 tracking-wider sm:hidden uppercase animate-fade-in">
                        BMA E-RECRUITMENT PORTAL
                    </span>
                    <span class="text-base font-semibold text-indigo-600 tracking-wide hidden sm:block">
                        E-RECRUITMENT
                    </span>
                </a>
                <div class="hidden md:flex space-x-4 ml-10">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">

                        <svg class="w-4 h-4 me-1 text-blue-600 dark:text-blue-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class=" text-sm font-medium text-gray-700">Dashboard</span>
                    </x-nav-link>

                    <x-nav-link :href="route('personal-info.show')" :active="request()->routeIs('personal-info.show')">
                        <i class="fas fa-user text-blue-600"></i>
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" aria-hidden="true" class="w-4 h-4  text-blue-600 me-1 dark:text-blue-500" >
                            <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                          </svg> --}}

                        <span class="ml-1 text-sm font-normal text-gray-700">Personal Details</span>
                    </x-nav-link>

                    <!-- Education Dropdown -->
                    <div class="hidden md:flex items-center">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <button class="flex items-center text-gray-700 hover:text-blue-700 focus:outline-none"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-graduation-cap text-blue-600"></i>
                                    <span class="ml-1 text-sm font-normal">Education</span>
                                    <i class="fas fa-angle-down ml-1 text-sm"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-60 bg-white shadow-lg rounded-md">
                                    <x-dropdown-link :href="route('education.index')" :active="request()->routeIs('education.index')"
                                        class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                                        <i class="fas fa-university text-gray-700 mr-3"></i>
                                        <span class="flex-1">Academic Qualifications</span>
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('qualifications.index')" :active="request()->routeIs('qualifications.index')"
                                        class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                                        <i class="fas fa-certificate text-gray-700 mr-3"></i>
                                        <span class="flex-1">Professional Qualifications</span>
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('memberships.index')" :active="request()->routeIs('memberships.index')"
                                        class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                                        <i class="fas fa-award text-gray-700 mr-3"></i>
                                        <span class="flex-1">Membership to Professional Bodies</span>
                                    </x-dropdown-link>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <x-nav-link :href="route('employment.index')" :active="request()->routeIs('employment.index')">
                        <i class="fas fa-briefcase text-blue-600"></i>
                        <span class="ml-1 text-sm font-normal text-gray-700">Employment</span>
                    </x-nav-link>

                    <x-nav-link :href="route('referees.index')" :active="request()->routeIs('referees.index')">
                        <i class="fas fa-users text-blue-600"></i>
                        <span class="ml-1 text-sm font-normal text-gray-700">Referees</span>
                    </x-nav-link>

                    <x-nav-link :href="route('documents.index')" :active="request()->routeIs('documents.index')">
                        <i class="fas fa-file-upload text-blue-600"></i>
                        <span class="ml-1 text-sm font-normal text-gray-700">Documents</span>
                    </x-nav-link>

                    <x-nav-link :href="route('application')" :active="request()->routeIs('application')">
                        <i class="fas fa-paper-plane text-blue-600"></i>
                        <span class="ml-1 text-sm font-normal text-gray-700">Application</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Section: Settings Dropdown (Desktop) -->
            <div class="hidden md:flex items-center">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="flex items-center text-gray-700 hover:text-blue-700 focus:outline-none"
                            aria-haspopup="true" aria-expanded="false">
                            <svg class="w-4 h-4 me-1 text-blue-600 group-hover:text-blue-500 dark:text-blue-500 dark:group-hover:text-blue-300"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z" />
                            </svg>
                            <span class="text-sm font-normal">Settings</span>
                            <i class="fas fa-angle-down ml-1 text-sm"></i>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <!-- User Info -->
                        <div class="px-4 py-1 text-gray-700 text-sm border-b bg-gray-100">
                            <div class="font-semibold">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-xs text-gray-500 flex items-center gap-1">
                                <i class="fas fa-envelope text-gray-400 text-[10px]"></i>
                                <span class="truncate">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <!-- Profile Link -->
                        <x-dropdown-link :href="route('profile.edit')" class="border-b">
                            <i class="fas fa-user-edit mr-1 text-gray-700"></i> Profile
                        </x-dropdown-link>
                        <!-- Roles & Permissions -->
                        <x-dropdown-link :href="route('roles.index')" class="border-b">
                            <i class="fas fa-shield-alt mr-1 text-gray-700"></i> Roles & Permissions
                        </x-dropdown-link>
                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-2 text-red-500"></i>
                                <span class="text-red-500">Logout</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>





            <!-- Mobile Navigation Menu -->
            <div x-data="{ open: false }">
                <!-- Hamburger Button -->
                <button @click="open = true" class="md:hidden p-2 focus:outline-none">
                    <i class="fas fa-bars text-xl text-indigo-700"></i>
                </button>

                <!-- Mobile Nav -->
                <div x-show="open" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 -translate-x-full scale-95"
                    x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                    x-transition:leave-end="opacity-0 -translate-x-full scale-95" @click.away="open = false"
                    class="fixed inset-y-0 left-0 w-72 bg-white dark:bg-gray-900 shadow-2xl rounded-r-2xl z-50 md:hidden backdrop-blur-lg">

                    <!-- Logo and Portal Title -->
                    <div
                        class="bg-gradient-to-r from-blue-600 to-blue-800 text-white text-center py-4 px-5 rounded-t-2xl shadow-md">
                        <img src="{{ asset('images/mobilelogo.png') }}" alt="Bandari Maritime Academy Logo"
                            class="w-16 h-16 mx-auto mb-2 rounded-full border-2 border-white shadow-lg">
                        <h1 class="text-lg font-semibold">Bandari Maritime Academy</h1>
                        <p class="text-xs text-gray-200">E-Recruitment Portal</p>
                    </div>

                    <!-- User Info -->
                    <div
                        class="px-5 py-4 flex items-center justify-between border-b border-gray-300 dark:border-gray-700">
                        <div>
                            <span
                                class="block font-semibold text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</span>
                        </div>
                        <!-- Close Button -->
                        <button @click="open = false"
                            class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <!-- Navigation Links -->
                    <div class="pt-4 pb-4 space-y-2 px-5">

                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                            class="flex items-center gap-2 py-2 px-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                            <i class="fas fa-home text-blue-600"></i> <span>Dashboard</span>
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('personal-info.show')" :active="request()->routeIs('personal-info.show')"
                            class="flex items-center gap-2 py-2 px-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                            <i class="fas fa-user text-blue-600"></i> <span>Personal Details</span>
                        </x-responsive-nav-link>

                        <!-- Education Dropdown -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="flex justify-between items-center w-full px-3 py-2 text-gray-900 dark:text-gray-100
                                       bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700
                                       rounded-lg transition">
                                <span class="flex items-center gap-2">
                                    <i class="fas fa-graduation-cap text-blue-600"></i> <span>Education</span>
                                </span>
                                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"
                                    class="text-gray-500"></i>
                            </button>

                            <div x-show="open" x-collapse class="mt-1 w-full">
                                <x-responsive-nav-link :href="route('education.index')" :active="request()->routeIs('education.index')"
                                    class="flex items-center w-full gap-2 py-3 px-4 bg-white dark:bg-gray-900
                                           hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                                    <i class="fas fa-university text-gray-600 dark:text-gray-300"></i>
                                    <span class="flex-1">Academic Qualifications</span>
                                </x-responsive-nav-link>

                                <x-responsive-nav-link :href="route('qualifications.index')" :active="request()->routeIs('qualifications.index')"
                                    class="flex items-center w-full gap-2 py-3 px-4 bg-white dark:bg-gray-900
                                           hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                                    <i class="fas fa-award text-gray-600 dark:text-gray-300"></i>
                                    <span class="flex-1">Professional Qualifications</span>
                                </x-responsive-nav-link>

                                <x-responsive-nav-link :href="route('memberships.index')" :active="request()->routeIs('memberships.index')"
                                    class="flex items-center w-full gap-2 py-3 px-4 bg-white dark:bg-gray-900
                                           hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                                    <i class="fas fa-users-cog text-gray-600 dark:text-gray-300"></i>
                                    <span class="flex-1">Membership to Professional Bodies</span>
                                </x-responsive-nav-link>
                            </div>
                        </div>


                        <x-responsive-nav-link :href="route('employment.index')" :active="request()->routeIs('employment.index')"
                            class="flex items-center gap-2 py-2 px-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                            <i class="fas fa-briefcase text-blue-600"></i> <span>Employment Details</span>
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('referees.index')" :active="request()->routeIs('referees.index')"
                            class="flex items-center gap-2 py-2 px-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                            <i class="fas fa-users text-blue-600"></i> <span>Referees</span>
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('documents.index')" :active="request()->routeIs('documents.index')"
                            class="flex items-center gap-2 py-2 px-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                            <i class="fas fa-file-upload text-blue-600"></i> <span>Documents</span>
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('application')" :active="request()->routeIs('application')"
                            class="flex items-center gap-2 py-2 px-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition">
                            <i class="fas fa-paper-plane text-blue-600"></i> <span>Application</span>
                        </x-responsive-nav-link>
                    </div>

                    <!-- Profile & Logout -->
                    <div
                        class="absolute bottom-0 left-0 w-full bg-gray-100 dark:bg-gray-800 border-t border-gray-300 dark:border-gray-700
       py-1 px-4 rounded-br-2xl text-sm">
                        <x-responsive-nav-link :href="route('profile.edit')"
                            class="flex items-center gap-2 py-2 px-3 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all rounded-lg">
                            <i class="fas fa-user-cog text-blue-600"></i> <span>Profile Settings</span>
                        </x-responsive-nav-link>

                        <form method="POST" action="{{ route('logout') }}" class="mt-1">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center gap-2 py-2 px-3 hover:bg-red-100 dark:hover:bg-red-800 transition-all rounded-lg text-red-600">
                                <i class="fas fa-sign-out-alt text-blue-600"></i> <span>Logout</span>
                            </x-responsive-nav-link>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="bg-gray-100 dark:bg-gray-800 py-0.5 pl-10"> <!-- Reduced py-2 to py-1 -->
        <div class="max-w-7xl mx-auto flex items-center text-xs text-gray-600 dark:text-gray-400">
            <!-- Reduced text-sm to text-xs -->
            <nav class="flex px-6 py-1 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Breadcrumb"> <!-- Reduced px-12 to px-6 -->
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <!-- Home Link -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <!-- Reduced text-sm to text-xs -->
                            <svg class="w-3 h-3 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20"> <!-- Reduced w-4 h-4 to w-3 h-3 -->
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>

                    @php
                        $segments = request()->segments();
                        $url = '';
                    @endphp

                    <!-- Dynamic Breadcrumbs -->
                    @foreach ($segments as $index => $segment)
                        @php
                            $url .= '/' . $segment;
                            $isLast = $loop->last;
                            $name = ucwords(str_replace('-', ' ', $segment));
                        @endphp
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-2 h-2 mx-1 text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <!-- Reduced w-3 h-1 to w-2 h-2 -->
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>

                                @if (!$isLast)
                                    <a href="{{ url($url) }}"
                                        class="ms-1 text-xs font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                        {{ $name }}
                                    </a>
                                @else
                                    <span class="ms-1 text-xs font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                                        {{ $name }}
                                    </span>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</nav>
