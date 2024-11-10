<div>
    <div wire:loading.delay.longer wire:target="login" style="position: absolute">
        @include('Pets.Loader')
    </div>
    <div class="card-form">
        <label class="header">{{ __('messages.sign_in_account') }}</label>
        <label class="header-detail">{{ __('messages.login_prompt') }}</label>
        <div>
            <div class="input-login">
                <label>{{ __('messages.email_address') }}</label>
                <input placeholder="{{ __('messages.enter_email') }}" type="email" wire:model='email'>
            </div>
            <div class="input-login">
                <label>{{ __('messages.password') }}</label>
                <input placeholder="{{ __('messages.enter_password') }}" type="password" wire:model='password'>
            </div>
        </div>
        <div class="login-footer">
            <div>
                <div class="checkbox-wrapper-28">
                    <input id="tmp-28" type="checkbox" class="promoted-input-checkbox" />
                    <svg>
                        <use xlink:href="#checkmark-28" />
                    </svg><label for="tmp-28">{{ __('messages.remember_me') }}</label><svg
                        xmlns="http://www.w3.org/2000/svg" style="display: none">
                        <symbol id="checkmark-28" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-miterlimit="10" fill="none"
                                d="M22.9 3.7l-15.2 16.6-6.6-7.1">
                            </path>
                        </symbol>
                    </svg>
                </div>
            </div>
            <a href="{{ route('forgotPassword.user') }}">{{ __('messages.forgot_password') }}</a>
        </div>
        <button class="signin-bt" wire:click='login'>{{ __('messages.login') }}</button>

    </div>
    <script>
        window.addEventListener('LoginFalse', (event) => {
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
