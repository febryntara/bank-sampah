<!DOCTYPE html>
<!--
Template Name: Enigma - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ Vite::asset('resources/logo/favicon.ico') }}" rel="icon">
    <link href="{{ Vite::asset('resources/logo/Logo-01.png') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Sistem Informasi Manajemen Bank Sampah, meliputi pengelolaan data order, produk, kepala produksi, invoice dan pembayaran">
    <meta name="keywords" content="Bank Sampah, sistem, sistem informasi manajemen, brymade software">
    <meta name="author" content="brymade software | febryntara">
    <title>{{ $title }}</title>
    <!-- BEGIN: CSS Assets-->
    @vite(['resources/template/css/app.css', 'resources/template/js/app.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5 md:py-0">
    {{-- @include('sweetalert::alert') --}}
    <!-- BEGIN: Mobile Menu -->
    <x-mobile-menu />
    <!-- END: Mobile Menu -->
    <!-- BEGIN: Top Bar -->
    <x-top-bar />
    <!-- END: Top Bar -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <x-side-menu />
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- END: Content -->
    </div>


    <!-- BEGIN: JS Assets-->
    {{-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script> --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script> --}}
    {{-- <script src="template/js/app.js"></script> --}}

    @stack('scripts')
    <!-- END: JS Assets-->
</body>

</html>
