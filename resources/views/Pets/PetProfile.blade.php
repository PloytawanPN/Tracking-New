@extends('Pets.Layout.LayoutProfile')
@section('style')
    <link href="{{ asset('assets/css/custom/profile.css') }}" rel="stylesheet" type="text/css">
    <style>
        .image-profile {
            position: relative;
        }

        .image-profile .message {
            position: absolute;
            color: red;
            border-bottom: 3px red solid;
            border-top: 3px red solid;
            padding: 20px;
            top: 10px;
            font-size: 25px;
            font-weight: 800px;
            background-color: rgba(255, 255, 255, 0.445);
            text-align: center;
            width: calc(100% - 40px);
        }
    </style>
@section('title')
    Pet Profile
@endsection
@endsection
@section('content')
<livewire:pets.profile.pet :code="$code" />
@endsection
