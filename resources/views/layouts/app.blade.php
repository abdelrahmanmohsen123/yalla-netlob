<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- Fontawsome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fonts -->
    {{-- <link src="{{asset('fonts/fontawesome-free-6.3.0-web/css/all.css')}}" rel="stylesheet"> --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <style>
        body {
            font-family: 'Cairo', sans-serif !important;
            box-sizing: border-box;
            margin: 0;
        }

        .logo {
            font-family: fantasy;
            letter-spacing: -.5px;
        }

        .group-card {
            max-height: 65vh !important;
            overflow-y: auto;
        }

        .group-card::-webkit-scrollbar {
            width: 8px;
        }

        /* Handle */
        .group-card::-webkit-scrollbar-thumb {
            visibility: hidden;
            background: red;
            border-radius: 10px;
        }

        /* Handle on hover */
        .group-card::-webkit-scrollbar-thumb:hover {
            background: lightpink;
            visibility: visible;
        }

        .group-card:hover::-webkit-scrollbar-thumb {
            background: red;
            visibility: visible;
        }

        .active {
            font-weight: bold;
            color: black;
            border-bottom: 3px solid red
        }

        .friend-card {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            align-items: center;

        }
        /* .mt-100{margin-top: 100px}body{background: #00B4DB;background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);background: linear-gradient(to right, #0083B0, #00B4DB);color: #514B64;min-height: 100vh} */

    </style>
    @stack('css')
    @stack('styles')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-white">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm ">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand logo" href="{{ url('/') }}">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                        Yalla !lob
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item {{ Request::segment(1) === 'friends' ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('friends.index') }}">Friends</a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) === 'groubs' ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('groubs.index') }}">Groups</a>
                        </li>
                        <li class="nav-item" {{ Request::segment(1) === 'orders' ? 'active' : null }}>
                            <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <!-- Notifications -->
                    <div class="dropdown">
                        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#"
                            id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger" id="nots_count"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" id="nots" aria-labelledby="navbarDropdownMenuLink">
                            
                        </ul>
                    </div>
                    <!-- Avatar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <main class="py-4 ">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('jquery/jquery-3.5.1.js') }}"></script>
    <script>
    
    let ul = document.querySelector('#nots'); 
    fetch('/notifications')
        .then(res => res.json())
        .then(res => {
            document.querySelector('#nots_count').textContent = res.length;
            if(res.length == 0){
                ul.innerHtml = '<p>There is no any invitation</p>';
            }else{
                for (let i=0; i<res.length; i++) {
                    addListItem(res[i].sender.name)               
                }
            }
        })

        function addListItem(sender){
            let li = document.createElement('li');
            li.innerHTML = `<a class="dropdown-item"><b class="text-danger">${sender}</b> has invited you to eat together</a>`;
            ul.appendChild(li);
        }
    </script>
</body>

</html>
