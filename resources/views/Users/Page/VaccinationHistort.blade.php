@extends('Users.Layout.LayoutAccount')
@section('title')
    Vaccination Histort
@endsection
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
    <style>
        table {
            border-bottom: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
            margin-top: 20px;
            font-size: 15px;
        }

        .text-left {

            text-align: left;
        }

        table caption {
            font-size: 1.5em;
            margin: 0.5em 0 0.75em;
        }

        table tr {
            border-bottom: 1px solid #ddd;
            padding: 0.35em;
        }



        table th,
        table td {
            padding: 0.625em;
            text-align: center;
        }

        table th {
            border-bottom: 2px solid #ddd;
            padding: 0.9em;
            border-top: 2px solid #ddd;
        }

        table th {
            font-size: 0.85em;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
                margin-top: 25px
            }

            .text-left {

                text-align: right;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                
                display: block;
                margin-bottom: 0.625em;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                border-radius: 5px;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: 0.8em;
                text-align: right;
            }

            table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }

        /* general styling */
        body {
            font-family: "Open Sans", sans-serif;
            line-height: 1.25;
        }
    </style>
@endsection
@section('content')
    <livewire:users.page.vaccine-history :code="$code" />
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
