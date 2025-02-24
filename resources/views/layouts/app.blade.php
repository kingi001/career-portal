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



</head>

<body class="min-h-screen bg-cobg-gray-100ver bg-center bg-no-repeat">
    <div class="min-h-screen  overflow-y-auto bg-gray-100">



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

        @include('layouts.footer')
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: "{{ session('error') }}",
        });
    @endif

    @if (session('info'))
        Swal.fire({
            icon: 'info',
            title: 'Heads up!',
            text: "{{ session('info') }}",
        });
    @endif

    @if (session('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Warning!',
            text: "{{ session('warning') }}",
        });
    @endif
</script> --}}
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
