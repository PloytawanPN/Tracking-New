<div>
    @if ($style && $style->button_color)
        @if ($style->button_color == 'custom')
            <style>
                .show-field a {
                    background-image: none;
                    background-color: {{ $style->b_colorcode }};
                }
            </style>
        @else
            <style>
                .show-field a {
                    background-image: {{ $style->b_colorcode }};
                }
            </style>
        @endif
    @endif
    @if ($style && $style->header_color)
        <style>
            .header {
                font-size: 27px;
                font-weight: 700;
                background: {{ $style->h_colorcode }};
                background-clip: text;
                color: transparent;
            }
        </style>
    @endif
    @if ($style && $style->bg_image)
        <style>
            .background-img {
                position: fixed;
                width: 100vw;
                height: 100vh;
                background-color: rgb(255, 255, 255);
                top: 0;
                left: 0;
                z-index: -10;
                background-image: url('/storage/style/bg/{{ $style->bg_image }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                filter: brightness(0.6);
            }

            @media (max-width: 439px) {
                .background-img {
                    background-image: url('/storage/style/card/{{ $style->card_image }}');
                    filter: brightness(1);
                }
            }
        </style>
    @endif
    @if ($style && $style->card_image)
        <style>
            .card-form {
                background-image: url('/storage/style/card/{{ $style->card_image }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            @media (max-width: 439px) {
                .card-form {
                    background-image: none;
                    background-color: rgba(240, 248, 255, 0);
                    box-shadow: none;
                }
            }
        </style>
    @endif
    <div class="background-img"></div>

    <div class="card-form" style="max-width: 350px;padding: 35px 35px 50px 35px" wire:ignore.self>


        <label class="header">{{ __('messages.ownerInformation') }}</label>


        <div id="preview_image_2" class="frame-preview-2">
            @if ($OwnerInfo->owner_image_show_st == 1)
                <img id="image_owner" src="{{ asset('storage/ProfileImage/Owns/' . $OwnerInfo->owner_image) }}"
                    class="preview-image ">
            @else
                <img id="image_owner" src="{{ asset('assets/images/0bee70e7d52b9b77032c3aefcf134502.jpg') }}"
                    class="preview-image ">
            @endif
        </div>

        <div class="show-field mt-1">
            <label>{{ __('messages.owner_full_name') }}</label>
            <div class="own_detail white-space">
                {{ $OwnerInfo->fullname_show_st == 1 ? ($OwnerInfo->fullname ? $OwnerInfo->fullname : '-') : '********************' }}
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.nickname') }}</label>
            <div class="own_detail white-space">
                {{ $OwnerInfo->nickname_show_st == 1 ? ($OwnerInfo->nickname ? $OwnerInfo->nickname : '-') : '********************' }}
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.contact_number') }}</label>
            <div class="own_detail white-space">
                {{ $OwnerInfo->contact_show_st == 1 ? ($OwnerInfo->contact ? $OwnerInfo->contact : '-') : '********************' }}
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.email_address') }}</label>
            <div class="own_detail white-space">
                {{ $OwnerInfo->email_show_st == 1 ? ($OwnerInfo->email ? $OwnerInfo->email : '-') : '********************' }}
            </div>
        </div>



    </div>
</div>
