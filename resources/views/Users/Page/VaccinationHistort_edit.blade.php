@extends('Users.Layout.LayoutAccount')
@section('style')
    <link href="{{ asset('assets/css/custom/profile.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/custom/health-info.css') }}" rel="stylesheet" type="text/css">
    <style>
        .button-class-2 button {
            width: 100%;
        }

        .button-class-2 button:hover {
            transform: scale(1.009);
        }

        .image-profile {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .swal2-title-2,
        .swal2-content {
            color: white !important;
        }


        .swal2-icon-2 {
            color: white !important;
            border-color: white !important;
        }

        .swal2-title-2 {
            font-size: 18px;
            font-weight: 300;
        }

        .swal2-title-2 {
            text-shadow: 0px 0px 3px rgba(0, 0, 0, 0.2);
        }

        .card-form {
            position: relative;
        }

        .config-icon {
            position: absolute;
            right: 25px;
            top: 40px;
            font-size: 20px;
            cursor: pointer;
            color: #008793;
        }

        .settings-dropdown {
            width: fit-content;
            position: absolute;
            right: 25px;
            top: 25px;
        }


        .settings-icon {
            font-size: 24px;
            cursor: pointer;
            color: #008793;
        }

        .button-class .back {
            background-color: rgb(218, 218, 218);
            color: white;
            padding: 5px;
            min-width: 80px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 10px;
            transition: ease 0.3s all;
        }

        .button-class .back:hover {
            transform: scale(1.05);
        }

        .settings-menu {
            display: none;
            position: absolute;
            background-color: white;
            right: 0;
            top: 25px;
            border-radius: 4px;
            z-index: 100;
            min-width: 170px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;
            border-radius: 5px;
        }

        .settings-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .settings-menu ul li {
            padding: 8px 10px;
            text-align: start;
            transition: ease all 0.3s;
            cursor: pointer;

            margin: 0 5px 0 5px;
        }

        .settings-menu ul li:not(:last-child) {
            border-bottom: 1px solid rgb(230, 230, 230);
        }

        .settings-menu ul li a {
            text-decoration: none;
            font-size: 14px;
            color: #004D7A;
            transition: ease all 0.3s;
        }

        .settings-menu ul li a .text {
            min-width: 140px;
        }

        .settings-menu ul li:hover {
            transform: scale(1.05);
        }

        .settings-menu ul li:hover a {
            color: #00BF72;
        }

        .card-health {
            position: relative;
        }

        @media (max-width: 700px) {
            .button-class {
                display: flex;
                flex-direction: column;

            }

            .button-class .back {
                margin-left: 0;
                margin-top: 10px
            }

            .button-class button {
                width: 100%;
            }

            .card-health {
                width: calc(100% - 50px) !important;
                box-shadow: rgba(255, 255, 255, 0) 0px 5px 15px !important;
                padding-bottom: 30px;
            }
        }
    </style>
@endsection
@section('title')
    Vaccination Edit
@endsection

@section('content')
    <livewire:users.page.vaccine-edit :code="$code" :id="$id" />
@endsection
@section('script')
    <script>
        document.querySelector('.settings-icon').addEventListener('click', function(event) {
            event.stopPropagation();
            var dropdown = document.querySelector('.settings-menu');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            if (dropdown.style.display === 'block') {
                var dropdown_1 = document.getElementById("myDropdown");
                dropdown_1.classList.remove("show");
            }

        });

        document.querySelectorAll('.menu-option').forEach(function(option) {
            option.addEventListener('click', function() {
                document.querySelector('.settings-menu').style.display = 'none';
            });
        });

        window.addEventListener('click', function(event) {
            var dropdown = document.querySelector('.settings-menu');
            if (!event.target.closest('.settings-dropdown')) {
                dropdown.style.display = 'none';
            }
        });
    </script>
@endsection
 