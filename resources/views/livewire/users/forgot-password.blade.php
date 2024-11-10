<div>
    <div wire:loading.delay.longer wire:target="sendEmail" style="position: absolute">
        @include('Pets.Loader')
    </div>
    <div class="card-form">
        <label class="header">{{__('messages.forgot_password')}}</label>
        <label class="header-detail">{{__('messages.enter_email_receive')}}</label>
        <div>
            <div class="input-login">
                <label>{{__('messages.email_address')}}</label>
                <input placeholder="{{__('messages.enter_email')}}" type="email" wire:model='email'>
            </div>
        </div>
        <button class="signin-bt" wire:click='sendEmail'>{{__('messages.submit')}}</button>
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
