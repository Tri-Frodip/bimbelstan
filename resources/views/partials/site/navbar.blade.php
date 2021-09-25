<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none mb-3 navbar-transparent mt-0 pt-0" {!! $style??'' !!}>
    <div class="container">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{ url('/') }}">
            <img src="{{ asset('logo-no-bg.png') }}" style="max-width: 200px;" alt="" srcset="">
        </a>
        <button
            class="navbar-toggler shadow-none ms-2"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navigation"
            aria-controls="navigation"
            aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
        </button>
        <div class="navbar-collapse w-100 pt-3 pb-2 py-lg-0 collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto">
                <li class="nav-item mx-2">
                    <a href="/" class="nav-link text-secondary ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuDocs">
                        Beranda
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a href="/try-out" class="nav-link text-secondary ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuDocs">
                        Try Out
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a href="/paket-bimbel" class="nav-link text-secondary ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuDocs">
                        Paket Bimbel
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a href="/kontak-kami" class="nav-link text-secondary ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuDocs">
                        Kontak Kami
                    </a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="btn btn-sm btn-round mb-0 ms-2 bg-gradient-success" href="{{ route('dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                    </li>

                    @cannot('test')
                    <li class="nav-item">
                        <a class="btn btn-sm btn-round mb-0 ms-2 bg-gradient-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    @endcannot
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-round mb-0 ms-2 bg-gradient-success">
                            {{ __('Login') }}
                        </a>
                    </li>

                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-sm btn-round mb-0 ms-2 bg-gradient-primary">
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endif --}}
                @endif
            </ul>
        </div>
    </div>
</nav>
