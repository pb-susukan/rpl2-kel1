<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="x-icon" href="{{ asset('assets/images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lapangan Garuda Futsal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teachers:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->

    <script src="{{ asset('assets/js/daypilot/daypilot-all.min.js', true) }}"></script>

</head>

<body class="antialiased font-teachers">
    <div class="relative container w-11/12 lg:w-[1280px] mx-auto">
    <x-navbar />
        @yield('content')
    <x-footer />


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script>
            const hamburger = document.getElementById('menu');
            const mobileMenu = document.getElementById('mobile-menu');
            //if hamburger clicked then show mobile menu
            hamburger.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
            //if anywhere clicked then hide mobile menu
            mobileMenu.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>
        @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}")
        </script>
        @endif

        @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}")
        </script>
        @endif

        @if (session('message'))
        <script>
            toastr.info("{{ session('message') }}")
        </script>
        @endif
        @stack('bottom-script')
</body>

</html>