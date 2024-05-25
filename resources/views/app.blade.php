<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
        <link rel="icon" type="image/png" href="{{ asset("assets/img/favicon.png") }}" />

        <!-- Title -->
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!--     Fonts and icons     -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <!-- Nucleo Icons -->
        {{-- <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" /> --}}
        
        <!-- Main Styling -->
        <link href="{{ asset('assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />


        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>


  @auth
    <body class=" m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    @else
    <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500 dark:bg-slate-900">
  @endauth
   
        @inertia
    </body>

        <!-- plugin for scrollbar  -->
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
        <!-- main script file  -->
        <script src="{{ asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>

</html>
