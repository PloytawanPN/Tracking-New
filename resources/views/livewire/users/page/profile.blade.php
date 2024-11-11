<div>
    <div wire:loading.delay.longer wire:target="image_owner,save" style="position: absolute">
        @include('Pets.Loader')
    </div>
    <div class="card-form" wire:ignore.self>

        <label class="header">{{ __('messages.ownerInformation') }}</label>

        <input type="file" wire:model.live='image_owner' name='image_2' id="imageInput_2" accept="image/*" required
            class="d-none">


        <div id="preview_image_2" class="frame-preview" onclick="setupImagePreview('imageInput_2')">

            @if ($image_owner)
                <img id="image_owner" src="{{ $image_owner->temporaryUrl() }}" class="preview-image ">
            @else
                <img id="image_owner" src="{{ asset('storage/ProfileImage/Owns/' . $users->owner_image) }}"
                    class="image-profile">
            @endif
        </div>
        <div class="check" style="margin: 5px auto 5px auto">
            <input type="checkbox" id="check" wire:model.live='image_st'>
            <label for="check" ></label>
        </div>

        <div class="input-group mt-1">
            <label>{{ __('messages.emailOwner') }}</label>
            <div class="head-field">
                <input type="text" class="input-field" wire:model='email' placeholder="{{ __('messages.emailPlac') }}">
                <div class="check">
                    <input type="checkbox" id="check_1" wire:model.live='email_st'>
                    <label for="check_1"></label>
                </div>
            </div>
            
        </div>


        <div class="input-group mt-1">
            <label>{{ __('messages.FullName') }}</label>
            <div class="head-field">
                <input type="text" class="input-field" wire:model='fullname' placeholder="{{ __('messages.namePlac') }}">
                <div class="check">
                    <input type="checkbox" id="check_2" wire:model.live='fullname_st'>
                    <label for="check_2"></label>
                </div>
            </div>
        </div>
        <div class="input-group mt-1">
            <label>{{ __('messages.Nickname') }}</label>
            <div class="head-field">
                <input type="text" class="input-field" wire:model='nickname' placeholder="{{ __('messages.nickPlac') }}">
                <div class="check">
                    <input type="checkbox" id="check_3" wire:model.live='nickname_st'>
                    <label for="check_3"></label>
                </div>
            </div> 
        </div>
        <div class="input-group mt-1">
            <label>{{ __('messages.ContactNumber') }}</label>
            <div class="head-field">
                <input type="text" class="input-field" wire:model='phone' placeholder="{{ __('messages.phonePlac') }}">
                <div class="check">
                    <input type="checkbox" id="check_4" wire:model.live='phone_st'>
                    <label for="check_4"></label>
                </div>
            </div>
        </div>
        <div class="input-group mt-1">
            <label>{{ __('messages.address') }}</label>
            <input type="text" class="input-field" wire:model='address'
                placeholder="{{ __('messages.numberPlac') }}">
        </div>

        <div class="button-class-2">
            <button wire:click='save'>{{ __('messages.Save') }}</button>
        </div>
    </div>
    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        container: 'swal2-container',
                        popup: 'swal2-popup-2',
                        title: 'swal2-title-2',
                        icon: 'swal2-icon-2'
                    },
                    background: 'linear-gradient(to right,#008793, #00BF72)',
                    willOpen: () => {
                        const swalContainer = document.querySelector('.swal2-container');
                        swalContainer.style.position = 'fixed';
                        swalContainer.style.zIndex = 9999999;
                    },
                });

            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            window.addEventListener('False', (event) => {
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
        });
    </script>
</div>
