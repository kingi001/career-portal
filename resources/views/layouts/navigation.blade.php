<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Left Section: Logo and Navigation Links -->
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}"
                    class="flex items-center space-x-3 hover:text-blue-600 transition duration-300 ease-in-out">
                    <x-application-logo class="h-6 w-auto text-gray-900" />

                    <!-- Show "BMA E-RECRUITMENT" on Mobile -->
                    <span class="text-base font-bold text-gray-900 tracking-wide sm:hidden">BMA E-RECRUITMENT
                        PORTAL</span>

                    <!-- Show "E-RECRUITMENT" on Desktop -->
                    <span class="text-base font-semibold text-gray-900 tracking-wide hidden sm:block">E-RECRUITMENT
                    </span>
                </a>


                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-6 ml-10">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <i class="fas fa-home text-blue-600"></i>
                        <span class="ml-1 text-sm font-base text-gray-700">Dashboard</span>
                    </x-nav-link>

                    <x-nav-link :href="route('personal-info.show')" :active="request()->routeIs('personal-info.show')">
                        <i class="fas fa-user text-blue-600"></i>
                        <span class="ml-1 text-sm font-base text-gray-700">Personal Details</span>
                    </x-nav-link>

                    <div class="hidden md:flex items-center">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <button class="flex items-center text-gray-700 hover:text-blue-700 focus:outline-none">
                                    <i class="fas fa-graduation-cap text-blue-600"></i>
                                    <span class="ml-1 text-sm font-base">Education</span>
                                    <i class="fas fa-chevron-down ml-1 text-sm"></i>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60 bg-white dark:bg-gray-800 shadow-lg rounded-md">
                                    <x-dropdown-link :href="route('education.index')" :active="request()->routeIs('education.index')"
                                        class="flex items-center w-full px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                        <i class="fas fa-university text-gray-700 dark:text-gray-300 mr-3"></i>
                                        <span class="flex-1">Academic Qualifications</span>
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('qualifications.index')" :active="request()->routeIs('qualifications.index')"
                                        class="flex items-center w-full px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                        <i class="fas fa-award text-gray-700 dark:text-gray-300 mr-3"></i>
                                        <span class="flex-1">Professional Qualifications</span>
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('memberships.index')" :active="request()->routeIs('memberships.index')"
                                        class="flex items-center w-full px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                        <i class="fas fa-users-cog text-gray-700 dark:text-gray-300 mr-3"></i>
                                        <span class="flex-1">Membership to Professional Bodies</span>
                                    </x-dropdown-link>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>


                    <x-nav-link :href="route('employment.index')" :active="request()->routeIs('employment.index')">
                        <i class="fas fa-briefcase text-blue-600"></i>
                        <span class="ml-1 text-sm font-base text-gray-700">Employment</span>
                    </x-nav-link>

                    <x-nav-link :href="route('referees.index')" :active="request()->routeIs('referees.index')">
                        <i class="fas fa-users text-blue-600"></i>
                        <span class="ml-1 text-sm font-base text-gray-700">Referees</span>
                    </x-nav-link>

                    <x-nav-link :href="route('documentUpload')" :active="request()->routeIs('documentUpload')">
                        <i class="fas fa-file-upload text-blue-600"></i>
                        <span class="ml-1 text-sm font-base text-gray-700">Documents</span>
                    </x-nav-link>

                    <x-nav-link :href="route('application')" :active="request()->routeIs('application')">
                        <i class="fas fa-paper-plane  text-blue-600"></i>
                        <span class="ml-1 text-sm font-base text-gray-700">Application</span>
                    </x-nav-link>

                </div>
            </div>

            <!-- Right Section: Settings Dropdown -->
            <div class="hidden md:flex items-center">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="flex items-center text-gray-700 hover:text-blue-700 focus:outline-none">
                            <i class="fas fa-cog "></i>
                            <span class="ml-2 text-sm font-base">Settings</span>
                            <i class="fas fa-chevron-down ml-1 text-sm"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- User Info -->
                        <div class="px-4 py-3 text-gray-700 text-sm border-b bg-gray-100">
                            <div class="font-semibold"><i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }}
                            </div>
                            <div class="text-sm text-gray-500"><i class="fas fa-envelope mr-1"></i>
                                {{ Auth::user()->email }}</div>
                        </div>


                        <!-- Profile -->
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fas fa-user-edit mr-2 text-gray-700"></i> Profile
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-2 text-red-500"></i> <span
                                    class="text-red-500">Logout</span>
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
                        <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo"
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

                        <x-responsive-nav-link :href="route('documentUpload')" :active="request()->routeIs('documentUpload')"
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

    <div class="bg-gray-100 dark:bg-gray-800 py-2 pl-10">
        <div class="max-w-7xl mx-auto flex items-center text-sm text-gray-600 dark:text-gray-400">
            <nav class="flex px-12 py-1 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <!-- Home Link -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
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
                                <svg class="rtl:rotate-180 w-3 h-1 mx-1 text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>

                                @if (!$isLast)
                                    <a href="{{ url($url) }}"
                                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                        {{ $name }}
                                    </a>
                                @else
                                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">
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
