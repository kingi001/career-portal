<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script> --}}

</head>

<body class="min-h-screen bg-gray-100 bg-center bg-no-repeat">

    <!-- Alpine.js Wrapper for Loading Spinner -->
    <div x-data="{ loading: false }"
        x-init="
            window.addEventListener('beforeunload', () => loading = true);
            document.addEventListener('DOMContentLoaded', () => loading = false);
        "
        class="min-h-screen overflow-y-auto bg-gray-100"
    >

        <!-- Loading Spinner Overlay -->
        <div x-show="loading"
            class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-75 z-50">
            <i class="fas fa-spinner fa-spin text-blue-600 text-4xl"></i>
        </div>

        <!-- Navigation -->
        @include('layouts.navigation')
        @include('sweetalert::alert')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow overflow-auto">
                <div class="mt-1 max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 rounded-lg">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="pb-16">
            {{ $slot }}
        </main>

        <!-- Footer -->
        @include('layouts.footer')

    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showToast(icon, message) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: icon,
                title: message,
                showConfirmButton: false,
                timer: 3000
            });
        }

        @if (session('success'))
            showToast('success', "{{ session('success') }}");
        @endif

        @if (session('error'))
            showToast('error', "{{ session('error') }}");
        @endif

        @if (session('info'))
            showToast('info', "{{ session('info') }}");
        @endif

        @if (session('warning'))
            showToast('warning', "{{ session('warning') }}");
        @endif
    </script>


</body>

</html>
