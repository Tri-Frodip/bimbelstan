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
        <style>
            *{
                color: black;
            }
            .fixed-hamburger .fixed-hamburger-button {
                background: #fff;
                border-radius: 50%;
                bottom: 30px;
                left: 30px;
                font-size: 1.25rem;
                z-index: 990;
                box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.16);
                cursor: pointer;
            }

            .fixed-hamburger .fixed-hamburger-button i {
                pointer-events: none;
            }

            .fixed-hamburger .card {
                position: fixed !important;
                left: -360px;
                top: 0;
                height: 100%;
                right: auto !important;
                transform: unset !important;
                width: 360px;
                border-radius: 0;
                padding: 0 10px;
                transition: .2s ease;
                z-index: 1020;
            }

            .fixed-hamburger .badge {
                border: 1px solid #fff;
                border-radius: 50%;
                cursor: pointer;
                display: inline-block;
                height: 23px;
                margin-left: 5px;
                position: relative;
                width: 23px;
                transition: all 0.2s ease-in-out;
            }

            .fixed-hamburger .badge:hover,
            .fixed-hamburger .badge.active {
                border-color: #344767;
            }

            .fixed-hamburger .btn.bg-gradient-primary:not(:disabled):not(.disabled) {
                border: 1px solid transparent;
            }

            .fixed-hamburger .btn.bg-gradient-primary:not(:disabled):not(.disabled):not(.active) {
                background-color: transparent;
                background-image: none;
                border: 1px solid #cb0c9f;
                color: #cb0c9f;
            }

            .fixed-hamburger.show .card {
                left: 0;
            }
        </style>
    </head>
    <body class="g-sidenav-show bg-gray-100">

        @include('partials.dashboard.aside')

        <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
            @include('partials.dashboard.navbar')

            <div id="app">
                @yield('content')

                @include('partials.dashboard.footer')
            </div>
        </main>

        @cannot('test')
        <div class="fixed-hamburger d-md-block d-xl-none">
            <a class="fixed-hamburger-button text-dark position-fixed px-3 py-2">
                <i class="fa fa-bars py-2"> </i>
            </a>
        </div>
        @endcannot
        @include('partials.dashboard.fixed')
        @include('partials.dashboard.scripts')
        @livewireScripts
        <script>
            if(window.innerWidth<1200){
                $('#sidenav-main').addClass('bg-white')
            }
            window.addEventListener('resize', function(){
                if(window.innerWidth<1200){
                    $('#sidenav-main').addClass('bg-white')
                }else{
                    console.log('oke');
                    $('#sidenav-main').css('transform','translateX(0)');
                }
            })
            var collapsed = true;
            $('.fixed-hamburger').on('click', function(){
                collapsed = !collapsed;
                if(collapsed)
                    $('#sidenav-main').css('transform','translateX(-17.125rem)');
                else
                    $('#sidenav-main').css('transform','translateX(0)');
            })
        </script>
    </body>
</html>
