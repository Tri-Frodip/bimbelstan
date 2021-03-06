<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.dashboard.head')
        @livewireStyles
    </head>
    <body class="g-sidenav-show bg-gray-100">

        <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
            @include('partials.dashboard.navbar', ['show_navbar'=>true])

            <div id="app">
                @yield('content')

                @include('partials.dashboard.footer')
            </div>
        </main>

        {{-- @include('partials.dashboard.fixed') --}}
        @include('partials.dashboard.scripts')
        @livewireScripts
    </body>
</html>
