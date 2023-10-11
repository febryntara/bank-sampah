@extends('layouts.auth')

@section('content')
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <form action="{{ route('auth.attempt_login') }}" method="POST"
            class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            @csrf
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                Login
            </h2>
            <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Sistem Informasi Manajemen Bank Sampah</div>
            <div class="intro-x mt-8">
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input id="email" name="email" type="email"
                    class="form-control intro-x login__input py-3 px-4 block mt-4" placeholder="masukan email">
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input id="password" name="password" type="password"
                    class="form-control intro-x login__input py-3 px-4 block mt-4" placeholder="masukan password">
            </div>
            <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
            </div>
            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
            </div>
        </form>
    </div>
@endsection
