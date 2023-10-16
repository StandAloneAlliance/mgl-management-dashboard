<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container px-0">
                <div class="row">
                    <div class="col">
                        <a href="{{ url('/')}}">
                            <img class="mgl-logo-img mr-4" src="{{ Vite::asset('resources/images/cropped-logo-big.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="row collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="col d-flex justify-content-end">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vanillajs@1.0/dest/cjs/index.min.js"></script>
    <script>
        const expand_btn = document.querySelector(".expand-btn");
        let activeIndex;

        expand_btn.addEventListener("click", () =>{
            document.body.classList.toggle("collapsed")
        });

        const current = window.location.href;

        const allLinks = document.querySelectorAll(".sidebar-links a");

        allLinks.forEach((elem) => {
            elem.addEventListener('click', function(){
                const hrefLinkClick = elem.href;

                allLinks.forEach((link) => {
                    if(link.href == hrefLinkClick){
                        link.classList.add("active")
                    } else{
                        link.classList.remove('active')
                    }
                })
            })
        });
    </script>
</body>

</html>