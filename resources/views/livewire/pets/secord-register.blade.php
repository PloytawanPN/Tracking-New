<div>
    <div class="card-form" wire:ignore.self>
        @if (!$HAccount)
            <label class="header">Owner Information</label>
        @else
            <label class="header">Owner Account</label>
        @endif
        @if (!$HAccount)
            <input type="file" wire:model.live='image_owner' name='image_2' id="imageInput_2" accept="image/*"
                required class="d-none">

            <div id="preview_image_2" class="frame-preview" onclick="setupImagePreview('imageInput_2')">
                <i class='bx bx-image-alt'></i>
                @if ($image_owner)
                    <img id="image_owner" src="{{ $image_owner->temporaryUrl() }}" class="preview-image ">
                @endif
            </div>
        @endif

        <div class="input-group mt-1">
            <label>Email Address</label>
            <input type="text" class="input-field" wire:model='breed'
                placeholder="{{ __('messages.BreedPlac') }}">
        </div>
        <div class="input-group mt-1">
            <label>Password</label>
            <input type="text" class="input-field" wire:model='breed'
                placeholder="{{ __('messages.BreedPlac') }}">
        </div>
        <div class="input-group mt-1">
            <div class="checkbox-wrapper-28">
                <input id="tmp-28" type="checkbox" class="promoted-input-checkbox" wire:model.live='HAccount' />
                <svg>
                    <use xlink:href="#checkmark-28" />
                </svg><label for="tmp-28">If you have user info, please check here. </label><svg
                    xmlns="http://www.w3.org/2000/svg" style="display: none">
                    <symbol id="checkmark-28" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-miterlimit="10" fill="none"
                            d="M22.9 3.7l-15.2 16.6-6.6-7.1"></path>
                    </symbol>
                </svg>
            </div>
        </div>

        @if (!$HAccount)
            <div class="input-group mt-1">
                <label>Full Name</label>
                <input type="text" class="input-field" wire:model='breed'
                    placeholder="{{ __('messages.BreedPlac') }}">
            </div>
            <div class="input-group mt-1">
                <label>Nickname</label>
                <input type="text" class="input-field" wire:model='breed'
                    placeholder="{{ __('messages.BreedPlac') }}">
            </div>
            <div class="input-group mt-1">
                <label>Contact Number</label>
                <input type="text" class="input-field" wire:model='breed'
                    placeholder="{{ __('messages.BreedPlac') }}">
            </div>
            <div class="input-group mt-1">
                <label>Address</label>
                <input type="text" class="input-field" wire:model='breed'
                    placeholder="{{ __('messages.BreedPlac') }}">
            </div>
        @endif



        <div class="button-class-2">
            <button wire:click='previous_step' class="gray-bt">{{ __('messages.Back') }}</button>
            <button wire:click='next_to_step3'>{{ __('messages.Next') }}</button>
        </div>
    </div>
</div>
