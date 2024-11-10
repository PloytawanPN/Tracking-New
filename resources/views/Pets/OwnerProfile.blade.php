@extends('Pets.Layout.LayoutProfile')
@section('style')
    <link href="{{ asset('assets/css/custom/profile.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Owner Profile
@endsection

@section('content')
    <div>
        <div class="card-form" style="max-width: 350px;padding: 35px 35px 50px 35px" wire:ignore.self>


            <label class="header">{{ __('messages.ownerInformation') }}</label>


            <div id="preview_image_2" class="frame-preview-2">
                <img id="image_owner" src="{{ asset('assets\images\profile.jpg') }}" class="preview-image ">
            </div>

            <div class="show-field mt-1">
                <label>{{ __('messages.owner_full_name') }}</label>
                <div class="own_detail white-space">
                    *************
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.nickname') }}</label>
                <div class="own_detail white-space">
                    *************
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.contact_number') }}</label>
                <div class="own_detail white-space">
                    +1 234 567 8901
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.email_address') }}</label>
                <div class="own_detail white-space">
                    janesmith@example.com
                </div>
            </div>



        </div>
    </div>
@endsection
