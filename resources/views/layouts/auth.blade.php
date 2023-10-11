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
    <title>Login - SIM Bank Sampah</title>
    <!-- BEGIN: CSS Assets-->
    @vite(['resources/css/app.css', 'resources/template/css/app.css'])
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    @include('sweetalert::alert')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Logo Bank Sampah PNG" class="w-14"
                        src="https://ebanksampah.unilak.ac.id/assets/images/logo256x256.png">
                    <span class="text-white text-lg ml-3"> Bank Sampah </span>
                </a>
                <div class="my-auto">
                    <img alt="Bank Sampah" class="-intro-x w-1/2 -mt-16"
                        src="{{ Vite::asset('resources/template/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Sistem Kalkulator
                        <br>
                        Bank Sampah
                    </div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            @yield('content')
            <!-- END: Login Form -->
        </div>
    </div>

    <!-- BEGIN: JS Assets-->

    @vite('resources/template/js/app.js')
    <!-- END: JS Assets-->
</body>

</html>
