@extends('Users.Layout.LayoutAccount')
@section('style')
    <link href="{{ asset('assets/css/custom/profile.css') }}" rel="stylesheet" type="text/css">
    <style>
        .button-class-2 button{
            width: 100%;
        }
        .button-class-2 button:hover{
            transform: scale(1.009);
        }
    </style>
@section('title')
    Profile
@endsection
@endsection
@section('content')
<div class="card-form" wire:ignore.self>


        <label class="header">{{ __('messages.ownerInformation') }}</label>


    <input type="file" wire:model.live='image_owner' name='image_2' id="imageInput_2" accept="image/*" required
        class="d-none">

    <div id="preview_image_2" class="frame-preview" onclick="setupImagePreview('imageInput_2')">
        <i class='bx bx-image-alt'></i>
        <img id="image_owner" src="" class="preview-image ">
    </div>


    <div class="input-group mt-1">
        <label>{{ __('messages.emailOwner') }}</label>
        <input type="text" class="input-field" wire:model='email' placeholder="{{ __('messages.emailPlac') }}">
    </div>


    <div class="input-group mt-1">
        <label>{{ __('messages.FullName') }}</label>
        <input type="text" class="input-field" wire:model='fullname' placeholder="{{ __('messages.namePlac') }}">
    </div>
    <div class="input-group mt-1">
        <label>{{ __('messages.Nickname') }}</label>
        <input type="text" class="input-field" wire:model='nickname' placeholder="{{ __('messages.nickPlac') }}">
    </div>
    <div class="input-group mt-1">
        <label>{{ __('messages.ContactNumber') }}</label>
        <input type="text" class="input-field" wire:model='phoneNumber'
            placeholder="{{ __('messages.phonePlac') }}">
    </div>
    <div class="input-group mt-1">
        <label>{{ __('messages.address') }}</label>
        <input type="text" class="input-field" wire:model='address' placeholder="{{ __('messages.numberPlac') }}">
    </div>




    <div class="button-class-2">
        <button wire:click='next_to_step3'>{{ __('messages.Save') }}</button>
    </div>
</div>
@endsection
