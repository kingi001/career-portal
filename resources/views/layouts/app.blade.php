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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>







</head>

<body x-data="{ darkMode: localStorage.getItem('darkMode') === 'true', loading: false }"
    x-init="
        $watch('darkMode', val => localStorage.setItem('darkMode', val));
        window.addEventListener('beforeunload', () => loading = true);
        document.addEventListener('DOMContentLoaded', () => loading = false);
    "
    :class="{'dark bg-gray-900 text-white': darkMode, 'bg-gray-100 text-gray-900': !darkMode}"
    class="min-h-screen bg-center bg-no-repeat transition-all duration-300"
>



    <!-- Loading Spinner Overlay -->
    <div x-show="loading" class="fixed inset-0 flex items-center justify-center bg-white dark:bg-black bg-opacity-75 z-50">
        <i class="fas fa-spinner fa-spin text-blue-600 text-4xl"></i>
    </div>

    <!---Dark Mode Toggle -->
    <button @click="darkMode = !darkMode" class="fixed top-4 right-4 p-2 bg-gray-300 dark:bg-gray-700 rounded-full shadow-md">
        <i class="fas" :class="darkMode ? 'fa-sun text-yellow-500' : 'fa-moon text-gray-800'"></i>
    </button>

    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white dark:bg-gray-800 shadow-md">
        @include('layouts.navigation')
    </nav>

    <!-- SweetAlert Notifications -->
    @include('sweetalert::alert')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow-md">
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


    <!-- SEO Meta Tags -->
    <meta name="description" content="Your app description here">
    <meta name="keywords" content="Laravel, Web App, Career Portal, Software">
    <meta name="author" content="Your Name">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Smooth Scrolling -->
    <style> html { scroll-behavior: smooth; } </style>

    <!-- SweetAlert2 & Custom Toast Notifications -->
   <script>
    document.addEventListener("DOMContentLoaded", function () {
    function showToast(icon, message) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: icon, // success, error, warning, info
            title: message,
            showConfirmButton: false,
            timer: 2000, // Auto close after 4 seconds
            timerProgressBar: true,
            background: getToastBackground(icon),
            color: '#003366', // Dark blue text for good contrast
            customClass: {
                popup: 'animate__animated animate__bounceInRight', // Animation on show
                title: 'swal-custom-title',
                timerProgressBar: 'swal-progress-bar'
            },
            showCloseButton: true, // Allow manual closing
            padding: '12px',
            width: '380px',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer); // Pause timer on hover
                toast.addEventListener('mouseleave', Swal.resumeTimer); // Resume timer when unhovered
            }
        });
    }

    // Function to determine background color based on icon type
    function getToastBackground(icon) {
        return icon === 'success' ? '#e6f7ff' : // Light blue for success (theme-based)
               icon === 'error' ? '#ffe6e6' :   // Soft red for error
               icon === 'warning' ? '#fff4e6' : // Light orange for warning
               '#e6f0ff'; // Light blue for info
    }

    // Check for session messages and trigger toast notifications
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
});

</script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: "Confirm Deletion",
            text: "This action is irreversible. Do you really want to delete this record?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it",
            cancelButtonText: "Cancel",
            reverseButtons: true,
            focusCancel: true,
            buttonsStyling: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }
</script>




</body>


</html>
