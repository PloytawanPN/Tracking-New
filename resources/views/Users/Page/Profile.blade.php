@extends('Users.Layout.LayoutAccount')
@section('style')
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

        .swal2-title-2{
            text-shadow: 0px 0px 3px rgba(0, 0, 0, 0.2);
        }
        .head-field{
            position: relative;
            width: calc(100% - 20px );
        }
        .head-field .input-field{
            width: calc(100% - 60px);
            padding-right:70px;
            
        }
        .head-field .check{
            position: absolute;
            right: -15px;
            top: 4px;
        }
    </style>
@section('title')
    Profile Setting
@endsection
@endsection
@section('content')
<livewire:users.page.profile />
@endsection
