<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/TrackingPro.png') }}" type="image/png">
    <link href="{{ asset('assets/css/custom/navbar.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('boxicons-2.1.4\css\boxicons.min.css') }}" rel="stylesheet" type="text/css">
    <title>Tracking Pro : @yield('title')</title>
    @yield('style')
    @livewireStyles
</head>

<body>
    <livewire:pets.layout.navbar />
    <div>
        @yield('content')
    </div>
    @yield('script')
    <script>
        document.addEventListener('DOMContentLoaded', checkNavbarShadow);
        window.addEventListener('scroll', checkNavbarShadow);
        function checkNavbarShadow() {
            const navbar = document.querySelector('.navbar'); 
            if (window.scrollY > 0) {
                navbar.classList.add('navbar-shadow'); 
            } else {
                navbar.classList.remove('navbar-shadow');
            }
        }
    </script>
    @livewireScripts
</body>

</html>
