@extends('Users.Layout.LayoutAccount')
@section('style')
    <link href="{{ asset('assets/css/custom/profile.css') }}" rel="stylesheet" type="text/css">
    <style>
        .topic-header {
            text-align: center;
            margin-top: 50px;
        }

        .topic-header label {
            font-size: 40px;
            margin-top: 50px;
        }

        .topic-header p {
            font-size: 14px;
            color: rgb(163, 163, 163);
            max-width: 700px;
            margin: auto;
            margin-top: 20px;
            line-height: 30px;
        }

        .card-contain {
            margin: auto;
            width: fit-content;
            max-width: 80%;
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-bottom: 40px;
            padding-bottom: 40px;
        }

        .card-contain .card-pet {
            min-width: 180px;
            max-width: 180px;
            min-height: 100px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 12px 12px 5px 12px;
            border-radius: 5px;
            margin: 0 10px 15px 10px;
            text-align: center;
            transition: ease all 0.3s;
            cursor: pointer;
            width: 180px;
        }

        .card-contain .card-pet:hover {
            transform: scale(1.05);
        }

        .image-frame {
            width: 100%;
            aspect-ratio: 1 / 1;
            background-color: rgb(233, 233, 233);
            margin-bottom: 5px;
            overflow: hidden;
        }

        .image-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .pet-name {
            font-size: 14px;
            white-space: nowrap;
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            color: rgb(68, 68, 68);
            margin-top: 7px;
        }

        @media screen and (max-width: 700px) {

            .topic-header {
                max-width: calc(100% - 40px);
                margin: auto;
                margin-top: 10px;
            }

            .topic-header label {
                font-size: 30px;
                margin-top: 50px;
            }

            .topic-header p {
                font-size: 12px;
            }
        }

        @media screen and (max-width: 590px) {

            .card-contain {
                margin: auto;
                width: fit-content;
                max-width: calc(100% - 40px);
                min-width: calc(100% - 40px);
                margin-top: 30px;
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                justify-content: center;
            }
        }

        @media screen and (max-width: 520px) {
            .card-contain .card-pet {
                max-width: calc(50% - 40px);
                min-width: 0px;
                margin: 0 5px 10px 5px;
            }

            .pet-name {
                font-size: 12px;
            }

        }
    </style>
@section('title')
    Pet Setting
@endsection
@endsection
@section('content')
<livewire:users.page.portal />
@endsection
