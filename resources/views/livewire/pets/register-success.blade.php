<div>
    <div class="card-form" wire:ignore.self>
        <label class="header">{{ __('messages.congratulations') }}</label>

        <p class="comgrate-p">{{ __('messages.registration_success') }}</p>

        <div class="button-class-2">

                <button style="width: 180px;margin: auto;" wire:click='go_login'>{{ __('messages.go_login') }}</button>

        </div>
    </div>
</div>
