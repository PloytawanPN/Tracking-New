<div>
    <div wire:loading.delay.longer wire:target="changePassword" style="position: absolute">
        @include('Pets.Loader')
    </div>
    <div class="card-form">
        <label class="header">{{__('messages.change_password')}}</label>
        <label class="header-detail">{{__('messages.enter_passwords')}}</label>
        <div>
            <div class="input-login">
                <label>{{__('messages.new_password')}}</label>
                <input placeholder="{{__('messages.enter_password')}}" wire:model='password' type="password">
            </div>
            <div class="input-login">
                <label>{{__('messages.confirm_password')}}</label>
                <input placeholder="{{__('messages.enter_password')}}" wire:model='confirm' type="password">
            </div>
        </div>
        <button class="signin-bt" wire:click='changePassword'>{{__('messages.Save')}}</button>

    </div>
    <script>
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
    </script>
</div>
