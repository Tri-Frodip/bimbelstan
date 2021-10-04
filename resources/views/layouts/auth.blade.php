<!--
=========================================================
* Soft UI Design System - v1.0.5
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-design-system
* Copyright 2021 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.site.head')
    @livewireStyles
</head>
<body class="g-sidenav-show bg-gray-100">
    @include('partials.site.navbar')

    <section class="min-vh-90">
        <div
            class="page-header align-items-start min-vh-40 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('@yield('header-bg', asset('vendor/soft-ui/img/curved-images/curved8.jpg'))');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-1 mt-5">
                            @yield('heading', 'Login')
                        </h1>

                        {{-- <p class="text-lead text-white">
                            @yield('sub-heading', 'Have a nice day!')
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        {{ $slot ?? '' }}
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" class="bg-transparent mb-0 pb-0" viewBox="0 0 1440 319"><path fill="#34349b" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    @include('partials.site.footer')
    @include('partials.site.scripts')
    @livewireScripts
</body>
</html>
