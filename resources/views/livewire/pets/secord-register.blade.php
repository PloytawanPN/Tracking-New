<div>
    <div wire:loading.delay.longer wire:target="image_owner" style="position: absolute">
        @include('Pets.Loader')
    </div>
    <div class="card-form" wire:ignore.self>

        @if (!$HAccount)
            <label class="header">{{ __('messages.ownerInformation') }}</label>
        @else
            <label class="header">{{ __('messages.ownerAccount') }}</label>
        @endif

        @if (!$HAccount)
            <input type="file" wire:model.live='image_owner' name='image_2' id="imageInput_2" accept="image/*" required
                class="d-none">

            <div id="preview_image_2" class="frame-preview" onclick="setupImagePreview('imageInput_2')">
                <i class='bx bx-image-alt'></i>
                @if ($image_owner)
                    <img id="image_owner" src="{{ $image_owner->temporaryUrl() }}" class="preview-image ">
                @elseif($old_image)
                    <img src="{{ asset('storage/ownProfile/' . $code . '/' . $old_image) }}" class="preview-image ">
                @endif
            </div>
        @endif

        <div class="input-group mt-1">
            <label>{{ __('messages.emailOwner') }}</label>
            <input type="text" class="input-field" wire:model='email' placeholder="{{ __('messages.emailPlac') }}">
        </div>
        <div class="input-group mt-1">
            <label>{{ __('messages.passwordOwner') }}</label>
            <input type="password" class="input-field" wire:model='password'
                placeholder="{{ __('messages.passwordPlac') }}">
        </div>
        @if (!$HAccount)
            <div class="input-group mt-1">
                <label>{{ __('messages.password_confirmation') }}</label>
                <input type="password" class="input-field" wire:model='confirm_password'
                    placeholder="{{ __('messages.passwordPlac') }}">
            </div>
        @endif
        <div class="input-group mt-1">
            <div class="checkbox-wrapper-28">
                <input id="tmp-28" type="checkbox" class="promoted-input-checkbox" wire:model.live='HAccount' />
                <svg>
                    <use xlink:href="#checkmark-28" />
                </svg><label for="tmp-28">{{ __('messages.HaveAccount') }}</label><svg
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
                <label>{{ __('messages.FullName') }}</label>
                <input type="text" class="input-field" wire:model='fullname'
                    placeholder="{{ __('messages.namePlac') }}">
            </div>
            <div class="input-group mt-1">
                <label>{{ __('messages.Nickname') }}</label>
                <input type="text" class="input-field" wire:model='nickname'
                    placeholder="{{ __('messages.nickPlac') }}">
            </div>
            <div class="input-group mt-1">
                <label>{{ __('messages.ContactNumber') }}</label>
                <input type="text" class="input-field" wire:model='phoneNumber'
                    placeholder="{{ __('messages.phonePlac') }}">
            </div>
            <div class="input-group mt-1">
                <label>{{ __('messages.address') }}</label>
                <input type="text" class="input-field" wire:model='address'
                    placeholder="{{ __('messages.numberPlac') }}">
            </div>
        @endif



        <div class="button-class-2">
            <button wire:click='back_step' class="gray-bt">{{ __('messages.Back') }}</button>
            <button wire:click='next_to_step3'>{{ __('messages.Next') }}</button>
        </div>
    </div>
    <script>
        window.addEventListener('stepFalse', (event) => {
            Swal.fire({
                title: "{{ __('messages.error') }}",
                text: event.detail[0].message,
                icon: "error",
                draggable: false,
                confirmButtonText: "{{ __('messages.okay') }}",
                customClass: {
                    confirmButton: 'gradient-btn',
                    icon: 'custom-icon'
                }
            });
        });
    </script>
</div>
