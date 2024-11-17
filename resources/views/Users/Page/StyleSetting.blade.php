@extends('Users.Layout.LayoutAccount')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css" />
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

        .show-color {
            margin-right: 10px;
            padding: 3px;
            outline: 1px solid rgb(155, 155, 155);
            border-radius: 5px;
            padding-bottom: -10px;
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


        .checkbox-wrapper-30{
            margin: 5px 10px 0 5px;
        }

        .checkbox-wrapper-30 .checkbox {
            /* --bg: linear-gradient(45deg, #004D7A, #008793, #00BF72, #ABEB12); */
            --brdr: #d3d3d3;
            --brdr-actv: #ffffff;
            --brdr-hovr: #d3d3d3;
            --dur: calc((var(--size, 2)/2) * 0.6s);
            display: inline-block;
            width: calc(var(--size, 1) * 22px);
            position: relative;
            color: white;
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
            /* background: var(--bg); */
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
@section('title')
    Decorate Card
@endsection
@endsection
@section('content')
<livewire:users.page.style-setting />
@endsection
