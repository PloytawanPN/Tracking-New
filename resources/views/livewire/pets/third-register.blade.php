<div>
    <div class="card-form" wire:ignore.self>

        <label class="header">{{ __('messages.HealthInformation') }}</label>


        <div class="input-group mt-1">
            <label>{{ __('messages.Spayed') }}</label>
            <select class="input-field select-field" wire:model.live='spayed'>
                <option value=''>{{ __('messages.PleaseSelect') }}</option>
                <option value='1'>{{ __('messages.NeuteredTrue') }}</option>
                <option value='0'>{{ __('messages.NeuteredFalse') }}</option>
            </select>
        </div>

        <div class="input-group mt-1">
            <label>{{ __('messages.Health') }}</label>
            <textarea class="input-field text-area" wire:model='Health' placeholder="{{ __('messages.HealthPlac') }}"></textarea>
        </div>

        <div class="button-class-2">
            <button class="gray-bt" wire:click='back_step'>{{ __('messages.Back') }}</button>
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
