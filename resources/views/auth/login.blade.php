@extends('layouts.Auth.app')

@section('auth_content')
    <div class="auth-box h-full flex flex-col justify-center">
        <div class="mobile-logo text-center mb-6 lg:hidden block">
            <a href="index.html">
                <img src="{{asset('backend/assets/images/logo/logo.svg')}}" alt="" class="mb-10 dark_logo">
                <img src="{{asset('backend/assets/images/logo/logo-white.svg')}}" alt="" class="mb-10
                            white_logo">
            </a>
        </div>
        <div class="text-center 2xl:mb-10 mb-4">
            <h4 class="font-medium">Sign in</h4>
            <div class="text-slate-500 text-base">
                Sign in to your account to start using Dashcode
            </div>
        </div>

        <!-- BEGIN: Login Form -->
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

            <div class="fromGroup">
                <x-input-label for="username" :value="__('Username')" class="block capitalize form-label" />
                <div class="relative ">
                    <x-text-input id="username" class="form-control py-2" type="text" name="username"
                      :value="old('username')" required autofocus autocomplete="username" />
                </div>
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <div class="fromGroup">
                <x-input-label for="password" :value="__('Password')" class="block capitalize form-label " />
                <div class="relative">
                    <x-text-input id="password" class="form-control py-2"
                      type="password"
                      name="password"
                      required autocomplete="current-password"
                    />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-between">
                <label class="flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" class="hiddens" name="remember">
                    <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>

            <x-primary-button class="">
                {{ __('Log in') }}
            </x-primary-button>
        </form>
        <!-- END: Login Form -->
        <div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
            <div class="absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                    px-4 min-w-max text-sm text-slate-500 font-normal">
                Or continue with
            </div>
        </div>
        <div class="max-w-[242px] mx-auto mt-8 w-full">

            <!-- BEGIN: Social Log in Area -->
            <ul class="flex">
                <li class="flex-1">
                    <a href="#" class="inline-flex h-10 w-10 bg-[#1C9CEB] text-white text-2xl flex-col items-center justify-center rounded-full">
                        <img src="{{asset('backend/assets/images/icon/tw.svg')}}" alt="">
                    </a>
                </li>
                <li class="flex-1">
                    <a href="#" class="inline-flex h-10 w-10 bg-[#395599] text-white text-2xl flex-col items-center justify-center rounded-full">
                        <img src="{{asset('backend/assets/images/icon/fb.svg')}}" alt="">
                    </a>
                </li>
                <li class="flex-1">
                    <a href="#" class="inline-flex h-10 w-10 bg-[#0A63BC] text-white text-2xl flex-col items-center justify-center rounded-full">
                        <img src="{{asset('backend/assets/images/icon/in.svg')}}" alt="">
                    </a>
                </li>
                <li class="flex-1">
                    <a href="#" class="inline-flex h-10 w-10 bg-[#EA4335] text-white text-2xl flex-col items-center justify-center rounded-full">
                        <img src="{{asset('backend/assets/images/icon/gp.svg')}}" alt="">
                    </a>
                </li>
            </ul>
            <!-- END: Social Log In Area -->
        </div>
        <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-12 uppercase text-sm">
            Don’t have an account?
            <a href="{{route('register')}}" class="text-slate-900 dark:text-white font-medium hover:underline">
                Sign up
            </a>
        </div>
    </div>
@endsection

{{--<x-guest-layout>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">--}}
{{--                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ml-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}
