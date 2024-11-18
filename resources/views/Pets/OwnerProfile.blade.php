@extends('Pets.Layout.LayoutProfile')
@section('style')
    <link href="{{ asset('assets/css/custom/profile.css') }}" rel="stylesheet" type="text/css">
    <style>
        .show-field a {
            color: rgb(63, 63, 63);
            font-size: 16px;
            background-image: none;
            border-radius: 0;
            padding: 0;
            cursor: none;
            margin-top: 0;
            text-decoration: none;
            transition: none;
            background-color: white !important;
        }
    </style>
@endsection
@section('title')
    Owner Profile
@endsection

@section('content')
    <livewire:pets.profile.owner :code="$code" />
@endsection
