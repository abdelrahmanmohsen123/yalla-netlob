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
            /* background-color: #f5efd7 !important; */
            background-image: url("/images/Yalla Notlop (1).png") !important;
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
        @media only screen and (max-width: 800px) {
        .gif{
            display:none;
        }
    }
        /* .mt-100{margin-top: 100px}body{background: #00B4DB;background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);background: linear-gradient(to right, #0083B0, #00B4DB);color: #514B64;min-height: 100vh} */
    </style>

    @stack('css')
    @stack('styles')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-white" >
    <div id="app" class="container">
        <div class="row">

            <main class="py-5 col-sm-12 col-md-6 m-auto ">
                @yield('content')
            </main>
            <div class="py-4 col-6 gif ">
                <img src="/images/Yalla Notlop.gif" alt="" />
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.5.1.js') }}"></script>
</body>

</html>
