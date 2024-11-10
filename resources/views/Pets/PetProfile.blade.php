@extends('Pets.Layout.LayoutProfile')
@section('style')
    <link href="{{ asset('assets/css/custom/profile.css') }}" rel="stylesheet" type="text/css">
@section('title')
    Pet Profile
@endsection
@endsection
@section('content')
<div>
    <div class="card-pet-profile">
        <div class="image-profile">
            <img src="{{ asset('assets\images\profile.jpg') }}">
        </div>
        <div class="right-contain">
            <label class="header">{{ __('messages.PetInformation') }}</label>
            <div class="show-field mt-1">
                <label>{{ __('messages.PetName') }}</label>
                <div class="detail white-space">
                    Snowball
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.Species') }}</label>
                <div class="detail white-space">
                    Cat
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.Breed') }}</label>
                <div class="detail white-space">
                    Persian Cat
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.Gender') }}</label>
                <div class="detail white-space">
                    Female
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.Birthdate') }}</label>
                <div class="detail white-space">
                    March 15, 2022
                </div>
            </div>

            <div class="show-field mt-1">
                <label>{{ __('messages.Age') }}</label>
                <div class="detail white-space">
                    2 years 4 months
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.ColorMarkings') }}</label>
                <div class="detail">
                    White / Cream-colored patches on the ears and tailg White / Cream-colored patches on the ears and tailg
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.EmergencyContact') }}</label>
                <div class="detail white-space contact" >
                    0895623587
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.HomeLocation') }}</label><br>
                <div class="mt-1">
                    <a href="https://www.google.co.th/maps/@18.3170581,99.3986862,17z?hl=th" target="_blank"><i class='bx bx-current-location'></i>{{ __('messages.home_location') }}</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
