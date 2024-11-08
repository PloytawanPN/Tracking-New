<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/TrackingPro.png') }}" type="image/png">
    <link href="{{ asset('assets/css/custom/navbar.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/custom/registerForm.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('boxicons-2.1.4\css\boxicons.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>{{ config('app.name') }} : @yield('title')</title>
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
            const navbar = document.querySelector('.navbar-custome');
            if (window.scrollY > 0) {
                navbar.classList.add('navbar-shadow');
            } else {
                navbar.classList.remove('navbar-shadow');
            }
        }
    </script>
    <script>
        function setupImagePreview(inputId) {
            document.getElementById(inputId).click();
        }
    </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
</body>

</html>
