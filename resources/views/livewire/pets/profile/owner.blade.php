<div>
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
