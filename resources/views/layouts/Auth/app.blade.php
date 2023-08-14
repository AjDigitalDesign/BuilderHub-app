@include('layouts.Auth.header')
<div class="loginwrapper">
    <div class="lg-inner-column">
        <div class="left-column relative z-[1]">
            <div class="max-w-[520px] pt-20 ltr:pl-20 rtl:pr-20">
                <a href="index.html">
                    <img src="{{asset('backend/assets/images/logo/logo.svg')}}" alt="" class="mb-10 dark_logo">
                    <img src="{{asset('backend/assets/images/logo/logo-white.svg')}}" alt="" class="mb-10 white_logo">
                </a>
                <h4>
                    Unlock your Project
                    <span class="text-slate-800 dark:text-slate-400 font-bold">
                            performance
                        </span>
                </h4>
            </div>
            <div class="absolute left-0 2xl:bottom-[-160px] bottom-[-130px] h-full w-full z-[-1]">
                <img src="{{asset('backend/assets/images/auth/ils1.svg')}}" alt="" class=" h-full w-full
                object-contain">
            </div>
        </div>
        <div class="right-column  relative">
            <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
               @yield('auth_content')
                <div class="auth-footer text-center">
                    Copyright {{date('Y')}}, Dashcode All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.Auth.footer')
