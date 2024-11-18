@extends('Users.Layout.LayoutAccount')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
    <link href="{{ asset('assets/css/custom/profile.css') }}" rel="stylesheet" type="text/css">
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

        .head-field {
            position: relative;
            width: calc(100% - 20px);
        }

        .head-field .input-field {
            width: calc(100% - 60px);
            padding-right: 70px;

        }

        .head-field.color {
            width: 100%;
        }

        .head-field .check {
            position: absolute;
            right: -15px;
            top: 4px;
        }



        .head-field.color .df-button {
            width: 150px;
            margin-left: 10px;
            font-size: 14px;
            height: 35px;
            background: linear-gradient(45deg, #004D7A, #008793, #00BF72, #ABEB12);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all ease 0.3s;
        }

        .head-field.color .df-button:hover {
            transform: scale(1.05);
        }

        .select-color {
            display: flex;
            flex-direction: row;
        }

        .show-color {
            height: 22px;
            width: 30px;
            border-radius: 3px;
            background-color: rgb(214, 214, 214);
            margin-left: 5px;
            margin-right: 10px;
        }

        .custom-color {
            border: none;
            outline: 1px solid rgb(207, 207, 207);
            margin-top: 0px;
            height: 23px;
            border-radius: 3px;
            font-size: 12px;
            color: aliceblue;
            background-color: #d6d6d6;
            cursor: pointer;
            transition: all ease 0.3s;
        }

        .custom-color:hover {
            transform: scale(1.05);
        }

        .input-color {
            border: 1px solid gainsboro;
            outline: none;
            height: 22px;
            border-radius: 3px;
            width: 30px;
            margin: 0 5px 0 5px;
        }

        .custom-label {
            font-size: 15px !important;
            color: #b1b1b1 !important;
        }

        .preview-sp {
            outline: dashed 2px rgb(196, 196, 196);
            height: 100px;
            border-radius: 5px;
            width: calc(100% - 10px);
            padding: 5px;
            cursor: pointer;
            overflow: hidden;
            position: relative;
        }

        .preview-sp i {
            font-size: 60px;
            color: rgb(196, 196, 196);
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -25px 0 0 -25px;
            z-index: 0;
        }

        .preview-sp img {
            width: calc(100% - 10px);
            height: calc(100% - 10px);
            position: absolute;
            object-fit: cover;
            object-position: center;
            z-index: 10;
            border-radius: 5px;
        }
        .clear-img{
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            height: 30px;
            background-color: #c7c7c7;
            color: white;
            transition: ease all 0.3s;
        }
        .clear-img:hover{
            transform: scale(1.01);
            cursor: pointer;
        }
    </style>
    <style>
        .checkbox-wrapper-30 .checkbox {
            --bg: #fff;
            --brdr: #999999;
            --brdr-actv: #707070;
            --brdr-hovr: #bbc1e1;
            --dur: calc((var(--size, 2)/2) * 0.6s);
            display: inline-block;
            width: calc(var(--size, 1) * 22px);
            position: relative;
        }

        .checkbox-wrapper-30 .checkbox:after {
            content: "";
            width: 100%;
            padding-top: 100%;
            display: block;
        }

        .checkbox-wrapper-30 .checkbox>* {
            position: absolute;
        }

        .checkbox-wrapper-30 .checkbox input {
            -webkit-appearance: none;
            -moz-appearance: none;
            -webkit-tap-highlight-color: transparent;
            cursor: pointer;
            background-color: var(--bg);
            border-radius: calc(var(--size, 1) * 4px);
            border: calc(var(--newBrdr, var(--size, 1)) * 1px) solid;
            color: var(--newBrdrClr, var(--brdr));
            outline: none;
            margin: 0;
            padding: 0;
            transition: all calc(var(--dur) / 3) linear;
        }

        .checkbox-wrapper-30 .checkbox input:hover,
        .checkbox-wrapper-30 .checkbox input:checked {
            --newBrdr: calc(var(--size, 1) * 2);
        }

        .checkbox-wrapper-30 .checkbox input:hover {
            --newBrdrClr: var(--brdr-hovr);
        }

        .checkbox-wrapper-30 .checkbox input:checked {
            --newBrdrClr: var(--brdr-actv);
            transition-delay: calc(var(--dur) /1.3);
        }

        .checkbox-wrapper-30 .checkbox input:checked+svg {
            --dashArray: 16 93;
            --dashOffset: 109;
        }

        .checkbox-wrapper-30 .checkbox svg {
            fill: none;
            left: 0;
            pointer-events: none;
            stroke: var(--stroke, var(--border-active));
            stroke-dasharray: var(--dashArray, 93);
            stroke-dashoffset: var(--dashOffset, 94);
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-width: 2px;
            top: 0;
            transition: stroke-dasharray var(--dur), stroke-dashoffset var(--dur);
        }

        .checkbox-wrapper-30 .checkbox svg,
        .checkbox-wrapper-30 .checkbox input {
            display: block;
            height: 100%;
            width: 100%;
        }
    </style>
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
            top: 33px;
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
            padding: 0.35em;
        }

        tbody tr:nth-child(odd) {
            background-color: #f5f5f5da;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        table th,
        table td {
            padding: 0.625em;
            text-align: center;
        }

        table th {
            border-bottom: 2px solid #e2e2e2;
            padding: 0.9em;
            border-top: 2px solid #e2e2e2;
        }

        table th {
            font-size: 0.85em;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .action a {
            font-size: 20px;
            margin: 0 5px;
            color: rgb(177, 177, 177);
            cursor: pointer;
            transition: ease all 0.2s;
        }

        .action a i {
            transition: ease all 0.2s;
        }

        .action a:hover i {
            transform: scale(1.1);
        }

        .action a.edit:hover {
            color: #008793 !important;
        }

        .action a.remove:hover {
            color: #ff4d4d !important;
        }

        .add-icon {
            position: absolute;
            right: 70px;
            top: 35px;
            font-size: 22px;
            color: #008793;
            cursor: pointer;
        }

        .top-table {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .select-record {
            max-width: 150px;
            font-size: 16px;

        }

        .select-field {
            background-color: white;
            height: 33px;

        }

        .search {
            max-width: 200px;
            margin-top: 0px;
            margin-right: 80px;
        }

        @media screen and (max-width: 610px) {
            .top-table {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            .search {
                max-width: none;
                margin-right: 0px;
            }
        }

        @media screen and (max-width: 500px) {

            .select-record {
                max-width: none;
                font-size: 16px;
            }

            .select-record select {
                background-color: white;
            }

            .search {
                max-width: none;
                margin-top: -0px;
                margin-bottom: -10px;
            }
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
                margin-top: 25px;
                background-color: white;
            }

            tbody tr:nth-child(odd) {
                background-color: #ffffff;
            }

            tbody tr:nth-child(even) {
                background-color: #ffffff;
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
                margin-bottom: 15px;
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
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }

            .action a {
                margin-left: 10px;

            }
        }
    </style>
@section('title')
    Decorate Card
@endsection
@endsection
@section('content')
<livewire:users.page.style-setting :code="$code" />
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

