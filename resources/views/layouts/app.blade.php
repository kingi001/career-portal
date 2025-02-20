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
        
    </body>
</html>
