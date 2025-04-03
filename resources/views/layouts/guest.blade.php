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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans text-gray-900 antialiased"
    style="background-image: url('{{ asset('images/bgpattern.gif') }}');
    background-repeat: repeat;
    background-attachment: fixed;">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-10 sm:pt-0 rounded-lg">
        <div class="w-full sm:max-w-md  mt-2 px-6 py-4 bg-white  overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

</body>

</html>
